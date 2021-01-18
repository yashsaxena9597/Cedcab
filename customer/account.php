





<div >
<?php session_start();
if(!isset($_SESSION['name'])){
  header("Location:/CEDCAB/login.php");
}?>
<?php include "header.php"?></div>

<div class="container">
<div class="alert" id="notify"></div>
  <form  method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" readonly value="<?php echo $_SESSION['email']?>">
    </div>
    <div class="form-group">
  <label for="usr">Name:</label>
  <input type="text"  class="form-control" id="usr" name="name" value="<?php echo $_SESSION['name']?>">
</div>
    
    <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input type="number" class="form-control" id="mobno" aria-describedby="emailHelp" readonly value="<?php echo $_SESSION['mobile']?>">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="Password" placeholder="Password">
  </div>
   
    
    <input type="button" class="btn btn-primary"value="Update" onclick="update()">
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function update()
{
var name = document.getElementById('usr').value;
var email = document.getElementById('email').value;
var mobile = document.getElementById('mobno').value;
var Pass = document.getElementById('Password').value;
$.ajax({
        url:"update.php",
        type:"POST",

        
        data:{name:name,email:email,mobile:mobile,Pass:Pass},
       
        success:function(res){
          if(res==1){
            console.log("Data updated successfully");
            $('#notify').text(" Data updated successfully!");
          }
          else if(res==2){
            console.log("Password is incorrect");
            $('#notify').text("Password is incorrect!");
          }else{
            console.log("not updated");
            $('#notify').text("not updated!");
          }
          
       
          
        }
    })


}

</script>
</body>
</html>
