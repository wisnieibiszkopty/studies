//
// Created by student on 08.01.2024.
//

#include "Car.h"

Car::Car(string model, int productionYear, float engine) : model(model), productionYear(productionYear),
                                                                engine(engine) {}

const string Car::getModel() {
    return model;
}

void Car::setModel(const string &model) {
    Car::model = model;
}

int Car::getProductionYear() const {
    return productionYear;
}

void Car::setProductionYear(int productionYear) {
    Car::productionYear = productionYear;
}

float Car::getEngine() const {
    return engine;
}

void Car::setEngine(int engine) {
    Car::engine = engine;
}

void Car::toString() {
    cout << "Model: " << model <<
    " rok produkcji: " << productionYear <<
    " pojemnosc silnika: " << engine << endl;
}
