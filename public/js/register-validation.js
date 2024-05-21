$(document).ready(function() {
    $('.register-form').submit(function(event) {
        event.preventDefault();
        var formData = {
            user: $('#user').val(),
            email: $('#email').val(),
            pass: $('#pass').val(),
            pass_repeat: $('#pass-repeat').val()
        };
        
        let valid = true;

        $('.form-group').removeClass('has-error');
        $('.error-message').hide();
        
        if (formData.user.length < 3 || formData.user.length > 30) {
            valid = false;
            $('#user').closest('.form-group').addClass('has-error');
            $('#user-error').text("Username must be between 3 and 30 characters").show();
        }
        
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(formData.email)) {
            valid = false;
            $('#email').closest('.form-group').addClass('has-error');
            $('#email-error').text("Invalid email format").show();
        }
        
        if (formData.pass.length < 4 || formData.pass.length > 40) {
            valid = false;
            $('#pass').closest('.form-group').addClass('has-error');
            $('#pass-error').text("Password must be between 4 and 40 characters").show();
        }
        
        if (formData.pass !== formData.pass_repeat) {
            valid = false;
            $('#pass-repeat').closest('.form-group').addClass('has-error');
            $('#pass-repeat-error').text("Passwords do not match").show();
        }
        
        if(valid) {
            $.ajax({
                url: '../app/views/register/validate.php',
                method: 'POST',
                data: { valid: valid, formData: formData },
                success: function(response) {
                    if(response.success == 'true') {
                        window.location.href = '/?registered=true';
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error sending validation result to PHP:', error);
                }
            });
        }        
    });
});

