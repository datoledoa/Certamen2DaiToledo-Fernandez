<?php
namespace Modelo;

class Database{

	private $database;

	public function __construct($container)
	{
		$this->database = $container->database;
	}

	public function noticias(){
		$arr = $this->database->select('noticia',['cod_int', 'Titulo', 'Cuerpo'],['Leido'=>0]);
		echo json_encode($arr);
	}


	public function noticiasLeidas(){
		$leidas = $this->database->select('noticia',['cod_int', 'Titulo', 'Cuerpo'],['Leido'=>1]);
		
		echo json_encode($leidas);
	}
	
	public function noticiaPorId($id){
		$arr = $this->database->get('noticia',['Titulo','Cuerpo'],['cod_int'=>$id]);
		echo json_encode($arr);
	}

	public function cambiarEstado($id){
		$set = $this->database->update('noticia',['Leido'=>1],['cod_int'=>$id]);
		return $set;
	}
}