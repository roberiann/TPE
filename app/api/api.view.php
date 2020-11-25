<?php

/**
 * Vista para la API REST.
 * 
 * Clase común a toda la API REST que sabe devolver
 * en formato JSON y manejar el código de respuesta HTTP.
 */
class APIView {
    
    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        echo json_encode($data);
    }

    private function requestStatus($code){
        $status = array(
          200 => "OK",
          404 => "Not found",
          500 => "Internal Server Error"
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
      }
}