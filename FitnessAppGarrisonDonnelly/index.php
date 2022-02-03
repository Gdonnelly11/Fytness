<!DOCTYPE html>
<html lang="en">
<head>
    <!---------------------------------------------------------------------------------------------------------------
     - Final Project
     - Author: Garrison Donnelly
     - Date: 12/7/2021
     - 
     - Filename: index.php
     - 
     - Root index file. Landing page that should only show when first accessing the website or after logging out.
     -------------------------------------------------------------------------------------------------------------->
  <title>Fytness</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">  
  <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div id="masthead" class="container-fluid h-100 w-100" >    
    <header id="landingHeader" class="mb-auto">
        <div>
            <h3 id="landingHeading" class="float-md-start mb-0">Fytness</h3>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <h1 class="text-center">
                    Welcome to the wonderful world of <span class="">Fytness</span>!
                </h1>
            </div>
            <div id="landing" class="col-md-8 text-center text-md-start">
                <p>Fytness is a holistic, data centric health app designed to help you answer the age old question whether you should be eating that whole pizza.</p>
                <p>Or maybe just sticking to one slice.</p>
            </div>
            <div class="col-12 col-md-4 text-md-start mb-5" >
                <div class="d-flex flex-column flex-md-row">
                    <a href="account/index.php?action=view_login" type="button" class="btn btn-lg btn-primary mt-3 mx-auto me-md-5 w-50">Log In</a>
                    <a href="account/index.php?action=view_register" type="button" class="btn btn-lg btn-outline-primary mt-3 mx-auto w-50">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>

