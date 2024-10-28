<?php
// Database connection
$host = 'localhost'; // Change if necessary
$user = 'root'; // Your database username
$password = ''; // Your database password
$dbname = 'homik'; // Your database name

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch blog posts
$sql = "SELECT title, content, image FROM process ORDER BY id DESC"; // Order by id instead of created_at
$result = $conn->query($sql);

?>

<head>
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon" />
    <style>
    .hover-effect {
        overflow: hidden;
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
    }

    .hover-effect img {
        transition: transform 0.3s ease;
        border-radius: 8px;
    }

    .hover-effect p {
        transition: color 0.3s ease;
        font-weight: bold;
        margin-top: 10px;
        color: #6FBF44;
    }

    /* Hover Effect */
    .hover-effect:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px #6FBF44;
    }

    .hover-effect:hover img {
        transform: scale(1.1);
    }
    </style>
</head>

<body>

    <?php include('header.php') ?>

    <div class="container-fluid product-page-main d-flex justify-content-center align-items-center">
        <div class="back-to-section-main">
            <div>
                <div class="back-to-section-main-info">
                    <h2>Production</h2>
                    <p class="text-center"><a href="index.php">Home</a> - <span>Production</span></p>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="entry-content">
            <h2 class="main-heading text-center">
                Machinery
            </h2>
            <div class="container">
                <div class="row">
                    <?php
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
             echo '<div class="col-lg-4 col-md-6 col-sm-12">';
        echo '<div class="process-info-main">';
               // Construct image path
             $imagePath = 'admin/' . htmlspecialchars($row['image']);

              if (!empty($imagePath) && file_exists($imagePath)) {
            echo '<a href="post.html">';
            echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($row['title']) . '">';
            echo '</a>';
             } else {
            echo '<p>Image not available or path incorrect.</p>';
              }
        
        

            // Post Content
            echo '<div class="inner-post">';
            echo '<h5 class="entry-title">';
            echo '<a class="title-link" href="post.html">' . htmlspecialchars($row['title']) . '</a>';
            echo '</h5>';
            echo '<div class="the-excerpt">';
            echo htmlspecialchars(substr($row['content'], 0, 100)) . '...';
            echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                }   
                    } else {
                        echo '<p>No Production posts found.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h2 class="main-heading text-center">
                <h2 class="main-heading text-center mb-3">
                    QUICK ASSEMBLY @ SITE
                </h2>
            </h2>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div>
                        <img class="img-fluid" src="./images/process/process-bg.jpg" alt="" srcset="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="instruction-step ">

                        <div class="step">
                            <h2>1. UNPACK</h2>
                            <p>Carefully unpack each package, ensuring that no parts or hardware are missing or damaged.
                            </p>
                        </div>

                        <div class="step">
                            <h2>2. ORGANIZE</h2>
                            <p>Arrange all panels and hardware according to each cabinet unit, keeping related
                                components
                                together for easy access during assembly.</p>
                        </div>

                        <div class="step">
                            <h2>3. ASSEMBLE</h2>
                            <p>Follow the detailed assembly instructions, ensuring all connections are secure and
                                properly
                                aligned.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h2 class="main-heading text-center mb-3">
                We Cater To Serve
            </h2>
            <div class="row">
                <div class="col-lg-4 col-sm-6 d-flex">
                    <div class="hover-effect" style="flex:1">
                        <img class="img-fluid" src="./images/process/1.png" alt="" srcset="">
                        <p class="text-center">Individual Houses</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 d-flex">
                    <div class="hover-effect" style="flex:1">
                        <img class="img-fluid" src="./images/process/2.png" alt="" srcset="">
                        <p class="text-center">Villas</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 d-flex">
                    <div class="hover-effect" style="flex:1">
                        <img class="img-fluid" src="./images/process/3.png" alt="" srcset="">
                        <p class="text-center">Apartments</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 d-flex">
                    <div class="hover-effect" style="flex:1">
                        <img class="img-fluid" src="./images/process/4.png" alt="" srcset="">
                        <p class="text-center">Educational Institutions</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 d-flex">
                    <div class="hover-effect" style="flex:1">
                        <img class="img-fluid" src="./images/process/5.png" alt="" srcset="">
                        <p class="text-center">Corporate workspace</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 d-flex">
                    <div class="hover-effect" style="flex:1">
                        <img class="img-fluid" src="./images/process/6.png" alt="" srcset="">
                        <p class="text-center">IT Workspace</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 d-flex">
                    <div class="hover-effect" style="flex:1">
                        <img class="img-fluid" src="./images/process/7.png" alt="" srcset="">
                        <p class="text-center">Healthcare and Hospitality</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 d-flex">
                    <div class="hover-effect" style="flex:1">
                        <img class="img-fluid" src="./images/process/8.png" alt="" srcset="">
                        <p class="text-center">Government Institutions</p>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <?php include('footer.php') ?>

</body>

</html>