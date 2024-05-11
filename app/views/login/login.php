<div class="main mrgn">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="login-form">
                    <h2 class="text-center">Login your account</h2>                    
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user" id="user" placeholder="Username" required>
                        </div>                        
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                        </div>                    
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary sign-up-btn" value="Login">
                        </div>
                        <input type="hidden" name="login-sent">
                    </form>        
                </div>
                <div class="register">
                    <p>You don't have an account? 
                        <b><a href="
                        <?php $_SESSION['registered'] = false; 
                            $_SESSION['login'] = false; 
                            echo $_SERVER['PHP_SELF'];
                        ?>
                        ">Click here</a></b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/login-validation.js"></script>