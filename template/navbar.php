<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">My Shop</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php if (isLoggedIn()):?>
                <a href="index.php/logout">Logout</a>
                <?php endif;?>
                <?php if (!isLoggedIn()):?>
                <a href="index.php/login">Login</a>
                <?php endif;?>
            </li>
            <li class="nav-item">
                <a href="index.php/register" class="pl-2 ml-2 border-left border-primary">Register</a>
            </li>
        </ul>
    </div>
</nav>