CREATE TABLE items (
  it_code int(10) NOT NULL,
  it_name varchar(200) NOT NULL,
  it_order int(10)  NULL,
  it_importance int NULL,
  it_status varchar(20) NULL,
  it_critico varchar(2) NULL,
	constraint pk_items primary key clustered 
	(
		it_code asc
	)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;   


CREATE TABLE cli_calls (
  cli_call_code int(10) NOT NULL,
  cli_call_name varchar(200) NULL,  
  cli_call_status varchar(20) NULL,
  constraint pk_cli_calls primary key clustered 
  (
		cli_call_code asc
  )
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;   


CREATE TABLE criterios (
  crit_code int(10) NOT NULL,
  crit_oper_status_ini int NULL,  
  crit_oper_status_fin int NULL, 
  crit_cant_mal_desde int NOT NULL, 
  crit_cant_mal_hasta int NOT NULL, 
    constraint pk_criterios primary key clustered (crit_code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  


CREATE TABLE crit_status (
  crit_status int NULL,  
  crit_status_name varchar(50) NULL, 
  crit_status_color varchar(20) NULL, 
  crit_status_color_html varchar(10) NULL,   
  crit_status_mon_sem int NULL, 
  constraint pk_crit_status primary key clustered (crit_status)  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  


CREATE TABLE oper_status (
  use_code  varchar(50) NULL,  
  crit_status int NULL, 
  oper_grupo varchar(50) NULL,  
  oper_nuevo varchar(2) NULL,   
  oper_hora_in varchar(10) NULL,   
  oper_hora_out varchar(10) NULL,    
  constraint pk_oper_status primary key clustered (use_code)  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  

-- --------------------------------------------------------
