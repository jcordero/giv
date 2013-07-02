<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "ccrit_status.php";

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
        $this->m_fields[] = 'ccrit_status:crit_status';
        $this->m_fields[] = 'ccrit_status:crit_status_name';
        $this->m_fields[] = 'ccrit_status:crit_status_color';
        $this->m_fields[] = 'ccrit_status:crit_status_color_html';
        $this->m_fields[] = 'ccrit_status:crit_status_mon_sem';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccrit_status")->GetField("crit_status")->SetDisplayValues(Array("Name"=>"crit_status", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"SEQUENCE", "IsVisible"=>true, "IsReadOnly"=>true, "Sequence"=>"crit_status", "ClassParams"=>"crit_status", "Class"=>"ccrit_status"));
        $this->getClass("ccrit_status")->GetField("crit_status_name")->SetDisplayValues(Array("Name"=>"crit_status_name", "Label"=>"Tipo de Llamado", "Size"=>50, "IsForDB"=>true, "Order"=>102, "IsMandatory"=>true, "Presentation"=>"TEXT", "IsVisible"=>true, "Class"=>"ccrit_status"));
        $this->getClass("ccrit_status")->GetField("crit_status_color")->SetDisplayValues(Array("Name"=>"crit_status_color", "Label"=>"Color", "Size"=>20, "IsForDB"=>true, "Order"=>103, "IsMandatory"=>true, "Presentation"=>"TEXT", "IsVisible"=>true, "Class"=>"ccrit_status"));
        $this->getClass("ccrit_status")->GetField("crit_status_color_html")->SetDisplayValues(Array("Name"=>"crit_status_color_html", "Label"=>"Color Html", "Size"=>10, "IsForDB"=>true, "Order"=>104, "IsMandatory"=>true, "Presentation"=>"TEXT", "IsVisible"=>true, "Class"=>"ccrit_status"));
        $this->getClass("ccrit_status")->GetField("crit_status_mon_sem")->SetDisplayValues(Array("Name"=>"crit_status_mon_sem", "Label"=>"Monitoreos por Semana", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "IsMandatory"=>true, "Presentation"=>"INT", "IsVisible"=>true, "Class"=>"ccrit_status"));
    }
}
}

if( !class_exists('ccrit_status_m') ) {
class ccrit_status_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new ccrit_status();
		$this->m_next_page = 'crit_status.php?last=1&OP=L'; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'crit_status_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Estados de Operador a Monitorear';// Titulo del formulario
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
$f = new ccrit_status_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
