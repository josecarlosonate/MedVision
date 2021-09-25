<?php

function autenticacion(){
    //autenticacion
		$json = array();
        $json["username"] = "MedUser2021_001";
        $json["password"] = "Zanahoria Dubai2021";

        $data = json_encode($json);

		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,'http://hiring.medvision.com.co/api/Auth');
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_POST, true );
			
			$response = curl_exec($ch);
			curl_close($ch);
			$result = json_decode($response, true);

		} catch (\Exception $e) {
			error_log("Fatal error: " . $e->getMessage());
			return false;
		}
		return $result;
}
