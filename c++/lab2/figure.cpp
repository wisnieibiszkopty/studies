//
// Created by student on 16.10.2023.
//

#include "figure.h"

Figure::Figure()
{
    cout << "Konstruktor Figure" << endl;
}

Figure::~Figure()
{
    cout << "Destruktor Figure" << endl;
}

float Figure::getArea()
{
    return area;
}

void Figure::setArea(float area1)
{
    area = area1;
}

void Figure::show()
{
    cout << "Pole: " << area << endl;
}
