//
// Created by student on 23.10.2023.
//

#ifndef STUDIES_ADDING_H
#define STUDIES_ADDING_H

#include <iostream>

template <typename T>
class Adding {
private:
    T element;
public:
    Adding(T value);
    void add(T value);
    void show();
};

template <typename T>
Adding<T>::Adding(T value)
{
    element = value;
}

template <typename T>
void Adding<T>::add(T value)
{
    element += value;
}

template <typename T>
void Adding<T>::show()
{
    std::cout << element << std::endl;
}

#endif //STUDIES_ADDING_H
