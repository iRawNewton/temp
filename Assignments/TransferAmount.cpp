// program to transfer an amount from one account holder to another using Pass by reference method.

#include <bits/stdc++.h>
using namespace std;
class A
{
public:
    int id;
    string name;
    float bal;
    A(){};
    void account();
    A(A &a, A &b);
    ~A();
};

void A::account()
{
    cout << "Enter account ID: " << endl;
    cin >> id;
    cin.ignore(256, '\n');
    cout << "Enter user name: " << endl;
    getline(cin, name);
    cout << "Enter user bal: " << endl;
    cin >> bal;
};

A::A(A &a, A &b)
{
    int id;
    float amt;
    cout << "Enter credit's account: " << endl;
    cin >> id;
    cout << "Enter amount to be transferred: " << endl;
    cin >> amt;

    if (id == a.id)
    {
        if (a.bal > amt)
        {
            a.bal = a.bal - amt;
            b.bal = b.bal + amt;
        }
        else
        {
            cout << "Not enough bal.";
        }
    }
    else
    {
        if (b.bal > amt)
        {
            b.bal = b.bal - amt;
            a.bal = a.bal + amt;
        }
        else
        {
            cout << "Not enough bal.";
        }
    }
};

int main()
{
    A a, b;
    cout << "Enter 1st user details:" << endl;
    a.account();
    cout << "Enter 2nd user details:" << endl;
    b.account();
    int id;

    A transaction(a, b);

    cout << "ID: " << a.id << endl
         << "Name:" << a.name << endl
         << "bal: " << a.bal << endl;

    cout << "ID: " << b.id << endl
         << "Name:" << b.name << endl
         << "bal: " << b.bal << endl;
}