#include "Dictionary.h"

void Dictionary::addWord(std::string word, std::string translation)
{
	if (words.find(word) == words.end())
	{
		// s³owa nie ma w s³owniku
		words[word] = translation;
	}
	else
	{
		std::cout << "Element juz istnieje!" << std::endl;
	}
}

void Dictionary::deleteWord(std::string word)
{
	words.erase(word);
}

void Dictionary::show()
{
	for (const auto& [key, value] : words)
	{
		std::cout << key << " -> " << value << std::endl;
	}
}

void Dictionary::translate(std::string word)
{
	if (words.find(word) != words.end())
	{
		std::cout << "Tlumacznie: " << words[word] << std::endl;
	}
	else
	{
		std::cout << "W slowniku nie ma takiego slowa!" << std::endl;
	}
}

bool compare(std::pair<std::string, std::string>& w1, std::pair<std::string, std::string>& w2)
{
	return w1.second > w2.second;
}

void Dictionary::sort()
{
	std::vector<std::pair<std::string, std::string>> v;

	for (auto& it : words)
	{
		v.push_back(it);
	}

	std::sort(v.begin(), v.end(), compare);

	for (auto& it : v)
	{
		std::cout << it.first << " -> " << it.second << std::endl;
	}
}
