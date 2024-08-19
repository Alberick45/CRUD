
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
                <ul class="navbar-nav justify-content-lg-end ms-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                  <a class="nav-link text-light" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link text-light" href="login.php">Login</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link text-light" href="index.php" >
                    Signup
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link active text-light" href="view_info.php">View_info</a>
                </li>
              </ul>
                
              
            </div>
          </div>
        </nav>
        <div class="d-flex align-items-center justify-content-center" style="height: 75vh;">
        <div class="card " style="width: 50rem; ">
        <div class="card-header bg-secondary ">
          <h3 class="text-center text-light">List of registered members</h3>
        </div>
        <ul class="list-group list-group-flush pt-4 pb-2">
          <li class="list-group-item">
            <a class="btn btn-info" href="index.php" role="button">+Add new</a>
          </li>
          <li class="list-group-item">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th scope="col">User id</th>
                  <th scope="col">Full name</th>
                  <th scope="col">User name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody id = "registered_users">
                <?php
                require("conn.php");
                
                
                $sql = "SELECT user_id, full_name, user_name, email FROM signup";
                $result = $conn->query($sql);
                
                $record = "";
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $userid = htmlspecialchars($row["user_id"]);
                        $fullname = htmlspecialchars($row["full_name"]);
                        $username=  htmlspecialchars($row["user_name"]);
                        $email= htmlspecialchars($row["email"]);
                       $record .= "<tr>
                                <td>" .  $userid. "</td>
                                <td>" .  $fullname  . "</td>
                                <td>" . $username . "</td>
                                <td>" . $email . "</td>
                                <td>
                                <a class='btn btn-info' href='index.php?action=update&userid=" . urlencode($userid) . "&fullname=" . urlencode($fullname) . "&username=" . urlencode($username) . "&email=" . urlencode($email) . "&password=" . urlencode($password). "' role='button'>Edit</a>
                                 | 
                                <a class='btn btn-danger' href='CRD.php?action=delete&userid=" . urlencode($userid) .  "' role='button'>Delete</a>
                                </td>
                            </tr>";
                
                        ;
                        
                
                    }
                } else {
                    $record = "<tr><td colspan='4'>No data found</td></tr>";
                }
                
                $conn->close();
                echo $record;
                ?>                
              </tbody>
            </table>
          </li>
          
        </ul>
      </div>
    </div>

     
      
</body>
</html>