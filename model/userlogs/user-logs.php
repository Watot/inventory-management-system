<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$logsDetailsSearchSql = 'SELECT * FROM userlog';
	$logsDetailsSearchStatement = $conn->prepare($logsDetailsSearchSql);
	$logsDetailsSearchStatement->execute();

	$output = '<table id="logsReportsTable" class="table table-sm  table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th>employee ID</th>
						<th>username</th>
						<th>userip</th>
						<th>login time</th>
						<th>logout</th>
						<th>status</th>
					</tr>
				</thead>
				<tbody>';
	
	// Create table rows from the selected data
	while($row = $logsDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
		$output .= '<tr>' .
						'<td>' . $row['employeeID'] . '</td>' .
						'<td>' . $row['username'] . '</td>' .
						'<td>' . $row['userip'] . '</td>' .
						'<td>' . $row['login time'] . '</td>' .
						'<td>' . $row['logout'] . '</td>' .
						'<td>' . $row['status'] . '</td>' .
					'</tr>';
	}
	
	$logsDetailsSearchStatement->closeCursor();
	
	$output .= '</tbody>
					<tfoot>
						<tr>
                                    <th>employee ID</th>
						<th>username</th>
						<th>userip</th>
						<th>login time</th>
						<th>logout</th>
						<th>status</th>
						</tr>
					</tfoot>
				</table>';
	echo $output;
?>