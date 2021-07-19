// program to convert time from min. to sec. using basic to object and vice

#include <iostream>
using namespace std;

class A
{
    int x, sec;

public:
    A()
    {
        cout << "Enter seconds value: ";
        cin >> sec;
    }

    operator int()
    {
        return sec / 60;
    }

    A(int t)
    {
        cout << t << " Minutes = " << t * 60 << " Seconds" << endl;
    }
};
int main()
{
    int min;
    cout << "Enter min value: ";
    cin >> min;
    A tM = min;

    A TS;
    min = TS;
    cout << TS * 60 << " Seconds = " << min << " Minutes" << endl;
}