<?php
session_start();
$pickup=$_POST['pickup'];
$fare;
$drop=$_POST['drop'];
$cab=$_POST['cab'];
$weight=$_POST['weight'];
require_once 'db.php';
$query= "SELECT * FROM `tbl_location`";
$results = mysqli_query($conn,$query);
// $row= mysqli_fetch_assoc($results);
while($row= mysqli_fetch_assoc($results)){
    
  $distancear[$row['name']]=$row['distance'];
  

 
}

if($pickup=='Charbagh'){
$dist=abs($distancear[$drop]);

}
else{
    $temp=(int)$distancear[$drop];
    $tem1=(int)$distancear[$pickup];
    $dist=abs($temp-$tem1);
   
    }


class newssss{
 function fare($cab,$dist,$weight){
    global $fare,$cab,$weight,$dist,$distancear;
    if($cab=='CabMini')
    {
        if($dist<=10){
            $fare=150+($dist*14.5);
            
           
            
        }
        elseif($dist>10&&$dist<=60){
        $fare=150+145+(($dist-10)*13);
        
        }
        elseif($dist>60&&$dist<=160){
            $fare=150+145+650+(($dist-60)*11.20);
           
            }
            else{
                $fare=150+145+650+1120+(($dist-160)*9.50);
               
                }
    }

    if($cab=='CabMicro')
    {
        if($dist<=10){
            $fare=50+($dist*13.5);
          
            
        }
        elseif($dist>10&&$dist<=60){
        $fare=50+135+(($dist-10)*12);
       
        }
        elseif($dist>60&&$dist<=160){
            $fare=50+135+((50)*12)+(($dist-60)*10.20);
            
            }
            else{
                $fare=50+135+((50)*12)+((100)*10.20)+(($dist-160)*8.50);
               
                }
    }

    if($cab=='CabRoyal')
    {
        if($dist<=10){
            $fare=200+($dist*15.5);
            
            
        }
        elseif($dist>10&&$dist<=60){
        $fare=200+155+(($dist-10)*14);
       
        }
        elseif($dist>60&&$dist<=160){
            $fare=200+155+(50*14)+(($dist-60)*12.20);
          
            }
            else{
                $fare=200+155+(50*14)+(100*12.20)+(($dist-160)*10.50);
               
                }
    }


    if($cab=='CabSuv')
    {
        if($dist<=10){
            $fare=250+($dist*16.5);
            
            
        }
        elseif($dist>10&&$dist<=60){
        $fare=250+165+(($dist-10)*15);
        
        }
        elseif($dist>60&&$dist<=160){
            $fare=250+165+750+(($dist-60)*13.20);
            
            }
            else{
                $fare=250+165+750+1320+(($dist-160)*11.50);
               
                }
     }
    
    


 }


 function luggage($cab,$weight){
     global $cab,$weight,$charges;
     if($cab=='CabMini'||$cab=='CabRoyal')
     {
         if($weight>=1&&$weight<=10){
             $charges=50;
             return $charges;
         }
         elseif($weight>10&&$weight<=20){
            $charges=100;
            return $charges;
        }
        elseif($weight==0){
            $charges=0;
            return $charges;
        }
        else{
            $charges=200;
            return $charges;
                }
     }
     elseif($cab=='CabSuv')
     {
         if($weight>=1&&$weight<=10){
             $charges=100;
             return $charges;
         }
         elseif($weight>10&&$weight<=20){
            $charges=200;
            return $charges;
        }
        elseif($weight==0){
            $charges=0;
            return $charges;
        }
        else{
            $charges=400;
            return $charges;
                }
     }
    
 }
}
$name=new newssss();
$name->fare($cab,$dist,$weight);

$charge=0;
    $charge =$name->luggage($cab,$weight);
    
     $totfare=$charge+$fare;
     $_SESSION['pickup']=$pickup;
     $_SESSION['drop']=$drop;
     $_SESSION['dist']=$dist;
     $_SESSION['fare']=$totfare;
     $_SESSION['cab']=$cab;
     $_SESSION['weight']=$weight;
     echo "Total fare is:Rs$totfare \n For Distance: $dist km";
       
?>
