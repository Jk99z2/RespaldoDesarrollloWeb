<?php

namespace Models;

class DB
{
	public $host;
	public $name;
	private $user;
	private $pass;

	public $conn;

	//Variables de control para consultas

	public $s = " * ";
	public $w = " 1 ";
	// ...

	public $r; // Resultado de la consulta

	public function __construct($dbh = "localhost", $dbn = "blogx")
	{
		$this->user = 'root';
		$this->host = $dbh;
		$this->name = $dbn;
	} // Termina definición de datos para conexión

	public function db_connect()
	{
		$this->conex = new mysqli($this->host,$this->user,"",$this->name);
		$this->conex->set_charset('utf8');

		if($this->conex->connect_error){
			echo "Falló la conexión";
		}
		else
		{
			return $this->conex;
		}

	} // Termina conexión

	public function select($cc = [])
	{

		if(count($cc > 0))
		{
			$this->s = implode(",",$cc);
		}
		return $this; // Termina if que implosiona array en el select
	
	} // Termina select

	public function where($ww = [])
	{

		$this->w = "";
		if(count($ww) > 0)
		{
			foreach ($ww as $wheres) 
			{
				$this->w . = $wheres[0] . " like '" . $wheres[1] . "' " . ' and ';
			}
			$this->w . = ' 1 ';
		} // Termina comprobador del count para el where

	} // Termina where

	public function get()
	{
		$sql = "select " . $this->s . " from " . str_replace("Models\\","",get_class($this)) . " where " . $this->w;
		$this->r = $this->table->query($sql);
		$result = [];

		while($f = $this->r->fetch_assoc())
		{
			$result[] = $f;
		}
		return json_encode($result);

	} // Termina función de get

}