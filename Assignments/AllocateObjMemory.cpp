/* program to allocate memory for different objs, copy the value of last obj to one newly created obj and count the no. of objs and then free up the memory space allocated for objs*/

#include <iostream>
using namespace std;

class a
{
    int no, value;
    static int i;

public:
    a();
    a(a &obj);
    static int count();
    ~a();
};
int a::i;
a::a()
{
    no = ++i;
    cout << "Enter value " << i << ": ";
    cin >> value;
}
a::a(a &obj)
{
    int x = obj.value;
    cout << "number: " << obj.no << " value: " << x << endl;
}
int a::count()
{
    return i;
}
int main()
{
    a obj1, obj2, obj3;
    a cpy1(obj1), cpy2(obj2), cpy3(obj3);
    cout << "Total objs " << a::count() << endl;
}