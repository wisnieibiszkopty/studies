//
// Created by student on 30.10.2023.
//

#include "City.h"

City::City(const std::string &cityName) : city_name(cityName) {}

void City::addCitizen(Citizen &citizen)
{
    citizens.push_back(citizen);
}

bool isEqual(const Citizen& c, const std::string name, const int age)
{
    return (c.getName() == name) && (c.getAge() == age);
}

void City::deleteCitizen(std::string name, int age)
{
    citizens.erase(std::remove_if(citizens.begin(), citizens.end(), [name, age](const Citizen& c)
    {
        return isEqual(c, name, age);
    }), citizens.end());
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

bool isWoman(Citizen& c)
{
    return c.getSex() == 'f';
}

int City::women()
{
    return std::count_if(citizens.begin(), citizens.end(), isWoman);
}

int City::city_citizens()
{
    return citizens.size();
}

bool isAdult(Citizen& c)
{
    return c.getAge() >= 18;
}

int City::adults()
{
    return std::count_if(citizens.begin(), citizens.end(), isAdult);
}

int City::postal_codes()
{
    PostalCode pc;
    std::string postal_code;
    for (int i = 0; i < citizens.size(); i++)
    {
        postal_code = citizens[i].getPostalCode();
        if(pc.getCodes().count(postal_code) > 0)
        {
            pc.increaseCitizens(postal_code);
        }
        else
        {
            pc.addCode(postal_code);
        }
    }
    pc.show();

    return pc.getCodes().size();
}

void showCity(City &city)
{
    city.show_city();
}

void City::showCities(std::vector<City> cities)
{
    std::for_each(cities.begin(), cities.end(), showCity);
}

// ale d³uga nazwa
void findCityWithMostDifferentPostalCodes(std::vector<City> cities)
{
    City max = cities[0];
    for (int i = 1; i < cities.size(); i++)
    {
        if (cities[i].postal_codes() > max.postal_codes())
        {
            max = cities[i];
        }
    }
    max.show_city();
}

void findCityWithSmallestPopulation(std::vector<City> cities)
{
    City min = cities[0];
    for (int i = 1; i < cities.size(); i++)
    {
        if (cities[i].city_citizens() < min.city_citizens())
        {
            min = cities[i];
        }
    }
    min.show_city();
}

void City::the_most(std::vector<City> cities, int mode)
{
    if (mode == 1)
    {
        findCityWithMostDifferentPostalCodes(cities);
    }
    else if (mode == 2)
    {
        findCityWithSmallestPopulation(cities);
    }
    else
    {
        std::cout << "Wrong mode" << std::endl;
    }
}

// print city name, number of citizens, divided by gender and age
void City::statatistic(std::vector<City> cities)
{
    for (auto& city : cities)
    {
        city.show_city();
        std::cout << "Population: " << city.city_citizens() << std::endl;
        std::cout << "Male: " << city.city_citizens() - city.women() << std::endl;
        std::cout << "Female: " << city.women() << std::endl;
        std::cout << "Adults: " << city.adults() << std::endl;
        std::cout << "Under age: " << city.city_citizens() - city.adults() << std::endl;
        std::cout << std::endl;
    }
}

bool compare_population(City c1, City c2)
{
    return c1.city_citizens() < c2.city_citizens();
}

void City::sort_cities(std::vector<City>& cities)
{
    sort(cities.begin(), cities.end(), compare_population);
}
