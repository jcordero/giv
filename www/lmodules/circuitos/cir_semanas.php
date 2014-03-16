<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "ccir_semanas.php";

class ccir_semanas_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Semanas del Circuito";
        $this->m_classname = "ccir_semanas_sl";
        $this->m_obj = new ccir_semanas();
        $this->m_page_name = "cir_semanas.php";
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

        $this->m_search_fields = array('cir_code','cir_semana','cir_date');

    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"CIRCUITO", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("cir_semana")->SetDisplayValues(Array("Name"=>"cir_semana", "Label"=>"Semana", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"INT", "IsVisible"=>true));
        $this->m_obj->GetField("cir_date")->SetDisplayValues(Array("Name"=>"cir_date", "Label"=>"Fecha Aprox", "Type"=>"datetime", "IsPK"=>true, "IsForDB"=>true, "Order"=>103, "Presentation"=>"DATERANGE", "IsVisible"=>true));
    }

}


class col101 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Circuito';
        $this->m_order = '101';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"CIRCUITO", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Semana';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_semana';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_semana", "Label"=>"Semana", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"INT", "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Fecha Aprox';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_date';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_date", "Label"=>"Fecha Aprox", "Type"=>"datetime", "IsPK"=>true, "IsForDB"=>true, "Order"=>103, "Presentation"=>"DATERANGE", "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Fecha INI';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_date_ini';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_date_ini", "Label"=>"Fecha INI", "Type"=>"datetime", "IsForDB"=>true, "Order"=>104, "Presentation"=>"DATE", "IsVisible"=>true));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Fecha FIN';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_date_fin';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_date_fin", "Label"=>"Fecha FIN", "Type"=>"datetime", "IsForDB"=>true, "Order"=>105, "Presentation"=>"DATE", "IsVisible"=>true));
    }
}

class ccir_semanas_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Semanas del Circuito'; //Titulo de la tabla
        $this->m_classname = 'ccir_semanas'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[105] = new col105($this);
    }

}

$pg = new ccir_semanas_sl();
$pg->CreatePage();

?>
