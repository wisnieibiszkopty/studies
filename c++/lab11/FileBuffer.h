//
// Created by Kamil on 18.12.2023.
//

#ifndef LAB11_FILEBUFFER_H
#define LAB11_FILEBUFFER_H

#include <iostream>
#include <fstream>
#include <string>
#include <memory>

#include "Buffer.h"

class FileBuffer : public Buffer {
private:
    std::string path;
public:
    explicit FileBuffer(std::string p);
    ~FileBuffer();
    void add(int a);
    void write();
};


#endif //LAB11_FILEBUFFER_H
