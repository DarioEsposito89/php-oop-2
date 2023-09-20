<?php

class category {

    private String $species;
    private String $iconCategory;

    function __construct(String $_species, String $_iconCategory) 
    {
        $this->setSpecies($_species);
        $this->setIconCategory($_iconCategory);
    }


    public function getSpecies() 
    {
        return $this->species;
    }

    public function setSpecies($_species) 
    {
        if(strlen($_species)) {
            $this->species = $_species;
        } else {
            $this->species = 'sconosciuta'; 
        }

        return $this;
    }

    public function getIconCategory() 
    {
        return $this->iconCategory;
    }

    public function setIconCategory($_iconCategory) 
    {
        if(strlen($_iconCategory)) {
            $this->iconCategory = $_iconCategory;
        } else {
            $this->iconCategory = 'default.png'; 
        }

        return $this;
    }
}
?>