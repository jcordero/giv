<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "cdes_circuito_superv.php";

class cdes_circuito_superv_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Desempeño por Supervisor";
        $this->m_classname = "cdes_circuito_superv_sl";
        $this->m_obj = new cdes_circuito_superv();
        $this->m_page_name = "des_circuito_superv.php";
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

        $this->m_search_fields = array('cir_code','use_code_supervisor');

        $this->addAction(3,"/lmodules/reportes/des_circuito_oper.php?OP=L",array(new caction_param('cir_code'),new caction_param('use_code_supervisor')),"","por operador","L","","/lmodules/reportes/des_circuito_superv.php?last=1&OP=L");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cir_code")->SetDisplayValues(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"INT", "IsForDB"=>true, "Order"=>1, "Presentation"=>"CIRCUITOS", "IsVisible"=>true));
        $this->m_obj->GetField("use_code_supervisor")->SetDisplayValues(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"INT", "IsForDB"=>true, "Order"=>2, "Presentation"=>"SUPERVISOR", "IsVisible"=>true));
    }

}


class col1 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Circuito';
        $this->m_order = '1';
        $this->m_isvisible = false;
        $this->m_align = 'left';
        $this->m_sort_field = 'cir_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cir_code", "Label"=>"Circuito", "Type"=>"INT", "IsForDB"=>true, "Order"=>1, "Presentation"=>"CIRCUITOS"));
    }
}

class col2 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Supervisor Asignado';
        $this->m_order = '2';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'use_code_supervisor';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code_supervisor", "Label"=>"Supervisor Asignado", "Type"=>"INT", "IsForDB"=>true, "Order"=>2, "Presentation"=>"SUPERVISOR", "IsVisible"=>true));
    }
}

class col12 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Promedio';
        $this->m_order = '12';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_puntaje_prom';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_puntaje_prom", "Label"=>"Promedio", "Type"=>"FLOAT", "IsForDB"=>true, "Order"=>12, "Presentation"=>"FLOAT", "IsVisible"=>true));
    }
}

class col3 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. Pend.';
        $this->m_order = '3';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_pendientes';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_pendientes", "Label"=>"Mon. Pend.", "Type"=>"INT", "IsForDB"=>true, "Order"=>3, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col4 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. Realiz';
        $this->m_order = '4';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_realizados';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_realizados", "Label"=>"Mon. Realiz", "Type"=>"INT", "IsForDB"=>true, "Order"=>4, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col5 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. OK';
        $this->m_order = '5';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_ok';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_ok", "Label"=>"Mon. OK", "Type"=>"INT", "IsForDB"=>true, "Order"=>5, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col6 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Mon. Mal';
        $this->m_order = '6';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_mal';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_mal", "Label"=>"Mon. Mal", "Type"=>"INT", "IsForDB"=>true, "Order"=>6, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col11 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Cierre Forzado';
        $this->m_order = '11';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_mon_cierre_forz';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_mon_cierre_forz", "Label"=>"Cierre Forzado", "Type"=>"INT", "IsForDB"=>true, "Order"=>11, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col7 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Capac. Pend.';
        $this->m_order = '7';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_cap_pendientes';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_cap_pendientes", "Label"=>"Capac. Pend.", "Type"=>"INT", "IsForDB"=>true, "Order"=>7, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col8 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Capac. Realiz';
        $this->m_order = '8';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_cap_realizados';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_cap_realizados", "Label"=>"Capac. Realiz", "Type"=>"INT", "IsForDB"=>true, "Order"=>8, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col9 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Capac. OK';
        $this->m_order = '9';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_cap_ok';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_cap_ok", "Label"=>"Capac. OK", "Type"=>"INT", "IsForDB"=>true, "Order"=>9, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class col10 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Capac. Mal';
        $this->m_order = '10';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cirg_cant_cap_mal';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cirg_cant_cap_mal", "Label"=>"Capac. Mal", "Type"=>"INT", "IsForDB"=>true, "Order"=>10, "Presentation"=>"INT", "IsVisible"=>true, "total"=>true));
    }
}

class cdes_circuito_superv_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Desempeño por Supervisor'; //Titulo de la tabla
        $this->m_classname = 'cdes_circuito_superv'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[1] = new col1($this);
        $this->m_cols[2] = new col2($this);
        $this->m_cols[12] = new col12($this);
        $this->m_cols[3] = new col3($this);
        $this->m_cols[4] = new col4($this);
        $this->m_cols[5] = new col5($this);
        $this->m_cols[6] = new col6($this);
        $this->m_cols[11] = new col11($this);
        $this->m_cols[7] = new col7($this);
        $this->m_cols[8] = new col8($this);
        $this->m_cols[9] = new col9($this);
        $this->m_cols[10] = new col10($this);
    }

}

$pg = new cdes_circuito_superv_sl();
$pg->CreatePage();

?>
