<header>
    <div class="logo">
        <img src="images/logo-correction-removebg-preview.png" alt="logo"/>
    </div>
    <div class="search-container">
        <form action="machine.php" method="get">
        <input type="text" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <input type="checkbox" id="nav_check" hidden/>
    <nav>
        <div class="logo">
            <img src="images/logo-correction-removebg-preview.png" alt="Logo"/>
        </div>

        <ul>
            <li><a href="index.php">Home</a></li> 
            <li><a href="machine.php">Machines</a></li> 
            <li><a href="About.php" >Over ons</a></li> 
            <li><a href="Contact.php">Contact</a></li> 
            <?php
            if (isset($_SESSION["email"]) && $_SESSION["isAdmin"] == 1) {
                echo '<li class="dropdown">';
                echo '<a href="#" class="account-icon">';
                echo '<i class="fa fa-user"></i>';
                echo '<span class="dropdown-arrow"></span>';
                echo '</a>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a href="addmachine.php">Admin Panel</a></li>';
                echo '<li><a href="include/logout.inc.php">Logout</a></li>';
                echo '</ul>';
                echo '</li>';
            } elseif (isset($_SESSION["email"])) {
                echo '<li class="dropdown">';
                echo '<a href="#" class="account-icon">';
                echo '<i class="fa fa-user"></i>';
                echo '<span class="dropdown-arrow"></span>';
                echo '</a>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a href="profile.php">Profile</a></li>';
                echo '<li><a href="include/logout.inc.php">Logout</a></li>';
                echo '</ul>';
                echo '</li>';
            } else {
                echo "<li><a href='login.php'>Login</a></li>";
            }
            ?>
        </ul>
    </nav>
    <label for="nav_check" class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </label>
</header>
