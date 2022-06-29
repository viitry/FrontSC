<?php
function join_database($param)
{
    global $Database;
    $obj = json_decode(file_get_contents($param));
    $Database = new mysqli($obj->db_url, $obj->db_login, $obj->db_password, $obj->db_name, 3306);
    register_shutdown_function('mysqli_close', $Database); 
}

function new_select_fields($field, $table){
    global $Database;

    if (!isset($Database))
	return -1;

    else{
        if (!($result = $Database->query("SELECT $field FROM $table")))
        
        return -1;
    }

    $app = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_free_result($result);
    return($app);
}

function select_fields($table, $id = -1)
{
    global $Database;

    if (!isset($Database))
	return -1;
    
    if ($id == -1)
    {
	if (!($result = $Database->query("SELECT * FROM $table")))
	    return -1;
    }
    else
    {
     	if (!($result = $Database->query("SELECT * FROM $table WHERE id = $id")))
	    return -1;
    }
    $tab = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_free_result($result);
    return($tab);
}

function insert_fields($table, $fields)
{
    //echo "flag1";
    global $Database;
    //echo "flagx";
    if(!isset($Database))
	return -1;

    $string_key = "";
    $string_value = "";
    $bool = false;
    foreach($fields as $k => $v)
    {
	if($bool)

	{
        //echo "flag3";
		$string_key .= ",";
		$string_value .= ",";
            }
	$string_key .= $Database->real_escape_string($k);
	$string_value .= "'" . $Database->real_escape_string($v) . "'";
	$bool = true;
    }
    //echo "INSERT INTO $table ($string_key) VALUES ($string_value)";
    if($result = $Database->query("INSERT INTO $table ($string_key) VALUES ($string_value)"))
    {
    //echo "flag4";
	return (mysqli_insert_id($Database));
    }
    else
	return -1;
}

function edit_fields($table, $fields, $id = -1)
{
    global $Database;

    if(!isset($Database))
	return -1;
    
    $string_final = "";
    $bool = false;

    foreach($fields as $k => $v)
    {
	if($bool)
	{
	    $string_final .= ",";
	}
	$string_final .=  $k . "=" . "'" . $v ."'";
	$bool = true;
    }

    if($id == -1)
    {
	if($result = $Database->query("UPDATE $table SET $string_final"))
	    return 0;
	else
	    return -1;
    }
 
    else
	{
	    if($result = $Database->query("UPDATE $table SET $string_final WHERE $table . id = $id"))
		return(mysqli_insert_id($Database));
	    else
		return -1;
	}    
}

function delete_fields($table, $id)
{
    global $Database;

    if(!isset($Database))
	return -1;
    
   if($result = $Database->query("DELETE FROM $table WHERE $table . id = $id"))
       return(mysqli_insert_id($Database));
    else
	return -1;
}
?>