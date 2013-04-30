<?php
/* Pagina de listado generada automaticamente
 * Compilador PHPClass Version 2.6.18 (01/MAR/2012) UTF-8 / www.CommSys.com.ar
 */
include_once "common/csearchandlist.php";

//Clases involucradas en esta pagina
include_once "cmonitoreo.php";

class cmonitoreo_sl extends csearchandlist {
    function __construct() {
        parent::__construct();
        $this->m_title = "Estado de Monitoreo";
        $this->m_classname = "cmonitoreo_sl";
        $this->m_obj = new cmonitoreo();
        $this->m_page_name = "monitoreo.php";
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

        $this->m_search_fields = array('color','color_html','monitoreos_semanales','descripcion');

        $this->addAction(5,"monitoreo_maint.php.php?OP=V",array(new caction_param('id_estado_de_monitoreo')),"","ver","V","","");
        $this->addAction(5,"monitoreo_maint_b.php?OP=M",array(new caction_param('id_estado_de_monitoreo')),"","baja","M","","");
        $this->addAction(5,"monitoreo_maint.php.php?OP=M",array(new caction_param('id_estado_de_monitoreo')),"","modificacion","M","","");
    }

    //Inicializo la parte de busqueda
    public function InitializeSearch($cn) {
        //SetDisplayValues($attributes) 

    /* Campos de busqueda */
        $this->m_obj->GetField("color")->SetDisplayValues(Array("Name"=>"color", "Label"=>"Color", "Size"=>50, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("color_html")->SetDisplayValues(Array("Name"=>"color_html", "Label"=>"Color Hexa", "Size"=>50, "IsForDB"=>true, "Order"=>103, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("monitoreos_semanales")->SetDisplayValues(Array("Name"=>"monitoreos_semanales", "Label"=>"Numero", "Type"=>"tinyint", "IsForDB"=>true, "Order"=>104, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
        $this->m_obj->GetField("descripcion")->SetDisplayValues(Array("Name"=>"descripcion", "Label"=>"Descripcion", "Size"=>50, "IsForDB"=>true, "Order"=>105, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
    }

}


class col102 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Color';
        $this->m_order = '102';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'color';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"color", "Label"=>"Color", "Size"=>50, "IsForDB"=>true, "Order"=>102, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col103 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Color Hexa';
        $this->m_order = '103';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'color_html';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"color_html", "Label"=>"Color Hexa", "Size"=>50, "IsForDB"=>true, "Order"=>103, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col104 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Numero';
        $this->m_order = '104';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'monitoreos_semanales';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"monitoreos_semanales", "Label"=>"Numero", "Type"=>"tinyint", "IsForDB"=>true, "Order"=>104, "Presentation"=>"INT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class col105 extends ccolumn
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Descripcion';
        $this->m_order = '105';
        $this->m_isvisible = true;
        $this->m_align = 'left';
        $this->m_sort_field = 'descripcion';
        $this->m_width = '';

        //Campos de la columna
         $this->m_fields[] = new CField(Array("Name"=>"descripcion", "Label"=>"Descripcion", "Size"=>50, "IsForDB"=>true, "Order"=>105, "Presentation"=>"TEXT", "IsNullable"=>false, "IsVisible"=>true));
    }
}

class cmonitoreo_table extends ctable
{
    function __construct($parent)
    {
        parent::__construct($parent);
        $this->m_title = 'Estado de Monitoreo'; //Titulo de la tabla
        $this->m_classname = 'cmonitoreo'; //Clase contenedora de datos
        $this->m_total = false; //Incluir ultima fila de totales

        //Agrego las columnas a la tabla
        $this->m_cols[102] = new col102($this);
        $this->m_cols[103] = new col103($this);
        $this->m_cols[104] = new col104($this);
        $this->m_cols[105] = new col105($this);
    }

}

$pg = new cmonitoreo_sl();
$pg->CreatePage();

?>
