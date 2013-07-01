<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "ccli_calls.php";

class ccli_calls_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Tipos de Llamados";
        $this->m_classname = "ccli_calls_sl";
        $this->m_obj = new ccli_calls();
        $this->m_page_name = "cli_calls.php";
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

        $this->m_search_fields = array('cli_call_code','cli_call_name','cli_call_status');

        $this->addAction(4,"cli_calls_maint.php?OP=V",array(new caction_param('cli_call_code')),"","ver","V","","");
        $this->addAction(4,"cli_calls_maint.php?OP=M",array(new caction_param('cli_call_code')),"","modificar","M","configuracion.cli_calls.actualizar","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("cli_call_code")->SetDisplayValues(Array("Name"=>"cli_call_code", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Sequence"=>"cli_calls"));
        $this->m_obj->GetField("cli_call_name")->SetDisplayValues(Array("Name"=>"cli_call_name", "Label"=>"Tipo de Llamado", "Size"=>200, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsVisible"=>true));
        $this->m_obj->GetField("cli_call_status")->SetDisplayValues(Array("Name"=>"cli_call_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>103, "Presentation"=>"ESTADO", "IsVisible"=>true));
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
        $this->m_sort_field = 'cli_call_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cli_call_code", "Label"=>"Nro", "Type"=>"int", "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true, "Sequence"=>"cli_calls"));
    }
}

class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Tipo de Llamado';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cli_call_name';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cli_call_name", "Label"=>"Tipo de Llamado", "Size"=>200, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'cli_call_status';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"cli_call_status", "Label"=>"Estado", "Size"=>20, "IsForDB"=>true, "Order"=>103, "Presentation"=>"ESTADO", "IsVisible"=>true));
    }
}

class ccli_calls_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Tipos de Llamados'; //Titulo de la tabla
        $this->m_classname = 'ccli_calls'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
    }

}

$pg = new ccli_calls_sl();
$pg->CreatePage();

?>
