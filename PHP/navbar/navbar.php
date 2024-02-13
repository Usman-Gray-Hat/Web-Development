<style>
        *{
            font-family: sans-serif;
            font-size: 17px;
        }
        .theme-color{
            background: linear-gradient(9deg, #2170f4 0%, #b9165a 50% , #ac40c7 90%);
        }
</style>

<nav class="navbar navbar-expand-sm bg-info navbar-dark theme-color">
    <a href="index.php" class="navbar-brand">Emerald Tech Solutions</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="index.php" 
            class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { echo 'active'; } ?>">Home</a>
        </li>

        <li class="nav-item">
            <a href="aboutus.php" 
            class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'aboutus.php') { echo 'active'; } ?>">About us</a>
        </li>

        <li class="nav-item">
            <a href="portfolio.php" 
            class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'portfolio.php') { echo 'active'; } ?>">Portfolio</a>
        </li>

        <li class="nav-item">
            <a href="contactus.php" 
            class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'contactus.php') { echo 'active'; } ?>">Contact us</a>
        </li>
    </ul>
</nav>