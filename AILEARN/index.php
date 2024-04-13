<?php
session_start();
$errorMsg = '';

if (isset($_GET['login_error'])) {
    $error = $_GET['login_error'];
    if ($error == 'password') {
        $errorMsg = 'The password you entered is incorrect.';
    } elseif ($error == 'user_not_found') {
        $errorMsg = 'No account found with that email address.';
    } else {
        $errorMsg = 'There was an error processing your login.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>AILearn</title>
    <link rel="icon" href="img/AILearnLogo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"> <!-- Link to your external CSS file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<header>
    <nav class="navbar">   
        <a href="#" class="logo">
        <img src="img/LOGO.jpg" alt="" class="brand-logo-customize">
        </a>

        <ul class="navbar1">
            <li class="nav-item">
                <a class="nav-link" href="#Home">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Why AILearn?
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#WAS">Our Values</a></li>
                    <li><a class="dropdown-item" href="#OG">Our Goals</a></li>
                     <li><a class="dropdown-item" href="#LR">Learner's Feedback</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Authors">Authors</a>
            </li>                
        </ul>
    </nav>        
    <div class="icons">
        <form class="search-form" action="#" method="GET">
            <input type="text" placeholder="Search..." class="search-input">
            <button type="submit" class="fas fa-search"></button>
        </form>
        <button href="#" class="button" id="form-open">LOGIN</a>
        <button href="#" class="button" id="signup-btn">SIGNUP</a> <!-- Added ID for the button -->
    </div>
</header>


<body>
    <!-- Home Section-->
<section class="Home" id="Home">
    <div class="Video">
        <video autoplay loop muted>
            <source src="img/HomeVid1.mp4" type="video/mp4"> <!-- Replace 'your-video.mp4' with your video file path -->
            Your browser does not support the video tag.
        </video>
    </div>

    <div id="account-created-msg" style="display: none; background-color: #dff0d8; color: #3c763d; padding: 10px; margin-bottom: 20px; border-radius: 5px; text-align: center;">
    Account successfully created. Please log in.
    </div>

    <div class="form_container">
       <i class="uil uil-times form_close"></i>
       <!-- LOGIN FORM-->
       <div class="form login_form">
        <form action="login.php" method="POST"> <!-- Make sure this points to your actual login script -->
            <h2>LOGIN</h2>

            <?php if (!empty($errorMsg)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($errorMsg); ?>
            </div>
            <?php endif; ?>


            <div class="input_box">
                <i class="uil uil-envelope-alt email"></i>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input_box">
                <i class="uil uil-lock password"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="option_field">
                <span class="checkbox">
                    <input type="checkbox" id="check"/>
                    <label for="check">Remember me</label>
                </span>
                <a href="#" class="forgot_pw"> Forgot password?</a>
            </div>

            <button class="button"> LOGIN NOW</button>
            <div class="login_signup">
                No account yet? <a href="#" id="signup">Signup</a>
            </div>
        </form>
       </div>

        <!-- Updated Sign Up form to include method and action -->
        <div class="data_privacy_notice" id="dataPrivacyNotice" style="display: none; height: 500px;">
            <h2>PRIVACY NOTICE IN COMPLIANCE with RA 10173 Data Privacy Act of 2012</h2>
            <div class="data_privacy_notice_body">
            <p>I hereby authorize and give my consent to the 4th year Electronics Engineering students from Polytechnic University of the Philippines - Manila to collect, process, use, and reserve the data indicated herein for the purpose of effective conduct of the research study entitled "Characterization of Grade 11 Students from Public and Private Schools: An Analysis on AI Perception and AI Literacy Readiness". This information will be only used under the researchers, research advisor, and the University, and the same will not be shared with outside parties. </p>
            <p>I understand that my personal information is protected by RA 10173 (Data Privacy Act of 2012) alongside its Enacting Rules and Regulations. </p>
            <p>By ticking on the I AGREE button below, you explicitly and unambiguously consent to the collection, processing, and storage of your personal data by the researchers for the purposes described in this Data Privacy Notice and Consent Agreement.</p>
            </div>

        <div class="checkbox-container">
            <input type="checkbox" id="agree" name="agree_disagree">
            <label for="agree">I agree</label>
        </div>
        <div class="checkbox-container">
            <input type="checkbox" id="disagree" name="agree_disagree">
            <label for="disagree">I disagree</label>
        </div>
            <button class="button next-btn">Next</button>
        </div>
        <script src="script.js"></script>

        


       <div class="form signup_form">
        <form action="signup.php" method="POST">
            <h2>SIGNUP</h2>

            <!-- User Type Selection -->
            <!-- Ensure names match those in your signup.php -->
            <div class="user_type_selection">
                <input type="radio" id="learner_signup" name="user_type" value="learner" required>
                <label for="learner_signup">Learner</label>
                <input type="radio" id="admin_signup" name="user_type" value="admin">
                <label for="admin_signup">Admin</label>
            </div>
            
            <!-- Input fields updated with 'name' attributes to ensure data is sent to backend -->
            <div class="input_box">
                <i class="uil uil-user"></i>
                <input type="text" name="name" placeholder="Enter your name" required>
                <!-- Note field remains the same -->
            </div>

            <div class="input_box">
                <i class="uil uil-envelope-alt email"></i>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input_box">
                <i class="uil uil-lock password"></i>
                <input type="password" name="password" placeholder="Create password" required id="signupPassword">
                <!-- Note field remains the same -->
            </div>
            <div class="input_box">
                <i class="uil uil-lock password"></i>
                <input type="password" name="confirm_password" placeholder="Confirm password" required id="confirmSignupPassword">
                <i class="uil uil-eye-slash pw_hide" id="toggleConfirmSignupPassword"></i>
            </div>

            <button class="button" type="submit">SIGNUP NOW</button>
            <!-- Login redirect updated to reference your login page correctly -->
            <div class="login_signup">
                Already have an account? <a href="login_page.php" id="login">Login</a>
            </div>
        </form>
    </div>
    </div>
    
    <div class="Content">
        <div class="Text">
            <h3>LEARN AI, TRANSFORM TOMORROW!</h3>
            <span>Embark on an Exciting AI Adventure with AILearn!</span>
            <hr> <!-- Horizontal line -->
            <p>Dive into our Adaptive Learning System specially designed to introduce high school students to the captivating world of Artificial Intelligence. Whether you're a student eager to explore on your own or a teacher seeking to enhance your classroom experience, AILearn is perfect for you! No prior programming experience needed. Join us for engaging and personalized lessons, interactive experiments, and hands-on demos that make learning AI fun and accessible for all!</p>
            <a href="#" class="btn">JOIN FOR FREE</a>
        </div>
    </div>
</section>

<!-- Dive -->
<div class="Dive" id="Dive">
</div>

<section class="OVOGLF">
<!-- Why AILearn Section-->
      <!-- OUR VALUES-->
    <section class="WAS" id="WAS">
        <div class="container">
            <h2 class="section-title1">OUR VALUES</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card">
                        <img src="img/WA1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">to provide a basic understanding of AI, enhancing academic standing and future opportunities for Senior High School students across the Philippines to ensure inclusive, 
                                equitable, and quality education for all, preparing students for active citizenship in a globally connected world.</p>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="img/WA2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">to contribute to raising public awareness about AI literacy and its importance in contemporary society. This heightened awareness fosters informed discussions about AI's role, its benefits, and the potential challenges, 
                                thereby educating communities with knowledge to make informed decisions and responsible use.</p>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="img/WA3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">to promote ethical considerations and responsible practices about AI application by providing learners with AI literacy. This approach makes sure AI is
                                 applied for the benefit of society while reducing the risks involved with its application.</p>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="img/WA4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">In line with the objective of promoting innovation and sustainable industrial growth, it establishes the foundation for future
                                infrastructure development through promoting the connection between education and innovative technology.
                            </p>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
            document.addEventListener("DOMContentLoaded", function() {
            var readMoreLinks = document.querySelectorAll('.read-more');
            readMoreLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var cardBody = this.parentElement;
                    var cardText = cardBody.querySelector('.card-text');
                    if (cardText.classList.contains('show')) {
                        cardText.classList.remove('show');
                        this.textContent = 'Read More';
                    } else {
                        cardText.classList.add('show');
                        this.textContent = 'Read Less';
                    }
                });
            });
        });

    </script>
    
<!-- OUR GOALS-->
    <section class="OG" id="OG">
        <div class="container">
            <h2 class="section-title2">OUR GOALS</h2>
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/OG1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>OPEN SOURCE LEARNING</h5>
                            <p>Fostering an inclusive educational environment by 
                                championing open source learning initiatives, ensuring knowledge accessibility for all. At AILearn, we tailor learning materials to your unique learning style,
                                facilitating a more effective and fruitful learning journey.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/OG2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>PROMOTE AI LITERACY</h5>
                            <p>At the heart of our mission lies a commitment to fostering AI literacy. By breaking down complex concepts and empowering individuals with knowledge, we pave the way for a future where 
                                everyone can navigate the ever-evolving landscape of technology with ease and confidence.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/OG3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>FURTHER DEVELOP HUMAN INTELLIGENCE</h5>
                            <p>Committed to nurturing intellect while safeguarding human agency, our endeavor is to illuminate the intricacies of generative AI. By fostering understanding, we empower students to navigate this technological 
                                frontier responsibly, preserving the essence of human autonomy and creativity.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i> <!-- Font Awesome icon for left arrow -->
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i> <!-- Font Awesome icon for right arrow -->
                </button>
            </div>
        </div>
    </section>

    <!-- Learner's review-->
<section class="LR" id="LR">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card1" style="width: 80%; height: auto;">
                    <h3>@natnat</h3>
                    <div class="rating-stars">
                        <!-- Display static rating stars based on user 1's rating -->
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>"AILearn's AI Foundations course exceeded my expectations! Concise yet comprehensive modules, 
                        coupled with interactive exercises, made learning AI concepts a breeze. The platform's user-friendly interface 
                        enhanced the overall experience. A definite must for anyone interested in mastering AI basics!"</p>
                </div>
                <div class="card card2" style="width: 80%;height: auto;">
                    <h3>@harhar</h3>
                    <div class="rating-stars">
                        <!-- Display static rating stars based on user 2's rating -->
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"Highly informative and engaging AI Foundations course through AILearn! 
                        Clear explanations and interactive content made complex concepts easy to grasp. 
                        Would highly recommend for anyone looking to delve into AI literacy."</p>
                </div>
            </div>
            <div class="col">
                <div class="card card3" style="width: 80%;height: auto;">
                    <h3>@vinvin</h3>
                    <div class="rating-stars">
                        <!-- Display static rating stars based on user 3's rating -->
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>"AILearn's AI Foundations: Clear, well-organized modules simplify complex topics. 
                        Interactive exercises reinforce understanding, with practical applications enhancing AI literacy. 
                        Highly confident post-completion. Thank you, AILearn!"</p>
                </div>
            </div>
            <div class="col">
                <div class="WLSAB">
                    <h2 class="section-title3">What learners and experts said about us</h2>
                    <p> Join the growing community of Artificial Intelligence literate individuals and discover how AILearn can walk you 
                        through the world of AI and make you an active innovator of the future where human and artificial intelligence foster in harmony.
                    </p>
                    <div class="ratings-box">
                        <div class="Ratings1 ratings">
                            <h3 class="EA">Easy Navigation</h3>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="ratings-box">
                        <div class="Ratings2 ratings">
                            <h3 class="CQ">Content Quality</h3>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="ratings-box">
                        <div class="Ratings3 ratings">
                            <h3 class="WV">Web Visuals</h3>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
</section>

<!-- Authors-->
<section class="Authors" id="Authors">
    <div class="container">
        <h2 class="section-title1">THE AUTHORS</h2>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
                <div class="card1">
                    <img src="img/Briana.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3>Briana Capul</h3>
                        <p class="short-description">In her fourth year of pursuing a Bachelor of Science degree in Electronics Engineering, she exhibits a relentless pursuit of excellence and a fervent thirst for knowledge. Immersed in her field, 
                            she eagerly tackles challenges, broadening her expertise and making significant contributions to technology.</p>
                        <div class="icons">
                            <!-- Add your icons here -->
                            <a href="https://web.facebook.com/brianamia.capul" class="icon-facebook"><i class="fab fa-facebook"></i></a>
                            <a href="mailto:brianacapul@gmail.com" class="icon-email"><i class="fas fa-envelope"></i></a>
                            <a href="https://www.linkedin.com/in/briana-mia-capul-b15a60269/" class="icon-linkedin"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card1">
                    <img src="img/Kristle.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3>Kristle Dimayuga</h3>
                        <p class="short-description">She demonstrates an unwavering dedication to excellence and a voracious appetite for knowledge. Immersed in the intricacies of her field, she fearlessly embraces challenges,
                             continually expanding her expertise, and actively contributes to the dynamic landscape of technology.</p>
                        <div class="icons">
                            <!-- Add your icons here -->
                            <a href="https://web.facebook.com/?_rdc=1&_rdr" class="icon-facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="mailto:dimayugakristlemae@gmail.com" class="icon-email" target="_blank"><i class="fas fa-envelope"></i></a>
                            <a href="https://www.linkedin.com/in/kristle-dimayuga-55757b255/" class="icon-linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card1">
                    <img src="img/Leigha.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3>Leigha Raymundo</h3>
                        <p class="short-description">she embodies an unwavering commitment to excellence and a relentless thirst for knowledge. Fully immersed in her field, she fearlessly tackles challenges, 
                            constantly enhancing her expertise, and making impactful strides in the ever-evolving realm of technology.</p>
                        <div class="icons">
                            <!-- Add your icons here -->
                            <a href="https://web.facebook.com/leigghha" class="icon-facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="mailto:leigharaymundo@gmail.com" class="icon-email" target="_blank"><i class="fas fa-envelope"></i></a>
                            <a href="https://www.linkedin.com/in/leigha-raymundo-a54527267/" class="icon-linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="script.js"></script>
</body>

<footer class="footer">
    <div class="column1">
        <img src="img/LOGO.jpg" alt="Brand Logo">
        <h5> Dive into the World of Artificial Intelligence</h5>
    </div>
    <div class="column2">
        <h3>Useful Links</h3>
        <ul>
            <li><a href="https://www.ieee.org/" target="_blank">IEEE Publication</a></li>
            <li><a href="https://www.researchgate.net/" target="_blank">AILearn Manuscript</a></li>
            <li><a href="https://www.linkedin.com/in/orland-delfino-tubola-4b120145/" target="_blank">Research Advisers</a></li>
            <li><a href="https://www.linkedin.com/in/kristle-dimayuga-55757b255/" target="_blank">Author's CV</a></li>
        </ul>
    </div>
    <div class="column3">
        <h3>Connect with Us</h3>
        <ul class="social-icons">
            <li><a href="https://www.facebook.com/kristlemae.dimayuga/" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://www.youtube.com/yourchannel" target="_blank"><i class="fab fa-youtube"></i></a></li>
            <li><a href="mailto:youremail@example.com"><i class="fas fa-envelope"></i></a></li>
            <li><a href="viber://chat?number=+123456789"><i class="fab fa-viber"></i></a></li>
        </ul>
    </div>
</footer>



</html>
