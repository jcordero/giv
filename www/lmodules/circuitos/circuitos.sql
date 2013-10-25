CREATE TABLE circuitos (
  cir_code int(10) NOT NULL,
  cir_name varchar(200) NULL,
  cir_semanas int(10)  NULL,
  cir_date_ini datetime NULL,
  cir_date_fin datetime  NULL,
  cir_importance_min int NULL,
  cir_status varchar(20) NULL,
  constraint pk_circuitos primary key clustered 
  (	cir_code asc)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  

CREATE TABLE cir_semanas (
  cir_code int(10) NOT NULL,
  cir_semana int NULL, 
  cir_date datetime NULL,
  cir_date_ini datetime NULL,
  cir_date_fin datetime  NULL,
  constraint pk_cir_semanas primary key clustered 
  (	cir_code, cir_date)
) 
  
CREATE TABLE cir_groups (
  cirg_code int(10) NOT NULL,
  cir_code int(10) NOT NULL,
  use_code_supervisor int not null,   
  oper_grupo varchar(20) NOT NULL,
  constraint pk_cir_groups primary key clustered 
  (	cirg_code asc)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  

CREATE TABLE cir_oper (
  cir_code int(10) NOT NULL,  
  use_code_operador int not null,
  crit_status_ini int NULL,  
  crit_status_fin int NULL,  
  cirg_puntaje_prom  float NULL,  
  cirg_cant_mon_pendientes int NULL,  
  cirg_cant_mon_realizados int NULL,  
  cirg_cant_mon_ok int NULL,  
  cirg_cant_mon_mal int NULL,  
  cirg_cant_cap_pendientes int NULL,  
  cirg_cant_cap_realizados int NULL,   
  cirg_cant_cap_ok int NULL,  
  cirg_cant_cap_mal int NULL,  
  cirg_cant_mon_cierre_forz  int NULL,  
  constraint pk_cir_oper primary key clustered 
   (cir_code, use_code_operador)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;  


/*
create table cir1 (
  cir_code int(10) NOT NULL,
  cir_semana int NULL, 
  cir_date datetime NULL
);
insert into cir1 (cir_code,cir_semana,cir_date)
select cir_code,(select count(*) from cir_semanas c1 where c1.cir_code=c2.cir_code and c1.cir_date<=c2.cir_date),cir_date from cir_semanas c2;

update cir_semanas set cir_semana = (select cir_semana from cir1 where cir1.cir_code = cir_semanas.cir_code and   cir1.cir_date = cir_semanas.cir_date);
drop table cir1;
*/
 
-- --------------------------------------------------------
