<?php


class RegisterDAL
{

private $user;

public function __construct()
{
    $this->users = array();
}

public function AddUser($user)
{
    $this->user = $user;
    $this->users = $this->getUsers();
    
    array_push($this->users,$this->user);
    $serialized = serialize($this->users);
    
    $binFile = 'data/database.bin';
    file_put_contents($binFile,$serialized);
}

public function getUsers()
{
    $binFile = 'data/database.bin';
    return unserialize(file_get_contents($binFile));
}


}