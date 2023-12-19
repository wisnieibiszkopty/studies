//
// Created by Kamil on 19.12.2023.
//

#include "Warehouse.h"

Warehouse::Warehouse(const std::string &product, int quantity) : product(product), quantity(quantity) {}

Warehouse::~Warehouse() {
    std::cout << "destruktor klasy warehouse" << std::endl;
}

const std::string &Warehouse::getProduct() const {
    return product;
}

void Warehouse::setProduct(const std::string &product) {
    Warehouse::product = product;
}

int Warehouse::getQuantity() const {
    return quantity;
}

void Warehouse::setQuantity(int quantity) {
    Warehouse::quantity = quantity;
}

void Warehouse::info() {
    std::cout << product << ", ilosc: " << quantity << std::endl;
}
