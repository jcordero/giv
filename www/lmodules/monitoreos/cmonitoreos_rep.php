<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('cmonitoreos_rep') ) {
class cmonitoreos_rep extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "cmonitoreos_rep";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['mon_code'] = new CField(Array("Name"=>"mon_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['cirg_code'] = new CField(Array("Name"=>"cirg_code", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "IsNullable"=>false));
        $this->m_fields['use_code_operador'] = new CField(Array("Name"=>"use_code_operador", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "IsNullable"=>false));
        $this->m_fields['use_code_supervisor'] = new CField(Array("Name"=>"use_code_supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "IsNullable"=>false));
        $this->m_fields['mon_date'] = new CField(Array("Name"=>"mon_date", "Type"=>"datetime", "IsForDB"=>true, "Order"=>106));
        $this->m_fields['mon_status'] = new CField(Array("Name"=>"mon_status", "Size"=>20, "IsForDB"=>true, "Order"=>107));
        $this->m_fields['mon_forzado'] = new CField(Array("Name"=>"mon_forzado", "Size"=>2, "IsForDB"=>true, "Order"=>108));
        $this->m_fields['mon_motivo'] = new CField(Array("Name"=>"mon_motivo", "Size"=>200, "IsForDB"=>true, "Order"=>109));
        $this->m_fields['mon_note'] = new CField(Array("Name"=>"mon_note", "Size"=>400, "IsForDB"=>true, "Order"=>110));
        $this->m_fields['cli_call_code'] = new CField(Array("Name"=>"cli_call_code", "Size"=>200, "IsForDB"=>true, "Order"=>111));
        $this->m_fields['mon_call_date'] = new CField(Array("Name"=>"mon_call_date", "Type"=>"datetime", "IsForDB"=>true, "Order"=>112));
        $this->m_fields['mon_call_reference'] = new CField(Array("Name"=>"mon_call_reference", "Size"=>20, "IsForDB"=>true, "Order"=>113));
        $this->m_fields['doc_storage'] = new CField(Array("Name"=>"doc_storage", "Size"=>200, "IsForDB"=>true, "Order"=>114));
        $this->m_fields['mon_puntaje'] = new CField(Array("Name"=>"mon_puntaje", "Type"=>"int", "IsForDB"=>true, "Order"=>115));
        $this->m_fields['mon_aprobo'] = new CField(Array("Name"=>"mon_aprobo", "Size"=>2, "IsForDB"=>true, "Order"=>116));
        $this->m_fields['mon_perjuicio_cliente'] = new CField(Array("Name"=>"mon_perjuicio_cliente", "Size"=>2, "IsForDB"=>true, "Order"=>117));
        $this->m_fields['mon_add_mon'] = new CField(Array("Name"=>"mon_add_mon", "Type"=>"int", "IsForDB"=>true, "Order"=>118));
        $this->m_fields['mon_add_cap'] = new CField(Array("Name"=>"mon_add_cap", "Type"=>"int", "IsForDB"=>true, "Order"=>119));
        $this->m_fields['mon_use_code'] = new CField(Array("Name"=>"mon_use_code", "Type"=>"int", "IsForDB"=>true, "Order"=>120));
        $this->m_fields['mon_date_aprox'] = new CField(Array("Name"=>"mon_date_aprox", "Type"=>"datetime", "IsForDB"=>true, "Order"=>121));
        $this->m_fields['mon_call_llamada'] = new CField(Array("Name"=>"mon_call_llamada", "Size"=>20, "IsForDB"=>true, "Order"=>122));
        $this->m_fields['mon_call_tel_origen'] = new CField(Array("Name"=>"mon_call_tel_origen", "Size"=>40, "IsForDB"=>true, "Order"=>123));
        $this->m_fields['mon_call_operador'] = new CField(Array("Name"=>"mon_call_operador", "Size"=>20, "IsForDB"=>true, "Order"=>124));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT mon_code, cir_code, cirg_code, use_code_operador, use_code_supervisor, mon_date, mon_status, mon_forzado, mon_motivo, mon_note, cli_call_code, mon_call_date, mon_call_reference, doc_storage, mon_puntaje, mon_aprobo, mon_perjuicio_cliente, mon_add_mon, mon_add_cap, mon_use_code, mon_date_aprox, mon_call_llamada, mon_call_tel_origen, mon_call_operador FROM monitoreos  WHERE mon_code= :mon_code_key:";
        $this->m_objfactory_sql = "SELECT mon_code, cir_code, cirg_code, use_code_operador, use_code_supervisor, mon_date, mon_status, mon_forzado, mon_motivo, mon_note, cli_call_code, mon_call_date, mon_call_reference, doc_storage, mon_puntaje, mon_aprobo, mon_perjuicio_cliente, mon_add_mon, mon_add_cap, mon_use_code, mon_date_aprox, mon_call_llamada, mon_call_tel_origen, mon_call_operador FROM monitoreos";
        $this->m_objfactory_suffix_sql = " ORDER BY mon_date desc";
        $this->m_savedb_update_sql = "UPDATE monitoreos SET mon_code= :mon_code:, cir_code= :cir_code:, cirg_code= :cirg_code:, use_code_operador= :use_code_operador:, use_code_supervisor= :use_code_supervisor:, mon_date= :mon_date:, mon_status= :mon_status:, mon_forzado= :mon_forzado:, mon_motivo= :mon_motivo:, mon_note= :mon_note:, cli_call_code= :cli_call_code:, mon_call_date= :mon_call_date:, mon_call_reference= :mon_call_reference:, doc_storage= :doc_storage:, mon_puntaje= :mon_puntaje:, mon_aprobo= :mon_aprobo:, mon_perjuicio_cliente= :mon_perjuicio_cliente:, mon_add_mon= :mon_add_mon:, mon_add_cap= :mon_add_cap:, mon_use_code= :mon_use_code:, mon_date_aprox= :mon_date_aprox:, mon_call_llamada= :mon_call_llamada:, mon_call_tel_origen= :mon_call_tel_origen:, mon_call_operador= :mon_call_operador: WHERE mon_code=:mon_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO monitoreos(mon_code, cir_code, cirg_code, use_code_operador, use_code_supervisor, mon_date, mon_status, mon_forzado, mon_motivo, mon_note, cli_call_code, mon_call_date, mon_call_reference, doc_storage, mon_puntaje, mon_aprobo, mon_perjuicio_cliente, mon_add_mon, mon_add_cap, mon_use_code, mon_date_aprox, mon_call_llamada, mon_call_tel_origen, mon_call_operador) VALUES (:mon_code:, :cir_code:, :cirg_code:, :use_code_operador:, :use_code_supervisor:, :mon_date:, :mon_status:, :mon_forzado:, :mon_motivo:, :mon_note:, :cli_call_code:, :mon_call_date:, :mon_call_reference:, :doc_storage:, :mon_puntaje:, :mon_aprobo:, :mon_perjuicio_cliente:, :mon_add_mon:, :mon_add_cap:, :mon_use_code:, :mon_date_aprox:, :mon_call_llamada:, :mon_call_tel_origen:, :mon_call_operador:)";
        $this->m_savedb_delete_sql = "DELETE FROM monitoreos WHERE mon_code=:mon_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM monitoreos";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM monitoreos ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase cmonitoreos_rep
}
?>
