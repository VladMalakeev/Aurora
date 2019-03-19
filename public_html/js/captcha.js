grecaptcha.ready(function() {
    grecaptcha.execute('6Lfgw5QUAAAAAHmj-_7YuLUPbtUd7syqWKYqYol5', {action: 'homepage'}).then(function(token) {
        console.log(token);
        document.getElementById('form_token').value = token;
    });
});