<?php
class Hola extends CI_Controller
{
    public function saludar()
    {
        //$p = new Persona();
        //$p->nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'Unkown';
        //$p->apellido = isset($_GET['apellido']) ? $_GET['apelldio'] : 'Unkown';
        //$this->load->view('misaludo', $p);
    }
    public function index()
    {
        $this->saludar();
    }
}

?>