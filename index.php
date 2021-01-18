<div><?php include 'header.php';?></div>
<?php  

if(isset($_SESSION['name'])){
  if($_SESSION['name']=='admin'){
   header("Location:/CEDCAB/admin");
}}

require_once 'db.php';
  $sql="select * from tbl_location ";
  $result=mysqli_query($conn,$sql);
  $res=mysqli_query($conn,$sql);



 ?>




<!DOCTYPE html>
<html lang="en">
   <head>
      <title>CEdCAB</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </head>
   <body>
   
      <div style="background-image: url(bgimg.png);background-size: cover;">
         
         <div class="container-fluid" >
            <h1 style="text-align: center; margin-top: 2%;color: rgb(62, 136, 197) ; font-weight: bold;">Book a City Taxi  to Your destination in town.</h1>
            <h2 style="text-align: center;color: rgb(62, 136, 197);">Choose from range of categories and prices.</h2>
            <div class="row">
               <div class="col-md-4">
                  <div class="card " style="margin-top:5%;margin: 2%; background-color:#f5f5f5;border-radius: 10%;  ">
                     <div style="margin-left:35% ;"> <a  style="color:#cddc39;font-size:20px; " href="#">CED<span style="color:#787F09  ;">CAB</span></a> <img src="logo.png" style="height: 20%;width: 20%;"></div>
                     <hr>
                     <div class="card-body" style="overflow: hidden;">
                        <h5 class="card-title" style="text-align: center; font-weight: bold;">Your everyday travel partner</h5>
                        <h6 class="card-title" style="text-align: center;">Ac cabs for point  to point travel</h6>
                        <form   >
                           <div class="form-group dropdown-container">
                              <div class="input-group-prepend row">
                                 <span class="input-group-text col-sm-3" style="overflow: hidden;" id="basic-addon1">PICKUP</span>
                                 <select class="form-control col-sm-9 " id="pickup" onchange="hide()">
                                 <option hidden >Drop down to select pickup location</option>
                                 <?php  while ($row = mysqli_fetch_assoc($result)) { 
                                    if($row['is_available']>0){ ?>
                                    <option><?php echo  $row['name']?></option>
                                    <?php } ?>
                                 <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group dropdown-container">
                              <div class="input-group-prepend row">
                                 <span class="input-group-text col-sm-3" style="overflow: hidden;" id="basic-addon1">DROP</span>
                                 <select class="form-control col-sm-9" id="drop" onchange="hide1()">
                                 <option hidden>Drop down to select drop location</option>
                                 <?php  while ($row = mysqli_fetch_assoc($res)) {
                                      if($row['is_available']>0){ ?>
                                    
                                    <option><?php echo  $row['name']?></option>
                                    <?php } ?>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group dropdown-container">
                              <div class="input-group-prepend row">
                                 <span class="input-group-text col-sm-3" style="overflow: hidden;" id="basic-addon1">Cab Type:</span>
                                 <select class="form-control col-sm-9" id="type" onchange="dis()" style="overflow: hidden;"  >
                                    <option hidden >Drop down to select Cab Type </option>
                                    <option>CabMini</option>
                                    <option>CabMicro</option>
                                    <option>CabRoyal</option>
                                    <option>CabSuv</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group dropdown-container" id="chan">
                              <div class="input-group-prepend row">
                                 <span class="input-group-text col-sm-3"style="overflow: hidden;" id="basic-addon1">Luggage</span>
                                 <input type="number" onfocusout="removeSigns()" min="0" class="form-control col-sm-9" name="luggage" id="luggage" placeholder="Enter weight in KG"><br>
                              </div>
                           </div>
                           <div class="form-group">
                              <button type="button" class="btn btn-primary form-control" style="background-color:#cddc39;border-radius: 2%;overflow: hidden;" onclick="calculate()" >Calculate Fare</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
      <?php include 'footer.php';?>
      <script>
function hide(){
 
  $("#drop option").each(function(){
        if($("#pickup option:selected").val() == $(this).val())
            $(this).attr("hidden", "hidden");
        else
            $(this).removeAttr("hidden");
    });
  
}
function hide1(){
 
 $("#pickup option").each(function(){
       if($("#drop option:selected").val() == $(this).val())
           $(this).attr("hidden", "hidden");
       else
           $(this).removeAttr("hidden");
   });
 
}


  function removeSigns() {
    var input = document.getElementById('luggage');
    input.value = parseFloat(input.value.toString().replace('+', '').replace('-', '').replace('e', '').replace('E', ''))
  }

    function dis(){
      var cab=document.getElementById("type").value;
      if(cab=='CabMicro')
         {
           document.getElementById("chan").style.display="none";
          
        }
        else{
          document.getElementById("chan").style.display="block";
         
        }
    }


    function calculate(){
        var pickup=document.getElementById("pickup").value;
        var drop=document.getElementById("drop").value;
        var cab=document.getElementById("type").value;
        
        var weight=document.getElementById("luggage").value;
       
       if(pickup==drop)
       { 
        
         swal("Oops!", "Same pickup and drop location", "error");
       }
       else if(cab=='Drop down to select Cab Type'&&pickup=='Drop down to select pickup location'&&drop=='Drop down to select drop location')
       {
         
          swal("Oops!", "enter the locations & cab type", "error");
        }
       else if(cab=='Drop down to select Cab Type')
       {
         
          swal("Oops!", "enter the  cab type", "error");
        }
        else if(pickup=='Drop down to select pickup location')
       {
          
          swal("Oops!", "enter the pickup location", "error");
        }
        else if(drop=='Drop down to select drop location')
       {
         
          swal("Oops!", "enter the drop location", "error");
        }
        else if(weight>999||weight<0)
       {
        
         swal("Oops!", "Invalid luggage", "error");
       }
       else{
         
        $.ajax({
        url:"cab.php",
        type:"POST",
        
        data:{pickup:pickup,drop:drop,cab:cab,weight:weight},
       
        success:function(res){
          
          
        //   swal("Fare!", res, "success", {buttons:[true,"BOOK A CAB"],});
        swal({ title: "Fare!",
 text: res,
 type: "success",
 buttons:"BOOK A CAB"}).then(okay => {
   if (okay) {
    window.location.href = "session.php";
  }
});
           
        }
    })}
   
    
}

</script>




      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   </body>