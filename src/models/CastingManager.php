<?php

class CastingManager

{


    private $_db; // Instance de PDO
    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function add(Acteur $acteur, Film $film)
    {
        $q = $this->_db->prepare('INSERT INTO Casting(film_id, acteur_id) VALUES(:film_id, :acteur_id)');

        $q->bindValue(':film_id', $film->getId());
        $q->bindValue(':acteur_id', $acteur->getId());
        $q->execute();
    }

    public function castingByActeur(Acteur $acteur): array
    {
        $q = $this->_db->prepare('SELECT * FROM Casting LEFT JOIN film on Casting.film_id = film.id WHERE Casting.acteur_id = :id');
        $q->bindValue(':id', $acteur->getId(), PDO::PARAM_INT);
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        $casting = array();
        if ($data) {
            foreach ($data as $film) {
                $casting[] = new Film($film);
            }
            return $casting;
        }
        return array();
    }

    public function castingByFilm(Film $film): array
    {
        $q = $this->_db->prepare('SELECT * FROM Casting LEFT JOIN acteurs on Casting.acteur_id = acteurs.id WHERE Casting.film_id = :id');
        $q->bindValue(':id', $film->getId(), PDO::PARAM_INT);
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        $casting = array();
        if ($data) {
            foreach ($data as $acteur) {
                $casting[] = new Acteur($acteur);
            }
            return $casting;
        } else {
            return array();
        }
    }




    public function delete(Acteur $acteur, Film $film): bool
    {
        $q = $this->_db->prepare('DELETE FROM Casting WHERE acteur_id = :acteurid AND film_id = :filmid');
        $q->bindValue(':acteurid', $acteur->getId());
        $q->bindValue(':filmid', $film->getId());
        return $q->execute();
    }

    public function deleteActeur(Acteur $acteur): bool
    {
        $q = $this->_db->prepare('DELETE FROM Casting WHERE acteur_id = :acteurid');
        $q->bindValue(':acteurid', $acteur->getId());
        return $q->execute();
    }

    public function deleteFilm(Film $film): bool
    {
        $q = $this->_db->prepare('DELETE FROM Casting WHERE film_id = :filmid');
        $q->bindValue(':filmid', $film->getId());
        return $q->execute();
    }



    public function getList()
    {

        $acteurs = [];
        $q = $this->_db->query('SELECT * FROM acteurs ORDER BY nom');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $acteurs[] = new Acteur($donnees);
        }

        return $acteurs;
    }


    public function update(Acteur $acteur)
    {
        $q = $this->_db->prepare('UPDATE acteurs SET nom = :nom, prenom = :prenom WHERE id = :id');

        $q->bindValue(':nom', $acteur->getNom());
        $q->bindValue(':prenom', $acteur->getPrenom());
        $q->bindValue(':id', $acteur->getId());

        $q->execute();
    }
}