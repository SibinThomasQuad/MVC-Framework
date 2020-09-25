<?php
class master extends Controller
{
        function __construct()
        {
          $modelObject=$this->loadModel('loginModel');
          $this->object_model=$modelObject;
          session::load();
        }
	function masterdata($data,$data2,$data3)
        {
                $this->loadView('login',$data);
        } 
}
?>
