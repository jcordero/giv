<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "cmonitoreo_item.php";

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
        $this->m_fields[] = 'cmonitoreo_item:id_item_a_monitorear';
        $this->m_fields[] = 'cmonitoreo_item:titulo';
        $this->m_fields[] = 'cmonitoreo_item:nivel_de_determinacion';
        $this->m_fields[] = 'cmonitoreo_item:orden';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("cmonitoreo_item")->GetField("id_item_a_monitorear")->SetDisplayValues(Array("Name"=>"id_item_a_monitorear", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "Class"=>"cmonitoreo_item"));
        $this->getClass("cmonitoreo_item")->GetField("titulo")->SetDisplayValues(Array("Name"=>"titulo", "Label"=>"titulo", "Size"=>50, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true, "Class"=>"cmonitoreo_item"));
        $this->getClass("cmonitoreo_item")->GetField("nivel_de_determinacion")->SetDisplayValues(Array("Name"=>"nivel_de_determinacion", "Label"=>"Nivel", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Class"=>"cmonitoreo_item"));
        $this->getClass("cmonitoreo_item")->GetField("orden")->SetDisplayValues(Array("Name"=>"orden", "Label"=>"orden", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Class"=>"cmonitoreo_item"));
    }
}
}

if( !class_exists('cmonitoreo_item_m') ) {
class cmonitoreo_item_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new cmonitoreo_item();
		$this->m_next_page = 'monitoreo_item.php?last=1&OP=L'; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'monitoreo_item_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Monitoreo';// Titulo del formulario
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
$f = new cmonitoreo_item_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>