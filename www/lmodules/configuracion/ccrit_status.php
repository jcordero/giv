<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccrit_status') ) {
class ccrit_status extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccrit_status";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['crit_status'] = new CField(Array("Name"=>"crit_status", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Sequence"=>"crit_status"));
        $this->m_fields['crit_status_name'] = new CField(Array("Name"=>"crit_status_name", "Size"=>50, "IsForDB"=>true, "Order"=>102));
        $this->m_fields['crit_status_color'] = new CField(Array("Name"=>"crit_status_color", "Size"=>20, "IsForDB"=>true, "Order"=>103));
        $this->m_fields['crit_status_color_html'] = new CField(Array("Name"=>"crit_status_color_html", "Size"=>10, "IsForDB"=>true, "Order"=>104));
        $this->m_fields['crit_status_mon_sem'] = new CField(Array("Name"=>"crit_status_mon_sem", "Type"=>"int", "IsForDB"=>true, "Order"=>105));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT crit_status, crit_status_name, crit_status_color, crit_status_color_html, crit_status_mon_sem FROM crit_status  WHERE crit_status= :crit_status_key:";
        $this->m_objfactory_sql = "SELECT crit_status, crit_status_name, crit_status_color, crit_status_color_html, crit_status_mon_sem FROM crit_status";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE crit_status SET crit_status= :crit_status:, crit_status_name= :crit_status_name:, crit_status_color= :crit_status_color:, crit_status_color_html= :crit_status_color_html:, crit_status_mon_sem= :crit_status_mon_sem: WHERE crit_status=:crit_status_key:";
        $this->m_savedb_insert_sql = "INSERT INTO crit_status(crit_status, crit_status_name, crit_status_color, crit_status_color_html, crit_status_mon_sem) VALUES (:crit_status:, :crit_status_name:, :crit_status_color:, :crit_status_color_html:, :crit_status_mon_sem:)";
        $this->m_savedb_delete_sql = "DELETE FROM crit_status WHERE crit_status=:crit_status_key:";
        $this->m_savedb_purge_sql = "DELETE FROM crit_status";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM crit_status ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase ccrit_status
}
?>
