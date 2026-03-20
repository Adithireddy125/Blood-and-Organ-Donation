<?php
session_start();

// 🔒 Redirect to login page if user not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.html");
    exit();
}

// 🧠 Store username in a variable for easier use
$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOD&ORGAN-DONAR</title>
    <link rel="stylesheet" href="./home.css">
    <link rel="stylesheet" href="./sidebar.css">
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" href="./nav.css">
    <link rel="shortcut icon" href="./photos/LOGO.webp" type="image/x-icon">
</head>


<body>
    <!-- nav bar start -->
    <nav class="nav-container">
        <div class="nav-center wrapper">
            <div class="logo-section">
                <a href="./home.php">
                    <img src="./photos/LOGO.webp" alt="universitylogo" class="logo">
                </a>
            </div>
            <div class="hamburger">
                <img src="./photos/button.png" alt="sidebaropen">
            </div>
            <div class="nav-links-main">
                <div class="nav-links">
                    <li><a href="./home.php" class="nav-link active">Home</a></li>
                    <li><a href="./Donate.php" class="nav-link">Donate</a></li>
                    <li><a href="./about.php" class="nav-link">About</a></li>
                    <li><a href="./contact.php" class="nav-link">Contact</a></li>
                </div>
            </div>
            <div class="nav-social-links-main">
                <div class="nav-social-links">
                    <li class="nav-social-link">
                        <a href="https://web.whatsapp.com/">
                            <img src="./photos/whatapp.png" alt="whataapp">
                        </a>
                    </li>
                    <li class="nav-social-link">
                        <a href="https://www.youtube.com/">
                            <img src="./photos/youtube.png" alt="youtube">
                        </a>
                    </li>
                    <li class="nav-social-link">
                        <a href="https://www.facebook.com/home.php">
                            <img src="./photos/facebook.png" alt="facebook">
                        </a>
                    </li>
                    <li class="nav-social-link">
                        <a href="https://www.instagram.com/accounts/login/?hl=en">
                            <img src="./photos/insta .png" alt="instagram">
                        </a>
                    </li>
                </div>
            </div>

            <!-- ✅ Logged-in user info -->
            <div class="nav-social-links-main">
                <div class="nav-social-links">
                    <!-- <li class="nav-social-link"> -->
                        <span style="font-weight: bold;">Welcome, <?php echo $username; ?> 👋</span>
                    <!-- </li> -->
                    <!-- <li class="nav-social-link"> -->
                        <a href="./logout.php" class="login-button" style="background-color: #ed1b24; padding: 6px 12px; border-radius: 6px; color: white; text-decoration: none;">Logout</a>
                    <!-- </li> -->
                </div>
            </div>
        </div>
    </nav>
    <!-- nav bar ends -->

    <!-- side bar begins-->
    <aside class="sidebar-container">
        <div class="sidebar-center wrapper">
            <div class="side-header">
                <div class="logo-section">
                    <a href="./home.php"><img src="./icons/uni.png" alt="university"></a>
                </div>
                <div class="close-button">
                    <img src="./icons/closebar.png" alt="closebutton">
                </div>
            </div>
            <div class="sidebar-content paddingtopmobile-fifty">
                <div class="sidebar-links-main">
                    <ul class="sidebar-links">
                        <li><a href="./home.php" class="nav-link active">HOME</a></li>
                        <li><a href="./Donate.php" class="nav-link">DONATE</a></li>
                        <li><a href="./about.php" class="nav-link">ABOUT</a></li>
                        <li><a href="./contact.php" class="nav-link">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- side bar ends -->

    <!-- hero section start -->
    <div class="home-page page-hero-container">
        <div class="page-hero">
            <div class="hero-img-component">
                <div class="img-container">
                    <img src="./photos/back.jpg" alt="university hero">
                </div>
            </div>
            <div class="hero-box paddingbottommobile-thirty paddingtopmobile-thirty">
                <div class="hero-content text-center wrapper paddingbottommobile-thirty paddingtopmobile-thirty">
                    <h1 class="heading" style="text-shadow: 2px 2px 5px black;">BLOOD & ORGAN DONATION</h1>
                    <div class="quote-container">
                        <div class="quote active">Be a hero twice—donate blood today, and your organs for tomorrow.</div>
                        <div class="quote">A drop of blood, an organ of hope—both can save lives.</div>
                        <div class="quote">Give blood, give organs, give life.</div>
                        <div class="quote">Live by giving, leave by saving—donate blood and organs.</div>
                        <div class="quote">One donation today, a lifetime saved tomorrow.</div>
                        <div class="quote">The best gift is the gift of life—donate blood, donate organs.</div>
                        <div class="quote">Your body can save more lives than you ever imagined.</div>
                    </div>
                    <div class="button-container">
                        <a href="./contact.html" class="home-button button-light">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero section end -->

    <!-- Campaign Section -->
    <div class="featured-courses-container light-blue-background">
        <div class="featured-courses-center wrapper">
            <div class="section-title text-center" style="padding: 25px;">
                <h2 class="title">Campaign</h2>
                <div class="underline"></div>
            </div>

            <section class="section featured-courses three-column-layout">
                <div class="scroll-container">
                    <div class="image-wrapper">
                        <img src="./photos/cam-1.jpg" alt="cam1" width="400" height="500">
                        <img src="./photos/cam-2.webp" alt="cam2" width="400" height="500">
                        <img src="./photos/cam-3.png" alt="cam3" width="400" height="500">
                        <img src="./photos/cam-4.jpg" alt="cam4" width="400" height="500">
                        <img src="./photos/cam-5.jpg" alt="cam5" width="400" height="500">
                        <img src="./photos/cam-6.jpeg" alt="cam6" width="400" height="500">
                        <img src="./photos/cam-7.avif" alt="cam7" width="400" height="500">
                        <img src="./photos/cam-8.jpg" alt="cam8" width="400" height="500">
                        <img src="./photos/cam-9.jpg" alt="cam9" width="400" height="500">
                        <img src="./photos/cam-10.avif" alt="cam10" width="400" height="500">
                    </div>
                </div>
            </section>

            <div class="text-center" style="padding: 25px;">
                <a href="./courses.html" class="button-dark">View All</a>
            </div>
        </div>
    </div>

    <!-- Why Should You Donate Section -->
    <div class="our-campases-container light-pink-background">
        <div class="our-campases-center wrapper">
            <div class="section-tittle paddingtopdesktop-hunderd paddingtopmobile-fifty">
                <h2 class="title text-center">Why Should You Donate? 🤔</h2>
                <div class="underline"></div>
            </div>
            <section class="our-campases three-coloum-layout">
                <article class="each-campus">
                    <div class="img-container">
                        <a href="./info.html"><img src="./photos/b-3.jpeg" alt="Benefit"></a>
                    </div>
                    <div class="campus-name"><p>Helps manage weight</p></div>
                </article>

                <article class="each-campus">
                    <div class="img-container">
                        <a href="./info.html"><img src="./photos/b-4.jpeg" alt="Benefit"></a>
                    </div>
                    <div class="campus-name"><p>Improves blood flow</p></div>
                </article>

                <article class="each-campus">
                    <div class="img-container">
                        <a href="./info.html"><img src="./photos/b-2.jpeg" alt="Benefit"></a>
                    </div>
                    <div class="campus-name"><p>Saves lives</p></div>
                </article>

                <article class="each-campus">
                    <div class="img-container">
                        <a href="./info.html"><img src="./photos/b-1.jpeg" alt="Benefit"></a>
                    </div>
                    <div class="campus-name"><p>Improves heart health</p></div>
                </article>
            </section>
        </div>
    </div>

    <!-- Contact Promotion -->
    <div class="contact-promotion-container light-pink-background">
        <div class="contact-promotion text-center wrapper">
            <div class="section-title">
                <h2 class="title" style="color: #ed1b24;">Contact Us To Donate</h2>
                <div class="underline pad"></div>
            </div>
            <section class="contact-promotion">
                <div class="contact-promo">
                    <img src="./photos/erp.jpg" alt="contact-promotion">
                    <div class="contact-info-container text-center">
                        <h3 class="text-heading" style="color: #f8a9ac;">"Don't let your organs go to waste, let them save lives"</h3>
                        <br>
                        <a href="./contact.html" class="button-dark">CONTACT</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- footer start -->
    <footer class="footer-container">
        <div class="footer-center wrapper">
            <div class="footer-links-main">
                <ul class="footer-links">
                    <li><a href="./home.php" class="footer-link active">HOME</a></li>
                    <li><a href="./Donate.php" class="footer-link">DONATE</a></li>
                    <li><a href="./about.php" class="footer-link">ABOUT</a></li>
                    <li><a href="./contact.php" class="footer-link">CONTACT</a></li>
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
                <p>copyright <span class="copyright-date">@ 2025</span>, done by</p>
            </div>
        </div>
    </footer>
    <!-- footer ends -->

    <script src="./d.js"></script>
    <script>
        let quotes = document.querySelectorAll(".quote");
        let index = 0;
        function showNextQuote() {
            quotes[index].classList.remove("active");
            index = (index + 1) % quotes.length;
            quotes[index].classList.add("active");
        }
        setInterval(showNextQuote, 5000);
    </script>
</body>
</html>
