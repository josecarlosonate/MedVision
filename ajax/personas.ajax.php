<?php

require_once "../controladores/personas.controlador.php";
require_once "../modelos/personas.modelo.php";

class AjaxPersonas{

    /*=============================================
	CONSULTAR PERSONA
	=============================================*/
    
	public function ajaxConsultarPersona($id){

        $respuesta = ControladorPersonas::ctrBuscarPersona($id);

		echo $respuesta;
    }

}

//que viene por post
if(isset($_POST["accion"])){
    // consultar persona
	if($_POST["accion"] == 'consultar'){
		$persona = new AjaxPersonas();
		$persona->ajaxConsultarPersona($_POST["id"]);
	}
}