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
                    <h2>Careers</h2>
                    <p class="text-center"><a href="index.php">Home</a> - <span>Careers</span></p>
                </div>
            </div>
        </div>
    </div>

    <main id="main">
        <!-- Tab Navigation for Categories -->
        <section class="careers-main">
            <div class="container-fluid">
                <div class="row">

                    <!-- Form Section (Right) -->

                    <div class="contact-left form-careers">
                        <h2 class="main-heading text-center">
                            Apply Now
                        </h2>
                        <!-- <p class="font14">Your email address will not be published. Required fields are marked *</p> -->
                        <form id="ajax-form" name="ajax-form" action="contact.php" method="post" class="wpcf7">
                            <div class="main-form">
                                <p>
                                    <label for="name"> <span class="error" id="err-name">please enter
                                            name</span></label>
                                    <input type="text" name="name" value="" size="40" class="" aria-invalid="false"
                                        placeholder="Your Name *" required="">
                                </p>
                                <p>
                                    <label for="email">
                                        <span class="error" id="err-email">please enter e-mail</span>
                                        <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                                    </label>
                                    <input type="email" name="email" id="email" value="" size="40" class=""
                                        aria-invalid="false" placeholder="Your Email *" required="">
                                </p>
                                <p>

                                    <label for="position" class="form-label">Position</label>
                                    <select class="form-select" id="position" required>
                                        <option selected disabled>Choose a position...</option>
                                        <option value="Auto CADD ">Auto CADD </option>
                                        <option value="2D draftman ">Backe2D draftman </option>
                                        <option value="Interior designer ">Interior designer </option>
                                        <option value="BOQ and material preparation ">BOQ and material preparation
                                        <option value="Production Incharge ">Production Incharge
                                        </option>
                                    </select>
                                </p>
                                <p>

                                </p>
                                <div class="mb-3">
                                    <label for="resume" class="form-label">Upload Resume</label>
                                    <input type="file" class="form-control" id="resume" required>
                                </div>

                                <p><button type="submit" id="send" class="octf-btn">Send Message</button></p>
                                <div class="clear"></div>
                                <div class="error" id="err-form">There was a problem validating the form please
                                    check!
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
            </div>
        </section>


    </main><!-- End #main -->

    <?php include('footer.php') ?>

</body>

</html>