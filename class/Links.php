<?php
/**
 * Class Links
 * Manage the link's sites ( navigation , etc.. )
 */
class Links{
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
    /**
     * getAllLinks
     * @param type $pdo
     * @param type $lang
     * @return array $result ( assoc )
     */
    public function getAllLinks($lang = "fr"){
        $request = "SELECT idLinks, text, href FROM links WHERE lang=\"$lang\"";
		$links_array = array();
		
        try{
            $result = $this->pdo->query($request);
            while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
				$links_array[$ligne['idLinks']] = $ligne;
			}
			return $links_array;
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return array();
    }
}