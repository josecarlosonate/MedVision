<?php

require_once "../controladores/personas.controlador.php";
require_once "../modelos/personas.modelo.php";

class AjaxPersonas{

	public $datosPersona;
    /*=============================================
	CONSULTAR PERSONA
	=============================================*/
    
	public function ajaxConsultarPersona($id){

        $respuesta = ControladorPersonas::ctrBuscarPersona($id);

		echo $respuesta;
    }

	/*=============================================
	AGREGAR PERSONA
	=============================================*/
	public function ajaxGuardarPersona(){
		$datos = $this->datosPersona;
		
		$respuesta = ControladorPersonas::ctrGuardarPersona($datos);

		return $respuesta;
	}

}

//que viene por post
if(isset($_POST["accion"])){
    // consultar persona
	if($_POST["accion"] == 'consultar'){
		$persona = new AjaxPersonas();
		$persona->ajaxConsultarPersona($_POST["id"]);
	}

	//guardar nueva persona
	if($_POST["accion"] == 'nuevo'){
		$persona = new AjaxPersonas();
		$personadata = json_decode($_POST['persona'],true);
		
		$persona->datosPersona = $personadata;
		$persona->ajaxGuardarPersona();
	}

}