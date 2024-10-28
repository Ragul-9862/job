<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon" />
</head>
<style>
/* Carousel Container Styling */
.banner-carousel {
    width: 100%;
    background-color: #f5f5f5;
}

.carousel-slide {
    position: relative;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.carousel-slide h2 {
    font-size: 2.5rem;
    color: #fff !important;
    margin-bottom: 15px;
    animation: fadeInUp 1s ease-in-out;
}

.carousel-slide p {
    font-size: 1.2rem;
    color: #666;
    animation: fadeInUp 1.5s ease-in-out;
}

/* Custom Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Owl Carousel Custom Controls */
.owl-nav {
    position: absolute;
    top: 90%;
    left: 5%;
    width: 100%;
    display: flex;
    transform: translateY(-50%);
}

.owl-nav .owl-prev,
.owl-nav .owl-next {
    background-color: #000;
    color: white;
    padding: 0px 12px;
    margin: 3px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.owl-nav .owl-prev:hover,
.owl-nav .owl-next:hover {
    background-color: #6FBF44;
}
</style>

<body>

    <!-- <div id="royal_preloader"></div> -->
    <div id="page" class="site">
        <?php include('header.php') ?>

        <div class="enquiry-main">
            <!-- Enquiry Form -->
            <div class="form-container enquiry-form-main">
                <form class="enquiry-form">
                    <!-- Submit Request Button -->
                    <div class="d-flex justify-content-center mb-3">
                        <button style="background-color:#6FBF44 !important" type="submit" class="submit-btn btn  "> <a
                                class="text-white" href="">Request Call</a> <span><i style="color:white"
                                    class="fas fa-phone-alt"></i></span></button>

                    </div>

                    <!-- Form Inputs -->
                    <div class="row">
                        <div class="mb-4 col-12 col-sm-6">
                            <!-- <label for="name" class="form-label">Full Name</label> -->
                            <input type="text" class="form-control" id="name" placeholder="Name" required>
                        </div>
                        <div class="mb-4 col-12 col-sm-6">
                            <!-- <label for="phone" class="form-label">Phone Number</label> -->
                            <input type="tel" class="form-control" id="phone" placeholder="Phonenumber" required>
                        </div>

                    </div>

                    <div class="mb-4 ">
                        <!-- <label for="email" class="form-label">Email Address</label> -->
                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <div class="mb-4">
                        <!-- <label for="enquiry" class="form-label">Your Enquiry</label> -->
                        <textarea class="form-control" id="enquiry" rows="4" placeholder="Write your message here..."
                            required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Send Enquiry</button>
                    </div>
                </form>
            </div>

            <!-- Enquiry Form -->
            <div id="content" class="site-content">
                <div class="banner-carousel owl-carousel">
                    <!-- Slide 1 -->
                    <div class="carousel-slide banner-4">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-7 col-lg-12">
                                    <h2>
                                        We provide efficient B2B interior solutions <br />
                                        tailored to your needs.
                                    </h2>
                                    <!-- <div class="banner-desc-4">
            <p>We will help you build a dream.</p>
          </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-slide banner-5">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-7 col-lg-12">
                                    <h2>Transform your space with innovative designs.</h2>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-slide banner-6">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-7 col-lg-12">
                                    <h2>Seamless integration of functionality and style.</h2>
                                    <!-- <div class="banner-desc-4">
            <p>Your satisfaction is our mission.</p>
          </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- WhatsApp & Call Buttons -->
            <div class="floating-icons">
                <a href="https://wa.me/919994021005
" target="_blank" class="whatsapp-icon" aria-label="Chat on WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="tel:+9199940 21005
" class="call-icon" aria-label="Call Us">
                    <i class="fas fa-phone-alt"></i>
                </a>
            </div>
            <section>
                <div class="space-10"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 mb-5 mb-lg-0">
                            <div class="benefits-desc-classic">
                                <div class="ot-heading">
                                    <h2 class="main-heading text-center">
                                        “Doing things right and doing the right things”
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 text-center">
                            <h6 class="title-s2">About Us</h6>
                            <p>
                                Homik has strong corporate governance and complete
                                accountability, driven by a systematic process at every level.
                                We are a fully-fledged organization with a deep and
                                experienced senior management team specializing in business
                                strategy, product design, production, and execution.
                                Our team consists of marketing professionals, architects,
                                designers, site engineers, and a customer support division. We
                                are known for timely delivery, impeccable finishes, excellent
                                team coordination, and exceptional client service.
                            </p>

                        </div>

                        <div class="timeline">
                            <!-- Step 1 -->
                            <div class="timeline-step">
                                <div class="left">1. Explore our Factory</div>
                                <div class="right">2. Meet our team</div>
                            </div>

                            <!-- Step 2 -->
                            <div class="timeline-step">
                                <div class="left">3. Interactive Proposal</div>
                                <div class="right">4. Accept or reject the proposal</div>
                            </div>

                            <!-- Step 3 -->
                            <div class="timeline-step">
                                <div class="left">5. Login</div>
                                <div class="right">6. Finalize</div>
                            </div>

                            <!-- Step 4 -->
                            <div class="timeline-step">
                                <div class="left">7. Just a click away</div>
                                <div class="right">8. Repeat the process</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ot-button text-center mt-3">
                    <a href="#" class="octf-btn octf-btn-dark border-hover-dark">Read More</a>
                </div>
                <div class="space-10"></div>
            </section>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />


            <section class="skill-4 p-md-0 pb-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center theratio-align-center">
                            <div class="">
                                <span>OUR PRODUCTION PROCESS </span>
                                <h2 class="main-heading">
                                    “Simplified Solution. Efficiently Delivered”
                                </h2>
                                <p>
                                    We simplified your modular interior furniture process to
                                    make the potential of any material shine, with the help of
                                    state-of-the-art machinery from India, Germany, and Italy.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 p-lg-0 align-self-center">
                            <div class="skill-img-4 text-center">
                                <div class="space-40"></div>
                                <div class="skill-img-4">
                                    <h4>Production Process</h4>
                                </div>
                                <img src="./images/production/Production-1.png" alt="" />
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 p-lg-0 align-self-center">
                            <div class="skill-img-4 text-center">
                                <div class="space-40"></div>
                                <div class="skill-img-4">
                                    <h4>Mini Fix</h4>
                                </div>
                                <img src="./images/production/Production-2.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="testi-4 p-md-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 px-xl-0">
                            <div class="testi-img-3 text-center">
                                <img class="img-fluid" src="./images/testimonial/testimonial.png" alt="" />
                                <div class="space-40 d-block d-md-none"></div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 px-xl-0 mb-5 mb-xl-0 align-self-center">
                            <div class="testi-slide-block-4">
                                <div class="">
                                    <span>testimonials</span>
                                    <h2 class="main-heading">What People Say</h2>
                                </div>
                                <div class="space-20"></div>
                                <div class="space-5"></div>
                                <div class="ot-testimonials v-light">
                                    <div
                                        class="testimonials-slide-2 s2 ot-testimonials-slider-s2 owl-theme owl-carousel">
                                        <div class="testi-item">
                                            <div class="ttext">
                                                “Working with Homik was a seamless experience. Their
                                                strong corporate governance and transparent processes
                                                made every phase of our project stress-free. The team
                                                kept us updated throughout and ensured complete
                                                accountability at every level. We truly appreciate
                                                their professionalism and would recommend them without
                                                hesitation.”
                                            </div>
                                            <div class="t-head flex-middle">
                                                <div class="tinfo">
                                                    <h5>Kristina Lee</h5>
                                                    <span>Client of Company</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testi-item">
                                            <div class="ttext">
                                                “Homik's design expertise and meticulous execution
                                                made all the difference in our project. Their site
                                                engineers, designers, and architects worked in perfect
                                                harmony, ensuring the vision we had was fully
                                                realized. Plus, their timely delivery and flawless
                                                finishes exceeded our expectations. It’s rare to find
                                                such efficient and well-coordinated teams.”
                                            </div>
                                            <div class="t-head flex-middle">
                                                <div class="tinfo">
                                                    <h5>Pablo Gusterio</h5>
                                                    <span>Client of Company</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include('footer.php') ?>

</body>

<script>
$(document).ready(function() {
    $(".banner-carousel").owlCarousel({
        items: 1, // Show one item at a time
        loop: true, // Infinite looping
        margin: 10, // Margin between items
        nav: true, // Show navigation arrows
        dots: false, // Show dots for pagination
        autoplay: true, // Enable autoplay
        autoplayTimeout: 3000, // 3 seconds per slide
        autoplayHoverPause: true, // Pause on hover
        animateOut: 'fadeOut', // Animation when slide changes
        animateIn: 'fadeIn', // Animation when slide enters
        navText: ["<", ">"] // Custom arrow text
    });
});
</script>

</html>