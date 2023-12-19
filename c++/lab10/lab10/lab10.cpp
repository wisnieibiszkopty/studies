// lab10.cpp: definiuje punkt wejścia dla aplikacji.
//
#include <iostream>
#include <string>
#include <algorithm>
#include <regex>

#include "lab10.h"

using namespace std;

void print(char x) {
	cout << x << "|";
}

char toUpper(char ch) {
	if ((ch >= 'a' and ch <= 'z')) return ch - 32;
	return ch;
}

bool numberRegex(string number) {
	regex regPattern("[+-]?([0-9]*[.])?[0-9]+");
	return (regex_match(number, regPattern));
}

bool dateRegex(string date) {
	regex regPattern("((^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$)|(^(?:([01]?\d|2[0-3]):([0-5]?\d):)?([0-5]?\d)$)");
	return (regex_match(date, regPattern));
}


int main()
{
	//string line1 = "Programowanie";
	//string line2("Programowanie");
	//cout << "Podaj slowo: " << endl;
	//cin >> line1;
	//cin.clear();
	//cin.ignore();
	//cout << "Wczytane slowo: " << line1 << endl;
	//getline(cin, line2);
	//cout << "Zdanie: " << line2 << endl;
	//if (line1 == line2) {
	//	cout << "Napisy sa takie same" << endl;
	//}
	//else {
	//	cout << "Napisy roznia sie" << endl;
	//}
	//line1 = line1 + " " + line2;

	//cout << "Napis: " << line1 << endl;
	//cout << "Druga litera: " << line1[1] << endl;
	//cout << "Napis w for: " << endl;
	//for (int i = 0; i < line1.length(); i++) {
	//	cout << line1[i];
	//}
	//cout << endl;
	//line1.append(" i psa");
	//cout << "Napis po append: " << line1 << endl;
	//int ind = line1.find('a');

	//cout << "Pierwsze wystapienie znkau 'a' " << ind << endl;
	//ind = line1.find('a', 7);

	//cout << "Pierwsze wystapienie znkau 'a' po 7 pozycji " << ind << endl;
	//ind = line1.find_last_not_of("kgtoa");

	//cout << "Ostatnie wystepienie litery ktora nie jest kgtoa:" << ind << endl;
	//line2 = line1.substr(0, 3);

	//cout << "Substr(0,3): " << line2 << endl;
	//line1.insert(line1.begin(), '*');
	//line1.push_back('*');
	//cout << "Napis po insert i push_back: " << line1 << endl;
	//for (string::iterator it = line1.begin();
	//	it != line1.end(); it++)
	//	cout << *it;
	//string::iterator del;
	//del = line1.erase(line1.begin() + 0, line1.begin() + 5);
	//cout << *del << endl;
	//cout << "Napis po erase: " << line1 << endl;
	//
	//cout << "Transform" << endl;
	//transform(line1.begin(), line1.end(), line1.begin(), toUpper);
	//cout << line1 << endl;

	///*cout << "find" << endl;
	//del = find(line1.begin(), line1.end(), 'K');
	//cout << *del << endl;*/

	//cout << "for_each" << endl;
	//for_each(line1.begin(), line1.end(), print);

	/*string line = "Programowanie w C++";
	if (regex_match(line, regex("(Prog)(.*)")))
		cout << "Znaleziono" << endl;
	else
		cout << "Nie znaleziono!" << endl;

	cout << "Regex 2: " << endl;
	regex regPattern("(Prog)(.*)");
	if (regex_match(line, regPattern))
		cout << "Znaleziono" << endl;
	else
		cout << "Nie znaleziono!" << endl;

	cout << "REgex 3: " << endl;
	if (regex_match(line.begin(), line.end(), regPattern))
		cout << "Znaleziono" << endl;
	else
		cout << "Nie znaleziono!" << endl;

	smatch res;
	regPattern = "(Prog)(.*)";
	regex_match(line, res, regPattern);
	cout << "Regex_match: " << endl;
	cout << "Czy znaleziony? " << res.size() << endl;
	if (res.size() != 0)
	cout << "Wzorzec: " << res[0] << " zostal znaleziony" << endl;
	cout << endl << "Porownanie match i search" << endl;

	line = "*******Programowanie w C++********";
	regPattern = "(Prog)(.*)";
	regex_match(line, res, regPattern);
	cout << "Regex_match: " << endl;
	cout << "Czy znaleziony? " << res.size() << endl;
	if (res.size() != 0)
		cout << "Wzorzec: " << res[0] <<
		" zostal znaleziony" << endl;
	regex_search(line, res, regPattern);
	cout << "Regex_search: " << endl;
	cout << "Liczba dopasowan:" << res.size() << endl;
	cout << "res.str(): " << res.str() << endl;
	cout << "res.length(): " << res.length() << endl;
	cout << "res.position(): " << res.position() << endl;
	cout << "res.prefix: " << res.prefix().str() << endl;
	cout << "res.suffix: " << res.suffix().str() << endl;
	cout << endl;
	cout << "Podgrupy ver1:" << endl;
	for (int i = 0; i < res.size(); ++i)
		{
		cout << "[" << res[i] << "] ";
		cout << "res.str(): " << res.str(i) << endl;
		cout << "res.position(): " << res.position(i) << endl;
		cout << "res.dl: " << res.length(i) << endl;
		cout << endl;
		}
	cout << "Podgrupy ver2:" << endl;
	for (auto pos = res.begin(); pos != res.end(); pos++)
		{
		cout << "[" << *pos << "] ";
		cout << "dl: " << pos->length() << endl;
		}
	cout << endl << "Replace: " << endl;
	line = "*******Programowanie w C++********";
	regPattern = "(C\\+{2})";
	cout << "Przed replace: " << line << endl;
	line = regex_replace(line, regPattern, "Java");
	cout << "Po replace: " << line << endl;*/

	cout << "Znaleziony: " << numberRegex("0.453") << endl;
	cout << "Znaleziony: " << numberRegex("-54.413") << endl;
	cout << "Znaleziony: " << numberRegex("nienawidze boosta") << endl;

	cout << "Poprawna godzina" << dateRegex("10:46") << endl;
	cout << "Poprawna godzina" << dateRegex("jazda") << endl;
	cout << "Poprawna godzina" << dateRegex("19:46:01") << endl;
	cout << "Poprawna godzina" << dateRegex("312:43") << endl;

	return 0;
}
