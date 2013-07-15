<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccir_groups_oper') ) {
class ccir_groups_oper extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccir_groups_oper";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cirg_code'] = new CField(Array("Name"=>"cirg_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['use_code_operador'] = new CField(Array("Name"=>"use_code_operador", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>103, "IsNullable"=>false));
        $this->m_fields['crit_status_ini'] = new CField(Array("Name"=>"crit_status_ini", "Type"=>"int", "IsForDB"=>true, "Order"=>104));
        $this->m_fields['crit_status_fin'] = new CField(Array("Name"=>"crit_status_fin", "Type"=>"int", "IsForDB"=>true, "Order"=>105));
        $this->m_fields['cirg_puntaje_prom'] = new CField(Array("Name"=>"cirg_puntaje_prom", "Type"=>"float", "IsForDB"=>true, "Order"=>106));
        $this->m_fields['cirg_cant_mon_pendientes'] = new CField(Array("Name"=>"cirg_cant_mon_pendientes", "Type"=>"int", "IsForDB"=>true, "Order"=>107, "total"=>true));
        $this->m_fields['cirg_cant_mon_realizados'] = new CField(Array("Name"=>"cirg_cant_mon_realizados", "Type"=>"int", "IsForDB"=>true, "Order"=>108, "total"=>true));
        $this->m_fields['cirg_cant_mon_ok'] = new CField(Array("Name"=>"cirg_cant_mon_ok", "Type"=>"int", "IsForDB"=>true, "Order"=>109, "total"=>true));
        $this->m_fields['cirg_cant_mon_mal'] = new CField(Array("Name"=>"cirg_cant_mon_mal", "Type"=>"int", "IsForDB"=>true, "Order"=>110, "total"=>true));
        $this->m_fields['cirg_cant_cap_pendientes'] = new CField(Array("Name"=>"cirg_cant_cap_pendientes", "Type"=>"int", "IsForDB"=>true, "Order"=>111, "total"=>true));
        $this->m_fields['cirg_cant_cap_realizados'] = new CField(Array("Name"=>"cirg_cant_cap_realizados", "Type"=>"int", "IsForDB"=>true, "Order"=>112, "total"=>true));
        $this->m_fields['cirg_cant_cap_ok'] = new CField(Array("Name"=>"cirg_cant_cap_ok", "Type"=>"int", "IsForDB"=>true, "Order"=>113, "total"=>true));
        $this->m_fields['cirg_cant_cap_mal'] = new CField(Array("Name"=>"cirg_cant_cap_mal", "Type"=>"int", "IsForDB"=>true, "Order"=>114, "total"=>true));
        $this->m_fields['cirg_cant_mon_cierre_forz'] = new CField(Array("Name"=>"cirg_cant_mon_cierre_forz", "Type"=>"int", "IsForDB"=>true, "Order"=>115, "total"=>true));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cirg_code, cir_code, use_code_operador, crit_status_ini, crit_status_fin, cirg_puntaje_prom, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal, cirg_cant_mon_cierre_forz FROM cir_groups_oper  WHERE cirg_code= :cirg_code_key: AND use_code_operador= :use_code_operador_key:";
        $this->m_objfactory_sql = "SELECT cirg_code, cir_code, use_code_operador, crit_status_ini, crit_status_fin, cirg_puntaje_prom, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal, cirg_cant_mon_cierre_forz FROM cir_groups_oper";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE cir_groups_oper SET cirg_code= :cirg_code:, cir_code= :cir_code:, use_code_operador= :use_code_operador:, crit_status_ini= :crit_status_ini:, crit_status_fin= :crit_status_fin:, cirg_puntaje_prom= :cirg_puntaje_prom:, cirg_cant_mon_pendientes= :cirg_cant_mon_pendientes:, cirg_cant_mon_realizados= :cirg_cant_mon_realizados:, cirg_cant_mon_ok= :cirg_cant_mon_ok:, cirg_cant_mon_mal= :cirg_cant_mon_mal:, cirg_cant_cap_pendientes= :cirg_cant_cap_pendientes:, cirg_cant_cap_realizados= :cirg_cant_cap_realizados:, cirg_cant_cap_ok= :cirg_cant_cap_ok:, cirg_cant_cap_mal= :cirg_cant_cap_mal:, cirg_cant_mon_cierre_forz= :cirg_cant_mon_cierre_forz: WHERE cirg_code=:cirg_code_key: AND use_code_operador=:use_code_operador_key:";
        $this->m_savedb_insert_sql = "INSERT INTO cir_groups_oper(cirg_code, cir_code, use_code_operador, crit_status_ini, crit_status_fin, cirg_puntaje_prom, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal, cirg_cant_mon_cierre_forz) VALUES (:cirg_code:, :cir_code:, :use_code_operador:, :crit_status_ini:, :crit_status_fin:, :cirg_puntaje_prom:, :cirg_cant_mon_pendientes:, :cirg_cant_mon_realizados:, :cirg_cant_mon_ok:, :cirg_cant_mon_mal:, :cirg_cant_cap_pendientes:, :cirg_cant_cap_realizados:, :cirg_cant_cap_ok:, :cirg_cant_cap_mal:, :cirg_cant_mon_cierre_forz:)";
        $this->m_savedb_delete_sql = "DELETE FROM cir_groups_oper WHERE cirg_code=:cirg_code_key: AND use_code_operador=:use_code_operador_key:";
        $this->m_savedb_purge_sql = "DELETE FROM cir_groups_oper";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant, SUM(cirg_cant_mon_pendientes) as cirg_cant_mon_pendientes, SUM(cirg_cant_mon_realizados) as cirg_cant_mon_realizados, SUM(cirg_cant_mon_ok) as cirg_cant_mon_ok, SUM(cirg_cant_mon_mal) as cirg_cant_mon_mal, SUM(cirg_cant_cap_pendientes) as cirg_cant_cap_pendientes, SUM(cirg_cant_cap_realizados) as cirg_cant_cap_realizados, SUM(cirg_cant_cap_ok) as cirg_cant_cap_ok, SUM(cirg_cant_cap_mal) as cirg_cant_cap_mal, SUM(cirg_cant_mon_cierre_forz) as cirg_cant_mon_cierre_forz FROM cir_groups_oper ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase ccir_groups_oper
}
?>
