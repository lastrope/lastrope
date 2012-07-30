<?php
/*
 *  Class Actus : gère les actualités du site
 */
class Actus{
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
    /*
     * getAllActus
     * permet de récupérer toutes les actualités
     */
    public function getAllActus(){
         $request = "SELECT idActus, title, body , date FROM actus";
        $actus_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                    $actus_array[$ligne['idActus']] = $ligne;
            }
            return $actus_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
    /*
     *  getActusById
     *  permet de récupérer une actus par son id 
     */
    public function getActusById($id){
        $request = "SELECT idActus, title, body , date FROM actus WHERE idActus = ".$id;
        $actus_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                    $actus_array[$ligne['idActus']] = $ligne;
            }
            return $actus_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
    /*
     * addActus
     * Permet d'ajouter des actus 
     * Attend un tableau indexé sur les index :
     * title
     * body
     */
    public function addActus($actus = array()){
         if(isset($actus)):
            // Transformation de tous les caractère spéciaux par leur entités html
            $title      = htmlspecialchars($member['title']);
            $body       = htmlspecialchars($member['body']);
              
            $request = "INSERT INTO actus(title,body,date) ";
            $request .= ' VALUES("'.$title.'","'.$body.'",'.time().')';
            try{
                $this->pdo->exec($request);
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
    /*
     *  deleteActus 
     *  Permet de supprimer une ou plusieurs actus
     *  attend une liste d'id
     */
    public function deleteActus($list_id = array()){
        if(isset($list_id)):
            try{
                foreach($list_id as $is):
                    $request = "DELETE FROM actus WHERE idActus=".$id;
                    $this->pdo->exec($request);
                endforeach;
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
    
}