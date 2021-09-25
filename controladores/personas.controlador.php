<?php

class ControladorPersonas{


    /*=============================================
	MOSTRAR PERSONAS
	=============================================*/

	static public function ctrMostrarPersonas(){

		$url = "http://hiring.medvision.com.co/api/Person/GetAllPeople";

		return ModeloPersonas::mdlMostrarPersonas($url);


	}

	/*=============================================
	GUARDAR PERSONA
	=============================================*/

	static public function ctrGuardarPersona(){

		$url= "http://hiring.medvision.com.co/api/";

		return ModeloPersonas::mdlGuardarPersona($url);		

	}


}

?>