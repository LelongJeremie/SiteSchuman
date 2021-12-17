<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM utilisateur
WHERE id != '".$_SESSION['id']."'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th width="70%">Utilisateur</td>

		<th width="30%">Action</td>
	</tr>
';

foreach($result as $row)
{


	$output .= '
	<tr>
		<td>'.$row['username'].' '.count_unseen_message($row['id'], $_SESSION['id'], $connect).'</td>

		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>
