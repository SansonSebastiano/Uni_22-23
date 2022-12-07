var x1 <= 1 >= 0; # rilassamento continuo: assume valori tra 0 e 1
var x2 <= 1 >= 0;
var x3 <= 1 >= 0;
var x4 <= 1 >= 0;
var x5 <= 1 >= 0;
var x6 <= 1 >= 0;

maximize f : 22.5*x1 + 30.0*x2 + 40.3*x3 + 11.1*x4 + 14.7*x5 + 9.1*x6;
s.t. v : 10*x1 + 15*x2 + 21*x3 + 6*x4 + 8*x5 + 5*x6 <= 47;

#s.t. bb01 : x4 <= 0;
#s.t. bb01 : x4 >= 1;
#s.t. bb02 : x5 <= 0;
#s.t. bb02 : x5 >= 1;
#s.t. bb03 : x6 <= 0;	
#s.t. bb03 : x6 >= 1;	
#s.t. bb04 : x3 <= 0;	
#s.t. bb04 : x3 >= 1;
#s.t. bb05 : x2 <= 0;
#s.t. bb05 : x2 >= 1;	
#s.t. bb06 : x1 <= 0;
#s.t. bb06 : x1 >= 1;

# con x4, x5, x6 <= 0 sol. ammissibile [P5]	=> INCUMBENT = 92.8 => sol. finale
# con x3 <= 0, x4 >= 1 sol. ammissibile	[P7]
# con x4, x5, x3 <= 0 e x6 >=1 sol. amm. [P9]
# con x4, x3 <= 0 e x5 >= 1 sol. amm. [P11]