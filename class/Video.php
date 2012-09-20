<?php
class Video{
 
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
    public function getVideoById($id){
        $request = "SELECT *
			FROM video
			WHERE lang='".$this->lang."'
			AND idVideo=".$id;
        
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