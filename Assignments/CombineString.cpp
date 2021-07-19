// program to compare two strings using operator overloading and if both strings are not equal combine the strings using friend operator overloading

#include <iostream>
using namespace std;

class str
{
    string a;

public:
    void getString()
    {
        cout << "Enter string:" << endl;
        getline(cin, a);
    }
    friend void operator==(str m, str n);
};

void operator==(str m, str n)
{
    if (m.a == n.a)
    {
        cout << "Both  are equal";
    }
    else
    {
        cout << "Strings not equal. New string: " << m.a + n.a;
    }
}

int main()
{
    str m, n;
    m.getString();
    n.getString();
    operator==(m, n);
}