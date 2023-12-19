<?php 

class Cart {
    private $panier_id;
    private $etiquette;
    private $img;
    private $offre_de_prix;
    private $quantite_stock;
    private $stock;
    private $client_id;
    private $valid_commend;

    public function __construct($panier_id, $etiquette, $img, $offre_de_prix, $quantite_stock, $stock, $client_id, $valid_commend) {
        $this->panier_id = $panier_id;
        $this->etiquette = $etiquette;
        $this->img = $img;
        $this->offre_de_prix = $offre_de_prix;
        $this->quantite_stock = $quantite_stock;
        $this->stock = $stock;
        $this->client_id = $client_id;
        $this->valid_commend = $valid_commend;
    }

    public function getPanierId() {
        return $this->panier_id;
    }

    public function getEtiquette() {
        return $this->etiquette;
    }

    public function getImg() {
        return $this->img;
    }

    public function getOffreDePrix() {
        return $this->offre_de_prix;
    }

    public function getQuantiteStock() {
        return $this->quantite_stock;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getClientId() {
        return $this->client_id;
    }

    public function getValidCommend() {
        return $this->valid_commend;
    }
}


