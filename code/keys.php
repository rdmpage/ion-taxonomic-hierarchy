<?php

$count = 1;
$keys = array();
$key_to_id = array();

$filename = 'names.txt';


$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$parts = explode("\t", fgets($file_handle));
	
	$key = $parts[2];
	
	if (!in_array($key, $keys))
	{
		$keys[$count] = $key;
		$key_to_id[$key] = $count;
		$count++;
	}
}

fclose($file_handle);

//print_r($keys);

foreach ($keys as $k => $v)
{
	echo 'UPDATE names_groups SET id=' . $k . ' WHERE `key`="' . $v . '";' . "\n";
}

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$parts = explode("\t", fgets($file_handle));
	
	$key = $parts[2];
	$parent_key = $parts[5];
	
	$p = $key_to_id[$parent_key];
	
	echo 'UPDATE names_groups SET parent_id=' . $p . ' WHERE `key`="' . $key . '";' . "\n";	

}

?>



