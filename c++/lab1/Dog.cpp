//
// Created by student on 09.10.2023.
//

#include "Dog.h"

Dog::Dog(int lambs, string name1, bool isProtected, string brd, int logs, int lots)
{
    limbNr = lambs;
    name = name1;
    protectedAnimal = isProtected;
    breed = brd;
    levelOfGuideSkills = logs;
    levelOfTrackerSkills = lots;

}

Dog::Dog(int lambs, string name1, bool isProtected)
{
    limbNr = lambs;
    name = name1;
    protectedAnimal = isProtected;
}

Dog::Dog()
{

}

void Dog::setSkillLevel(int type, int value) {
    if (value < 1 || value > 10) {
        cout << "Liczba spoza zakresu" << endl;
    }
    if (type == 0) {
        levelOfGuideSkills = value;
    }
    else if (type == 1) {
        levelOfTrackerSkills = value;
    }
    else {
        cout << "Niepoprawna typ" << endl;
    }
}

int Dog::getSkillLevel(int type) {
    if (type == 0) {
        return levelOfGuideSkills;
    }
    else if (type == 1) {
        return levelOfTrackerSkills;
    }
    else {
        cout << "Niepoprawny typ" << endl;
        return -1;
    }
}

void Dog::giveVoice() {
    cout << "Hau hau!" << endl;
}

void Dog::info() {
    cout << "Liczba konczyn: " << limbNr << " Nazwa: " << name << " jest chroniony: " << protectedAnimal <<
        " rasa: " << breed << " umiejetnosci przewodnika: " << levelOfGuideSkills 
        << " umiejetnosci tropiciela: " << levelOfTrackerSkills << endl;
}
