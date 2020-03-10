#include <iostream>
#include <math.h>
using namespace std;

    string DtoB(int x){
    string s="",s1="";
    while(x!=0){
    if(x%2==1) s+="1";
    else s+="0";
    x/=2;}
    for(int i=s.length()-1;i>=0;i--)
    s1+=s[i];
    return s1;}
    string FtoB(float x){
    string s="";
    for(int i=1;i<=5;i++){
    if((x-pow(2,-i))>=0){
    s+="1";
    x-=pow(2,-i);}
    else s+="0";}
    return s;}
    string PowB(string s){
    int c,p;
    for(int i=0;i<s.length();i++)
    if(s[i]=='.') c=i;
    p=c-1+127;
    string n=DtoB(p)+" ";
    for(int i=1;i<23;i++){
    if(i<s.length()){
    if(s[i]!='.'){
    n+=s[i];}}
    else n+="0";}
    return n;}
int main()
{   float x,x2;
    cin>>x;
    int x1=fabs(x);
    x2=fabs(x)-x1;
    string s,n="";
    s=DtoB(x1)+"."+FtoB(x2);
    if(x>=0)
    n+="0 ";
    else n+="1 ";
    n+=PowB(s);
    cout<<n;
    return 0;}
