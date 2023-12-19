#include <iostream>
#include <memory>
#include <vector>

#include "Person.h"
#include "Elem.h"
#include "Buffer.h"
#include "BufferArr.h"
#include "FileBuffer.h"
#include "Warehouse.h"
#include "Shop.h"

// #define skrypt
#define zad1
//#define zad2

using namespace std;

void funcUniqueModify(unique_ptr<int> &uptr)
{
    *uptr = 112;
}

void funUniqueDeleter(int* p)
{
    delete[] p;
    cout << "usunieta tablica" << endl;
}

unique_ptr<int[]> funUniqueArray(int n)
{
    unique_ptr<int[]>  arr(new int[n]);
    for(int i=0; i<n; i++)
    {
        arr[i] = i + 7;
    }
    return arr;
}

void funDeleter(Person *p)
{
    cout << "usunieta osoba: ";
    p->info();
    delete p;
}

int main() {
#ifdef skrypt
    unique_ptr<int> uptr1 (new int);
    *uptr1 = 12;

    cout << "Wartosc uptr1: " << *uptr1 << endl;
    cout << "Adres uptr1: " << uptr1.get() << endl;

    unique_ptr <int> uptr2;
    cout<<"Przed move"<<endl;
    cout<<"Adres uptr1: "<<uptr1.get()<<endl;
    cout<<"Adres uptr2: "<<uptr2.get()<<endl;
    uptr2 = std::move(uptr1);
    cout<<"Po move: "<<endl;
    cout<<"Adres uptr1: "<<uptr1.get()<<endl;
    cout<<"Adres uptr2: "<<uptr2.get()<<endl;

    funcUniqueModify(uptr2);
    cout << "Wartosc uptr2: " << *uptr2 << endl;

    cout << "Przed reset: " << uptr2.get() << endl;
    uptr2.reset();
    cout << "Po reset: " << uptr2.get() << endl;

    unique_ptr<int[]> tab1(new int[4]);
    for(int i=0; i<4; i++)
    {
        tab1[i] = i + 7;
        cout << tab1[i] << endl;
    }

    unique_ptr<int[]> tab3 = funUniqueArray(5);
    cout<<"Elementy tablicy tab3:"<<endl;
    for(int i=0; i<5; i++)
        cout<<tab3[i]<<endl;

    unique_ptr<int[],void(*)(int*)>

    tab2(new int[10],funUniqueDeleter);
    vector<unique_ptr<int>> vec;
    unique_ptr<int> i1(new int);
    *i1=3;
    vec.push_back(std::move(i1));
    cout<<"Element w wektorze: "<<*vec[0]<<endl;

    // shared pointers

    shared_ptr < Person > sptr1( new Person("Ola",32), funDeleter );
    shared_ptr < Person > sptr2( new Person("Ula",52), funDeleter );
    sptr1->info();
    cout<<"Licznik sptr1: "<<sptr1.use_count()<<endl;
    cout<<"Licznik sptr2: "<<sptr2.use_count()<<endl;
    vector<shared_ptr<Person>> firstInOffice;
    firstInOffice.push_back(sptr1);
    firstInOffice.push_back(sptr2);
    firstInOffice.push_back(sptr2);
    firstInOffice.push_back(sptr1);
    firstInOffice.push_back(sptr2);
    cout<<"Po dodaniu do kontenera"<<endl;
    cout<<"Licznik sptr1: "<<sptr1.use_count()<<endl;
    cout<<"Licznik sptr2: "<<sptr2.use_count()<<endl;
    for (shared_ptr<Person> ptr : firstInOffice)
        ptr->info();
    cout << endl;
    firstInOffice.resize(3);
    cout<<"Po resize"<<endl;
    cout<<"Licznik sptr1: "<<sptr1.use_count()<<endl;
    cout<<"Licznik sptr2: "<<sptr2.use_count()<<endl;
    shared_ptr <Person> sptr3(new
    Person("Magda",22),funDeleter);
    sptr3->info();

    // weak pointer

    shared_ptr<Elem> el1 (new Elem);
    shared_ptr<Elem> el2 (new Elem);

    el1->next = el2;
    //el2->prev = el1;
    shared_ptr<Elem> tempEl(el2->prev);
    cout << "Adres: " << tempEl << endl;
#endif
#ifdef zad1
    vector<unique_ptr<Buffer>> buffer_array;

    unique_ptr<BufferArr> b1 (new BufferArr(3));
    b1->add(2);
    b1->add(5);
    b1->add(6);
    unique_ptr<BufferArr> b2 (new BufferArr(2));
    b2->add(7);
    b2->add(1);
    unique_ptr<FileBuffer> b3 (new FileBuffer("test.txt"));
    b3->add(1);
    b3->add(1);
    b3->add(6);
    b3->add(21);
    b3->add(69);

    buffer_array.push_back(std::move(b1));
    buffer_array.push_back(std::move(b2));
    buffer_array.push_back(std::move(b3));

    for(const auto& b : buffer_array )
    {
        b->write();
    }
#endif
#ifdef zad2
    std::unique_ptr<Shop> shop1(new Shop("Amazon"));
    std::unique_ptr<Shop> shop2(new Shop("Ebay"));
    std::unique_ptr<Shop> shop3(new Shop("Allegro"));

    std::shared_ptr<Warehouse> w1(new Warehouse("books", 12));
    std::shared_ptr<Warehouse> w2(new Warehouse("laptops", 8));
    std::shared_ptr<Warehouse> w3(new Warehouse("laptops", 20));
    std::shared_ptr<Warehouse> w4(new Warehouse("beds", 15));
    std::shared_ptr<Warehouse> w5(new Warehouse("books", 40));
    std::shared_ptr<Warehouse> w6(new Warehouse("clothes", 60));
    std::shared_ptr<Warehouse> w7(new Warehouse("shoes", 30));
    std::shared_ptr<Warehouse> w8(new Warehouse("shoes", 20));

    shop1->add(w1);
    shop1->add(w3);
    shop1->add(w5);
    shop1->add(w7);
    shop1->add(w8);
    shop1->add(w2);

    shop2->add(w4);
    shop2->add(w2);
    shop2->add(w8);
    shop2->add(w6);

    shop3->add(w5);
    shop3->add(w6);
    shop3->add(w1);
    shop3->add(w2);
    shop3->add(w4);

    std::vector<unique_ptr<Shop>> shops;
    shops.push_back(std::move(shop1));
    shops.push_back(std::move(shop2));
    shops.push_back(std::move(shop3));

    for(const auto& shop : shops )
    {
        shop->showName();
        shop->showWarehouses();
        shop->sell("books", 40);
        shop->sell("clothes", 69);
        shop.get();
    }

#endif
    return 0;
}
