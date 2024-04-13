<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    // If the user is not logged in, redirect to the login page.
    header('Location: /AILEARN/index.php');
    exit;
}
?>

<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
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
                  <li><a href="#enrolled-courses"> <!-- Link to the section with the ID -->
                    <i class="fas fa-book"></i>
                    <span class="nav-item">Enrolled Courses</span>
                  </a></li>
                  <li><a href="">
                    <i class="fas fa-chart-bar"></i>
                    <span class="nav-item">Analytics</span>
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
              <img src="img/user.jpg" alt="Profile Picture">
            </div>
            <div class="profile-details">
              <h2>Harris Hermosa</h2>
              <i class="fas fa-user-cog"></i>
              <p>Email: </p>
              <p>Location: </p>
              <p>Joined: </p>
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
            <h1>My courses</h1>
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