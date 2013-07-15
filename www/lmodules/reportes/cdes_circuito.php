<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('cdes_circuito') ) {
class cdes_circuito extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "cdes_circuito";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Label"=>"circuito", "Type"=>"INT", "IsForDB"=>true, "Order"=>1));
        $this->m_fields['cirg_cant_mon_pendientes'] = new CField(Array("Name"=>"cirg_cant_mon_pendientes", "Type"=>"INT", "IsForDB"=>true, "Order"=>2, "total"=>true));
        $this->m_fields['cirg_cant_mon_realizados'] = new CField(Array("Name"=>"cirg_cant_mon_realizados", "Type"=>"INT", "IsForDB"=>true, "Order"=>3, "total"=>true));
        $this->m_fields['cirg_cant_mon_ok'] = new CField(Array("Name"=>"cirg_cant_mon_ok", "Type"=>"INT", "IsForDB"=>true, "Order"=>4, "total"=>true));
        $this->m_fields['cirg_cant_mon_mal'] = new CField(Array("Name"=>"cirg_cant_mon_mal", "Type"=>"INT", "IsForDB"=>true, "Order"=>5, "total"=>true));
        $this->m_fields['cirg_cant_cap_pendientes'] = new CField(Array("Name"=>"cirg_cant_cap_pendientes", "Type"=>"INT", "IsForDB"=>true, "Order"=>6, "total"=>true));
        $this->m_fields['cirg_cant_cap_realizados'] = new CField(Array("Name"=>"cirg_cant_cap_realizados", "Type"=>"INT", "IsForDB"=>true, "Order"=>7, "total"=>true));
        $this->m_fields['cirg_cant_cap_ok'] = new CField(Array("Name"=>"cirg_cant_cap_ok", "Type"=>"INT", "IsForDB"=>true, "Order"=>8, "total"=>true));
        $this->m_fields['cirg_cant_cap_mal'] = new CField(Array("Name"=>"cirg_cant_cap_mal", "Type"=>"INT", "IsForDB"=>true, "Order"=>9, "total"=>true));
        $this->m_fields['cirg_cant_mon_cierre_forz'] = new CField(Array("Name"=>"cirg_cant_mon_cierre_forz", "Type"=>"INT", "IsForDB"=>true, "Order"=>10, "total"=>true));
        $this->m_fields['cirg_puntaje_prom'] = new CField(Array("Name"=>"cirg_puntaje_prom", "Type"=>"FLOAT", "IsForDB"=>true, "Order"=>11));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cir_code, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal, cirg_cant_mon_cierre_forz, cirg_puntaje_prom FROM des_circuito ";
        $this->m_objfactory_sql = "SELECT cir_code,     sum(cirg_cant_mon_pendientes) as cirg_cant_mon_pendientes, sum(cirg_cant_mon_realizados) as cirg_cant_mon_realizados,      sum(cirg_cant_mon_ok) as cirg_cant_mon_ok,      sum(cirg_cant_mon_mal) as cirg_cant_mon_mal, sum(cirg_cant_cap_pendientes) as cirg_cant_cap_pendientes,      sum(cirg_cant_cap_realizados) as cirg_cant_cap_realizados, sum(cirg_cant_cap_ok) as cirg_cant_cap_ok,     sum(cirg_cant_cap_mal) as cirg_cant_cap_mal, sum(cirg_cant_mon_cierre_forz) as cirg_cant_mon_cierre_forz,     round(avg(ifnull(cirg_puntaje_prom,0)),2) as cirg_puntaje_prom     FROM cir_groups_oper ";
        $this->m_objfactory_suffix_sql = " group by cir_code ORDER BY cir_code desc ";
        $this->m_savedb_update_sql = "UPDATE des_circuito SET cir_code= :cir_code:, cirg_cant_mon_pendientes= :cirg_cant_mon_pendientes:, cirg_cant_mon_realizados= :cirg_cant_mon_realizados:, cirg_cant_mon_ok= :cirg_cant_mon_ok:, cirg_cant_mon_mal= :cirg_cant_mon_mal:, cirg_cant_cap_pendientes= :cirg_cant_cap_pendientes:, cirg_cant_cap_realizados= :cirg_cant_cap_realizados:, cirg_cant_cap_ok= :cirg_cant_cap_ok:, cirg_cant_cap_mal= :cirg_cant_cap_mal:, cirg_cant_mon_cierre_forz= :cirg_cant_mon_cierre_forz:, cirg_puntaje_prom= :cirg_puntaje_prom:";
        $this->m_savedb_insert_sql = "INSERT INTO des_circuito(cir_code, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal, cirg_cant_mon_cierre_forz, cirg_puntaje_prom) VALUES (:cir_code:, :cirg_cant_mon_pendientes:, :cirg_cant_mon_realizados:, :cirg_cant_mon_ok:, :cirg_cant_mon_mal:, :cirg_cant_cap_pendientes:, :cirg_cant_cap_realizados:, :cirg_cant_cap_ok:, :cirg_cant_cap_mal:, :cirg_cant_mon_cierre_forz:, :cirg_puntaje_prom:)";
        $this->m_savedb_delete_sql = "DELETE FROM des_circuito";
        $this->m_savedb_purge_sql = "DELETE FROM des_circuito";
        $this->m_savedb_total_sql = "select      sum(cirg_cant_mon_pendientes) as cirg_cant_mon_pendientes, sum(cirg_cant_mon_realizados) as cirg_cant_mon_realizados,      sum(cirg_cant_mon_ok) as cirg_cant_mon_ok,      sum(cirg_cant_mon_mal) as cirg_cant_mon_mal, sum(cirg_cant_cap_pendientes) as cirg_cant_cap_pendientes,      sum(cirg_cant_cap_realizados) as cirg_cant_cap_realizados, sum(cirg_cant_cap_ok) as cirg_cant_cap_ok,     sum(cirg_cant_cap_mal) as cirg_cant_cap_mal, sum(cirg_cant_mon_cierre_forz) as cirg_cant_mon_cierre_forz,     round(avg(ifnull(cirg_puntaje_prom,0)),2) as cirg_puntaje_prom     FROM cir_groups_oper ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase cdes_circuito
}
?>
