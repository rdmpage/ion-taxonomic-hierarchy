<?php

// Make graph

$filename = 'nodes.txt';


$nodes = array();
$edges = array();

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$parts = explode("\t", fgets($file_handle));
	
	$nodes[$parts[0]] = $parts[3];
	
	if ($parts[1] != 'NULL')
	{
		$edges[] = array($parts[0], $parts[1]);
	}
}

echo "graph\n[directed 1\n";

foreach ($nodes as $k => $v)
{
	echo 'node [ id ' . $k . ' label "' . $v . '" ]' . "\n";
}

foreach ($edges as $edge)
{
	echo 'edge [ source ' . $edge[1] . ' target ' . $edge[0]. ' ]' . "\n";
}
echo "]\n";


?>
