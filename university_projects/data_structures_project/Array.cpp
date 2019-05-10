//
// Created by Wiktor Pieklik on 2019-03-12.
//

#include "Array.h"
#include <iostream>

using namespace std;
/**
 * Klasa implementujaca dynamicznie zmieniajaca sie tablice
 */
Array::Array()
{
    tempArray = nullptr; //tablica pomocnicza, tymczasowa
    array = nullptr; //domyslna tablica
    length = 0; //ilosc przetrzymywanych elementow w tablicy
}

Array::~Array()
{
    length = 0;
    delete[] tempArray;
    delete[] array;
    tempArray = nullptr;
    array = nullptr;
}

void Array::remove(int index)
{
    if(index >= 0 && index <length) //sprawdzenie czy wartosc indeksu podana w parametrze metody miesci sie w odpowiednich przedzialach
    {
        tempArray = new int[--length];

        for(int i=0; i<index; i++)
            tempArray[i] = array[i];
        for(int i=index; i<length; i++)
            tempArray[i] = array[i+1];

        delete[] array; //zwolnienie pamieci 'starej' tablicy
        array = nullptr;
        int** wsk = &tempArray; //pobranie adresu tymczasowej tablicy
        array = *wsk; //przypisanie adresu tymczasowej tablicy do domyslnej tablicy
        tempArray = nullptr; //tempArray juz nie wskazuje na utworzone wyzej dane
    }
}

void Array::removeBeginning()
{
    remove(0);
}

void Array::removeEnd()
{
    remove(length-1);
}

void Array::add(int where, int data)
{
    length++;

    if(where < length && where >= 0) //moga zostac dodane tylko elementy o indeksach od 0 do length-1, wiec wywolujac metode AddEnd
    {                               //z paramterem where = length, element zostanie dodany na sam koniec tablicy

        tempArray = new int[length];
        tempArray[where] = data; //wpisanie wartosci na zadany indeks

        for(int i=0;i<where;i++) //przepisanie wartosci tablicy od 0 do where
            tempArray[i] = array[i];
        for (int i = where + 1; i < length; i++) //przepisanie wartosci od where+1 (bo na where juz wstawione) do konca tablicy
            tempArray[i] = array[i-1];

        delete[] array; //zwolnienie pamieci 'starej' tablicy
        array = nullptr;

        int **wsk = &tempArray; //operacja analogiczna jak w metodzie wyzej
        array = *wsk;

        tempArray = nullptr;
    }
    else
    {
        length--; //bo domyslnie dodawane jest 1 do aktualnej dlugosci tablicy, niezaleznie czy zostaly spelnione warunki
    }
}

void Array::addBeginning(int data)
{
    add(0,data); //zastapienie pierwszego elementu nowym i przesuniecie calej tablicy
}

void Array::addEnd(int data)
{
    add(length, data); //dodanie na pozycje length (indeksy numerowane od 0) -> patrz Array::add(int where, int data)
}

//pomocnicza metoda wykorzystywana w kopcu -> patrz Heap::deleteNode(int nodeToDelete)
int Array::getIndex(int data)
{
    for(int i=0;i<length;i++)
        if(array[i] == data)
            return i;
    return -1; //gdy nie znaleziono szukanego elementu zwracana jest wartosc -1
}

bool Array::find(int dataToFind)
{
    for(int i=0;i<length;i++)
        if(array[i] == dataToFind)
            return true;
    return false;
}

int Array::getLength()
{
    return length;
}

//przeciazenie operatora [], aby mozna bylo miec dostep do poszczegolnych elementow tej tablicy jak w 'normalnej'
int& Array::operator[](const int index)
{
    return array[index];
}

void Array::printArray()
{
    for(int i=0;i<length;i++)
        cout<<array[i]<<" ";
    cout<<endl;
}
