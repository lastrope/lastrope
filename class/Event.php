<?php
/*
 *  Class Event : gère les évènements du site
 */
class Event{
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
    /*
     * getAllEvent
     * permet de récupérer tous les évènements
	 * @return array $event_array ( assoc )
     */
    public function getAllEvent(){
        $request = "SELECT idEvent, title, short_desc , date, type
			FROM event
			WHERE lang='".$this->lang."'";
		
        $event_array = array();
		
        try {
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
				$event_array[$ligne['idEvent']] = $ligne;
            }
            return $event_array;
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        return array();
    }
    /*
     * getLastFiveEvent
     * permet de récupérer les 5 derniers évènements
	 * @return array $event_array ( assoc )
     */
	public function getLastFiveEvent(){
        $request = "SELECT idEvent, title, short_desc , date, type
			FROM event
			WHERE lang='".$this->lang."'
			LIMIT 5";
		
        $event_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                $event_array[$ligne['idEvent']] = $ligne;
            }
            return $event_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
	}
    /*
     * getEventById
     * permet de récupérer un évènement par son id
	 * @param $id
	 * @return array $event_array ( assoc )
     */
    public function getActusById($id){
        $request = "SELECT idActus, title, body , date
			FROM actus
			WHERE idActus=".$id;
		
        $event_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                    $event_array[$ligne['idActus']] = $ligne;
            }
            return $event_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
    /*
     * addActus
     * Permet d'ajouter des actus 
     * Attend un tableau indexé sur les index : title, body, lang
	 * @param $actus ( array )
	 * @return $this
     */
    public function addActus($actus = array()){
         if(isset($actus)):
            // Transformation de tous les caractère spéciaux par leur entités html
            $title = htmlspecialchars($actus['title']);
            $body = htmlspecialchars($actus['body']);
            $langue = htmlspecialchars($actus['lang']);
              
            $request = "INSERT INTO actus(title,body,date,lang) ";
            $request .= 'VALUES("'.$title.'","'.$body.'",'.time().',"'.$langue.'")';
			
            try{
                $this->pdo->exec($request);
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
    /*
     * deleteActus 
     * Permet de supprimer une ou plusieurs actus
     * Attend une liste d'id
	 * @param $list_id ( array )
	 * @return $this
     */
    public function deleteActus($list_id = array()){
        if(isset($list_id)):
            try{
                foreach($list_id as $is):
                    $request = "DELETE FROM actus
						WHERE idActus=".$id;
						
                    $this->pdo->exec($request);
                endforeach;
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
    
}