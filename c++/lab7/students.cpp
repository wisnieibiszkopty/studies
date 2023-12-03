#include <iostream>
#include <fstream>
#include <string>

using namespace std;

int students()
{
	cout << "Otwieranie pliku" << endl;
	ifstream file;
	file.open("dane.csv");
	if (!file.is_open())
	{
		cerr << "Nie udalo sie otworzyc pliku!" << endl;
		return 1;
	}

	string line;
	getline(file, line);
	cout << line << endl;

	while (getline(file, line))
	{
		cout << line << endl;
	}

	file.close();

	return 0;
}