<?php

class Location {
    
    /**
     *
     * @var int 
     */
    private $id;
    
    /**
     *
     * @var float 
     */
    private $lat;
    
    /**
     *
     * @var float 
     */
    private $long;
    
    /**
     *
     * @var string 
     */
    private $address;
    
    /**
     *
     * @var string 
     */
    private $city;
    
    /**
     *
     * @var string 
     */
    private $zip;
    
    function __construct($lat, $long, $city=null, $zip=null, $address=null, $id=null) {
        $this->lat = $lat;
        $this->long = $long;
        $this->city = $city;
        $this->zip = $zip;
        $this->address = $address;
        $this->id = $id;
    }   

    /**
     *
     * @param int $id
     * @return \Location 
     */
    public static function getLocation($id) {
        $db = new mysqli("localhost", "root", "", "beerdb");
        $db->set_charset("utf8");

        $result = $db->query('SELECT * FROM location WHERE id=' . $id . ';');
        
        if ($result) {
            $row = mysqli_fetch_row($result);
            $location = new Location($row[1], $row[2], $row[3], $row[4], $row[5], $row[0]);
        }
        return $location;
    }
}

?>
