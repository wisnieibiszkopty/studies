//
// Created by student on 17.10.2023.
//

#ifndef LAB2_MAXBUFOR_H
#define LAB2_MAXBUFOR_H

#include <algorithm>

#include "Bufor.h"

class MaxBufor : public Bufor {

public:
	MaxBufor();
	MaxBufor(int s);
	double calculate() override;

};


#endif //LAB2_MAXBUFOR_H
