//
// Created by student on 16.10.2023.
//

#include "square.h"

Square::Square(float a1) {
    a = a1;
    cout << "Konstruktor Square" << endl;
}

Square::~Square()
{
    cout << "Destruktor Square" << endl;
}

void Square::calculateArea()
{
    float p = a*a;
    setArea(p);
}

void Square::calculateObwod()
{
    obwod = 4 * a;
}

void Square::show()
{
    cout<<"Show w klasie Square, pole: "<< getArea() << " obwod: " << obwod  <<endl;
}