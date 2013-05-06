CREATE TABLE estados_de_monitoreos (
	id_estado_de_monitoreo int(10) unsigned NOT NULL,
	color varchar(50) NOT NULL,
	color_html varchar(50) NOT NULL,
	monitoreos_semanales tinyint(4) NOT NULL,
	descripcion varchar(50) NOT NULL,
	constraint pk_estados_de_monitoreo PRIMARY KEY clustered
	(
		id_estado_de_monitoreo
	)
)

CREATE TABLE items_a_monitorear (
	id_item_a_monitorear int(10) unsigned NOT NULL,
	titulo varchar(50) NOT NULL,
	nivel_de_determinacion int(3) unsigned NOT NULL,
	orden int(3) unsigned  NOT NULL,
	constraint pk_item_de_monitoreo PRIMARY KEY clustered
	(
		id_item_a_monitorear
	)
)


CREATE TABLE motivos_de_cierre_forzado (
	id_motivo_de_cierre_forzado int(10) NOT NULL DEFAULT '0',
	motivo varchar(100) DEFAULT NULL,
	constraint pk_motivos_de_cierre_forzado PRIMARY KEY clustered 
	(
		id_motivo_de_cierre_forzado
	)
)

CREATE TABLE monitoreos (
  id_monitoreo int(10) unsigned NOT NULL AUTO_INCREMENT,
  id_supervisor int(10) unsigned NOT NULL,
  id_operador int(10) unsigned NOT NULL,
  id_circuito int(10) unsigned NOT NULL,
  codigo_de_referencia varchar(50) DEFAULT NULL,
  fecha_de_monitoreo datetime NOT NULL,
  resultado tinyint(10) unsigned NOT NULL,
  comentarios text,
  fecha_de_creacion datetime NOT NULL,
  constraint pk_monitoreos PRIMARY KEY clustered 
	(
		id_monitoreo
	)
)

CREATE TABLE items_de_monitoreo (
  id_item_de_monitoreo int(10) unsigned NOT NULL AUTO_INCREMENT,
  id_monitoreo int(10) unsigned NOT NULL DEFAULT '0',
  id_item_a_monitorear int(10) unsigned NOT NULL DEFAULT '0',
  resultado tinyint(3) unsigned NOT NULL DEFAULT '0',
  constraint pk_items_de_monitoreo PRIMARY KEY clustered 
	(
		id_item_de_monitoreo
	)
)
