<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccriterios') ) {
class ccriterios extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccriterios";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['crit_code'] = new CField(Array("Name"=>"crit_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false, "Sequence"=>"criterios"));
        $this->m_fields['crit_oper_status_ini'] = new CField(Array("Name"=>"crit_oper_status_ini", "Type"=>"int", "IsForDB"=>true, "Order"=>102));
        $this->m_fields['crit_oper_status_fin'] = new CField(Array("Name"=>"crit_oper_status_fin", "Type"=>"int", "IsForDB"=>true, "Order"=>103));
        $this->m_fields['crit_cant_mal_desde'] = new CField(Array("Name"=>"crit_cant_mal_desde", "Type"=>"int", "IsForDB"=>true, "Order"=>104));
        $this->m_fields['crit_cant_mal_hasta'] = new CField(Array("Name"=>"crit_cant_mal_hasta", "Type"=>"int", "IsForDB"=>true, "Order"=>105));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT crit_code, crit_oper_status_ini, crit_oper_status_fin, crit_cant_mal_desde, crit_cant_mal_hasta FROM criterios  WHERE crit_code= :crit_code_key:";
        $this->m_objfactory_sql = "SELECT crit_code, crit_oper_status_ini, crit_oper_status_fin, crit_cant_mal_desde, crit_cant_mal_hasta FROM criterios";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE criterios SET crit_code= :crit_code:, crit_oper_status_ini= :crit_oper_status_ini:, crit_oper_status_fin= :crit_oper_status_fin:, crit_cant_mal_desde= :crit_cant_mal_desde:, crit_cant_mal_hasta= :crit_cant_mal_hasta: WHERE crit_code=:crit_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO criterios(crit_code, crit_oper_status_ini, crit_oper_status_fin, crit_cant_mal_desde, crit_cant_mal_hasta) VALUES (:crit_code:, :crit_oper_status_ini:, :crit_oper_status_fin:, :crit_cant_mal_desde:, :crit_cant_mal_hasta:)";
        $this->m_savedb_delete_sql = "DELETE FROM criterios WHERE crit_code=:crit_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM criterios";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM criterios ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase ccriterios
}
?>
