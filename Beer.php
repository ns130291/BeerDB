<?php

class Beer{
    /**
     *
     * @var int 
     */
    private $id;
    /**
     *
     * @var string 
     */
    private $name;
    /**
     *
     * @var int 
     */
    private $brewery_id;
    
    function __construct($name, $brewery_id, $id=null) {
        $this->name = $name;
        $this->brewery_id = $brewery_id;
        $this->id = $id;
    }
    
    /**
     * Lädt alle Biere aus der DB
     * @return array Array mit \Beer Objekten
     */
    public static function getAllBeer(){
        $db = new mysqli("localhost", "root", "", "beerdb");
        $db->set_charset("utf8");
        $result = $db->query('SELECT * FROM beer');
        
        $beers = array();
        if($result){
            while($row = mysqli_fetch_row($result)){
                $beer = new Beer($row[1], $row[2], $row[0]);
                $beers[] = $beer;
            }
        }
        return $beers;
    }
    
    /**
     *
     * @return int 
     */
    function getBreweryId(){
        return $this->brewery_id;
    }
    
    /**
     *
     * @return string 
     */
    function getName(){
        return $this->name;
    }
    
    /**
     *
     * @return int 
     */
    function getId(){
        return $this->id;
    }
}

?>
