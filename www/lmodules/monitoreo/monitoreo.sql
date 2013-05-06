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
