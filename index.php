<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        require_once 'Beer.php';
        require_once 'Brewery.php';
        
        $beers = Beer::getAllBeer();
        foreach ($beers as $beer) {
            /**
             *
             * @var \Beer 
             */
            $beer;
            echo $beer->getName() . " " . $beer->getBreweryId() . "<br>\n"; 
        }
        
        $breweries = Brewery::getAllBrewery();
        foreach ($breweries as $brewery) {
            /**
             *
             * @var \Brewery 
             */
            $brewery;
            echo $brewery->getName() . "<br>\n";
        }
        
        $brwry = Brewery::getBrewery(1);
        echo $brwry->getName();
        ?>
    </body>
</html>
