
#include <map>
#include <vector>
#include <algorithm>
#include <iostream>

class Dictionary
{
private:
	std::map<std::string, std::string> words;
public:
	Dictionary(){}

	void addWord(std::string word, std::string translation);
	void deleteWord(std::string word);
	void show();
	void translate(std::string word);
	void sort();
};