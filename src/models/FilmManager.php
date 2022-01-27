<?php
class FilmManager
{

    /**
     * @var PDO $_db
     */
    private $_db; // Instance de PDO
  public function __construct(PDO $db)
  {
    $this->_db = $db;
  }

  public function add(Film $film, array $img = [])
  {
    $q = $this->_db->prepare('INSERT INTO film(nom, annee, score, nbVotants) VALUES(:nom, :annee, :score, :nb_vote)');
    $q->bindValue(':nom', $film->getNom());
    $q->bindValue(':annee', $film->getAnnee());
    $q->bindValue(':score', $film->getScore());
    $q->bindValue(':nb_vote', $film->getNbVote());
    $result = $q->execute();
    if($result){
       if($img) self::setImgSrc($film, $img);
        return(true);
    }else{
        return false;
    }

  }

  public function delete(Film $film): bool
  {
      $q = $this->_db->prepare('DELETE FROM film WHERE id = :id');
      $q->bindValue(':id', $film->getId());
      $result = $q->execute();
      if($result){
          self::deleteImgSrc($film->getId());
          return true;
      }else{
          return false;
      }
  }

  public function get($id): ?Film
  {
    $id = (int) $id;
      $q = $this->_db->prepare('SELECT * FROM film WHERE id =:idFilm');
      $q->bindValue(':idFilm', $id);

      try {
          $q->execute();
          $donnees = $q->fetch(PDO::FETCH_ASSOC);
          $film = new Film($donnees);
          $film->setImgSrc(self::getImgSrc($id));
          return $film;
      }catch (Error $e){
          return null;
  }
  }

    /**
     * @return Film
     */
  public function getList()
  {
      /* @var Film $films */
      $films = [];
      $q = $this->_db->query('SELECT * FROM film ORDER BY nom');

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
        $donnees['imgsrc'] = self::getImgSrc( $donnees['id']);
      $films[] = new Film($donnees);
    }

    return $films;
  }

  public function update(Film $film, array $img = [])
  {
    $q = $this->_db->prepare('UPDATE film SET nom = :nom, annee = :annee, score = :score, nbVotants = :vote WHERE id = :id');

    $q->bindValue(':nom', $film->getNom());
    $q->bindValue(':annee', $film->getAnnee());
    $q->bindValue(':score', $film->getScore());
    $q->bindValue(':vote', $film->getNbVote());
    $q->bindValue(':id', $film->getId());
      $result = $q->execute();
      if($result){
          if($img) self::setImgSrc($film, $img);
          return($q->execute());
      }else{
          return false;
      }
  }

    /**
     * @param $img_src
     */
    public function setImgSrc(Film $film, array $img_src): void
    {
        if(!$img_src) return;
        if($film->getId() == null) echo "error id null";

        if($img_src['size'] < 500000000 && $img_src['type'] == "image/png" ||$img_src['type'] == "image/jpeg" ) {

            if ($img_src) $this->img_src = $img_src;

            move_uploaded_file($img_src['tmp_name'], 'static/film/' . $film->getId() . '.png');

            // echo "le fichier a éjé ajouté: ". 'static/film/' . self::getId() . '.png';
        }      else{
            $GLOBALS['succes'] = "Modification échoué !";;
        }
    }

    /**
     * @return string
     */
    public function getImgSrc($id)
    {
       // if(isset($id) && $id !=null) $id = $film->getId();

        if(file_exists('static/film/'. $id .'.png')) {
            return 'static/film/' .$id . '.png';
        }
        else {
            return 'static/film/default.png';
        }
    }

    /**
     * @return bool
     */
    public function deleteImgSrc($id): bool
    {

        if(file_exists('static/film/'. $id .'.png')) {
            unlink('static/film/' .$id . '.png');
            return true;
        }
        else {
            return false;
        }
    }



}
