//
// Created by student on 16.10.2023.
//

#ifndef LAB2_SQUARE_H
#define LAB2_SQUARE_H

#include "figure.h"

class Square: public Figure {
private:
    float a;
public:
    Square(float a1);
    ~Square();
    virtual void calculateArea() override;
    virtual void calculateObwod() override;
    virtual void show() override;
};


#endif //LAB2_SQUARE_H
