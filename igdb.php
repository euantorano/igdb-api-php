<?php

//Documentation: https://www.igdb.com/api/v1/documentation

class IGDB{

  public $apikey = "YOUR_API_KEY";
  private $endpoint = "https://www.igdb.com/api/v1/";

  private function request($parameters){
  	$string = $parameters;
  	$pattern = '?';
	  $position = strpos($string, $pattern);
  	$token = ($position === false) ? "?" : "&";
    return $response = file_get_contents($this->endpoint . $parameters . $token . "token=" . $this->apikey);
  }

  //GAMES
  public function games($parameters = false){
    return $this->request('games/' . $parameters);
  }
  
  public function gameID($gameID){
    return $this->request('games/' . $gameID);
  }

  public function gamesMeta(){
    return $this->request('games/meta');
  }

  public function gamesSearch($query, $parameters = false){
	  $query = preg_replace("/ /","-", $query);
    return $this->request('games/search?q=' . $query . $parameters);
  }

  //COMPANIES
  public function companies($parameters = false){
    return $this->request('companies/' . $parameters);
  }
  
  public function companyID($companyID){
    return $this->request('companies/' . $companyID);
  }

  public function companiesMeta(){
    return $this->request('companies/meta');
  }

  public function companyGames($companyID, $parameters = false){
    return $this->request('companies/' . $companyID . "/games" . $parameters);
  }


  //PEOPLE
  public function people($parameters = false){
    return $this->request('people/' . $parameters);
  }
  
  public function personID($personID){
    return $this->request('people/' . $personID);
  }

  public function peopleMeta(){
    return $this->request('people/meta');
  }

  public function personGames($personID, $parameters = false){
    return $this->request('people/' . $personID . "/games" . $parameters);
  }

  //FRANCHISES
  public function franchises($parameters = false){
    return $this->request('franchises/' . $parameters);
  }
  
  public function franchiseID($franchiseID){
    return $this->request('franchises/' . $franchiseID);
  }

  public function franchisesMeta(){
    return $this->request('franchises/meta');
  }

  public function franchiseGames($franchiseID, $parameters = false){
    return $this->request('franchises/' . $franchiseID . "/games" . $parameters);
  }

  ///PLATFORMS
  public function platforms($parameters = false){
    return $this->request('platforms/' . $parameters);
  }
  
  public function platformID($platformID){
    return $this->request('platforms/' . $platformID);
  }

  public function platformsMeta(){
    return $this->request('platforms/meta');
  }

  public function platformGames($platformID, $parameters = false){
    return $this->request('platforms/' . $platformID . "/games" . $parameters);
  }

}

?>
