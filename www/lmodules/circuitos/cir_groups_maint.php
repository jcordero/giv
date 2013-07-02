<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "ccir_groups.php";

//Genero las clases de los handlers

if( !class_exists('grupo_gr') ) {
class grupo_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Datos Principales'; //Titulo del grupo
        $this->m_order = 1; //Orden de presentacion de este grupo
        $this->m_id = 'grupo'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'ccir_groups:cirg_code';
        $this->m_fields[] = 'ccir_groups:cir_code';
        $this->m_fields[] = 'ccir_groups:use_code_supervisor';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccir_groups")->GetField("cirg_code")->SetDisplayValues(Array("Name"=>"cirg_code", "Label"=>"Grupo Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"SEQUENCE", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Sequence"=>"cir_groups", "ClassParams"=>"cir_groups", "Class"=>"ccir_groups"));
        $this->getClass("ccir_groups")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "IsMandatory"=>true, "Presentation"=>"SELECTTABLE", "IsNullable"=>false, "IsVisible"=>true, "ClassParams"=>"SELECT  cir_name,cir_code FROM circuitos where cir_status in (\"PENDIENTE\") order by cir_name", "Class"=>"ccir_groups"));
        $this->getClass("ccir_groups")->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "IsMandatory"=>true, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true, "Class"=>"ccir_groups"));
    }
}
}


if( !class_exists('cir_groups_oper_th2') ) {
class cir_groups_oper_th2 extends ctable_handler {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Operadores'; //Titulo de la tabla
        $this->m_isFile = false; //Es una tabla que contiene archivos, mostrar browser
        $this->m_classname = 'cir_groups_oper'; //Clase x defecto
        $this->m_total = false; //Incluir ultima fila de totales
        $this->m_id = 'operadores'; //Identificador para Wizards
        $this->m_order = '2'; //Orden de aparicion

    	//Botones del editor de la tabla
    	$this->m_button_next = true;// Boton continuar
    	$this->m_button_close = true;// Boton cerrar
    	$this->m_button_repeat = false;// Boton repetir carga
    	$this->m_button_label = '';// Etiqueta del Boton Agregar
        $this->m_can_add = true; //Mostrar boton Agregar
        $this->m_can_delete = true; //Mostrar boton Borrar
        $this->m_can_update = true; //Mostrar boton Modificar
        $this->m_can_check = false; //Mostrar checkbox
        $this->m_minimum_rows = 0; //Validacion: cantidad minima de filas
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_note = ""; //Nota

        $this->m_datafields['cirg_code']=1;
        $this->m_datafields['use_code_operador']=2;

        $this->m_columns[1] = new ctable_column(1,'Operador',array('cirg_code','use_code_operador'));
    }

    public function getJsIncludes($obj) {
        $r=array();
        $r[]=$obj->GetField("cirg_code")->getJsIncludes();
        $r[]=$obj->GetField("use_code_operador")->getJsIncludes();
        return $r;
    }

    public function InitializeInstance($obj) {
        //SetDisplayValues($attributes) 
        $obj->GetField("cirg_code")->SetDisplayValues(Array("Name"=>"cirg_code", "Label"=>"Codigo", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $obj->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>102, "IsMandatory"=>true, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true));
    }

}
}
if( !class_exists('ccir_groups_m') ) {
class ccir_groups_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new ccir_groups();
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
		$this->m_handler[1] = new grupo_gr($this);

        //Tablas
		$this->m_handler[2] = new cir_groups_oper_th2($this);

    }

    function RenderJSIncludes() {
        $html = '';

        return $html;
    }
}
}

//Genero el form en HTML
$f = new ccir_groups_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
