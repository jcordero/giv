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