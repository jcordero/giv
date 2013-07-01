<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "citems.php";

class citems_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Items a Monitorear";
        $this->m_classname = "citems_sl";
        $this->m_obj = new citems();
        $this->m_page_name = "items.php";
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

        $this->m_search_fields = array('it_code','it_name','it_order','it_importance','it_status');

        $this->addAction(6,"items_maint.php?OP=V",array(new caction_param('it_code')),"","ver","V","","");
        $this->addAction(6,"items_maint.php?OP=M",array(new caction_param('it_code')),"","modificar","M","configuracion.items.actualizar","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("it_code")->SetDisplayValues(Array("Name"=>"it_code", "Label"=>"Item Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Sequence"=>"items"));
        $this->m_obj->GetField("it_name")->SetDisplayValues(Array("Name"=>"it_name", "Label"=>"Nombre del Item", "Size"=>200, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("it_order")->SetDisplayValues(Array("Name"=>"it_order", "Label"=>"Orden", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"INT", "IsVisible"=>true));
        $this->m_obj->GetField("it_importance")->SetDisplayValues(Array("Name"=>"it_importance", "Label"=>"Importancia", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
        $this->m_obj->GetField("it_status")->SetDisplayValues(Array("Name"=>"it_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>105, "Presentation"=>"ESTADO", "IsVisible"=>true));
    }

}


class col101 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Item Nro';
        $this->m_order = '101';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'it_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"it_code", "Label"=>"Item Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Sequence"=>"items"));
    }
}

class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Nombre del Item';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'it_name';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"it_name", "Label"=>"Nombre del Item", "Size"=>200, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Orden';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'it_order';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"it_order", "Label"=>"Orden", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Importancia';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'it_importance';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"it_importance", "Label"=>"Importancia", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'it_status';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"it_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>105, "Presentation"=>"ESTADO", "IsVisible"=>true));
    }
}

class citems_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Items a Monitorear'; //Titulo de la tabla
        $this->m_classname = 'citems'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[105] = new col105($this);
    }

}

$pg = new citems_sl();
$pg->CreatePage();

?>
