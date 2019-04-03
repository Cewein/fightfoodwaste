#pragma warning(disable : 4996)

#include "data.h"

int main(void)
{
	
	char * url = setUrl();
	struct Article * list = NULL;
	MemoryStruct reponse = performCurl(url);
	printf("\n%s\n",reponse.memory);
	system("pause");
	return 0;
}