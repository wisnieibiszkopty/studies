//
// Created by student on 16.10.2023.
//

#ifndef LAB2_DEVELOPER_H
#define LAB2_DEVELOPER_H

#include "Employee.h"

class Developer: public Employee {
public:
    Developer();

    Developer(const string &surname, int age, int experience, double salary);

    double calculateBonus(int value) override;
};


#endif //LAB2_DEVELOPER_H
