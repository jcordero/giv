drop database IF EXISTS db_giv;
create database db_giv;
use db_giv;

DROP TABLE IF EXISTS items;
CREATE TABLE items (
  it_code int(10) NOT NULL,
  it_name varchar(200) NOT NULL,
  it_order int(10)  NULL,
  it_importance int NULL,
  it_status varchar(20) NULL,
  PRIMARY KEY (it_code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO items (it_code, it_name, it_importance, it_order, it_status) VALUES
(1, 'Presentación', 15, 1, 'ACTIVO'),
(2, 'Toma de Datos', 30, 2, 'ACTIVO'),
(3, 'Identificación de Necesidad', 30, 3, 'ACTIVO'),
(4, 'Nivel de información', 30, 4, 'ACTIVO'),
(5, 'Manejo de herramientas', 15, 5, 'ACTIVO'),
(6, 'Resolución', 30, 6, 'ACTIVO'),
(7, 'Despedida', 15, 7, 'ACTIVO'),
(8, 'Encuesta', 30, 8, 'ACTIVO');


DROP TABLE IF EXISTS circuitos;
CREATE TABLE circuitos (
  cir_code int(10) NOT NULL,
  cir_name varchar(200) NULL,
  cir_date_ini datetime NULL,
  cir_date_fin datetime  NULL,
  cir_importance_min int NULL,
  cir_status varchar(20) NULL,
  PRIMARY KEY (cir_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS monitoreos;
CREATE TABLE monitoreos (
  mon_code int(10) NOT NULL,
  cir_code int(10) NOT NULL,
  use_code_operador int not null,
  use_code_supervisor int not null, 
  mon_date datetime  NULL,
  mon_status varchar(20) NULL,
  mon_note varchar(200) NULL,  
  cli_call_code varchar(200) NULL,    
  mon_call_reference varchar(20) NULL,    
  mon_puntaje int NULL,    
  mon_aprobo varchar(2) NULL, 
  mon_perjuicio_cliente varchar(2) NULL,
  mon_add_mon varchar(2) NULL,
  mon_add_cap varchar(2) NULL,
  PRIMARY KEY (mon_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS mon_items;
CREATE TABLE mon_items (
  mon_code int(10) NOT NULL,
  it_code int(10) NOT NULL,  
  it_name varchar(200) NOT NULL,
  it_order int(10)  NULL,
  it_importance int NULL,
  it_puntaje int NULL,
  it_aprobo varchar(2)  NULL,
  it_perjuicio_cliente varchar(2)  NULL,
  it_note varchar(200) NULL,  
  PRIMARY KEY (mon_code, it_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS cir_groups;
CREATE TABLE cir_groups (
  cirg_code int(10) NOT NULL,
  cir_code int(10) NOT NULL,
  use_code_supervisor int not null,   
  PRIMARY KEY (cirg_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  

DROP TABLE IF EXISTS cir_groups_oper;
CREATE TABLE cir_groups_oper (
  cirg_code int(10) NOT NULL,
  use_code_operador int not null,
  crit_status_ini int NULL,  
  crit_status_fin int NULL, 
  cirg_cierre_forzado  varchar(2) NULL, 
  cirg_cierre_motivo   varchar(200) NULL,     
  cirg_cant_mon_pendientes int NULL,  
  cirg_cant_mon_realizados int NULL,  
  cirg_cant_mon_ok int NULL,  
  cirg_cant_mon_mal int NULL,  
  PRIMARY KEY (cirg_code, use_code_operador)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  

DROP TABLE IF EXISTS criterios;
CREATE TABLE criterios (
  crit_code int(10) NOT NULL,
  crit_oper_status_ini int NULL,  
  crit_oper_status_fin int NULL, 
  crit_cant_monitoreos int NULL,    
  crit_cant_mal_desde int NULL, 
  crit_cant_mal_hasta int NULL, 
  PRIMARY KEY (crit_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  

DROP TABLE IF EXISTS crit_status;
CREATE TABLE crit_status (
  crit_status int NULL,  
  crit_status_name varchar(50) NULL, 
  crit_status_color varchar(20) NULL, 
  crit_status_color_html varchar(10) NULL,   
  crit_status_mon_sem int NULL,     
  PRIMARY KEY (crit_status)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  


INSERT INTO crit_status (crit_status, crit_status_color, crit_status_color_html, crit_status_mon_sem, crit_status_name) VALUES
(1, 'verde', '009900', 3, 'buen desempeño'),
(2, 'amarillo', 'FFFF00', 4, 'necesita atención'),
(3, 'celeste', '00CCFF', 5, 'mal desempeño'),
(4, 'blanco', 'FFFFFF', 7, 'operador nuevo');

DROP TABLE IF EXISTS cli_calls;
CREATE TABLE cli_calls (
  cli_call_code int(10) NOT NULL,
  cli_call_name varchar(200) NULL,  
  cli_call_status varchar(20) NULL,
  PRIMARY KEY (cli_call_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;   
-- --------------------------------------------------------
