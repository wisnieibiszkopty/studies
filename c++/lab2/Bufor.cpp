#include "Bufor.h"

Bufor::Bufor()
{
	first = 0;
	size = 10;
	array = new int[size];
	array[first] = 0;
	first++;
}

Bufor::Bufor(int s)
{
	first = 0;
	size = s;
	array = new int[size];
	array[first] = 0;
	first++;
}

Bufor::~Bufor()
{
	delete[] array;
}

void Bufor::add(int value)
{
	if (first > size)
	{
		std::cout << "Nie ma juz wolnego miejsca w tablicy" << std::endl;
	}
	else
	{
		array[first] = value;
		first++;
	}
}

int Bufor::getIndex()
{
	return first;
}

int Bufor::getSize()
{
	return size;
}

int Bufor::getTab(int i)
{
	return array[i];
}

int Bufor::getFirst()
{
	return first;
}

void Bufor::setFirst(int value)
{
	array[first] = value;
}

void Bufor::setTab(int pos, int value)
{
	array[pos] = value;
}

void Bufor::show()
{
	for (int i = 0; i < first; i++)
	{
		std::cout << i+1 << ". element: " << array[i] << std::endl;
	}
}
