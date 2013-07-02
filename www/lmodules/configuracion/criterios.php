<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "ccriterios.php";

class ccriterios_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Criterios";
        $this->m_classname = "ccriterios_sl";
        $this->m_obj = new ccriterios();
        $this->m_page_name = "criterios.php";
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

        $this->m_search_fields = array('crit_code','crit_oper_status_ini','crit_oper_status_fin');

        $this->addAction(4,"criterios_maint.php?OP=M",array(new caction_param('crit_code')),"","modificar","M","configuracion.criterios.actualizar","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("crit_code")->SetDisplayValues(Array("Name"=>"crit_code", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "Sequence"=>"criterios"));
        $this->m_obj->GetField("crit_oper_status_ini")->SetDisplayValues(Array("Name"=>"crit_oper_status_ini", "Label"=>"Estado Inicial", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
        $this->m_obj->GetField("crit_oper_status_fin")->SetDisplayValues(Array("Name"=>"crit_oper_status_fin", "Label"=>"Estado Final", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
    }

}


class col101 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Nro';
        $this->m_order = '101';
        $this->m_isvisible = false;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_code", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "Sequence"=>"criterios"));
    }
}

class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado Inicial';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_oper_status_ini';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_oper_status_ini", "Label"=>"Estado Inicial", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. erróneos Desde';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_cant_mal_desde';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_cant_mal_desde", "Label"=>"Mon. erróneos Desde", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. erróneos Hasta';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_cant_mal_hasta';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_cant_mal_hasta", "Label"=>"Mon. erróneos Hasta", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado Final';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_oper_status_fin';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_oper_status_fin", "Label"=>"Estado Final", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
    }
}

class ccriterios_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Criterios'; //Titulo de la tabla
        $this->m_classname = 'ccriterios'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[105] = new col105($this);
        $this->m_cols[103] = new col103($this);
    }

}

$pg = new ccriterios_sl();
$pg->CreatePage();

?>
