<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
<nav>
    <ul>
        <li><a href="index_07.php" <?php if ($currentPage == 'index_02.php') { echo 'id="here"'; }?>>Home</a></li>
        <li><a href="blog_03.php" <?php if ($currentPage == 'blog.php') { echo 'id="here"'; }?>>Blog</a></li>
        <li><a href="gallery_03.php" <?php if ($currentPage == 'gallery.php') { echo 'id="here"'; }?>>Gallery</a></li>
        <li><a href="contact_03.php" <?php if ($currentPage == 'contact.php') { echo 'id="here"'; }?>>Contact</a></li>
    </ul>
</nav>
