<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "ccir_groups.php";

class ccir_groups_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Asignaciones por Circuito";
        $this->m_classname = "ccir_groups_sl";
        $this->m_obj = new ccir_groups();
        $this->m_page_name = "cir_groups.php";
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

        $this->m_search_fields = array('cir_code','cirg_code','use_code_supervisor','oper_grupo');

        $this->addAction(5,"cir_groups_v_maint.php?OP=V",array(new caction_param('cirg_code')),"","ver","V","","");
        $this->addAction(5,"cir_groups_maint.php?OP=M",array(new caction_param('cirg_code')),"","modificar","M","circuitos.cir_groups.actualizar","");
        $this->addAction(5,"cir_groups_maint.php?OP=B",array(new caction_param('cirg_code')),"","eliminar","B","circuitos.cir_groups.actualizar","");
        $this->addAction(5,"cir_groups_oper.php?OP=L",array(new caction_param('cirg_code')),"","operadores","L","circuitos.cir_groups","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CIRCUITOS", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("cirg_code")->SetDisplayValues(Array("Name"=>"cirg_code", "Label"=>"Grupo Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Sequence"=>"cir_groups"));
        $this->m_obj->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("oper_grupo")->SetDisplayValues(Array("Name"=>"oper_grupo", "Label"=>"Grupo", "Size"=>20, "IsForDB"=>true, "Order"=>104, "ValueList"=>"oper_grupo", "Presentation"=>"SELECT", "IsNullable"=>false, "IsVisible"=>true));
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
         $this->m_fields[] = new CField(Array("Name"=>"cirg_code", "Label"=>"Grupo Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Sequence"=>"cir_groups"));
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

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Supervisor';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'use_code_supervisor';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"SUPERVISOR", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Grupo';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'oper_grupo';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"oper_grupo", "Label"=>"Grupo", "Size"=>20, "IsForDB"=>true, "Order"=>104, "ValueList"=>"oper_grupo", "Presentation"=>"SELECT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class ccir_groups_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Asignaciones por Circuito'; //Titulo de la tabla
        $this->m_classname = 'ccir_groups'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
        $this->m_cols[104] = new col104($this);
    }

}

$pg = new ccir_groups_sl();
$pg->CreatePage();

?>
