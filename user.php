<?php
// connection to database
			$servername = "localhost";
			$uname = "root";
			$pw = "";
			$dbName = "static";
			// Create connection
			$conn = mysqli_connect($servername, $uname, $pw, $dbName);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

				$username = isset($_POST['username']) ? $_POST['username'] : "";
				$sql = "SELECT * FROM login WHERE username LIKE '%".$username."%'";
				$result = $conn->query($sql);

				// if ($result->num_rows > 0) {

				// } else {
					// #No data fetched
					// echo "Invalid Credentials";
				// }
				$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Abdul The Cool Blog</title>

    <!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Abdul The Cool</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
			<!-- add here -->
			<li class="nav-item">
              <a class="nav-link" href="user.php">Users</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
			<!-- to here -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Abdul The Cool Blog</h1>
              <span class="subheading">Shawarma and Kebabs</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
				<a href="add.php">New User</a>
				<form method="POST">
					<input type="text" name="username" placeholder="Search User"/>
					<input type="submit" value="Search user"/>
				</form>
			<table style="width:100%" border="1">
				<tr>
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Action</th>
						</tr>
					</thead>
				</tr>
				<?php if ($result->num_rows > 0): ?>
					<?php while($row = $result->fetch_assoc()): ?>
					<tr>
						<tbody>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td>
								<a href="edit.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>">Edit</a>
								<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
							</td>
						</tbody>
					</tr>
					<?php endwhile; ?>
				<?php endif; ?>
			</table>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="https://twitter.com/abdul_the_cool">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/AbdulTheCoolPH">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://github.com/pmdleonardo">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Abdul The Cool 2017</p>
          </div>
        </div>
      </div>
    </footer>


  </body>

</html>
