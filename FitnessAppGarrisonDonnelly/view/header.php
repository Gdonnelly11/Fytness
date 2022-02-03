<!DOCTYPE html>
<html lang="en">

<head>
  <title>Fytness - <?php echo $title; ?> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet">  
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>-->
</head>

<body>

<header>
    <!-- Nav bar -->
    <nav class="py-md-0 navbar navbar-expand-md fixed-top navbar-dark bg-dark text-white">
        
        <div class="container-fluid">
            <h1 class="me-3">Fytness</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="../account/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../account/?action=view_account">Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="../exercise/">Exercise List</a></li>
                </ul> 
                <!-- If logged in, Header will have greeting with username and logout button. Otherwise, login button appears. -->
                <?php if(isset($_SESSION['user'])): ?>
                    <p class="mb-0 px-4">Hello, <?php echo $_SESSION['user']['user_fname']. ' '. $_SESSION['user']['user_lname'] . '!'; ?></p>
                    <a class="nav-link btn btn-outline-primary text-white float-md-end" href="../account/?action=logout">Logout</a>
                <?php else: ?>
                    <a class="nav-link btn btn-outline-primary text-white float-md-end" href="../account/?action=view_login">Login</a>
                <?php endif; ?>
            </div>
        </div>   
    </nav>

</header>

<main>
    <!-- Main container for view pages -->
    <div class="container mt-5">