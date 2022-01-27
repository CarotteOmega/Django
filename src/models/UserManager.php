<?php

class UserManager
{

    /**
     * @var PDO $_db
     */
    private $_db; // Instance de PDO
    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function add(User $user)
    {
        if(strlen($user->getPassword()) < 6){
            $GLOBALS['error'] = 'Password too short';
            return 'Password too short';
        }


        try {
            $q = $this->_db->prepare('SELECT * FROM User WHERE login = :idUser');
            $q->bindValue(':idUser', $user->getUsername());
            $q->execute();
            if($q->fetch() !=null){
                $GLOBALS['error'] = 'Username already exist';
                return 'Username already exist';
            }
        }catch (Error $e){
            $GLOBALS['error'] = 'SQL ERROR';
            return 'une erreur:' . $e;
        }
        $q = $this->_db->prepare('INSERT INTO User(login, email, pwd) VALUES(:login, :email, :pwd)');
        $q->bindValue(':login', $user->getUsername());
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':pwd', self::encrypt($user->getPassword()));
       // $q->bindValue(':vote', $user->getImgSrc());

        if($q->execute()) {
            return $user;
        }else{
            $GLOBALS['error'] = 'Cant add user';
            return 'Une erreur est survenue';
        }
    }

    //TODO PAS FAIT

    public static function encrypt($password) :string {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    public function login(User $user)
    {
        $q = $this->_db->prepare('SELECT * FROM User WHERE login = :idUser');
        $q->bindValue(':idUser', $user->getUsername());

        try {
            $q->execute();
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            if($donnees == null){
                $GLOBALS['error'] = 'User not found';
                    return 'User not found';
                }

            if(self::isValidPassword($user->getPassword(), $donnees['pwd'])){

                if($donnees['login']) $donnees['username'] = $donnees['login'];
                if($donnees['pwd']) $donnees['password'] = $donnees['pwd'];
                if($donnees['admin']) $donnees['isadmin'] = $donnees['admin'];

                return new User($donnees);
            }else{
                $GLOBALS['error'] = 'bad Password';
                return 'Bad Password';
            }
        }catch (Error $e){
            $GLOBALS['error'] = 'bad Username';
            return 'Bad Username';
        }
    }

    public static function isValidPassword($password, $hash) :bool {
        if(password_verify($password, $hash)){
            return true;
        }else{
            return false;
        }
    }

    public function update(Film $film)
    {
        $q = $this->_db->prepare('UPDATE film SET nom = :nom, annee = :annee, score = :score, vote = :vote WHERE id = :id');

        $q->bindValue(':nom', $film->getNom());
        $q->bindValue(':annee', $film->getAnnee());
        $q->bindValue(':score', $film->getScore());
        $q->bindValue(':vote', $film->getNbVote());
        $q->bindValue(':id', $film->getId());

        $q->execute();
    }

}

