<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "cmonitoreo_item.php";

class cmonitoreo_item_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Item a monitoreaer";
        $this->m_classname = "cmonitoreo_item_sl";
        $this->m_obj = new cmonitoreo_item();
        $this->m_page_name = "monitoreo_item.php";
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

        $this->m_search_fields = array('titulo','nivel_de_determinacion','orden');

        $this->addAction(4,"monitoreo_item_maint.php?OP=V",array(new caction_param('id_item_a_monitorear')),"","ver","V","","");
        $this->addAction(4,"monitoreo_item_maint_b.php?OP=M",array(new caction_param('id_item_a_monitorear')),"","baja","M","","");
        $this->addAction(4,"monitoreo_item_maint.php?OP=M",array(new caction_param('id_item_a_monitorear')),"","modificacion","M","","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("titulo")->SetDisplayValues(Array("Name"=>"titulo", "Label"=>"titulo", "Size"=>50, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("nivel_de_determinacion")->SetDisplayValues(Array("Name"=>"nivel_de_determinacion", "Label"=>"Nivel", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("orden")->SetDisplayValues(Array("Name"=>"orden", "Label"=>"orden", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
    }

}


class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'titulo';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'titulo';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"titulo", "Label"=>"titulo", "Size"=>50, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Nivel';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'nivel_de_determinacion';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"nivel_de_determinacion", "Label"=>"Nivel", "Type"=>"int", "IsForDB"=>true, "Order"=>103, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'orden';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'orden';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"orden", "Label"=>"orden", "Type"=>"int", "IsForDB"=>true, "Order"=>104, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class cmonitoreo_item_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Item a monitoreaer'; //Titulo de la tabla
        $this->m_classname = 'cmonitoreo_item'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
        $this->m_cols[104] = new col104($this);
    }

}

$pg = new cmonitoreo_item_sl();
$pg->CreatePage();

?>
