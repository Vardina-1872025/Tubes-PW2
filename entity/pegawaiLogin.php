<?php
class pegawaiLogin {
    private $nip;
    private $password;


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

}
?>