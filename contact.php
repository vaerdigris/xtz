<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = 'All fields are required.';
    } else {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'w.tcureta@gmail.com'; 
            $mail->Password = 'gtaq eufi ogjq bjmt'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($email, $name);
            $mail->addAddress('w.tcureta@gmail.com'); 

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = '<p><strong>Name:</strong> ' . $name . '</p><p><strong>Email:</strong> ' . $email . '</p><p><strong>Message:</strong> ' . nl2br($message) . '</p>';
            $mail->AltBody = "Name: $name\nEmail: $email\n\nMessage:\n$message";

            $mail->send();
            $success = 'Message has been sent successfully!';
        } catch (Exception $e) {
            $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XTZ Corp.</title>

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/xtz/xtzres.png" />
    <meta name="description" content="XTZ Website Homepage" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/icomoon/style.css" />
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css" />

    <link rel="stylesheet" href="assets/css/xtz.css" />
</head>

<body class="">
    <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/xtz/xtzlogowhite.png);"></div>
    </div>
    <!-- loading -->
    <div class="page-wrapper">
        <header class="main-header main-header-two">
            <nav class="main-menu">
                <div class="container-fluid">
                    <div class="main-menu__logo">
                        <a href="index.php">
                            <img src="assets/images/xtz/xtzlogowhite.png" height=34px alt="XTZ">
                        </a>
                    </div>
                    <div class="main-menu__right">
                        <a href="home.php">Home</a>
                        <a href="partners.php">Our Partners</a>
                        <a class="active" href="contact.php">Contact Us</a>
                    </div>
                </div>
            </nav>
        </header>

        <!--Contact-->
        <section class="contact-form">
            <div class="container wow fadeInUp animated" data-wow-delay="300ms">
                <div class="section-title text-center">
                    <h5 class="section-title__tagline section-title__tagline--has-dots">Work with XTZ</h5>
                    <h2 class="section-title__title">Get in touch with us</h2>
                </div>

                <!-- Display success or error messages -->
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <div class="contact__left text-center">
                    <div class="contact__form-box">
                        <form action="contact.php" method="post" class="contact__form contact-form-validated" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact__input-box">
                                        <input type="text" placeholder="Your name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact__input-box">
                                        <input type="email" placeholder="Your email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact__input-box subject-box">
                                        <input type="text" placeholder="Subject" name="subject" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact__input-box text-message-box">
                                        <textarea name="message" placeholder="Message" required></textarea>
                                    </div>
                                    <div class="contact__btn-box">
                                        <button type="submit" class="xtz-btn">Send a Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact-->

        <section class="contact-info">
            <div class="container">
                <div class="contact-info__wrapper">
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="contact-info__item">
                                <div class="contact-info__item__icon"><span class="icon-place"></span></div>
                                <div>
                                    <h3 class="contact-info__item__title">Address</h3>
                                    <p class="contact-info__item__text">
                                        401 Freedom Plaza Building, <br> 217 N. Domingo St., <br> San Juan City, Philippines
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="contact-info__item">
                                <div class="contact-info__item__icon"><span class="icon-phone-call"></span></div>
                                <h3 class="contact-info__item__title">Contact</h3>
                                <p class="contact-info__item__text">
                                    (+63) 917 123 2424 <br> (02) 8256 0362 <br> (02) 7904 4711
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-7">
                            <div class="contact-info__item">
                                <div class="contact-info__item__icon"><span class="icon-phone"></span></div>
                                <h3 class="contact-info__item__title">Email</h3>
                                <p class="contact-info__item__text">
                                    info@xtzbusiness.ph
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="google-map">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.8467512944158!2d121.02462621436936!3d14.607804380817456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b724f585c339%3A0xd426919712651bbc!2sXTZ%20Enterprises!5e0!3m2!1sen!2sph!4v1656404063969!5m2!1sen!2sph" class="google-map__embed" allowfullscreen></iframe>
            </div>
        </section>

        <footer class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="main-footer__about">
                            <ul>
                                <h1 class="footer-text">XTZ Corp.</h1>
                                401 Freedom Plaza Building, San Juan City, Philippines
                                <br>(+63) 917 123 2424 <br> (02) 8256 0362
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3" data-wow-delay="400ms">
                        <div class="main-footer__navmenu">
                            <ul>
                                <br>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="partners.php">Our Partners</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3" data-wow-delay="400ms">
                        <div class="main-footer__navmenu">
                            <ul>
                                <br>
                                <li>Follow us on:</li>
                                <div class="main-footer__social">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
        <!-- back to top -->
        <a href="#" class="scroll-top">
        <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
        </a>
        <!-- back to top -->

        <!-- Scripts -->
        <script src="assets/vendors/jquery/jquery-3.5.1.min.js"></script>
        <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
        <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
        <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
        <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="assets/vendors/wow/wow.js"></script>
        <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
        <script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
        <script src="assets/js/xtz.js"></script>
        </body>
        </html>

