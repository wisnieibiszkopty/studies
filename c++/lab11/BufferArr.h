//
// Created by Kamil on 18.12.2023.
//

#ifndef LAB11_BUFFERARR_H
#define LAB11_BUFFERARR_H

#include <iostream>
#include <memory>

#include "Buffer.h"

class BufferArr : public Buffer {
private:
    int n;
    int counter;
    std::unique_ptr<int[]> arr;
public:
    explicit BufferArr(int n1);
    ~BufferArr(){ std::cout << "Destruktor klasy BufferArr" << std::endl; }
    void add(int a);
    void write();

    int getN() const;
    void setN(int n);
    const std::unique_ptr<int[]> &getArr() const;
};


#endif //LAB11_BUFFERARR_H
