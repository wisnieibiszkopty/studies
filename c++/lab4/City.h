//
// Created by student on 30.10.2023.
//

#ifndef LAB4_CITY_H
#define LAB4_CITY_H

#include <vector>
#include <functional>
#include <algorithm>

#include "Citizen.h"
#include "PostalCode.h"

class City{
private:
    std::vector<Citizen> citizens;
    std::string city_name;

public:
    explicit City(const std::string &cityName);

    void addCitizen(Citizen &citizen);
    void deleteCitizen(std::string name, int age);
    void show_citizens();
    void show_city();
    int women();
    int city_citizens();
    int adults();
    int postal_codes();

    static void showCities(std::vector<City> cities);
    static void the_most(std::vector<City> cities, int mode);
    static void statatistic(std::vector<City> cities);
    static void sort_cities(std::vector<City>& cities);


};


#endif //LAB4_CITY_H
