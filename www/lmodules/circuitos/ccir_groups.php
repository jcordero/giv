<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccir_groups') ) {
class ccir_groups extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccir_groups";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cirg_code'] = new CField(Array("Name"=>"cirg_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false, "Sequence"=>"cir_groups"));
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['use_code_supervisor'] = new CField(Array("Name"=>"use_code_supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "IsNullable"=>false));
        $this->m_fields['oper_grupo'] = new CField(Array("Name"=>"oper_grupo", "Size"=>20, "IsForDB"=>true, "Order"=>104, "IsNullable"=>false));

        //--Contenedores de Clases dependientes
        $this->m_childs_classname['cir_groups_oper']='cir_groups_oper';
        $this->m_childs['cir_groups_oper']=array();
        $this->m_childs_keys['cir_groups_oper']['cirg_code']='cirg_code';


        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cirg_code, cir_code, use_code_supervisor, oper_grupo FROM cir_groups  WHERE cirg_code= :cirg_code_key:";
        $this->m_objfactory_sql = "SELECT cirg_code, cir_code, use_code_supervisor, oper_grupo FROM cir_groups";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE cir_groups SET cirg_code= :cirg_code:, cir_code= :cir_code:, use_code_supervisor= :use_code_supervisor:, oper_grupo= :oper_grupo: WHERE cirg_code=:cirg_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO cir_groups(cirg_code, cir_code, use_code_supervisor, oper_grupo) VALUES (:cirg_code:, :cir_code:, :use_code_supervisor:, :oper_grupo:)";
        $this->m_savedb_delete_sql = "DELETE FROM cir_groups WHERE cirg_code=:cirg_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM cir_groups";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM cir_groups ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase ccir_groups
}
?>
 
<?php /* Modelo de datos ---------------------------------------- */
if( !class_exists('cir_groups_oper') ) {
class cir_groups_oper extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "cir_groups_oper";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cirg_code'] = new CField(Array("Name"=>"cirg_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['use_code_operador'] = new CField(Array("Name"=>"use_code_operador", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['crit_status_ini'] = new CField(Array("Name"=>"crit_status_ini", "Type"=>"int", "IsForDB"=>true, "Order"=>103));
        $this->m_fields['crit_status_fin'] = new CField(Array("Name"=>"crit_status_fin", "Type"=>"int", "IsForDB"=>true, "Order"=>104));
        $this->m_fields['cirg_cant_mon_pendientes'] = new CField(Array("Name"=>"cirg_cant_mon_pendientes", "Type"=>"int", "IsForDB"=>true, "Order"=>105));
        $this->m_fields['cirg_cant_mon_realizados'] = new CField(Array("Name"=>"cirg_cant_mon_realizados", "Type"=>"int", "IsForDB"=>true, "Order"=>106));
        $this->m_fields['cirg_cant_mon_ok'] = new CField(Array("Name"=>"cirg_cant_mon_ok", "Type"=>"int", "IsForDB"=>true, "Order"=>107));
        $this->m_fields['cirg_cant_mon_mal'] = new CField(Array("Name"=>"cirg_cant_mon_mal", "Type"=>"int", "IsForDB"=>true, "Order"=>108));
        $this->m_fields['cirg_cant_cap_pendientes'] = new CField(Array("Name"=>"cirg_cant_cap_pendientes", "Type"=>"int", "IsForDB"=>true, "Order"=>109));
        $this->m_fields['cirg_cant_cap_realizados'] = new CField(Array("Name"=>"cirg_cant_cap_realizados", "Type"=>"int", "IsForDB"=>true, "Order"=>110));
        $this->m_fields['cirg_cant_cap_ok'] = new CField(Array("Name"=>"cirg_cant_cap_ok", "Type"=>"int", "IsForDB"=>true, "Order"=>111));
        $this->m_fields['cirg_cant_cap_mal'] = new CField(Array("Name"=>"cirg_cant_cap_mal", "Type"=>"int", "IsForDB"=>true, "Order"=>112));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cirg_code, use_code_operador, crit_status_ini, crit_status_fin, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal FROM cir_groups_oper  WHERE cirg_code= :cirg_code_key: AND use_code_operador= :use_code_operador_key:";
        $this->m_objfactory_sql = "SELECT cirg_code, use_code_operador, crit_status_ini, crit_status_fin, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal FROM cir_groups_oper";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE cir_groups_oper SET cirg_code= :cirg_code:, use_code_operador= :use_code_operador:, crit_status_ini= :crit_status_ini:, crit_status_fin= :crit_status_fin:, cirg_cant_mon_pendientes= :cirg_cant_mon_pendientes:, cirg_cant_mon_realizados= :cirg_cant_mon_realizados:, cirg_cant_mon_ok= :cirg_cant_mon_ok:, cirg_cant_mon_mal= :cirg_cant_mon_mal:, cirg_cant_cap_pendientes= :cirg_cant_cap_pendientes:, cirg_cant_cap_realizados= :cirg_cant_cap_realizados:, cirg_cant_cap_ok= :cirg_cant_cap_ok:, cirg_cant_cap_mal= :cirg_cant_cap_mal: WHERE cirg_code=:cirg_code_key: AND use_code_operador=:use_code_operador_key:";
        $this->m_savedb_insert_sql = "INSERT INTO cir_groups_oper(cirg_code, use_code_operador, crit_status_ini, crit_status_fin, cirg_cant_mon_pendientes, cirg_cant_mon_realizados, cirg_cant_mon_ok, cirg_cant_mon_mal, cirg_cant_cap_pendientes, cirg_cant_cap_realizados, cirg_cant_cap_ok, cirg_cant_cap_mal) VALUES (:cirg_code:, :use_code_operador:, :crit_status_ini:, :crit_status_fin:, :cirg_cant_mon_pendientes:, :cirg_cant_mon_realizados:, :cirg_cant_mon_ok:, :cirg_cant_mon_mal:, :cirg_cant_cap_pendientes:, :cirg_cant_cap_realizados:, :cirg_cant_cap_ok:, :cirg_cant_cap_mal:)";
        $this->m_savedb_delete_sql = "DELETE FROM cir_groups_oper WHERE cirg_code=:cirg_code_key: AND use_code_operador=:use_code_operador_key:";
        $this->m_savedb_purge_sql = "DELETE FROM cir_groups_oper WHERE cirg_code=:cirg_code_key:";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM cir_groups_oper ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase cir_groups_oper
}
?>
