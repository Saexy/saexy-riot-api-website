<?php

	class RiotAPI{

		public $key;
		
        //CONSTRUTOR DO OBJETO RIOTAPI
		public function __construct($key = "0")
		{
			$this->key = $key;
		}

        //GETTERS E SETTERS DA KEY,NICKNAME E ACCOUNT
        public function getKey(){
            return $this->key;
        }

        public function setKey($key){
            $this->key = $key;
        }

        //CONSULTANDO A API PARA VERIFICAR A EXISTENCIA DO JOGADOR
        public function existsAccount($nickname) {
            $nicknamereplaced = str_replace(" ", "%20", $nickname);
            $url = "https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$nicknamereplaced."?api_key=".$this->getKey();

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            
            $account = json_decode(curl_exec($curl));
            if(isset($account->id)){
                return true;
            }else{
                return false;
            }
        }

        //CONSULTANDO A API PARA PEGAR O JOGADOR
        public function getAccount($nickname){
            $nicknamereplaced = str_replace(" ", "%20", $nickname);
            $url = "https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$nicknamereplaced."?api_key=".$this->getKey();

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            
            $account = json_decode(curl_exec($curl));
            return $account;
        }

        //CONSULTANDO A API PARA VERIFICAR SE O JOGADOR JÁ JOGOU PARTIDAS RANQUEADAS
        public function existsRankedAccount($nickname) {
            $nicknamereplaced = str_replace(" ", "%20", $nickname);
            $url = "https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$nicknamereplaced."?api_key=".$this->getKey();

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            
            $account = json_decode(curl_exec($curl));

            $id = $account->id;

            $url = "https://br1.api.riotgames.com/lol/league/v4/entries/by-summoner/".$id."?api_key=".$this->getKey();

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            
            $account = json_decode(curl_exec($curl));

            if(isset($account)){
                return true;
            }else{
                return false;
            }
        }

        //CONSULTANDO A API PARA PEGAR OS DADOS DE PARTIDAS RANQUEADAS
        public function getRankedAccount($nickname){
            $nicknamereplaced = str_replace(" ", "%20", $nickname);
            $url = "https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$nicknamereplaced."?api_key=".$this->getKey();

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            
            $account = json_decode(curl_exec($curl));

            $id = $account->id;

            $url = "https://br1.api.riotgames.com/lol/league/v4/entries/by-summoner/".$id."?api_key=".$this->getKey();

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            
            $account = json_decode(curl_exec($curl));
            
            return $account;
        }
	}
?>