function startPage() {
    var name = document.getElementById('input_name');
    var lastName = document.getElementById('input_last_name');
    var email = document.getElementById('input_email');
    var phone = document.getElementById('input_phone');

    var btnEditName = document.getElementById('btn_edit_name');
    var btnSaveName = document.getElementById('btn_save_name');

    var btnEditEmail = document.getElementById('btn_edit_email');
    var btnSaveEmail = document.getElementById('btn_save_email');

    var btnEditPhone = document.getElementById('btn_edit_phone');
    var btnSavePhone = document.getElementById('btn_save_phone');

    name.disabled = true;
    lastName.disabled = true;
    email.disabled = true;
    phone.disabled = true;

    btnEditName.style.display = 'block';
    btnSaveName.style.display = 'none';
    btnEditEmail.style.display = 'block';
    btnSaveEmail.style.display = 'none';
    btnEditPhone.style.display = 'block';
    btnSavePhone.style.display = 'none';
}

function editName() {
    var name = document.getElementById('input_name');
    var lastName = document.getElementById('input_last_name');
    var btnEditName = document.getElementById('btn_edit_name');
    var btnSaveName = document.getElementById('btn_save_name');
    name.disabled = false;
    lastName.disabled = false;
    btnEditName.style.display = 'none';
    btnSaveName.style.display = 'block';
}

function editEmail() {
    var email = document.getElementById('input_email');
    var btnEditEmail = document.getElementById('btn_edit_email');
    var btnSaveEmail = document.getElementById('btn_save_email');

    email.disabled = false;
    btnEditEmail.style.display = 'none';
    btnSaveEmail.style.display = 'block';
}

function editPhone() {
    var phone = document.getElementById('input_phone');
    var btnEditPhone = document.getElementById('btn_edit_phone');
    var btnSavePhone = document.getElementById('btn_save_phone');

    btnEditPhone.style.display = 'none';
    btnSavePhone.style.display = 'block';
    phone.disabled = false;
}

function saveName(id) {
    var name = document.getElementById('input_name');
    var lastName = document.getElementById('input_last_name');
    var btnEditName = document.getElementById('btn_edit_name');
    var btnSaveName = document.getElementById('btn_save_name');

    $.ajax({
        type: "POST",
        url: "/account/user/user_handler.php",
        data: {
            editName: true,
            name: name.value,
            last_name:lastName.value,
            id:id
        },
        success: function (result) {
            if(result){
                viewMassage("Данные отредактированы",true);
            }else {
                viewMassage("Данные небыли отредактированы",false);
            }
            btnEditName.style.display = 'block';
            btnSaveName.style.display = 'none';
            name.disabled = true;
            lastName.disabled = true;
        }
    });
}

function saveEmail(id) {
    var email = document.getElementById('input_email');
    var btnEditEmail = document.getElementById('btn_edit_email');
    var btnSaveEmail = document.getElementById('btn_save_email');

    $.ajax({
        type: "POST",
        url: "/account/user/user_handler.php",
        data: {
            editEmail: true,
            email: email.value,
            id:id
        },
        success: function (result) {
            if(result){
                viewMassage("Email отредактирован",true);
            }else{
                viewMassage("Данные небыли отредактированы",false);
            }
            email.disabled = true;
            btnEditEmail.style.display = 'block';
            btnSaveEmail.style.display = 'none';
        }
    });

}

function savePhone(id) {
    var phone = document.getElementById('input_phone');
    var btnEditPhone = document.getElementById('btn_edit_phone');
    var btnSavePhone = document.getElementById('btn_save_phone');

    $.ajax({
        type: "POST",
        url: "/account/user/user_handler.php",
        data: {
            editPhone: true,
            phone: phone.value,
            id:id
        },
        success: function (result) {
            if(result){
                viewMassage("Телефон отредактирован",true);
            }else {
                viewMassage("Данные небыли отредактированы",false);
            }
            btnEditPhone.style.display = 'block';
            btnSavePhone.style.display = 'none';
            phone.disabled = true;
        }
    });

}

function savePassword(id) {
 var oldPass = document.getElementById('input_old_password');
 var newPass = document.getElementById('input_new_password');
 var confirmPass = document.getElementById('input_confirm_password');

 hideError(oldPass);
 hideError(newPass);
 hideError(confirmPass);
 var empty = 0;
if(newPass.value==''){
    showError(newPass,'заполните это поле');
    empty++;
}
if(oldPass.value==''){
    showError(oldPass,'заполните это поле');
    empty++;
}
if(confirmPass.value==''){
    showError(confirmPass,'заполните это поле');
    empty++;
}

if(empty==0) {
    if (newPass.value != confirmPass.value) {
        showError(confirmPass, 'пароли не совпадают');
    } else {
        $.ajax({
            type: "POST",
            url: "/account/user/user_handler.php",
            data: {
                editPassword: true,
                old_pass: oldPass.value,
                new_pass: newPass.value,
                id: id
            },
            success: function (result) {
                if (result == '2') {
                    showError(oldPass, 'старый пароль не верный');
                }
                else if(result ='1'){
                    viewMassage('Пароль изменен',true);
                    oldPass.value='';
                    newPass.value='';
                    confirmPass.value='';
                }
                else{
                    viewMassage('Ошибка',false);
                }
            }
        });
    }
}
}

function viewMassage(text,state) {
 var massage = document.getElementById('globalMassage');
 if(state){
     massage.style.background = 'rgba(144, 200, 67, 0.62)';
 }else {
     massage.style.background = 'rgba(200, 67, 67, 0.62)';
 }
 massage.innerHTML = text;
 massage.style.display = 'block';
 setTimeout(()=>{
     massage.style.display = 'none'
 },2500);
}

function hideError(elem) {
    if (elem.parentNode.lastChild.className == "input_error"){
        elem.parentNode.removeChild(elem.parentNode.lastChild);
    }
}
function showError(elem,text) {
    var span = document.createElement('span');
    span.innerHTML = text;
    span.className = 'input_error';
    elem.parentNode.appendChild(span);
}