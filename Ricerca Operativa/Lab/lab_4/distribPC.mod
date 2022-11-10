set S;	# stabilimenti
set B;	# banche

param W{S};		# costi produzione
param C{S,B};	# costi trasporto
param A{S};		# capacita produttiva
param R{B};		# richieste
param stab_bil symbolic;
param bil1;
param bil2;

var x{S,B} >=0 integer;

minimize costo : sum{s in S, b in B} (W[s] + C[s,b]) * x[s,b];
s.t. produzione{s in S} : sum{b in B} x[s,b] <= A[s];
s.t. domanda{b in B} : sum{s in S} x[s,b] = R[b];

s.t. bilan1 : sum{j in B} x[stab_bil, j] >= bil1 * sum{i in S, j in B} x[i,j];
s.t. bilan2 {i in S : i != stab_bil} : sum{j in B} x[stab_bil, j] >= bil2 * sum{j in B} x[i,j];