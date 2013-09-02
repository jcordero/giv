<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "cmonitoreos_superv.php";

//Genero las clases de los handlers

if( !class_exists('datos1_gr') ) {
class datos1_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Datos Principales'; //Titulo del grupo
        $this->m_order = 1; //Orden de presentacion de este grupo
        $this->m_id = 'datos1'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'cmonitoreos_superv:mon_code';
        $this->m_fields[] = 'cmonitoreos_superv:cir_code';
        $this->m_fields[] = 'cmonitoreos_superv:use_code_operador';
        $this->m_fields[] = 'cmonitoreos_superv:use_code_supervisor';
        $this->m_fields[] = 'cmonitoreos_superv:mon_use_code';
        $this->m_fields[] = 'cmonitoreos_superv:mon_date';
        $this->m_fields[] = 'cmonitoreos_superv:mon_status';
        $this->m_fields[] = 'cmonitoreos_superv:mon_note';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("cmonitoreos_superv")->GetField("mon_code")->SetDisplayValues(Array("Name"=>"mon_code", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_use_code")->SetDisplayValues(Array("Name"=>"mon_use_code", "Label"=>"Supervisor Monitoreo", "Type"=>"int", "IsForDB"=>true, "Order"=>120, "Presentation"=>"CURRENTUSER", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_date")->SetDisplayValues(Array("Name"=>"mon_date", "Label"=>"Fecha", "Type"=>"datetime", "IsForDB"=>true, "Order"=>106, "Presentation"=>"DATETIME", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_status")->SetDisplayValues(Array("Name"=>"mon_status", "Label"=>"Estado Monitoreo", "Size"=>20, "IsForDB"=>true, "Order"=>107, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_note")->SetDisplayValues(Array("Name"=>"mon_note", "Label"=>"Nota", "Size"=>400, "IsForDB"=>true, "Order"=>110, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
    }
}
}


if( !class_exists('datos3_gr') ) {
class datos3_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Calificación'; //Titulo del grupo
        $this->m_order = 2; //Orden de presentacion de este grupo
        $this->m_id = 'datos3'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'cmonitoreos_superv:mon_puntaje';
        $this->m_fields[] = 'cmonitoreos_superv:mon_perjuicio_cliente';
        $this->m_fields[] = 'cmonitoreos_superv:mon_aprobo';
        $this->m_fields[] = 'cmonitoreos_superv:mon_add_mon';
        $this->m_fields[] = 'cmonitoreos_superv:mon_add_cap';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("cmonitoreos_superv")->GetField("mon_puntaje")->SetDisplayValues(Array("Name"=>"mon_puntaje", "Label"=>"Puntaje", "Type"=>"int", "IsForDB"=>true, "Order"=>115, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_perjuicio_cliente")->SetDisplayValues(Array("Name"=>"mon_perjuicio_cliente", "Label"=>"Perjuicio al Vecino", "Size"=>2, "IsForDB"=>true, "Order"=>117, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_aprobo")->SetDisplayValues(Array("Name"=>"mon_aprobo", "Label"=>"Aprobado", "Size"=>2, "IsForDB"=>true, "Order"=>116, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_add_mon")->SetDisplayValues(Array("Name"=>"mon_add_mon", "Label"=>"Monitoreos Agregados", "Type"=>"int", "IsForDB"=>true, "Order"=>118, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_add_cap")->SetDisplayValues(Array("Name"=>"mon_add_cap", "Label"=>"Capacitaciones Agregados", "Type"=>"int", "IsForDB"=>true, "Order"=>119, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
    }
}
}


if( !class_exists('datos2_gr') ) {
class datos2_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Datos de la Llamada'; //Titulo del grupo
        $this->m_order = 3; //Orden de presentacion de este grupo
        $this->m_id = 'datos2'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'cmonitoreos_superv:cli_call_code';
        $this->m_fields[] = 'cmonitoreos_superv:mon_call_date';
        $this->m_fields[] = 'cmonitoreos_superv:mon_call_reference';
        $this->m_fields[] = 'cmonitoreos_superv:doc_storage';
        $this->m_fields[] = 'cmonitoreos_superv:mon_call_llamada';
        $this->m_fields[] = 'cmonitoreos_superv:mon_call_tel_origen';
        $this->m_fields[] = 'cmonitoreos_superv:mon_call_operador';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("cmonitoreos_superv")->GetField("cli_call_code")->SetDisplayValues(Array("Name"=>"cli_call_code", "Label"=>"Tipo LLamado", "Size"=>200, "IsForDB"=>true, "Order"=>111, "Presentation"=>"CLI_CALL", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_call_date")->SetDisplayValues(Array("Name"=>"mon_call_date", "Label"=>"Fecha Llamada", "Type"=>"datetime", "IsForDB"=>true, "Order"=>112, "Presentation"=>"DATE", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_call_reference")->SetDisplayValues(Array("Name"=>"mon_call_reference", "Label"=>"Ref LLamado", "Size"=>20, "IsForDB"=>true, "Order"=>113, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("doc_storage")->SetDisplayValues(Array("Name"=>"doc_storage", "Label"=>"Archivo Call", "Size"=>200, "IsForDB"=>true, "Order"=>114, "Presentation"=>"CALLS_AUDIO", "IsVisible"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_call_llamada")->SetDisplayValues(Array("Name"=>"mon_call_llamada", "Label"=>"LLamada", "Size"=>20, "IsForDB"=>true, "Order"=>122, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_call_tel_origen")->SetDisplayValues(Array("Name"=>"mon_call_tel_origen", "Label"=>"Tel. Origen", "Size"=>40, "IsForDB"=>true, "Order"=>123, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_call_operador")->SetDisplayValues(Array("Name"=>"mon_call_operador", "Label"=>"Operador del Llamado", "Size"=>20, "IsForDB"=>true, "Order"=>124, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
    }
}
}


if( !class_exists('datos4_gr') ) {
class datos4_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Datos del Cierre'; //Titulo del grupo
        $this->m_order = 4; //Orden de presentacion de este grupo
        $this->m_id = 'datos4'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'cmonitoreos_superv:mon_forzado';
        $this->m_fields[] = 'cmonitoreos_superv:mon_motivo';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("cmonitoreos_superv")->GetField("mon_forzado")->SetDisplayValues(Array("Name"=>"mon_forzado", "Label"=>"Cierre Forzado ?", "Size"=>2, "IsForDB"=>true, "Order"=>108, "Presentation"=>"SINO", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_motivo")->SetDisplayValues(Array("Name"=>"mon_motivo", "Label"=>"Motivo de Cierre Forzado", "Size"=>200, "IsForDB"=>true, "Order"=>109, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
    }
}
}


if( !class_exists('mon_items_th5') ) {
class mon_items_th5 extends ctable_handler {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Items'; //Titulo de la tabla
        $this->m_isFile = false; //Es una tabla que contiene archivos, mostrar browser
        $this->m_classname = 'mon_items'; //Clase x defecto
        $this->m_total = false; //Incluir ultima fila de totales
        $this->m_id = 'items'; //Identificador para Wizards
        $this->m_order = '5'; //Orden de aparicion

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

        $this->m_datafields['mon_code']=1;
        $this->m_datafields['it_code']=2;
        $this->m_datafields['it_order']=3;
        $this->m_datafields['it_name']=4;
        $this->m_datafields['it_critico']=5;
        $this->m_datafields['it_aprobo']=6;
        $this->m_datafields['it_perjuicio_cliente']=7;
        $this->m_datafields['it_note']=8;
        $this->m_datafields['it_importance']=9;
        $this->m_datafields['it_puntaje']=10;

        $this->m_columns[1] = new ctable_column(1,'Item',array('mon_code','it_code','it_order','it_name'));
        $this->m_columns[2] = new ctable_column(2,'Aprobado?',array('it_critico','it_aprobo'));
        $this->m_columns[3] = new ctable_column(3,'Perjuicio al Vecino',array('it_perjuicio_cliente'));
        $this->m_columns[4] = new ctable_column(4,'Nota',array('it_note'));
        $this->m_columns[5] = new ctable_column(5,'Puntaje',array('it_importance','it_puntaje'));
    }

    public function getJsIncludes($obj) {
        $r=array();
        $r[]=$obj->GetField("mon_code")->getJsIncludes();
        $r[]=$obj->GetField("it_code")->getJsIncludes();
        $r[]=$obj->GetField("it_order")->getJsIncludes();
        $r[]=$obj->GetField("it_name")->getJsIncludes();
        $r[]=$obj->GetField("it_critico")->getJsIncludes();
        $r[]=$obj->GetField("it_aprobo")->getJsIncludes();
        $r[]=$obj->GetField("it_perjuicio_cliente")->getJsIncludes();
        $r[]=$obj->GetField("it_note")->getJsIncludes();
        $r[]=$obj->GetField("it_importance")->getJsIncludes();
        $r[]=$obj->GetField("it_puntaje")->getJsIncludes();
        return $r;
    }

    public function InitializeInstance($obj) {
        //SetDisplayValues($attributes) 
        $obj->GetField("mon_code")->SetDisplayValues(Array("Name"=>"mon_code", "Label"=>"Monitoreo", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $obj->GetField("it_code")->SetDisplayValues(Array("Name"=>"it_code", "Label"=>"Item", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>102, "IsNullable"=>false));
        $obj->GetField("it_order")->SetDisplayValues(Array("Name"=>"it_order", "Label"=>"Orden", "Type"=>"int", "IsForDB"=>true, "Order"=>104));
        $obj->GetField("it_name")->SetDisplayValues(Array("Name"=>"it_name", "Label"=>"Item", "Size"=>200, "IsForDB"=>true, "Order"=>103, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("it_critico")->SetDisplayValues(Array("Name"=>"it_critico", "Label"=>"Items Criticos", "Type"=>"int", "IsForDB"=>true, "Order"=>106, "Presentation"=>"INT", "IsVisible"=>true));
        $obj->GetField("it_aprobo")->SetDisplayValues(Array("Name"=>"it_aprobo", "Label"=>"Aprobado?", "Size"=>2, "IsForDB"=>true, "Order"=>108, "Presentation"=>"TEXT", "IsVisible"=>true));
        $obj->GetField("it_perjuicio_cliente")->SetDisplayValues(Array("Name"=>"it_perjuicio_cliente", "Label"=>"Perjuicio?", "Size"=>2, "IsForDB"=>true, "Order"=>109, "Presentation"=>"TEXT", "IsVisible"=>true));
        $obj->GetField("it_note")->SetDisplayValues(Array("Name"=>"it_note", "Label"=>"Nota", "Size"=>200, "IsForDB"=>true, "Order"=>110, "IsMandatory"=>true, "Presentation"=>"TEXT", "IsVisible"=>true, "direct_edit"=>true));
        $obj->GetField("it_importance")->SetDisplayValues(Array("Name"=>"it_importance", "Label"=>"Importancia", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"INT", "IsVisible"=>true));
        $obj->GetField("it_puntaje")->SetDisplayValues(Array("Name"=>"it_puntaje", "Label"=>"Puntaje", "Type"=>"int", "IsForDB"=>true, "Order"=>107, "Presentation"=>"INT", "IsVisible"=>true));
    }

}
}
if( !class_exists('cmonitoreos_superv_m') ) {
class cmonitoreos_superv_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new cmonitoreos_superv();
		$this->m_next_page = ''; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'monitoreos_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Detalle de Monitoreo';// Titulo del formulario
    	$this->m_comment = '';// Comentario del formulario
    	$this->m_event_n = '';// Evento al ingresar nuevo
    	$this->m_event_m = '';// Evento al modificar
    	$this->m_event_b = '';// Evento al eliminar
    	$this->m_event_v = '';// Evento al visualizar
    	$this->m_event_p = '';// Evento al imprimir
    	$this->m_css_prefix = '';// Prefijo CSS

        //Grupos
		$this->m_handler[1] = new datos1_gr($this);
		$this->m_handler[2] = new datos3_gr($this);
		$this->m_handler[3] = new datos2_gr($this);
		$this->m_handler[4] = new datos4_gr($this);

        //Tablas
		$this->m_handler[5] = new mon_items_th5($this);

    }

    function RenderJSIncludes() {
        $html = '';

        return $html;
    }
}
}

//Genero el form en HTML
$f = new cmonitoreos_superv_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
