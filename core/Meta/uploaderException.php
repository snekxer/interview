<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploaderException
 *
 * @author pauli
 */
class UploadException extends Exception 
{ 
    public function __construct($code) { 
        $message = $this->codeToMessage($code); 
        parent::__construct($message, $code); 
    } 

    private function codeToMessage($code) 
    { 
        switch ($code) { 
            case UPLOAD_ERR_INI_SIZE: 
                $message = "El archivo excede el limite de tamaño."; 
                break; 
            case UPLOAD_ERR_FORM_SIZE: 
                $message = "El archivo excede el limite de tamaño."; 
                break; 
            case UPLOAD_ERR_PARTIAL: 
                $message = "La subida del archivo fue interrumpida."; 
                break; 
            case UPLOAD_ERR_NO_FILE: 
                $message = "No hay un archivo para subir."; 
                break; 
            case UPLOAD_ERR_NO_TMP_DIR: 
                $message = "No hay carpeta tmp."; 
                break; 
            case UPLOAD_ERR_CANT_WRITE: 
                $message = "No se pudo escribir el archivo en el disco."; 
                break; 
            case UPLOAD_ERR_EXTENSION: 
                $message = "Extension invalida."; 
                break; 

            default: 
                $message = "Error desconocido."; 
                break; 
        } 
        return $message; 
    } 
} 