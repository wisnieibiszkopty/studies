//
// Created by student on 23.10.2023.
//

#include <iostream>

#include "Adding.h"
#include "Student.h"
#include "Array.h"

// #define zad1
// #define zad2
#define zad3


using namespace std;

template <typename T>
void mySwap(T& v1, T& v2)
{
    T temp;
    temp = v1;
    v1 = v2;
    v2 = temp;
}

template <typename T>
void showAll(T* tab[], int n)
{
    for(int i=0; i<n; i++)
    {
        tab[i]->show();
    }
}

// trzeba było zrobić minimalną ale mi się pomyliło i nie chce mi się zmieniać
template <typename T>
T findMax(T tab[], int n)
{
    T max = tab[0];
    for(int i=0; i<n; i++)
    {
        if(tab[i] > max) max = tab[i];
    }
    return max;
}

int main()
{
#ifdef zad1
    cout << "jazda" << endl;
    int v1=10;
    int v2=15;
    cout << v1 << " " << v2 << endl;
    mySwap<int>(v1, v2);
    cout << v1 << " " << v2 << endl;

    char c1 = 'f';
    char c2 = '@';
    cout << c1 << " " << c2 << endl;
    mySwap<char>(c1, c2);
    cout << c1 << " " << c2 << endl;

    Adding<double> adding(6.9);
    adding.show();
    adding.add(12.3);
    adding.show();

    Student<double> s1(5, "Kamil");
    s1.show();
    s1.showMark();

    Student<int> s2(4, "Pawel");
    s2.show();
    s2.showMark();

    Student<string> s3(3, "Kamil");
    s3.show();
    s3.showMark();

    Adding<int>* arrAdd[3];
    for(int i=0; i<3; i++)
    {
        arrAdd[i] = new Adding<int>(i);
    }
    showAll(arrAdd, 3);

    Student<string>* stdAdd[5];
    for(int i=0; i<5; i++)
    {
        stdAdd[i] = new Student<string>(i+2, "Kamil");
    }
    showAll(stdAdd, 5);

    for(int i=0; i<3; i++)
        delete arrAdd[i];
    for(int i=0; i<2; i++)
        delete stdAdd[i];
#endif
#ifdef zad2
    int n = 5;
    double arr[5] = {2.0, 4.3, 5.4, 7.6, 1.2};
    cout << "max: " << findMax(arr, n);
#endif
#ifdef zad3
    Array<int> a1(10);
    a1.add(11);
    a1.add(3);
    a1.add(6);
    a1.add(1);
    a1.add(3);
    a1.show();
    a1.sort();
    a1.show();
    cout << "max: " << a1.getMax() << endl;
    cout << "index: " << a1.getFromIndex(3) << endl;

    Array<double> a2;
    a2.add(12.4);
    a2.add(3.54);
    a2.add(9.6);
    a2.add(6.9);
    cout << "max: " << a2.getMax() << endl;
    cout << "index: " << a2.getFromIndex(1) << endl;
    a2.show();
    a2.sort();
    a2.show();

    Array<string> a3;
    a3.add("Kamil");
    a3.add("Pawelfdhgh");
    a3.add("C++");
    a3.show();
    cout << "max: " << a3.getMax() << endl;
    a3.sort();
    a3.show();
#endif

    return 0;
}