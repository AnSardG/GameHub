$(document).ready(function() {
    $('.login-form').submit(function(event) {
        event.preventDefault();
        var formData = {
            user: $('#user').val(),            
            pass: $('#pass').val(),
        };
        
        let valid = true;
        
        if (formData.user.length < 3 || formData.user.length > 30) {
            console.log("Username must be between 3 and 30 characters");
            valid = false;
        }
                
        if (formData.pass.length < 4 || formData.pass.length > 40) {
            console.log("Password must be between 4 and 40 characters");
            valid = false;
        }                
        
        $.ajax({
            url: '../app/views/login/validate.php',
            method: 'POST',
            data: { valid: valid, formData: formData },
            success: function(response) {
                console.log(response.success);
                if(response.success == 'true') {
                    window.location.href = '../public/index.php';   
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

