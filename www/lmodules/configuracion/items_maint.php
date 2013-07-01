<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "citems.php";

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
        $this->m_fields[] = 'citems:it_code';
        $this->m_fields[] = 'citems:it_name';
        $this->m_fields[] = 'citems:it_order';
        $this->m_fields[] = 'citems:it_importance';
        $this->m_fields[] = 'citems:it_status';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("citems")->GetField("it_code")->SetDisplayValues(Array("Name"=>"it_code", "Label"=>"Item Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"SEQUENCE", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Sequence"=>"items", "ClassParams"=>"items", "Class"=>"citems"));
        $this->getClass("citems")->GetField("it_name")->SetDisplayValues(Array("Name"=>"it_name", "Label"=>"Nombre del Item", "Size"=>200, "IsForDB"=>true, "Order"=>102, "IsMandatory"=>true, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true, "Class"=>"citems"));
        $this->getClass("citems")->GetField("it_order")->SetDisplayValues(Array("Name"=>"it_order", "Label"=>"Orden", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "IsMandatory"=>true, "Presentation"=>"INT", "IsVisible"=>true, "Class"=>"citems"));
        $this->getClass("citems")->GetField("it_importance")->SetDisplayValues(Array("Name"=>"it_importance", "Label"=>"Importancia", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "IsMandatory"=>true, "Presentation"=>"INT", "IsVisible"=>true, "Class"=>"citems", "total"=>true));
        $this->getClass("citems")->GetField("it_status")->SetDisplayValues(Array("Name"=>"it_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>105, "IsMandatory"=>true, "Presentation"=>"ESTADO", "IsVisible"=>true, "Class"=>"citems", "InitialValue"=>"ACTIVO"));
    }
}
}

if( !class_exists('citems_m') ) {
class citems_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new citems();
		$this->m_next_page = 'items.php?last=1&OP=L'; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'items_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Items a Monitorear';// Titulo del formulario
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
$f = new citems_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
