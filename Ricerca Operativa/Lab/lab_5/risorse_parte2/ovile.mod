set MATERIE;	# I
set CIBI;		# J
set SOSTANZE;	# K
set LAVORI;		# R

param costi_lavorazione{LAVORI};						# F_r
param costi_acquisto{MATERIE};							# C_i
param apporto_unitario{MATERIE,SOSTANZE} >= 0, <= 1;	# A_ik	
param perc_min{SOSTANZE} >= 0, <= 1 default 0.0;		# B_k
param perc_max{SOSTANZE} >= 0, <= 1 default 1.0;		# U_k
param disp{MATERIE};									# Q_i
param domanda{CIBI};									# D_j
param lavori_bool{LAVORI,MATERIE,CIBI} binary;			# P_rij

var x{MATERIE,CIBI} >= 0 integer;

minimize f :
  sum{i in MATERIE, j in CIBI} costi_acquisto[i]*x[i,j]
  + sum{r in LAVORI, i in MATERIE, j in CIBI}
    lavori_bool[r,i,j]*costi_lavorazione[r]*x[i,j];

s.t. v_perc_min{j in CIBI, k in SOSTANZE : perc_min[k] > 0} :
  sum{i in MATERIE} apporto_unitario[i,k]*x[i,j] >=
  perc_min[k]*sum{i in MATERIE} x[i,j];
s.t. v_perc_max{j in CIBI, k in SOSTANZE : perc_max[k] < 1} :
  sum{i in MATERIE} apporto_unitario[i,k]*x[i,j] <=
  perc_max[k]*sum{i in MATERIE} x[i,j];
s.t. v_disp{i in MATERIE} :
  sum{j in CIBI} x[i,j] <= disp[i];
s.t. v_domanda{j in CIBI} :
  sum{i in MATERIE} x[i,j] = domanda[j];
  