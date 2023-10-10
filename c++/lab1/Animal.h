//
// Created by student on 09.10.2023.
//

#ifndef UNTITLED_ANIMAL_H
#define UNTITLED_ANIMAL_H

#include <iostream>
using namespace std;

class Animal {
protected:
    int limbNr;
    std::string name;
    bool protectedAnimal;
public:
    Animal();
    Animal(int limbs, string name1, bool isProtected=true);

    void setLimbNr(int limbNr);
    void setName(const string &name);
    void setProtectedAnimal(bool protectedAnimal);

    int getLimbNr() const;
    const string &getName() const;
    bool isProtectedAnimal() const;

    void giveVoice();
    void info();
};


#endif //UNTITLED_ANIMAL_H
