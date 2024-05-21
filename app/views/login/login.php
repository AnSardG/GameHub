<div class="main mrgn">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="login-form">
                    <h2 class="text-center">Login your account</h2>
                    <form action="/" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user" id="user" placeholder="Username" required>
                            <div class="error-message" id="user-error"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                            <div class="error-message" id="pass-error"></div>
                        </div>
                        <?php if (isset($_SESSION['login_failed']) && $_SESSION['login_failed']) : ?>
                            <?php echo '<p class="error-message">User doesn\'t exist. Please introduce a correct user.</p>'; ?>
                        <?php endif ?>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary sign-up-btn" value="Login">
                        </div>
                        <input type="hidden" name="login-sent">
                    </form>
                </div>
                <div class="register">
                    <p>You don't have an account?
                        <b><a href="/?register=true">Click here</a></b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/login-validation.js"></script>