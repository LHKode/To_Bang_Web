<?php
class DataProvider 
{
	public static function ExecuteQuery($sql)
	{
        $host="localhost";
        $user="root";
        $password="";
		$database="db_alldayfolwer";
		
		try{
			$connection = mysqli_connect($host,$user,$password,$database);				
			mysqli_query($connection, "set names 'utf8'");		
			$result = mysqli_query($connection, $sql);		
            mysqli_close($connection);		
			return $result;
		}catch(Exception $ex)
		{
			return null;
		}
	}
}
?>