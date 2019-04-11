#pragma once
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <curl/curl.h>


typedef struct {
	char *memory;
	unsigned int size;
} MemoryStruct;

struct Article {
	unsigned long int barcode;
	size_t number;

	const char * name;
	const char * descriptiopn;

	struct Article * next;
};

/* ------ curl ----- */

const unsigned int WriteMemoryCallback(void *contents, unsigned int size, unsigned int nmemb, void *userp);
void printInfo(char * memory);
char * setUrl();
MemoryStruct performCurl(char * url);

/* - Chained  list - */

struct Article * newArticle(struct Article ** head);
void printAll(struct Article * list);
void fillArticle(struct Article * list, char * url, char * data);
void deleteArticle(struct Article **head, int artNum);



