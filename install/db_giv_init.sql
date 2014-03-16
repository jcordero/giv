
use db_giv;
INSERT INTO items (it_code, it_name, it_importance, it_order, it_status,it_critico) VALUES
(1, 'Presentacion', 05, 1, 'ACTIVO','NO'),
(2, 'Toma de Datos', 20, 2, 'ACTIVO','SI'),
(3, 'Identificacion de Necesidad', 20, 3, 'ACTIVO','SI'),
(4, 'Nivel de informacion', 15, 4, 'ACTIVO','SI'),
(5, 'Manejo de herramientas', 10, 5, 'ACTIVO','NO'),
(6, 'Resolucion', 20, 6, 'ACTIVO','SI'),
(7, 'Despedida', 05, 7, 'ACTIVO','NO'),
(8, 'Encuesta', 05, 8, 'ACTIVO','NO');
insert into sec_sequence (seq_object,seq_code) values('items',8);

INSERT INTO crit_status (crit_status, crit_status_color, crit_status_color_html, crit_status_mon_sem, crit_status_name) VALUES
(1, 'verde', '009900',1, 'buen desempeño'),
(2, 'amarillo', 'FFFF00', 2, 'necesita atencion'),
(3, 'celeste', '00CCFF', 3, 'mal desempeño'),
(4, 'blanco', 'FFFFFF', 4, 'operador nuevo');
insert into sec_sequence (seq_object,seq_code) values('crit_status',4);


insert into criterios (crit_code, crit_oper_status_ini, crit_oper_status_fin, crit_cant_mal_desde, crit_cant_mal_hasta)
VALUES
(1, 1,1, 0, 0),
(2, 1,2, 1, 1),
(3, 1,3, 2, 100),
(4, 2,1, 0, 0),
(5, 2,2, 1, 1),
(6, 2,3, 2, 100),
(7, 3,2, 0, 1),
(8, 3,3, 2, 100),
(9, 4,2, 0, 1),
(10, 4,3, 2, 100);
insert into sec_sequence (seq_object,seq_code) values('criterios',11);


INSERT INTO cli_calls (cli_call_code, cli_call_name, cli_call_status) VALUES
(1, 'Inscripcion de nacimiento', 'ACTIVO'),
(2, 'Turno salud', 'ACTIVO'),
(3, 'Ticket social', 'ACTIVO'),
(4, 'Otorgamiento para licencia e conducir', 'ACTIVO'),
(5, 'Infracciones', 'ACTIVO'),
(6, 'Obstetricia Fernandez ', 'ACTIVO');
insert into sec_sequence (seq_object,seq_code) values('cli_calls',6);

insert into sec_sequence (seq_object,seq_code) values('sec_users',400);

INSERT INTO `sec_usrgroup` 
VALUES ('supervisores','supervisores del sistema'),
('operadores','operadores del sistema');

INSERT INTO `sec_groups` VALUES 
 ('supervisores','supervisores del sistema'),
('operadores','operadores del sistema');


insert into sec_groups_rights (gro_code,rig_name)
VALUES 
('supervisores','menu.archivo.inicio'),
('supervisores','monitoreos.menu'),
('supervisores','monitoreos.menu'),
('supervisores','monitoreos.supervisar'),
('supervisores','menu.archivo.inicio'),
('supervisores','reportes.menu'),
('supervisores','capacitacion.menu'),
('supervisores','capacitacion.supervisor'),
('supervisores','capacitacion.supervisor.pend'),
('supervisores','circuitos.menu'),
('supervisores','circuitos.circuitos'),
('supervisores','circuitos.cir_groups'),
('supervisores','circuitos.cir_oper'),

('operadores','menu.archivo.inicio'),
('operadores','reportes.menu'),
('operadores','monitoreos.operador'),
('operadores','capacitacion.menu'),
('operadores','capacitacion.operador'),
('operadores','capacitacion.operador.pendOK'),
('operadores','capacitacion.operador');
	
	
insert into  sec_parameters(par_code,par_value,par_description)
values
('min_puntaje','80','Puntaje minimo para aprobar'),
('mon_no_aprobo','2','Monitoreos a agregar si no aprobo'),
('cap_perjuicio','1','Agregar Capacitacion si hay perjuicio'),
('path_calls_1','/opt/lampp/htdocs/giv/documents/vox','Path de Consulta de Archivos VOX'),
('path_calls_2','/opt/lampp/htdocs/giv/documents/vox2','Path de Consulta de Archivos VOX'),
('path_validar','SI','Indica si hay que validar que el path exista');
-- D:\\ayax\\doc\\giv\\Monitoreos

INSERT INTO `cat_value_list` VALUES 
('cap_origen','Origen de la Capacitacion'),
('cap_habilidad','Habilidades Monitoreadas en la Capacitacion'),
('mon_motivo_cierre','Motivos de Cierre Forzado para Monitoreos'),
('oper_grupo','Grupo de operadores');
INSERT INTO `cat_value` VALUES 
('cap_origen','Monitoreo Diario',1,NULL,''),
('cap_origen','Agregar Habilidad',2,NULL,''),
('cap_origen','Otros',3,NULL,''),
('cap_habilidad','Registro Civil',1,NULL,''),
('cap_habilidad','Hospitales',2,NULL,''),
('cap_habilidad','Otros',3,NULL,''),
('mon_motivo_cierre','Renuncia',1,NULL,''),
('mon_motivo_cierre','Vacaciones',2,NULL,''),
('mon_motivo_cierre','Otros',3,NULL,''),
('oper_grupo','Grupo 1',1,NULL,''),
('oper_grupo','Grupo 2',2,NULL,''),
('oper_grupo','Grupo 3',3,NULL,'');