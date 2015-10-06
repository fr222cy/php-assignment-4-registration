<?php


class RegisterDAL
{

    private $user;
   
    public function __construct()
    {
        $this->users = array();
        $this->binFile = 'data/database.bin';
    }
    
    public function AddUser($user)
    {
        $this->user = $user;
        $this->users = $this->getUsers();
        if(!$this->users)
        {
            $this->users = array();
        }
        
        array_push($this->users,$this->user);
        $serialized = serialize($this->users);
        
        file_put_contents($this->binFile,$serialized);
    }
    
    public function getUsers()
    {
        $binFile = 'data/database.bin';
        return unserialize(file_get_contents($this->binFile));
    }

}