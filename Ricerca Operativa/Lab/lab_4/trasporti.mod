set I; # centri di offerta
set J; # centri di domanda

param O {I}; 	# ammontare dell'offerta
param D {J};	# ammontare della domanda
param C {I, J}; # costo per il trasporto

var x {I, J} >= 0 integer;

minimize costo_totale : sum{i in I, j in J} C[i,j] * x[i,j];
s.t. origine{i in I} : sum{j in J} x[i,j] <= O[i];
s.t. destinazione {j in J} : sum{i in I} x[i,j] >= D[j];