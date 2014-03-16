<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "ccircuitos.php";

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
        $this->m_fields[] = 'ccircuitos:cir_code';
        $this->m_fields[] = 'ccircuitos:tmp_graph';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccircuitos")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "Class"=>"ccircuitos"));
        $this->getClass("ccircuitos")->GetField("tmp_graph")->SetDisplayValues(Array("Name"=>"tmp_graph", "Type"=>"int", "Order"=>8, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccircuitos"));
    }
}
}

if( !class_exists('ccircuitos_m') ) {
class ccircuitos_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new ccircuitos();
		$this->m_next_page = ''; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'cir_grafico_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'M'; //Operacion por defecto
    	$this->m_title = 'Gráfico del Circuito';// Titulo del formulario
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
        $html.="<script type='text/javascript' src='cir_grafico.js'></script>";

        return $html;
    }
}
}

//Genero el form en HTML
$f = new ccircuitos_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
