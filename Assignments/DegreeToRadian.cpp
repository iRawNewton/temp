// program to convert degree to radian using conversion routine in destination class

#include <iostream>
using namespace std;

const double pi = 3.14159265359;
class classA
{
    double deg;

public:
    int degree()
    {
        cout << "Enter degree: ";
        cin >> deg;
        return deg;
    }
};

class classB
{
    double rad;

public:
    void operator=(classA x)
    {
        rad = x.degree();
    }

    void disp()
    {
        cout << "rad value: " << rad << endl;
        int x = rad * (pi / 180);
        cout << rad << " Degree is equal to " << x << " radian." << endl;
    }
};

int main()
{
    classA deg;
    classB rad;
    rad = deg;
    rad.disp();
}