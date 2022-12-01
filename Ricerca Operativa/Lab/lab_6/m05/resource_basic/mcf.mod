set NODE;
set ARC within NODE cross NODE;

param b{NODE};
param c{ARC};
param u{ARC};

check: sum {i in NODE} b[i] = 0;

var x{ARC} integer >= 0;

minimize path_cost: 
	sum { (i,j) in ARC } c[i,j] * x[i,j];

s.t. balance { v in NODE }:
	 sum { (i,v) in ARC } x[i,v] - sum { (v,j) in ARC } x[v,j] = b[v];
	 
s.t. capacity { (i,j) in ARC }: x[i,j] <= u[i,j];
