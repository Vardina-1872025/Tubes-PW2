<?php
class Cabang {
    private $id_cabang;
    private $nama_cabang;
    private $alamat;
    private $no_telp_cabang;
    private $id_owner;

    

    /**
     * Get the value of id_cabang
     */ 
    public function getId_cabang()
    {
        return $this->id_cabang;
    }

    /**
     * Set the value of id_cabang
     *
     * @return  self
     */ 
    public function setId_cabang($id_cabang)
    {
        $this->id_cabang = $id_cabang;

        return $this;
    }

    /**
     * Get the value of nama_cabang
     */ 
    public function getNama_cabang()
    {
        return $this->nama_cabang;
    }

    /**
     * Set the value of nama_cabang
     *
     * @return  self
     */ 
    public function setNama_cabang ($nama_cabang)
    {
        $this->nama_cabang = $nama_cabang;

        return $this;
    }

    /**
     * Get the value of alamat
     */ 
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * Set the value of alamat
     *
     * @return  self
     */ 
    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;

        return $this;
    }

    /**
     * Get the value of no_telp_cabang
     */ 
    public function getNo_telp_cabang()
    {
        return $this->no_telp_cabang;
    }

    /**
     * Set the value of no_telp_cabang
     *
     * @return  self
     */ 
    public function setNo_telp_cabang($no_telp_cabang)
    {
        $this->no_telp_cabang = $no_telp_cabang;

        return $this;
    }

    /**
     * Get the value of id_owner
     */ 
    public function getId_owner()
    {
        return $this->id_owner;
    }

    /**
     * Set the value of id_owner
     *
     * @return  self
     */ 
    public function setId_owner($id_owner)
    {
        $this->id_owner = $id_owner;

        return $this;
    }

}
?>