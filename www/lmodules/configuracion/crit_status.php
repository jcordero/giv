<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "ccrit_status.php";

class ccrit_status_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Estados del Operador";
        $this->m_classname = "ccrit_status_sl";
        $this->m_obj = new ccrit_status();
        $this->m_page_name = "crit_status.php";
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

        $this->m_search_fields = array('crit_status','crit_status_name');

        $this->addAction(3,"crit_status_maint.php?OP=M",array(new caction_param('crit_status')),"","modificar","M","configuracion.crit_status.actualizar","");
        $this->addAction(3,"crit_status_maint.php?OP=B",array(new caction_param('crit_status')),"","eliminar","B","configuracion.crit_status.actualizar","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("crit_status")->SetDisplayValues(Array("Name"=>"crit_status", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsVisible"=>true, "Sequence"=>"crit_status"));
        $this->m_obj->GetField("crit_status_name")->SetDisplayValues(Array("Name"=>"crit_status_name", "Label"=>"Nombre", "Size"=>50, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsVisible"=>true));
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
        $this->m_sort_field = 'crit_status';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_status", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsVisible"=>true, "Sequence"=>"crit_status"));
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
        $this->m_sort_field = 'crit_status_name';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_status_name", "Label"=>"Nombre", "Size"=>50, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Color';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_status_color';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_status_color", "Label"=>"Color", "Size"=>20, "IsForDB"=>true, "Order"=>103, "Presentation"=>"TEXT", "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Color Html';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_status_color_html';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_status_color_html", "Label"=>"Color Html", "Size"=>10, "IsForDB"=>true, "Order"=>104, "Presentation"=>"TEXT", "IsVisible"=>true));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Monitoreos por Semana';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_status_mon_sem';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_status_mon_sem", "Label"=>"Monitoreos por Semana", "Type"=>"int", "IsForDB"=>true, "Order"=>105, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class ccrit_status_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Estados del Operador'; //Titulo de la tabla
        $this->m_classname = 'ccrit_status'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[105] = new col105($this);
    }

}

$pg = new ccrit_status_sl();
$pg->CreatePage();

?>
