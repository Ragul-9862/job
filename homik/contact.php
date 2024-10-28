<!DOCTYPE html>
<html lang="en">
<!-- Include other parts of the HTML -->

<head>
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon" />
</head>

<body>

    <?php include('header.php') ?>

    <div class="container-fluid product-page-main d-flex justify-content-center align-items-center">
        <div class="back-to-section-main">
            <div>
                <div class="back-to-section-main-info">
                    <h2>Contact</h2>
                    <p class="text-center"><a href="index.php">Home</a> - <span>Contact</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                    <div class="contact-left">
                        <h2 class="main-heading text-center">
                            Get In Touch
                        </h2>
                        <!-- <p class="font14">Your email address will not be published. Required fields are marked *</p> -->
                        <form id="ajax-form" name="ajax-form" action="contact.php" method="post" class="wpcf7">
                            <div class="main-form">
                                <p>
                                    <label for="name"> <span class="error" id="err-name">please enter
                                            name</span></label>
                                    <input type="text" name="name" value="" size="40" class="" aria-invalid="false"
                                        placeholder="Your Name *" required>
                                </p>
                                <p>
                                    <label for="email">
                                        <span class="error" id="err-email">please enter e-mail</span>
                                        <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                                    </label>
                                    <input type="email" name="email" id="email" value="" size="40" class=""
                                        aria-invalid="false" placeholder="Your Email *" required>
                                </p>
                                <p>
                                    <label for="message"></label>
                                    <textarea name="message" id="message" cols="40" rows="10" class=""
                                        aria-invalid="false" placeholder="Message..." required></textarea>
                                </p>
                                <p><button type="submit" id="send" class="octf-btn">Send Message</button></p>
                                <div class="clear"></div>
                                <div class="error" id="err-form">There was a problem validating the form please check!
                                </div>
                                <div class="error" id="err-timedout">The connection to the server timed out!</div>
                                <div class="error" id="err-state"></div>
                            </div>
                        </form>

                        <div class="clear"></div>
                        <div id="ajaxsuccess">Successfully sent!!</div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-right">
                        <div class="ot-heading">

                            <h2 class="main-heading">Let's Start a Project</h2>
                        </div>
                        <div class="contact-info">
                            <i class="ot-flaticon-place"></i>
                            <div class="info-text">
                                <h6>OUR ADDRESS:</h6>
                                <p>34/3, 4th floor, Vellakinar Pirivu, Methupalayam Road, Coimbatore - 641029</p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <i class="ot-flaticon-mail"></i>
                            <div class="info-text">
                                <h6>OUR MAILBOX:</h6>
                                <p><a href="mailto:theratio_interior@mail.com">texample@mail.com</a></p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <i class="ot-flaticon-phone-call"></i>
                            <div class="info-text">
                                <h6>OUR PHONE:</h6>
                                <p><a href="tel:+1 800 456 789 123">+91 99940 21005</a></p>
                            </div>
                        </div>
                        <div class="list-social">
                            <ul>
                                <li><a href="http://facebook.com" target="_self"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="http://linkedin.com" target="_self"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li><a href="http://instagram" target="_self"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="contact-map">
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4415.3088219051715!2d76.94105221111437!3d11.064476489056872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8f6224f9fe6e7%3A0x9512f8bcda1c39c1!2sVellakinar%20Pirivu!5e1!3m2!1sen!2sin!4v1729944115144!5m2!1sen!2sin"
                height="522" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>

    <?php include('footer.php') ?>

</body>

</html>