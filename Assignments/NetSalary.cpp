// program to calculate net salary of 5 different employees using array of objects where emp_id, name, age, basic_sal, TA, DA are the data members

#include <iostream>
using namespace std;

class employee
{
public:
    int emp_id, age;
    string name;
    float basic_sal, TA, DA;

    employee(){};
    int info();
    employee(employee details[]);
    ~employee(){};
};

int employee::info()
{
    cout << "Enter employee ID: ";
    cin >> emp_id;
    cout << "\nEnter employee name: ";
    cin.ignore(256, '\n');
    getline(cin, name);
    cout << "\nEnter employee age: ";
    cin >> age;
    cout << "\nEnter " << name << "'s "
         << " basic salary, TA, DA:" << endl;
    cin >> basic_sal >> TA >> DA;
    return 0;
};

employee::employee(employee details[])
{
    for (int i = 0; i < 5; i++)
    {
        cout << "ID: " << details[i].emp_id << " | Employee Name: " << details[i].name << " | Age: " << details[i].age << endl;
        cout << "Net salary: " << details[i].basic_sal + details[i].TA + details[i].DA << endl;
    }
}

int main()
{
    employee details[5];
    int i;
    for (i = 0; i < 5; i++)
    {
        details[i].info();
    }
    employee display(details);
}