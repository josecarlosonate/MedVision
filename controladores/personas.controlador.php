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
	BUSCAR PERSONA
	=============================================*/

	static public function ctrBuscarPersona($id){

		$url= "http://hiring.medvision.com.co/api/Person/GetPersonById/";

		return ModeloPersonas::mdlBuscarPersona($url,$id);

	}

	/*=============================================
	GUARDAR PERSONA
	=============================================*/

	static public function ctrGuardarPersona($datos){

		$url= "http://hiring.medvision.com.co/api/Person/AddPerson";
		
		return ModeloPersonas::mdlGuardarPersona($url,$datos);		

	}


}

?>