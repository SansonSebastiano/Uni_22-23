set PRODOTTI;
set RISORSE;

param prezzo{PRODOTTI} >= 0;
param consumo_risorse{RISORSE,PRODOTTI};
param disp{RISORSE} >= 0;

var u{RISORSE} >=0;

minimize costo: sum {i in RISORSE} disp[i]*u[i];

subject to convenienza{j in PRODOTTI}:
	sum {i in RISORSE} consumo_risorse[i,j]*u[i] >= prezzo[j];


