//
// Created by student on 31.10.2023.
//

#ifndef LAB4_POSTALCODE_H
#define LAB4_POSTALCODE_H

#include <iostream>
#include <map>

class PostalCode {

private:
	std::map<std::string, int> postal_codes;
public:
	PostalCode();
	std::map<std::string, int> getCodes();
	void addCode(std::string code_name);
	void increaseCitizens(std::string code_name);
	void show();
};


#endif //LAB4_POSTALCODE
