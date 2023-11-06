#include <iostream>
#include <algorithm>
#include <set>
#include <map>
#include <vector>

// #define sett
// #define mapp
// #define zad1
// #define zad2
// #define zad3

using namespace std;

void show(set <int> s)
{
    set<int>::iterator  itr;
    for(itr = s.begin(); itr != s.end();  itr++)
    {
        cout << *itr << " ";
    }
    cout << endl;
}

void showMap(map<string, int> m)
{
    cout << endl << "m: " << endl;
    map<string, int>::iterator it;
    for(it=m.begin(); it != m.end(); it++)
    {
        cout << it->first << " " << it->second << endl;
    }
    cout << endl;
}

map<string, int>::iterator
searchByValue(map<string, int>& m, int val)
{
    map<string, int>::iterator it;
    for(it=m.begin(); it != m.end(); it++)
    {
        if(it->second == val) break;
    }
    return it;
}

// zad 5.1
// first value in pair - duplicate
// second value in pair - sum
pair<int, int> findDuplicate(vector<int> v)
{
    set<int> s;
    int sum = 0;
    int unique;
    pair <set<int>::iterator, bool> res;
    vector<int>::iterator it;

    for(it=v.begin(); it != v.end(); it++)
    {
        res = s.insert(*it);
        if(res.second)
        {
            sum += *it;
        }
        else
        {
            unique = *it;
        }
    }
    pair<int, int> result;
    result.first = unique;
    result.second = sum;
    return result;

}

// zad 5.2
template <typename T>
void exclusiveAlternative(set<T> s1, set<T> s2)
{
    set<int> firstSet, secondSet, unionSet;
    set_difference(s1.begin(), s1.end(), s2.begin(), s2.end(), insert_iterator(firstSet, firstSet.begin()));
    set_difference(s2.begin(), s2.end(), s1.begin(), s1.end(), insert_iterator(secondSet, secondSet.begin()));
    set_union(firstSet.begin(), firstSet.end(), secondSet.begin(),secondSet.end(), insert_iterator(unionSet, unionSet.begin()));

    cout << "Set 1: " << endl;
    show(s1);
    cout << "Set 2: " << endl;
    show(s2);

    cout << "Exclusive alternative: " << endl;
    show(unionSet);
}

// zad 5.3
// tworzymy mape z liczba wystapien liter w s1
// potem taki sam dla s2 i sprawdzamy gdzie nie sa rowne?
char findAdditionalChar(string& s1, string& s2)
{
    char c;
    int len = s2.length();
    map<char, int> chars;
    for(int i=0; i<len; i++)
    {

    }
    return ' ';
}

int main() {
#ifdef sett
    // set
    set<int> s;
    s.insert(1);
    s.insert(2);
    s.insert(3);
    s.insert(7);
    s.insert(3);

    show(s);

    s.erase(s.begin(), s.find(2));
    show(s);
    s.erase(2);
    show(s);

    cout << s.count(2) << endl;

    set<int> s1={1, 2, 3, 7};
    set<int> s2 = {-2, 4, 1, 7, 6};

    cout << "s1: ";
    show(s1);
    cout << "s2: ";
    show(s2);

    // operations on set
    set<int> sUnion, sIntersec, sDiffer;
    set_union(s1.begin(), s1.end(), s2.begin(), s2.end(), insert_iterator(sUnion, sUnion.begin()));
    set_intersection(s1.begin(), s1.end(), s2.begin(), s2.end(), insert_iterator(sIntersec, sIntersec.begin()));
    set_difference(s1.begin(), s1.end(), s2.begin(), s2.end(), insert_iterator(sDiffer, sDiffer.begin()));

    cout<<"sUnion: ";
    show(sUnion);
    cout<<"sIntersec: ";
    show(sIntersec);
    cout<<"sDiffer: ";
    show(sDiffer);

    // pair
    set<int> s3 = {3, 8};
    pair <set<int>::iterator, bool> res;
    res = s3.insert(6);
    cout << "Dodany element: " << *(res.first) << endl;
    cout << " Czy element jest dodany?" << res.second << endl;
    show(s3);

    res = s3.insert(6);
    cout << "Dodany element: " << *(res.first) << endl;
    cout << " Czy element jest dodany?" << res.second << endl;
    show(s3);
#endif
#ifdef mapp
    map<string, int> m;
    m.insert(pair<string, int>("Kowalski", 4500));
    m.insert(make_pair("Nowak", 2000));
    m.insert({"Wodowski", 69000});
    m["Adamek"] = 3000;

    showMap(m);

    int salary = m.find("Kowalski")->second;
    cout << "Zarobki Kowalskiego: " << salary << endl;
    m.erase("Adamek");
    showMap(m);
    cout << "Czy jest Kowalski? " << m.count("Kowalski") << endl;

    map<string, int>::iterator it = searchByValue(m, 2000);
    if(it != m.end()) cout<<"Element znaleziony: "<<it->first<<" "<< it->second<<endl;
    else cout<<"Brak elementu"<<endl;
#endif
#ifdef zad1
    vector<int> v = {2, 7, 3, 8, 2, 1, 5};
    pair<int, int> pair1 = findDuplicate(v);
    cout << "Duplicate: " << pair1.first << endl;
    cout << "Sum: " << pair1.second << endl;
#endif
#ifdef zad2
    set<int> s1 = {3, 6, 1, 6, 8,2, 4, 564, 4, 2, 54, 54,32};
    set<int> s2 = {4, 6, 6, 23, 5, 5, 4, 32, 5, 43, 5, 34, 13, 4};
    exclusiveAlternative(s1, s2);
#endif
#ifdef zad3

#endif
    return 0;
}
