//
// Created by Wiktor Pieklik on 2019-03-14.
//

#ifndef SDIZO_PROJEKT_HEAP_H
#define SDIZO_PROJEKT_HEAP_H

#include "Array.h"

class Heap{

public:
    void addNode(int node);
    void deleteNode(int nodeToDelete);
    Heap();
    ~Heap();
    void printHeap(bool isArray = false);
    bool find(int node);

private:
    int parent;
    int n;
    int currentNode;
    int levels;
    int nodesInLevel;
    int spacesCount;
    Array arrayHeap;

};


#endif //SDIZO_PROJEKT_HEAP_H
