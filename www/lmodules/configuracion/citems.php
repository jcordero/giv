<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('citems') ) {
class citems extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "citems";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['it_code'] = new CField(Array("Name"=>"it_code", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false, "Sequence"=>"items"));
        $this->m_fields['it_name'] = new CField(Array("Name"=>"it_name", "Size"=>200, "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['it_order'] = new CField(Array("Name"=>"it_order", "Type"=>"int", "IsForDB"=>true, "Order"=>103));
        $this->m_fields['it_importance'] = new CField(Array("Name"=>"it_importance", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "total"=>true));
        $this->m_fields['it_status'] = new CField(Array("Name"=>"it_status", "Size"=>20, "IsForDB"=>true, "Order"=>105));
        $this->m_fields['it_critico'] = new CField(Array("Name"=>"it_critico", "Size"=>2, "IsForDB"=>true, "Order"=>106));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT it_code, it_name, it_order, it_importance, it_status, it_critico FROM items  WHERE it_code= :it_code_key:";
        $this->m_objfactory_sql = "SELECT it_code, it_name, it_order, it_importance, it_status, it_critico FROM items";
        $this->m_objfactory_suffix_sql = " ORDER BY it_order";
        $this->m_savedb_update_sql = "UPDATE items SET it_code= :it_code:, it_name= :it_name:, it_order= :it_order:, it_importance= :it_importance:, it_status= :it_status:, it_critico= :it_critico: WHERE it_code=:it_code_key:";
        $this->m_savedb_insert_sql = "INSERT INTO items(it_code, it_name, it_order, it_importance, it_status, it_critico) VALUES (:it_code:, :it_name:, :it_order:, :it_importance:, :it_status:, :it_critico:)";
        $this->m_savedb_delete_sql = "DELETE FROM items WHERE it_code=:it_code_key:";
        $this->m_savedb_purge_sql = "DELETE FROM items";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant, SUM(it_importance) as it_importance FROM items ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase citems
}
?>
