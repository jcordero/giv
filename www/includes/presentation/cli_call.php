<?php 
include_once "presentation/select.php";
class CDH_CLI_CALL  extends CDH_SELECT 
{
	function __construct($parent) 
	{

		parent::__construct($parent);
		$this->m_parent->m_search="fix";
		$this->m_helper_sql="SELECT cli_call_name FROM cli_calls WHERE cli_call_code='<val>'";
		$this->m_fill_sql="SELECT  cli_call_name,cli_call_code FROM cli_calls order by cli_call_name";
	}
	

}

?>

