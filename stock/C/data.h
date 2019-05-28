#pragma once
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <curl/curl.h>

#include "libFull.h"

#define CLEAN_STDIN int c; while ((c = getchar()) != '\n');

typedef struct {
	char *memory;
	unsigned int size;
} MemoryStruct;

struct Article {
	long long barcode;
	size_t number;

	const char * name;
	const char * descriptiopn;

	struct Article * next;
};

/* ------ curl ----- */


//callback for writting int the MemoryStruct
//prevent overflow and is obligatory for performing a curl to a webpage
const unsigned int WriteMemoryCallback(void *contents, unsigned int size, unsigned int nmemb, void *userp);  

//display a char *
void printInfo(char * memory); 

//set the url for the stock API, it return a string
char * setUrl(); 

//perform a curl and return is respond
MemoryStruct performCurl(char * url);

int performPost(char * data);

/* - Chained  list - */

// add a Article node to the chained list
// the added article become the head of the list
//
//!!! it return the list must be past in a new Article !!!
struct Article * newArticle(struct Article ** head);

//display all article
void printAll(struct Article * list);

//as the name say fill the article with data
void fillArticle(struct Article * list, char * url, char * data);

void deleteArticle(struct Article **head, int artNum);

char * listToJson(struct Article * list);

char * setConnectionUrl(char * email, char * passwd);

