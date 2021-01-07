<?php
class memberLogin{
    private $id_member;
    private $password;

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