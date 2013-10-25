<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccir_groups_n') ) {
class ccir_groups_n extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccir_groups_n";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cirg_code'] = new CField(Array("Name"=>"cirg_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['use_code_supervisor'] = new CField(Array("Name"=>"use_code_supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "IsNullable"=>false));
        $this->m_fields['oper_grupo'] = new CField(Array("Name"=>"oper_grupo", "Size"=>20, "IsForDB"=>true, "Order"=>104, "IsNullable"=>false));

        //--Contenedores de Clases dependientes
        $this->m_childs_classname['oper_status']='oper_status';
        $this->m_childs['oper_status']=array();
        $this->m_childs_keys['oper_status']['oper_grupo']='oper_grupo';


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

} //-- Fin clase ccir_groups_n
}
?>
 
<?php /* Modelo de datos ---------------------------------------- */
if( !class_exists('oper_status') ) {
class oper_status extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "oper_status";
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

} //-- Fin clase oper_status
}
?>
