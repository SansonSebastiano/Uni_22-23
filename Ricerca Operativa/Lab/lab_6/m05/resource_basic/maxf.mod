set NODE;
set ARC within NODE cross NODE;

param b{NODE};
param c{ARC};
param u{ARC};

check: sum {i in NODE} b[i] = 0;

var x{ARC} integer >= 0;
var maxf;

maximize flow: maxf;
	
s.t. balance { v in NODE }:
	 sum { (i,v) in ARC } x[i,v] - sum { (v,j) in ARC } x[v,j] = b[v] * maxf;
	 
s.t. capacity { (i,j) in ARC }: x[i,j] <= u[i,j];

s.t. budget_limitation: sum { (i,j) in ARC } c[i,j] * x[i,j] <= 500;


