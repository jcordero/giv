<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "coper_status_m.php";

//Genero las clases de los handlers

if( !class_exists('unico_gr') ) {
class unico_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Formulario'; //Titulo del grupo
        $this->m_order = 1; //Orden de presentacion de este grupo
        $this->m_id = 'unico'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'coper_status_m:use_code';
        $this->m_fields[] = 'coper_status_m:crit_status';
        $this->m_fields[] = 'coper_status_m:oper_nuevo';
        $this->m_fields[] = 'coper_status_m:oper_grupo';
        $this->m_fields[] = 'coper_status_m:oper_hora_in';
        $this->m_fields[] = 'coper_status_m:oper_hora_out';
        $this->m_fields[] = 'coper_status_m:modificar_circuito';
        $this->m_fields[] = 'coper_status_m:cir_code';
        $this->m_fields[] = 'coper_status_m:cir_date_ini';
        $this->m_fields[] = 'coper_status_m:cir_date_fin';
        $this->m_fields[] = 'coper_status_m:cir_importance_min';
        $this->m_fields[] = 'coper_status_m:cir_status';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("coper_status_m")->GetField("use_code")->SetDisplayValues(Array("Name"=>"use_code", "Label"=>"Nro", "Size"=>50, "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"OPERADOR", "IsVisible"=>true, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("crit_status")->SetDisplayValues(Array("Name"=>"crit_status", "Label"=>"Estado Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "IsMandatory"=>true, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("oper_nuevo")->SetDisplayValues(Array("Name"=>"oper_nuevo", "Label"=>"Nuevo", "Size"=>2, "IsForDB"=>true, "Order"=>104, "IsMandatory"=>true, "Presentation"=>"SINO", "IsVisible"=>true, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("oper_grupo")->SetDisplayValues(Array("Name"=>"oper_grupo", "Label"=>"Grupo", "Size"=>50, "IsForDB"=>true, "Order"=>103, "IsMandatory"=>true, "ValueList"=>"oper_grupo", "Presentation"=>"SELECT", "IsVisible"=>true, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("oper_hora_in")->SetDisplayValues(Array("Name"=>"oper_hora_in", "Label"=>"Hora Ingreso", "Size"=>10, "IsForDB"=>true, "Order"=>105, "IsMandatory"=>true, "Presentation"=>"TEXT", "IsVisible"=>true, "Cols"=>8, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("oper_hora_out")->SetDisplayValues(Array("Name"=>"oper_hora_out", "Label"=>"Hora Egreso", "Size"=>10, "IsForDB"=>true, "Order"=>106, "IsMandatory"=>true, "Presentation"=>"TEXT", "IsVisible"=>true, "Cols"=>8, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("modificar_circuito")->SetDisplayValues(Array("Name"=>"modificar_circuito", "Label"=>"Desea incorporar la modificación al circuito activo actual?", "Size"=>2, "Type"=>"VARCHAR", "Order"=>7, "IsMandatory"=>true, "Presentation"=>"SINO", "IsVisible"=>true, "Class"=>"coper_status_m", "InitialValue"=>"SI"));
        $this->getClass("coper_status_m")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"INT", "Order"=>8, "Presentation"=>"CIRCUITOS", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("cir_date_ini")->SetDisplayValues(Array("Name"=>"cir_date_ini", "Label"=>"Fecha Inicio", "Type"=>"DATETIME", "Order"=>9, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("cir_date_fin")->SetDisplayValues(Array("Name"=>"cir_date_fin", "Label"=>"Fecha Final", "Type"=>"DATETIME", "Order"=>10, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("cir_importance_min")->SetDisplayValues(Array("Name"=>"cir_importance_min", "Label"=>"Importancia Min", "Type"=>"INT", "Order"=>11, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"coper_status_m"));
        $this->getClass("coper_status_m")->GetField("cir_status")->SetDisplayValues(Array("Name"=>"cir_status", "Label"=>"Estado", "Size"=>20, "Type"=>"VARCHAR", "Order"=>12, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"coper_status_m"));
    }
}
}

if( !class_exists('coper_status_m_m') ) {
class coper_status_m_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new coper_status_m();
		$this->m_next_page = 'oper_status.php?last=1&OP=L'; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'oper_status_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Operadores a Monitorear';// Titulo del formulario
    	$this->m_comment = '';// Comentario del formulario
    	$this->m_event_n = '';// Evento al ingresar nuevo
    	$this->m_event_m = '';// Evento al modificar
    	$this->m_event_b = '';// Evento al eliminar
    	$this->m_event_v = '';// Evento al visualizar
    	$this->m_event_p = '';// Evento al imprimir
    	$this->m_css_prefix = '';// Prefijo CSS

        //Grupos
		$this->m_handler[1] = new unico_gr($this);

    }

    function RenderJSIncludes() {
        $html = '';

        return $html;
    }
}
}

//Genero el form en HTML
$f = new coper_status_m_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
