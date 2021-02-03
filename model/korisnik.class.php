<?php
session_start();


class Korisnik {
    public static $prijavljeniKorisnik;

    public static function jePrijavljen(){
        global $konekcija;
        $id = $_SESSION["token"];
        $upit = "SELECT * FROM korisnik WHERE ID=".$id;
        $rezultat = mysqli_query($konekcija, $upit);
        self::$prijavljeniKorisnik = mysqli_fetch_assoc($rezultat);
        if (self::$prijavljeniKorisnik) {
            return true;
        }
        return false;
    }

    public static function spasi ($korisnik){
        global $konekcija;
        $ime = htmlspecialchars(mysqli_real_escape_string($konekcija, $korisnik["ime"]));
        $korisnicko_ime = htmlspecialchars(mysqli_real_escape_string($konekcija, $korisnik["kor_ime"]));
        $prezime = htmlspecialchars(mysqli_real_escape_string($konekcija, $korisnik["prezime"]));
        $email = htmlspecialchars(mysqli_real_escape_string($konekcija, $korisnik["email"]));
        $lozinka = md5($korisnik["lozinka"]);
        $uloga = htmlspecialchars(mysqli_real_escape_string($konekcija, $korisnik["uloga"]));
        if (isset($korisnik["id"]) && $korisnik["id"] == "")
            $upit = "INSERT INTO korisnik VALUES (null, '".$ime."','".$korisnicko_ime."', '".$prezime."', '".$email."', '".$lozinka."', '".$uloga."');";
        else
            if ($lozinka != md5(""))
                $upit = "UPDATE korisnik SET ime='".$ime."',kor_ime='".$korisnicko_ime."', prezime='".$prezime."', email='".$email."', lozinka='".$lozinka."', uloga='".$uloga."' WHERE id=".$korisnik["id"].";";
            else
                $upit = "UPDATE korisnik SET ime='".$ime."',kor_ime='".$korisnicko_ime."', prezime='".$prezime."', email='".$email."', uloga='".$uloga."' WHERE id=".$korisnik["id"].";";
        return mysqli_query($konekcija, $upit);
    }

    public static function pobrisi($id){
        global $konekcija;
        $id = intval($id);
        $upit = "DELETE FROM korisnik WHERE ID=" . $id;
        return mysqli_query($konekcija, $upit);
    }

    public static function daj ($id) {
        global $konekcija;
        $upit = "SELECT * FROM korisnik WHERE ID=".$id;
        $rezultat = mysqli_query($konekcija, $upit);
        return mysqli_fetch_assoc($rezultat);
    }

    public static function dajSve () {
        global $konekcija;
        $upit = "SELECT * FROM korisnik";
        $rezultat = mysqli_query($konekcija, $upit);
        $lista = array();
        while ($redak = mysqli_fetch_assoc($rezultat))
            array_push($lista, $redak);
        return $lista;
    }
}

?>