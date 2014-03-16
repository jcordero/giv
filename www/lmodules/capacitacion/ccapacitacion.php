<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('ccapacitacion') ) {
class ccapacitacion extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "ccapacitacion";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cap_code'] = new CField(Array("Name"=>"cap_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['mon_code'] = new CField(Array("Name"=>"mon_code", "Type"=>"int", "IsForDB"=>true, "Order"=>102));
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "IsNullable"=>false));
        $this->m_fields['use_code_operador'] = new CField(Array("Name"=>"use_code_operador", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "IsNullable"=>false));
        $this->m_fields['use_code_supervisor'] = new CField(Array("Name"=>"use_code_supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "IsNullable"=>false));
        $this->m_fields['cap_date'] = new CField(Array("Name"=>"cap_date", "Type"=>"datetime", "IsForDB"=>true, "Order"=>106));
        $this->m_fields['cap_status'] = new CField(Array("Name"=>"cap_status", "Size"=>20, "IsForDB"=>true, "Order"=>107));
        $this->m_fields['doc_storage'] = new CField(Array("Name"=>"doc_storage", "Size"=>200, "IsForDB"=>true, "Order"=>108));
        $this->m_fields['cap_rol_play_aprobado'] = new CField(Array("Name"=>"cap_rol_play_aprobado", "Size"=>2, "IsForDB"=>true, "Order"=>109));
        $this->m_fields['cap_use_code'] = new CField(Array("Name"=>"cap_use_code", "Type"=>"int", "IsForDB"=>true, "Order"=>110));
        $this->m_fields['cap_origen'] = new CField(Array("Name"=>"cap_origen", "Size"=>20, "IsForDB"=>true, "Order"=>111));
        $this->m_fields['cap_motivo'] = new CField(Array("Name"=>"cap_motivo", "Size"=>200, "IsForDB"=>true, "Order"=>112));
        $this->m_fields['cap_habilidad'] = new CField(Array("Name"=>"cap_habilidad", "Size"=>200, "IsForDB"=>true, "Order"=>113));
        $this->m_fields['cap_tipo_tramite'] = new CField(Array("Name"=>"cap_tipo_tramite", "Size"=>200, "IsForDB"=>true, "Order"=>114));
        $this->m_fields['cap_observaciones'] = new CField(Array("Name"=>"cap_observaciones", "Size"=>400, "IsForDB"=>true, "Order"=>115));
        $this->m_fields['cap_visto_oper'] = new CField(Array("Name"=>"cap_visto_oper", "Size"=>2, "IsForDB"=>true, "Order"=>116));
        $this->m_fields['cap_date_visto_oper'] = new CField(Array("Name"=>"cap_date_visto_oper", "Type"=>"datetime", "IsForDB"=>true, "Order"=>117));

        //--Contenedores de Clases dependientes
        $this->m_childs_classname['cap_calls']='cap_calls';
        $this->m_childs['cap_calls']=array();
        $this->m_childs_keys['cap_calls']['cap_code']='cap_code';


        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cap_code, mon_code, cir_code, use_code_operador, use_code_supervisor, cap_date, cap_status, doc_storage, cap_rol_play_aprobado, cap_use_code, cap_origen, cap_motivo, cap_habilidad, cap_tipo_tramite, cap_observaciones, cap_visto_oper, cap_date_visto_oper FROM capacitacion  WHERE cap_code= :cap_code_key:";
        $this->m_objfactory_sql = "SELECT cap_code, mon_code, cir_code, use_code_operador, use_code_supervisor, cap_date, cap_status, doc_storage, cap_rol_play_aprobado, cap_use_code, cap_origen, cap_motivo, cap_habilidad, cap_tipo_tramite, cap_observaciones, cap_visto_oper, cap_date_visto_oper FROM capacitacion";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE capacitacion SET cap_code= :cap_code:, mon_code= :mon_code:, cir_code= :cir_code:, use_code_operador= :use_code_operador:, use_code_supervisor= :use_code_supervisor:, cap_date= :cap_date:, cap_status= :cap_status:, doc_storage= :doc_storage:, cap_rol_play_aprobado= :cap_rol_play_aprobado:, cap_use_code= :cap_use_code:, cap_origen= :cap_origen:, cap_motivo= :cap_motivo:, cap_habilidad= :cap_habilidad:, cap_tipo_tramite= :cap_tipo_tramite:, cap_observaciones= :cap_observaciones:, cap_visto_oper= :cap_visto_oper:, cap_date_visto_oper= :cap_date_visto_oper: WHERE cap_code=:cap_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO capacitacion(cap_code, mon_code, cir_code, use_code_operador, use_code_supervisor, cap_date, cap_status, doc_storage, cap_rol_play_aprobado, cap_use_code, cap_origen, cap_motivo, cap_habilidad, cap_tipo_tramite, cap_observaciones, cap_visto_oper, cap_date_visto_oper) VALUES (:cap_code:, :mon_code:, :cir_code:, :use_code_operador:, :use_code_supervisor:, :cap_date:, :cap_status:, :doc_storage:, :cap_rol_play_aprobado:, :cap_use_code:, :cap_origen:, :cap_motivo:, :cap_habilidad:, :cap_tipo_tramite:, :cap_observaciones:, :cap_visto_oper:, :cap_date_visto_oper:)";
        $this->m_savedb_delete_sql = "DELETE FROM capacitacion WHERE cap_code=:cap_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM capacitacion";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM capacitacion ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase ccapacitacion
}
?>
 
<?php /* Modelo de datos ---------------------------------------- */
if( !class_exists('cap_calls') ) {
class cap_calls extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "cap_calls";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['cap_code'] = new CField(Array("Name"=>"cap_code", "Type"=>"int", "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['cap_call'] = new CField(Array("Name"=>"cap_call", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['cap_call_date'] = new CField(Array("Name"=>"cap_call_date", "Type"=>"datetime", "IsForDB"=>true, "Order"=>103));
        $this->m_fields['cap_call_reference'] = new CField(Array("Name"=>"cap_call_reference", "Size"=>20, "IsForDB"=>true, "Order"=>104));
        $this->m_fields['doc_storage'] = new CField(Array("Name"=>"doc_storage", "Size"=>200, "IsForDB"=>true, "Order"=>105));
        $this->m_fields['cap_call_aprobo'] = new CField(Array("Name"=>"cap_call_aprobo", "Size"=>2, "IsForDB"=>true, "Order"=>106));
        $this->m_fields['cap_note'] = new CField(Array("Name"=>"cap_note", "Size"=>200, "IsForDB"=>true, "Order"=>107));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT cap_code, cap_call, cap_call_date, cap_call_reference, doc_storage, cap_call_aprobo, cap_note FROM cap_calls  WHERE cap_call= :cap_call_key:";
        $this->m_objfactory_sql = "SELECT cap_code, cap_call, cap_call_date, cap_call_reference, doc_storage, cap_call_aprobo, cap_note FROM cap_calls";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE cap_calls SET cap_code= :cap_code:, cap_call= :cap_call:, cap_call_date= :cap_call_date:, cap_call_reference= :cap_call_reference:, doc_storage= :doc_storage:, cap_call_aprobo= :cap_call_aprobo:, cap_note= :cap_note: WHERE cap_call=:cap_call_key:";
        $this->m_savedb_insert_sql = "INSERT INTO cap_calls(cap_code, cap_call, cap_call_date, cap_call_reference, doc_storage, cap_call_aprobo, cap_note) VALUES (:cap_code:, :cap_call:, :cap_call_date:, :cap_call_reference:, :doc_storage:, :cap_call_aprobo:, :cap_note:)";
        $this->m_savedb_delete_sql = "DELETE FROM cap_calls WHERE cap_call=:cap_call_key:";
        $this->m_savedb_purge_sql = "DELETE FROM cap_calls";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM cap_calls ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase cap_calls
}
?>
