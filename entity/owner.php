<?php
class Owner {
    private $id_owner;
    private $nama_owner;
    private $nip;
    private $password;
    private $jabatan;
	
	
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
    
    /**
     * Get the value of nama_owner
     */ 
    public function getNama_owner()
    {
        return $this->nama_owner;
    }

    /**
     * Set the value of nama_owner
     *
     * @return  self
     */ 
    public function setNama_owner ($nama_owner)
    {
        $this->nama_owner= $nama_owner;

        return $this;
    }

	/**
     * Get the value of nip
     */ 
    public function getNip()
    {
        return $this->nip;
    }

    /**
     * Set the value of nip
     *
     * @return  self
     */ 
    public function setNip($nip)
    {
        $this->nip = $nip;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

	/**
     * Get the value of jabatan
     */ 
    public function getJabatan()
    {
        return $this->jabatan;
    }

    /**
     * Set the value of jabatan
     *
     * @return  self
     */ 
    public function setJabatan($jabatan)
    {
        $this->jabatan = $jabatan;

        return $this;
    }
}
?>