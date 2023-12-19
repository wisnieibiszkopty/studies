//
// Created by Kamil on 18.12.2023.
//

#ifndef LAB11_ELEM_H
#define LAB11_ELEM_H

#include <iostream>
#include <memory>

class Elem {
public:
    std::shared_ptr<Elem> next;
    std::shared_ptr<Elem> prev;
    ~Elem() {
        std::cout << "Destruktor Elem" << std::endl;
    }

};


#endif //LAB11_ELEM_H
