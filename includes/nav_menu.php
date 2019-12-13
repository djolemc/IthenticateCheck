

<nav class="navbar navbar-expand-lg navbar-light main_menu" id="navbar">
    <a class="navbar-brand" href="index.php"><img src="../assets/images/ceon-logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Početna <span class="sr-only">(current)</span></a>
            </li>
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="ithenticate.php">Ithenticate <span class="sr-only">(current)</span></a>-->
<!--            </li>-->

            <li class="nav-item">
                <a class="nav-link active" href="mail.php">E-mail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="report.php">Izveštaj</a>
            </li>

        </ul>
        <?php if ($_SESSION['is_logged_in']==true) : ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#myModal" data-toggle = "modal" data-target= "#myModal" class="nav-link active">Pomoć</a>
            </li>
            <li class="nav-item active">
<!--                <a class="nav-link">Korisnik: --><?php //echo $_SESSION['username'];?><!--</a>-->
                <a class="nav-link"  href="ithenticate_list.php">Spisak časopisa</a>
            </li>
            <li class="nav-item active">
                <a id="logout" class="nav-link" href="#">Odjavi se<span class="sr-only">(current)</span></a>
            </li>

        </ul>
        <?php endif; ?>
    </div>
</nav>

    </div>
  </div>
</nav>

<?php include "../templates/help.php"; ?>



<div class="container-fluid">