delete from mon_items where mon_code in (select mon_code from monitoreos where cir_code in (select cir_code from circuitos where cir_status = 'ANULADO'));
delete from monitoreos  where cir_code in (select cir_code from circuitos where cir_status = 'ANULADO');
delete from capacitacion  where cir_code in (select cir_code from circuitos where cir_status = 'ANULADO');
delete from cir_groups where cir_code in (select cir_code from circuitos where cir_status = 'ANULADO');
delete from cir_oper where cir_code in (select cir_code from circuitos where cir_status = 'ANULADO');
delete from cir_semanas where cir_code in (select cir_code from circuitos where cir_status = 'ANULADO');
delete from  circuitos where cir_status = 'ANULADO';		