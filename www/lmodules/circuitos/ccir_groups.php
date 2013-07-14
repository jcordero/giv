<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccir_groups') ) {
class ccir_groups extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccir_groups";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cirg_code'] = new CField(Array("Name"=>"cirg_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false, "Sequence"=>"cir_groups"));
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['use_code_supervisor'] = new CField(Array("Name"=>"use_code_supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "IsNullable"=>false));
        $this->m_fields['oper_grupo'] = new CField(Array("Name"=>"oper_grupo", "Size"=>20, "IsForDB"=>true, "Order"=>104, "IsNullable"=>false));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cirg_code, cir_code, use_code_supervisor, oper_grupo FROM cir_groups  WHERE cirg_code= :cirg_code_key:";
        $this->m_objfactory_sql = "SELECT cirg_code, cir_code, use_code_supervisor, oper_grupo FROM cir_groups";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE cir_groups SET cirg_code= :cirg_code:, cir_code= :cir_code:, use_code_supervisor= :use_code_supervisor:, oper_grupo= :oper_grupo: WHERE cirg_code=:cirg_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO cir_groups(cirg_code, cir_code, use_code_supervisor, oper_grupo) VALUES (:cirg_code:, :cir_code:, :use_code_supervisor:, :oper_grupo:)";
        $this->m_savedb_delete_sql = "DELETE FROM cir_groups WHERE cirg_code=:cirg_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM cir_groups";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM cir_groups ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase ccir_groups
}
?>
