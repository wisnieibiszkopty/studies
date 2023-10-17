//
// Created by student on 17.10.2023.
//

#ifndef LAB2_MEANBUFOR_H
#define LAB2_MEANBUFOR_H

#include "Bufor.h"

class MeanBufor: public Bufor {

public:
	MeanBufor();
	MeanBufor(int s);
	double calculate() override;

};


#endif //LAB2_MEANBUFOR_H
