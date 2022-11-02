# modello della slide 2.42

set I; # quartieri

param C {I, I}; # costi
param T; # soglia

var x{I} binary;

minimize costo: sum {i in I} x[i];
s.t. soddisfa {i in I} : sum {j in I : C[i,j] <= T} x[j] >= 1

