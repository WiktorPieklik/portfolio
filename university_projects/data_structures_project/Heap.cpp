//
// Created by Wiktor Pieklik on 2019-03-14.
//

#include "Heap.h"
#include <cmath>
#include <iostream>

using namespace std;
/**
 * Klasa implementujaca kopiec binarny.
 */
Heap::Heap()
{
    n = 0; //liczba elementow kopca
}

Heap::~Heap()
{
    arrayHeap.~Array();
}

void Heap::addNode(int node)
{
    arrayHeap.addEnd(node); //dodanie wartosci do dynamicznej tablicy przetrzymujacej dane kopca

    currentNode = n++;
    parent = (currentNode -1)/2;

    while(currentNode > 0 && arrayHeap[parent] < node) //wstawienie wezla na sam koniec i sprawdzanie wlasciowosci kopca
    {
        arrayHeap[currentNode] = arrayHeap[parent];
        currentNode = parent;
        parent = (currentNode-1)/2;
    }

    arrayHeap[currentNode] = node;
}

//metoda odpowiedzialna za proste wyswietlanie kopca albo w postaci zwyklej tablicy lub drzewa binarnego
void Heap::printHeap(bool isArray)
{
    int length = arrayHeap.getLength();

    if(isArray)
    {
        for(int i=0;i<length;i++)
            cout<<arrayHeap[i]<<" ";
        cout<<endl;
    }
    else{

        if((length != 0) && !(length & (length - 1))) //czy length jest potega dwojki
        {
            levels = (int)log2(length) + 1;
        }
        else
            levels =  (int)ceil(log2(length)); //liczba poziomow drzewa

        currentNode = 0;

        for (int i = 0; i < levels; i++) {
            nodesInLevel = (int)pow(2, i); //ilosc wezlow w danym poziomie 2^i gdzie i to numer poziomu

            while (nodesInLevel > 0 && currentNode < length)
            {
                spacesCount = (int)((levels - i) * 3.9); //odleglosci miedzy wezlami
                if (i == 0)
                    spacesCount += 2;

                for (int j = 0; j < spacesCount; j++)
                    cout << " ";
                cout << arrayHeap[currentNode];

                currentNode++;
                nodesInLevel--;
            }
            cout << endl; //rozpoczecie nowego poziomu
        }
    }
}

//usuwanie wybranego wezla i wstawienie w jego miejsce liścia o najwiekszym indeksie w tablicy
void Heap::deleteNode(int nodeToDelete)
{
    int index = arrayHeap.getIndex(nodeToDelete);
    int i = index,j = i*2 +1, leaf; //j = lewy syn, numerowanie od 0 wiec 2*i+1, a nie 2*i
    if(n)
    {
       if(index > -1)
       {
           n--;
           leaf = n;
           while(j<n)
           {
               if(j+1 < n && arrayHeap[j+1] > arrayHeap[j])
                   j++;

               if(leaf >= arrayHeap[j])
                   break;
               arrayHeap[i] = arrayHeap[j];
               i=j;
               j=i*2+1;
           }
           arrayHeap[i] = arrayHeap[leaf];
           arrayHeap.remove(leaf);
       }
    }
}
bool Heap::find(int node)
{
    return arrayHeap.find(node);
}

