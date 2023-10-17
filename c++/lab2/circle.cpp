//
// Created by student on 16.10.2023.
//

#include "circle.h"

Circle::Circle(float r1)
{
    r = r1;
    cout << "Konstrutor Circle" << endl;
}

Circle::~Circle()
{
    cout << "Destruktor Circle" << endl;
}

void Circle::calculateArea()
{
    float p = 3.14*r*r;
    setArea(p);
}

void Circle::calculateObwod()
{
    obwod = 2 * 3.14 * r;
}

void Circle::show()
{
    cout << "Show w klasie Circle " << obwod << endl;
}