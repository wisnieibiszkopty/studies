#include <iostream>
#include <vector>
#include <list>
#include <random>
#include <algorithm>
#include <functional>

#include "Citizen.h"
#include "City.h"

using namespace std;

// #define zad1
// #define zad2
// #define zad2_vec
// #define zad3
#define zad4

template <typename T>
void show(T &con)
{
    for(typename T::iterator it=con.begin( ); it!=con.end( ); it++)
        cout << *it << " ";
    cout << endl;
}

bool sortBySum(int n1, int n2);
bool sortByNumberOfDigits(int n1, int n2);
void print(int n);


// zrob 4.2 dla listy

int main() {
#ifdef zad1
    /*vector<int> v;
    v.push_back(5);
    v.push_back(1);
    v.push_back(12);
    v.push_back(32);

    for(int i=0; i<v.size(); i++)
    {
        cout << v[i] << endl;
    }

    cout << "at" << endl;
    for(int i=0; i<v.size(); i++)
    {
        cout << v.at(i) << endl;
    }

    cout << "Iterator" << endl;
    vector<int>::iterator it;
    for(it=v.begin(); it != v.end(); it++)
    {
        cout << *it << endl;
    }

    cout << "begin: " << *v.begin() << " front " << v.front() << endl;
    cout << "end: " << *(v.end()-1) << " back " << v.back() << endl;

    show(v);
    v.pop_back();
    show(v);*/

    /*vector<int> numbers = {6, 8, 1, 12, 19, 4};
    show(numbers);
    sort(numbers.begin(), numbers.end());
    show(numbers);

    cout << "binary search: " << endl;
    cout << binary_search(numbers.begin(), numbers.end(), 3) << endl;

    cout << "count: " << endl;
    cout << count(numbers.begin(), numbers.begin() + 4);
    show(numbers);*/

#endif
#ifdef zad2
    random_device rand;
    mt19937 gen(rand());
    uniform_int_distribution<> dis(1, 100);
    int random_number = dis(gen);
    cout << random_number << endl;

    list<int> l;
    uniform_int_distribution<> dis1(-100, 100);
    int rnd;
    for (int i = 0; i < random_number; i++)
    {
        rnd = dis1(gen);
        if(rnd > 0)
        {
            l.push_front(rnd);
        }
        else
        {
            l.push_back(rnd);
        }
    }

    show(l);


#endif
#ifdef zad2_vec
    random_device rand;
    mt19937 gen(rand());
    uniform_int_distribution<> dis(1, 100);
    int random_number = dis(gen);
    cout << random_number << endl;

    vector<int> vec;
    uniform_int_distribution<> dis1(-100, 100);
    int rnd;
    for (int i = 0; i < random_number; i++)
    {
        rnd = dis1(gen);
        if(rnd > 0)
        {
            vec.insert(vec.begin(), rnd);
        }
        else
        {
           vec.push_back(rnd);
        }
    }

    show(vec);
#endif
#ifdef zad3
    // initialization
    Citizen c1("Kamil", "Wodowski", 21, 'm', "21-104");
    Citizen c2("Pawel", "Winski", 22, 'm', "20-200");
    Citizen c3("Krystian", "Zielonka", 21, 'm', "20-200");
    Citizen c4("Emilia", "Wojcik", 20, 'f', "24-085");
    Citizen c5("Julia", "Sierpien", 23, 'f', "21-104");
    City city("Lublin");
    city.addCitizen(c1);
    city.addCitizen(c2);
    city.addCitizen(c3);
    city.addCitizen(c4);
    city.addCitizen(c5);

    // counting women
    cout << "Women: " << city.women() << endl;

    // number of citizens
    cout << "Citizens: " << city.city_citizens() << endl;

    // number of adults
    cout << "Adults: " << city.adults() << endl;

    // counting and showing postal codes
    int count = city.postal_codes();
    cout << "Number of unique postal codes: " << count << endl;

    // showing and deleting citizens
    city.show_city();
    city.show_citizens();
    cout << endl;
    // city.deleteCitizen("Emilia", 20);
    // city.deleteCitizen("Kamil", 21);
    // city.show_citizens();

    cout << endl << "PART 2: CITIES" << endl << endl;

    City city2("Warszawa");
    Citizen c21("Edyta", "Swistek", 24, 'f', "31-100");
    Citizen c22("Franciszka", "Lesniowska", 17, 'f', "31-100");
    city2.addCitizen(c21);
    city2.addCitizen(c22);

    Citizen c31("Janusz", "Rekowski", 31, 'm', "40-144");
    Citizen c32("Alan", "Kalicki", 15, 'm', "40-124");
    Citizen c33("Edward", "Jura", 21, 'm', "40-201");
    City city3("Krakow");
    city3.addCitizen(c31);
    city3.addCitizen(c32);
    city3.addCitizen(c33);

    vector<City> cities;
    cities.push_back(city);
    cities.push_back(city2);
    cities.push_back(city3);
    City::showCities(cities);
    
    cout << "Most unique post codes: " << endl;
    City::the_most(cities, 1);
    cout << "Least citizens: " << endl;
    City::the_most(cities, 2);

    // statistics
    cout << "Statistics: " << endl;
    City::statatistic(cities);

    // sorting
    City::sort_cities(cities);
    City::showCities(cities);

#endif
#ifdef zad4
    // moi ludzie driftem omijaj¹ wiêzienie
    vector<int> vec1 = {83, 123, 13, 999, 5, 10, 543, 67, 54, 7};
    vector<int> vec2 = vec1;

    cout << "Sorting by sum: " << endl;
    sort(vec1.begin(), vec1.end(), sortBySum);
    for_each(vec1.begin(), vec1.end(), print);

    cout << endl << "Sorting by number of digits: " << endl;
    sort(vec2.begin(), vec2.end(), sortByNumberOfDigits);
    for_each(vec2.begin(), vec2.end(), print);
    // jazda
#endif
    return 0;
}

bool sortBySum(int n1, int n2)
{
    int sum1 = 0, sum2 = 0, m;
    while(n1 != 0)
    {
        m = n1 % 10;
        sum1 += m;
        n1 = n1 / 10;
    }
    while (n2 != 0)
    {
        m = n2 % 10;
        sum2 += m;
        n2 = n2 / 10;
    }
    return sum1 < sum2;
}

bool sortByNumberOfDigits(int n1, int n2)
{
    int count1 = 0, count2 = 0;
    while (n1 != 0)
    {
        n1 = n1 / 10;
        count1++;
    }
    while (n2 != 0)
    {
        n2 = n2 / 10;
        count2++;
    }
    return count1 < count2;
}

void print(int n)
{
    cout << n << " ";
}