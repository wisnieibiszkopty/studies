//
// Created by student on 16.10.2023.
//

#include "Employee.h"

Employee::Employee()
{
    cout << "Konstruktor Employee" << endl;
}

Employee::Employee(const string &surname, int age, int experience, double salary):
surname(surname), age(age), experience(experience), salary(salary){}

Employee::~Employee()
{
    cout << "Destruktor Employye" << endl;
}

void Employee::show()
{
    cout << "Pracownik\nNazwisko: " << surname << endl
    << "Wiek: " << age << endl
    << "Doswiadczenie: " << experience << endl
    << "Wyplata: " << salary << endl;
}

int Employee::ageEmployment()
{
    return age - experience;
}

void Employee::whoWorkMoreThan5Years(Employee **employees, int size)
{
    for(int i=0; i<size; i++)
    {
        if(employees[i]->getExperience() > 5)
        {
            employees[i]->show();
        }
    }
}

void Employee::howManyEarnLessThanMeanBonus(Employee **employees, int size)
{
    double sum = 0.0;

    for(int i=0; i<size; i++)
    {
        sum += employees[i]->calculateBonus(employees[i]->getSalary());
    }

    double mean = sum / size;

    for(int i=0; i<size; i++)
    {
        if(employees[i]->calculateBonus(employees[i]->getSalary()) > mean)
        {
            employees[i]->show();
        }
    }
}

const string &Employee::getSurname() const
{
    return surname;
}

int Employee::getAge() const
{
    return age;
}

int Employee::getExperience() const
{
    return experience;
}

int Employee::getSalary() const
{
    return salary;
}

void Employee::setSurname(const string &surname)
{
    Employee::surname = surname;
}

void Employee::setAge(int age) {
    Employee::age = age;
}

void Employee::setExperience(int experience)
{
    Employee::experience = experience;
}

void Employee::setSalary(int salary)
{
    Employee::salary = salary;
}


