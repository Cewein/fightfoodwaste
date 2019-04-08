#pragma warning(disable : 4996)

#include "data.h"

int main(void)
{
	
	struct Article * list = NULL;
	int loop = 0;
	do
	{
		printf("###############################################\n");
		list = newArticle(&list);
		char * url = setUrl();
		MemoryStruct reponse = performCurl(url);

		fillArticle(list, url, reponse.memory);
		printAll(list);
		printf("###############################################\n");
		printf("Voulez-vous ajouter un nouveau article ?\n 1: \t Oui\n 0: \t non\n\n");
		loop = 0;
		scanf_s("%d", &loop);
		int c; while ((c = getchar()) != '\n');

	} while (loop);
	system("pause");
	return 0;
}