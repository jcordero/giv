<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('coper_status_m') ) {
class coper_status_m extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "coper_status_m";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['use_code'] = new CField(Array("Name"=>"use_code", "Size"=>50, "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['crit_status'] = new CField(Array("Name"=>"crit_status", "Type"=>"int", "IsForDB"=>true, "Order"=>102));
        $this->m_fields['oper_grupo'] = new CField(Array("Name"=>"oper_grupo", "Size"=>50, "IsForDB"=>true, "Order"=>103, "IsNullable"=>false));
        $this->m_fields['oper_nuevo'] = new CField(Array("Name"=>"oper_nuevo", "Size"=>2, "IsForDB"=>true, "Order"=>104));
        $this->m_fields['oper_hora_in'] = new CField(Array("Name"=>"oper_hora_in", "Size"=>10, "IsForDB"=>true, "Order"=>105));
        $this->m_fields['oper_hora_out'] = new CField(Array("Name"=>"oper_hora_out", "Size"=>10, "IsForDB"=>true, "Order"=>106));
        $this->m_fields['oper_motivo_cierre'] = new CField(Array("Name"=>"oper_motivo_cierre", "Size"=>50, "IsForDB"=>true, "Order"=>107));
        $this->m_fields['oper_status'] = new CField(Array("Name"=>"oper_status", "Size"=>10, "IsForDB"=>true, "Order"=>108));
        $this->m_fields['modificar_circuito'] = new CField(Array("Name"=>"modificar_circuito", "Size"=>2, "Type"=>"VARCHAR", "Order"=>9));
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Type"=>"INT", "Order"=>10));
        $this->m_fields['cir_date_ini'] = new CField(Array("Name"=>"cir_date_ini", "Type"=>"DATETIME", "Order"=>11));
        $this->m_fields['cir_date_fin'] = new CField(Array("Name"=>"cir_date_fin", "Type"=>"DATETIME", "Order"=>12));
        $this->m_fields['cir_importance_min'] = new CField(Array("Name"=>"cir_importance_min", "Type"=>"INT", "Order"=>13));
        $this->m_fields['cir_status'] = new CField(Array("Name"=>"cir_status", "Size"=>20, "Type"=>"VARCHAR", "Order"=>14));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT use_code, crit_status, oper_grupo, oper_nuevo, oper_hora_in, oper_hora_out, oper_motivo_cierre, oper_status FROM oper_status  WHERE use_code= :use_code_key:";
        $this->m_objfactory_sql = "SELECT use_code, crit_status, oper_grupo, oper_nuevo, oper_hora_in, oper_hora_out, oper_motivo_cierre, oper_status FROM oper_status";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE oper_status SET use_code= :use_code:, crit_status= :crit_status:, oper_grupo= :oper_grupo:, oper_nuevo= :oper_nuevo:, oper_hora_in= :oper_hora_in:, oper_hora_out= :oper_hora_out:, oper_motivo_cierre= :oper_motivo_cierre:, oper_status= :oper_status: WHERE use_code=:use_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO oper_status(use_code, crit_status, oper_grupo, oper_nuevo, oper_hora_in, oper_hora_out, oper_motivo_cierre, oper_status) VALUES (:use_code:, :crit_status:, :oper_grupo:, :oper_nuevo:, :oper_hora_in:, :oper_hora_out:, :oper_motivo_cierre:, :oper_status:)";
        $this->m_savedb_delete_sql = "DELETE FROM oper_status WHERE use_code=:use_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM oper_status";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM oper_status ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase coper_status_m
}
?>
