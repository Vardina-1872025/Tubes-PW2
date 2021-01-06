<?php
class pegawai {
    private $id_pegawai;
    private $nama_pegawai;
    private $nip;
    private $password;
    private $id_cabang;
    private $total_rating;
    private $jabatan;

    

    /**
     * Get the value of id_pegawai
     */ 
    public function getId_pegawai()
    {
        return $this->id_pegawai;
    }

    /**
     * Set the value of id_pegawai
     *
     * @return  self
     */ 
    public function setId_pegawai($id_pegawai)
    {
        $this->id_pegawai = $id_pegawai;

        return $this;
    }

    /**
     * Get the value of nama_pegawai
     */ 
    public function getNama_pegawai()
    {
        return $this->nama_pegawai;
    }

    /**
     * Set the value of nama_pegawai
     *
     * @return  self
     */ 
    public function setNama_pegawai($nama_pegawai)
    {
        $this->nama_pegawai = $nama_pegawai;

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
     * Get the value of total_rating
     */ 
    public function getTotal_rating()
    {
        return $this->total_rating;
    }

    /**
     * Set the value of total_rating
     *
     * @return  self
     */ 
    public function setTotal_rating($total_rating)
    {
        $this->total_rating = $total_rating;

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