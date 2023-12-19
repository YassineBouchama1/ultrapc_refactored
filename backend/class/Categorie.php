<?php 
class Categorie {
    private $id;
    private $nom;
    private $description;
    private $img;
    private $deleted_at;

    public function __construct($id, $nom, $description, $img, $deleted_at) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->img = $img;
        $this->deleted_at = $deleted_at;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImg() {
        return $this->img;
    }

    public function getDeletedAt() {
        return $this->deleted_at;
    }
}
