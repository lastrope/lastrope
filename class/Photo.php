<?php
/*
 *  Class Photo : gère les photos du site
 */
class Photo{
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
    
    /**
     * getAllPhoto
     * permet de récupérer toutes les Photos
     * @return array $photo_array ( assoc )
     */
    public function getAllPhotos(){
        $request = "SELECT *
			FROM photo
			WHERE lang='".$this->lang."'";
		
        $photo_array = array();
		
        try {
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
				$photo_array	[$ligne['idPhoto']] = $ligne;
            }
            return $photo_array;
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        return array();
    }
    
    /**
     * getPhotoById
     * permet de récupérer une photo par son id
     * @param $id
     * @return array $photo_array ( assoc )
     */
    public function getAlbumById($id){
        $request = "SELECT *
			FROM photo
			WHERE idPhoto=".$id;
		
        $photo_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                $photo_array[$ligne['idPhoto']] = $ligne;
            }
            return $photo_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
    
    /**
     * 
     * @param type $id
     * @return array()
     */
    public function getPhotosByAlbum($id){
	$request = "SELECT *
			FROM photo
			WHERE idAlbum=".$id;
	$photo_array = array();

        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                $photo_array[$ligne['idPhoto']] = $ligne;
            }
            return $photo_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }    
}