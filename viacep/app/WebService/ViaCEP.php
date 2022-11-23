<?php 

namespace App\WebService;

class ViaCEP{

    /**
     * Metodo responsavel por consultar CEP
     * @param string $cep
     * @return array
     */
    public static function consultarCEP($cep){
       //INICIAR O CURL
       $curl = curl_init();

       //CONFIGURACOES DO CURL
       curl_setopt_array($curl,[
           CURLOPT_URL => 'https://viacep.com.br/ws/'.$cep.'/json/',
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_CUSTOMREQUEST => 'GET'
       ]);

       //RESPONSE
       $response = curl_exec($curl);

       //FECHA A CONEXAO ABERTA
       curl_close($curl);

       //CONVERTE JSON PARA ARRAY
       $array = json_decode($response, true);

       //RETORNAR O CONTEUDO EM ARRAY
       return isset($array['cep']) ? $array : null;

    }

}