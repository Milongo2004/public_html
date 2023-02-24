<?php


//capturamos  el checbox cuando se  seleciona

if(isset($_POST["color"])){

  $color=$_POST['color'];
  $desde=$_POST['desde'];
  $hasta=$_POST['hasta'];
  

//      header("location:filtrar4.php");


}


else{   $color=0;
  $desde=$_POST['desde'];
  $hasta=$_POST['hasta'];

}

//capturamos  el checbox cuando se  seleciona

if(isset($_POST["referencia"])){

  $referencia=$_POST['referencia'];
  $desde=$_POST['desde'];
  $hasta=$_POST['hasta'];
  
//      header("location:filtrar4.php");


}


else{   $referencia=0;
  $desde=$_POST['desde'];
  $hasta=$_POST['hasta'];


}



//capturamos  el checbox cuando se  seleciona
if(isset($_POST["lote"])){

  $lote=$_POST['lote'];
  $desde=$_POST['desde'];
  $hasta=$_POST['hasta'];

  //    header("location:filtrar4.php");


}


else{   $lote=0;
  $desde=$_POST['desde'];
  $hasta=$_POST['hasta'];



}


if(isset($_POST["pedido"])){

  $pedido=$_POST['pedido'];
  $desde=$_POST['desde'];
  $hasta=$_POST['hasta'];
  
  //    header("location:filtrar4.php");


}


else{   $pedido=0;
  $desde=$_POST['desde'];
  $hasta=$_POST['hasta'];

}


if(($color==10)  AND  ($referencia==20)   AND ($lote==30)  AND ($pedido==40)){



      header("location:filtrar4.php?desde=$desde&hasta=$hasta");


}


else{



if(($color==10) AND ($referencia==20)   AND ($lote==30)  AND ($pedido==0) ){

  header("location:corelo.php?desde=$desde&hasta=$hasta");


}






//validamos color, referencia, pedido


if(($color==10)  AND  ($referencia==20)   AND ($lote==0)AND ($pedido==40)){





    header("location: corepe.php?desde=$desde&hasta=$hasta");

  }








//validamos color, lote, pedido


if(($color==10)  AND  ($referencia==0)    AND  ($lote==30)    AND ($pedido==40)){




        header("location: colope.php?desde=$desde&hasta=$hasta");

    }








//validamos color, lote, pedido


if(($color==0) AND ($referencia==20)  AND  ($lote==30)   AND ($pedido==40)){




        header("location: relope.php?desde=$desde&hasta=$hasta");

    }




//validamos  color y referencia

if(($color==10) AND ($referencia==20)  AND  ($lote==0)   AND ($pedido==0)){




          header("location: core.php?desde=$desde&hasta=$hasta");

      }



//validamos color y lote


if(($color==10) AND ($referencia==0)  AND  ($lote==30)   AND ($pedido==0)){



        header("location: colo.php?desde=$desde&hasta=$hasta");

    }




//validamos color y  pedido
    if(($color==10) AND ($referencia==0)  AND  ($lote==0)   AND ($pedido==40)){



            header("location: cope.php?desde=$desde&hasta=$hasta");

        }


        //valodamos referencia y lote

        if(($color==0) AND ($referencia==20)  AND  ($lote==30)   AND ($pedido==0)){



                header("location: relo.php?desde=$desde&hasta=$hasta");

            }

//validamos  referencia y pedido

            if(($color==0) AND ($referencia==20)  AND  ($lote==0)   AND ($pedido==40)){



                    header("location: repe.php?desde=$desde&hasta=$hasta");

                }

// validamos  lote y pedido


                if(($color==0) AND ($referencia==0)  AND  ($lote==30)   AND ($pedido==40)){



                        header("location: lope.php?desde=$desde&hasta=$hasta");

                    }









//validamos   cuando seleciona solo color
        if(($color==10) AND ($referencia==0)  AND  ($lote==0)   AND ($pedido==0)){



                header("location: bcolor.php?desde=$desde&hasta=$hasta");

            }


            //validamos   cuando seleciona solo referencia
                    if(($color==0) AND ($referencia==20)  AND  ($lote==0)   AND ($pedido==0)){



                            header("location: breferencia.php?desde=$desde&hasta=$hasta");

                        }




                        //validamos   cuando seleciona solo  lote
                                if(($color==0) AND ($referencia==0)  AND  ($lote==30)   AND ($pedido==0)){



                                        header("location: blote.php?desde=$desde&hasta=$hasta");

                                    }




                                    //validamos   cuando seleciona solo  pedido
                                            if(($color==0) AND ($referencia==0)  AND  ($lote==0)   AND ($pedido==40)){



                                                    header("location: bpedido.php?desde=$desde&hasta=$hasta");

                                                }


                                                

                                                if(($color==0) AND ($referencia==0)  AND  ($lote==0)   AND ($pedido==0)){



                                                  header("location: seleccion_fecha.php?desde=$desde&hasta=$hasta");

                                              }





}

?>
