update circuitos set cir_status='PENDIENTE' where cir_code=$cir_code;
update circuitos set cir_status='ACTIVO' where cir_code=$cir_code_ant;
delete from cir_oper where  cir_code=$cir_code;
delete from mon_items where mon_code (select mon_code from monitoreos where  cir_code=$cir_code);
delete from monitoreos where  cir_code=$cir_code;
delete from capacitacion where  cir_code=$cir_code;
 
