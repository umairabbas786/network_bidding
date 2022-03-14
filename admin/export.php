<?php include "includes/header.php";

	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=file.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
	
	$output = "";
	
	$output .="
		<table>
			<thead>
				<tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Balance</th>
                    <th>Date</th>
				</tr>
			<tbody>
	";
	
	$query = $conn->query("SELECT * FROM `user`") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
		
	$output .= "
				<tr>
					<td>".$fetch['id']."</td>
					<td>".$fetch['name']."</td>
					<td>".$fetch['email']."</td>
					<td>".$fetch['number']."</td>
					<td>".$fetch['status']."</td>
                    <td>".'₹ '.$fetch['balance']."</td>
                    <td>".$fetch['date']."</td>
				</tr>
	";
	}
	
	$output .="
			</tbody>
			
		</table>
	";
	echo $output;

?>