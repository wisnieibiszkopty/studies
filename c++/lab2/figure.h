//
// Created by student on 16.10.2023.
//

#ifndef LAB2_FIGURE_H
#define LAB2_FIGURE_H

#include <iostream>

using namespace std;

class Figure {
private:
    float area;
protected:
    float obwod;
public:
    Figure();
    virtual ~Figure();
    float getArea();
    void setArea(float area1);
    virtual void calculateArea() = 0;
    virtual void calculateObwod() = 0;
    virtual void show();
};


#endif //LAB2_FIGURE_H
