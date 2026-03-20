<?php
// Enable error reporting (useful during development)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session (to maintain login if needed)
session_start();

// Optional: If you want to restrict access to logged-in users only, uncomment below
/*
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOD&ORGAN-DONATION</title>
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" href="./home.css">
    <link rel="stylesheet" href="./nav.css">
    <link rel="stylesheet" href="./sidebar.css">
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
                <img src="./icons/button.png" alt="sidebaropen">
            </div>
            <div class="nav-links-main">
                <div class="nav-links">
                    <li><a href="./home.php" class="nav-link">HOME</a></li>
                    <li><a href="./Donate.php" class="nav-link">DONATE</a></li>
                    <li><a href="./about.php" class="nav-link active">ABOUT</a></li>
                    <li><a href="./contact.php" class="nav-link">CONTACT</a></li>
                </div>
            </div>
            <div class="nav-social-links-main">
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
                    <a href="./home.php"><img src="./icons/uni.png" alt="university"></a>
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
                        <li><a href="./about.php" class="nav-link active">ABOUT</a></li>
                        <li><a href="./contact.php" class="nav-link">CONTACT</a></li>
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
                    <img src="./photos/rrr.jpg" alt="about hero">
                </div>
            </div>
            <div class="hero-box paddingbottommobile-thirty paddingtopmobile-thirty">
                <div class="hero-content text-center wrapper psddiingtopmobile-thirty paddingbottommobile-thirty">
                    <h1 class="heading">BLOOD&ORGAN-DONATION</h1>
                    <div class="small-heading">Donate-Be a hero for others</div>
                </div>
            </div>
        </div>
      </div>
     <!-- hero section end -->

       <!-- future container start -->
       <div class="single-featured-container light-blue-background reverse-content">
        <div class="single-featured-center wrapper">
            <div class="section-tittle text-center paddingtopdesktop-hunderd paddingbottomdesktop-fifty paddingtopmobile-fifty paddingbottommobile-fourty">
                <h2 class="tittle paddingbottomdesktop-twenty paddingbottommobile-twenty">About-us</h2>
                <div class="underline"></div>
            </div>
            <div class="single-featured">
                <div class="image-component single-featured-image paddingbottommobile-fourty">
                    <img src="./photos/back.jpg" alt="about">
                </div>
                <div class="single-featured-text-component">
                    <div class="featured-center">
                        <div class="about-info">
                            <p>Blood donation and organ donation are life-saving acts of generosity that help millions of people worldwide. Blood donation involves voluntarily giving blood, which is used in transfusions for accident victims, surgical patients, individuals with anemia, and those undergoing cancer treatment. There are different types of blood donation, including whole blood, platelet, plasma, and double red cell donation. Generally, healthy individuals between the ages of 18 and 65, meeting weight and health criteria, can donate. Besides saving lives, blood donation also benefits the donor by promoting new blood cell production and reducing the risk of certain health conditions.</p>
                            <p>Organ donation, on the other hand, involves donating an organ or tissue to a person in need of a transplant. It can be done while alive, such as donating a kidney or part of the liver, or after death, where multiple organs like the heart, lungs, pancreas, and intestines can be transplanted. Tissues such as corneas, skin, and bones can also be donated to help improve lives. Organ donation is crucial as it provides a second chance at life for patients suffering from organ failure. While anyone can register as an organ donor, living donors must meet specific medical criteria. By choosing to donate blood or organs, individuals make an invaluable contribution to society, offering hope and survival to those in critical need.</p>
                            <h1 style="color: red;">Who Can Donate?
                                <p> Anyone can register as an donor.
                                    <br>
                                    Living donors must meet medical criteria.
                                    <br>
                                    Deceased donors must be declared brain dead by doctors.
                                <br>
                            </p>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>
       <!-- future container end -->

          <!-- contact promotion section start  -->
          <div class="contact-promotion-container light-pink-background paddingbottomdesktop-fifty paddingbottommobile-fourty">
            <div class="contact-promotion text-center wrapper">
                <div class="section-title paddingbottomdesktop-fifty paddingtopdesktop-hunderd paddingtopmobile-thrity paddingbottommobile-thrity">
                    <h2 class="title paddingbottomdesktop-twenty paddingbottommobile-thrity">Register for donate</h2>
                    <div class="underline pad"></div>
                </div>
                <section class="contact-promotion">
                    <div class="contact-promo">
                        <img src="./photos/ab.jpeg" alt="contact-promotion">
                        <div class="contact-info-container text-center .text-container paddingtopdesktop-hunderd paddingbottomdesktop-fifty paddingtopmobile-fifty">
                            <h3 class="text-heading">enroll for our various courses from any where in india</h3>
                            <br>
                            <a href="./contact.php" class="button-dark ">CONTACT</a>
                        </div>
                    </div>
                </section>
            </div>
          </div>
         <!-- contact promotion section end  -->

      <!-- footer start -->
       <footer class="footer-container">
        <div class="footer-center wrapper">
            <div class="footer-links-main">
                <ul class="footer-links">
                    <li><a href="./home.php" class="footer-link">HOME</a></li>
                    <li><a href="./Donate.php" class="footer-link">DONATE</a></li>
                    <li><a href="./about.php" class="footer-link active">ABOUT</a></li>
                    <li><a href="./contact.php" class="footer-link">CONTACT</a></li>
                </ul>
            </div>
            <div class="social-links-main">
                <ul class="social-links">
                    <li class="social-link"><a href="https://web.whatsapp.com/"><img src="./photos/whatapp.png" alt="whatapp" style="height:40px;width:40px;"></a></li>
                    <li class="social-link"><a href="https://www.youtube.com/"><img src="./photos/youtube.png" alt="youtube" style="height:40px;width:40px;"></a></li>
                    <li class="social-link"><a href="https://www.facebook.com/home.php"><img src="./photos/facebook.png" alt="facebook" style="height:40px;width:40px;"></a></li>
                    <li class="social-link"><a href="https://www.instagram.com/accounts/login/?hl=en"><img src="./photos/insta .png" alt="instagram" style="height:40px;width:40px;"></a></li>
                </ul>
            </div>
            <div class="footer-copy-right">
                <p>copy right @<span class="copyright-date">2025</span>,done by</p>
            </div>
        </div>
       </footer>
       <!-- footer ends -->
       <script src="./d.js"></script>
</body>
</html>
