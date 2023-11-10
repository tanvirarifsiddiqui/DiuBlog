<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DIU Blog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
  background-color: #f0f5f5;
  color: #333;
}

.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background-color: #008080;
  color: #fff;
}

.logo img {
  width: 150px;
}

.logo h1 {
  font-size: 24px;
  margin-left: 10px;
}

.options {
  position: relative;
}

.options .dropdown-menu {
  right: 0;
  left: auto;
}

.cover-photo img {
  width: 100%;
}

.navigation {
  background-color: #008080;
  color: #fff;
  padding: 10px;
}

.navigation a {
  color: #fff;
  margin-right: 10px;
}

.blog-post {
  margin-top: 20px;
}

.blog-post h3 {
  color: #008080;
}

.related-news {
  margin-top: 30px;
}

.related-news img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  margin-bottom: 10px;
}

.related-news h4 {
  color: #008080;
  margin-bottom: 5px;
}

.footer {
  background-color: #008080;
  color: #fff;
  padding: 20px 0;
}

.footer ul {
  list-style: none;
  padding-left: 0;
}

.footer ul li {
  margin-bottom: 10px;
}

.copy-right {
  background-color: #005959;
  color: #fff;
  padding: 10px 0;
}

  </style>
</head>

<body>
  <header class="header">
    <div class="logo">
      <img src="images/diulogoside.png" alt="DIU Logo">
    </div>
    <div class="logo">
    <h1>DIU Blog</h1>
    </div>
    <div class="options">
      <a href="createpost.html">
        <button class="btn btn-success " >
      Create a post
      </button></a>
    </div>
  </header>

  <div class="container">
    <div class="cover-photo">
      <img src="images/diuCover.jpg" alt="University Cover Photo">
    </div>

    <nav class="navigation">
      <a href="/diublog/" class="active">Home</a>
      <a href="campus.php">Campus</a>
      <a href="academic.php">Academics</a>
      <a href="admission.php">Admissions</a>
      <a href="application.php">International Applications</a>
      <a href="notices.php">News &amp; Notices</a>
      <a href="research.php">Research</a>
      <a href="about.php">About</a>
    </nav>

    <section class="blog-post">
      <?php
      // Database connection
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "diublog";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Retrieve blog post from the database
      $sql = "SELECT headline, name, post, category FROM blogpost WHERE category ='Research' ORDER BY SL DESC";
      $result = $conn->query($sql);

      // Display blog post if found
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<h3>' . $row['headline'] . '</h3>';
          echo '<p>Category: ' . $row['category']  . '</p></p>';
          echo '<h6><i>Author: ' . $row['name'] . '</i></h6>';
          echo '<p><i>Published Date: June 6, 2023' . '</i>';
          echo '<p>' . $row['post'] . '</p>';
        }
      } else {
        echo 'No blog post found.';
      }
      ?>
    </section>

    <section class="related-news">
      <div class="row">
        <div class="col-md-6">
          <img src="images/warterfall.jpg" alt="Related Post Image">
          <?php
          $sql = "SELECT headline, name, category FROM blogpost WHERE category ='Campus' Order by SL DESC LIMIT 1";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
              echo '<h4>' . $row['headline'] . '</h4>';
              echo '<p>Category: ' . $row['category']  . '</p></p>';
              echo '<h6><i>Author: ' . $row['name'] . '</i></h6>';
              echo '<p><i>Published Date: June 6, 2023' . '</i>';
            }
          } else {
            echo 'No blog post found.';
          }
          ?>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-sm-6">
              <img src="images/focus.jpg" alt="Related Post Image">
              <?php
              // Retrieve blog post from the database
      $sql = "SELECT headline, name, category FROM blogpost WHERE category ='Admission' Order by SL DESC LIMIT 1";
      $result = $conn->query($sql);

      // Display blog post if found
      if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
          echo '<h4>' . $row['headline'] . '</h4>';
          echo '<p>Category: ' . $row['category']  . '</p></p>';
          echo '<h6><i>Author: ' . $row['name'] . '</i></h6>';
          echo '<p><i>Published Date: June 6, 2023' . '</i>';
        }
      } else {
        echo 'No blog post found.';
      }
              ?>
            </div>
            <div class="col-sm-6">
              <img src="images/Blue_Mosque.jpg" alt="Related Post Image">
              <?php
              // Retrieve blog post from the database
      $sql = "SELECT headline, name, category FROM blogpost WHERE category ='Research' Order by SL DESC LIMIT 1";
      $result = $conn->query($sql);

      // Display blog post if found
      if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
          echo '<h4>' . $row['headline'] . '</h4>';
          echo '<p>Category: ' . $row['category']  . '</p></p>';
          echo '<h6><i>Author: ' . $row['name'] . '</i></h6>';
          echo '<p><i>Published Date: June 6, 2023' . '</i>';
        }
      } else {
        echo 'No blog post found.';
      }
      // Close the database connection
      $conn->close();
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>Contacts</h5>
          <ul>
            <li>Phone: 123-456-7890</li>
            <li>Email: info@diublog.com</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Campus Life</h5>
          <ul>
            <li>Events</li>
            <li>Clubs &amp; Organizations</li>
            <li>Sports</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Important Links</h5>
          <ul>
            <li>About Us</li>
            <li>Terms &amp; Conditions</li>
            <li>Privacy Policy</li>
          </ul>
        </div>
        <div class="col-md-3 cover-photo">
          <h5>Map</h5>
          <img src="images/map.png" alt="" srcset="">
          <p>Daffodil Smart City, Birulia 1216</p>
        </div>
      </div>
    </div>
  </footer>

  <div class="copy-right text-center">
    &copy; 2023 DIU Blog. All rights reserved.
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</body>

</html>
