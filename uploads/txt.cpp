#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <iostream> // c++
using namespace std; // c++

int sum (float a, int b)//2
{
    return a+b;  // missmatch type
}


double sum (int a, int  b,int c)//3
{
    return a+b; // missmatch type
}






int main()
{
    cout << "Hello World" << endl;
   // return 0; /// eta kono error nah
    //true = 1;
    int a , b ,c ;

  while(1)
  {
        int a,b;
        cin >> a >> b;
        cout << sum(a,b) << endl;

        if(cout == 10) 
        {
        printf("Hello World");
       // logical error 
        break;
        }


        int   a = 10;

        switch(a)   
        {
            case 1:  /// missing ....syntactic error
                printf("Hello World");
                break;
            case 2:
                printf("Hello World");
                break;
            default:
                printf("Hello World");
                break;
        }

   

        for(int a = 0; a < 10; a++)
        {
            printf("Hello World");
        }
  }
}
