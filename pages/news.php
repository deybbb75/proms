<?php
include '../includes/init.php';
include '../head.php';
include '../header.php';
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <h1>Blog Details</h1>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container" data-aos="fade-up">

                        <article class="article">

                            <div class="banner-img" data-aos="zoom-in">
                            <img src="../assets/img/blog/blog-post-3.webp" alt="Featured blog image" class="img-fluid" loading="lazy">
                            <div class="meta-overlay">
                                <div class="meta-categories">
                                <a href="#" class="category">Web Development</a>
                                <span class="divider">•</span>
                                <span class="reading-time"><i class="bi bi-clock"></i> 6 min read</span>
                                </div>
                            </div>
                            </div>

                            <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                            <div class="content-header">
                                <h1 class="title">Modern Web Development: Best Practices and Future Trends for 2025</h1>

                                <div class="author-info">
                                <div class="author-details">
                                    <img src="../assets/img/person/person-f-8.webp" alt="Author" class="author-img">
                                    <div class="info">
                                    <h4>Michael Chen</h4>
                                    <span class="role">Senior Web Developer</span>
                                    </div>
                                </div>
                                <div class="post-meta">
                                    <span class="date"><i class="bi bi-calendar3"></i> Mar 15, 2025</span>
                                    <span class="divider">•</span>
                                    <span class="comments"><i class="bi bi-chat-text"></i> 18 Comments</span>
                                </div>
                                </div>
                            </div>

                            <div class="content">
                                <p>
                                As we delve into 2025, the web development ecosystem has transformed dramatically, introducing innovative approaches to building faster, more secure, and highly engaging web experiences. This comprehensive guide explores the latest trends and best practices that are defining the future of web development.
                                </p>

                                <h2>The Rise of Web Components</h2>
                                <p>
                                Web Components have become increasingly crucial in modern web development, offering a standardized way to create reusable custom elements. Key advantages include:
                                </p>
                                <ul>
                                <li>Enhanced code reusability across different frameworks</li>
                                <li>Better encapsulation of functionality</li>
                                <li>Improved maintenance and scalability</li>
                                <li>Framework-agnostic component development</li>
                                </ul>
                            </div>
                            </div>

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->
            </div>
        </div>
    </div>

</main>

<?php
include '../footer.php';
include '../scripts.php';
?>