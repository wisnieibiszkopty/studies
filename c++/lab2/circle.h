//
// Created by student on 16.10.2023.
//

#ifndef LAB2_CIRCLE_H
#define LAB2_CIRCLE_H

#include "figure.h"

class Circle: public Figure{
private:
    float r;
public:
    Circle(float r1);
    ~Circle();
    virtual void calculateArea() override;
    virtual void calculateObwod() override;
    virtual void show() override;
};


#endif //LAB2_CIRCLE_H
