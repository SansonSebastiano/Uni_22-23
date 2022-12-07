var x1 >=0; 
var x2 >=0; 
var x3 >=0; 
var x4 >=0; 
var x5 >=0;
maximize f: 3*x1-8*x2+3*x3-8*x4+13*x5;
s.t. v1: -2*x1+7*x2+4*x3+1.5*x4+9*x5 <= 16;
s.t. v2: -6*x1+5*x2+5*x3+7.2*x4-3*x5 >=  7;

#s.t. bb01: x3>=6;
#s.t. bb02: x1>=5;
#s.t. bb03: x4>=1;
#s.t. bb04: x1>=6;
#s.t. bb05: x3>=7;
#s.t. bb06: x4>=3;
