<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=sistemamag",
			            "root",
			            "");

				/*$link = new PDO("mysql:host=localhost;dbname=id6235524_progra",
			            "id6235524_bsalonso",
			            "99P8vlaf99");
*/
		$link->exec("set names utf8");

		return $link;

	}

}