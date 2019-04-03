#pragma once
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <curl/curl.h>

typedef struct {
	char *memory;
	unsigned int size;
} MemoryStruct;

struct Arti {
	unsigned long int barcode;
	size_t number;

	struct Article * next;
};

const unsigned int WriteMemoryCallback(void *contents, unsigned int size, unsigned int nmemb, void *userp);
void printInfo(char * memory);
char * setUrl();
MemoryStruct performCurl(char * url);

