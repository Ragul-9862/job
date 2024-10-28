<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<head>
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon" />
    <style>
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #6fbf44 !important;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
    }

    .product-card {
        position: relative;
        overflow: hidden;
        border: 1px solid #ddd;
        padding: 10px;
        transition: box-shadow 0.3s ease-in-out;
    }

    .product-card:hover {
        border: 1px solid #6FBF44;
    }

    .image-container {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 100%;
        /* Ensures square ratio */
        overflow: hidden;
    }

    .image-container img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.5s ease-in-out;
        /* Smooth transition for hover effect */
        top: 0;
        left: 0;
    }

    .image-container .hover-img {
        opacity: 0;
        /* Start with the hover image hidden */
    }

    .image-container:hover .default-img {
        opacity: 0;
        /* Hide the default image on hover */
    }

    .image-container:hover .hover-img {
        opacity: 1;
        /* Show the hover image */
    }

    .product-details {
        padding: 10px;
    }

    .product-catagory {
        font-weight: bold;
        color: #6FBF44;
    }

    .product-des {
        color: #999;
        text-decoration: none;
        font-size: 14px;
    }
    </style>
</head>

<body>


    <?php include('header.php') ?>


    <div class="container-fluid product-page-main d-flex justify-content-center align-items-center">
        <div class="back-to-section-main">
            <div>
                <div class="back-to-section-main-info">
                    <h2>Gallery</h2>
                    <p class="text-center"><a href="index.php">Home</a> - <span>Gallery</span></p>
                </div>
            </div>
        </div>
    </div>

    <main id="main">
        <!-- Tab Navigation for Categories -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <div class="d-flex justify-content-center align-items-center">
                        <span>
                            <img class="heading-icon" src="./assets/images/icon/heading-icon.png" alt="">
                        </span>
                        <h2 class="main-heading text-center">
                            Gallery
                        </h2>
                    </div>
                </div>
                <?php
                // Define database connection variables
                $servername = "localhost";  // Usually 'localhost' if the database is on the same server
                $username = "root";         // Your MySQL username
                $password = "";             // Your MySQL password (empty if none)
                $dbname = "homik";   // Your database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                ?>
                <!-- Category Tabs -->
                <ul class="nav nav-tabs justify-content-center" id="productTabs" role="tablist">
                    <?php
                    // Connect to the database and fetch categories
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sqlCategories = "SELECT * FROM category";
                    $resultCategories = $conn->query($sqlCategories);
                    $active = 'active'; // First tab will be active by default

                    while ($rowCategory = $resultCategories->fetch_assoc()) {
                        echo '<li class="nav-item" role="presentation">
                                <button class="nav-link ' . $active . '" id="tab-' . $rowCategory["id"] . '" data-bs-toggle="tab" data-bs-target="#cat-' . $rowCategory["id"] . '" type="button" role="tab" aria-controls="cat-' . $rowCategory["id"] . '" aria-selected="true">' . $rowCategory["category_name"] . '</button>
                              </li>';
                        $active = ''; // Remove 'active' for subsequent tabs
                    }
                    ?>
                </ul>

                <!-- Tab Content for Products -->
                <div class="tab-content" id="productTabsContent">
                    <?php
                    // Fetch products for each category and display them under the corresponding tab
                    $resultCategories->data_seek(0); // Reset the result pointer to fetch categories again
                    while ($rowCategory = $resultCategories->fetch_assoc()) {
                        echo '<div class="tab-pane fade ' . $active . '" id="cat-' . $rowCategory["id"] . '" role="tabpanel" aria-labelledby="tab-' . $rowCategory["id"] . '">';

                        // Fetch products for the current category
                        $sqlProducts = "SELECT * FROM product WHERE cat_id = " . $rowCategory["id"];
                        $resultProducts = $conn->query($sqlProducts);

                        if ($resultProducts->num_rows > 0) {
                            echo '<div class="row">';
                            while ($rowProduct = $resultProducts->fetch_assoc()) {
                                // Assign $imagePath inside the product loop
                                $imagePath = 'admin/' . htmlspecialchars($rowProduct['image_default']);
                                $imageDefault = 'admin/' . htmlspecialchars($rowProduct['image_hover']);
                                echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mt-5">
                <div class="product-card">
                    <div class="product-tumb">
                        <div class="image-container">
                            <img class="img-fluid default-img" src="' . $imagePath . '" alt="">
                            <img class="img-fluid hover-img" src="' . $imageDefault . '" alt="">
                        </div>
                    </div>
                    <div class="product-details">
                        <div>
                            <span class="product-catagory">' . htmlspecialchars($rowCategory["category_name"]) . '</span>
                            <p class="product-catagory">' . htmlspecialchars($rowProduct["product_name"]) . '</p>
                        </div>
                        <p><a class="product-des" href="#">' . htmlspecialchars($rowProduct["description"]) . '</a></p>
                    </div>
                </div>
            </div>';
                            }
                            echo '</div>';
                        } else {
                            echo '<p>No products found in this category.</p>';
                        }
                        echo '</div>';
                        $active = ''; // Remove 'show active' for subsequent tabs
                    }
                    $conn->close();
                    ?>

                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <?php include('footer.php') ?>
    <script>
    // Wait for the DOM to load
    document.addEventListener('DOMContentLoaded', function() {
        // Select all tab buttons and content panes
        const tabButtons = document.querySelectorAll('#productTabs button');
        const tabPanes = document.querySelectorAll('.tab-pane');

        // Ensure the first tab is active on load
        tabButtons[0].classList.add('active');
        tabPanes[0].classList.add('show', 'active');

        // Function to handle tab switching
        function switchTab(event) {
            // Deactivate all tabs and hide content panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('show', 'active'));

            // Activate the clicked tab and corresponding content pane
            const targetPane = document.querySelector(event.target.dataset.bsTarget);
            event.target.classList.add('active');
            targetPane.classList.add('show', 'active');
        }

        // Add event listeners to all tab buttons
        tabButtons.forEach(button => {
            button.addEventListener('click', switchTab);
        });
    });
    </script>
</body>

</html>