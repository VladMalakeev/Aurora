function checkForm(form) {
    var elems = form.elements;
    var countErrors = 0;

    resetError(elems.name.parentNode);
    if (elems.name.value == '') {
        showError(elems.name.parentNode, 'Заполните это поле');
        countErrors++;
    }

    resetError(elems.last_name.parentNode);
    if (elems.last_name.value == '') {
        showError(elems.last_name.parentNode, 'Заполните это поле');
        countErrors++;
    }

    resetError(elems.email.parentNode);
    if (elems.email.value == '') {
        showError(elems.email.parentNode, 'Заполните это поле');
        countErrors++;
    }else{
        if(!elems.email.value.match(/^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/)){
            showError(elems.email.parentNode, 'Email не корректный');
            countErrors++;
        }
    }

     resetError(elems.phone.parentNode.parentNode);
    if (elems.phone.value == '') {
        showError(elems.phone.parentNode.parentNode, 'Заполните это поле');
        countErrors++;
    }else{
        resetError(elems.phone.parentNode.parentNode);
        if(!$("#phone").intlTelInput("isValidNumber")){
            showError(elems.phone.parentNode.parentNode, 'Номер не корректный');
            countErrors++;
        }
    }

    resetError(elems.password.parentNode);
    if (elems.password.value == '') {
        showError(elems.password.parentNode, 'Заполните это поле');
        countErrors++;
    }

    resetError(elems.confirm_password.parentNode);
    if (elems.confirm_password.value == '') {
        showError(elems.confirm_password.parentNode, 'Заполните это поле');
        countErrors++;
    }else{
        resetError(elems.confirm_password.parentNode);
        if (elems.confirm_password.value != elems.password.value) {
            showError(elems.confirm_password.parentNode, ' Пароли не совпадают');
            countErrors++;
        }
    }

    if(countErrors==0){
        elems.phone.value =  $("#phone").intlTelInput("getNumber");
        form.submit();
    }
}

function showError(container, errorMessage) {
    container.className = 'error';
    var msgElem = document.createElement('span');
    msgElem.className = "error-message";
    msgElem.innerHTML = errorMessage;
    container.parentNode.children[0].appendChild(msgElem);
}

function resetError(container) {
    container.className = '';
    if (container.parentNode.children[0].lastChild.className == "error-message") {
        container.parentNode.children[0].removeChild(container.parentNode.children[0].lastChild);
    }
}

function activeButton(e) {
    button = document.getElementById('regBtn');
    if(e.checked){
        button.disabled = false;
    }else {
        button.disabled = true;
    }
}

