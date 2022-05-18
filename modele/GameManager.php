<?php
 require_once "Manager.php";
 require_once "Game.php";

class GameManager extends Manager {

    private $games;

    public function addGame($game){
        $this->games[] = $game;
    }

    public function getGames(){
        return $this->games;
    }

    public function getGameById($id){
        foreach($this->games as $game) {
            if ($id == $game->getId()) {
                return $game;
            }
        }
    }

    public function loadGames(){
        $req = $this->getBdd()->prepare("SELECT * FROM games");
        $req->execute();
        $myGames = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($myGames as $game){
            $g = new Game($game['id'],$game['title'],$game['nb_players']);
            $this->addGame($g);
        }

    }

    public function newGameDB($title,$nb_players){
        $req = "INSERT INTO games (title, nb_players) VALUES (:title, :nbPlayers)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":title",$title, PDO::PARAM_STR);
        $statement->bindValue(":nbPlayers",$nb_players, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $g = new Game($this->getBdd()->lastInsertId(),$title,$nb_players);
            $this->addGame($g);
        }
        
    }


}