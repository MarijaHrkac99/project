<?php
require ("db.php");
include("static/header.php");

if(isset($_POST['ime'])){
    $greska="";
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $korisnicko_ime=$_POST['kor_ime'];
    $email=$_POST['email'];
    $lozinka=md5($_POST['lozinka']);
    $potvrda=$_POST['potvrda'];
 
    if(empty($ime) || empty($prezime) || empty($korisnicko_ime) || empty($email) || empty($lozinka) || empty($potvrda)  )
        $greska ="Nisu uneseni svi podaci.";
    else {
        $upit="SELECT * FROM korisnik WHERE korisnicko_ime ='".$korisnicko_ime."'";

        $res=mysqli_query($konekcija, $upit);
        if (mysqli_num_rows($res) > 0){
            $greska ="Korisnik već postoji u bazi.";
        } else if($lozinka != md5($potvrda)){
            $greska ="Lozinke nisu jednake.";
        } else {
            $upit = "INSERT INTO `korisnik` (`ID`, `korisnicko_ime`, `ime`, `prezime`, `email`, `lozinka`, `uloge`) VALUES (NULL, '$korisnicko_ime', '$ime', '$prezime', '$email', '$lozinka', 'administrator');";
            $greska = mysqli_query($konekcija, $upit);
            
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Registracija na sustav Kozmetički salon Fancy!</title>
    <style>
        html, body {
            height:100% !important;
            
            background-position: center;
  background-repeat: no-repeat;
  background-size: cover; 
        background-image: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.dalmamall.ae%2Fmedia%2F2451%2Fnayomi-beauty-salon-c-en-ar.jpg%3Fanchor%3Dcenter%26mode%3Dcrop%26width%3D1400%26height%3D500%26rnd%3D131846666480000000&f=1&nofb=1');
        }
       
    
    </style>
  </head>
  <body>
    <div class="container h-100 bg-white " style="width: 600px;opacity: 0.85;" >
        <div class="row align-items-center h-100" style="width: 600px;" >
            <div class="col shadow p-5">
                <h5>Registracija na sustav Kozmetički salon Fancy</h5>
                <?php if (isset($greska) && $greska != 1): ?>
                <div class="alert alert-danger"><?php echo($greska) ?></div>
                <?php endif ?>
                <?php if (isset($greska) && $greska == 1): ?>
                <div class="alert alert-success" ><?php echo("Uspjeh!") ?></div>
                <?php endif ?>
                <form method="POST" name="registracija" action="registracija.php" >
                    <div class="form-group">
                        <label>Ime:</label>
                        <input type="text" class="form-control" name="ime" placeholder="Unesite Vaše ime" />
                    </div>

                    <div class="form-group">
                        <label>Prezime:</label>
                        <input type="text" class="form-control" name="prezime" placeholder="Unesite Vaše prezime" />
                    </div>

                    <div class="form-group">
                        <label>Korisnicko ime:</label>
                        <input type="text" class="form-control" name="kor_ime" placeholder="Unesite korisničko ime" />
                    </div>

                    <div class="form-group">
                        <label>E-mail adresa:</label>
                        <input type="email" class="form-control" name="email" placeholder="Unesite Vašu email adresu" />
                    </div>

                    <div class="form-group">
                        <label>Vaša lozinka:</label>
                        <input type="password" class="form-control" name="lozinka" placeholder="Unesite Vašu lozinku" />
                    </div>

                    <div class="form-group">
                        <label>Ponovite Vašu lozinku:</label>
                        <input type="password" class="form-control" name="potvrda" placeholder="Potvrdite Vašu lozinku" />
                    </div>

                    <br /> <br />

                    <button type="submit" class="btn btn-primary">Pošalji obrazac</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>