<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('cdes_circuito_oper') ) {
class cdes_circuito_oper extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "cdes_circuito_oper";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Label"=>"circuito", "Type"=>"INT", "IsForDB"=>true, "Order"=>1));
        $this->m_fields['use_code_operador'] = new CField(Array("Name"=>"use_code_operador", "Label"=>"operador", "Type"=>"INT", "IsForDB"=>true, "Order"=>2));
        $this->m_fields['use_code_supervisor'] = new CField(Array("Name"=>"use_code_supervisor", "Label"=>"supervisor", "Type"=>"INT", "IsForDB"=>true, "Order"=>3));
        $this->m_fields['cirg_cant_mon_pendientes'] = new CField(Array("Name"=>"cirg_cant_mon_pendientes", "Type"=>"INT", "IsForDB"=>true, "Order"=>4, "total"=>true));
        $this->m_fields['cirg_cant_mon_realizados'] = new CField(Array("Name"=>"cirg_cant_mon_realizados", "Type"=>"INT", "IsForDB"=>true, "Order"=>5, "total"=>true));
        $this->m_fields['cirg_cant_mon_ok'] = new CField(Array("Name"=>"cirg_cant_mon_ok", "Type"=>"INT", "IsForDB"=>true, "Order"=>6, "total"=>true));
        $this->m_fields['cirg_cant_mon_mal'] = new CField(Array("Name"=>"cirg_cant_mon_mal", "Type"=>"INT", "IsForDB"=>true, "Order"=>7, "total"=>true));
        $this->m_fields['cirg_cant_cap_pendientes'] = new CField(Array("Name"=>"cirg_cant_cap_pendientes", "Type"=>"INT", "IsForDB"=>true, "Order"=>8, "total"=>true));
        $this->m_fields['cirg_cant_cap_realizados'] = new CField(Array("Name"=>"cirg_cant_cap_realizados", "Type"=>"INT", "IsForDB"=>true, "Order"=>9, "total"=>true));
        $this->m_fields['cirg_cant_cap_ok'] = new CField(Array("Name"=>"cirg_cant_cap_ok", "Type"=>"INT", "IsForDB"=>true, "Order"=>10, "total"=>true));
        $this->m_fields['cirg_cant_cap_mal'] = new CField(Array("Name"=>"cirg_cant_cap_mal", "Type"=>"INT", "IsForDB"=>true, "Order"=>11, "total"=>true));
        $this->m_fields['cirg_cant_mon_cierre_forz'] = new CField(Array("Name"=>"cirg_cant_mon_cierre_forz", "Type"=>"INT", "IsForDB"=>true, "Order"=>12, "total"=>true));
        $this->m_fields['cirg_puntaje_prom'] = new CField(Array("Name"=>"cirg_puntaje_prom", "Type"=>"FLOAT", "IsForDB"=>true, "Order"=>13));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cir_code, use_code_operador, use_code_supervisor, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal, cirg_cant_mon_cierre_forz, cirg_puntaje_prom FROM des_circuito_group ";
        $this->m_objfactory_sql = "SELECT cir_code,use_code_operador,use_code_supervisor,     sum(IF (mon_status='PENDIENTE' , 1 , 0)) as cirg_cant_mon_pendientes,      sum(IF (mon_status='REALIZADO' , 1 , 0)) as cirg_cant_mon_realizados,      sum(IF (mon_status='CERRADO' , 1 , 0)) as cirg_cant_mon_cierre_forz,         sum(IF ((mon_status='REALIZADO' and mon_aprobo='SI') , 1 , 0)) as cirg_cant_mon_ok,      sum(IF ((mon_status='REALIZADO' and mon_aprobo='NO') , 1 , 0)) as cirg_cant_mon_mal,      ifnull((select count(distinct cap_code) from capacitacion c where c.cir_code=m.cir_code and c.use_code_operador=m.use_code_operador and c.use_code_supervisor=m.use_code_supervisor and cap_status='PENDIENTE'),0)  as cirg_cant_cap_pendientes,      ifnull((select count(distinct cap_code) from capacitacion c where c.cir_code=m.cir_code and c.use_code_operador=m.use_code_operador and c.use_code_supervisor=m.use_code_supervisor and cap_status='REALIZADO'),0) as cirg_cant_cap_realizados,      ifnull((select count(distinct cap_code) from capacitacion c where c.cir_code=m.cir_code and c.use_code_operador=m.use_code_operador and c.use_code_supervisor=m.use_code_supervisor and cap_status='REALIZADO' and cap_rol_play_aprobado='SI'),0) as cirg_cant_cap_ok,     ifnull((select count(distinct cap_code) from capacitacion c where c.cir_code=m.cir_code and c.use_code_operador=m.use_code_operador and c.use_code_supervisor=m.use_code_supervisor and cap_status='REALIZADO' and cap_rol_play_aprobado='NO'),0) as cirg_cant_cap_mal,     round( ( sum(IF (mon_status='REALIZADO' ,ifnull(mon_puntaje,0),0)) / sum(IF (mon_status='REALIZADO' , 1 , 0)) ) ,2) as cirg_puntaje_prom     FROM monitoreos m where 1= 1 ";
        $this->m_objfactory_suffix_sql = " group by cir_code,use_code_supervisor,use_code_operador ORDER BY cir_code desc,use_code_supervisor,use_code_operador ";
        $this->m_savedb_update_sql = "UPDATE des_circuito_group SET cir_code= :cir_code:, use_code_operador= :use_code_operador:, use_code_supervisor= :use_code_supervisor:, cirg_cant_mon_pendientes= :cirg_cant_mon_pendientes:, cirg_cant_mon_realizados= :cirg_cant_mon_realizados:, cirg_cant_mon_ok= :cirg_cant_mon_ok:, cirg_cant_mon_mal= :cirg_cant_mon_mal:, cirg_cant_cap_pendientes= :cirg_cant_cap_pendientes:, cirg_cant_cap_realizados= :cirg_cant_cap_realizados:, cirg_cant_cap_ok= :cirg_cant_cap_ok:, cirg_cant_cap_mal= :cirg_cant_cap_mal:, cirg_cant_mon_cierre_forz= :cirg_cant_mon_cierre_forz:, cirg_puntaje_prom= :cirg_puntaje_prom:";
        $this->m_savedb_insert_sql = "INSERT INTO des_circuito_group(cir_code, use_code_operador, use_code_supervisor, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal, cirg_cant_mon_cierre_forz, cirg_puntaje_prom) VALUES (:cir_code:, :use_code_operador:, :use_code_supervisor:, :cirg_cant_mon_pendientes:, :cirg_cant_mon_realizados:, :cirg_cant_mon_ok:, :cirg_cant_mon_mal:, :cirg_cant_cap_pendientes:, :cirg_cant_cap_realizados:, :cirg_cant_cap_ok:, :cirg_cant_cap_mal:, :cirg_cant_mon_cierre_forz:, :cirg_puntaje_prom:)";
        $this->m_savedb_delete_sql = "DELETE FROM des_circuito_group";
        $this->m_savedb_purge_sql = "DELETE FROM des_circuito_group";
        $this->m_savedb_total_sql = "select count(*) as cant,use_code_supervisor,     sum(IF (mon_status='PENDIENTE' , 1 , 0)) as cirg_cant_mon_pendientes,      sum(IF (mon_status='REALIZADO' , 1 , 0)) as cirg_cant_mon_realizados,      sum(IF (mon_status='CERRADO' , 1 , 0)) as cirg_cant_mon_cierre_forz,         sum(IF ((mon_status='REALIZADO' and mon_aprobo='SI') , 1 , 0)) as cirg_cant_mon_ok,      sum(IF ((mon_status='REALIZADO' and mon_aprobo='NO') , 1 , 0)) as cirg_cant_mon_mal,      ifnull((select count(distinct cap_code) from capacitacion c where c.cir_code=m.cir_code and c.use_code_operador=m.use_code_operador and c.use_code_supervisor=m.use_code_supervisor and cap_status='PENDIENTE'),0)  as cirg_cant_cap_pendientes,      ifnull((select count(distinct cap_code) from capacitacion c where c.cir_code=m.cir_code and c.use_code_operador=m.use_code_operador and c.use_code_supervisor=m.use_code_supervisor and cap_status='REALIZADO'),0) as cirg_cant_cap_realizados,      ifnull((select count(distinct cap_code) from capacitacion c where c.cir_code=m.cir_code and c.use_code_operador=m.use_code_operador and c.use_code_supervisor=m.use_code_supervisor and cap_status='REALIZADO' and cap_rol_play_aprobado='SI'),0) as cirg_cant_cap_ok,     ifnull((select count(distinct cap_code) from capacitacion c where c.cir_code=m.cir_code and c.use_code_operador=m.use_code_operador and c.use_code_supervisor=m.use_code_supervisor and cap_status='REALIZADO' and cap_rol_play_aprobado='NO'),0) as cirg_cant_cap_mal,     round( ( sum(IF (mon_status='REALIZADO' ,ifnull(mon_puntaje,0),0)) / sum(IF (mon_status='REALIZADO' , 1 , 0)) ) ,2) as cirg_puntaje_prom     FROM monitoreos m where 1= 1 ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase cdes_circuito_oper
}
?>
