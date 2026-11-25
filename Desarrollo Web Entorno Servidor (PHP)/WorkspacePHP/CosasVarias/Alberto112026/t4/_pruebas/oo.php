<?php
interface Instrumento
{
    public function sonar();
}

class Guitarra implements Instrumento
{
    public function sonar()
    {
        echo 'TRIANG';
    }
}
class Flauta implements Instrumento
{
    public function sonar()
    {
        echo 'TURURÚ';
    }
}

class Cosa
{

}


?>