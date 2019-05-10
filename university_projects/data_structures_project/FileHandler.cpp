//
// Created by Wiktor Pieklik on 2019-03-23.
//

#include "FileHandler.h"

/**
 * Klasa odpowiedzialna za prace z plikami txt
 */



int FileHandler::getFileSize()
{
    if(fileSize > 0)
        return fileSize;

    return -1;
}

//odczytanie danych z pliku i zwrocenie ich w postaci wskaznika na tablice
int* FileHandler::readData()
{
    readFile.open(DATA_NAME);

    if(readFile.good())
    {
        readFile >> fileSize;
        numbersArray = new int[fileSize];
        int i = 0;
        while(i < fileSize)
        {
            readFile >> number;
            numbersArray[i] = number;
            i++;
        }

        readFile.close();
        return numbersArray;
    }
}


void FileHandler::printData(int data, bool override)
{
    if(override)
        writeFile.open(DATA_NAME);
    else
        writeFile.open(DATA_NAME, ios::app);

    if(writeFile.good())
        writeFile << data <<endl;
    writeFile.close();
}

void FileHandler::printData(string data, bool override)
{
    if(override)
        writeFile.open(DATA_NAME);
    else
        writeFile.open(DATA_NAME, ios::app);

    if(writeFile.good())
        writeFile << data <<endl;
    writeFile.close();
}

void FileHandler::printData(double data, bool override)
{
    if(override)
        writeFile.open(DATA_NAME);
    else
        writeFile.open(DATA_NAME, ios::app);

    if(writeFile.good())
        writeFile << data <<endl;
    writeFile.close();
}


