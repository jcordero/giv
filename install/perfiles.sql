delete from `sec_usrgroup` ;
INSERT INTO `sec_usrgroup` 
VALUES ('supervisores','supervisores del sistema'),
('operadores','operadores del sistema');
delete from sec_groups;
INSERT INTO `sec_groups` VALUES 
 ('supervisores','supervisores del sistema'),
('operadores','operadores del sistema');

delete from sec_groups_rights;
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

delete from sec_usrgroup_users;
INSERT INTO `sec_usrgroup_users` (use_code,ugr_code) values
('3','supervisores'),
('4','supervisores'),
('5','supervisores'),
('6','supervisores'),
('7','supervisores'),
('8','supervisores'),
('9','supervisores'),
('102','operadores'),
('105','operadores'),
('106','operadores'),
('107','operadores'),
('108','operadores'),
('109','operadores'),
('110','operadores'),
('111','operadores'),
('114','operadores'),
('116','operadores'),
('118','operadores'),
('119','operadores'),
('123','operadores'),
('126','operadores'),
('127','operadores'),
('129','operadores'),
('130','operadores'),
('131','operadores'),
('133','operadores'),
('134','operadores'),
('135','operadores'),
('137','operadores'),
('138','operadores'),
('139','operadores'),
('140','operadores'),
('141','operadores'),
('143','operadores'),
('144','operadores'),
('147','operadores'),
('149','operadores'),
('150','operadores'),
('151','operadores'),
('152','operadores'),
('153','operadores'),
('154','operadores'),
('155','operadores'),
('157','operadores'),
('159','operadores'),
('161','operadores'),
('162','operadores'),
('163','operadores'),
('165','operadores'),
('166','operadores'),
('167','operadores'),
('168','operadores'),
('171','operadores'),
('172','operadores'),
('173','operadores'),
('174','operadores'),
('175','operadores'),
('177','operadores'),
('178','operadores'),
('179','operadores'),
('180','operadores'),
('181','operadores'),
('184','operadores'),
('187','operadores'),
('189','operadores'),
('190','operadores'),
('192','operadores'),
('194','operadores'),
('195','operadores'),
('196','operadores'),
('197','operadores'),
('206','operadores'),
('208','operadores'),
('209','operadores'),
('211','operadores'),
('215','operadores'),
('217','operadores'),
('219','operadores'),
('220','operadores'),
('221','operadores'),
('222','operadores'),
('224','operadores'),
('225','operadores'),
('226','operadores'),
('227','operadores'),
('228','operadores'),
('229','operadores'),
('230','operadores'),
('231','operadores'),
('301','operadores'),
('302','operadores'),
('304','operadores'),
('305','operadores'),
('306','operadores'),
('307','operadores'),
('309','operadores'),
('310','operadores'),
('311','operadores'),
('312','operadores'),
('313','operadores'),
('316','operadores'),
('318','operadores'),
('319','operadores'),
('320','operadores'),
('321','operadores'),
('324','operadores'),
('326','operadores'),
('327','operadores'),
('328','operadores'),
('329','operadores'),
('330','operadores'),
('331','operadores'),
('332','operadores'),
('334','operadores'),
('335','operadores'),
('337','operadores'),
('340','operadores'),
('341','operadores'),
('342','operadores'),
('343','operadores'),
('345','operadores'),
('346','operadores'),
('348','operadores'),
('349','operadores'),
('352','operadores'),
('353','operadores'),
('355','operadores'),
('356','operadores'),
('357','operadores'),
('359','operadores'),
('362','operadores'),
('363','operadores'),
('365','operadores'),
('368','operadores'),
('369','operadores'),
('372','operadores'),
('373','operadores'),
('375','operadores'),
('376','operadores'),
('380','operadores'),
('382','operadores'),
('383','operadores'),
('384','operadores'),
('385','operadores'),
('387','operadores'),
('388','operadores'),
('391','operadores'),
('394','operadores'),
('395','operadores'),
('398','operadores');

delete from sec_user_groups;
INSERT INTO `sec_user_groups` (use_code,gro_code) values
('3','supervisores'),
('4','supervisores'),
('5','supervisores'),
('6','supervisores'),
('7','supervisores'),
('8','supervisores'),
('9','supervisores'),
('102','operadores'),
('105','operadores'),
('106','operadores'),
('107','operadores'),
('108','operadores'),
('109','operadores'),
('110','operadores'),
('111','operadores'),
('114','operadores'),
('116','operadores'),
('118','operadores'),
('119','operadores'),
('123','operadores'),
('126','operadores'),
('127','operadores'),
('129','operadores'),
('130','operadores'),
('131','operadores'),
('133','operadores'),
('134','operadores'),
('135','operadores'),
('137','operadores'),
('138','operadores'),
('139','operadores'),
('140','operadores'),
('141','operadores'),
('143','operadores'),
('144','operadores'),
('147','operadores'),
('149','operadores'),
('150','operadores'),
('151','operadores'),
('152','operadores'),
('153','operadores'),
('154','operadores'),
('155','operadores'),
('157','operadores'),
('159','operadores'),
('161','operadores'),
('162','operadores'),
('163','operadores'),
('165','operadores'),
('166','operadores'),
('167','operadores'),
('168','operadores'),
('171','operadores'),
('172','operadores'),
('173','operadores'),
('174','operadores'),
('175','operadores'),
('177','operadores'),
('178','operadores'),
('179','operadores'),
('180','operadores'),
('181','operadores'),
('184','operadores'),
('187','operadores'),
('189','operadores'),
('190','operadores'),
('192','operadores'),
('194','operadores'),
('195','operadores'),
('196','operadores'),
('197','operadores'),
('206','operadores'),
('208','operadores'),
('209','operadores'),
('211','operadores'),
('215','operadores'),
('217','operadores'),
('219','operadores'),
('220','operadores'),
('221','operadores'),
('222','operadores'),
('224','operadores'),
('225','operadores'),
('226','operadores'),
('227','operadores'),
('228','operadores'),
('229','operadores'),
('230','operadores'),
('231','operadores'),
('301','operadores'),
('302','operadores'),
('304','operadores'),
('305','operadores'),
('306','operadores'),
('307','operadores'),
('309','operadores'),
('310','operadores'),
('311','operadores'),
('312','operadores'),
('313','operadores'),
('316','operadores'),
('318','operadores'),
('319','operadores'),
('320','operadores'),
('321','operadores'),
('324','operadores'),
('326','operadores'),
('327','operadores'),
('328','operadores'),
('329','operadores'),
('330','operadores'),
('331','operadores'),
('332','operadores'),
('334','operadores'),
('335','operadores'),
('337','operadores'),
('340','operadores'),
('341','operadores'),
('342','operadores'),
('343','operadores'),
('345','operadores'),
('346','operadores'),
('348','operadores'),
('349','operadores'),
('352','operadores'),
('353','operadores'),
('355','operadores'),
('356','operadores'),
('357','operadores'),
('359','operadores'),
('362','operadores'),
('363','operadores'),
('365','operadores'),
('368','operadores'),
('369','operadores'),
('372','operadores'),
('373','operadores'),
('375','operadores'),
('376','operadores'),
('380','operadores'),
('382','operadores'),
('383','operadores'),
('384','operadores'),
('385','operadores'),
('387','operadores'),
('388','operadores'),
('391','operadores'),
('394','operadores'),
('395','operadores'),
('398','operadores');

