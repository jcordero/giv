<?php 
include_once "presentation/select.php";

/** 	Tipo de dato: Codigo de usuario */
class CDH_CIRG_CODE  extends CDH_SELECT 
{
	function __construct($parent) 
	{

		parent::__construct($parent);
		$this->m_parent->m_search="fix";
		$this->m_helper_sql="SELECT concat(cir_name,' - ',oper_grupo)FROM cir_groups join circuitos on cir_groups.cir_code = circuitos.cir_code  WHERE cirg_code='<val>'";
		$this->m_fill_sql="SELECT  concat(cir_name,' - ',oper_grupo),cirg_code FROM cir_groups order by concat(cir_name,' - ',oper_grupo)";
	}
	

}

?>