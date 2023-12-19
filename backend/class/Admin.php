<?php 

class Admin {
    private $id;
    private $Email;
    private $Password;
    private $super_admin;


    public function __construct( $id, $Email, $Password, $super_admin = "0") 
    {
        $this->id = $id;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->super_admin = $super_admin;
 
    }

    

    



   
    public function getId()
    {
        return $this->id;
    }

   
    public function getEmail()
    {
        return $this->Email;
    }

  
    public function getPassword()
    {
        return $this->Password;
    }


    public function getSuper_admin()
    {
        return $this->super_admin;
    }
}