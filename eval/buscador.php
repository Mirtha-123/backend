<?php
    $data = file_get_contents("data-1.json");
    $products = json_decode($data, true);
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $from = $_POST['from'];
    $to = $_POST['to'];


  for ($i=0; $i < count($products) ; $i++) {
    $dinero = str_replace(",","",$products[$i]["Precio"]);
    $total = str_replace("$","",$dinero);
    if ($products[$i]["Ciudad"]==$nombre && $from<= $total && $to >= $total && $products[$i]["Tipo"]==$tipo) {

      echo '<div id="hola"class="nueva white-text col s12 m12"><img src="./img/home.jpg" alt="" class="total col s5 m5 responsive-img "><p class="col s7 m7"><b>Direccion:</b>'.$products[$i]["Direccion"]. '<br><b>Ciudad:</b>'.$products[$i]["Ciudad"].'<br><b>Telefono:</b>'.$products[$i]["Telefono"].'<br><b>Codigo Postal:</b>'.$products[$i]["Codigo_Postal"].'<br><b>Tipo:</b>'.$products[$i]["Tipo"].'<br><b>Precio:</b>'.$products[$i]["Precio"].'</p></div>';
    }elseif ($products[$i]["Ciudad"]==$nombre && $from<= $total && $to >= $total && $tipo=="undefined") {

      echo '<div id="hola"class="nueva white-text col s12 m12"><img src="./img/home.jpg" alt="" class="total col s5 m5 responsive-img "><p class="col s7 m7"><b>Direccion:</b>'.$products[$i]["Direccion"]. '<br><b>Ciudad:</b>'.$products[$i]["Ciudad"].'<br><b>Telefono:</b>'.$products[$i]["Telefono"].'<br><b>Codigo Postal:</b>'.$products[$i]["Codigo_Postal"].'<br><b>Tipo:</b>'.$products[$i]["Tipo"].'<br><b>Precio:</b>'.$products[$i]["Precio"].'</p></div>';


    }elseif ($nombre=="undefined" && $from<= $total && $to >= $total && $products[$i]["Tipo"]==$tipo) {
        echo '<div id="hola"class="nueva white-text col s12 m12"><img src="./img/home.jpg" alt="" class="total col s5 m5 responsive-img total "><p class="col s7 m7"><b>Direccion:</b>'.$products[$i]["Direccion"]. '<br><b>Ciudad:</b>'.$products[$i]["Ciudad"].'<br><b>Telefono:</b>'.$products[$i]["Telefono"].'<br><b>Codigo Postal:</b>'.$products[$i]["Codigo_Postal"].'<br><b>Tipo:</b>'.$products[$i]["Tipo"].'<br><b>Precio:</b>'.$products[$i]["Precio"].'</p></div>';
    }elseif ($nombre=="undefined" && $from<= $total && $to >= $total && $tipo == "undefined") {
        echo '<div id="hola"class="nueva white-text col s12 m12"><img src="./img/home.jpg" alt="" class="total col s5 m5 responsive-img "><p class="col s7 m7"><b>Direccion:</b>'.$products[$i]["Direccion"]. '<br><b>Ciudad:</b>'.$products[$i]["Ciudad"].'<br><b>Telefono:</b>'.$products[$i]["Telefono"].'<br><b>Codigo Postal:</b>'.$products[$i]["Codigo_Postal"].'<br><b>Tipo:</b>'.$products[$i]["Tipo"].'<br><b>Precio:</b>'.$products[$i]["Precio"].'</p></div>';
    }

  };
?>
