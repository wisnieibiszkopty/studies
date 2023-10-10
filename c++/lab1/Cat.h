//
// Created by student on 09.10.2023.
//

#ifndef UNTITLED_CAT_H
#define UNTITLED_CAT_H

#include <iostream>
using namespace std;

#include "Animal.h"

class Cat: public Animal{
private:
	int levelOfMouseHunting;
	int mice[5];
public:
	Cat(int lambs, string name1, bool isProtected);
	Cat();

	void initMice(int* mouses);
	void setLevelOfMouseHunting(int value);
	int getLevelOfMouseHunting();
	int getMice(int index);

	void getVoice();
	void info();
};


#endif //UNTITLED_CAT_H
