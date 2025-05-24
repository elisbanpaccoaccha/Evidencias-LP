<?php
  class Pentavocalica{
      private $cadena;
      public function __construct($cadena){
          $this->cadena = $cadena;
      }
      public function getCadena(){
          return $this->cadena;
      }
      public function setCadena($cadena){
          if(strlen($cadena) > 0)
              $this->cadena = $cadena;
          else
              $this->cadena = 0;
      }
      public function esPentavocalica($c){
          $a = $e = $i = $o = $u = 0;
          for($l = 0; $l < strlen($c); $l++){
              if($c[$l]=='a' || $c[$l]=='A'){ $a++; }
              if($c[$l]=='e' || $c[$l]=='E'){ $e++; }
              if($c[$l]=='i' || $c[$l]=='I'){ $i++; }
              if($c[$l]=='o' || $c[$l]=='O'){ $o++; }
              if($c[$l]=='u' || $c[$l]=='U'){ $u++; }
          }
          if($a >= 1 && $e >= 1 && $i >= 1 && $o >= 1 && $u >= 1){
              return true;
          }
          return false;
      }
  }
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Pentavocalica</title>
  </head>
  <body>
      <h1>Pentavocalica</h1>
      <?php
      $p1 = new Pentavocalica("albaricoque");
      $p2 = new Pentavocalica("seculariza");
      $p3 = new Pentavocalica("");
      $p3->setCadena("peliagudo");
      $p4 = new Pentavocalica("");
      $p4->setCadena("abracadabra");
      if($p1->esPentavocalica($p1->getCadena())== true){
          echo "SI <br>";
      } else {
          echo "NO <br>";
      }

      if($p2->esPentavocalica($p2->getCadena())== true){
        echo "SI <br>";
    } else {
        echo "NO <br>";
    }
    if($p3->esPentavocalica($p3->getCadena())== true){
        echo "SI <br>";
    } else {
        echo "NO <br>";
    }
    if($p4->esPentavocalica($p4->getCadena())== true){
        echo "SI <br>";
    } else {
        echo "NO <br>";
    }
      ?>
  </body>
</html>
