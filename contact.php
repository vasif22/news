<?php
require "./frontend/layouts/header.php";

$title = "Əlaqə Səhifəsi";
$image = "test"; 

require "./frontend/layouts/topBar.php";



?>
<!-- Main Content-->
<main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Bizimlə əlaqə saxla</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form  method="post" action="./processContact.php" >
                                <div class="form-floating">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Name</label>
                                    
                                </div>
                                <div class="form-floating">
                                    <input name="email" class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                           
                                </div>
                                <div class="form-floating">
                                    <input name="phone" class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                                    <label for="phone">Phone Number</label>
  
                                </div>
                                <div class="form-floating">
                                    <textarea name="description" class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                                    <label for="message">Message</label>
    
                                </div>
                                <br />
                                <!-- Submit success message-->
                                <!---->
                                <!-- This is what your users will see when the form-->
                                <!-- has successfully submitted-->
                                <?php if (isset($_SESSION['message_success'])) {
                                    
                                 ?>
                                <div id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder"><?= $_SESSION['message_success'] ?></div>
         
                                    </div>
                                </div>
                                <?php unset($_SESSION['message_success']);   } ?>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error submitting the form-->
                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php
require "./frontend/layouts/footer.php";
?>