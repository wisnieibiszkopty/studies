//
// Created by student on 16.10.2023.
//

#include "TeamLeader.h"

TeamLeader::TeamLeader()
{

}

TeamLeader::TeamLeader(const string &surname, int age, int experience, double salary) : Employee(surname, age,
                                                                                                 experience, salary) {}


double TeamLeader::calculateBonus(int value)
{
    double bonus = value * (1 + salary + experience);
    return bonus;
}

void TeamLeader::show()
{
    cout << "Jestem Team Leader z " << experience << " letnim doswiadczeniem" << endl;
}