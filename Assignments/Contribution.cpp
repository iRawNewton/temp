/*Suppose your entire classmate contribute some amount to Chief Minister’s relief fund. And your contribution is collected by another
 person who is not your classmate. Write a program to calculate total contribution from your class using features of C++.*/

#include <iostream>
using namespace std;

int a;

class classmate
{
private:
    string name;
    float amount;

public:
    void getinfo()
    {
        cout << "Enter Name: ";
        cin.ignore(256, '\n');
        getline(cin, name);
        cout << "Amount donated: ";
        cin >> amount;
    }
    friend inline void total(classmate no[100]);
};

void total(classmate no[])
{
    int total_amount = 0;
    for (int i = 0; i < a; i++)
    {
        cout << no[i].name << " Donated:" << no[i].amount << endl;
        total_amount += no[i].amount;
    }

    cout << "Total students: " << a << " Donated:" << total_amount << endl;
}

int main()
{
    cout << "Enter total students: ";
    cin >> a;
    classmate no[100];
    for (int i = 0; i < a; i++)
    {
        no[i].getinfo();
    };

    total(no);
}