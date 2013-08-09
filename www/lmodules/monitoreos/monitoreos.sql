CREATE TABLE monitoreos (
  mon_code int(10) NOT NULL,
  cir_code int(10) NOT NULL,
  cirg_code int(10) NOT NULL,
  use_code_operador int not null,
  use_code_supervisor int not null, 
  mon_date datetime  NULL,
  mon_status varchar(20) NULL,
  mon_forzado  varchar(2) NULL, 
  mon_motivo   varchar(200) NULL,    
  mon_note varchar(400) NULL,  
  cli_call_code varchar(200) NULL,    
  mon_call_date datetime NULL, 
  mon_call_reference varchar(20) NULL,    
  doc_storage varchar(200) NULL,  
  mon_puntaje int NULL,    
  mon_aprobo varchar(2) NULL, 
  mon_perjuicio_cliente varchar(2) NULL,
  mon_add_mon int NULL,
  mon_add_cap int NULL,
  mon_use_code int null, 
  mon_date_aprox datetime  NULL, 
  constraint pk_monitoreos primary key clustered (mon_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE mon_items (
  mon_code int(10) NOT NULL,
  it_code int(10) NOT NULL,  
  it_name varchar(200) NOT NULL,
  it_order int(10)  NULL,
  it_importance int NULL,
  it_critico int NULL,
  it_puntaje int NULL,
  it_aprobo varchar(2)  NULL,
  it_perjuicio_cliente varchar(2)  NULL,
  it_note varchar(200) NULL,  
  constraint pk_mon_items primary key clustered (mon_code, it_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
