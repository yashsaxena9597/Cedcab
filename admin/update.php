<?php

if(isset($_GET['id'])&& $_GET['id']!=''){
    
    require_once '/opt/lampp/htdocs/CEDCAB/db.php';
    $id =$_GET['id'];
    $query= "SELECT * FROM `tbl_location` WHERE id='$id'";
    $results = mysqli_query($conn,$query);
    $records = mysqli_num_rows($results);


    
        // echo $row['name']."<br>";
        // echo $row['distance']."<br>";
        
    

    ?>
    <?php session_start();?>
<?php include "header.php"?></div>
<div class="alert alert-primary" id="msg"></div>
<div class="container">

  <form action="" method="POST">
  <?php while($row= mysqli_fetch_assoc($results)){ ?>
    <div class="form-group" style="display:none">
      <label for="name">id:</label>
      <input type="text" class="form-control" id="idloc"   value="<?php echo $row['id']?>">
    </div>
    <div class="form-group">
      <label for="name">Location:</label>
      <input type="text" class="form-control" id="name"   value="<?php echo $row['name']?>">
    </div>
    <div class="form-group">
      <label for="dist">Distance:</label>
      <input type="number" class="form-control" id="dist"    value="<?php echo $row['distance'] ?>">
    </div>
    <div class="form-group" style="display:none">
      <label for="dist">Available:</label>
      <input type="number" class="form-control" id="Available"    value="<?php echo $row['is_available'] ?>">
    </div>
  
    <input type="button" class="btn btn-primary"value="SUBMIT" onclick="update()">
    <?php if($row['is_available'] > 0){?>
    <input type="button" class="btn btn-primary"value="block" onclick="block()">
    <?php } else{?>
      <input type="button" class="btn btn-primary"value="unblock" onclick="unblock()">
    <?php } ?>
    <?php }
    }?>
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
function update()

{
     
     var id=document.getElementById('idloc').value;
     var location= document.getElementById('name').value;
    var dist= document.getElementById('dist').value;
    
     console.log(location);
     console.log(dist);
     
     $.ajax({
        url:"disable.php",
        type:"POST",

        
        data:{id:id,location:location,dist:dist},
       
        success:function(res){
            if(res==1){
            console.log("Location  updated successfully");
            $('#msg').text(" Data updated successfully!");
          }
          else{
            console.log("not updated");
            $('#msg').text("not updated!");
          }
          
       
       
          
        }
    })

}
function block(){
  var id=document.getElementById('idloc').value;
  var available=0;
  $.ajax({
        url:"disable.php",
        type:"POST",

        
        data:{id:id,availa:available},
       
        success:function(res){
            if(res==1){
            console.log("Location  updated successfully");
            $('#msg').text(" Location Blocked successfully!");
          }
          else{
            console.log("not updated");
            $('#msg').text("not updated!");
          }
          
       
       
          
        }
    })
}
function unblock(){
  var id=document.getElementById('idloc').value;
  var available=1;
  $.ajax({
        url:"disable.php",
        type:"POST",

        
        data:{id:id,availa:available},
       
        success:function(res){
            if(res==1){
            console.log("Location  updated successfully");
            $('#msg').text(" Location Unblocked successfully!");
          }
          else{
            console.log("not updated");
            $('#msg').text("not updated!");
          }
          
       
       
          
        }
    })
}



</script>
</body>
</html>

    