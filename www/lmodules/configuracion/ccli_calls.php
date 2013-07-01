<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccli_calls') ) {
class ccli_calls extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccli_calls";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cli_call_code'] = new CField(Array("Name"=>"cli_call_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false, "Sequence"=>"cli_calls"));
        $this->m_fields['cli_call_name'] = new CField(Array("Name"=>"cli_call_name", "Size"=>200, "IsForDB"=>true, "Order"=>102));
        $this->m_fields['cli_call_status'] = new CField(Array("Name"=>"cli_call_status", "Size"=>20, "IsForDB"=>true, "Order"=>103));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cli_call_code, cli_call_name, cli_call_status FROM cli_calls  WHERE cli_call_code= :cli_call_code_key:";
        $this->m_objfactory_sql = "SELECT cli_call_code, cli_call_name, cli_call_status FROM cli_calls";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE cli_calls SET cli_call_code= :cli_call_code:, cli_call_name= :cli_call_name:, cli_call_status= :cli_call_status: WHERE cli_call_code=:cli_call_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO cli_calls(cli_call_code, cli_call_name, cli_call_status) VALUES (:cli_call_code:, :cli_call_name:, :cli_call_status:)";
        $this->m_savedb_delete_sql = "DELETE FROM cli_calls WHERE cli_call_code=:cli_call_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM cli_calls";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM cli_calls ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase ccli_calls
}
?>
