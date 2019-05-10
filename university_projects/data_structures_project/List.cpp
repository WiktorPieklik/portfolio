//
// Created by Wiktor Pieklik on 2019-03-11.
//
#include <iostream>
#include <cstdlib>
#include "List.h"

using namespace std;

/**
 * Klasa implementujaca wskaznikowa strukture listy
 */
List::List()
{
    length = 0;
    head = nullptr;
    tail = nullptr;
}

List::~List()
{
    removeList();
}

//metoda wykorzystywana do zwolnienia pamieci zajmowanej przez cala strukture
void List::removeList()
{
    int* tab = new int[length];
    cellTmp = head;
    int i = 0;
    while(cellTmp != nullptr)
    {
        if(i!=0) //i=0 -> head
            tab[i] = cellTmp->data;
        cellTmp = cellTmp->next;
        i++;
    }

    for(int j=i; j>1;j--)
    {
        remove(j);
    }

    delete[] tab; //zwolnienie pamieci pomocniczej tablicy
    delete[] head; //zwolnienie pamieci zajmowanej przez glowe listy ->usuniecie jej na samym poczatku spowodowaloby brak dostepu do nastepnych komorek
    tail = nullptr;
}

void List::addBeginning(int data)
{
    cell n = new Cell;
    n->data = data;
    n->next = nullptr;

    cellTmp = head; //zastapienie miejsca glowy
    head = n;
    head->next = cellTmp;
    length++;
    calculateTail();
}

void List::addEnd(int data)
{
    cell n = new Cell;
    n->data = data;
    n->next = nullptr;

    if(length != 0)
    {
        tail->next = n; //zastapienie ogona nowa wartoscia
        tail = n;
    }
    else
        {
        head = n;
        tail = n;
        }

    length++;
}


void List::add(int valueAfter, int data)
{
    cell n = new Cell;
    n->data = data;
    n->next = nullptr;

    if(isInList(valueAfter))
    {
        if (head != nullptr)
        {
            cell nextCell;
            cellTmp = head;

            while (cellTmp->data != valueAfter)
                cellTmp = cellTmp->next;
            nextCell = cellTmp->next;
            cellTmp->next = n;
            n->next = nextCell;
        }
        else
        {
            head = n; //w sytuacji gdy w liscie nie ma zadnych elementow to glowa i ogon wskazuja na ten sam element struktury
            tail = n;
        }
    }
    else
    {
        addBeginning(data); //gdy danego elementu nie ma na liscie nastepuje dodanie na poczatek listy
    }

    length++;
    calculateTail();
}

//obliczenie pozycji aktualnie wskazywanej przez ogon
void List::calculateTail()
{
    if(head != nullptr)
    {
        cellTmp = head;
        while (cellTmp->next != nullptr)
            cellTmp = cellTmp->next;
        tail = cellTmp;
    }
}

//metoda pomocnicza wykorzystywana -> patrz metoa List::isInList(int dataToFind)
int List::find(int dataToFind)
{
    cellTmp = head;
    int position = 0;
    while(cellTmp != nullptr && cellTmp->data != dataToFind)
    {
        cellTmp = cellTmp->next;
        position++;
    }

    if(cellTmp == nullptr)
        return -1; //gdy nie znaleziono elementu zwracana jest wartosc -1

    return position;
}

bool List::isInList(int dataToFind)
{
    int where = find(dataToFind);
    if(where > -1) //sprawdzenie czy znaleziono szukana wartosc
        return true;

    return false;
}

void List::remove(int data)
{
    if(length != 0)
    {
        cell cellToRemove;
        cell previousCell = new Cell;
        cellTmp = head;

        while (cellTmp != nullptr && cellTmp->data != data)
        {
            previousCell = cellTmp;
            cellTmp = cellTmp->next;
        }

        if (cellTmp != nullptr)
        {
            cellToRemove = cellTmp;
            previousCell->next = cellTmp->next;

            if (cellToRemove == head) //gdy usuwanym elementem jest glowa
                head = head->next;

            delete cellToRemove;
            length--;
            calculateTail();
        }
    }
}

void List::removeBegining()
{
    remove(head->data);
}

void List::removeEnd()
{
    remove(tail->data);
}

//proste wyswietlenie listy
void List::printList()
{
    cellTmp = head;

    while(cellTmp != nullptr)
    {
        cout << cellTmp->data << " ";
        cellTmp = cellTmp->next;
    }
    cout<<endl;

}
