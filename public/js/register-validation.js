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
        
        if (formData.user.length < 3 || formData.user.length > 30) {
            console.log("Username must be between 3 and 30 characters");
            valid = false;
        }
        
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(formData.email)) {
            console.log("Invalid email format");
            valid = false;
        }
        
        if (formData.pass.length < 4 || formData.pass.length > 40) {
            console.log("Password must be between 4 and 40 characters");
            valid = false;
        }
        
        if (formData.pass !== formData.pass_repeat) {
            console.log("Passwords do not match");
            valid = false;
        }
        
        $.ajax({
            url: '../app/views/register/validate.php',
            method: 'POST',
            data: { valid: valid, formData: formData },
            success: function(response) {
                console.log(response.success);
                if(response.success == 'true') {
                    window.location.href = '../public/index.php?success=true';   
                } else {
                    console.log('Validation failed');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error sending validation result to PHP:', error);
            }
        });
    });
});

