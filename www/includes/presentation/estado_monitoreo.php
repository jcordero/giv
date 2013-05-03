<?php 
include_once "presentation/select.php";

/** 	Tipo de dato: Codigo de usuario */
class CDH_ESTADO_MONITOREO  extends CDH_SELECT 
{
	function __construct($parent) 
	{
	    global $sess, $primary_db;
		parent::__construct($parent);
		$this->m_parent->m_search="fix";
		$this->m_fill_sql = "SELECT descripcion FROM estados_de_monitoreos where id_estado_de_monitoreo='<val>'";
		$this->m_helper_sql = "SELECT descripcion FROM estados_de_monitoreos where (id_estado_de_monitoreo='<val>'";
	}
	
	function getJsIncludes()
	{	
		/*
		return array(parent::getJsIncludes(),
			'<script type="text/javascript" src="'.WEB_PATH.'/common/presentation/generic.js"></script>', 
			'<script type="text/javascript" src="'.WEB_PATH.'/includes/presentation/canalpago.js"></script>');
		*/
	}
}

?>