<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('coper_status') ) {
class coper_status extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "coper_status";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['use_code'] = new CField(Array("Name"=>"use_code", "Size"=>50, "IsPK"=>true, "IsForDB"=>true, "Order"=>101));
        $this->m_fields['crit_status'] = new CField(Array("Name"=>"crit_status", "Type"=>"int", "IsForDB"=>true, "Order"=>102));
        $this->m_fields['oper_nuevo'] = new CField(Array("Name"=>"oper_nuevo", "Type"=>"int", "IsForDB"=>true, "Order"=>103));
        $this->m_fields['oper_hora_in'] = new CField(Array("Name"=>"oper_hora_in", "Size"=>10, "IsForDB"=>true, "Order"=>104));
        $this->m_fields['oper_hora_out'] = new CField(Array("Name"=>"oper_hora_out", "Size"=>10, "IsForDB"=>true, "Order"=>105));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT use_code, crit_status, oper_nuevo, oper_hora_in, oper_hora_out FROM oper_status  WHERE use_code= :use_code_key:";
        $this->m_objfactory_sql = "SELECT use_code, crit_status, oper_nuevo, oper_hora_in, oper_hora_out FROM oper_status";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE oper_status SET use_code= :use_code:, crit_status= :crit_status:, oper_nuevo= :oper_nuevo:, oper_hora_in= :oper_hora_in:, oper_hora_out= :oper_hora_out: WHERE use_code=:use_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO oper_status(use_code, crit_status, oper_nuevo, oper_hora_in, oper_hora_out) VALUES (:use_code:, :crit_status:, :oper_nuevo:, :oper_hora_in:, :oper_hora_out:)";
        $this->m_savedb_delete_sql = "DELETE FROM oper_status WHERE use_code=:use_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM oper_status";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM oper_status ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase coper_status
}
?>