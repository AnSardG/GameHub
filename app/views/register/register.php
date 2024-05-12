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
                            <div class="error-message" id="user-error"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email@domain.com" required>
                            <div class="error-message" id="email-error"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                            <div class="error-message" id="pass-error"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass-repeat" id="pass-repeat" placeholder="Repeat password" required>            
                            <div class="error-message" id="pass-repeat-error"></div>
                        </div>
                        <?php if (isset($_SESSION['register_failed']) && $_SESSION['register_failed']) : ?>
                            <?php echo '<p class="error-message">Username already exists. Please introduce another username.</p>'; ?>
                        <?php endif ?>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary sign-up-btn" value="Sign up">                            
                        </div>
                        <input type="hidden" name="register-sent">
                    </form>        
                </div>
                <div class="terms">
                    <p>Do you have an account already? <b><a href="
                    <?php
                    echo $_SERVER['PHP_SELF'] . '?login=true'                
                    ?>">Jump in here!</a></b></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/register-validation.js"></script>