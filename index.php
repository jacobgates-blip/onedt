<?php
// Declare variable
$page_title = "Welcome to Bison Bar & Restaurant | Home";
// Call files
include('includes/header.php');
include('includes/nav.php');
include('includes/carousel.php');
?>
<!-- Start of content 1 -->
<div class="container text-center pt-5">
    <div class="row align-items-start">
        <div class="col">
            <h1>Bison Steakhouse</h1>

            <img src="image/logo.jpg" alt="Logo">
        </div>
    </div>
</div>
<!--  Start of cards -->
<div class="container pt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <img src="image/card-1.jpg" class="card-img-top" alt="Card 1">
                <div class="card-body">
                    <h5 class="card-title">Glove Fox</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>
                    <p>
                        <button type="button" class="btn btn-danger btn-lg">Reservation</button>
                    </p>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="image/card-2.jpg" class="card-img-top" alt="Card 2">
                <div class="card-body">
                    <h5 class="card-title">Gift Cards</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>
                    <p>
                        <button type="button" class="btn btn-danger btn-lg">Reservation</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="image/card-3.jpg" class="card-img-top" alt="card 3">
                <div class="card-body">
                    <h5 class="card-title">Working with us</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional
                        content.</p>
                    <p>
                        <button type="button" class="btn btn-danger btn-lg">Reservation</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
// Call footer 
include('includes/footer.php');
    ?>
