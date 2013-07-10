<?php
/* Pagina de formulario generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/ctable_maint.php";
include_once "ccir_groups.php";

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
        $this->m_fields[] = 'ccir_groups:cirg_code';
        $this->m_fields[] = 'ccir_groups:cir_code';
        $this->m_fields[] = 'ccir_groups:use_code_supervisor';
        $this->m_fields[] = 'ccir_groups:oper_grupo';

    }

    public function InitializeInstance() {
        //SetDisplayValues($attributes) 
        $this->getClass("ccir_groups")->GetField("cirg_code")->SetDisplayValues(Array("Name"=>"cirg_code", "Label"=>"Grupo Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Sequence"=>"cir_groups", "Class"=>"ccir_groups"));
        $this->getClass("ccir_groups")->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccir_groups"));
        $this->getClass("ccir_groups")->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccir_groups"));
        $this->getClass("ccir_groups")->GetField("oper_grupo")->SetDisplayValues(Array("Name"=>"oper_grupo", "Label"=>"Grupo", "Size"=>20, "IsForDB"=>true, "Order"=>104, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true, "IsReadOnly"=>true, "Class"=>"ccir_groups"));
    }
}
}


if( !class_exists('cir_groups_oper_th2') ) {
class cir_groups_oper_th2 extends ctable_handler {
    function __construct($parent) {
        parent::__construct($parent);
        $this->m_title = 'Operadores'; //Titulo de la tabla
        $this->m_isFile = false; //Es una tabla que contiene archivos, mostrar browser
        $this->m_classname = 'cir_groups_oper'; //Clase x defecto
        $this->m_total = false; //Incluir ultima fila de totales
        $this->m_id = 'operadores'; //Identificador para Wizards
        $this->m_order = '2'; //Orden de aparicion

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

        $this->m_datafields['cirg_code']=1;
        $this->m_datafields['use_code_operador']=2;
        $this->m_datafields['crit_status_ini']=3;
        $this->m_datafields['crit_status_fin']=4;
        $this->m_datafields['cirg_cant_mon_pendientes']=5;
        $this->m_datafields['cirg_cant_mon_realizados']=6;
        $this->m_datafields['cirg_cant_mon_ok']=7;
        $this->m_datafields['cirg_cant_mon_mal']=8;
        $this->m_datafields['cirg_cant_cap_pendientes']=9;
        $this->m_datafields['cirg_cant_cap_realizados']=10;
        $this->m_datafields['cirg_cant_cap_ok']=11;
        $this->m_datafields['cirg_cant_cap_mal']=12;

        $this->m_columns[1] = new ctable_column(1,'Operador',array('cirg_code','use_code_operador'));
        $this->m_columns[2] = new ctable_column(2,'Estados',array('crit_status_ini','crit_status_fin'));
        $this->m_columns[3] = new ctable_column(3,'Monitoreos',array('cirg_cant_mon_pendientes','cirg_cant_mon_realizados','cirg_cant_mon_ok','cirg_cant_mon_mal'));
        $this->m_columns[4] = new ctable_column(4,'Capacitaciones',array('cirg_cant_cap_pendientes','cirg_cant_cap_realizados','cirg_cant_cap_ok','cirg_cant_cap_mal'));
    }

    public function getJsIncludes($obj) {
        $r=array();
        $r[]=$obj->GetField("cirg_code")->getJsIncludes();
        $r[]=$obj->GetField("use_code_operador")->getJsIncludes();
        $r[]=$obj->GetField("crit_status_ini")->getJsIncludes();
        $r[]=$obj->GetField("crit_status_fin")->getJsIncludes();
        $r[]=$obj->GetField("cirg_cant_mon_pendientes")->getJsIncludes();
        $r[]=$obj->GetField("cirg_cant_mon_realizados")->getJsIncludes();
        $r[]=$obj->GetField("cirg_cant_mon_ok")->getJsIncludes();
        $r[]=$obj->GetField("cirg_cant_mon_mal")->getJsIncludes();
        $r[]=$obj->GetField("cirg_cant_cap_pendientes")->getJsIncludes();
        $r[]=$obj->GetField("cirg_cant_cap_realizados")->getJsIncludes();
        $r[]=$obj->GetField("cirg_cant_cap_ok")->getJsIncludes();
        $r[]=$obj->GetField("cirg_cant_cap_mal")->getJsIncludes();
        return $r;
    }

    public function InitializeInstance($obj) {
        //SetDisplayValues($attributes) 
        $obj->GetField("cirg_code")->SetDisplayValues(Array("Name"=>"cirg_code", "Label"=>"Codigo", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "IsNullable"=>false));
        $obj->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>102, "IsMandatory"=>true, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true));
        $obj->GetField("crit_status_ini")->SetDisplayValues(Array("Name"=>"crit_status_ini", "Label"=>"Estado Inicial", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("crit_status_fin")->SetDisplayValues(Array("Name"=>"crit_status_fin", "Label"=>"Estado Final", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("cirg_cant_mon_pendientes")->SetDisplayValues(Array("Name"=>"cirg_cant_mon_pendientes", "Label"=>"Pendientes", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("cirg_cant_mon_realizados")->SetDisplayValues(Array("Name"=>"cirg_cant_mon_realizados", "Label"=>"Realizados", "Type"=>"int", "IsForDB"=>true, "Order"=>106, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("cirg_cant_mon_ok")->SetDisplayValues(Array("Name"=>"cirg_cant_mon_ok", "Label"=>"OK", "Type"=>"int", "IsForDB"=>true, "Order"=>107, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("cirg_cant_mon_mal")->SetDisplayValues(Array("Name"=>"cirg_cant_mon_mal", "Label"=>"Mal", "Type"=>"int", "IsForDB"=>true, "Order"=>108, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("cirg_cant_cap_pendientes")->SetDisplayValues(Array("Name"=>"cirg_cant_cap_pendientes", "Label"=>"Pendientes", "Type"=>"int", "IsForDB"=>true, "Order"=>109, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("cirg_cant_cap_realizados")->SetDisplayValues(Array("Name"=>"cirg_cant_cap_realizados", "Label"=>"Realizados", "Type"=>"int", "IsForDB"=>true, "Order"=>110, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("cirg_cant_cap_ok")->SetDisplayValues(Array("Name"=>"cirg_cant_cap_ok", "Label"=>"OK", "Type"=>"int", "IsForDB"=>true, "Order"=>111, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true));
        $obj->GetField("cirg_cant_cap_mal")->SetDisplayValues(Array("Name"=>"cirg_cant_cap_mal", "Label"=>"Mal", "Type"=>"int", "IsForDB"=>true, "Order"=>112, "Presentation"=>"INT", "IsVisible"=>true, "IsReadOnly"=>true));
    }

}
}
if( !class_exists('ccir_groups_m') ) {
class ccir_groups_m extends cclass_maint {
    function __construct() {
		global $primary_db;

		parent::__construct();
		$this->m_db = $primary_db;
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';
		$this->m_obj = new ccir_groups();
		$this->m_next_page = 'cir_groups.php?last=1&OP=L'; //Pagina a mostrar luego de enviar/cancelar el formulario
		$this->m_this_page = 'cir_groups_v_maint.php';
    	$this->m_save_to_type = 'DB'; //Si el formulario accede directo a las tablas o hace una transaccion
    	$this->m_view = ''; //Si se presenta como sabana o como wizard
    	$this->m_operation_allow = 'VNMPSDB'; //Lista de operaciones permitidas
    	$this->m_operation_default = 'V'; //Operacion por defecto
    	$this->m_title = 'Consulta de Asignación de Grupo';// Titulo del formulario
    	$this->m_comment = '';// Comentario del formulario
    	$this->m_event_n = '';// Evento al ingresar nuevo
    	$this->m_event_m = '';// Evento al modificar
    	$this->m_event_b = '';// Evento al eliminar
    	$this->m_event_v = '';// Evento al visualizar
    	$this->m_event_p = '';// Evento al imprimir
    	$this->m_css_prefix = '';// Prefijo CSS

        //Grupos
		$this->m_handler[1] = new grupo_gr($this);

        //Tablas
		$this->m_handler[2] = new cir_groups_oper_th2($this);

    }

    function RenderJSIncludes() {
        $html = '';

        return $html;
    }
}
}

//Genero el form en HTML
$f = new ccir_groups_m();
if(!defined('NO_RENDER'))
{
    $f->CreatePage();
}
?>
