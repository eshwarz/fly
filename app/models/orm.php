<?php
function select ($table, $conditions)
{
	// connection string from global varialble
	$con = $GLOBALS['con'];
	
	// sql statement without any conditions
	$sql = "SELECT * FROM ".$table;
	
	// attaching conditions to the sql statement
	if ($conditions['where'])
		$sql .= ' WHERE '.$conditions['where'];
	if ($conditions['order'])
		$sql .= ' ORDER BY '.$conditions['order'];
	if ($conditions['limit'])
		$sql .= ' LIMIT '.$conditions['limit'];

	$result = mysql_query($sql, $con);
	$records;
	while ($row = mysql_fetch_array($result))
	{
		$records[] = $row;
	}

	return $records;
}
?>