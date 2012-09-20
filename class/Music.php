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
			FROM music
			WHERE lang='".$this->lang."'
			AND idMusic=".$id;

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