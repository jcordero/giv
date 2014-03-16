<?php
/* Clase generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / http://www.commsys.com.ar
 */
include_once "common/cobjbase.php";
if( !class_exists('cdes_item') ) {
class cdes_item extends cobjbase {

    function __construct() {
        parent::__construct();
        $this->m_classname = "cdes_item";
        $this->m_savechildsfirst = false;
        $this->m_classtype = "";
        $this->m_fileid = "";
        $this->m_connect = "primary_db";
        $this->m_deleted_mark = "";

        //Extensiones a esta clase

        //-- CField( Array(Parametros) )
        $this->m_fields['it_code'] = new CField(Array("Name"=>"it_code", "Label"=>"item", "Type"=>"INT", "IsForDB"=>true, "Order"=>1));
        $this->m_fields['cir_code'] = new CField(Array("Name"=>"cir_code", "Label"=>"circuito", "Type"=>"INT", "IsForDB"=>true, "Order"=>2));
        $this->m_fields['use_code_operador'] = new CField(Array("Name"=>"use_code_operador", "Label"=>"operador", "Type"=>"INT", "IsForDB"=>true, "Order"=>3));
        $this->m_fields['use_code_supervisor'] = new CField(Array("Name"=>"use_code_supervisor", "Label"=>"supervisor", "Type"=>"INT", "IsForDB"=>true, "Order"=>4));
        $this->m_fields['aprobados'] = new CField(Array("Name"=>"aprobados", "Type"=>"INT", "IsForDB"=>true, "Order"=>5, "total"=>true));
        $this->m_fields['no_aprobados'] = new CField(Array("Name"=>"no_aprobados", "Type"=>"INT", "IsForDB"=>true, "Order"=>6, "total"=>true));
        $this->m_fields['perjuicio'] = new CField(Array("Name"=>"perjuicio", "Type"=>"INT", "IsForDB"=>true, "Order"=>7, "total"=>true));
        $this->m_fields['no_perjuicio'] = new CField(Array("Name"=>"no_perjuicio", "Type"=>"INT", "IsForDB"=>true, "Order"=>8, "total"=>true));
        $this->m_fields['cantidad'] = new CField(Array("Name"=>"cantidad", "Type"=>"INT", "IsForDB"=>true, "Order"=>9, "total"=>true));
        $this->m_fields['it_puntaje'] = new CField(Array("Name"=>"it_puntaje", "Type"=>"FLOAT", "IsForDB"=>true, "Order"=>10));

        //--Contenedores de Clases dependientes
        // No hay clases dependientes

        //Consultas particulares a la base de datos
        $this->m_loaddb_sql = "SELECT it_code, cir_code, use_code_operador, use_code_supervisor, aprobados, no_aprobados, perjuicio, no_perjuicio, cantidad, it_puntaje FROM des_item ";
        $this->m_objfactory_sql = "select count(*) as cantidad,           avg(it_puntaje) as it_puntaje,           sum(if (ifnull(it_aprobo,'')='SI',1,0)) as aprobados,           sum(if (ifnull(it_aprobo,'')='NO',1,0)) as no_aprobados,           sum(if (ifnull(it_perjuicio_cliente,'') ='SI',1,0)) as perjuicio,           sum(if (ifnull(it_perjuicio_cliente,'') ='NO',1,0)) as no_perjuicio,           it_code, cir_code,use_code_supervisor,use_code_operador           from mon_items i join monitoreos m on m.mon_code = i.mon_code where not(mon_status='PENDIENTE') ";
        $this->m_objfactory_suffix_sql = " group by it_code,  cir_code, use_code_supervisor, use_code_operador order by it_code,  cir_code, use_code_supervisor, use_code_operador ";
        $this->m_savedb_update_sql = "UPDATE des_item SET it_code= :it_code:, cir_code= :cir_code:, use_code_operador= :use_code_operador:, use_code_supervisor= :use_code_supervisor:, aprobados= :aprobados:, no_aprobados= :no_aprobados:, perjuicio= :perjuicio:, no_perjuicio= :no_perjuicio:, cantidad= :cantidad:, it_puntaje= :it_puntaje:";
        $this->m_savedb_insert_sql = "INSERT INTO des_item(it_code, cir_code, use_code_operador, use_code_supervisor, aprobados, no_aprobados, perjuicio, no_perjuicio, cantidad, it_puntaje) VALUES (:it_code:, :cir_code:, :use_code_operador:, :use_code_supervisor:, :aprobados:, :no_aprobados:, :perjuicio:, :no_perjuicio:, :cantidad:, :it_puntaje:)";
        $this->m_savedb_delete_sql = "DELETE FROM des_item";
        $this->m_savedb_purge_sql = "DELETE FROM des_item";
        $this->m_savedb_total_sql = "select count(*) as cant           from mon_items i join monitoreos m on m.mon_code = i.mon_code where not(mon_status='PENDIENTE')";
    }

    function __destruct() {
        parent::__destruct();
    }

} //-- Fin clase cdes_item
}
?>
