cmake_minimum_required(VERSION 3.26)
project(untitled)

set(CMAKE_CXX_STANDARD 17)

add_executable(untitled main.cpp
        Person.h
        Person.cpp
        Teacher.cpp
        Student.cpp
        Student.h
        Animal.cpp
        Animal.h
        Dog.cpp
        Dog.h
        Cat.cpp
        Cat.h)
