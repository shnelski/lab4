<?php

//Api.php

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=lab3", "root", "");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM tabel ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["name"]))
		{
			$form_data = array(
				':name'		=>	$_POST["name"],
				':power'		=>	$_POST["power"],
				':beats'		=>	$_POST["beats"]
			);
			$query = "
			INSERT INTO tabel 
			(name, power, beats) VALUES 
			(:name, :power, :beats)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * FROM tabel WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['name'] = $row['name'];
				$data['power'] = $row['power'];
				$data['beats'] = $row['beats'];
			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["name"]))
		{
			$form_data = array(
				':name'	=>	$_POST['name'],
				':power'	=>	$_POST['power'],
				':beats'	=>	$_POST['beats'],
				':id'			=>	$_POST['id']
			);
			$query = "
			UPDATE tabel 
			SET name = :name, power = :power , beats = :beats 
			WHERE id = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
		$query = "DELETE FROM tabel WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>