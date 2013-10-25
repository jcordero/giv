<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccircuitos') ) {
class ccircuitos extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccircuitos";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['cir_name'] = new CField(Array("Name"=>"cir_name", "Size"=>200, "IsForDB"=>true, "Order"=>102));
        $this->m_fields['cir_semanas'] = new CField(Array("Name"=>"cir_semanas", "Type"=>"int", "IsForDB"=>true, "Order"=>103));
        $this->m_fields['cir_date_ini'] = new CField(Array("Name"=>"cir_date_ini", "Type"=>"datetime", "IsForDB"=>true, "Order"=>104));
        $this->m_fields['cir_date_fin'] = new CField(Array("Name"=>"cir_date_fin", "Type"=>"datetime", "IsForDB"=>true, "Order"=>105));
        $this->m_fields['cir_importance_min'] = new CField(Array("Name"=>"cir_importance_min", "Type"=>"int", "IsForDB"=>true, "Order"=>106));
        $this->m_fields['cir_status'] = new CField(Array("Name"=>"cir_status", "Size"=>20, "IsForDB"=>true, "Order"=>107));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cir_code, cir_name, cir_semanas, cir_date_ini, cir_date_fin, cir_importance_min, cir_status FROM circuitos  WHERE cir_code= :cir_code_key:";
        $this->m_objfactory_sql = "SELECT cir_code, cir_name, cir_semanas, cir_date_ini, cir_date_fin, cir_importance_min, cir_status FROM circuitos";
        $this->m_objfactory_suffix_sql = " ORDER BY cir_date_ini desc";
        $this->m_savedb_update_sql = "UPDATE circuitos SET cir_code= :cir_code:, cir_name= :cir_name:, cir_semanas= :cir_semanas:, cir_date_ini= :cir_date_ini:, cir_date_fin= :cir_date_fin:, cir_importance_min= :cir_importance_min:, cir_status= :cir_status: WHERE cir_code=:cir_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO circuitos(cir_code, cir_name, cir_semanas, cir_date_ini, cir_date_fin, cir_importance_min, cir_status) VALUES (:cir_code:, :cir_name:, :cir_semanas:, :cir_date_ini:, :cir_date_fin:, :cir_importance_min:, :cir_status:)";
        $this->m_savedb_delete_sql = "DELETE FROM circuitos WHERE cir_code=:cir_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM circuitos";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM circuitos ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase ccircuitos
}
?>
