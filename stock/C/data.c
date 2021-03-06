#pragma warning(disable : 4996)
#define ONLINE 1
#include "data.h"

const unsigned int WriteMemoryCallback(void *contents, unsigned int size, unsigned int nmemb, void *userp)
{
	unsigned int realsize = size * nmemb;
	MemoryStruct *mem = (MemoryStruct *)userp;

	char *ptr = realloc(mem->memory, mem->size + realsize + 1);
	if (ptr == NULL)
	{
		printf("Out of memory");
		return 0;
	}

	mem->memory = ptr;
	memcpy(&(mem->memory[mem->size]), contents, realsize);
	mem->size += realsize;
	mem->memory[mem->size] = 0;

	return realsize;
}

void printInfo(char * memory)
{
	char * data;
	data = memory;
	printf("%s", data);
}

char * setUrl()
{
	FILE * fp = NULL;

	logInFile("setting the url", "url", 0);

	char * url = calloc(150, sizeof(char));
	printf("Rentrez un code barre : \n");
	char buffer[60];
	memset(url, '\0', sizeof(url));
#if ONLINE == 0
	strcpy(url, "http://localhost/fightfoodwaste/stock/services/getArticle.php/?barcode="); //if you have trouble with the setUrl change the address here
#else
	strcpy(url, "http://vps664303.ovh.net/stock/services/getArticle.php/?barcode="); //if you have trouble with the setUrl change the address here
#endif
	fgets(buffer, 60, stdin);
	strtok(buffer, "\n");
	strcat(url, buffer);

	logInFile("url succesfully set", "url", 0);

	return url;
}

MemoryStruct performCurl(char * url)
{
	CURL *curl;
	CURLcode res;

	MemoryStruct chunk;

	chunk.memory = malloc(1);
	chunk.size = 0;

	curl_global_init(CURL_GLOBAL_DEFAULT);
	curl = curl_easy_init();

	//perform curl
	logInFile("starting the curl", "curl", 1);
	if (curl) {
		curl_easy_setopt(curl, CURLOPT_URL, url);

		//set callback and where to write the data
		curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, WriteMemoryCallback);
		curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)&chunk);

		//perform curl and clean it
		res = curl_easy_perform(curl);
		curl_easy_cleanup(curl);
	}

	//check is the responce code is ok
	if (res != CURLE_OK)
	{
		logInFile("----- curl FAILED -----", "curl", 2);
		fprintf(stderr, "curl_easy_perfm() failed: %s\n", curl_easy_strerror(res));
		exit(1);
	}
	else
	{
		logInFile("curl successfull", "curl", 1);
		return chunk;
	}
}

int performPost(char * data)
{
	CURL *curl;
	CURLcode res;

	curl_global_init(CURL_GLOBAL_ALL);

	/* get a curl handle */
	logInFile("sending info to server", "post", 1);
	curl = curl_easy_init();
	if (curl) {
#if ONLINE == 0
		curl_easy_setopt(curl, CURLOPT_URL, "http://localhost/fightfoodwaste/stock/services/putListe.php");
#else
		curl_easy_setopt(curl, CURLOPT_URL, "http://vps664303.ovh.net/stock/services/putListe.php");
#endif
		curl_easy_setopt(curl, CURLOPT_POSTFIELDS, data);

		res = curl_easy_perform(curl);

		/* Check for errors */
		if (res != CURLE_OK)
		{
			logInFile("Error while sending info to server", "post", 2);
			fprintf(stderr, "curl_easy_perform() failed: %s\n",curl_easy_strerror(res));
			exit(1);
		}

		/* always cleanup */
		curl_easy_cleanup(curl);
	}
	logInFile("info succesfully sended", "post", 1);
	curl_global_cleanup();
	return 0;
}

struct Article * newArticle(struct Article ** head)
{
	logInFile("adding a new article", "list", 0);
	struct Article * new = (struct Article *)malloc(sizeof(struct Article));
	new->next = (*head);
	return new;
}

void printAll(struct Article * list)
{
	int number = 1;
	while (list != NULL)
	{
		printf("---- Article numero %d ----\n", number);
		printf("Barcode: %lld\t", list->barcode);
		printf("Name : %s\t", list->name);
		printf("Description : %s\t", list->descriptiopn);
		printf("number: %zu\n", list->number);
		list = list->next;
		number++;
	}
}

void fillArticle(struct Article * list, char * url, char * data)
{
	//set the barcode
	logInFile("filling barcode's article", "list", 0);
	char * token = strtok(url, "=");
	token = strtok(NULL, "=");
	long long barcode = atoll(token);
	list->barcode = barcode;

	//set Name and desciption
	logInFile("filling name and description of the article", "list", 0);
	char * dataString = strtok(data, "\n");
	list->name = dataString;
	dataString = strtok(NULL, "");

	list->descriptiopn = dataString;

	printf("vous avec choisie : %s \nCombien en avez vous :\t",list->name);
	logInFile("filling size of the article", "list", 0);
	int tmp = 0;
	scanf_s("%d", &tmp);
	list->number = tmp;
	CLEAN_STDIN;
}

void deleteArticle(struct Article **head, int artNum)
{

	struct  Article* temp = *head;
	struct  Article* prev = NULL;
	logInFile("deleting article", "list", 0);
	// If head node itself holds the key to be deleted 
	int chooser = 1;
	if (temp != NULL && artNum == chooser)
	{
		*head = temp->next;   
		free(temp);           
		return;
	}
	
	while (temp != NULL && chooser != artNum)
	{
		prev = temp;
		temp = temp->next;
		chooser++;
	}

	//If key was not present
	if (temp == NULL) return;

	//Unlink the node 
	prev->next = temp->next;
	logInFile("deleting sucessfull", "list", 0);
	free(temp);
}

char * listToJson(struct Article * list, int userId)
{
	logInFile("Making a json", "json", 1);
	FILE * json = fopen("list.json", "w");
	appendJson("{\"",json);

	int num = 1;
	char buf[50];
	
	//Add user id to json
	appendJson("userId\": { \"id\":",json);
	sprintf(buf, "%d", userId);
	appendJson(buf, json);
	appendJson("},\"", json);

	//Add list to json
	while (list->next != NULL)
	{
		appendJson(itoa(num, buf, 10),json);

		appendJson("\":{\"barcode\":",json);
		sprintf(buf, "%lld", list->barcode);
		appendJson(buf,json);
		appendJson(",", json);
		appendJson("\"size\":", json);
		appendJson(itoa(list->number, buf, 10), json);
		appendJson("},\"", json);
		list = list->next;
		num++;
	}
	appendJson(itoa(num, buf, 10), json);

	appendJson("\":{\"barcode\":", json);
	sprintf(buf, "%lld", list->barcode);
	appendJson(buf, json);
	appendJson(",", json);
	appendJson("\"size\":", json);
	appendJson(itoa(list->number, buf, 10), json);
	appendJson("}}", json);
	fclose(json);
	json = fopen("list.json", "rb");

	logInFile("json maked", "json", 1);
	return freadInArray(json);
}

int connection() {
	int check = 0;
	int data;
	char * email;
	email = malloc(sizeof(char) * 80);
	logInFile("Connection started", "Login", 1);
	if (email != NULL)
	{
		char * password;
		password = malloc(sizeof(char) * 255);
		if (password != NULL) {
			logInFile("Enterring email", "USER", 1);
			printf("Connexion a un compte: \nEmail : ");
			fgets(email, 81, stdin);
			if (email[strlen(email) - 1] == '\n') {
				email[strlen(email) - 1] = '\0';
			}
			logInFile("Enterring password", "USER", 1);
			printf("\nMot de passe: ");
			fgets(password, 255, stdin);
			if (password[strlen(password) - 1] == '\n') {
				password[strlen(password) - 1] = '\0';
			}
			char * urlConnection = setConnectionUrl(email,password);
			MemoryStruct response = performCurl(urlConnection);
			char * dataString = strtok(response.memory, "\n");
			
			data = atoi(dataString);
			logInFile("Checking responce", "Login", 1);
			if (strcmp(dataString, "<br >") == 0) {
				check = 0;
			}
			else {
				check = data;
			}

			free(password);
		}
		free (email);
	}
	return check;
	
}

char * setConnectionUrl(char * email, char * passwd)
{
	FILE * fp = NULL;

	logInFile("setting the connection url", "url", 0);

	char * url = calloc(150, sizeof(char));

	memset(url, '\0', sizeof(url));
#if ONLINE == 0
	strcpy(url, "http://localhost/fightfoodwaste/connection/checkConnectionAppli.php/?email="); //if you have trouble with the setUrl change the address here
#else
	strcpy(url, "http://vps664303.ovh.net/connection/checkConnectionAppli.php/?email="); //if you have trouble with the setUrl change the address here
#endif
	strcat(url, email);
	strcat(url, "&passwd=");
	strcat(url, passwd);

	logInFile("url succesfully set", "url", 0);

	return (url);
}
