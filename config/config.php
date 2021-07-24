<?php

    #### archivo de configuración global
    session_start();

    // declaramos constantes de sistema

    ##### helpers

    function checkDato( $dato )
    {
        if (isset( $dato )){
            return $dato;
        }
        // mensajes de error o exepciones
        header('error.php');
    }
