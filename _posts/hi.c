#include <stdio.h>
int main(int argc,char** argv){
    int i=0;
    char c;
    do{
        c=getchar();
        if (c!=33&&c!=10){
            i=i+1;
            printf("%c\n",c);
        }      
    } while(c!='!');
    printf("The Np. is %d\nThe end\n", i);
    return 0;    
}