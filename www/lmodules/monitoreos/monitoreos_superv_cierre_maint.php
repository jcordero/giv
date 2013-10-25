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
        $this->m_fields[] = 'cmonitoreos_superv:mon_date_aprox';
        $this->m_fields[] = 'cmonitoreos_superv:mon_add_mon';
        $this->m_fields[] = 'cmonitoreos_superv:mon_add_cap';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("cmonitoreos_superv")->GetField("mon_code")->SetDisplayValues(Array("Name"=>"mon_code", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"int", "IsForDB"=>true, "Order"=>106, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_use_code")->SetDisplayValues(Array("Name"=>"mon_use_code", "Label"=>"Supervisor Monitoreo", "Type"=>"int", "IsForDB"=>true, "Order"=>121, "Presentation"=>"CURRENTUSER", "IsVisible"=>true, "IsReadOnly"=>true, "ClassParams"=>"force", "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_date")->SetDisplayValues(Array("Name"=>"mon_date", "Label"=>"Fecha", "Type"=>"datetime", "IsForDB"=>true, "Order"=>107, "Presentation"=>"DATE", "ClassParams"=>"force", "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_status")->SetDisplayValues(Array("Name"=>"mon_status", "Label"=>"Estado Monitoreo", "Size"=>20, "IsForDB"=>true, "Order"=>108, "Presentation"=>"MON_STATUS", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_date_aprox")->SetDisplayValues(Array("Name"=>"mon_date_aprox", "Label"=>"Fecha Aprox", "Type"=>"datetime", "IsForDB"=>true, "Order"=>122, "Presentation"=>"DATETIME", "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_add_mon")->SetDisplayValues(Array("Name"=>"mon_add_mon", "Label"=>"Monitoreos Agregados", "Type"=>"int", "IsForDB"=>true, "Order"=>119, "Presentation"=>"INT", "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_add_cap")->SetDisplayValues(Array("Name"=>"mon_add_cap", "Label"=>"Capacitaciones Agregados", "Type"=>"int", "IsForDB"=>true, "Order"=>120, "Presentation"=>"INT", "IsReadOnly"=>true, "Class"=>"cmonitoreos_superv"));
    }
}
}


if( !class_exists('datos2_gr') ) {
class datos2_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Datos a Completar en el Monitoreo'; //Titulo del grupo
        $this->m_order = 2; //Orden de presentacion de este grupo
        $this->m_id = 'datos2'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'cmonitoreos_superv:mon_forzado';
        $this->m_fields[] = 'cmonitoreos_superv:mon_motivo';
        $this->m_fields[] = 'cmonitoreos_superv:mon_aprobo';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("cmonitoreos_superv")->GetField("mon_forzado")->SetDisplayValues(Array("Name"=>"mon_forzado", "Label"=>"Cierre Forzado ?", "Size"=>2, "IsForDB"=>true, "Order"=>109, "Presentation"=>"TEXT", "Class"=>"cmonitoreos_superv", "InitialValue"=>"SI"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_motivo")->SetDisplayValues(Array("Name"=>"mon_motivo", "Label"=>"Motivo de Cierre Forzado", "Size"=>200, "IsForDB"=>true, "Order"=>110, "IsMandatory"=>true, "ValueList"=>"mon_motivo_cierre", "Presentation"=>"SELECT", "IsVisible"=>true, "Class"=>"cmonitoreos_superv"));
        $this->getClass("cmonitoreos_superv")->GetField("mon_aprobo")->SetDisplayValues(Array("Name"=>"mon_aprobo", "Label"=>"Aprobado", "Size"=>2, "IsForDB"=>true, "Order"=>117, "Presentation"=>"TEXT", "Class"=>"cmonitoreos_superv", "InitialValue"=>"NO"));
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
		$this->m_this_page = 'monitoreos_superv_cierre_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Cierre Forzado del Monitoreo';// Titulo del formulario
    	$this->m_comment = '';// Comentario del formulario
    	$this->m_event_n = '';// Evento al ingresar nuevo
    	$this->m_event_m = '';// Evento al modificar
    	$this->m_event_b = '';// Evento al eliminar
    	$this->m_event_v = '';// Evento al visualizar
    	$this->m_event_p = '';// Evento al imprimir
    	$this->m_css_prefix = '';// Prefijo CSS

        //Grupos
		$this->m_handler[1] = new datos1_gr($this);
		$this->m_handler[2] = new datos2_gr($this);

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
