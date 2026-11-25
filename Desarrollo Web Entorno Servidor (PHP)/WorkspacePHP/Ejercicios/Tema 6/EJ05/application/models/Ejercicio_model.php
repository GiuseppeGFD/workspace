<?php
class Ejercicio_model extends CI_Model
{
    public function recuperar_elementos()
    {
        return R::findAll('elementos');
    }
}

?>