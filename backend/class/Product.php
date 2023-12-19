<?php 

class Product {

    private $reference;
    private $etiquette;
    private $codeBarres;
    private $prixAchat;
    private $img;
    private $prixFinal;
    private $offreDePrix;
    private $description;
    private $quantiteMin;
    private $quantiteStock;
    private $categorieID;
    private $deletedAt;

    public function __construct( $reference, $etiquette, $codeBarres, $prixAchat, $img, $prixFinal, $offreDePrix, $description, $quantiteMin, $quantiteStock, $categorieID, $deletedAt) 
    {
        $this->reference = $reference;
        $this->etiquette = $etiquette;
        $this->codeBarres = $codeBarres;
        $this->prixAchat = $prixAchat;
        $this->img = $img;
        $this->prixFinal = $prixFinal;
        $this->offreDePrix = $offreDePrix;
        $this->description = $description;
        $this->quantiteMin = $quantiteMin;
        $this->quantiteStock = $quantiteStock;
        $this->categorieID = $categorieID;
        $this->deletedAt = $deletedAt;
    }

    



    public function getReference() {
        return $this->reference;
    }

    public function getEtiquette() {
        return $this->etiquette;
    }

    public function getCodeBarres() {
        return $this->codeBarres;
    }

    public function getPrixAchat() {
        return $this->prixAchat;
    }

    public function getImg() {
        return $this->img;
    }

    public function getPrixFinal() {
        return $this->prixFinal;
    }

    public function getOffreDePrix() {
        return $this->offreDePrix;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantiteMin() {
        return $this->quantiteMin;
    }

    public function getQuantiteStock() {
        return $this->quantiteStock;
    }

    public function getCategorieID() {
        return $this->categorieID;
    }

    public function getDeletedAt() {
        return $this->deletedAt;
    }
}