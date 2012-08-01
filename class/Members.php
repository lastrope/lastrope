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
     */
    public function __construct($pdo, $lang){
        /** Set the connection database **/
        $this->pdo = $pdo;
        $this->lang = $lang;
        return $this;
    }
    /*
     *  getAllMembers 
     *  Permet de récupérer toutes les infos de tous les membres
     */
    public function getAllMembers(){
        $request = "SELECT idMembers,name,firstname,surname, picture, birthday FROM members";
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
    /*
     *  getMemberById 
     *  permet les infos pour un membre de par son ID
     */
    public function getMembersById($id){
        $request = "SELECT idMembers,name,firstname,surname, picture, birthday ";
        $request .= "FROM members WHERE idMembers =".$id;
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
    /*
     *  addMembers
     *  Permet d'ajouter un membre dans la base 
     *  Méthode attendant un tableau indexé sur les index :
     *  firstname
     *  name 
     *  surname
     *  picture
     *  birthday
     */
    public function addMembers($member = array()){
        if(isset($member)):
            // Transformation de tous les caractère spéciaux par leur entités html
            $firstname  = htmlspecialchars($member['firstname']);
            $name       = htmlspecialchars($member['name']);
            $surname    = htmlspecialchars($member['surname']);
            $picture    = htmlspecialchars($member['picture']);
            $birthday   = htmlspecialchars($member['birthday']);
            
            $request = "INSERT INTO members(firstname,name,surname,picture,birthday) ";
            $request .= ' VALUES("'.$firstname.'","'.$name.'","'.$surname.'","'.$picture.'","'.$birthday.'")';
            try{
                $this->pdo->exec($request);
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
    /*
     *  deleteMembers 
     *  Permet de supprimer un ou plusieurs membres
     *  attend une liste d'id
     */
    public function deleteMembers($list_id = array()){
        if(isset($list_id)):
            try{
                foreach($list_id as $id):
                    $request = "DELETE FROM members WHERE idActus=".$id;
                    $this->pdo->exec($request);
                endforeach;
            }catch(PDOException $e){
                print $e->getMessage();
            }
        endif;
        return $this;
    }
}