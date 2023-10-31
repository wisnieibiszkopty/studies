cmake_minimum_required(VERSION 3.26)
project(lab4)

set(CMAKE_CXX_STANDARD 17)

add_executable(ab4 main.cpp
			Citizen.cpp 
			Citizen.h
			City.cpp
			City.h 
			"Citizen.cpp" "Citizen.h" "City.cpp" "City.h" "PostalCode.cpp" "PostalCode.h")