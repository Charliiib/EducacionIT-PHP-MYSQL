<?php

    function conectar()
    {
        $link = mysqli_connect(
            'localhost',
            'root',
            '',
            'catalogo'
        );
        return $link;
    }