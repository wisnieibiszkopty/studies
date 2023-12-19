cmake_minimum_required(VERSION 3.27)
project(lab11)

set(CMAKE_CXX_STANDARD 17)

add_executable(lab11 main.cpp
        Person.h
        Elem.h
        Buffer.h
        BufferArr.cpp
        BufferArr.h
        FileBuffer.cpp
        FileBuffer.h
        Warehouse.cpp
        Warehouse.h
        Shop.cpp
        Shop.h
)
