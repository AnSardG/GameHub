
if (formData.user.length < 3 || formData.user.length > 30) {
    console.log("Username must be between 3 and 30 characters");
}

var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
if (!emailRegex.test(formData.email)) {
    console.log("Invalid email format");
}

if (formData.pass.length < 4 || formData.pass.length > 40) {
    console.log("Password must be between 4 and 40 characters");
}

if (formData.pass !== formData.pass_repeat) {
    console.log("Passwords do not match");
}