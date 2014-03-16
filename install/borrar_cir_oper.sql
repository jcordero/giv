delete from mon_items where mon_code in (select mon_code from monitoreos where cir_code =29 and use_code_operador = 438 and mon_status='PENDIENTE' );
delete from capacitacion  where cir_code =29 and mon_code in (select mon_code from monitoreos where cir_code =29 and use_code_operador = 438 and mon_status='PENDIENTE');
delete from monitoreos  where cir_code =29 and use_code_operador = 438 and mon_status='PENDIENTE';
delete from cir_oper where cir_code =29 and use_code_operador = 438;