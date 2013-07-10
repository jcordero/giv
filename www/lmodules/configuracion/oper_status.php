<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "coper_status.php";

class coper_status_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Listado de Operadores";
        $this->m_classname = "coper_status_sl";
        $this->m_obj = new coper_status();
        $this->m_page_name = "oper_status.php";
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

        $this->m_search_fields = array('use_code','crit_status','oper_grupo','oper_nuevo');

        $this->addAction(5,"oper_status_maint.php?OP=V",array(new caction_param('use_code')),"","ver","V","","");
        $this->addAction(5,"oper_status_maint.php?OP=M",array(new caction_param('use_code')),"","modificar","M","","");
        $this->addAction(5,"/modules/security/users_maint.php?OP=V",array(new caction_param('use_code')),"","usuario","V","","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("use_code")->SetDisplayValues(Array("Name"=>"use_code", "Label"=>"Nro", "Size"=>50, "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"OPERADOR", "IsVisible"=>true));
        $this->m_obj->GetField("crit_status")->SetDisplayValues(Array("Name"=>"crit_status", "Label"=>"Estado Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
        $this->m_obj->GetField("oper_grupo")->SetDisplayValues(Array("Name"=>"oper_grupo", "Label"=>"Grupo", "Size"=>50, "IsForDB"=>true, "Order"=>103, "ValueList"=>"oper_grupo", "Presentation"=>"SELECT", "IsVisible"=>true));
        $this->m_obj->GetField("oper_nuevo")->SetDisplayValues(Array("Name"=>"oper_nuevo", "Label"=>"Nuevo", "Size"=>2, "IsForDB"=>true, "Order"=>104, "Presentation"=>"SINO", "IsVisible"=>true));
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
        $this->m_sort_field = 'use_code';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"use_code", "Label"=>"Nro", "Size"=>50, "IsPK"=>true, "IsForDB"=>true, "Order"=>101, "Presentation"=>"OPERADOR", "IsVisible"=>true));
    }
}

class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado Operador';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'crit_status';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"crit_status", "Label"=>"Estado Operador", "Type"=>"int", "IsForDB"=>true, "Order"=>102, "Presentation"=>"CRIT_STATUS", "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Grupo';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'oper_grupo';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"oper_grupo", "Label"=>"Grupo", "Size"=>50, "IsForDB"=>true, "Order"=>103, "ValueList"=>"oper_grupo", "Presentation"=>"SELECT", "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Nuevo';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'oper_nuevo';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"oper_nuevo", "Label"=>"Nuevo", "Size"=>2, "IsForDB"=>true, "Order"=>104, "Presentation"=>"SINO", "IsVisible"=>true));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Hora Ingreso';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'oper_hora_in';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"oper_hora_in", "Label"=>"Hora Ingreso", "Size"=>10, "IsForDB"=>true, "Order"=>105, "Presentation"=>"TEXT", "IsVisible"=>true, "Cols"=>8));
    }
}

class col106 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Hora Egreso';
        $this->m_order = '106';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'oper_hora_out';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"oper_hora_out", "Label"=>"Hora Egreso", "Size"=>10, "IsForDB"=>true, "Order"=>106, "Presentation"=>"TEXT", "IsVisible"=>true, "Cols"=>8));
    }
}

class coper_status_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Listado de Operadores'; //Titulo de la tabla
        $this->m_classname = 'coper_status'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[101] = new col101($this);
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[105] = new col105($this);
        $this->m_cols[106] = new col106($this);
    }

}

$pg = new coper_status_sl();
$pg->CreatePage();

?>
