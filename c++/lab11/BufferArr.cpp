//
// Created by Kamil on 18.12.2023.
//

#include "BufferArr.h"

BufferArr::BufferArr(int n1) {
    n = n1;
    counter = 0;
    arr = std::unique_ptr<int[]> (new int[n]);

    std::cout << "Konstruktor klasy BufferArr" << std::endl;
}

void BufferArr::add(int a) {
    if(counter < n)
    {
        arr[counter] = a;
        counter++;
    }
    else
    {
        std::cout << "Nie ma juz miejsca w tablicy" << std::endl;
    }
}

void BufferArr::write() {
    for(int i=0; i<n; i++)
    {
        std::cout << arr[i] << std::endl;
    }
}

int BufferArr::getN() const {
    return n;
}

void BufferArr::setN(int n) {
    n = n;
}

const std::unique_ptr<int[]> &BufferArr::getArr() const {
    return arr;
}

