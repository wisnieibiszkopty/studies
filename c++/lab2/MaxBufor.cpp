#include "MaxBufor.h"

MaxBufor::MaxBufor()
{

}

MaxBufor::MaxBufor(int s)
{

}

double MaxBufor::calculate()
{
	int max = array[0];
	for (int i = 1; i < first; i++)
	{
		if (array[i] > max)
		{
			max = array[i];
		}
	}
	return (double)max;
}
