<?php

class Szopar {
    
    /**
     * @var string
     */
    public $eredeti;

    /**
     * @var string
     */
    public $forditott;

}

class Szavak {
    
    /**
     *  @param string $szo
     *  @return integer
     */
    
    public function hossz($szo)
    {
        $eredmeny = strlen($szo);
        return $eredmeny;
    }
   
    /**
     *  @param string $szo
     *  @return Szopar
     */
    
    public function forditott($szo)
    {
        $forditott = "";
        for($i=strlen($szo)-1; $i>=0; $i--)
            $forditott .= $szo[$i];
        $eredmeny = Array("eredeti"=>$szo, "forditott"=>$forditott);
        return $eredmeny;
    }
    
    /**
     *  @param string $szo
     *  @return string[]
     */
    
    public function reszszavak($szo)
    {
        $eredmeny = Array();
        for($i=0; $i<strlen($szo); $i++)
            for($j=1; $j<=strlen($szo)-$i; $j++)
                $eredmeny[] = substr($szo, $i, $j);
        return $eredmeny;
    }
    
}

?>
