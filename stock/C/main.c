#pragma warning(disable : 4996)

#include "data.h"

int main(void)
{
	logInFile("\t-- Application entered --", "system", 0);
	int idUser;
	struct Article * list = NULL;
	int loop = 0;

	//User Connection
	idUser = connection();
	while (idUser>0) {
		system("cls");

		logInFile("##### NEW LIST #####", "START", 0);
		
		do
		{
			
			if (list == NULL) printf("Votre liste est vide merci d'ajouter des articles \n\n");
			else printAll(list);
			printf("\n\n 0: \t Quiter \n 1: \t Ajouter un article \n 2: \t supprimer un article\n 3: \t Envoyer la liste\n\n");
			scanf_s("%d", &loop);
			CLEAN_STDIN
				if (loop == 1)
				{
					list = newArticle(&list);
					char * url = setUrl();
					MemoryStruct reponse = performCurl(url);

					fillArticle(list, url, reponse.memory);
				}
			if (loop == 2)
			{
				system("cls");
				printAll(list);
				printf("numero : ");
				int num = 0;
				scanf_s("%d", &num);
				CLEAN_STDIN
					deleteArticle(&list, num);
			}
			if (loop == 3) break;
			system("cls");

		} while (loop);
		if (loop == 3)
		{
			char * json = listToJson(list,idUser);
			performPost(json);
			system("cls");
			printf("votre liste a ete envoyer, vous pouvez fermer l'application.\n\n");
			idUser = 0;
		}
		if (loop == 0) {
			idUser = 0;
		}
	}
	logInFile("\t-- Application exited --", "system", 0);
	return 0;
}