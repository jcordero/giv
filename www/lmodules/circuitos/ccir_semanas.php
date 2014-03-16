<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccir_semanas') ) {
class ccir_semanas extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccir_semanas";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['cir_semana'] = new CField(Array("Name"=>"cir_semana", "Type"=>"int", "IsForDB"=>true, "Order"=>102));
        $this->m_fields['cir_date'] = new CField(Array("Name"=>"cir_date", "Type"=>"datetime", "IsPK"=>true, "IsForDB"=>true, "Order"=>103));
        $this->m_fields['cir_date_ini'] = new CField(Array("Name"=>"cir_date_ini", "Type"=>"datetime", "IsForDB"=>true, "Order"=>104));
        $this->m_fields['cir_date_fin'] = new CField(Array("Name"=>"cir_date_fin", "Type"=>"datetime", "IsForDB"=>true, "Order"=>105));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cir_code, cir_semana, cir_date, cir_date_ini, cir_date_fin FROM cir_semanas  WHERE cir_code= :cir_code_key: AND cir_date= :cir_date_key:";
        $this->m_objfactory_sql = "SELECT cir_code, cir_semana, cir_date, cir_date_ini, cir_date_fin FROM cir_semanas";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE cir_semanas SET cir_code= :cir_code:, cir_semana= :cir_semana:, cir_date= :cir_date:, cir_date_ini= :cir_date_ini:, cir_date_fin= :cir_date_fin: WHERE cir_code=:cir_code_key: AND cir_date=:cir_date_key:";
        $this->m_savedb_insert_sql = "INSERT INTO cir_semanas(cir_code, cir_semana, cir_date, cir_date_ini, cir_date_fin) VALUES (:cir_code:, :cir_semana:, :cir_date:, :cir_date_ini:, :cir_date_fin:)";
        $this->m_savedb_delete_sql = "DELETE FROM cir_semanas WHERE cir_code=:cir_code_key: AND cir_date=:cir_date_key:";
        $this->m_savedb_purge_sql = "DELETE FROM cir_semanas";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM cir_semanas ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase ccir_semanas
}
?>
