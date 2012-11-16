<?php
/*
 *  Class Bio : gère la biographie du groupe du site
 */
class Bio{
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
     * getAllBio
     * permet de récupérer toutes les périodes
	 * @return array $bio_array ( assoc )
     */
    public function getAllBio(){
        $request = "SELECT idPeriod, year, description , lang
			FROM bio
			WHERE lang='".$this->lang."'
			ORDER BY year DESC";
		
        $bio_array = array();
		
        try {
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
				$bio_array[$ligne['idPeriod']] = $ligne;
            }
            return $bio_array;
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        return array();
    }
    /*
     * getLastFiveBio
     * permet de récupérer les 5 dernières périodes
	 * @return array $bio_array ( assoc )
     */
	public function getLastFiveBio(){
        $request = "SELECT idPeriod, year, description , lang
			FROM bio
			WHERE lang='".$this->lang."'
			LIMIT 5";
		
        $bio_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                $bio_array[$ligne['idPeriod']] = $ligne;
            }
            return $bio_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
	}
    /*
     * getBioById
     * permet de récupérer une bio par son id
	 * @param $id
	 * @return array $bio_array ( assoc )
     */
    public function getBioById($id){
        $request = "SELECT idPeriod, year, description , lang
			FROM bio
			WHERE idPeriod=".$id;
		
        $bio_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                $bio_array[$ligne['idPeriod']] = $ligne;
            }
            return $bio_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
	public function isActuExist($id){
        $request = "SELECT idPeriod, year, description , lang
			FROM bio
			WHERE idPeriod=".$id;
        $bio_array = array();
		
        try{
            $result = $this->pdo->query($request);
            if($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
                $bio_array = $ligne;
            }
            return $bio_array;
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        return array();
	}
    /*
     * addBio
     * Permet d'ajouter des périodes 
     * Attend un tableau indexé sur les index : year, description, lang
	 * @param $bio ( array )
	 * @return $this
     */
    public function addBio($bio = array()){
         if(isset($bio)):
            // Transformation de tous les caractère spéciaux par leur entités html
            $year = htmlspecialchars($bio['year']);
            $description = htmlspecialchars($bio['description']);
            $langue = htmlspecialchars($bio['lang']);
              
            $request = "INSERT INTO bio(year,description,lang) ";
            $request .= 'VALUES("'.$year.'","'.$description.'","'.$langue.'")';
			
            try{
                $this->pdo->exec($request);
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
    /*
     * deleteBio
     * Permet de supprimer une ou plusieurs périodes
     * Attend une liste d'id
	 * @param $list_id ( array )
	 * @return $this
     */
    public function deleteBio($list_id = array()){
        if(isset($list_id)):
            try{
                foreach($list_id as $is):
                    $request = "DELETE FROM bio
						WHERE idPeriod=".$id;
						
                    $this->pdo->exec($request);
                endforeach;
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
}