<?php 

class Orders {
    private $details_id;
    private $names;
    private $prix_total;
    private $commande_id;
    private $id_user;
    private $confirm_achter;
    private $created_at;

    public function __construct($details_id, $names, $prix_total, $commande_id, $id_user, $confirm_achter, $created_at) {
        $this->details_id = $details_id;
        $this->names = $names;
        $this->prix_total = $prix_total;
        $this->commande_id = $commande_id;
        $this->id_user = $id_user;
        $this->confirm_achter = $confirm_achter;
        $this->created_at = $created_at;
    }

    public function getDetailsId() {
        return $this->details_id;
    }

    public function getNames() {
        return $this->names;
    }

    public function getPrixTotal() {
        return $this->prix_total;
    }

    public function getCommandeId() {
        return $this->commande_id;
    }

    public function getUserId() {
        return $this->id_user;
    }

    public function getConfirmAchter() {
        return $this->confirm_achter;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }
}


