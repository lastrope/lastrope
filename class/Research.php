<?php

class Research {

    private $pdo = null;
    private $lang = null;

    /**
     * constructor 
     * @param $pdo 
     * @param $lang
     */
    public function __construct($pdo, $lang) {
	/** Set the connection database * */
	$this->pdo = $pdo;
	$this->lang = $lang;
    }

    public function execute($request = null) {

	try {
	    $result = $this->pdo->query($request);
	    if (isset($result) && !empty($result)) {
		$return = $result->fetchAll(PDO::FETCH_ASSOC);
		return $return;
	    }
	} catch (PDOException $e) {
	    return $e->getMessage();
	}
    }

}
