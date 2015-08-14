<?php

class IGDB{

  private $apikey = "API_KEY";
  private $endpoint = "https://www.igdb.com/api/v1/";

  private function request($url, $callback, $opts = false){

    $url = $endpoint . $url;
    if($opts){
      $optUrl = array();
      foreach($opts as $param => $paramValue){
        if($param == "filters"){
          foreach($paramValue as $filter => $filterValue){
            array_push($optUrl, "filters[" . $filter . "]=" . $filterValue);
          }
        } else {
          array_push($optUrl, $param . "=" . $paramValue);
        }
      }

      $url .= "?" . implode("&", $optUrl);
    }

    $opts = array(
      'http' => array(
        'method' => "GET",
        'header' => "Accept: application/json" .
                    "Authorization: Token token=\"" . $apikey . "\""
      )
    );

    $context = stream_context_create($opts);
    $file = file_get_contents($url, false, $context);
    $callback(json_decode($file));
  }

  public function gamesIndex($opts, $callback){
    self::request('games', $callback);
  }
  public function gamesGet($id, $callback){
    self::request('games/' . $id, $callback);
  }
  public function gamesMeta($callback){
    self::request('games/meta', $callback);
  }
  public function gamesSearch($opts, $callback){
    self::request('games/search', $callback, $opts);
  }

  public function companiesIndex($opts, $callback){
    self::request('companies', $callback, $opts);
  }
  public function companiesGet($id, $callback){
    self::request('companies/' . $id, $callback);
  }
  public function companiesMeta($callback){
    self::request('companies/meta', $callback);
  }
  public function companiesGames($opts, $id, $callback){
    self::request('companies/' . $id . '/games', $callback, $opts);
  }

  public function peopleIndex($opts, $callback){
    self::request('people', $callback, $opts);
  }
  public function peopleGet($id, $callback){
    self::request('people/' . $id, $callback);
  }
  public function peopleMeta($callback){
    self::request('people/meta', $callback);
  }
  public function peopleGames($opts, $id, $callback){
    self::request('people/' . $id . '/games', $callback, $opts);
  }
  public function peopleTitles($opts, $id, $callback){
    self::request('people/' . $id . '/titles', $callback, $opts);
  }

}

?>
