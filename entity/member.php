<?php
class member{
    private $id_member;
    private $nama_member;
    private $email;
    private $no_telp;
    private $poin;
    private $plat_motor;
    private $plat_mobil;
    private $tipe_kendaraan;
    private $password;
    private $jabatan;

    /**
     * Get the value of id_member
     */ 
    public function getId_member()
    {
        return $this->id_member;
    }

    /**
     * Set the value of id_member
     *
     * @return  self
     */ 
    public function setId_member($id_member)
    {
        $this->id_member = $id_member;

        return $this;
    }

    /**
     * Get the value of nama_member
     */ 
    public function getNama_member()
    {
        return $this->nama_member;
    }

    /**
     * Set the value of nama_member
     *
     * @return  self
     */ 
    public function setNama_member($nama_member)
    {
        $this->nama_member = $nama_member;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of no_telp
     */ 
    public function getNo_telp()
    {
        return $this->no_telp;
    }

    /**
     * Set the value of no_telp
     *
     * @return  self
     */ 
    public function setNo_telp($no_telp)
    {
        $this->no_telp = $no_telp;

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

    /**
     * Get the value of plat_kendaraan
     */ 
    public function getPlat_motor()
    {
        return $this->plat_motor;
    }

    /**
     * Set the value of plat_kendaraan
     *
     * @return  self
     */ 
    public function setPlat_motor($plat_motor)
    {
        $this->plat_motor = $plat_motor;

        return $this;
    }

    /**
     * Get the value of plat_kendaraan
     */ 
    public function getPlat_mobil()
    {
        return $this->plat_mobil;
    }

    /**
     * Set the value of plat_kendaraan
     *
     * @return  self
     */ 
    public function setPlat_mobil($plat_mobil)
    {
        $this->plat_mobil = $plat_mobil;

        return $this;
    }

    /**
     * Get the value of tipe_kendaraan
     */ 
    public function getTipe_kendaraan()
    {
        return $this->tipe_kendaraan;
    }

    /**
     * Set the value of tipe_kendaraan
     *
     * @return  self
     */ 
    public function setTipe_kendaraan($tipe_kendaraan)
    {
        $this->tipe_kendaraan = $tipe_kendaraan;

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