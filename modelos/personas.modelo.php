<?php

require_once "conexion.php";

class ModeloPersonas
{

	/*=============================================
	MOSTRAR PERSONAS
	=============================================*/

	static public function mdlMostrarPersonas($url)
	{
		$auth = autenticacion();
		$token = $auth['token'];
        
        $header = array();
        $header[] = 'Authorization: Bearer '.$token;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 
		curl_close($ch); 
		
		return $data;
	}

	/*=============================================
	BUSCAR PERSONA
	=============================================*/

	static public function mdlBuscarPersona($url,$id)
	{
		$auth = autenticacion();
		$token = $auth['token'];
        
        $header = array();
        $header[] = 'Authorization: Bearer '.$token;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url.$id); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 
		curl_close($ch); 
		
		return $data;
	}

	/*=============================================
	GUARDAR PERSONA
	=============================================*/

	static public function mdlGuardarPersona($url)
	{
		echo $url;
	}

}
