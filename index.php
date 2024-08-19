<?php
// getUserData.php

if (isset($_GET['userid'])) {
    // Sanitize the input to avoid XSS attacks
    $userid = htmlspecialchars($_GET['userid']);

    // Assuming you are fetching the user data from a database
    // Replace this with your actual database query
  

    // For this example, I'm manually setting the values
    $fullname = isset($_GET['fullname']) ? htmlspecialchars($_GET['fullname']) : '';
    $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
    $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
    $pass = isset($_GET['password']) ? htmlspecialchars($_GET['password']) : '';
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
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
    <nav class="navbar navbar-expand-lg  navbar-light bg-info d-flex flex-wrap" aria-label="First navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/brand-img.png" alt="Bootstrap" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse content-end" id="navbarsExample01">
                <ul class="navbar-nav justify-content-end ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="view_info.php">View_info</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Registration Form Modal (Signup) -->
    <div id="modalRegister" class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" role="dialog" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-3 pb-2 border-bottom-0 bg-info d-flex align-items-center justify-content-center">
                    <h3 class="text-center text-light justify-content-center align-self-center">Registration Form in PHP</h3>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form method="post" action="CRD.php">
                        <input type="hidden" name="CRUD" value="Register">
                        <div class="mb-2 mt-3">
                            <input type="text" class="form-control" id="fullname" placeholder="Full name" name="fname">
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control" id="username" placeholder="User name" name="uname">
                        </div>
                        <div class="mb-2">
                            <input type="email" class="form-control" id="useremail" placeholder="User email" name="email">
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control" placeholder="Password" id="userpassword" name="password" onfocus="animate_key()">
                            <div class="animate__animated">
                                <span id="key-icon">🔑</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info text-light">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- Update Form Modal -->
<div id="modalUpdate" class="modal modal-sheet position-static d-none bg-body-secondary p-4 py-md-5" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-3 pb-2 border-bottom-0 bg-info d-flex align-items-center justify-content-center">
                <h3 class="text-center text-light justify-content-center align-self-center">Update Registration Form in PHP</h3>
            </div>
            <div class="modal-body p-5 pt-0">
                <form method="post" action="CRD.php">
                    <input type="hidden" name="CRUD" value="Update">
                    <input type="hidden" name="user" value="<?php echo htmlspecialchars($userid, ENT_QUOTES, 'UTF-8'); ?>">
                    
                    <div class="mb-3 mt-3">  
                        <input type="text" class="form-control" id="update-fullname" name="fullname" required placeholder="Full name" value="<?php echo htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8'); ?>">
                    </div> 
                    <div class="mb-3">  
                        <input type="text" class="form-control" id="update-username" name="username" required placeholder="User name" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">
                    </div> 
                    <div class="mb-3">
                        <input type="email" class="form-control" id="update-email" name="email" required placeholder="Email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
                    </div>   
                    <div class="mb-3">
                        <input type="password" class="form-control" id="update-password" name="pass" required placeholder="New password">
                    </div>
                    <input type="submit" class="btn btn-info text-light" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>


    <script>
        // Function to show the correct modal
        function showModal(modalId) {
            document.getElementById('modalRegister').classList.add('d-none');
            document.getElementById('modalUpdate').classList.add('d-none');

            document.getElementById(modalId).classList.remove('d-none');
            document.getElementById(modalId).classList.add('d-block');
        }

      

        // Check URL parameters to determine which modal to show
        const urlParams = new URLSearchParams(window.location.search);
        const action = urlParams.get('action');
        const userid = urlParams.get('userid');

        if (action === 'update' && userid) {
            showModal('modalUpdate');
        } else {
            showModal('modalRegister');
        }

        // Animation function for the key icon
        function animate_key() {
            const keyIcon = document.getElementById("key-icon");
            keyIcon.classList.remove("animate__animated", "animate__shakeX");
            void keyIcon.offsetWidth; // Trigger reflow
            keyIcon.classList.add("animate__animated", "animate__shakeX");
        }
    </script>
</body>
</html>
