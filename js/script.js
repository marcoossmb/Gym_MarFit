
$(document).ready(function () {
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
});


$('.login-reg-panel input[type="radio"]').on('change', function () {
    if ($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut();
        $('.login-info-box').fadeIn();

        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');

    } else if ($('#log-reg-show').is(':checked')) {
        $('.register-info-box').fadeIn();
        $('.login-info-box').fadeOut();

        $('.white-panel').removeClass('right-log');

        $('.login-show').addClass('show-log-panel');
        $('.register-show').removeClass('show-log-panel');
    }
});

$('.popovers').popover();
window.setTimeout(function () {
    $(".alert").fadeTo(2000, 500).slideUp(1000, function () {
        $(this).remove();
    });
}, 1000);

function togglePasswordVisibility(field) {
    var passwordInput = document.getElementById(field === 'register' ? "register-password" : "login-password");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var passwordToggleBtnRegister = document.getElementById("password-toggle-btn-register");
    if (passwordToggleBtnRegister) {
        passwordToggleBtnRegister.addEventListener("click", function () {
            togglePasswordVisibility('register');
        });
    }

    var passwordToggleBtnLogin = document.getElementById("password-toggle-btn-login");
    if (passwordToggleBtnLogin) {
        passwordToggleBtnLogin.addEventListener("click", function () {
            togglePasswordVisibility('login');
        });
    }
});

const validatePasswords = () => {
    const password1 = document.getElementById('login-password').value;
    const password2 = document.getElementById('register-password').value;
    const errorMessage = document.getElementById('error-message');

    if (password1 !== password2) {
        errorMessage.innerHTML = "Las contraseñas no coinciden";
        return false;
    }
    errorMessage.innerHTML = "";
    return true;
};