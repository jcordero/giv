<?php 

if(!class_exists('who_bind'))
{
	class who_bind
	{
		public function Render($context)
		{
			global $sess,$primary_db;
            $user_id = $sess->user_id;				
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
