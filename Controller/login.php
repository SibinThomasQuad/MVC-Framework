<?php
class Login extends Controller
{
        function __construct()
        {
          $modelObject=$this->loadModel('loginModel');
          $this->object_model=$modelObject;
        }
	function logins()
        {
                $posted=request::post('pass');
		$datas=$this->object_model->success($posted);
		print_r($datas);
        } 
}
?>
