<?php 

if(!class_exists('who_bind'))
{
	class who_bind
	{
		public function Render($context)
		{
			global $sess,$primary_db;
            $user_id = $sess->user_id;	
            if ($_SESSION["USE_STATUS"]=="")
            {
	            $sql = "SELECT use_status FROM sec_users WHERE use_code='".$sess->user_id."'";
	            $use_status = $primary_db->QueryString($sql);
				if ($use_status!='ACTIVO')
				{
						$salir = WEB_PATH.'/modules/security/logout.php';
						header("Location: $salir");
						exit();									
				}
				
				$_SESSION["USE_STATUS"]=$use_status;
            }					
			$grp = "";
			foreach(explode(",",$_SESSION["groups"]) as $grp_name)
			{
				$grp_name = strtolower(trim($grp_name));
				$grp.= $grp_name." ";
			}
			$html = '
			<div id="who">
				<span id="userName">'.$sess->user_name.'</span>
				<br>  
				<span id="userGroup">'.$grp.'</span>
			</div>';		
			$content["who_bind"] = $html;
			return array( $content, array() );
		}
	}
}

?>	
