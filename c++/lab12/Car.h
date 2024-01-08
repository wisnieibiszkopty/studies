//
// Created by student on 08.01.2024.
//

#ifndef LAB12_CAR_H
#define LAB12_CAR_H

#include <iostream>

using namespace std;

class Car {
private:
    string model;
    int productionYear;
    float engine;

public:
    Car(string model, int productionYear, float engine);

    const string getModel();
    void setModel(const string &model);
    int getProductionYear() const;
    void setProductionYear(int productionYear);
    float getEngine() const;
    void setEngine(int engine);

    void toString();
};


#endif //LAB12_CAR_H
