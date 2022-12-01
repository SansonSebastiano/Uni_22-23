set N;	# nodi
set A within N cross N;	# archi: coppia di nodi N x N

param c{A};
param b{N}; # bilanciamento
param h := 3;
param w{A};
param W;

var x{A} binary;

minimize f : sum{(i,j) in A} c[i,j] * x[i,j];
s.t. balance{v in N} : sum{(i,v) in A} x[i,v] - sum{(v,j)  in A} x[v,j] = b[v];
s.t. maxhop : sum{(i,j) in A} x[i,j] <= h;
s.t. budget : sum{(i,j) in A} w[i,j] * x[i,j] <= W;