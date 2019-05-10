//
// Created by Wiktor Pieklik on 2019-03-24.
//
#include "List.h"
#include "Array.h"
#include "Heap.h"
#include "RBTree.h"
#include "FileHandler.h"

#include <iostream>
#include <string>
#include <time.h>
#include <stdio.h>
#include <unistd.h>

    string MAIN_MENU = "        MENU GLOWNE:\n"
                       "1. Stworz liste\n"
                       "2. Stworz tablice\n"
                       "3. Stworz kopiec\n"
                       "4. Stworz drzewo czerowno-czarne\n"
                       "5. Zakoncz\n";

    string LIST_MENU = "        LISTA:\n"
                       "1. Wczytaj z pliku\n"
                       "2. DODAJ ELEMENT ZA DANA WARTOSC\n"
                       "3. DODAJ NA POCZATEK\n"
                       "4. DODAJ NA KONIEC\n"
                       "5. USUN Z LISTY\n"
                       "6. USUN Z POCZATKU LISTY\n"
                       "7. USUN Z KONCA LISTY\n"
                       "8. SPRAWDZ CZY ZNAJDUJE SIE W LISCIE\n"
                       "9. WYSWIETL\n"
                       "10. Wroc do menu glownego\n";

    string ARRAY_MENU = "       TABLICA:\n"
                        "1. Wczytaj z pliku\n"
                        "2. DODAJ ELEMENT NA I-TY INDEKS\n"
                        "3. DODAJ NA POCZATEK\n"
                        "4. DODAJ NA KONIEC\n"
                        "5. USUN Z TABLICY\n"
                        "6. USUN Z POCZATKU TABLICY\n"
                        "7. USUN Z KONCA TABLICY\n"
                        "8. SPRAWDZ CZY SIE ZNAJDUJE W TABLICY\n"
                        "9. WYSWIETL\n"
                        "10. Wroc do menu glownego\n";

    string HEAP_MENU = "        KOPIEC:\n"
                       "1. Wczytaj z pliku\n"
                       "2. DODAJ DO KOPCA\n"
                       "3. USUN Z KOPCA\n"
                       "4. SPRAWDZ CZY ZNAJDUJE SIE W KOPCU\n"
                       "5. WYSWIETL\n"
                       "6. Wroc do menu glownego\n";

    string RBTREE_MENU = "      DRZEWO CZERWONO-CZARNE:\n"
                         "1. Wczytaj z pliku\n"
                         "2. DODAJ DO DRZEWA\n"
                         "3. USUN Z DRZEWA\n"
                         "4. SPRAWDZ CZY ZNAJDUJE SIE W DRZEWIE\n"
                         "5. WYSWIETL\n"
                         "6. Wroc do menu glownego\n";

    int x, y, z, w, fileSize;
    int *tab;
    bool exitLoop = false;

    Array *array1;
    List *list;
    Heap *heap;
    RBTree *tree;
    FileHandler *handler;

int main()
{
////    double diff = 0.0, mean = 0.0;
////    struct timespec start, end;
//    handler = new FileHandler;
//////    int n = 2000;
//   srand(time(nullptr));
//////    handler->printData("DRZEWO: USUWANIE");
//////    handler->printData(n);
//    for(int i=0;i<40;i++)
//    {
//        handler->printData(rand()%100 + 1);
//    }
//
//        clock_gettime(CLOCK_MONOTONIC, &start);
//
//        for(int j=0; j<n; j++)
//        {
//            tree->removeNode(tab[j]);
//        }
//
//        clock_gettime(CLOCK_MONOTONIC, &end);
//        delete tree;
//        delete tab;
//        diff = (end.tv_sec - start.tv_sec) + (end.tv_nsec - start.tv_nsec) / 1000000000.0;
//        mean += diff;
//        handler->printData(diff);
//    }
//
//    handler->printData("Srednia: ");
//    mean = mean/100.0;
//    handler->printData(mean);


    while(true)
    {
        cout<<endl<<endl<<MAIN_MENU<<endl<<endl;
        cin>>x;
        switch(x)
        {
            case 1:
                list = new List;
                while(true)
                {
                    cout<<endl<<endl<<LIST_MENU<<endl<<endl;
                    cin>>y;
                    switch(y)
                    {
                        case 1:
                            handler = new FileHandler;
                            tab = handler->readData();
                            fileSize = handler->getFileSize();

                            for(int i=0; i<fileSize; i++)
                                list->addEnd(tab[i]);

                            delete[] tab;
                            break;
                        case 2:
                            cout<<"Podaj za jaka wartosc wpisac nowa wartosc: ";
                            cin>>z>>w;
                            list->add(z, w);
                            break;
                        case 3:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            list->addBeginning(z);
                            break;
                        case 4:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            list->addEnd(z);
                            break;
                        case 5:
                            cout<<"Podaj wartosc do usuniecia: ";
                            cin>>z;
                            list->remove(z);
                            break;
                        case 6:
                            list->removeBegining();
                            break;
                        case 7:
                            list->removeEnd();
                            break;
                        case 8:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            if(list->isInList(z))
                                cout<<endl<<"Wartosc znajduje sie w liscie"<<endl;
                            else
                                cout<<endl<<"Wartosci nie ma w liscie"<<endl;
                            break;
                        case 10:
                            exitLoop = true;
                            break;
                    }

                    if(exitLoop)
                    {
                        exitLoop = false;
                        delete list;
                        delete handler;
                        break;
                    }

                    list->printList();

                }

                break;
            case 2:
                array1 = new Array;
                while(true)
                {
                    cout<<endl<<endl<<ARRAY_MENU<<endl<<endl;
                    cin>>y;
                    switch(y)
                    {
                        case 1:
                            handler = new FileHandler;
                            tab = handler->readData();
                            fileSize = handler->getFileSize();

                            for(int i=0; i<fileSize; i++)
                                array1->addEnd(tab[i]);
                            delete[] tab;
                            break;
                        case 2:
                            cout<<"Podaj indeks oraz wartosc: ";
                            cin>>z>>w;
                            array1->add(z, w);
                            break;
                        case 3:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            array1->addBeginning(z);
                            break;
                        case 4:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            array1->addEnd(z);
                            break;
                        case 5:
                            cout<<"Podaj nr indeksu: ";
                            cin>>z;
                            array1->remove(z);
                            break;
                        case 6:
                            array1->removeBeginning();
                            break;
                        case 7:
                            array1->removeEnd();
                            break;
                        case 8:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            if(array1->find(z))
                                cout<<"Wartosc znajduje sie w tablicy"<<endl;
                            else
                                cout<<"Wartosci nie ma w tablicy"<<endl;
                            break;
                        case 10:
                            exitLoop = true;
                            break;
                    }

                    if(exitLoop)
                    {
                        exitLoop = false;
                        delete array1;
                        delete handler;
                        break;
                    }
                    array1->printArray();
                }

                break;
            case 3:
                heap = new Heap;
                while(true)
                {
                    cout<<endl<<endl<<HEAP_MENU<<endl<<endl;
                    cin>>y;
                    switch(y)
                    {
                        case 1:
                            handler = new FileHandler;
                            tab = handler->readData();
                            fileSize = handler->getFileSize();

                            for(int i=0; i<fileSize; i++)
                                heap->addNode(tab[i]);
                            delete[] tab;
                            break;
                        case 2:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            heap->addNode(z);
                            break;
                        case 3:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            heap->deleteNode(z);
                            break;
                        case 4:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            if(heap->find(z))
                                cout<<"Wartosc znajduje sie w kopcu"<<endl;
                            else
                                cout<<"Wartosci nie ma w kopcu"<<endl;
                            break;
                        case 6:
                            exitLoop = true;
                            break;
                    }

                    if(exitLoop)
                    {
                        exitLoop = false;
                        delete heap;
                        delete handler;
                        break;
                    }

                    heap->printHeap();
                }
                break;
            case 4:
                tree = new RBTree;
                while(true)
                {
                    cout<<endl<<endl<<RBTREE_MENU<<endl<<endl;
                    cin>>y;
                    switch(y)
                    {
                        case 1:
                            handler = new FileHandler;
                            tab = handler->readData();
                            fileSize = handler->getFileSize();

                            for(int i=0; i<fileSize; i++)
                                tree->insertNode(tab[i]);
                            delete[] tab;
                            break;
                        case 2:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            tree->insertNode(z);
                            break;
                        case 3:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            tree->removeNode(z);
                            break;
                        case 4:
                            cout<<"Podaj wartosc: ";
                            cin>>z;
                            if(tree->findNode(z))
                                cout<<"Wartosc znajduje sie w drzewie"<<endl;
                            else
                                cout<<"Wartosci nie ma w drzewie"<<endl;
                            break;
                        case 6:
                            exitLoop = true;
                            break;
                    }

                    if(exitLoop)
                    {
                        exitLoop = false;
                        delete tree;
                        delete handler;
                        break;
                    }
                    tree->printTree();
                }

                break;
            case 5:
                return 0;
        }
    }
}