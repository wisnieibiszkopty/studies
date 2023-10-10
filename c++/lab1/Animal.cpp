//
// Created by student on 09.10.2023.
//

#include "Animal.h"

Animal::Animal() {

}

Animal::Animal(int limbs, string name1, bool isProtected) {
    limbNr = limbs;
    name = name1;
    protectedAnimal = isProtected;
}

void Animal::setLimbNr(int limbNr) {
    Animal::limbNr = limbNr;
}

void Animal::setName(const string &name) {
    Animal::name = name;
}

void Animal::setProtectedAnimal(bool protectedAnimal) {
    Animal::protectedAnimal = protectedAnimal;
}

int Animal::getLimbNr() const {
    return limbNr;
}

const string &Animal::getName() const {
    return name;
}

bool Animal::isProtectedAnimal() const {
    return protectedAnimal;
}

void Animal::giveVoice()
{
    cout << "Chrum, miau, hau, piiii";
}

void Animal::info()
{
    cout << "Liczba konczyn: " << limbNr << " Nazwa: " << name << " jest chroniony: " << protectedAnimal << endl;
}
