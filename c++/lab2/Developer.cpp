//
// Created by student on 16.10.2023.
//

#include "Developer.h"

Developer::Developer()
{

}

Developer::Developer(const string &surname, int age, int experience, double salary) : Employee(surname, age, experience,
                                                                                               salary) {}

double Developer::calculateBonus(int value)
{
    double bonus = value + 0.2 * value * (salary + experience);
    return bonus;
}