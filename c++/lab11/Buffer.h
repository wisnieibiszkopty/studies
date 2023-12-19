//
// Created by Kamil on 18.12.2023.
//

#ifndef LAB11_BUFFER_H
#define LAB11_BUFFER_H

#include <iostream>

class Buffer {
public:
    Buffer(){ std::cout << "Konstruktor Buffer" << std::endl; }
    ~Buffer(){ std::cout << "Destruktor Buffer" << std::endl; }

    virtual void add(int a) = 0;
    virtual void write() = 0;
};


#endif //LAB11_BUFFER_H
