<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('cmonitoreo_item') ) {
class cmonitoreo_item extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "cmonitoreo_item";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['id_item_a_monitorear'] = new CField(Array("Name"=>"id_item_a_monitorear", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['titulo'] = new CField(Array("Name"=>"titulo", "Size"=>50, "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['nivel_de_determinacion'] = new CField(Array("Name"=>"nivel_de_determinacion", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "IsNullable"=>false));
        $this->m_fields['orden'] = new CField(Array("Name"=>"orden", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "IsNullable"=>false));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT id_item_a_monitorear, titulo, nivel_de_determinacion, orden FROM items_a_monitorear  WHERE id_item_a_monitorear= :id_item_a_monitorear_key:";
        $this->m_objfactory_sql = "SELECT id_item_a_monitorear, titulo, nivel_de_determinacion, orden FROM items_a_monitorear";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE items_a_monitorear SET id_item_a_monitorear= :id_item_a_monitorear:, titulo= :titulo:, nivel_de_determinacion= :nivel_de_determinacion:, orden= :orden: WHERE id_item_a_monitorear=:id_item_a_monitorear_key:";
        $this->m_savedb_insert_sql = "INSERT INTO items_a_monitorear(id_item_a_monitorear, titulo, nivel_de_determinacion, orden) VALUES (:id_item_a_monitorear:, :titulo:, :nivel_de_determinacion:, :orden:)";
        $this->m_savedb_delete_sql = "DELETE FROM items_a_monitorear WHERE id_item_a_monitorear=:id_item_a_monitorear_key:";
        $this->m_savedb_purge_sql = "DELETE FROM items_a_monitorear";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM items_a_monitorear ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase cmonitoreo_item
}
?>
