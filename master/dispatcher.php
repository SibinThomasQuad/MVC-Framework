<?php
/*DISPATCHER OF THIS FRAMEWORK*/
class Controller
{
        /*This class will handle the controller like
        Controller to View and Controller to MOdel*/
        function loadModel($modelPage,$data=NULL)
	{
          require_once('Model/'.$modelPage.'.php'); 
          return $modelObject = new $modelPage();
        }
        function params($data)
        {
	      $this->data=$data;
        }
	function loadView($viewPage,$data=NULL)
	{
               $this->params($data);
               require_once('View/'.$viewPage.'.php');
        }
}
class Dispatch
{
        /*This class will find the controller Class and method and 
        pass the url parameters to the Controller*/ 
	function findController($essentialData)
        {
	  	$controllerClass=$essentialData['controllerClass'];
		$controllerMethod=$essentialData['controllerMethod'];
                $passedData=$essentialData['controllerParams'];
                require_once('Controller/'.$controllerClass.'.php');
		$controllerObj = new $controllerClass();
                if(method_exists($controllerObj,$controllerMethod))
                {
                	call_user_func_array(array($controllerObj, $controllerMethod),$passedData);
                } 
                else
                {
		 	Message::E404();
                }
	}

}
?>
