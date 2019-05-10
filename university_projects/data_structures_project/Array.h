//
// Created by Wiktor Pieklik on 2019-03-12.
//

#ifndef SDIZO_PROJEKT_ARRAY_H
#define SDIZO_PROJEKT_ARRAY_H


class Array{

private:
    int* tempArray;
    int length;
    int* array;

public:
    Array();
    ~Array();
    void add(int where, int data);
    void addBeginning(int data);
    void addEnd(int data);
    void remove(int index);
    void removeBeginning();
    void removeEnd();
    bool find(int dataToFind);
    int getIndex(int data);
    void printArray();
    int getLength();
    int& operator[] (const int index);
};


#endif //SDIZO_PROJEKT_ARRAY_H
