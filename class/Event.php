<?php
/*
 *  Class Event : g�re les �v�nements du site
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
     * permet de r�cup�rer tous les �v�nements
	 * @return array $event_array ( assoc )
     */
    public function getAllEvent(){
        $request = "SELECT idEvent, title, body , date, type
			FROM event
			WHERE lang='".$this->lang."'
			ORDER BY date DESC";
		
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
     * permet de r�cup�rer les 5 derniers �v�nements
	 * @return array $event_array ( assoc )
     */
	public function getLastFiveEvent(){
        $request = "SELECT idEvent, title, body , date, type
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
     * permet de r�cup�rer un �v�nement par son id
	 * @param $id
	 * @return array $event_array ( assoc )
     */
    public function getEventById($id){
        $request = "SELECT idEvent, title, body , date, type
			FROM event
			WHERE idEvent=".$id;
		
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
	public function isEventExist($id){
        $request = "SELECT idEvent, title, body , date, type
			FROM event
			WHERE idEvent=".$id;
		
        $event_array = array();
		
        try{
            $result = $this->pdo->query($request);
            if($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
                $event_array = $ligne;
            }
            return $event_array;
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        return array();
	}
    /*
     * addEvent
     * Permet d'ajouter des �v�nements
     * Attend un tableau index� sur les index : title, body, type, lang
	 * @param $event ( array )
	 * @return $this
     */
    public function addEvent($event = array()){
         if(isset($event)):
            // Transformation de tous les caract�re sp�ciaux par leur entit�s html
            $title = htmlspecialchars($event['title']);
            $body = htmlspecialchars($event['body']);
            $type = htmlspecialchars($event['type']);
            $langue = htmlspecialchars($event['lang']);
              
            $request = "INSERT INTO event(title,body,type,date,lang) ";
            $request .= 'VALUES("'.$title.'","'.$body.'","'.$type.'",'.time().',"'.$langue.'")';
			
            try{
                $this->pdo->exec($request);
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
    /*
     * deleteEvent
     * Permet de supprimer un ou plusieurs �v�nements
     * Attend une liste d'id
	 * @param $list_id ( array )
	 * @return $this
     */
    public function deleteEvent($list_id = array()){
        if(isset($list_id)):
            try{
                foreach($list_id as $is):
                    $request = "DELETE FROM event
						WHERE idEvent=".$id;
						
                    $this->pdo->exec($request);
                endforeach;
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
    
}