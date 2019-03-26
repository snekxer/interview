<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Uploader
 *
 * @author pauli
 */
class uploader {
    
    /*
     * Delimitaciones de tamano se da en cada funcion segun el tipo de archivo:
     * 5mb para imagenes
     * 2mb para documentos
     * 100mb para videos
     * 
     * Delimitaciones de extensiones de archivo se dan por funcion:
     * Imagenes para perfiles, productos y portafolios
     * Documentos e imagenes para servicios
     * Videos para videos de perfil
     * 
     * Directorio de upload cambia segun el tipo:
     * uploads/prods
     * uploads/ports
     * uploads/per/img
     * uploads/emp/img
     * uploads/omp/img
     * uploads/per/vid
     * uploads/emp/vid
     * uploads/omp/vid
     * uploads/servs
     */
    
    function uploadImgPer(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/per/img/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/per/img/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
        
    }
    
    function uploadImgEmp(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/emp/img/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/emp/img/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
    }
    
    function uploadEmpPro(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/emp/pro/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/emp/pro/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
    }
    
    function uploadOmpPro(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/omp/pro/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/omp/pro/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
    }
    
    function uploadImgOmp(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/omp/img/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/omp/img/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
    }
    
    function uploadImgPort(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/ports/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/ports/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
    }
    
    function uploadImgProd(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/prods/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/prods/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
    }
    
    function uploadServ(){
        try {
            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new RuntimeException('Parametros Invalidos');
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($_FILES['upfile']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No se ha selecionado un archivo');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Excede limite de tamano');
                default:
                    throw new RuntimeException('Error desconocido');
            }

            // You should also check filesize here. 
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamano');
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'doc' => 'application/msword',
                    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'pdf' => 'application/pdf',
                    'ppt' => 'application/vnd.ms-powerpoint',
                    'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                    'xls' => 'application/vnd.ms-excel',
                    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'jpg' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    
                ),
                true
            )) {
                throw new RuntimeException('Formato invalido.');
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/servs/%s.%s',
                    $bin,
                    $ext
                )
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/servs/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {

            echo $e->getMessage();

        }
    }
    
    function uploadVidPer(){
        try {
            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new RuntimeException('Parametros Invalidos');
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($_FILES['upfile']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No se ha selecionado un archivo');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Excede limite de tamano');
                default:
                    throw new RuntimeException('Error desconocido');
            }

            // You should also check filesize here. 
            if ($_FILES['upfile']['size'] > 104857600) {
                throw new RuntimeException('Excede limite de tamano');
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'mp4' => 'video/mp4',
                    '3gp' => 'video/3gp',
                    'mov' => 'video/mov',
                    
                ),
                true
            )) {
                throw new RuntimeException('Formato invalido.');
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/per/vid/%s.%s',
                    $bin,
                    $ext
                )
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }

            $path = sprintf('/uploads/per/vid/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;

        } catch (RuntimeException $e) {

            echo $e->getMessage();

        }
    }
    
    function uploadVidEmp(){
        try {
            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new RuntimeException('Parametros Invalidos');
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($_FILES['upfile']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No se ha selecionado un archivo');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Excede limite de tamano');
                default:
                    throw new RuntimeException('Error desconocido');
            }

            // You should also check filesize here. 
            if ($_FILES['upfile']['size'] > 104857600) {
                throw new RuntimeException('Excede limite de tamano');
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'mp4' => 'video/mp4',
                    '3gp' => 'video/3gp',
                    'mov' => 'video/mov',
                    
                ),
                true
            )) {
                throw new RuntimeException('Formato invalido.');
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/emp/vid/%s.%s',
                    $bin,
                    $ext
                )
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }

            $path = sprintf('/uploads/emp/vid/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;

        } catch (RuntimeException $e) {

            echo $e->getMessage();

        }
    }
    
    function uploadVidOmp(){
        try {
            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new RuntimeException('Parametros Invalidos');
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($_FILES['upfile']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No se ha selecionado un archivo');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Excede limite de tamano');
                default:
                    throw new RuntimeException('Error desconocido');
            }

            // You should also check filesize here. 
            if ($_FILES['upfile']['size'] > 104857600) {
                throw new RuntimeException('Excede limite de tamano');
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'mp4' => 'video/mp4',
                    '3gp' => 'video/3gp',
                    'mov' => 'video/mov',
                    
                ),
                true
            )) {
                throw new RuntimeException('Formato invalido.');
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/omp/vid/%s.%s',
                    $bin,
                    $ext
                )
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }

            $path = sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/omp/vid/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;

        } catch (RuntimeException $e) {

            echo $e->getMessage();

        }
    }
    
    function uploadEncPer(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/per/enc/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/per/enc/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
        
    }
    
    function uploadEncEmp(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/emp/enc/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/emp/enc/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
    }
    
    function uploadEncOmp(){
        try {
            // Indefinido | Multiples archivos | Ataque de corrupcion de $_FILES 
            // Si la peticion falla en cualquiera de estos parametros, tratelo como invalido
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new UploadException($_FILES['file']['error']); 
                //throw new RuntimeException('Parametros Invalidos');
            }
            // Comprueba tamano (5mb en bytes)
            if ($_FILES['upfile']['size'] > 5242880) {
                throw new RuntimeException('Excede limite de tamaño.');
            }
            // Comprueba tipo MIME
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']),
                array(
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                
                throw new RuntimeException('Formato invalido. Formatos aceptados: jpg, jpeg, png, gif, bmp, tiff');
            }
            // Renombra segun datos binarios
            $bin = sha1_file($_FILES['upfile']['tmp_name']);            
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($_SERVER['DOCUMENT_ROOT'].'/uploads/omp/enc/%s.%s',
                    $bin,
                    $ext)
            )) {
                throw new RuntimeException('No se ha podido mover el archivo');
            }
            $path = sprintf('/uploads/omp/enc/%s.%s',
                    $bin,
                    $ext);
            echo 'El archivo ha sido subido correctamente';
            return $path;
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
    }
}
