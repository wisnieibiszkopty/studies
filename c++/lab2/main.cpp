#include <iostream>

#include "figure.h"
#include "square.h"
#include "circle.h"
#include "Employee.h"
#include "Developer.h"
#include "TeamLeader.h"
#include "Bufor.h"
#include "MeanBufor.h"
#include "MaxBufor.h"

// #define zad1
// #define zad2
#define zad3

int main() {
#ifdef zad1
    Figure* f1 = new Square(5);
    Figure* f2 = new Circle(2);

    f1->calculateArea();
    f1->calculateObwod();
    f1->show();

    f2->calculateArea();
    f2->calculateObwod();
    f2->show();

    delete f1;
    delete f2;
#endif
#ifdef zad2
    int size = 4;
    Employee* d1 = new Developer("Wodowski", 21, 30, 14000);
    Employee* d2 = new Developer("Winski", 22, 2, 16000);
    Employee* tl1 = new TeamLeader("Kowalski", 30, 6, 10000);
    Employee* tl2 = new TeamLeader("Zielonka", 26, 8, 12000);

    Employee** employees;
    employees = new Employee * [4];
    employees[0] = d1;
    employees[1] = d2;
    employees[2] = tl1;
    employees[3] = tl2;


    Employee::whoWorkMoreThan5Years(employees, size);
    Employee::howManyEarnLessThanMeanBonus(employees, size);

    for (int i = 0; i < size; i++)
    {
        delete employees[i];
    }
    delete[] employees;

#endif
#ifdef zad3
    Bufor* mean_b = new MeanBufor(5);
    mean_b->add(3);
    mean_b->add(1);
    mean_b->add(2);
    cout << mean_b->getFirst() << endl;
    mean_b->setTab(0, 29);
    mean_b->show();

    Bufor* max_b = new MaxBufor(8);
    max_b->add(12);
    max_b->add(132);
    max_b->add(89);
    cout << "max: " << max_b->calculate() << endl;
    max_b->show();

    delete mean_b;
    delete max_b;
#endif
    return 0;
}
