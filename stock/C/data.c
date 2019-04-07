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
	strcpy(url, "http://localhost/API/main.php/?barcode=");
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

	if (curl) {
		curl_easy_setopt(curl, CURLOPT_URL, url);

		curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, WriteMemoryCallback);
		curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void *)&chunk);

		res = curl_easy_perform(curl);
		curl_easy_cleanup(curl);
	}

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
		printf("Barcode: %ld\n", list->barcode);
		printf("Name : %s\n", list->name);
		printf("Description : %s\n", list->descriptiopn);
		list = list->next;
		number++;
	}
}

void fillArticle(struct Article * list, char * url, char * data)
{
	char * token = strtok(url, "=");
	token = strtok(NULL, "=");
	long barcode = atol(token);

	list->barcode = barcode;

	char * dataString = strtok(data, "\n");
	list->name = dataString;
	dataString = strtok(NULL, "");

	list->descriptiopn = dataString;
}
