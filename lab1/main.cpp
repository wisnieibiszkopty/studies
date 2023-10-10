#include <iostream>

#include "Person.h"
#include "Teacher.h"
#include "Student.h"
#include "Animal.h"
#include "Dog.h"
#include "Cat.h"

//#define test
//#define zad1
#define zad2

using namespace std;

int howManyProtectedAnimals(Animal animals[], int size);
void howManyTrackerDogs(Dog dogs[], int size);
void howManyCats(Cat cats[], int size);

int main()
{
#ifdef test
    cout<<endl<<"Obiekty klasy Person"<<endl;
    Person o1("Grazyna","Nowak",45);
    o1.showInfoPerson();
    cout<<"Czy pelnoletnia?: "<<o1.is_18()<<endl;
    o1.setAge(16);
    cout<<endl<<"Obiekty klasy Teacher"<<endl;
    Teacher n1("Barbara","Kowalska",56,30,"Phd");
    n1.showInfoTeacher();
    cout<<"Czy ma Phd?: "<<n1.is_Phd()<<endl;
    n1.setAge(34);
#endif
    // Zad 1
#ifdef zad1
    Student s1[5];
    Student* s2;
    Student* s3[4];
    Student** s4;

    for(int i=0; i<5; i++)
    {
        s1[i].init("Kamil", "Wodowski", 20+i);
        s1[i].setIndex("97766");
        s1[i].showInfoStudent();
    }

    s2 = new Student[4];

    for(int i=0; i<4; i++)
    {
        s2[i].init("Pawel", "Winski", 20+i);
        s2[i].setIndex("97765");
        s2[i].showInfoStudent();
    }

    for(int i=0; i<4; i++)
    {
        s3[i] = new Student("Krystian", "Zielonka", 20+i, "97767");
        s3[i]->showInfoStudent();
    }

    s4 = new Student*[3];

    for(int i=0; i<3; i++)
    {
        s4[i] = new Student("Kamil", "Wodowski", 20+i, "97766");
        s4[i]->showInfoStudent();
    }

    for(int i=0; i<4; i++)
    {
        delete s3[i];
    }

    for(int i=0; i<3; i++)
    {
        delete s4[i];
    }
    delete [] s4;
#endif
#ifdef zad2
    Dog dog1(4, "Azor", true, "Golden retriever", 5, 7);
    Dog dog2(4, "Chmurka", true, "pomeranian", 2, 1);

    /*dog1.giveVoice();
    dog1.info();
    dog2.giveVoice();
    dog2.info();*/

    Dog dogs[2] = { dog1, dog2 };
    howManyTrackerDogs(dogs, 2);
    
    Cat cat1(4, "Kuba", false);
    cat1.setLevelOfMouseHunting(3);
    int mices[5] = { 20, 16, 43, 34, 32 };
    cat1.initMice(mices);

    Cat cat2(4, "Mruczek", true);
    cat2.setLevelOfMouseHunting(9);
    int mices2[5] = { 22, 36, 13, 24, 38 };
    cat2.initMice(mices2);

    Cat cats[2] = { cat1, cat2 };
    howManyCats(cats, 2);
    
    Animal animals[4] = { dog1, cat1, dog2, cat2 };
    cout << "Chronione zwierzeta: " << howManyProtectedAnimals(animals, 4) << endl;

#endif
    return 0;
 }

int howManyProtectedAnimals(Animal animals[], int size)
{
    int protectedAnimals = 0;
    for (int i = 0; i < size; i++)
    {
        if (animals[i].isProtectedAnimal())
        {
            protectedAnimals++;
        }
    }
    return protectedAnimals;
}

void howManyTrackerDogs(Dog dogs[], int size)
{
    for (int i = 0; i < size; i++)
    {
        if (dogs[i].getSkillLevel(1) > dogs[i].getSkillLevel(0))
        {
            dogs[i].info();
        }
    }
}

void howManyCats(Cat cats[], int size)
{
    int mices = 0;
    for (int i = 0; i < size; i++)
    {
        for (int j = 0; j < 5; j++) 
        {
            mices += cats[i].getMice(j);
        }
        cats[i].info();
        cout << "Ten kot upolowal " << mices << " przez 5 lat" << endl;
        mices = 0;
    }
}
