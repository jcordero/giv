<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "cmonitoreos.php";

class cmonitoreos_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Monitorear";
        $this->m_classname = "cmonitoreos_sl";
        $this->m_obj = new cmonitoreos();
        $this->m_page_name = "monitoreos_superv.php";
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

        $this->m_search_fields = array('cir_code','use_code_operador','mon_date_aprox','use_code_supervisor','mon_status');

        $this->addAction(6,"monitoreos_superv_maint.php?OP=M",array(new caction_param('mon_code')),"","monitorear","M","monitoreos.supervisar","monitoreos_superv.php?last=1&OP=L");
        $this->addAction(6,"monitoreos_superv_cierre_maint.php?OP=M",array(new caction_param('mon_code')),"","cierre forzado","M","monitoreos.supervisar","monitoreos_superv.php?last=1&OP=L");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("mon_date_aprox")->SetDisplayValues(Array("Name"=>"mon_date_aprox", "Label"=>"Fecha Aproximada", "Type"=>"datetime", "IsForDB"=>true, "Order"=>121, "Presentation"=>"DATERANGE", "IsVisible"=>true));
        $this->m_obj->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("mon_status")->SetDisplayValues(Array("Name"=>"mon_status", "Label"=>"Estado Monitoreo", "Size"=>20, "IsForDB"=>true, "Order"=>107, "Presentation"=>"MON_STATUS", "InitialValue"=>"PENDIENTE"));
    }

}


class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Circuito';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col101 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Nro';
        $this->m_order = '101';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_code", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col121 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Fecha Aproximada';
        $this->m_order = '121';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_date_aprox';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_date_aprox", "Label"=>"Fecha Aproximada", "Type"=>"datetime", "IsForDB"=>true, "Order"=>121, "Presentation"=>"DATERANGE", "IsVisible"=>true));
    }
}

class col107 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado Monitoreo';
        $this->m_order = '107';
        $this->m_isvisible = false;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_status';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_status", "Label"=>"Estado Monitoreo", "Size"=>20, "IsForDB"=>true, "Order"=>107, "Presentation"=>"MON_STATUS", "InitialValue"=>"PENDIENTE"));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Supervisor Asignado';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'use_code_supervisor';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Operador';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'use_code_operador';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class cmonitoreos_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Monitorear'; //Titulo de la tabla
        $this->m_classname = 'cmonitoreos'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[102] = new col102($this);
        $this->m_cols[101] = new col101($this);
        $this->m_cols[121] = new col121($this);
        $this->m_cols[107] = new col107($this);
        $this->m_cols[105] = new col105($this);
        $this->m_cols[104] = new col104($this);
    }

}

$pg = new cmonitoreos_sl();
$pg->CreatePage();

?>
