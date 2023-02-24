<?php


//capturamos  el checbox cuando se  seleciona

if(isset($_POST["color"])){

  $color=$_POST['color'];
  $fecha=$_POST['fecha'];
  

//      header("location:filtrar4.php");


}


else{   $color=0;
  $fecha=$_POST['fecha'];
}

//capturamos  el checbox cuando se  seleciona

if(isset($_POST["referencia"])){

  $referencia=$_POST['referencia'];
  $fecha=$_POST['fecha'];
  
//      header("location:filtrar4.php");


}


else{   $referencia=0;
  $fecha=$_POST['fecha'];

}



//capturamos  el checbox cuando se  seleciona
if(isset($_POST["lote"])){

  $lote=$_POST['lote'];
  $fecha=$_POST['fecha'];
  

  //    header("location:filtrar4.php");


}


else{   $lote=0;

  $fecha=$_POST['fecha'];

}


if(isset($_POST["pedido"])){

  $pedido=$_POST['pedido'];
  $fecha=$_POST['fecha'];
  
  //    header("location:filtrar4.php");


}


else{   $pedido=0;
  $fecha=$_POST['fecha'];

}


if(($color==10)  AND  ($referencia==20)   AND ($lote==30)  AND ($pedido==40)){



      header("location:filtrar4.php?fecha=$fecha");


}


else{



if(($color==10) AND ($referencia==20)   AND ($lote==30)  AND ($pedido==0) ){

  header("location:corelo.php?fecha=$fecha");


}






//validamos color, referencia, pedido


if(($color==10)  AND  ($referencia==20)   AND ($lote==0)AND ($pedido==40)){





    header("location: corepe.php?fecha=$fecha");

  }








//validamos color, lote, pedido


if(($color==10)  AND  ($referencia==0)    AND  ($lote==30)    AND ($pedido==40)){




        header("location: colope.php?fecha=$fecha");

    }








//validamos color, lote, pedido


if(($color==0) AND ($referencia==20)  AND  ($lote==30)   AND ($pedido==40)){




        header("location: relope.php?fecha=$fecha");

    }




//validamos  color y referencia

if(($color==10) AND ($referencia==20)  AND  ($lote==0)   AND ($pedido==0)){




          header("location: core.php?fecha=$fecha");

      }



//validamos color y lote


if(($color==10) AND ($referencia==0)  AND  ($lote==30)   AND ($pedido==0)){



        header("location: colo.php?fecha=$fecha");

    }




//validamos color y  pedido
    if(($color==10) AND ($referencia==0)  AND  ($lote==0)   AND ($pedido==40)){



            header("location: cope.php?fecha=$fecha");

        }


        //valodamos referencia y lote

        if(($color==0) AND ($referencia==20)  AND  ($lote==30)   AND ($pedido==0)){



                header("location: relo.php?fecha=$fecha");

            }

//validamos  referencia y pedido

            if(($color==0) AND ($referencia==20)  AND  ($lote==0)   AND ($pedido==40)){



                    header("location: repe.php?fecha=$fecha");

                }

// validamos  lote y pedido


                if(($color==0) AND ($referencia==0)  AND  ($lote==30)   AND ($pedido==40)){



                        header("location: lope.php?fecha=$fecha");

                    }









//validamos   cuando seleciona solo color
        if(($color==10) AND ($referencia==0)  AND  ($lote==0)   AND ($pedido==0)){



                header("location: bcolor.php?fecha=$fecha");

            }


            //validamos   cuando seleciona solo referencia
                    if(($color==0) AND ($referencia==20)  AND  ($lote==0)   AND ($pedido==0)){



                            header("location: breferencia.php?fecha=$fecha");

                        }




                        //validamos   cuando seleciona solo  lote
                                if(($color==0) AND ($referencia==0)  AND  ($lote==30)   AND ($pedido==0)){



                                        header("location: blote.php?fecha=$fecha");

                                    }




                                    //validamos   cuando seleciona solo  pedido
                                            if(($color==0) AND ($referencia==0)  AND  ($lote==0)   AND ($pedido==40)){



                                                    header("location: bpedido.php?fecha=$fecha");

                                                }



                                                if(($color==0) AND ($referencia==0)  AND  ($lote==0)   AND ($pedido==0)){



                                                  header("location: seleccion_fecha.php?fecha=$fecha");
                                  
                                              }



}

?>
