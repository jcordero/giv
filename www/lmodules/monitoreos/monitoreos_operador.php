<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "cmonitoreos_rep.php";

class cmonitoreos_rep_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Mis Monitoreos";
        $this->m_classname = "cmonitoreos_rep_sl";
        $this->m_obj = new cmonitoreos_rep();
        $this->m_page_name = "monitoreos_operador.php";
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

        $this->m_search_fields = array('mon_code','cir_code','use_code_operador','use_code_supervisor','mon_date','mon_status','mon_forzado','cli_call_code','mon_aprobo','mon_perjuicio_cliente');

        $this->addAction(11,"monitoreos_maint.php?OP=V",array(new caction_param('mon_code')),"","detalle","V","","monitoreos_operador.php?last=1&OP=L");
        $this->addAction(11,"/lmodules/capacitacion/capacitacion_oper.php?OP=L",array(new caction_param('mon_code'),new caction_param('mon_add_cap')),"","capacitacion","L","capacitacion.operador","monitoreos_operador.php?last=1&OP=L");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("mon_code")->SetDisplayValues(Array("Name"=>"mon_code", "Label"=>"Mon. Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circ. Nro", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Oper.", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"CURRENTUSER", "IsNullable"=>false, "ClassParams"=>"force"));
        $this->m_obj->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Superv. Asignado", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("mon_date")->SetDisplayValues(Array("Name"=>"mon_date", "Label"=>"Fecha", "Type"=>"datetime", "IsForDB"=>true, "Order"=>106, "Presentation"=>"DATERANGE", "IsVisible"=>true));
        $this->m_obj->GetField("mon_status")->SetDisplayValues(Array("Name"=>"mon_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>107, "Presentation"=>"MON_STATUS", "IsVisible"=>true));
        $this->m_obj->GetField("mon_forzado")->SetDisplayValues(Array("Name"=>"mon_forzado", "Label"=>"Cierre", "Size"=>2, "IsForDB"=>true, "Order"=>108, "Presentation"=>"SINO", "IsVisible"=>true));
        $this->m_obj->GetField("cli_call_code")->SetDisplayValues(Array("Name"=>"cli_call_code", "Label"=>"Tipo", "Size"=>200, "IsForDB"=>true, "Order"=>111, "Presentation"=>"CLI_CALL", "IsVisible"=>true));
        $this->m_obj->GetField("mon_aprobo")->SetDisplayValues(Array("Name"=>"mon_aprobo", "Label"=>"Aprobado", "Size"=>2, "IsForDB"=>true, "Order"=>116, "Presentation"=>"SINO", "IsVisible"=>true));
        $this->m_obj->GetField("mon_perjuicio_cliente")->SetDisplayValues(Array("Name"=>"mon_perjuicio_cliente", "Label"=>"Perjuicio", "Size"=>2, "IsForDB"=>true, "Order"=>117, "Presentation"=>"SINO", "IsVisible"=>true));
    }

}


class col101 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. Nro';
        $this->m_order = '101';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_code", "Label"=>"Mon. Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Circ. Nro';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_code", "Label"=>"Circ. Nro", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Oper.';
        $this->m_order = '104';
        $this->m_isvisible = false;
        $this->m_align = 'left';
        $this->m_sort_field = 'use_code_operador';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code_operador", "Label"=>"Oper.", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"CURRENTUSER", "IsNullable"=>false, "ClassParams"=>"force"));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Superv. Asignado';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'use_code_supervisor';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code_supervisor", "Label"=>"Superv. Asignado", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col106 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Fecha';
        $this->m_order = '106';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_date';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_date", "Label"=>"Fecha", "Type"=>"datetime", "IsForDB"=>true, "Order"=>106, "Presentation"=>"DATERANGE", "IsVisible"=>true));
    }
}

class col107 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado';
        $this->m_order = '107';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_status';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>107, "Presentation"=>"MON_STATUS", "IsVisible"=>true));
    }
}

class col108 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Cierre';
        $this->m_order = '108';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_forzado';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_forzado", "Label"=>"Cierre", "Size"=>2, "IsForDB"=>true, "Order"=>108, "Presentation"=>"SINO", "IsVisible"=>true));
    }
}

class col111 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Tipo';
        $this->m_order = '111';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cli_call_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cli_call_code", "Label"=>"Tipo", "Size"=>200, "IsForDB"=>true, "Order"=>111, "Presentation"=>"CLI_CALL", "IsVisible"=>true));
    }
}

class col116 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Aprobado';
        $this->m_order = '116';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_aprobo';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_aprobo", "Label"=>"Aprobado", "Size"=>2, "IsForDB"=>true, "Order"=>116, "Presentation"=>"SINO", "IsVisible"=>true));
    }
}

class col115 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Puntaje';
        $this->m_order = '115';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_puntaje';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_puntaje", "Label"=>"Puntaje", "Type"=>"int", "IsForDB"=>true, "Order"=>115, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class col117 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Perjuicio';
        $this->m_order = '117';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_perjuicio_cliente';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_perjuicio_cliente", "Label"=>"Perjuicio", "Size"=>2, "IsForDB"=>true, "Order"=>117, "Presentation"=>"SINO", "IsVisible"=>true));
    }
}

class col118 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. Agregados';
        $this->m_order = '118';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_add_mon';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_add_mon", "Label"=>"Mon. Agregados", "Type"=>"int", "IsForDB"=>true, "Order"=>118, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class col119 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Capac. Agregadas';
        $this->m_order = '119';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_add_cap';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_add_cap", "Label"=>"Capac. Agregadas", "Type"=>"int", "IsForDB"=>true, "Order"=>119, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class col110 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Nota';
        $this->m_order = '110';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_note';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_note", "Label"=>"Nota", "Size"=>400, "IsForDB"=>true, "Order"=>110, "Presentation"=>"TEXT", "IsVisible"=>true));
    }
}

class cmonitoreos_rep_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Mis Monitoreos'; //Titulo de la tabla
        $this->m_classname = 'cmonitoreos_rep'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[105] = new col105($this);
        $this->m_cols[106] = new col106($this);
        $this->m_cols[107] = new col107($this);
        $this->m_cols[108] = new col108($this);
        $this->m_cols[111] = new col111($this);
        $this->m_cols[116] = new col116($this);
        $this->m_cols[115] = new col115($this);
        $this->m_cols[117] = new col117($this);
        $this->m_cols[118] = new col118($this);
        $this->m_cols[119] = new col119($this);
        $this->m_cols[110] = new col110($this);
    }

}

$pg = new cmonitoreos_rep_sl();
$pg->CreatePage();

?>
