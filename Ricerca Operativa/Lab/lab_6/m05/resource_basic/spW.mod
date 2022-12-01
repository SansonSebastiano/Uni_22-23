set NODE;
set ARC within NODE cross NODE;

param b{NODE};
param c{ARC};
param w{ARC};
param W;

var x{ARC} binary;

minimize path_cost: 
	sum { (i,j) in ARC } c[i,j] * x[i,j];

s.t. balance { v in NODE }:
	 sum { (i,v) in ARC } x[i,v] - sum { (v,j) in ARC } x[v,j] = b[v];

s.t. max_weight:
	sum { (i,j) in ARC } w[i,j] * x[i,j] <= W;