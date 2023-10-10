//
// Created by student on 09.10.2023.
//

#include "Student.h"

Student::Student(string name1, string surname1, int age1, string index1) {
    init(name1, surname1, age1);
    index = index1;
}

Student::Student() {

}

void Student::setIndex(string newIndex) {
    this->index = newIndex;
}

string Student::getIndex() {
    return this->index;
}

void Student::showInfoStudent() {
    cout<<"Imie: "<<name<<" nazwisko: "<<surname<< "wiek: "<<age<<" indeks: "<<index<<endl;
}