<?php


include("static/header1.php");


// (A) PROCESS RESERVATION
if (isset($_POST['date'])) {
  require "2-reserve.php";
  if ($_RSV->save(
    $_POST['date'], $_POST['slot'], $_POST['name'],
    $_POST['email'], $_POST['tel'], $_POST['notes'])) {
     echo "<div class='ok'>Rezervacija spremeljena.</div>";
  } else { echo "<div class='err'>".$RESERVE->error."</div>"; }
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
<body >

<br/><h1 class="text">Rezervacija</h1>

<div class="container">
  <div class="row">
    <div class="col-sm-5">
    <form id="resForm" method="post" target="_self">
  <label for="res_name">Ime</label>
  <input type="text" required name="name" />
  <label for="res_email">Email</label>
  <input type="email" required name="email"/>
  <label for="res_tel">Telefon</label>
  <input type="text" required name="tel" />
  <label for="res_notes">Natuknica</label>
  <input type="text" name="notes" />
  <label>Datum rezervacije</label>
  <input type="date" required id="res_date" name="date" value="<?=date("Y-m-d")?>">
  <label>Vrijeme dolaska</label>
  <select name="slot">
    <option value="AM">Prije podne</option>
    <option value="PM">Poslije podne</option>
  </select>
  <input type="submit" value="Pošalji"/>
</form>

    </div>
    <br/>
    <div class="col-sm-7">
    <div class="container">
  <div class="row">
    <div class="col-sm-6">
    <br/><br/>
    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.98Jd9zRHNsl-4ZjKaWe39AHaHa%26pid%3DApi&f=1" width="350px" height="250px">
      <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.B5BC_2Mvh7Cd6DJBGnEOOwHaHa%26pid%3DApi&f=1" width="350px" height="250px">
    </div>
    <div class="col-sm-6">
    <br/><br/>
    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.WxUK5RwdzDfQBtKcJpZ_hAHaE9%26pid%3DApi&f=1"width="350px" height="250px" >
      <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.hQCkt06cG_-eWSmepa3M_QHaFj%26pid%3DApi&f=1"width="350px" height="250px" >
    </div>
    
  </div>
</div>

</body>
    <style>
    #resForm {
      
    max-width: 400px;
    padding: 15px;
    background: white;
    border-radius:10px;
    border: inset lightPink;
   
  }
  #resForm label, #resForm input, #resForm select {
    display: block;
    box-sizing: border-box;
    width: 100%;
    padding: 5px;
    
    margin: 5px 0;
  }
  #resForm input[type="submit"] {
    background: #5c76d4;
    color: #fff;
    border: 0;
    padding: 15px 0;
    margin-top: 15px;
    cursor: pointer;
  }
  div.ok, div.err { 
    padding: 5px; 
    font-weight: bold;
  }
  div.ok { 
    background: #9cffbb; 
    border: 1px solid #1ca526;
  }
  div.err { 
    background: #ffe0e0; 
    border: 1px solid #bb1919;
  }
  html, body { font-family: arial, sans-serif;
  background: #ffe4e1;
   }
   .text{
     text-align:center;
     font-family:"Lucida Handwriting",Cursive;
   }
   
    </style>

        
    

  </head>

