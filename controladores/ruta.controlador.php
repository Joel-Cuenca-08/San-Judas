<?php

class ControladorRuta{

    static public function ctrAgregar(){

    }

    static public function ctrEditar(){


    }

    static public function ctrListar(){

        $Lista = ModeloRuta::mdlListar();
        return $Lista;

    }

    



}