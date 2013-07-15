<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "ccircuitos.php";

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
        $this->m_fields[] = 'ccircuitos:cir_code';
        $this->m_fields[] = 'ccircuitos:cir_name';
        $this->m_fields[] = 'ccircuitos:cir_date_ini';
        $this->m_fields[] = 'ccircuitos:cir_date_fin';
        $this->m_fields[] = 'ccircuitos:cir_importance_min';
        $this->m_fields[] = 'ccircuitos:cir_status';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccircuitos")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"SEQUENCE", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Sequence"=>"circuitos", "ClassParams"=>"circuitos", "Class"=>"ccircuitos"));
        $this->getClass("ccircuitos")->GetField("cir_name")->SetDisplayValues(Array("Name"=>"cir_name", "Label"=>"Nombre", "Size"=>200, "IsForDB"=>true, "Order"=>102, "IsMandatory"=>true, "Presentation"=>"TEXT", "IsVisible"=>true, "Class"=>"ccircuitos"));
        $this->getClass("ccircuitos")->GetField("cir_date_ini")->SetDisplayValues(Array("Name"=>"cir_date_ini", "Label"=>"Fecha Inicio", "Type"=>"datetime", "IsForDB"=>true, "Order"=>103, "IsMandatory"=>true, "Presentation"=>"DATE", "IsVisible"=>true, "Class"=>"ccircuitos"));
        $this->getClass("ccircuitos")->GetField("cir_date_fin")->SetDisplayValues(Array("Name"=>"cir_date_fin", "Label"=>"Fecha Final", "Type"=>"datetime", "IsForDB"=>true, "Order"=>104, "IsMandatory"=>true, "Presentation"=>"DATE", "IsVisible"=>true, "Class"=>"ccircuitos"));
        $this->getClass("ccircuitos")->GetField("cir_importance_min")->SetDisplayValues(Array("Name"=>"cir_importance_min", "Label"=>"Importancia Min", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "IsMandatory"=>true, "Presentation"=>"INT", "IsVisible"=>true, "Class"=>"ccircuitos"));
        $this->getClass("ccircuitos")->GetField("cir_status")->SetDisplayValues(Array("Name"=>"cir_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>106, "Presentation"=>"ESTADO_CIRCUITOS", "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccircuitos", "InitialValue"=>"PENDIENTE"));
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
		$this->m_next_page = 'circuitos.php?last=1&OP=L'; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'circuitos_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Circuitos a Monitorear';// Titulo del formulario
    	$this->m_comment = '';// Comentario del formulario
    	$this->m_event_n = '';// Evento al ingresar nuevo
    	$this->m_event_m = '';// Evento al modificar
    	$this->m_event_b = '';// Evento al eliminar
    	$this->m_event_v = '';// Evento al visualizar
    	$this->m_event_p = '';// Evento al imprimir
    	$this->m_css_prefix = '';// Prefijo CSS

        //Acciones
		$this->m_action[] = new CAction('N','Asignar Grupo de Operadores','','','cir_groups_maint.php?OP=N','','','');

        //Grupos
		$this->m_handler[1] = new grupo_gr($this);

    }

    function RenderJSIncludes() {
        $html = '';

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
