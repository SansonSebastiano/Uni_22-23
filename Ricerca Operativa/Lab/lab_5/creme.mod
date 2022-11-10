# MODELLO PRIMALE
set Prodotti;
set Risorse;

param prezzo{Prodotti};
param consumo_risorse{Risorse, Prodotti};
param disp{Risorse};

var x{Prodotti} >= 0;

maximize ricavo : sum{j in Prodotti} prezzo[j] * x[j];
s.t. v_disp{i in Risorse} : sum{j in Prodotti} consumo_risorse[i, j] * x[j] <= disp[i];
