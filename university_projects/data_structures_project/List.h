//
// Created by Wiktor Pieklik on 2019-03-11.
//

#ifndef SDIZO_PROJEKT_LIST_H
#define SDIZO_PROJEKT_LIST_H


class List{

private:
    typedef struct Cell
    {
        int data;
        Cell* next = nullptr;
    }* cell;

    cell head;
    cell tail;
    cell cellTmp; //na potrzeby obliczen
    int length;
    void calculateTail();
    int find(int dataToFind);

public:
    List();
    ~List();
    void addBeginning(int data);
    void addEnd(int data);
    void add(int valueAfter, int data);
    void remove(int data);
    void removeBegining();
    void removeEnd();
    bool isInList(int dataToFind);
    void printList();
private:
    void removeList();
};


#endif //SDIZO_PROJEKT_LIST_H
