<?php
class Bahanbakar {
    private $id_bahanbakar;
    private $nama_bahanbakar;
    private $harga;
    private $poin;


    /**
     * Get the value of id_bahanbakar
     */ 
    public function getId_bahanbakar()
    {
        return $this->id_bahanbakar;
    }

    /**
     * Set the value of id_bahanbakar
     *
     * @return  self
     */ 
    public function setId_bahanbakar($id_bahanbakar)
    {
        $this->id_bahanbakar = $id_bahanbakar;

        return $this;
    }

    /**
     * Get the value of nama_bahanbakar
     */ 
    public function getNama_bahanbakar()
    {
        return $this->nama_bahanbakar;
    }

    /**
     * Set the value of nama_bahanbakar
     *
     * @return  self
     */ 
    public function setNama_bahanbakar ($nama_bahanbakar)
    {
        $this->nama_bahanbakar = $nama_bahanbakar;

        return $this;
    }

    /**
     * Get the value of harga
     */ 
    public function getHarga()
    {
        return $this->harga;
    }

    /**
     * Set the value of harga
     *
     * @return  self
     */ 
    public function setHarga($harga)
    {
        $this->harga = $harga;

        return $this;
    }

    /**
     * Get the value of poin
     */ 
    public function getPoin()
    {
        return $this->poin;
    }

    /**
     * Set the value of poin
     *
     * @return  self
     */ 
    public function setPoin($poin)
    {
        $this->poin = $poin;

        return $this;
    }

}
?>