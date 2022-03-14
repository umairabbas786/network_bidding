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
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Game Name</th>
                    <th>Game Type</th>
                    <th>Bid On</th>
                    <th>Amount</th>
                    <th>Date</th>
				</tr>
			<tbody>
	";
	
	$s = "select * from history";
    $rr = $conn->query($s);
    while($row1 = mysqli_fetch_assoc($rr)){
        $id = $row1['user_id'];
    $sql = "select * from user where id = '$id'";
    $r = $conn->query($sql);
    while($row = mysqli_fetch_assoc($r)){
		
	$output .= "
				<tr>
					<td>".$row['name']."</td>
					<td>".$row['number']."</td>
					<td>".$row['email']."</td>
					<td>".$row1['game_name']."</td>
					<td>".$row1['game_type']."</td>
                    <td>".$row1['bid_on']."</td>
                    <td>".'₹ '.$row1['amount']."</td>
                    <td>".$row1['date']."</td>
				</tr>
	";
	}}
	
	$output .="
			</tbody>
			
		</table>
	";
	echo $output;

?>