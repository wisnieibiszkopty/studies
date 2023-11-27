//
// Created by student on 27.11.2023.
//

#ifndef LAB7_EDITOR_H
#define LAB7_EDITOR_H

#include <iostream>
#include <fstream>

using namespace std;

class Editor {
private:
    string filename;
    ifstream file;
public:
    Editor(string filename);

    void ignoreComments();
};


#endif //LAB7_EDITOR_H
