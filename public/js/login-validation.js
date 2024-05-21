$(document).ready(function() {
    $('.login-form').submit(function(event) {
        event.preventDefault();

        var formData = {
            user: $('#user').val(),                        
            pass: $('#pass').val(),
        };    

        let valid = true;

        $('.form-group').removeClass('has-error');
        $('.error-message').hide();
        
        if (formData.user.length < 3 || formData.user.length > 30) {
            valid = false;
            $('#user').closest('.form-group').addClass('has-error');
            $('#user-error').text("Username must be between 3 and 30 characters").show();
        }
                
        if (formData.pass.length < 4 || formData.pass.length > 40) {
            valid = false;
            $('#pass').closest('.form-group').addClass('has-error');
            $('#pass-error').text("Password must be between 4 and 40 characters").show();
        }                
        
        if(valid) {
            $.ajax({
                url: './app/views/login/validate.php',
                method: 'POST',
                data: { valid: valid, formData: formData },
                success: function(response) {
                    if(response.success == 'true') {
                        window.location.href = '/?logged=true';
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error sending validation result to PHP:', error);
                }
            });
        }        
    });
});

