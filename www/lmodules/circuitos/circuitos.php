<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "ccircuitos.php";

class ccircuitos_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Circuitos a Monitorear";
        $this->m_classname = "ccircuitos_sl";
        $this->m_obj = new ccircuitos();
        $this->m_page_name = "circuitos.php";
        $this->m_result = new ctable($this->m_title);
        $this->m_print_orientation = 'P';
        $this->m_print_size = 'A4';
        $this->m_iso_codigo = '';
        $this->m_iso_revision = '';
        $this->m_views = '';
		$this->m_template_html = 'default.htm';
		$this->m_template_pdml = 'default.pdml';
		$this->m_render_html = 'BLOCK';
		$this->m_render_pdml = 'BLOCK';

        $this->m_search_fields = array('cir_code','cir_name','cir_date_ini','cir_date_fin','cir_importance_min','cir_status');

        $this->addAction(7,"circuitos_maint.php?OP=V",array(new caction_param('cir_code')),"","ver","V","","");
        $this->addAction(7,"circuitos_maint.php?OP=M",array(new caction_param('cir_code')),"","modificar","M","circuitos.circuitos.actualizar","");
        $this->addAction(7,"circuitos_fecha_maint.php?OP=M",array(new caction_param('cir_code')),"","modificar fecha","M","circuitos.circuitos.actualizar","");
        $this->addAction(7,"circuitos_baja_maint.php?OP=M",array(new caction_param('cir_code')),"","anular","M","circuitos.circuitos.actualizar","");
        $this->addAction(7,"cir_oper.php?OP=L",array(new caction_param('cir_code')),"","desempeño","L","circuitos.cir_groups","");
        $this->addAction(7,"cir_groups_n_maint.php?OP=N",array(new caction_param('cir_code')),"","asignar grupo","N","circuitos.cir_groups.nuevo","");
        $this->addAction(7,"cir_groups.php?OP=L",array(new caction_param('cir_code')),"","grupos","L","circuitos.cir_groups","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Sequence"=>"circuitos"));
        $this->m_obj->GetField("cir_name")->SetDisplayValues(Array("Name"=>"cir_name", "Label"=>"Nombre", "Size"=>200, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsVisible"=>true));
        $this->m_obj->GetField("cir_date_ini")->SetDisplayValues(Array("Name"=>"cir_date_ini", "Label"=>"Fecha Inicio", "Type"=>"datetime", "IsForDB"=>true, "Order"=>103, "Presentation"=>"DATERANGE", "IsVisible"=>true));
        $this->m_obj->GetField("cir_date_fin")->SetDisplayValues(Array("Name"=>"cir_date_fin", "Label"=>"Fecha Final", "Type"=>"datetime", "IsForDB"=>true, "Order"=>104, "Presentation"=>"DATERANGE", "IsVisible"=>true));
        $this->m_obj->GetField("cir_importance_min")->SetDisplayValues(Array("Name"=>"cir_importance_min", "Label"=>"Importancia Min", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"INT", "IsVisible"=>true));
        $this->m_obj->GetField("cir_status")->SetDisplayValues(Array("Name"=>"cir_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>106, "Presentation"=>"ESTADO_CIRCUITOS", "IsVisible"=>true));
    }

}


class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Fecha Inicio';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_date_ini';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_date_ini", "Label"=>"Fecha Inicio", "Type"=>"datetime", "IsForDB"=>true, "Order"=>103, "Presentation"=>"DATERANGE", "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Fecha Final';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_date_fin';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_date_fin", "Label"=>"Fecha Final", "Type"=>"datetime", "IsForDB"=>true, "Order"=>104, "Presentation"=>"DATERANGE", "IsVisible"=>true));
    }
}

class col106 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado';
        $this->m_order = '106';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_status';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>106, "Presentation"=>"ESTADO_CIRCUITOS", "IsVisible"=>true));
    }
}

class col101 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Circuito Nro';
        $this->m_order = '101';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_code", "Label"=>"Circuito Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Sequence"=>"circuitos"));
    }
}

class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Nombre';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_name';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_name", "Label"=>"Nombre", "Size"=>200, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsVisible"=>true));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Importancia Min';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_importance_min';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_importance_min", "Label"=>"Importancia Min", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class ccircuitos_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Circuitos a Monitorear'; //Titulo de la tabla
        $this->m_classname = 'ccircuitos'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[103] = new col103($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[106] = new col106($this);
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[105] = new col105($this);
    }

}

$pg = new ccircuitos_sl();
$pg->CreatePage();

?>
