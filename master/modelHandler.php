<?php
/*MODEL HANDLER OF THIS FRAMEWORK*/
class Model
{
        function __construct()
        {
 		$connectionString=db::connect();
                $this->db = $connectionString;
        }
        function execute($query)
        {
               return $result=mysqli_query($this->db,$query) OR Die(message::EQUERY($query,mysqli_error($this->db)));
        }
        function fetch($query)
	{
		$result=mysqli_query($this->db,$query) OR Die(message::EQUERY($query,mysqli_error($this->db)));
		return mysqli_fetch_all($result, MYSQLI_ASSOC);	
	}
        function limit($limitValue=NULL)
        {
		$this->limitValue = $limitValue;
        }
        function select($table,$selectingFields,$whereCondition=NULL)
        {
        $where="";
        $sqlFields=array_keys($whereCondition);
        if($whereCondition !=NULL)
            {
        $executionCount=0;
            foreach($sqlFields as $fields)
            {   
                 if($executionCount < count($sqlFields)-1)
                 {
                 $cleanedDataWhere=clean::sanitize($whereCondition[$fields]);
                 $where.="$fields = '$cleanedDataWhere' AND ";
                 }
                 if($executionCount == count($sqlFields)-1)
                 {
                 $cleanedDataWhere=clean::sanitize($whereCondition[$fields]);
                 $where.="$fields = '$cleanedDataWhere'";
                 }
            $executionCount++;
             }    
            }
            if($selectingFields=='*')
            {
            $query="select * from $table";
            }
            else
            {
		$selectingFields=implode(",",$selectingFields);
                $query="select $selectingFields from $table";
            }
            if($whereCondition !=NULL)
            {
		$query.=' WHERE '.$where;
            }
            if(isset($this->limitValue))
            {
		$query.=' LIMIT '.$this->limitValue;
            }
            $result=mysqli_query($this->db,$query) OR Die(message::EQUERY($query,mysqli_error($this->db)));
	    return mysqli_fetch_all($result, MYSQLI_ASSOC);	
        
        }
        function insert($tableName,$dataArray)
        {
            $sqlFields=array_keys($dataArray);
            $fieldNames="";
            $fieldValues="";
            $executionCount=0;
            foreach($sqlFields as $fields)
            {   
                 if($executionCount < count($sqlFields)-1)
                 {
                 $cleanedData=clean::sanitize($dataArray[$fields]);
                 $fieldValues.="'$cleanedData',";
                 $fieldNames.="$fields,";
                 }
                 if($executionCount == count($sqlFields)-1)
                 {
                 $cleanedData=clean::sanitize($dataArray[$fields]);
                 $fieldValues.="'$cleanedData'";
                 $fieldNames.="$fields";
                 }
            $executionCount++;
                 
            }
            $query="insert into $tableName ($fieldNames) VALUES ($fieldValues)";
            if ($reslt=mysqli_query($this->db,$query)) 
	    {
  	    $last_id = mysqli_insert_id($this->db);
  	    $this->last_insert=$last_id;
            return $reslt;
            }
            else
            {
                message::EQUERY($query,mysqli_error($this->db));
            }
        }
	function last_insert_id()
        {
		return $this->last_insert;
        }
        function update($tableName,$updateValue,$whereCondition)
        {
            $sqlFields=array_keys($whereCondition);
            $sqlFieldsUpdate=array_keys($updateValue);
            $where="";
            $set="";
            $executionCountValue=0;
            foreach($sqlFieldsUpdate as $updateFields)
            {    
		if($executionCountValue < count($sqlFieldsUpdate)-1)
                 {
                 $cleanedData=clean::sanitize($updateValue[$updateFields]);
                 $set.="$updateFields = '$cleanedData',";
                 }
                 if($executionCountValue == count($sqlFieldsUpdate)-1)
                 {
                 $cleanedData=clean::sanitize($updateValue[$updateFields]);
                 $set.="$updateFields = '$cleanedData'";
                 }
            $executionCountValue++;
            }
            $executionCount=0;
            foreach($sqlFields as $fields)
            {   
                 if($executionCount < count($sqlFields)-1)
                 {
                 $cleanedDataWhere=clean::sanitize($whereCondition[$fields]);
                 $where.="$fields = '$cleanedDataWhere' AND ";
                 }
                 if($executionCount == count($sqlFields)-1)
                 {
                 $cleanedDataWhere=clean::sanitize($whereCondition[$fields]);
                 $where.="$fields = '$cleanedDataWhere'";
                 }
            $executionCount++;
                 
            }
            $query="UPDATE $tableName SET $set WHERE $where";
            return $result=mysqli_query($this->db,$query) OR Die(message::EQUERY($query,mysqli_error($this->db)));
            
        }
        function delete($tableName,$whereCondition)
        {
            $sqlFields=array_keys($whereCondition);
            $where="";
            $executionCount=0;
            foreach($sqlFields as $fields)
            {   
                 if($executionCount < count($sqlFields)-1)
                 {
                 $cleanedDataWhere=clean::sanitize($whereCondition[$fields]);
                 $where.="$fields = '$cleanedDataWhere' AND ";
                 }
                 if($executionCount == count($sqlFields)-1)
                 {
                 $cleanedDataWhere=clean::sanitize($whereCondition[$fields]);
                 $where.="$fields = '$cleanedDataWhere'";
                 }
            $executionCount++;
                 
            }
            $query="DELETE FROM $tableName WHERE $where";
            return $result=mysqli_query($this->db,$query) OR Die(message::EQUERY($query,mysqli_error($this->db)));
        }
}
?>
