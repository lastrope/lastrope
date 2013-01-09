<?php
class Music{
 
    private $pdo = null;
    private $lang = null;
	
    /**
     * constructor 
     * @param $pdo 
     * @param $lang 
     */
    public function __construct($pdo, $lang){
        /** Set the connection database **/
        $this->pdo = $pdo;
        $this->lang = $lang;
    }
    public function getMusicById($id){
        $request = "SELECT *
			FROM song
			WHERE lang='".$this->lang."'
			AND idSong=".$id;

        try{
            $result = $this->pdo->query($request);
            $ligne = $result->fetch(PDO::FETCH_ASSOC);
            return $ligne;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
    public function getMusicsByAlbums($idAlbums){
	$request = "SELECT s.idSong, s.name, s.filename, s.title, s.description ".
		   "FROM song s INNER JOIN albums_song as ON s.idSong = as.idSong ".
		   "INNER JOIN albums a ON a.idAlbums = as.idAlbums ".
		   "WHERE s.lang='".$this->lang."' AND s.idSong=".$idAlbums;

        try{
            $result = $this->pdo->query($request);
            $ligne = $result->fetch(PDO::FETCH_ASSOC);
            return $ligne;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
}