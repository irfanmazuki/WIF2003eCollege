<?php include 'header.php'; ?>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <p></p>
    <div class="container text-center" style="width:50%">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="slide_1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block bg-info mb-4">
                        <h5 class="font-weight-bold">View the list of activities<br/>around your college</h5>
                        <p>There are numerous activites around your<br/>residential college!Register to join us now!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="slide_2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block bg-info mb-4">
                        <h5 class="font-weight-bold">File reports!</h5>
                        <p>Found any issues around your residential college?Report to us.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="slide_3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block bg-info mb-4">
                        <h5 class="font-weight-bold">Variety of food, just for you!</h5>
                        <p>Wanna take a look at the menus' of cafe in your residential college?</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="slide_4.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block bg-info mb-4">
                        <h5 class="font-weight-bold">>Accomodation application</h5>
                        <p>Tired finding accomodation around UM. Why not try applying for UM's residential colleges?</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</body>
<footer class="my-5 pt-1 text-muted text-center text-small">
    <p class="mb-1">© 2020 e-College - University of Malaya</p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="https://myum.um.edu.my/">MyUM</a></li>
        <li class="list-inline-item"><a href="https://maya.um.edu.my/sitsvision/wrd/siw_lgn">Maya</a></li>
        <li class="list-inline-item"><a href="https://spectrum.um.edu.my/">SpeCTRUM</a></li>
    </ul>
</footer>

</html>
