//
// Created by student on 09.10.2023.
//

#ifndef UNTITLED_STUDENT_H
#define UNTITLED_STUDENT_H

#include "Person.h"

class Student: public Person {
private:
    string index;
public:
    Student(string name1, string surname1, int age1, string index);
    Student();

    void setIndex(string newIndex);
    string getIndex();
    void showInfoStudent();
};


#endif //UNTITLED_STUDENT_H
