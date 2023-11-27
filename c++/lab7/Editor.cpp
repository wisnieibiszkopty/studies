//
// Created by student on 27.11.2023.
//

#include "Editor.h"

Editor::Editor(string filename)
{
    filename = filename;
}

void Editor::ignoreComments()
{
    file.open(filename);
    string line;
    char c;
    while(getline(file, line))
    {
        //c = file.get();
//        if(c == '/')
//        {
//            cout << "jazda" << endl;
//            if(file.peek() == '/')
//            {
//                file.ignore('\n');
//            }
//        }
//        else
//        {
//            cout << c << endl;
//        }
        cout << line << endl;
    }
    file.close();
}
