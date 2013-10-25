<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "ccir_groups_n.php";

//Genero las clases de los handlers

if( !class_exists('grupo2_gr') ) {
class grupo2_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Datos Principales'; //Titulo del grupo
        $this->m_order = 1; //Orden de presentacion de este grupo
        $this->m_id = 'grupo2'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'ccir_groups_n:cirg_code';
        $this->m_fields[] = 'ccir_groups_n:cir_code';
        $this->m_fields[] = 'ccir_groups_n:oper_grupo';
        $this->m_fields[] = 'ccir_groups_n:use_code_supervisor';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccir_groups_n")->GetField("cirg_code")->SetDisplayValues(Array("Name"=>"cirg_code", "Label"=>"Grupo Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccir_groups_n"));
        $this->getClass("ccir_groups_n")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccir_groups_n"));
        $this->getClass("ccir_groups_n")->GetField("oper_grupo")->SetDisplayValues(Array("Name"=>"oper_grupo", "Label"=>"Grupo", "Size"=>20, "IsForDB"=>true, "Order"=>104, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccir_groups_n"));
        $this->getClass("ccir_groups_n")->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "IsMandatory"=>true, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true, "Class"=>"ccir_groups_n"));
    }
}
}


if( !class_exists('oper_status_th2') ) {
class oper_status_th2 extends ctable_handler {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Operadores Asignados'; //Titulo de la tabla
        $this->m_isFile = false; //Es una tabla que contiene archivos, mostrar browser
        $this->m_classname = 'oper_status'; //Clase x defecto
        $this->m_total = false; //Incluir ultima fila de totales
        $this->m_id = 'operadores_asignados'; //Identificador para Wizards
        $this->m_order = '2'; //Orden de aparicion

    	//Botones del editor de la tabla
    	$this->m_button_next = true;// Boton continuar
    	$this->m_button_close = true;// Boton cerrar
    	$this->m_button_repeat = false;// Boton repetir carga
    	$this->m_button_label = '';// Etiqueta del Boton Agregar
        $this->m_can_add = false; //Mostrar boton Agregar
        $this->m_can_delete = false; //Mostrar boton Borrar
        $this->m_can_update = false; //Mostrar boton Modificar
        $this->m_can_check = false; //Mostrar checkbox
        $this->m_minimum_rows = 0; //Validacion: cantidad minima de filas
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_note = ""; //Nota

        $this->m_datafields['oper_grupo']=1;
        $this->m_datafields['use_code']=2;
        $this->m_datafields['crit_status']=3;
        $this->m_datafields['oper_nuevo']=4;
        $this->m_datafields['oper_hora_in']=5;
        $this->m_datafields['oper_hora_out']=6;

        $this->m_columns[1] = new ctable_column(1,'Operador',array('oper_grupo','use_code'));
        $this->m_columns[2] = new ctable_column(2,'Estado',array('crit_status'));
        $this->m_columns[3] = new ctable_column(3,'Nuevo',array('oper_nuevo'));
        $this->m_columns[4] = new ctable_column(4,'Hora Ingreso',array('oper_hora_in'));
        $this->m_columns[5] = new ctable_column(5,'Hora Egreso',array('oper_hora_out'));
    }

    public function getJsIncludes($obj) {
        $r=array();
        $r[]=$obj->GetField("oper_grupo")->getJsIncludes();
        $r[]=$obj->GetField("use_code")->getJsIncludes();
        $r[]=$obj->GetField("crit_status")->getJsIncludes();
        $r[]=$obj->GetField("oper_nuevo")->getJsIncludes();
        $r[]=$obj->GetField("oper_hora_in")->getJsIncludes();
        $r[]=$obj->GetField("oper_hora_out")->getJsIncludes();
        return $r;
    }

    public function InitializeInstance($obj) {
        //SetDisplayValues($attributes) 
        $obj->GetField("oper_grupo")->SetDisplayValues(Array("Name"=>"oper_grupo", "Label"=>"Grupo", "Size"=>50, "IsForDB"=>true, "Order"=>103, "Presentation"=>"TEXT", "IsNullable"=>false));
        $obj->GetField("use_code")->SetDisplayValues(Array("Name"=>"use_code", "Label"=>"Nro", "Size"=>50, "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true));
        $obj->GetField("crit_status")->SetDisplayValues(Array("Name"=>"crit_status", "Label"=>"Estado Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsVisible"=>true));
        $obj->GetField("oper_nuevo")->SetDisplayValues(Array("Name"=>"oper_nuevo", "Label"=>"Nuevo", "Size"=>2, "IsForDB"=>true, "Order"=>104, "IsMandatory"=>true, "Presentation"=>"TEXT", "IsVisible"=>true));
        $obj->GetField("oper_hora_in")->SetDisplayValues(Array("Name"=>"oper_hora_in", "Label"=>"Hora Ingreso", "Size"=>10, "IsForDB"=>true, "Order"=>105, "Presentation"=>"TEXT", "IsVisible"=>true));
        $obj->GetField("oper_hora_out")->SetDisplayValues(Array("Name"=>"oper_hora_out", "Label"=>"Hora Egreso", "Size"=>10, "IsForDB"=>true, "Order"=>106, "Presentation"=>"TEXT", "IsVisible"=>true));
    }

}
}
if( !class_exists('ccir_groups_n_m') ) {
class ccir_groups_n_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new ccir_groups_n();
		$this->m_next_page = 'cir_groups.php?last=1&OP=L'; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'cir_groups_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Asignación de Grupos a Circuitos';// Titulo del formulario
    	$this->m_comment = '';// Comentario del formulario
    	$this->m_event_n = '';// Evento al ingresar nuevo
    	$this->m_event_m = '';// Evento al modificar
    	$this->m_event_b = '';// Evento al eliminar
    	$this->m_event_v = '';// Evento al visualizar
    	$this->m_event_p = '';// Evento al imprimir
    	$this->m_css_prefix = '';// Prefijo CSS

        //Grupos
		$this->m_handler[1] = new grupo2_gr($this);

        //Tablas
		$this->m_handler[2] = new oper_status_th2($this);

    }

    function RenderJSIncludes() {
        $html = '';

        return $html;
    }
}
}

//Genero el form en HTML
$f = new ccir_groups_n_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
