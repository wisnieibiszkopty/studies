//
// Created by student on 16.10.2023.
//

#ifndef LAB2_TEAMLEADER_H
#define LAB2_TEAMLEADER_H

#include "Employee.h"

class TeamLeader : public Employee {
public:
    TeamLeader();
    TeamLeader(const string &surname, int age, int experience, double salary);

    double calculateBonus(int value) override;
    void show() override;
};


#endif //LAB2_TEAMLEADER_H
