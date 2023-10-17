cmake_minimum_required(VERSION 3.26)
project(lab2)

set(CMAKE_CXX_STANDARD 17)

add_executable(lab2 main.cpp
        figure.cpp
        figure.h
        figure.h
        square.cpp
        square.h
        square.h
        circle.cpp
        circle.h
        Employee.cpp
        Employee.h
        Developer.cpp
        Developer.h
        TeamLeader.cpp
        TeamLeader.h "Bufor.h" "Bufor.cpp" "MeanBufor.h" "MeanBufor.cpp" "MaxBufor.h" "MaxBufor.cpp")
