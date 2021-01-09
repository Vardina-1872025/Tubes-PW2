<?php
class bertransaksi{
    private $id_transaksi;
    private $tanggal;
    private $id_member;
    private $id_pegawai;
    private $id_bahanbakar;
    private $liter;
    private $tot_poin;
    private $tanggal_exp_poin;
    private $rating;


    /**
     * Get the value of id_transaksi
     */ 
    public function getId_transaksi()
    {
        return $this->id_transaksi;
    }

    /**
     * Set the value of id_transaksi
     *
     * @return  self
     */ 
    public function setId_transaksi($id_transaksi)
    {
        $this->id_transaksi = $id_transaksi;

        return $this;
    }

    /**
     * Get the value of tanggal
     */ 
    public function getTanggal()
    {
        return $this->tanggal;
    }

    /**
     * Set the value of tanggal
     *
     * @return  self
     */ 
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;

        return $this;
    }

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
     * Get the value of id_bahanbakar
     */ 


    /**
     * Set the value of id_bahanbakar
     *
     * @return  self
     */ 

    /**
     * Get the value of liter
     */ 
    public function getLiter()
    {
        return $this->liter;
    }

    /**
     * Set the value of liter
     *
     * @return  self
     */ 
    public function setLiter($liter)
    {
        $this->liter = $liter;

        return $this;
    }

    /**
     * Get the value of tot_poin
     */ 
    public function getTot_poin()
    {
        return $this->tot_poin;
    }

    /**
     * Set the value of tot_poin
     *
     * @return  self
     */ 
    public function setTot_poin($tot_poin)
    {
        $this->tot_poin = $tot_poin;

        return $this;
    }

    /**
     * Get the value of tanggal_exp_poin
     */ 
    public function getTanggal_exp_poin()
    {
        return $this->tanggal_exp_poin;
    }

    /**
     * Set the value of tanggal_exp_poin
     *
     * @return  self
     */ 
    public function setTanggal_exp_poin($tanggal_exp_poin)
    {
        $this->tanggal_exp_poin = $tanggal_exp_poin;

        return $this;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }
}
?>