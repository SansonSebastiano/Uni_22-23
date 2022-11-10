set PRODOTTI;
set RISORSE;

param prezzo{PRODOTTI} >= 0;
param consumo_risorse{RISORSE,PRODOTTI};
param disp{RISORSE} >= 0;

var x{PRODOTTI} >= 0;

maximize ricavo : sum{j in PRODOTTI} prezzo[j]*x[j];

s.t. v_disp{i in RISORSE} :
  sum{j in PRODOTTI} consumo_risorse[i,j]*x[j] <= disp[i];