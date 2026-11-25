<?php
class Ejercicio extends CI_Controller
{
    public function ej03()
    {
        $lista = [
            ['label' => 'Yahoo', 'url' => 'https://es.search.yahoo.com/?fr2=p:fprd,mkt:es'],
            ['label' => 'Google', 'url' => 'https://www.google.com/'],
            ['label' => 'BING', 'url' => 'https://www.bing.com/?setlang=es']
        ];
        $datos['lista'] = $lista;
        $this->load->view('ej03', $datos);
    }
    public function index()
    {
        $this->ej03();
    }
}
?>