//
// Created by student on 09.10.2023.
//

#ifndef UNTITLED_DOG_H
#define UNTITLED_DOG_H

#include "Animal.h"

class Dog : public Animal {
private:
    string breed;
    int levelOfGuideSkills;
    int levelOfTrackerSkills;
public:
    Dog(int lambs, string name1, bool isProtected, string brd, int logs, int lots);
    Dog(int lambs, string name1, bool isProtected);
    Dog();

    void setSkillLevel(int type, int value);
    int getSkillLevel(int type);
    void giveVoice();
    void info();
};


#endif //UNTITLED_DOG_H
