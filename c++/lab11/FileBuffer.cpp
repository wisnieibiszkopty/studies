//
// Created by Kamil on 18.12.2023.
//

#include "FileBuffer.h"

#include <memory>
#include <utility>

FileBuffer::FileBuffer(std::string p) {
    path = p;
    std::cout << "Konstruktor klasy FileBuffer" << std::endl;
}

FileBuffer::~FileBuffer() {
    std::cout << "Destruktor klasy FileBuffer" << std::endl;
}

void FileBuffer::add(int a) {
    std::ofstream outputFile(path, std::ios::app);

    if (outputFile.is_open()) {
        outputFile << a << std::endl;
        outputFile.close();
    } else {
        std::cerr << "Nie udało się otworzyć pliku do zapisu." << std::endl;
    }
}

void FileBuffer::write() {
    std::ifstream inputFile(path);

    if (inputFile.is_open()) {
        std::string line;
        while (std::getline(inputFile, line)) {
            std::cout << line << std::endl;
        }

        inputFile.close();
    } else {
        std::cerr << "Nie udało się otworzyć pliku do odczytu." << std::endl;
    }
}
