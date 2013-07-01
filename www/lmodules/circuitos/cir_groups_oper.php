<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "ccir_groups_oper.php";

class ccir_groups_oper_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Operadores por Grupo";
        $this->m_classname = "ccir_groups_oper_sl";
        $this->m_obj = new ccir_groups_oper();
        $this->m_page_name = "cir_groups_oper.php";
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

        $this->m_search_fields = array('cirg_code','use_code_operador','crit_status_ini','crit_status_fin','cirg_cierre_forzado','cirg_cierre_motivo');

        $this->addAction(7,"cir_groups_v_maint.php?OP=V",array(new caction_param('cirg_code')),"","ver asignacion","V","","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cirg_code")->SetDisplayValues(Array("Name"=>"cirg_code", "Label"=>"Grupo Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("use_code_operador")->SetDisplayValues(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>102, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("crit_status_ini")->SetDisplayValues(Array("Name"=>"crit_status_ini", "Label"=>"Estado Inicial", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
        $this->m_obj->GetField("crit_status_fin")->SetDisplayValues(Array("Name"=>"crit_status_fin", "Label"=>"Estado Final", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
        $this->m_obj->GetField("cirg_cierre_forzado")->SetDisplayValues(Array("Name"=>"cirg_cierre_forzado", "Label"=>"Cierre Forzado", "Size"=>2, "IsForDB"=>true, "Order"=>105, "Presentation"=>"SINO", "IsVisible"=>true));
        $this->m_obj->GetField("cirg_cierre_motivo")->SetDisplayValues(Array("Name"=>"cirg_cierre_motivo", "Label"=>"Motivo de Cierre Forzado", "Size"=>200, "IsForDB"=>true, "Order"=>106, "Presentation"=>"TEXT", "IsVisible"=>true));
    }

}


class col101 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Grupo Nro';
        $this->m_order = '101';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_code", "Label"=>"Grupo Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Operador';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'use_code_operador';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code_operador", "Label"=>"Operador", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>102, "Presentation"=>"OPERADOR", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado Inicial';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_status_ini';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_status_ini", "Label"=>"Estado Inicial", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado Final';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_status_fin';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_status_fin", "Label"=>"Estado Final", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Cierre Forzado';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cierre_forzado';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cierre_forzado", "Label"=>"Cierre Forzado", "Size"=>2, "IsForDB"=>true, "Order"=>105, "Presentation"=>"SINO", "IsVisible"=>true));
    }
}

class col106 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Motivo de Cierre Forzado';
        $this->m_order = '106';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cierre_motivo';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cierre_motivo", "Label"=>"Motivo de Cierre Forzado", "Size"=>200, "IsForDB"=>true, "Order"=>106, "Presentation"=>"TEXT", "IsVisible"=>true));
    }
}

class col107 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Pendientes';
        $this->m_order = '107';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_pendientes';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_pendientes", "Label"=>"Pendientes", "Type"=>"int", "IsForDB"=>true, "Order"=>107, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col108 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Realizados';
        $this->m_order = '108';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_realizados';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_realizados", "Label"=>"Realizados", "Type"=>"int", "IsForDB"=>true, "Order"=>108, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col109 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'OK';
        $this->m_order = '109';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_ok';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_ok", "Label"=>"OK", "Type"=>"int", "IsForDB"=>true, "Order"=>109, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col110 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mal';
        $this->m_order = '110';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_mal';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_mal", "Label"=>"Mal", "Type"=>"int", "IsForDB"=>true, "Order"=>110, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class ccir_groups_oper_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Operadores por Grupo'; //Titulo de la tabla
        $this->m_classname = 'ccir_groups_oper'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[105] = new col105($this);
        $this->m_cols[106] = new col106($this);
        $this->m_cols[107] = new col107($this);
        $this->m_cols[108] = new col108($this);
        $this->m_cols[109] = new col109($this);
        $this->m_cols[110] = new col110($this);
    }

}

$pg = new ccir_groups_oper_sl();
$pg->CreatePage();

?>
