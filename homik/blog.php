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
$sql = "SELECT title, content, image FROM blog ORDER BY id DESC"; // Order by id instead of created_at
$result = $conn->query($sql);
?>
<head>
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon" />
</head>
<!-- Include other parts of the HTML -->

<body>
    <?php include('header.php'); ?>

    <div class="container-fluid product-page-main d-flex justify-content-center align-items-center">
        <div class="back-to-section-main">
            <div>
                <div class="back-to-section-main-info">
                    <h2>Blog</h2>
                    <p class="text-center"><a href="index.php">Home</a> - <span>Blog</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="entry-content">
        <div class="container">
            <div class="mb-3">
            <h2 class="main-heading text-center ">
                   Our Blogs
                </h2>
            </div>
            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Construct image path
                        $imagePath = 'admin/' . htmlspecialchars($row['image']);

                        echo '<div class="col-lg-4 col-md-6 col-sm-12">';
                        echo '<div class="post-box masonry-post post-item">';
                        echo '<div class="post-inner">';

                        // Entry Media with Image
                        echo '<div class="entry-media post-cat-abs">';
                        echo '<a href="post.html">';
                        echo '<img class="img-fluid" style="height:200px;width:100%;" src="' . $imagePath . '" alt="' . htmlspecialchars($row['title']) . '">';
                        echo '</a>';
                        echo '</div>'; // .entry-media

                        // Inner Post with Title and Content (Excerpt)
                        echo '<div class="inner-post">';
                        echo '<div class="entry-header">';
                        echo '<h5 class="entry-title">';
                        echo '<a class="title-link" href="post.html">' . htmlspecialchars($row['title']) . '</a>';
                        echo '</h5>';
                        echo '</div>'; // .entry-header

                        echo '<div class="the-excerpt">';
                        echo htmlspecialchars(substr($row['content'], 0, 100)) . '...'; // Show first 100 characters of content as an excerpt
                        echo '</div>'; // .the-excerpt

                        echo '</div>'; // .inner-post
                        echo '</div>'; // .post-inner
                        echo '</div>'; // .post-box
                        echo '</div>'; // .col-lg-4
                    }
                } else {
                    echo '<p>No blog posts found.</p>';
                }
                ?>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>