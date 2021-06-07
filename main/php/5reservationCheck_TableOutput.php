<?php
	include "./php/dbConnection.php";
	
	$id = $_SESSION['userId'];
	$result = getRowsInTable('reservation', 'id', $id);
	
	while($row = mysqli_fetch_array($result)){
		echo "
		<tr>
			<td>{$row['2']}</td>
			<td>{$row['3']}</td>
			<td>{$row['4']} {$row['5']}:00</td>
			<td>{$row['7']}</td>
		</tr>";
	}
	unset($result);
?>