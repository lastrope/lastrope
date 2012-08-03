<?php
/*
 *  Class Members : Gère les membres du groupe
 */
class Members{
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
     * getAllMembers 
     * Permet de récupérer toutes les infos de tous les membres
     * @return array $members_array ( assoc )
     */
    public function getAllMembers(){
        $request = "SELECT idMembers,name,firstname,surname, picture, birthday
			FROM members
			WHERE lang='".$this->lang."'";
		
        $members_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                    $members_array[$ligne['idMembers']] = $ligne;
            }
            return $members_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
    /**
     * getMemberById 
     * Permet les infos pour un membre de par son ID
	 * @param $id
	 * @return array $members_array ( assoc )
     */
    public function getMembersById($id){
        $request = "SELECT idMembers,name,firstname,surname, picture, birthday
			FROM members
			WHERE idMembers=".$id;
		
        $members_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
                    $members_array[$ligne['idMembers']] = $ligne;
            }
            return $members_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
    /**
     * addMembers
     * Permet d'ajouter un membre dans la base 
     * Méthode attendant un tableau indexé sur les index : firstname, name, surname, picture, birthday, instrument, influences, short_desc, lang
	 * @param $member ( array )
	 * @return $this
     */
    public function addMembers($member = array()){
        if(isset($member)):
            // Transformation de tous les caractère spéciaux par leur entités html
            $firstname  = htmlspecialchars($member['firstname']);
            $name = htmlspecialchars($member['name']);
            $surname = htmlspecialchars($member['surname']);
            $picture = htmlspecialchars($member['picture']);
            $birthday = htmlspecialchars($member['birthday']);
            $instrument = htmlspecialchars($member['instrument']);
            $influences = htmlspecialchars($member['influences']);
            $short_desc = htmlspecialchars($member['short_desc']);
            $langue = htmlspecialchars($member['lang']);
            
            $request = "INSERT INTO members(firstname,name,surname,picture,birthday,instrument,influences,short_desc,lang) ";
            $request .= 'VALUES("'.$firstname.'","'.$name.'","'.$surname.'","'.$picture.'","'.$birthday.'","'.$instrument.'","'.$influences.'","'.$short_desc.'","'.$langue.'")';
			
            try{
                $this->pdo->exec($request);
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
    /**
     * deleteMembers 
     * Permet de supprimer un ou plusieurs membres
     * Attend une liste d'id
	 * @param $list_id
	 * @return $this
     */
    public function deleteMembers($list_id = array()){
        if(isset($list_id)):
            try{
                foreach($list_id as $id):
                    $request = "DELETE FROM members
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