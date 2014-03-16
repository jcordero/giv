<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "cdes_item.php";

class cdes_item_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Desempeño por Items de Monitoreo";
        $this->m_classname = "cdes_item_sl";
        $this->m_obj = new cdes_item();
        $this->m_page_name = "des_item.php";
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

        $this->m_search_fields = array('cir_code','use_code_operador','use_code_supervisor','it_code');

    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"INT", "IsForDB"=>true, "Order"=>2, "Presentation"=>"CIRCUITOS", "IsVisible"=>true));
        $this->m_obj->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"INT", "IsForDB"=>true, "Order"=>3, "Presentation"=>"OPERADOR", "IsVisible"=>true));
        $this->m_obj->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"INT", "IsForDB"=>true, "Order"=>4, "Presentation"=>"SUPERVISOR", "IsVisible"=>true));
        $this->m_obj->GetField("it_code")->SetDisplayValues(Array("Name"=>"it_code", "Label"=>"Item", "Type"=>"INT", "IsForDB"=>true, "Order"=>1, "Presentation"=>"ITEM", "IsVisible"=>true));
    }

}


class col2 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Circuito';
        $this->m_order = '2';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"INT", "IsForDB"=>true, "Order"=>2, "Presentation"=>"CIRCUITOS", "IsVisible"=>true));
    }
}

class col3 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Operador';
        $this->m_order = '3';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'use_code_operador';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"INT", "IsForDB"=>true, "Order"=>3, "Presentation"=>"OPERADOR", "IsVisible"=>true));
    }
}

class col4 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Supervisor Asignado';
        $this->m_order = '4';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'use_code_supervisor';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"INT", "IsForDB"=>true, "Order"=>4, "Presentation"=>"SUPERVISOR", "IsVisible"=>true));
    }
}

class col1 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Item';
        $this->m_order = '1';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'it_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"it_code", "Label"=>"Item", "Type"=>"INT", "IsForDB"=>true, "Order"=>1, "Presentation"=>"ITEM", "IsVisible"=>true));
    }
}

class col9 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Cantidad';
        $this->m_order = '9';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cantidad';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cantidad", "Label"=>"Cantidad", "Type"=>"INT", "IsForDB"=>true, "Order"=>9, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col5 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Aprobados';
        $this->m_order = '5';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'aprobados';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"aprobados", "Label"=>"Aprobados", "Type"=>"INT", "IsForDB"=>true, "Order"=>5, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col6 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'NO Aprobados';
        $this->m_order = '6';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'no_aprobados';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"no_aprobados", "Label"=>"NO Aprobados", "Type"=>"INT", "IsForDB"=>true, "Order"=>6, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col8 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'No Req. Capac.';
        $this->m_order = '8';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'no_perjuicio';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"no_perjuicio", "Label"=>"No Req. Capac.", "Type"=>"INT", "IsForDB"=>true, "Order"=>8, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col7 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Req. Capacitac.';
        $this->m_order = '7';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'perjuicio';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"perjuicio", "Label"=>"Req. Capacitac.", "Type"=>"INT", "IsForDB"=>true, "Order"=>7, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class cdes_item_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Desempeño por Items de Monitoreo'; //Titulo de la tabla
        $this->m_classname = 'cdes_item'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[2] = new col2($this);
        $this->m_cols[3] = new col3($this);
        $this->m_cols[4] = new col4($this);
        $this->m_cols[1] = new col1($this);
        $this->m_cols[9] = new col9($this);
        $this->m_cols[5] = new col5($this);
        $this->m_cols[6] = new col6($this);
        $this->m_cols[8] = new col8($this);
        $this->m_cols[7] = new col7($this);
    }

}

$pg = new cdes_item_sl();
$pg->CreatePage();

?>
