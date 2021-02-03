<?php
include("static/header1.php");

?>
<?php
session_start();
if(!isset($_SESSION["token"])) header("Location: login.php");
include("db.php");

$id=$_SESSION["token"];
$upit="SELECT * FROM korisnik WHERE ID=".$id;

$rezultat=mysqli_query($konekcija,$upit);
$prijavljeni_korisnik=mysqli_fetch_assoc($rezultat);



?>

<!DOCTYPE html>
<html>
<head>
<style>
       html, body {
        
        height: 100%;
        
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover; 
  background-image: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.dalmamall.ae%2Fmedia%2F2451%2Fnayomi-beauty-salon-c-en-ar.jpg%3Fanchor%3Dcenter%26mode%3Dcrop%26width%3D1400%26height%3D500%26rnd%3D131846666480000000&f=1&nofb=1');}
</style>
<style>
.p2{
    font-family:"Lucida Handwriting",Cursive;
    font-size:40px;
   
}

.sve{
    opacity: 0.8;
    background-color:white;
}
.h3{
  font-family:"Lucida Handwriting",Cursive;
  font-size:40px;
}
</style>
</head>
<body>

<div style="margin-top:100px">
    <b-container fluid>
      
      <b-jumbotron>
        <div class="sve" style="text-align:center">
           
           
         
        <div class="container h-100 bg-white " style="width: 600px;opacity: 0.85;" >
        <div class="row align-items-center h-100" style="width: 600px;" >
            <div class="col shadow p-5">
               <h3 class="h3">Dobrodošli!</h3> <?php echo($prijavljeni_korisnik["ime"]. " " .$prijavljeni_korisnik["prezime"]) ?>
               <br/><br/><a href="logout.php"><button type="submit" class="btn btn-dark">Odjavite se</button></a>
            </div>
        </div>
    </div>
       

         
        </div>
        
        <br/>
       
      </b-jumbotron>
     
     


    </b-container>

  </div>



</body>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php
include("static/footer.php");

?>
</html>
