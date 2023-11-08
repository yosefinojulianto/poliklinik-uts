<?php
    include_once('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik</title>
    <!-- bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <!-- navbar -->
    <?php
        $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
        if(isset($_GET['page'])) {
            session_start();
        }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Sistem Informasi Poliklinik
            </a>
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Master
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="index.php?page=dokter">
                                    Dokter
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?page=pasien">
                                    Pasien
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=periksa">
                            Periksa
                        </a>
                    </li>
                </ul>
                <?php
                if (empty($_GET)) {
                    session_start();
                }
                if(isset($_SESSION["login"])) { ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Log Out</a>
                    </li>
                </ul>
                <?php 
                } else {
                ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=registrasiUser">
                            Register
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=loginUser">
                            Login
                        </a>
                    </li>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>

    <main role="main" class="container mt-3">
        <?php
            if (isset($_GET['page'])) {
        ?>
            <h2><?php echo ucwords($_GET['page']) ?></h2>
        <?php
                include($_GET['page'] . ".php");
            } else {
                echo "Selamat Datang di Sistem Informasi Poliklinik";
            }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>