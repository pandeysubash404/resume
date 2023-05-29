<?php 
require ("header.php"); 
require  ("database.php");
$login_error =$register_error="";
 ?>
<?php include ("login.php"); ?>

        <div class="header-banner">
            <div class="container h-100 d-flex align-items-center justify-content-center">
                <div class = "row text-center justify-content-center">
                    <h1 class = "text-uppercase text-blue fw-6 lh-17 display-5">create your professional cv in just 5 <span class = "text-lowercase text-primary">minutes!</span></h1>
                    <p class = "text-grey fs-4 mt-3 mb-5">Easy to use. Time-saver. Professional.</p>
                    <!-- <button type="button" class="btn btn-primary my-2 btn-lg" data-bs-toggle="modal" data-bs-target="#loginModal">Get started</button> -->
                    <button class = "btn btn-lg text-capitalize btn-primary btn-banner fs-4" data-bs-toggle="modal" data-bs-target="#loginModal">let's get started</button>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class = "steps py-8">
            <div class="container">
                <div class = "row section-title text-center">
                    <div class = "col-12">
                        <h2 class = "display-6 text-blue fw-bold">Create your perfect Resume with easy steps</h2>
                        <p class = "text-grey fs-4 my-4 mx-auto">Effortlessly make a job-worthy resume and cover letter that gets you hired faster.</p>
                    </div>
                </div>

                <div class = "row steps-list">
                    <div class = "steps-item col-lg-6 col-xl-4 text-center text-md-start my-4 d-md-flex align-items-md-center">
                        <div class = "steps-item-icon text-white bg-light-blue d-flex align-items-center justify-content-center mx-auto ms-md-0 me-md-5 me-lg-4">
                            <i class = "fa-solid fa-layer-group fa-2x"></i>
                        </div>
                        <div class="steps-item-text mt-4">
                            <h3 class = "fs-3 fw-4 text-blue">Choose your CV template</h3>
                            <p class = "text-grey fs-18">Pick a template and color of your choice from a variety of professional templates.</p>
                        </div>
                    </div>

                    <div class = "steps-item col-lg-6 col-xl-4 text-center text-md-start my-4 d-md-flex align-items-md-center">
                        <div class = "steps-item-icon text-white bg-light-blue d-flex align-items-center justify-content-center mx-auto ms-md-0 me-md-5 me-lg-4">
                            <i class = "fa-solid fa-file-lines fa-2x"></i>
                        </div>
                        <div class="steps-item-text mt-4">
                            <h3 class = "fs-3 fw-4 text-blue">Place Your Information</h3>
                            <p class = "text-grey fs-18">Keep track of your CV with the help of live preview.</p>
                        </div>
                    </div>

                    <div class = "steps-item col-lg-6 col-xl-4 text-center text-md-start my-4 d-md-flex align-items-md-center">
                        <div class = "steps-item-icon text-white bg-light-blue d-flex align-items-center justify-content-center mx-auto ms-md-0 me-md-5 me-lg-4">
                            <i class = "fa-solid fa-download fa-2x"></i>
                        </div>
                        <div class="steps-item-text mt-4">
                            <h3 class = "fs-3 fw-4 text-blue">Instantly download your CV</h3>
                            <p class = "text-grey fs-18">Easily download your CV as a PDF and share it via a link.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class = "templates py-8 bg-secondary">
            <div class = "container">
                <div class = "row section-title text-center mb-5">
                    <div class = "col-12">
                        <h2 class = "display-6 text-blue fw-bold">Here are the Best Templates for you</h2>
                        <p class = "text-grey fs-4 my-4 mx-auto">A great job application leads to a good interview. An amazing resume is what makes it all possible.</p>
                    </div>
                </div>

                <div class = "row templates-list gy-5 gx-lg-5">
                    <div class = "templates-item position-relative col-lg-6">
                        <div class = "template-item-img mx-auto me-lg-0 position-relative">
                            <img src = "img/Basic.jpg" alt = "" class = "img-fluid">
                            <a href = "#" class = "btn btn-lg btn-primary position-absolute choose-template-btn">Select Template</a>
                        </div>
                    </div>

                    <div class = "templates-item position-relative col-lg-6">
                        <div class = "template-item-img mx-auto ms-lg-0 position-relative">
                            <img src = "img/College.jpg" alt = "" class = "img-fluid">
                            <a href = "#" class = "btn btn-lg btn-primary position-absolute choose-template-btn">Select Template</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <footer class="shadow text-center text-black  border-top  border-5 border-color:#adb5bd">
        <div class = "container-fluid copyright-text pt-2 pb-2"> 
            <p class = "text-center fw-3">&copy; <?php echo date("Y"); ?> CV Creator. All rights reserved</p>
        </div>
    </footer>
 </div> 



    <!-- bootstrap js -->
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>