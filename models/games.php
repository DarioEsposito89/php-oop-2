<?php

include_once __DIR__ . '/products.php';

class games extends products{

    private String $size;
    private Array $materials;

    function __construct(String $_title, String $_image, Float $_price, category $_category, String $_size, Array $_materials) 
    {
        parent::__construct($_title, $_image, $_price, $_category);
        $this->setSize($_size);
        $this->setMaterials($_materials);
    }

    public function getSize() 
    {
        return $this->size;
    }

    public function setSize($_size) 
    {
        if(strlen($_size)) {
            $this->size = $_size;
        } else {
            $this->size = "0x0"; 
        }

        return $this;
    }

    // Getter and Setter of materials
    public function getMaterials() 
    {
        return $this->materials;
    }

    public function setMaterials($_materials) 
    {
        if(count($_materials)) {
            $this->materials = $_materials;
        } else {
            $this->materials = ["Not Available"]; 
        }

        return $this;
    }
}
?>