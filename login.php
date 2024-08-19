<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Document</title>
    <style>
      .nav-link.active {
    color: darkblue !important;
}
    

      .custom-container{
        width:480px;
        
      }
      
      #key-icon {
        display: inline-block;
      }
    </style>
</head>
<body>
   
      <nav class="navbar navbar-expand-lg  navbar-light bg-info" aria-label="First navbar example">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/brand-img.png" alt="Bootstrap" width="30" height="24">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExample01">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item ">
                <a class="nav-link text-light" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active text-light" href="#">Login</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-light" href="index.php" >
                  Signup
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-light" href="view_info.php">View_info</a>
              </li>
            </ul>
              
            
          </div>
        </div>
      </nav>





      <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-3 pb-2 border-bottom-0 bg-info d-flex align-items-center justify-content-center">
              <h3 class="text-center text-light justify-content-center align-self-center">Login page in php</h3>
              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
      
            <div class="modal-body p-5 pt-0">
              <form method="post" action="CRD.php">
                <input type="hidden" name="CRUD" value="Login">
                <div class="mb-3 mt-3">
                  <input type="text" class="form-control" id="username" placeholder="User name" name = "uname">
                </div>
                
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" id="userpassword" name = "password" onfocus="animate_key()">
                  <div class="animate__animated ">
                    <span id="key-icon">🔑</span>
                </div> 
                </div>
                
                <button type="submit" class="btn btn-info text-light">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      

      
    <script>
      function animate_key(){
          const keyIcon = document.getElementById("key-icon");
          keyIcon.classList.remove("animate__animated", "animate__shakeX");
          void keyIcon.offsetWidth; // Trigger reflow
          keyIcon.classList.add("animate__animated", "animate__shakeX");
      }
  </script>
  

</body>
</html>