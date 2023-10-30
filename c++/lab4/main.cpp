#include <iostream>
#include <vector>
#include <list>
#include <random>
#include <algorithm>

using namespace std;

#define zad1
// #define zad2
// #define zad2_vec
// #define zad3
// #define zad4

template <typename T>
void show(T &con)
{
    for(typename T::iterator it=con.begin( ); it!=con.end( ); it++)
        cout << *it << " ";
    cout << endl;
}

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

#endif
#ifdef zad4

#endif
    return 0;
}
