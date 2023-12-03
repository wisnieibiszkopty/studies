#include <iostream>

using namespace std;

class BlackjackException : public exception
{
public:
	char* what()
	{
		char text[] = "Wartosc jest wieksza niz 21";
		return text;
	}
};

int increase_sum(int sum, int num)
{
	sum = sum + num;
	if (sum > 21)
	{
		throw BlackjackException();
	}
	return sum;
}

void blackjack()
{
	int sum = 0;
	int num;
	int tries = 0;

	while (sum < 21)
	{
		cout << "Aktualna suma: " << sum << ". Podaj liczbe: ";
		while (!(cin >> num))
		{
			cin.clear();
			cin.ignore(numeric_limits<streamsize>::max(), '\n');
			cout << "Bledne dane, wprowadz liczbe calkowita: ";
		}

		try
		{
			sum = increase_sum(sum, num);
		}
		catch (BlackjackException& e)
		{
			cout << "Liczba jest za duza, podaj inna (suma -> " << sum << "): ";
			while (!(cin >> num))
			{
				cin.clear();
				cin.ignore(numeric_limits<streamsize>::max(), '\n');
				cout << "Bledne dane, wprowadz liczbe calkowita: ";
			}

			sum += num;
		}

		tries++;
	}

	if (sum == 21)
	{
		cout << "Gratulacje, wygrales!" << endl;
	}
	else
	{
		cout << "Niestety przegrales" << endl;
	}
}