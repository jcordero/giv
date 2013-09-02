<?php 
ini_set("display_errors","off");
include_once "common/cdatatypes.php";

class CDH_BUSCAR_GRUPOS extends CDataHandler {

	function __construct($parent) 
	{
		parent::__construct($parent);	
	
		$fld = $this->m_parent;
	}
	function buscar($params)
	{
		global $primary_db,$sess;
      	$ret = array();
		$valores = array();
		//list($dpa_code,$ptar_banda,$prv_cuit,$cli_cuit,$ptar_number,$pag_aut_ret_tipo_doc,$pag_aut_ret_doc) = explode("|",$params);
		$oper_grupo = $params;
		$sql = "select o.use_code as use_code,use_name,oper_grupo,oper_nuevo,oper_hora_in,oper_hora_out,crit_status_name,o.crit_status as crit_status
    		from oper_status as o join sec_users as u on o.use_code=u.use_code join crit_status as c on o.crit_status=c.crit_status where oper_grupo='$oper_grupo' 
			and oper_status='ACTIVO' ";
		$rs = $primary_db->do_execute($sql);
		$i=0;
		while( $row = $primary_db->_fetch_row($rs) )
		{		
		        $i++;			
				$fila1 = array();
				$fila1[] = array("campo" => "oper_grupo","codigo" => $row["oper_grupo"],"valor" => $row["oper_grupo"]);
				$fila1[] = array("campo" => "use_code","codigo" => $row["use_code"],"valor" => $row["use_code"]);			
				$fila1[] = array("campo" => "crit_status","codigo" => $row["crit_status"],"valor" => $row["crit_status"]);
				$fila1[] = array("campo" => "oper_nuevo","codigo" => $row["oper_nuevo"],"valor" => $row["oper_nuevo"]);              
				$fila1[] = array("campo" => "oper_hora_in","codigo" => $row["oper_hora_in"],"valor" => $row["oper_hora_in"]);		
				$fila1[] = array("campo" => "oper_hora_out","codigo" => $row["oper_hora_out"],"valor" => $row["oper_hora_out"]);				
				$ret[] = array("op" => "row", "clase" => "oper_status", "fila" => $fila1);
		} 
		/*
		if ($i==0)
		{
		 $ret[] = array("op" => "func", "call" => "reingresar", "params" => "");
		 $ret[] = array("op" => "msg", "mensaje" => "No hay Operadores Asignados Al Grupo", "titulo" => "ERROR");
		} 
		else
		{
		  $ret[] = array("op" => "func", "call" => "sacarBotonBuscar", "params" => "");
		}
		*/
		$ret[] = array("op" => "func", "call" => "sacarBotonBuscar", "params" => "");
		return json_encode($ret);
	}


	
}

?>
