<div class="main mrgn">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="register-form">
                    <h2 class="text-center">Create an account</h2>
                    <h3 class="text-center">Sign up and begin your gaming journey!</h3>
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user" id="user" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email@domain.com" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass-repeat" id="pass-repeat" placeholder="Repeat password" required>            
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Sign up">
                        </div>
                        <input type="hidden" name="sent">
                    </form>        
                </div>
                <div class="terms">
                    <p>By clicking continue, you agree to our <a href="">Terms of Service</a> and <a href="">Privacy Policy</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/register-validation.js"></script>