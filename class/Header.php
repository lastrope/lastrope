<?php
/**
 * Class header 
 * Manage the header information of the site pages
 */    
class Header{
    private $pdo = null;
    /**
     * constructor 
     * @param $pdo 
     */
    public function __construct($pdo){
        /** Set the connection database **/
        $this->pdo = $pdo;
        return $this;
    }
    public function getAllHeaderInformation($lang = 'fr'){
        $request = " SELECT title, meta_description, meta_keywords, lang FROM header WHERE lang=\"$lang\"";
        try{
            $result = $this->pdo->query($request);
            return $result->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
}
