set S;	# stabilimenti
set B;	# banche

param W{S};		# costi produzione
param C{S,B};	# costi trasporto
param A{S};		# capacita produttiva
param R{B};		# richieste

var x{S,B} >=0 integer;

minimize costo : sum{s in S, b in B} (W[s] C[s,b]) * x[s,b];
s.t. produzione{s in S} : sum{b in B} x[s,b] <= A[s];
s.t. domanda{b in B} : sum{s in S} x[s,b] = R[b];