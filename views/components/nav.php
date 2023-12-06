<nav class="nav bg-purple justify-content-center">
    <a class="nav-link text-white" href="index.php?controller=Login&action=mainActionForm"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a class="nav-link text-white" href="#"> Welcome Back,<?php echo $_SESSION['user'] ?? $usernameCookie?></a>
    <a class="nav-link text-white" href="index.php?controller=Login&action=Logout">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
</nav>