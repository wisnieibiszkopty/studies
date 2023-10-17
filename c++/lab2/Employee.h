//
// Created by student on 16.10.2023.
//

#ifndef LAB2_EMPLOYEE_H
#define LAB2_EMPLOYEE_H

#include <iostream>
using namespace std;

class Employee {
protected:
    string surname;
    int age;
    int experience;
    double salary;
public:
    Employee();

    Employee(const string &surname, int age, int experience, double salary);

    virtual ~Employee();
    virtual void show();
    virtual double calculateBonus(int value) = 0;
    int ageEmployment();

    static void whoWorkMoreThan5Years(Employee** employees, int size);
    static void howManyEarnLessThanMeanBonus(Employee** employees, int size);

    const string &getSurname() const;
    int getAge() const;
    int getExperience() const;
    int getSalary() const;

    void setSurname(const string &surname);
    void setAge(int age);
    void setExperience(int experience);
    void setSalary(int salary);
};


#endif //LAB2_EMPLOYEE_H
