//
// Created by Kamil on 19.12.2023.
//

#ifndef LAB11_WAREHOUSE_H
#define LAB11_WAREHOUSE_H

#include <iostream>
#include <memory>

class Warehouse {
private:
    std::string product;
    int quantity;

public:
    Warehouse(const std::string &product, int quantity);
    ~Warehouse();

    const std::string &getProduct() const;
    void setProduct(const std::string &product);
    int getQuantity() const;
    void setQuantity(int quantity);

    void info();
};


#endif //LAB11_WAREHOUSE_H
