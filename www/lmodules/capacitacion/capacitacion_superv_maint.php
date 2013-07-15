<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "ccapacitacion.php";

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
        $this->m_fields[] = 'ccapacitacion:cap_code';
        $this->m_fields[] = 'ccapacitacion:mon_code';
        $this->m_fields[] = 'ccapacitacion:doc_storage';
        $this->m_fields[] = 'ccapacitacion:cir_code';
        $this->m_fields[] = 'ccapacitacion:cirg_code';
        $this->m_fields[] = 'ccapacitacion:use_code_operador';
        $this->m_fields[] = 'ccapacitacion:use_code_supervisor';
        $this->m_fields[] = 'ccapacitacion:cap_status';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccapacitacion")->GetField("cap_code")->SetDisplayValues(Array("Name"=>"cap_code", "Label"=>"Capacitación Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("mon_code")->SetDisplayValues(Array("Name"=>"mon_code", "Label"=>"Monitoreo Nro", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("doc_storage")->SetDisplayValues(Array("Name"=>"doc_storage", "Label"=>"Llamada", "Size"=>200, "IsForDB"=>true, "Order"=>109, "Presentation"=>"FILE", "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("cirg_code")->SetDisplayValues(Array("Name"=>"cirg_code", "Label"=>"Grupo Oper", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"INT", "IsNullable"=>false, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"int", "IsForDB"=>true, "Order"=>106, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("cap_status")->SetDisplayValues(Array("Name"=>"cap_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>108, "Presentation"=>"CAP_STATUS", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccapacitacion"));
    }
}
}


if( !class_exists('datos2_gr') ) {
class datos2_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Datos a Completar'; //Titulo del grupo
        $this->m_order = 2; //Orden de presentacion de este grupo
        $this->m_id = 'datos2'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'ccapacitacion:cap_date';
        $this->m_fields[] = 'ccapacitacion:cap_use_code';
        $this->m_fields[] = 'ccapacitacion:cap_origen';
        $this->m_fields[] = 'ccapacitacion:cap_motivo';
        $this->m_fields[] = 'ccapacitacion:cap_habilidad';
        $this->m_fields[] = 'ccapacitacion:cap_tipo_tramite';
        $this->m_fields[] = 'ccapacitacion:cap_rol_play_aprobado';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccapacitacion")->GetField("cap_date")->SetDisplayValues(Array("Name"=>"cap_date", "Label"=>"Fecha", "Type"=>"datetime", "IsForDB"=>true, "Order"=>107, "Presentation"=>"DATETIME", "IsVisible"=>true, "IsReadOnly"=>true, "ClassParams"=>"force", "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("cap_use_code")->SetDisplayValues(Array("Name"=>"cap_use_code", "Label"=>"Capacitado por", "Type"=>"int", "IsForDB"=>true, "Order"=>111, "Presentation"=>"CURRENTUSER", "IsVisible"=>true, "IsReadOnly"=>true, "ClassParams"=>"force", "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("cap_origen")->SetDisplayValues(Array("Name"=>"cap_origen", "Label"=>"Origen", "Size"=>20, "IsForDB"=>true, "Order"=>112, "IsMandatory"=>true, "ValueList"=>"cap_origen", "Presentation"=>"SELECT", "IsVisible"=>true, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("cap_motivo")->SetDisplayValues(Array("Name"=>"cap_motivo", "Label"=>"Motivo", "Size"=>200, "IsForDB"=>true, "Order"=>113, "IsMandatory"=>true, "Presentation"=>"TEXTAREA", "IsVisible"=>true, "Rows"=>2, "Cols"=>100, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("cap_habilidad")->SetDisplayValues(Array("Name"=>"cap_habilidad", "Label"=>"Habilidad", "Size"=>200, "IsForDB"=>true, "Order"=>114, "IsMandatory"=>true, "ValueList"=>"cap_habilidad", "Presentation"=>"SELECT", "IsVisible"=>true, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("cap_tipo_tramite")->SetDisplayValues(Array("Name"=>"cap_tipo_tramite", "Label"=>"Tipo Trámite", "Size"=>200, "IsForDB"=>true, "Order"=>115, "IsMandatory"=>true, "Presentation"=>"TEXTAREA", "IsVisible"=>true, "Rows"=>2, "Cols"=>100, "Class"=>"ccapacitacion"));
        $this->getClass("ccapacitacion")->GetField("cap_rol_play_aprobado")->SetDisplayValues(Array("Name"=>"cap_rol_play_aprobado", "Label"=>"Rol Play Aprobado", "Size"=>2, "IsForDB"=>true, "Order"=>110, "IsMandatory"=>true, "Presentation"=>"SINO", "IsVisible"=>true, "Class"=>"ccapacitacion"));
    }
}
}


if( !class_exists('datos3_gr') ) {
class datos3_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Observaciones / Procedimiento'; //Titulo del grupo
        $this->m_order = 4; //Orden de presentacion de este grupo
        $this->m_id = 'datos3'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'ccapacitacion:cap_observaciones';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccapacitacion")->GetField("cap_observaciones")->SetDisplayValues(Array("Name"=>"cap_observaciones", "Label"=>"Observaciones", "Size"=>400, "IsForDB"=>true, "Order"=>116, "IsMandatory"=>true, "Presentation"=>"TEXTAREA", "IsVisible"=>true, "Rows"=>4, "Cols"=>100, "Class"=>"ccapacitacion"));
    }
}
}


if( !class_exists('datos4_gr') ) {
class datos4_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Visto Operador'; //Titulo del grupo
        $this->m_order = 5; //Orden de presentacion de este grupo
        $this->m_id = 'datos4'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'ccapacitacion:cap_visto_oper';
        $this->m_fields[] = 'ccapacitacion:cap_date_visto_oper';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccapacitacion")->GetField("cap_visto_oper")->SetDisplayValues(Array("Name"=>"cap_visto_oper", "Label"=>"Visto", "Size"=>2, "IsForDB"=>true, "Order"=>117, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccapacitacion", "InitialValue"=>"NO"));
        $this->getClass("ccapacitacion")->GetField("cap_date_visto_oper")->SetDisplayValues(Array("Name"=>"cap_date_visto_oper", "Label"=>"Fecha", "Type"=>"datetime", "IsForDB"=>true, "Order"=>118, "Presentation"=>"DATETIME", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccapacitacion"));
    }
}
}

if( !class_exists('ccapacitacion_m') ) {
class ccapacitacion_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new ccapacitacion();
		$this->m_next_page = ''; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'capacitacion_superv_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Capacitación';// Titulo del formulario
    	$this->m_comment = '';// Comentario del formulario
    	$this->m_event_n = '';// Evento al ingresar nuevo
    	$this->m_event_m = '';// Evento al modificar
    	$this->m_event_b = '';// Evento al eliminar
    	$this->m_event_v = '';// Evento al visualizar
    	$this->m_event_p = '';// Evento al imprimir
    	$this->m_css_prefix = '';// Prefijo CSS

        //Acciones
		$this->m_action[] = new CAction('D','llamada','','','/common/download.php?OP=V','doc_storage|','','');

        //Grupos
		$this->m_handler[1] = new datos1_gr($this);
		$this->m_handler[2] = new datos2_gr($this);
		$this->m_handler[4] = new datos3_gr($this);
		$this->m_handler[5] = new datos4_gr($this);

    }

    function RenderJSIncludes() {
        $html = '';

        return $html;
    }
}
}

//Genero el form en HTML
$f = new ccapacitacion_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
