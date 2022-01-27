<?php

class User
{
    protected $id,
        $username,
        $password,
        $email,
        $img_src,
        $isAdmin;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    public function hydrate(array $donnees)
    {


        if($donnees['username']) {
            $this->setId($donnees['id'] ? $donnees['id'] : null);
            $this->setUsername($donnees['username']);
            $this->setPassword($donnees['password']);
            $this->setEmail($donnees['email']);
            $this->setIsAdmin($donnees['isadmin'] ? $donnees['isadmin'] : false);
        }else{
            echo "error";
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        if($this->username) {
            return $this->username;
        }else {
            return "";
        }

    }

    /**
     * @param string $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     */
    public function setIsAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getImgSrc()
    {
        return $this->img_src;
    }

    /**
     * @param string $img_src
     */
    public function setImgSrc($img_src): void
    {
        $this->img_src = $img_src;
    }



    public function __toString()
    {
        return ("Le user: " . $this->getUsername() . " a pour id : " . $this->getId());
    }

}

