<?php
class User
{
    private $con, $sqlData;

    public function __construct($con, $userName)
    {
        $this->con = $con;

        $query = $con->prepare("SELECT * FROM users WHERE userName=:userName");
        $query->bindValue(":userName", $userName);
        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getFirstName()
    {
        return $this->sqlData["firstName"];
    }

    public function getLastName()
    {
        return $this->sqlData["lastName"];
    }

    public function getEmail()
    {
        return $this->sqlData["email"];
    }

    public function getUserName()
    {
        return $this->sqlData["userName"];
    }
    
}
