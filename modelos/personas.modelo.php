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

	static public function mdlGuardarPersona($url,$datos)
	{
		
		//organizar datos
		$post = array(
			'document' => $datos["document"],
			'fisrstName' => $datos["fisrstName"],
			'lastName' => $datos["lastName"],
			'birthDate' => $datos["birthDate"],
			'isMarried' => $datos["isMarried"],
			'height' => $datos["height"],
			'houses' => array(
				'description' => $datos["description"],
				'address' => $datos["address"],
				'ownerID' => $datos["ownerID"],
				'owner' => $datos["owner"]
			)
		);
		
		$auth = autenticacion();
		$token = $auth['token'];

		
        $authorization = 'Authorization: Bearer '.$token;

		try {
            $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_POST, true );
			
			$response = curl_exec($ch);
			curl_close($ch);
			$result =	json_decode($response, true);

        } catch (\Exception $e) {
            $result = error_log("Fatal error: " . $e->getMessage());
            
        }
		return $result;
        
	}

}
