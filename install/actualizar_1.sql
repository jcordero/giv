DROP INDEX `PRIMARY` ON cir_oper
alter TABLE cir_oper drop column cirg_code;
alter TABLE cir_oper add constraint pk_cir_oper primary key clustered 
   (cir_code, use_code_operador);
   