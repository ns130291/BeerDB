<?php
class Brewery{
    
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
    private $location_id;   
    
    function __construct($name, $location_id, $id=null) {
        $this->name = $name;
        $this->location_id = $location_id;
        $this->id = $id;
    }
    
    /**
     * Lädt alle Brauereien aus der DB
     * @return array Array mit \Brewery Objekten
     */
    public static function getAllBrewery(){
        $db = new mysqli("localhost", "root", "", "beerdb");
        $db->set_charset("utf8");
        $result = $db->query('SELECT * FROM brewery');
        
        $breweries = array();
        if($result){
            while($row = mysqli_fetch_row($result)){
                $brewery = new Beer($row[1], $row[0]);
                $breweries[] = $brewery;
            }
        }
        return $breweries;
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