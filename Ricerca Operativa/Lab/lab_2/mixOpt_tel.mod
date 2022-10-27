# definizione del modello

# insiemi
set I;	# prodotti
set J;	# risorse
# parametri
param maxNumProd{I} default 99999;
param P {I};	# profitto
param Q {J};	# disponibilita
param A {I, J};	# j necessari per produrre i
# variabili + domini
var x{I} >= 0 <= maxNumProd integer;	
# f.o.
maximize profitto: sum {i in I} P[i] * x[i];
# vincoli
s.t. dispon {j in J}: sum {i in I} A[i,j] * x[i] <= Q[j];

