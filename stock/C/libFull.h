#pragma once

#include <stdio.h>
#include <stdlib.h>
#include <time.h>


long fsize(FILE * fp);
char * freadInArray(FILE * fp);
void logInFile(char * description, char * name, int type);
char * removeEnter(char * text);
void appendJson(char * data, FILE *fp);