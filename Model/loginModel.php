<?php
class loginModel extends Model
{
   	function success($data)
   		{
			
                        $dataArray2=array('ip'=>"192.168.5.42",'summary' => "'OR 1--'",'type'=>'88585');
                        $dataArray=array('ip'=>'22','summary' => '33','type'=>'8');
        		$tableName='attempts';
                        $this->insert($tableName,$dataArray2);
                        echo $this->last_insert_id();
                        /*$sql="select * from attempts where ip LIKE  passed";
                        $params=array('passed'=>'%'.$data.'%');
                        $sql=clean::bindparam($sql,$params);
                        $datas=$this->fetch($sql);*/
                        $where = array('ip' => '192.168.5.42');
                        $fields=array('ip','summary');
                        $table='attempts';
                        $this->limit('5');
                        $datas=$this->select($table,$fields,$where);
                        return $datas;
   		}

}
?>
