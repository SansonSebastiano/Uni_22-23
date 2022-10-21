# Dichiarazione variabili
var xL;		# ettari a lattuga
var xP;		# ettari a patate		
# f.o.
maximize	resa:		3000 * xL + 5000 * xP;
# vincoli
subject to	ettari:		xL + xP <= 11;
subject to 	semi: 		7 * xL <= 70;
s.t.		tuberi: 	3 * xP <= 18;
s.t.		conc:		10 * xL + 20 * xP <= 45;
s.t.		dominio1:	xL >= 0;
s.t. 		dominio2:   xP >= 0;