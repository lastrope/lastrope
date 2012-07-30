<?php
/**
 * Class header 
 * Manage the header information of the site pages
 */    
class Header{
    private $pdo = null;
    private $lang = null;
    /**
     * constructor 
     * @param $pdo 
     */
    public function __construct($pdo, $lang){
        /** Set the connection database **/
        $this->pdo = $pdo;
        $this->lang = $lang;
        return $this;
    }
    public function getAllHeaderInformation(){
        $request = " SELECT title, meta_description, meta_keywords, lang FROM header WHERE lang=\"$this->lang\"";
        try{
            $result = $this->pdo->query($request);
            return $result->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
}
