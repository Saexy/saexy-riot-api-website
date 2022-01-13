<?php

	class Account{

        private $id;
        private $puuid;
        private $name;
        private $iconUrl;
        private $level;
        private $tier;
        private $rank;
        private $wins;
        private $losses;
        private $points;
		
        //CONSTRUTOR DO OBJETO RIOTAPI
		public function __construct($account = null, $rankedaccount = null)
		{
            $this->id = $account->id;
            $this->puuid = $account->puuid;
            $this->name = $account->name;
            $this->iconUrl = $account->profileIconId;
            $this->level = $account->summonerLevel;
            if(isset($rankedaccount)){
                foreach($rankedaccount as $racc){
                    if($racc->queueType == "RANKED_SOLO_5x5"){
                        $this->tier = $racc->tier;
                        $this->rank = $racc->rank;
                        $this->wins = $racc->wins;
                        $this->losses = $racc->losses;
                        $this->points = $racc->leaguePoints;
                    }
                }
                
            }
		}

        //GETTERS E SETTERS
        public function getID(){
            return $this->id;
        }

        public function getPUUID(){
            return $this->puuid;
        }

        public function getName(){
            return $this->name;
        }

        public function getIconUrl(){
            return "http://ddragon.leagueoflegends.com/cdn/12.1.1/img/profileicon/".$this->iconUrl.".png";
        }

        public function getLevel(){
            return $this->level;
        }

        public function getTier(){
            if(isset($this->tier)){
                $tierconverted = ucfirst(strtolower($this->tier));
                return $tierconverted;
            }
            return "Unranked";
        }

        public function getTierImage(){
            if(isset($this->tier)){
                return "./assets/Emblem_".$this->getTier().".png";
            }
            return "./assets/Emblem_Unranked.png";
        }

        public function getRank(){
            if(isset($this->rank)){
                return $this->rank;
            }
            return "";
        }

        public function getWins(){
            if(isset($this->wins)){
                return $this->wins;
            }
            return 0;
        }

        public function getLosses(){
            if(isset($this->losses)){
                return $this->losses;
            }
            return 0;
        }

        public function getPoints(){
            if(isset($this->points)){
                return $this->points;
            }
            return 0;
        }

        //CALCULO DE TAXA DE VITÓRIAS DO JOGADOR
        public function getWinRate(){
            $partidas = $this->wins + $this->losses;
            if($partidas == 0){
                return 100;
            }
            $winrate = ($this->wins / $partidas) * 100;
            return $winrate;
        }

	}
?>