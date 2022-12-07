### ASSUNZIONE MULTIPERIODALE ###
#################################


#INSIEMI
set mesi;
set mesi_limitati in mesi;
set mesi_iniziali = mesi diff mesi_limitati;

set mSet;

#PARAMETRI
param num_operai_init;
param num;
param den;
param costo_neoassunto := num/den;
param costo_esperto;
param incentivo;
param base_incentivo;
param capacita_operaio;
param capacita_istruttore;
param richiesta{mesi};
param bigM := (sum{i in mesi} richiesta[i]) / capacita_istruttore;

#VARIABILI
var X{mesi} integer >= 0; 	#numero neoassunti
var Y{mesi} integer >= 0; 	#numero eperti
var Z binary;				#raccolgo incentivo
var W{mesi_limitati} binary;#assumo nel mese

#FUNZIONE OBIETTIVO
minimize 	costo_totale:	
		costo_neoassunto * sum {i in mesi} X[i]
		+ costo_esperto  * sum {i in mesi} Y[i]
		- incentivo      * Z;

#VINCOLI

s.t. operai_iniziali: Y[1] = num_operai_init;
s.t. bilancio_mensile {i in mesi: i > 1}: Y[i] = X[i-1] + Y[i-1];
s.t. sostieni_mensile {i in mesi}: X[i] <= Y[i];
s.t. domanda_mensile  {i in mesi}:
		capacita_operaio * (Y[i]-X[i]) + capacita_istruttore * X[i] >= richiesta[i];

s.t. attiva_incentivo: sum {i in mesi_iniziali } X[i] >= base_incentivo * Z;

s.t. limite_assunzioni: sum {i in mesi_limitati} W[i] <= 1;
s.t. attiva_W {i in mesi_limitati}: X[i] <= bigM * W[i];

