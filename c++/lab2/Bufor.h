//
// Created by student on 17.10.2023.
//

#ifndef LAB2_BUFOR_H
#define LAB2_BUFOR_H

#include <iostream>

class Bufor {
protected:
	int* array;
	int size;
	int first;
public:
	Bufor();
	Bufor(int s);
	~Bufor();
	virtual void add(int value);
	virtual double calculate() = 0;
	int getIndex();
	int getSize();
	int getTab(int i);
	int getFirst();
	void setFirst(int value);
	void setTab(int pos, int value);
	void show();
};


#endif //LAB2_BUFOR_H
