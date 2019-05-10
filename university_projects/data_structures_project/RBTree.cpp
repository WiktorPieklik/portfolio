//
// Created by Wiktor Pieklik on 2019-03-23.
//

#include "RBTree.h"

RBTree::RBTree()
{
    guard.color = 'B';
    guard.up = &guard;
    guard.left = &guard;
    guard.right = &guard;
    root = &guard;
}

RBTree::~RBTree()
{
    deleteNodes(root);
}

void RBTree::deleteNodes(RBTree::TreeNode *node)
{
    if(node != &guard)
    {
        deleteNodes(node->left);   // usuwanie lewego poddrzewa
        deleteNodes(node->right);  // usuwanie prawego poddrzewa
        delete node;              // usuniecie wezla podanego jako parametr
    }
}

bool RBTree::findNode(int key)
{
    TreeNode* nodeToFind;

    nodeToFind = root;
    while((nodeToFind != &guard) && (nodeToFind->key != key))
    {
        if (key < nodeToFind->key)
            nodeToFind = nodeToFind->left;
        else
            nodeToFind = nodeToFind->right;
    }

    if(nodeToFind == &guard)
        return false;
    return true;
}

RBTree::TreeNode* RBTree::minNode(RBTree::TreeNode *node)
{
    if(node != &guard)
        while(node->left != &guard)
            node = node->left;

    return node;
}

RBTree::TreeNode* RBTree::findConsequentNode(RBTree::TreeNode *node)
{
    TreeNode* consequent;

    if(node != &guard)
    {
        if(node->right != &guard)
            return minNode(node->right);
        else
        {
            consequent = node->up;
            while((consequent != &guard) && (node == consequent->right))
            {
                node = consequent;
                consequent= consequent->up;
            }
            return consequent;
        }
    }
    return &guard;
}

//rotacja w lewo wzgledem danego wezla
void RBTree::rotateLeft(RBTree::TreeNode *node)
{
    TreeNode *B, *parent;

    B = node->right;
    if(B != &guard)
    {
        parent = node->up;
        node->right = B->left;
        if(node->right != &guard)
            node->right->up = node;

        B->left = node;
        B->up = parent;
        node->up = B;

        if(parent != &guard)
        {
            if(parent->left == node)
                parent->left = B;
            else
                parent->right = B;
        }
        else root = B;
    }
}

//rotacja w prawa wzgledem danego wezla
void RBTree::rotateRight(RBTree::TreeNode *node)
{
    TreeNode * B, * parent;

    B = node->left;
    if(B != &guard)
    {
        parent = node->up;
        node->left = B->right;
        if(node->left != &guard)
            node->left->up = node;

        B->right = node;
        B->up = parent;
        node->up = B;

        if(parent != &guard)
        {
            if(parent->left == node)
                parent->left = B;
            else
                parent->right = B;
        }
        else
            root = B;
    }
}

void RBTree::insertNode(int key)
{
    TreeNode *newNode, *uncleNode;

    newNode = new TreeNode;        //nowy węzeł
    newNode->left = &guard;
    newNode->right = &guard;
    newNode->up = root;
    newNode->key = key;

    if(newNode->up == &guard)
        root = newNode; //newNode staje się korzeniem
    else{

        while (true)             //poszukiwanie liscia do zastapienia przez newNode
        {
            if (key < newNode->up->key)
            {
                if (newNode->up->left == &guard)
                {
                    newNode->up->left = newNode;  //zastepywanie lewego liscia przez newNode
                    break;
                }
                newNode->up = newNode->up->left;
            } else{
                if (newNode->up->right == &guard) {
                    newNode->up->right = newNode; //zastepywanie prawego liscia przez newNode
                    break;
                }
                newNode->up = newNode->up->right;
            }
        }
    }

    newNode->color = 'R';         //kolor wezla = czerwony
    while((newNode != root) && (newNode->up->color == 'R'))
    {
        if(newNode->up == newNode->up->up->left)
        {
            uncleNode = newNode->up->up->right; //uncleNode jest wujkiem dla newNode

            if(uncleNode->color == 'R')
            {
                newNode->up->color = 'B';
                uncleNode->color = 'B';
                newNode->up->up->color = 'R';
                newNode = newNode->up->up;
                continue;
            }

            if(newNode == newNode->up->right)
            {
                newNode = newNode->up;
                rotateLeft(newNode);
            }

            newNode->up->color = 'B';
            newNode->up->up->color = 'R';
            rotateRight(newNode->up->up);
            break;
        }
        else
        {
            uncleNode = newNode->up->up->left; //lustrzane przypadki dla tych powyzej

            if(uncleNode->color == 'R')
            {
                newNode->up->color = 'B';
                uncleNode->color = 'B';
                newNode->up->up->color = 'R';
                newNode = newNode->up->up;
                continue;
            }

            if(newNode == newNode->up->left)
            {
                newNode = newNode->up;
                rotateRight(newNode);
            }

            newNode->up->color = 'B';
            newNode->up->up->color = 'R';
            rotateLeft(newNode->up->up);
            break;
        }
    }
    root->color = 'B';
}

void RBTree::removeNode(RBTree::TreeNode *nodeToDelete)
{
    TreeNode * W, * Y, * Z;

    if((nodeToDelete->left == &guard) || (nodeToDelete->right == &guard))
        Y = nodeToDelete;
    else
        Y = findConsequentNode(nodeToDelete);

    if(Y->left != &guard)
        Z = Y->left;
    else
        Z = Y->right;

    Z->up = Y->up;

    if(Y->up == &guard)
        root = Z;
    else if(Y == Y->up->left)
        Y->up->left  = Z;
    else
        Y->up->right = Z;

    if(Y != nodeToDelete)
        nodeToDelete->key = Y->key;

    if(Y->color == 'B')
    {
        while ((Z != root) && (Z->color == 'B')) // Naprawianie drzewa czerwono-czarnego
            if (Z == Z->up->left) {
                W = Z->up->right;

                if (W->color == 'R')
                {
                    W->color = 'B';
                    Z->up->color = 'R';
                    rotateLeft(Z->up);
                    W = Z->up->right;
                }

                if ((W->left->color == 'B') && (W->right->color == 'B'))
                {
                    W->color = 'R';
                    Z = Z->up;
                    continue;
                }

                if (W->right->color == 'B')
                {
                    W->left->color = 'B';
                    W->color = 'R';
                    rotateRight(W);
                    W = Z->up->right;
                }

                W->color = Z->up->color;
                Z->up->color = 'B';
                W->right->color = 'B';
                rotateLeft(Z->up);
                Z = root;         //wyjscie z pteli
            } else{                //lustrzane przypadki dla tych powyzej
                W = Z->up->left;

                if (W->color == 'R')
                {
                    W->color = 'B';
                    Z->up->color = 'R';
                    rotateRight(Z->up);
                    W = Z->up->left;
                }

                if ((W->left->color == 'B') && (W->right->color == 'B'))
                {
                    W->color = 'R';
                    Z = Z->up;
                    continue;
                }

                if (W->left->color == 'B')
                {
                    W->right->color = 'B';
                    W->color = 'R';
                    rotateLeft(W);
                    W = Z->up->left;
                }

                W->color = Z->up->color;
                Z->up->color = 'B';
                W->left->color = 'B';
                rotateRight(Z->up);
                Z = root;         //wyjscie z petli
            }
    }

    Z->color = 'B';

    delete Y;
}

void RBTree::removeNode(int key)
{
    TreeNode* nodeToFind;

    nodeToFind = root;
    while((nodeToFind != &guard) && (nodeToFind->key != key))
    {
        if (key < nodeToFind->key)
            nodeToFind = nodeToFind->left;
        else
            nodeToFind = nodeToFind->right;
    }

    if(nodeToFind != &guard)
        removeNode(nodeToFind);

}

//rekurencyjne wywolania rysowania drzewa dla lewego poddrzewa i prawego poddrzewa
void RBTree::printTree(string divider, string line, RBTree::TreeNode *node)
{
    string t;
    string colon1, colon2, colon3;
    colon1 = colon2 = colon3 = "  ";
    colon1[0] = '/'; colon1[1] = '-';
    colon2[0] = '\\'; colon2[1] = '-';
    colon3[0] = '|';

    if(node != &guard)
    {
        t = divider;
        if(line == colon1)
            t[t.length() - 2] = ' ';
        printTree(t+colon3,colon1,node->right);

        t = t.substr(0,divider.length()-2);
        cout << t << line << "("<< node->color<<")" << ":" << node->key << endl;

        t = divider;
        if(line == colon2)
            t[t.length() - 2] = ' ';
        printTree(t+colon3,colon2,node->left);
    }
}

void RBTree::printTree()
{
    printTree("","", root);
}
