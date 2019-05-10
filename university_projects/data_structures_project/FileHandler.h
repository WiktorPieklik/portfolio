//
// Created by Wiktor Pieklik on 2019-03-23.
//

#ifndef SDIZO_PROJEKT_FILEHANDLER_H
#define SDIZO_PROJEKT_FILEHANDLER_H

#include <fstream>
#include <iostream>
#include <string>

using namespace std;

class FileHandler{

public:
    int* readData();
    int getFileSize();
    void printData(int data, bool override = false);
    void printData(string data, bool override = false);
    void printData(double data, bool override = false);

private:
    string FILE_NAME = "/Users/WiktorPieklik/Desktop/test.txt";
    string DATA_NAME = "/Users/WiktorPieklik/Desktop/dane.txt";
    ifstream readFile;
    ofstream writeFile;
    int fileSize;
    int number;
    int* numbersArray;
};


#endif //SDIZO_PROJEKT_FILEHANDLER_H
