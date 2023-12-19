//
// Created by Kamil on 19.12.2023.
//

#include "Shop.h"

Shop::Shop(std::string name) : name(name) {}

Shop::~Shop() {
    std::cout << "Destrutkor klasy shop" << std::endl;
}

void Shop::add(std::shared_ptr<Warehouse> warehouse) {
    warehouses.push_back(std::move(warehouse));
}

void Shop::sell(std::string name, int quantity) {
    for(const auto& ptr : warehouses)
    {
        if(ptr->getProduct() == name && ptr->getQuantity() >= quantity)
        {
            std::cout << "Produkt sprzedany!" << std::endl;
        }

        std::cout << "Nie ma szukanego produktu :<<<" << std::endl;
    }
}

void Shop::showWarehouses() {
    std::cout << "Magazyny: " << std::endl;
    for(const auto& ptr : warehouses)
    {
        std::cout << ptr.get() << std::endl;
    }
}

void Shop::showName() {
    std::cout << "Nazwa sklepu: " << name << std::endl;
}
