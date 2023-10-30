//
// Created by student on 30.10.2023.
//

#include "City.h"

City::City(const std::string &cityName) : city_name(cityName) {}

void City::addCitizen(Citizen &citizen)
{
    citizens.push_back(citizen);
}

void City::deleteCitizen(std::string name, int age)
{

}

void City::show_citizens()
{
    for(int i=0; i<citizens.size(); i++)
    {
        citizens[i].show();
    }
}

void City::show_city()
{
    std::cout << "City name: " << city_name << std::endl;
}

int City::women()
{
    return 0;
}

int City::city_citizens()
{
    return 0;
}

int City::adults()
{
    return 0;
}

int City::postal_codes()
{
    return 0;
}

void City::showCities(std::vector<City> c)
{

}

void City::the_most(std::vector<City> c, int mode)
{

}

void City::statatistic(std::vector<City> c)
{

}

void City::sort_cities(std::vector<City> &c)
{

}
