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
		printf("\n\n 0: \t Quiter \n 1: \t Ajouter un article \n 2: \t supprimer un article\n\n");
		loop = 0;
		scanf_s("%d", &loop);
		CLEAN_STDIN
		if (loop == 2)
		{
			system("cls");
			printAll(list);
			printf("numero : ");
			int num = 0;
			scanf_s("%d", &num);
			deleteArticle(&list, num);
			printAll(list);
			system("pause");
			CLEAN_STDIN
		}
		system("cls");

	} while (loop);
	system("pause");
	return 0;
}