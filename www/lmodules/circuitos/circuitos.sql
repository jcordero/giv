CREATE TABLE circuitos (
  cir_code int(10) NOT NULL,
  cir_name varchar(200) NULL,
  cir_date_ini datetime NULL,
  cir_date_fin datetime  NULL,
  cir_importance_min int NULL,
  cir_status varchar(20) NULL,
  constraint pk_circuitos primary key clustered 
  (	cir_code asc)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  


CREATE TABLE cir_groups (
  cirg_code int(10) NOT NULL,
  cir_code int(10) NOT NULL,
  use_code_supervisor int not null,   
  oper_grupo varchar(20) NOT NULL,
  constraint pk_cir_groups primary key clustered 
  (	cirg_code asc)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  

CREATE TABLE cir_groups_oper (
  cirg_code int(10) NOT NULL,
  cir_code int(10) NOT NULL,  
  use_code_operador int not null,
  crit_status_ini int NULL,  
  crit_status_fin int NULL,   
  cirg_cant_mon_pendientes int NULL,  
  cirg_cant_mon_realizados int NULL,  
  cirg_cant_mon_ok int NULL,  
  cirg_cant_mon_mal int NULL,  
  cirg_cant_cap_pendientes int NULL,  
  cirg_cant_cap_realizados int NULL,   
  cirg_cant_cap_ok int NULL,  
  cirg_cant_cap_mal int NULL,   
  constraint pk_cir_groups_oper primary key clustered 
   (cirg_code, use_code_operador)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  



 
-- --------------------------------------------------------
