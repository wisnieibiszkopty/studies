//
// Created by Kamil on 19.12.2023.
//

#ifndef LAB11_SHOP_H
#define LAB11_SHOP_H

#include <iostream>
#include <vector>
#include <memory>

#include "Warehouse.h"

class Shop {
private:
    std::string name;
    std::vector<std::shared_ptr<Warehouse>> warehouses;

public:
    explicit Shop(std::string name);
    ~Shop();

    void add(std::shared_ptr<Warehouse> warehouse);
    void sell(std::string name, int quantity);
    void showWarehouses();
    void showName();
};


#endif //LAB11_SHOP_H
