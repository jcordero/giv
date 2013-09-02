<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "ccapacitacion.php";

class ccapacitacion_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Capacitaciones";
        $this->m_classname = "ccapacitacion_sl";
        $this->m_obj = new ccapacitacion();
        $this->m_page_name = "capacitacion_superv.php";
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

        $this->m_search_fields = array('cap_code','mon_code','cir_code','use_code_operador','use_code_supervisor','cap_use_code','cap_status','cap_date','cap_origen','cap_habilidad','cap_rol_play_aprobado','cap_visto_oper');

        $this->addAction(13,"capacitacion_superv_maint.php?OP=V",array(new caction_param('cap_code')),"","ver capacitacion","V","capacitacion.supervisor.pend","capacitacion_superv.php?last=1&OP=L");
        $this->addAction(13,"/lmodules/monitoreos/monitoreos_superv_maint.php?OP=V",array(new caction_param('mon_code')),"","ver monitoreo","V","","/lmodules/capacitacion/capacitacion_superv.php?last=1&OP=L");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cap_code")->SetDisplayValues(Array("Name"=>"cap_code", "Label"=>"Capacitación Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("mon_code")->SetDisplayValues(Array("Name"=>"mon_code", "Label"=>"Monitoreo Nro", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"INT", "IsVisible"=>true));
        $this->m_obj->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"CIRCUITO_ACTIVO", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("cap_use_code")->SetDisplayValues(Array("Name"=>"cap_use_code", "Label"=>"Capacitado por", "Type"=>"int", "IsForDB"=>true, "Order"=>110, "Presentation"=>"USER", "IsVisible"=>true));
        $this->m_obj->GetField("cap_status")->SetDisplayValues(Array("Name"=>"cap_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>107, "Presentation"=>"CAP_STATUS", "IsVisible"=>true));
        $this->m_obj->GetField("cap_date")->SetDisplayValues(Array("Name"=>"cap_date", "Label"=>"Fecha", "Type"=>"datetime", "IsForDB"=>true, "Order"=>106, "Presentation"=>"DATERANGE", "IsVisible"=>true));
        $this->m_obj->GetField("cap_origen")->SetDisplayValues(Array("Name"=>"cap_origen", "Label"=>"Origen", "Size"=>20, "IsForDB"=>true, "Order"=>111, "ValueList"=>"cap_origen", "Presentation"=>"SELECT", "IsVisible"=>true));
        $this->m_obj->GetField("cap_habilidad")->SetDisplayValues(Array("Name"=>"cap_habilidad", "Label"=>"Habilidad", "Size"=>200, "IsForDB"=>true, "Order"=>113, "ValueList"=>"cap_habilidad", "Presentation"=>"SELECT", "IsVisible"=>true));
        $this->m_obj->GetField("cap_rol_play_aprobado")->SetDisplayValues(Array("Name"=>"cap_rol_play_aprobado", "Label"=>"Rol Play Aprobado", "Size"=>2, "IsForDB"=>true, "Order"=>109, "Presentation"=>"SINO", "IsVisible"=>true));
        $this->m_obj->GetField("cap_visto_oper")->SetDisplayValues(Array("Name"=>"cap_visto_oper", "Label"=>"Visto", "Size"=>2, "IsForDB"=>true, "Order"=>116, "Presentation"=>"SINO", "IsVisible"=>true));
    }

}


class col101 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Capacitación Nro';
        $this->m_order = '101';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cap_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cap_code", "Label"=>"Capacitación Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Monitoreo Nro';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'mon_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"mon_code", "Label"=>"Monitoreo Nro", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Circuito';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"CIRCUITO_ACTIVO", "IsNullable"=>false, "IsVisible"=>true));
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
        $this->m_sort_field = 'cap_status';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cap_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>107, "Presentation"=>"CAP_STATUS", "IsVisible"=>true));
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
        $this->m_sort_field = 'cap_date';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cap_date", "Label"=>"Fecha", "Type"=>"datetime", "IsForDB"=>true, "Order"=>106, "Presentation"=>"DATERANGE", "IsVisible"=>true));
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

class col110 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Capacitado por';
        $this->m_order = '110';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cap_use_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cap_use_code", "Label"=>"Capacitado por", "Type"=>"int", "IsForDB"=>true, "Order"=>110, "Presentation"=>"USER", "IsVisible"=>true));
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

class col111 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Origen';
        $this->m_order = '111';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cap_origen';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cap_origen", "Label"=>"Origen", "Size"=>20, "IsForDB"=>true, "Order"=>111, "ValueList"=>"cap_origen", "Presentation"=>"SELECT", "IsVisible"=>true));
    }
}

class col113 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Habilidad';
        $this->m_order = '113';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cap_habilidad';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cap_habilidad", "Label"=>"Habilidad", "Size"=>200, "IsForDB"=>true, "Order"=>113, "ValueList"=>"cap_habilidad", "Presentation"=>"SELECT", "IsVisible"=>true));
    }
}

class col109 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Rol Play Aprobado';
        $this->m_order = '109';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cap_rol_play_aprobado';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cap_rol_play_aprobado", "Label"=>"Rol Play Aprobado", "Size"=>2, "IsForDB"=>true, "Order"=>109, "Presentation"=>"SINO", "IsVisible"=>true));
    }
}

class col116 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Visto';
        $this->m_order = '116';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cap_visto_oper';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cap_visto_oper", "Label"=>"Visto", "Size"=>2, "IsForDB"=>true, "Order"=>116, "Presentation"=>"SINO", "IsVisible"=>true));
    }
}

class ccapacitacion_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Capacitaciones'; //Titulo de la tabla
        $this->m_classname = 'ccapacitacion'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
        $this->m_cols[107] = new col107($this);
        $this->m_cols[106] = new col106($this);
        $this->m_cols[105] = new col105($this);
        $this->m_cols[110] = new col110($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[111] = new col111($this);
        $this->m_cols[113] = new col113($this);
        $this->m_cols[109] = new col109($this);
        $this->m_cols[116] = new col116($this);
    }

}

$pg = new ccapacitacion_sl();
$pg->CreatePage();

?>
