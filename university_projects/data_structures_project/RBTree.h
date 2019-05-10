//
// Created by Wiktor Pieklik on 2019-03-23.
//

#ifndef SDIZO_PROJEKT_RBTREE_H
#define SDIZO_PROJEKT_RBTREE_H

#include <iostream>
#include <string>
using namespace std;

class RBTree{

private:
    typedef struct Node
    {
        Node* up;
        Node* left;
        Node* right;
        int key;
        char color;
    } TreeNode;

    TreeNode guard; //wezel straznika (S)
    TreeNode* root; //korzen drzewa

public:
    RBTree();
    ~RBTree();

    void printTree();
    bool findNode(int key);
    TreeNode* findConsequentNode(TreeNode* node);
    void rotateLeft(TreeNode* node); //rotacja wzgledem wezla 'node'
    void rotateRight(TreeNode* node);// rotacja wzgledem wezla 'node'
    TreeNode* minNode(TreeNode* node);
    void insertNode(int key); //wstawia wezel o kluczu 'key'
    void removeNode(TreeNode* nodeToDelete);
    void removeNode(int key);

private:
    void printTree(string divider, string line, TreeNode* node);
    void deleteNodes(TreeNode* node);
};


#endif //SDIZO_PROJEKT_RBTREE_H
