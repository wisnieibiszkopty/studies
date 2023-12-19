//
// Created by Kamil on 18.12.2023.
//

#ifndef LAB11_PERSON_H
#define LAB11_PERSON_H

#include <iostream>

class Person {
private:
    std::string name;
    int age;
public:
    Person(std::string name1, int age1)
    {
        name = name1;
        age = age1;
    }

    void info()
    {
        std::cout << "name: " << name << " age: " << age << std::endl;
    }
};


#endif //LAB11_PERSON_H
