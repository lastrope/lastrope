<?php
/*
 *  Class AlbumPhoto : gère les albums photos du site
 */
class AlbumPhoto{
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
     * getAllAlbumPhoto
     * permet de récupérer toutes les Albums Photo
     * @return array $album_array ( assoc )
     */
    public function getAllAlbumPhoto(){
        $request = "SELECT idAlbum, nomAlbum, nbPhotos , dateAlbum
			FROM album_photo
			WHERE lang='".$this->lang."'
			ORDER BY dateAlbum DESC";
		
        $album_array = array();
		
        try {
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
				$album_array[$ligne['idAlbum']] = $ligne;
            }
            return $album_array;
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        return array();
    }
    
    /**
     * getLastFiveAlbum
     * permet de récupérer les 5 dernières Albums Photo
     * @return array $album_array ( assoc )
     */
    public function getLastFiveAlbum(){
	    $request = "SELECT idAlbum, nomAlbum, nbPhotos , dateAlbum
			    FROM album_photo
			    WHERE lang='".$this->lang."'
			    LIMIT 5";

	    $album_array = array();

	    try{
		$result = $this->pdo->query($request);
		while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
		    $album_array[$ligne['idAlbum']] = $ligne;
		}
		return $album_array;
	    }catch(PDOException $e){
		print $e->getMessage();
	    }
	    return array();
    }
    
    /**
     * getAlbumById
     * permet de récupérer un album par son id
     * @param $id
     * @return array $album_array ( assoc )
     */
    public function getAlbumById($id){
        $request = "SELECT idAlbum, nomAlbum, nbPhotos , dateAlbum
			FROM album_photo
			WHERE idActus=".$id;
		
        $album_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                $album_array[$ligne['idAlbum']] = $ligne;
            }
            return $album_array;
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
    public function isAlbumExist($id){
	$request = "SELECT idAlbum, nomAlbum, nbPhotos , dateAlbum
			FROM album_photo
			WHERE idActus=".$id;
	$album_array = array();

	try{
	    $result = $this->pdo->query($request);
	    if($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
		$album_array = $ligne;
	    }
	    return $album_array;
	} catch(PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }    
}