<?php

require 'vendor/autoload.php';
require 'Modelo/Clima.php';

use GuzzleHttp\Client;
use Classes\Modelo\Clima;

class OpenWheatherApi {

    private $url;
    private $id;
    private $appid;

    public function __construct() {
        //Inicializa as variáveis globais
        $this->url = "http://api.openweathermap.org/data/2.5/weather";
        $this->id = "3468879";
        $this->appid = "4ba92cd5c4efcde95895a52e2b75d8c9";
    }

    /**
     * Vai no site openweathermap.org e captura informações de clima
     */
    private function getDataWheather(): object {
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);

        $urlCompleta = $this->url . "?id=" . $this->id . "&appid=" . $this->appid;

        $request = $client->request('GET', $urlCompleta);

        $clima = $request->getBody();

        //Converter para objeto
        $objClima = json_decode($clima);

        //Serializa o objeto/dados
        $objSerializado = serialize($objClima);
        $caminhoArquivo = "./cache/clima.txt";

        //Grava o objeto serializado no disco
        file_put_contents($caminhoArquivo, $objSerializado);

        return $objClima;
    }

    public function getClima(): Clima {
        
        //Recupera os dados de atualizacao
        $conteudoAtualizacao = file_get_contents("./cache/controle_cache.txt");

        //Transforma a string em array
        $arrayAtualizacao = explode("#", $conteudoAtualizacao);
        $dataAtualizacao = $arrayAtualizacao [0];
        $dataAtual = time();

        /*Verifica a atualização de cache*/
        if ($dataAtual - $dataAtualizacao >= 300) {
            //Atualiza o cache
            $objGenerico = $this->getDataWheather();
            $arrayAtualizacao [0] = time();
            $dadosArquivo = $arrayAtualizacao[0]."#".$arrayAtualizacao[1];
            file_put_contents("./cache/controle_cache.txt", $dadosArquivo);
        } else {
            //Busca a partir do cache
            
            //Os dados do disco
            $conteudoArquivo = file_get_contents("./cache/clima.txt");

            //deserializa os dados
            $objGenerico = unserialize($conteudoArquivo);
        }
        
        
        $cli = new Clima();
        
        $cli->temperatura = $objGenerico->main->temp;
        $cli->codCidade = $objGenerico->id;
        $cli->cidade = $objGenerico->name;
        $cli->velocidadeVento = $objGenerico->wind->speed;
        $cli->nascerDoSol = $objGenerico->sys->sunrise;
        $cli->porDoSol = $objGenerico->sys->sunset;
        $cli->humidade = $objGenerico->main->humidity;
        $cli->pressao = $objGenerico->main->pressure;
        $cli->descricao = $objGenerico->weather[0]->description;
        $cli->icone = $objGenerico->weather[0]->icon;
        
        return $cli;
    }

}

?>