<?php
class visita{
    public function newVisita(){
        file_put_contents("./visitas/visitas.txt", (int) file_get_contents('./visitas/visitas.txt') + 1);
    }
    public function getVisitas(){
        return file_get_contents('./visitas/visitas.txt');
    }
}