CREATE TABLE capacitacion (
  cap_code int(10) NOT NULL,
  mon_code int(10) NOT NULL,
  cir_code int(10) NOT NULL,
  cirg_code int(10) NOT NULL,
  use_code_operador int not null,
  use_code_supervisor int not null, 
  cap_date datetime  NULL,
  cap_status varchar(20) NULL,
  doc_storage varchar(200) NULL,
  cap_rol_play_aprobado varchar(2) NULL, 
  cap_use_code int null, 
  cap_origen  varchar(20) NULL, 
  cap_motivo varchar(200) NULL,    
  cap_habilidad varchar(200) NULL, 
  cap_tipo_tramite varchar(200) NULL,  
  cap_observaciones varchar(400) NULL,  
  cap_visto_oper varchar(2) NULL,
  cap_date_visto_oper datetime  NULL,
  constraint pk_capacitacion primary key clustered (cap_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


-- --------------------------------------------------------
