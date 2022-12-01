set NODE;
set ARC within NODE cross NODE;

param b{NODE};
param c{ARC};

param maxHop := 2;

var x{ARC} binary;

minimize path_cost: 
	sum { (i,j) in ARC } c[i,j] * x[i,j];

s.t. balance { v in NODE }:
	 sum { (i,v) in ARC } x[i,v] - sum { (v,j) in ARC } x[v,j] = b[v];

s.t. max_hop:  sum { (i,j) in ARC } x[i,j] <= maxHop;