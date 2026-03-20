<?php
session_start();

// 🔒 Redirect to login page if user not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.html");
    exit();
}

// 🧠 Store username in a variable
$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOD&ORGAN-DONAR</title>
    <link rel="stylesheet" href="./home.css">
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" href="./nav.css">
    <link rel="stylesheet" href="./sidebar.css">
    <link rel="shortcut icon" href="./photos/LOGO.webp" type="image/x-icon">
</head>
<body>
    <!-- nav bar start -->
    <nav class="nav-container">
        <div class="nav-center wrapper">
            <div class="logo-section">
                <a href="./contact.php">
                    <img src="./photos/LOGO.webp" alt="universitylogo" class="logo">
                </a>
            </div>
            <div class="hamburger">
                <img src="./icons/button.png" alt="sidebaropen">
            </div>
            <div class="nav-links-main">
                <div class="nav-links">
                    <li><a href="./home.php" class="nav-link">HOME</a></li>
                    <li><a href="./Donate.php" class="nav-link">DONATE</a></li>
                    <li><a href="./about.php" class="nav-link">ABOUT</a></li>
                    <li><a href="./contact.php" class="nav-link active">CONTACT</a></li>
                </div>
            </div>
            <!-- Social icons + username + logout -->
            <div class="nav-social-links-main">
                <ul class="nav-social-links" style="display:flex;align-items:center;gap:12px;list-style:none;margin:0;padding:0;">
                    <!-- <li><a href="https://web.whatsapp.com/"><img src="./photos/whatapp.png" alt="WhatsApp"></a></li> -->
                     <li> <a href="https://web.whatsapp.com/"><img src="./photos/whatapp.png" alt="WhatsApp" style="height:40px;width:40px;border: 2px solid var(--clr--white);border-radius: 50%;display: flex;justify-content: center;align-items: center;background-color: white;"></a></li>
                     <li><a href="https://www.youtube.com/"><img src="./photos/youtube.png" alt="YouTube" style="height:40px;width:40px;border: 2px solid var(--clr--white);border-radius: 50%;display: flex;justify-content: center;align-items: center;background-color: white;"></a></li>
<li><a href="https://www.facebook.com/home.php"><img src="./photos/facebook.png" alt="Facebook" style="height:40px;width:40px;border: 2px solid var(--clr--white);border-radius: 50%;display: flex;justify-content: center;align-items: center;background-color: white;"></a></li>
<li><a href="https://www.instagram.com/accounts/login/?hl=en"><img src="./photos/insta .png" alt="Instagram" style="height:40px;width:40px;border: 2px solid var(--clr--white);border-radius: 50%;display: flex;justify-content: center;align-items: center;background-color: white;"></a></li>

                    <!-- <li><span style="color:white;font-weight:bold;background:transparent;">You can contact <?php echo $username; ?> ?</span></li> -->
                    <li><a href="./logout.php" class="login-button" style="background-color:#ed1b24;padding:6px 12px;border-radius:6px;color:white;text-decoration:none;">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav bar ends -->

    <!-- side bar begins-->
    <aside class="sidebar-container">
        <div class="sidebar-center wrapper">
            <div class="side-header">
                <div class="logo-section">
                    <a href="./SRM.html"><img src="./icons/uni.png" alt="university"></a>
                </div>
                <div class="close-button">
                    <img src="./icons/closebar.png" alt="closebutton">
                </div>
            </div>
            <div class="sidebar-content paddingtopmobile-fifty">
                <div class="sidebar-links-main">
                    <ul class="sidebar-links">
                        <li><a href="./home.php" class="nav-link">HOME</a></li>
                        <li><a href="./Donate.php" class="nav-link">DONATE</a></li>
                        <li><a href="./about.php" class="nav-link">ABOUT</a></li>
                        <li><a href="./contact.php" class="nav-link active">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- side bar ends -->

    <!-- hero section start -->
    <div class="page-hero-container">
        <div class="page-hero">
            <div class="hero-img-component">
                <div class="img-container">
                    <img src="./photos/back.jpg" alt="about hero">
                </div>
            </div>
            <div class="hero-box paddingbottommobile-thirty paddingtopmobile-thirty">
                <div class="hero-content text-center wrapper paddingtopmobile-thirty paddingbottommobile-thirty">
                    <h1 class="heading">BLOOD&ORGAN-DONATION</h1>
                    <div class="small-heading">BE A DONOR - SAVE LIVES</div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero section end -->

    <!-- single-featured component start -->
    <div class="single-featured-container light-blue-background">
        <div class="single-featured-center wrapper">
            <div class="section-tittle paddingtopdesktop-hunderd paddingtopmobile-fifty paddingbottomdesktop-hundered paddingbottommobile-fourty">
                <h2 class="tittle text-center paddingbottomdesktop-twenty paddingbottommobile-twenty">Contact Us</h2>
                <div class="underline"></div>
            </div>
            <div class="single-featured paddingbottomdesktop-fifty paddingtopdesktop-fifty paddingtopmobile-fifty paddingbottommobile-fourty">
                <div class="image-component single-featured-image paddingbottommobile-fourty">
                    <img src="./photos/ab.jpeg" alt="contactpage">
                </div>
                <div class="single-featured-text-component">
                    <div class="featured-center">
                        <div class="about-info">
                            <form class="contact-us-form full-width-mobile full-width-desktop">
                                <input type="text" name="name" placeholder="Enter Your Name" class="primary-input"/>
                                <br>
                                <input type="email" name="email" placeholder="Enter Your E-mail" class="primary-input"/>
                                <br>
                                <textarea name="message" id="message" cols="38" rows="6" placeholder="Enter Your Message" class="textarea"></textarea>
                                <button class="button-light">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-featured component end -->

    <!-- footer start -->
    <footer class="footer-container">
        <div class="footer-center wrapper">
            <div class="footer-links-main">
                <ul class="footer-links">
                    <li><a href="./home.php" class="footer-link">HOME</a></li>
                    <li><a href="./Donate.php" class="footer-link">DONATE</a></li>
                    <li><a href="./about.php" class="footer-link">ABOUT</a></li>
                    <li><a href="./contact.php" class="footer-link active">CONTACT</a></li>
                </ul>
            </div>
            <div class="social-links-main">
                <ul class="social-links">
                    <li class="social-link"><a href="https://web.whatsapp.com/"><img src="./photos/whatapp.png" alt="whatapp"></a></li>
                    <li class="social-link"><a href="https://www.youtube.com/"><img src="./photos/youtube.png" alt="youtube"></a></li>
                    <li class="social-link"><a href="https://www.facebook.com/home.php"><img src="./photos/facebook.png" alt="facebook"></a></li>
                    <li class="social-link"><a href="https://www.instagram.com/accounts/login/?hl=en"><img src="./photos/insta .png" alt="instagram"></a></li>
                </ul>
            </div>
            <div class="footer-copy-right">
                <p>copy right <span class="copyright-date">2025</span>, done by </p>
            </div>
        </div>
    </footer>
    <!-- footer ends -->

    <script src="./d.js"></script>
</body>
</html>
