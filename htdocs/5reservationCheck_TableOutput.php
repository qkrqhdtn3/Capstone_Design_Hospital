<?php
	while($row = mysqli_fetch_array($result)){
		echo "
		<tr>
			<td>{$row['3']}</td>
			<td>{$row['2']}</td>
			<td>{$row['4']}</td>
			<td></td>
		</tr>";
	}
	unset($result);
	mysqli_close($con);
?>