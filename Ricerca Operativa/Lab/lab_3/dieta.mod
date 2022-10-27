# definizione modello 
# definizione insiemi
set I;	# Risorse disponibili
set J;	# Domande da coprire
# definizione parametri
param C {I};		# Costo unitario utilizzo risorsa i
param D {J};		# Ammontare della domanda di j
param A {I, J};		# Capacita della risorsa i di soddisfare la domanda j
# definizione variabili e domini
var x{I} >= 0 integer;
# F.O.
minimize costo: sum {i in I} C[i] * x[i];
# Vincoli
s.t. domanda {j in J}: sum {i in I} A[i, j] * x[i] >= D[j];
