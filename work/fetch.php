<?php

//fetch.php

$api_url = "http://localhost/test/api/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count((array)$result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->id.'</td>
			<td>'.$row->name.'</td>
			<td>'.$row->power.'</td>
			<td>'.$row->beats.'</td>
			<td><button type="button" name="update" class="btn btn-warning btn btn-primary update" id="'.$row->id.'">Update</button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn btn-primary delete" id="'.$row->id.'">Delete</button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">No Data Found</td>
	</tr>
	';
}

echo $output;

?>