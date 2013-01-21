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
    public function getAllAlbums(){
        $request = "SELECT *
			FROM albums
			WHERE lang='".$this->lang."'";


        try{
	    $stmt = $this->pdo->query($request);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    $ligne = $stmt->fetchAll();
            return $ligne;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
    public function getAlbumsName(){
	$request = "SELECT name
			FROM albums
			WHERE lang='".$this->lang."'";

        try{
            $stmt = $this->pdo->query($request);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
	    $ligne = $stmt->fetchAll();
            return $ligne;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
	
    }
    public function getMusicsByAlbums($idAlbums){
	$request = "SELECT s.idSong, s.filename, s.title as stitle, s.description, s.duration, a.name as atitle  ".
		   "FROM song s INNER JOIN albums_song als ON s.idSong = als.idSong ".
		   "INNER JOIN albums a ON a.idAlbums = als.idAlbums ".
		   "WHERE s.lang='".$this->lang."' AND a.idAlbums=".$idAlbums;
       
        try{
            $result = $this->pdo->query($request);
	    $result->setFetchMode(PDO::FETCH_ASSOC);
            $ligne = $result->fetchAll();
            return $ligne;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
    public function getMusicsOnAir($idAlbums){
	$request = "SELECT s.idSong, s.filename, s.title as stitle, s.description, s.duration, a.name as atitle  ".
		   "FROM song s INNER JOIN albums_song als ON s.idSong = als.idSong ".
		   "INNER JOIN albums a ON a.idAlbums = als.idAlbums ".
		   "WHERE s.lang='".$this->lang."' AND a.idAlbums=".$idAlbums. " AND s.filename <> 'NULL'";
       
        try{
            $result = $this->pdo->query($request);
	    $result->setFetchMode(PDO::FETCH_ASSOC);
            $ligne = $result->fetchAll();
            return $ligne;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
}