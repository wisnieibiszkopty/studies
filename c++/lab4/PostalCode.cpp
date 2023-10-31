#include "PostalCode.h"

PostalCode::PostalCode()
{
}

std::map<std::string, int> PostalCode::getCodes()
{
	return postal_codes;
}

void PostalCode::addCode(std::string code_name)
{
	postal_codes[code_name] = 1;
}

void PostalCode::increaseCitizens(std::string code_name)
{
	postal_codes[code_name] = postal_codes[code_name] + 1;
}

void PostalCode::show()
{
	for (const auto& [key, value] : postal_codes)
	{
		std::cout << key << " -> " << value << std::endl;
	}
}
