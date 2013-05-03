<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('cmonitoreo') ) {
class cmonitoreo extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "cmonitoreo";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['id_estado_de_monitoreo'] = new CField(Array("Name"=>"id_estado_de_monitoreo", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $this->m_fields['color'] = new CField(Array("Name"=>"color", "Size"=>50, "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $this->m_fields['color_html'] = new CField(Array("Name"=>"color_html", "Size"=>50, "IsForDB"=>true, "Order"=>103, "IsNullable"=>false));
        $this->m_fields['monitoreos_semanales'] = new CField(Array("Name"=>"monitoreos_semanales", "Type"=>"tinyint", "IsForDB"=>true, "Order"=>104, "IsNullable"=>false));
        $this->m_fields['descripcion'] = new CField(Array("Name"=>"descripcion", "Size"=>50, "IsForDB"=>true, "Order"=>105, "IsNullable"=>false));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT id_estado_de_monitoreo, color, color_html, monitoreos_semanales, descripcion FROM estados_de_monitoreos  WHERE id_estado_de_monitoreo= :id_estado_de_monitoreo_key:";
        $this->m_objfactory_sql = "SELECT id_estado_de_monitoreo, color, color_html, monitoreos_semanales, descripcion FROM estados_de_monitoreos";
        $this->m_objfactory_suffix_sql = "";
        $this->m_savedb_update_sql = "UPDATE estados_de_monitoreos SET id_estado_de_monitoreo= :id_estado_de_monitoreo:, color= :color:, color_html= :color_html:, monitoreos_semanales= :monitoreos_semanales:, descripcion= :descripcion: WHERE id_estado_de_monitoreo=:id_estado_de_monitoreo_key:";
        $this->m_savedb_insert_sql = "INSERT INTO estados_de_monitoreos(id_estado_de_monitoreo, color, color_html, monitoreos_semanales, descripcion) VALUES (:id_estado_de_monitoreo:, :color:, :color_html:, :monitoreos_semanales:, :descripcion:)";
        $this->m_savedb_delete_sql = "DELETE FROM estados_de_monitoreos WHERE id_estado_de_monitoreo=:id_estado_de_monitoreo_key:";
        $this->m_savedb_purge_sql = "DELETE FROM estados_de_monitoreos";
        $this->m_savedb_total_sql = "SELECT COUNT(*) as cant FROM estados_de_monitoreos ";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase cmonitoreo
}
?>
