# MODELLO DUALE
set Prodotti;
set Risorse;

param prezzo{Prodotti};
param consumo_risorse{Risorse, Prodotti};
param disp{Risorse};

var u{Risorse} >= 0;

minimize costo : sum{i in Risorse} disp[i] * u[i];
s.t. convenienza {j in Prodotti} : 
	sum{i in Risorse} consumo_risorse[i, j] * u[i] >= prezzo[j];

