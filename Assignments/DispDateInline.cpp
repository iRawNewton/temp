// program to display date (format : DD/MM/YYYY) using inline function where all the values are user input

#include <iostream>
using namespace std;
class date
{

public:
    int d, m, y;

    date()
    {
        cout << "Enter date: " << endl;
        cin >> d;
        cout << "Enter month: " << endl;
        cin >> m;
        cout << "Enter year: " << endl;
        cin >> y;
    };

    inline int disp()
    {
        cout << "Date you have entered: " << d << ":" << m << ":" << y;
        return 0;
    };

    ~date(){};
};

int main()
{
    date d;
    d.disp();
}