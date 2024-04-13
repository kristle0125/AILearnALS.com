<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    // If the user is not logged in, redirect to the login page.
    header('Location: /AILEARN/index.php');
    exit;
}

require '../db.php'; // Assuming db.php is one level up in the directory structure

// Fetch user details from the database
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $sql = "SELECT name, email, profile_picture FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $userData = $result->fetch_assoc();
        } else {
            // User not found, maybe handle error or log out the user
            header('Location: /AILEARN/logout.php');
            exit;
        }
    } else {
        // SQL Error
        echo "SQL Error: " . $conn->error;
    }
} else {
    // No session ID available, redirect to login
    header('Location: /AILEARN/index.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>AILearn</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav class="sidebar">
        <div class="sidebar-content">
            <div class="logo-container">
                <a href="#" class="logo">
                    <img src="img/LOGO.jpg" alt="">
                </a>
            </div>
            <div class="module-title">
              <h3 class="M1">Dive into the world of Artificial Intelligence</h3>
          </div>
            <ul>
              <li><a href="#">
                <i class="fas fa-home"></i>
                <span class="nav-item">Home</span>
              </a></li>
              <li><a href="#user-profile">
                <i class="fas fa-user"></i>
                <span class="nav-item">Profile</span>
              </a></li>
              <li><a href="">
                    <i class="fas fa-chart-bar"></i>
                    <span class="nav-item">Analytics</span>
                  </a></li>
              <li><a href="#enrolled-courses"> <!-- Link to the section with the ID -->
                    <i class="fas fa-book"></i>
                    <span class="nav-item">Enrolled Courses</span>
                  </a></li>
                  <li><a href="">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Tasks</span>
                  </a></li>
                  <li><a href="">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Settings</span>
                  </a></li>
                  <li><a href="">
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Help</span>
                  </a></li>
            </ul>
          </div>
          <div class="sidebar-footer">
            <ul>
              <li><a href="/AILEARN/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i><span class="nav-item">LOGOUT</span></a></li>
            </ul>
        </div>
    </nav>

    <section class="main">
      <div class="user-profile" id="user-profile">
      <div class="profile-picture">
        <img src="<?php echo htmlspecialchars($userData['profile_picture'] ?? 'img/default_profile.jpg'); ?>" alt="Profile Picture" id="profilePic">
        <label for="file-upload" class="custom-file-upload">
          <i class="fas fa-camera"></i> Upload
        </label>
        <input id="file-upload" type="file" style="display:none;" onchange="previewImage();"/>
      </div>

        
        <div class="profile-details">
          <h2><?php echo htmlspecialchars($userData['name']); ?></h2>
          <i class="fas fa-user-cog"></i>
          <p>Email: <?php echo htmlspecialchars($userData['email']); ?></p>
        </div>
      </div>

      <div class="user-information">
          <div class="user-background-information">
              <p><i class="fas fa-map"></i></p> <!-- Icon for Featured -->
              <p><i class="fas fa-graduation-cap"></i></p> <!-- Icon for Grade Level -->
              <p><i class="fas fa-school"></i></p> <!-- Icon for School -->
              <p><i class="fas fa-users"></i></p> <!-- Icon for Other Affiliations -->
              <p><i class="fas fa-star"></i></p> <!-- Icon for Featured -->
              <p><i class="fas fa-phone"></i></p> <!-- Icon for Featured -->
          </div>
    
          <div class="user-LS-KL">
    <div>
        <h3>LEARNING STYLE</h3>
    </div>
    <div>
      <h3>KNOWLEDGE LEVEL</h3>
    </div>
</div>

      </div>

      
          <div class="main-top">
            <h1>Explore Courses</h1>
          </div>
          <div class="main-skills">
            <div class="card">
            </div>
            <div class="card1">
            </div>
            <div class="card2">
            </div>
          </div>
    
          <section class="main-course" id="enrolled-courses"> <!-- Add ID to the section -->
            <h1>My Tasks</h1>
            <div class="course-box">
              <ul>
                <li class="active">In progress</li>
                <li>incoming</li>
                <li>finished</li>
              </ul>
              <div class="course">
                <div class="box">
                  <h3>INTRODUCTION TO
                     ARTIFICIAL INTELLIGENCE</h3>
                  <p>50% - progress</p>
                  <button>Resume</button>
                </div>
                <div class="box1">
                  <h3>NATURAL LANGUAGE PROCESSING</h3>
                  <p>0% - progress</p>
                  <button>Start Learning</button>
                </div>
                <div class="box2">
                  <h3>MACHINE LEARNING & DEEP LEARNING</h3>
                  <p>0% - progress</p>
                  <button>Start Learning</button>
                </div>
              </div>

              <div class="course">
                <div class="box3">
                  <h3>INTRODUCTION TO
                     ARTIFICIAL INTELLIGENCE</h3>
                  <p>50% - progress</p>
                  <button>Start Learning</button>
                </div>
                <div class="box4">
                  <h3>NATURAL LANGUAGE PROCESSING</h3>
                  <p>0% - progress</p>
                  <button>Start Learning</button>
                </div>
                <div class="box5">
                  <h3>MACHINE LEARNING & DEEP LEARNING</h3>
                  <p>0% - progress</p>
                  <button>Start Learning</button>
                </div>
            </div>
          </section>
          
        </section>
      </div>
    </body>
    </html></span>