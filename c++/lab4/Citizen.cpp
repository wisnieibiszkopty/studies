//
// Created by student on 30.10.2023.
//

#include "Citizen.h"

Citizen::Citizen() {}

Citizen::Citizen(const std::string &name, const std::string &surname, int age, char sex, const std::string &postalCode)
        : name(name), surname(surname), age(age), sex(sex), postal_code(postalCode) {}

const std::string &Citizen::getName() const
{
    return name;
}

void Citizen::setName(const std::string &name)
{
    Citizen::name = name;
}

const std::string &Citizen::getSurname() const
{
    return surname;
}

void Citizen::setSurname(const std::string &surname)
{
    Citizen::surname = surname;
}

int Citizen::getAge() const
{
    return age;
}

void Citizen::setAge(int age)
{
    Citizen::age = age;
}

char Citizen::getSex() const
{
    return sex;
}

void Citizen::setSex(char sex)
{
    Citizen::sex = sex;
}

const std::string &Citizen::getPostalCode() const
{
    return postal_code;
}

void Citizen::setPostalCode(const std::string &postalCode)
{
    postal_code = postalCode;
}

void Citizen::show()
{
    std::cout << "Name: " << name << " Surname: " << surname << " Age: " << age << " Sex: " << sex << " Postal code: " << postal_code << std::endl;
}

