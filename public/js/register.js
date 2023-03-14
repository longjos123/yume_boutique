$(document).ready(function () {
    $('#btn_submit').on('click', function () {
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var passwordConfirm = $('#passwordConfirm').val();

        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var passwordFormat = /^[a-zA-Z0-9]{8,20}$/;
        var error = 0;

        $('#first_name, #last_name, #email, #password, #passwordConfirm').removeClass('error');
        $('.error_fname, .error_lname, .error_email, .error_pwCf').hide();
        $('.error_pw_1, .error_pw_2').css('color', '');


        if (first_name == '') {
            $('#first_name').addClass('error');
            $('.error_fname').show();
            error = 1;
        }
        if (last_name == '') {
            $('#last_name').addClass('error');
            $('.error_lname').show();
            error = 1;
        }
        if (email == '') {
            $('#email').addClass('error');
            $('.error_email').text('The email field is required.');
            $('.error_email').show();
            error = 1;
        }
        if (email !== '' && !email.match(mailformat)) {
            $('#email').addClass('error');
            $('.error_email').text('Invalid email.');
            $('.error_email').show();
            error = 1;
        }
        emailList.forEach(function (value, key) {
            if (email == value.email) {
                $('#email').addClass('error');
                $('.error_email').text('Email already exists.');
                $('.error_email').show();
                error = 1;
            }
        })
        if (password.length < 8 || password.length > 20) {
            $('#password').addClass('error');
            $('.error_pw_1').css('color', '#D8000C');
            error = 1;
        }
        if (password !== '' && !password.match(passwordFormat)) {
            $('#password').addClass('error');
            $('.error_pw_2').css('color', '#D8000C');
            error = 1;
        }
        if (passwordConfirm !== password) {
            $('#passwordConfirm').addClass('error');
            $('.error_pwCf').text('Password confirm was wrong.');
            $('.error_pwCf').show();
            error = 1;
        }
        if (error == 1) {
            return false;
        } else {
            $('#btn_submit').submit();
        }
    })
})
