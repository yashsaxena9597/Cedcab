<?php session_start();?>
<nav class="navbar navbar-expand-lg navbar-light "  >
  <a class="navbar-brand" style="color:#cddc39;font-size:40px; " href="index.php">CED<span style="color:#787F09  ;">CAB</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
  <div class="collapse navbar-collapse "  id="navbarNav">
      <ul class="navbar-nav ml-auto ">
          <li class="nav-item active">
          <?php if(isset($_SESSION['name'])){  ?> 
            <a class="nav-link"  href="/CEDCAB/customer/">DASHBOARD </a>
                 <?php }else {?>
              <a class="nav-link"  href="signup.php">SIGNUP <span class="sr-only">(current)</span></a>
              <?php }?>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="">HELP</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#Reviews">About us</a>
          </li>
         
          <li class="nav-item">
                  <?php if(isset($_SESSION['name'])){ echo $_SESSION['name'] ?> 
                <a href="/CEDCAB/customer/logout.php"class="btn btn-outline-info my-2 my-sm-0" type="submit">Logout</a>
                 <?php }else{?>
             
                    <a class="nav-link " href="login.php" ><button style="z-index: 4;background-color: #cddc39;color: white;border: none;border-radius: 20px;width:auto;height: auto;" >LOG IN</button></a>
                    <?php }?>
          </li>
      </ul>
    
  </div>
</nav>

