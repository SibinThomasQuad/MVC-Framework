<?php
class validation
{
	function required($string)
        {
           if($string=='')
           {
		return false;
           }
           else 
           {
               return true;
           }
        }
	function email($string)
        {
 		   if (!filter_var($string, FILTER_VALIDATE_EMAIL)) 
		   {
    			return false;
                   }
		   else
                   {
			return true;
 		   }
        }
        function max($string,$length)
        {
	 	$stringLength=strlen($string);
		if($stringLength > $length)
		{
		 	return false;
		}
		else
                {
			return true;
		}
        }
	function min($string,$length)
	{
		$stringLength=strlen($string);
		if($stringLength < $length)
		{
			return false;
		}
		else
  		{
			return true;
		}
        }
        function number($string)
        {
		if(is_numeric($string))
		{
			return true;
		}
		else
		{
			return false;
		}
        }
	function alphabet($string)
	{
		if(ctype_alpha($string))
			{
    				return true;
			}
		else
			{
				return false;
			}
	}
	function ip($ip)
		{
			if (!filter_var($ip, FILTER_VALIDATE_IP) === false) { 
    				return true; 
			} else { 
    			return false; 
			} 
		}
	function url($url)
		{
			if (!filter_var($url, FILTER_VALIDATE_URL) === false) { 
    			return true;
			} else { 
   			 return false; 
			} 
		}
}
?>
