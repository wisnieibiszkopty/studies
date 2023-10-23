//
// Created by student on 23.10.2023.
//

#ifndef STUDIES_ARRAY_H
#define STUDIES_ARRAY_H

#include <bits/stdc++.h>
#include <iostream>

template <typename T>
class Array {
private:
    T* arr;
    int max_size;
    int first;
public:
    Array(int n);
    Array();
    ~Array();
    void sort();
    T getMax();
    void show();
    void add(T element);
    T getFromIndex(int index);

};

template <typename T>
Array<T>::Array(int n)
{
    first = 0;
    max_size = n;
    arr = new T[max_size];
}

template <typename T>
Array<T>::Array()
{
    first = 0;
    max_size = 10;
    arr = new T[max_size];
}

template <typename T>
Array<T>::~Array()
{
    delete arr;
}

template <typename T>
void Array<T>::sort()
{
    std::sort(arr, arr + first);
}

template <typename T>
T Array<T>::getMax()
{
    T max = arr[0];
    for(int i=0; i<first; i++)
    {
        if(arr[i] > max) max = arr[i];
    }
    return max;
}

template <typename T>
void Array<T>::show()
{
    std::cout << "dzialam" << std::endl;
    for(int i=0; i<first; i++)
    {
        std::cout << arr[i] << " ";
        std::cout << std::endl;
    }
}

template <typename T>
void Array<T>::add(T element)
{
    if(first < max_size)
    {
        arr[first] = element;
        first++;

    }
    else
    {
        std::cout << "Nie ma miejsca w tablicy" << std::endl;
    }
}

template <typename T>
T Array<T>::getFromIndex(int index)
{
    return arr[index];
}

template<>
void Array<std::string>::sort()
{
    std::sort(arr, arr + first);
}

template<>
std::string Array<std::string>::getMax()
{
    std::string max = arr[0];
    for(int i=0; i<first; i++)
    {
        if(arr[i].length() > max.length()) max = arr[i];
    }
    return max;
}

#endif //STUDIES_ARRAY_H
