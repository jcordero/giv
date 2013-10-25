<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "cdes_circuito.php";

class cdes_circuito_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Desempeño por Circuito";
        $this->m_classname = "cdes_circuito_sl";
        $this->m_obj = new cdes_circuito();
        $this->m_page_name = "des_circuito.php";
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

        $this->m_search_fields = array('cir_code');

        $this->addAction(2,"/lmodules/reportes/des_circuito_superv.php?OP=L",array(new caction_param('cir_code')),"","por supervisor","L","","/lmodules/reportes/des_circuito.php?last=1&OP=L");
        $this->addAction(2,"/lmodules/reportes/des_circuito_oper.php?OP=L",array(new caction_param('cir_code')),"","por operador","L","","/lmodules/reportes/des_circuito.php?last=1&OP=L");
        $this->addAction(2,"/lmodules/monitoreos/monitoreos.php?OP=L",array(new caction_param('cir_code')),"","ver monitoreos","L","","/lmodules/reportes/des_circuito.php?last=1&OP=L");
        $this->addAction(2,"/lmodules/monitoreos/monitoreos_superv.php?OP=L",array(new caction_param('cir_code')),"","monitorear","L","","/lmodules/reportes/des_circuito.php?last=1&OP=L");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"INT", "IsForDB"=>true, "Order"=>1, "Presentation"=>"CIRCUITOS", "IsVisible"=>true));
    }

}


class col1 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Circuito';
        $this->m_order = '1';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"INT", "IsForDB"=>true, "Order"=>1, "Presentation"=>"CIRCUITOS", "IsVisible"=>true));
    }
}

class col2 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. Pend.';
        $this->m_order = '2';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_pendientes';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_pendientes", "Label"=>"Mon. Pend.", "Type"=>"INT", "IsForDB"=>true, "Order"=>2, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col3 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. Realiz';
        $this->m_order = '3';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_realizados';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_realizados", "Label"=>"Mon. Realiz", "Type"=>"INT", "IsForDB"=>true, "Order"=>3, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col4 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. OK';
        $this->m_order = '4';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_ok';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_ok", "Label"=>"Mon. OK", "Type"=>"INT", "IsForDB"=>true, "Order"=>4, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col5 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. Mal';
        $this->m_order = '5';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_mal';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_mal", "Label"=>"Mon. Mal", "Type"=>"INT", "IsForDB"=>true, "Order"=>5, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col10 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Cierre Forzado';
        $this->m_order = '10';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_cierre_forz';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_cierre_forz", "Label"=>"Cierre Forzado", "Type"=>"INT", "IsForDB"=>true, "Order"=>10, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col6 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Capac. Pend.';
        $this->m_order = '6';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_cap_pendientes';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_cap_pendientes", "Label"=>"Capac. Pend.", "Type"=>"INT", "IsForDB"=>true, "Order"=>6, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col7 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Capac. Realiz';
        $this->m_order = '7';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_cap_realizados';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_cap_realizados", "Label"=>"Capac. Realiz", "Type"=>"INT", "IsForDB"=>true, "Order"=>7, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class cdes_circuito_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Desempeño por Circuito'; //Titulo de la tabla
        $this->m_classname = 'cdes_circuito'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[1] = new col1($this);
        $this->m_cols[2] = new col2($this);
        $this->m_cols[3] = new col3($this);
        $this->m_cols[4] = new col4($this);
        $this->m_cols[5] = new col5($this);
        $this->m_cols[10] = new col10($this);
        $this->m_cols[6] = new col6($this);
        $this->m_cols[7] = new col7($this);
    }

}

$pg = new cdes_circuito_sl();
$pg->CreatePage();

?>
