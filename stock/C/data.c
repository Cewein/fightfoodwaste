#pragma warning(disable : 4996)
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
	char * url = calloc(150, sizeof(char));
	printf("Rentrez un code barre : \n");
	char buffer[60];
	memset(url, '\0', sizeof(url));
	strcpy(url, "http://localhost/fightfoodwaste/stock/services/getArticle.php/?barcode="); //if you have trouble with the setUrl change the address here
	fgets(buffer, 60, stdin);
	strtok(buffer, "\n");
	strcat(url, buffer);
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
		fprintf(stderr, "curl_easy_perfm() failed: %s\n", curl_easy_strerror(res));
		exit(1);
	}
	else return chunk;
}

struct Article * newArticle(struct Article ** head)
{
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
		printf("Barcode: %ld\t", list->barcode);
		printf("Name : %s\t", list->name);
		printf("Description : %s\n", list->descriptiopn);
		list = list->next;
		number++;
	}
}

void fillArticle(struct Article * list, char * url, char * data)
{
	//set the barcode
	char * token = strtok(url, "=");
	token = strtok(NULL, "=");
	long barcode = atol(token);

	list->barcode = barcode;
	
	//set Name and desciption
	char * dataString = strtok(data, "\n");
	list->name = dataString;
	dataString = strtok(NULL, "");

	list->descriptiopn = dataString;
}

void deleteArticle(struct Article **head, int artNum)
{

	struct  Article* temp = *head;
	struct  Article* prev = NULL;

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

	// If key was not present in linked list 
	if (temp == NULL) return;

	// Unlink the node from linked list 
	prev->next = temp->next;

	free(temp);
}