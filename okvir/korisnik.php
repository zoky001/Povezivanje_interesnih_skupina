<?php

class Korisnik {

    private $kor_ime;
    private $ime;
    private $prezime;
    private $lozinka;
    private $vrsta = 9;
    private $prijavljen_od;
    private $status = 0;
    private $adresa;
    private $korisnikID;
    private $email;
    private $verificirano;
    private $broj_ne_prijava;
    private $dvakoraka;
    private $dvakorakaKod = "";
    public function __construct() {
        
    }

    public function set_podaci($p_kor_ime, $p_ime, $p_prezime, $p_lozinka, $vrsta, $email, $ver, $bnp, $dvakoraka, $dvaKod, $id) {

        $this->dvakorakaKod = $dvaKod;
        $this->dvakoraka = $dvakoraka;
        $this->broj_ne_prijava = $bnp;
        $this->verificirano = $ver;
        $this->email = $email;
        $this->korisnikID = $id;

        $this->kor_ime = $p_kor_ime;
        $this->ime = $p_ime;
        $this->prezime = $p_prezime;
        $this->lozinka = $p_lozinka;
        $this->vrsta = $vrsta;
        $this->prijavljen_od = time();
        $this->status = 0;
        $this->adresa = $_SERVER["REMOTE_ADDR"];
    }

    public function set_status($p_status) {
        $this->status = $p_status;
    }

    public function get_status() {
        return $this->status;
    }

    public function get_kor_ime() {
        return $this->kor_ime;
    }

    public function get_ID() {
        return $this->korisnikID;
    }

    public function get_ime_prezime() {
        return $this->ime . " " . $this->prezime;
    }

    public function get_prezime() {
        return $this->prezime;
    }

    public function get_ime() {
        return $this->ime;
    }

    public function get_vrsta() {
        return $this->vrsta;
    }

    public function get_prijavljen_od() {
        return date("d.m.Y H:i:s", $this->prijavljen_od);
    }

    public function get_aktivan() {
        return time() - $this->prijavljen_od;
    }

    public function get_adresa() {
        return $this->adresa;
    }

}

?>
