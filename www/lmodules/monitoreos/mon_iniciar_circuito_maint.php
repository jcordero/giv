<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "cmon_iniciar_circuito.php";

//Genero las clases de los handlers

if( !class_exists('datos_gr') ) {
class datos_gr extends cform_group {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Confirme con continuar para iniciar el circuito'; //Titulo del grupo
        $this->m_order = 0; //Orden de presentacion de este grupo
        $this->m_id = 'datos'; //Id para los wizards
        $this->m_note = ''; //Nota
        $this->m_image = ''; //Imagen
        $this->m_render_html = 'PARENT'; //Forma de generar el contenido HTML
        $this->m_render_pdml = 'PARENT'; //Forma de generar el contenido PDF
        $this->m_comment = '';// Comentario del formulario
        $this->m_css_prefix = '';// Prefijo CSS

        //Campos del grupo
        $this->m_fields[] = 'cmon_iniciar_circuito:cir_code';
        $this->m_fields[] = 'cmon_iniciar_circuito:cir_semanas';
        $this->m_fields[] = 'cmon_iniciar_circuito:cir_date_ini';
        $this->m_fields[] = 'cmon_iniciar_circuito:cir_date_fin';
        $this->m_fields[] = 'cmon_iniciar_circuito:cir_importance_min';
        $this->m_fields[] = 'cmon_iniciar_circuito:cir_status';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("cmon_iniciar_circuito")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmon_iniciar_circuito"));
        $this->getClass("cmon_iniciar_circuito")->GetField("cir_semanas")->SetDisplayValues(Array("Name"=>"cir_semanas", "Label"=>"Semanas", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"INT", "IsReadOnly"=>true, "Class"=>"cmon_iniciar_circuito"));
        $this->getClass("cmon_iniciar_circuito")->GetField("cir_date_ini")->SetDisplayValues(Array("Name"=>"cir_date_ini", "Label"=>"Fecha Inicio", "Type"=>"datetime", "IsForDB"=>true, "Order"=>104, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmon_iniciar_circuito"));
        $this->getClass("cmon_iniciar_circuito")->GetField("cir_date_fin")->SetDisplayValues(Array("Name"=>"cir_date_fin", "Label"=>"Fecha Final", "Type"=>"datetime", "IsForDB"=>true, "Order"=>105, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmon_iniciar_circuito"));
        $this->getClass("cmon_iniciar_circuito")->GetField("cir_importance_min")->SetDisplayValues(Array("Name"=>"cir_importance_min", "Label"=>"Importancia Min", "Type"=>"int", "IsForDB"=>true, "Order"=>106, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmon_iniciar_circuito"));
        $this->getClass("cmon_iniciar_circuito")->GetField("cir_status")->SetDisplayValues(Array("Name"=>"cir_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>107, "Presentation"=>"TEXT", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"cmon_iniciar_circuito"));
    }
}
}

if( !class_exists('cmon_iniciar_circuito_m') ) {
class cmon_iniciar_circuito_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new cmon_iniciar_circuito();
		$this->m_next_page = ''; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'mon_iniciar_circuito_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Iniciar Circuito';// Titulo del formulario
    	$this->m_comment = '';// Comentario del formulario
    	$this->m_event_n = '';// Evento al ingresar nuevo
    	$this->m_event_m = '';// Evento al modificar
    	$this->m_event_b = '';// Evento al eliminar
    	$this->m_event_v = '';// Evento al visualizar
    	$this->m_event_p = '';// Evento al imprimir
    	$this->m_css_prefix = '';// Prefijo CSS

        //Grupos
		$this->m_handler[0] = new datos_gr($this);

    }

    function RenderJSIncludes() {
        $html = '';

        return $html;
    }
}
}

//Genero el form en HTML
$f = new cmon_iniciar_circuito_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
