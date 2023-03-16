<?php 

namespace App\WebService;

class ViaCEP{

    /**
     * Um dos metodos responsaveis por consultar 
     * @param string $cep
     * @return array
     */
    public static function consultarCEP($cep){
       //Definindo que deve iniciar o curl
       $curl = curl_init();

       //Configuracoes do curl
       curl_setopt_array($curl,[
           CURLOPT_URL => 'https://viacep.com.br/ws/'.$cep.'/json/',
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_CUSTOMREQUEST => 'GET'
       ]);

    
       $response = curl_exec($curl);

       //FECHA A CONEXAO ABERTA
       curl_close($curl);

       //Converte o grande lindo json 
       $array = json_decode($response, true);

       //Retorna o conteudo
       return isset($array['cep']) ? $array : null;

    }

}