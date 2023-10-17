#include "MeanBufor.h"

MeanBufor::MeanBufor()
{

}

MeanBufor::MeanBufor(int s)
{
}

double MeanBufor::calculate()
{
	double sum = 0.0;
	for (int i = 0; i < first; i++)
	{
		sum += array[i];
	}
	
	return sum / first;
}
