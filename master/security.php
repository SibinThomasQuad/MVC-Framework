<?php
class clean
{
	function xss($string)
		{
			$cleaned=htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
			return $cleaned;
		}
	function html($string)
		{
			return filter_var($string, FILTER_SANITIZE_STRING); 
                }
	function url($url)
		{
			$url = filter_var($url, FILTER_SANITIZE_URL); 
			return $url;
		}
        function sanitize($string)
                {
                         return addslashes($string);
                        
                }
        function numbers($number)
         	{
			$number=preg_replace('/\D/', '', $number);
			return $number;
		}
	function bindparam($query,$parameters)
		{
                $sqlFields=array_keys($parameters);
		foreach($sqlFields as $fields)
            		{
				
				$paramValue=$parameters[$fields];
                                $paramValue=addslashes($paramValue);
				$query=str_replace($fields,"'".$paramValue."'",$query);
			}
                return $query;
		
	
	        }
}
?>
