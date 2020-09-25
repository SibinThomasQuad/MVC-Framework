<?php
/*ROUTER OF THIS FRAMEWORK*/
class Extract
{
	function params($url_params)
		{
                   $exploded=explode("/",$url_params);
                   $parameters=array();
                   $controllerClass=$exploded[0];
		   $controllerMethod=$exploded[1];
                   $urlParamsCount=count($exploded);
	           for($repeater=0;$repeater<$urlParamsCount;$repeater++)
                   {
                      if($repeater == 0 || $repeater==1)
                      {
                      }
                      else
                      {
                          array_push($parameters,$exploded[$repeater]);
                      }
                   }
                   $route_data=array();
                   $route_data['controllerClass']=$controllerClass;
                   $route_data['controllerMethod']=$controllerMethod;
                   $route_data['controllerParams']=$parameters;
                   return $route_data;

                   
		}

}
class Route
{
	function routing()
        {
                if(empty($_GET))
                {
                $index = url::index();
                	if($index=='')
                		{
				message::EINDEX();
                                exit;
                		} 
                $url_datas=$index;
                }
                else
                {
        	$url_datas=$_GET['EURL434'];
                }
                $routedValue=Extract::params($url_datas);
		return $routedValue;
		
        }
}
?>
