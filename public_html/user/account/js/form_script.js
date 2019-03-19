function loadPhoto(id,path,photo) {
    if(photo!=''){
        document.getElementById('photo_'+id).style.display ='none';
        var photoBlock = document.getElementById('photoBlock_'+id);
        var img = document.createElement('img');
        img.src = path+photo;
        img.width = '200';
        img.height = '250';
        photoBlock.appendChild(img);
    }
    else{
        document.getElementById('delete_'+id).style.display = 'none';
    }
}

function clearPhoto(id) {
    document.getElementById('photo_'+id).style.display ='inline';
    document.getElementById('delete_'+id).style.display = 'none';
    document.getElementsByName('hidden_'+id)[0].value = '';
    document.getElementById('photoBlock_'+id).innerHTML ='';
}

function showFile(e,id) {
    document.getElementsByName('hidden_'+id)[0].value = '';
    var photoBlock = document.getElementById('photoBlock_'+id);
    e.style.display = 'none';
    document.getElementById('delete_'+id).style.display = 'inline';
    photoBlock.innerHTML = '';
    var file = e.files[0];
        if (file.type.match('image.*')) {
            if(file.size >2000000){
                var messageImage = document.createElement('span');
                messageImage.className = 'errorFile';
                messageImage.innerHTML = 'Размер файла не должен превышать 3 мб!';
                photoBlock.appendChild(messageImage);
                e.style.display = 'inline';
                document.getElementById('delete_'+id).style.display = 'none';
            }
            else {
                var fr = new FileReader();
                fr.onload = (function (theFile) {
                    return function (e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.width = 200;
                        img.height = 250;
                        photoBlock.appendChild(img);

                    };
                })(file);

                fr.readAsDataURL(file);
            }
        }else{
            var messageImage = document.createElement('span');
            messageImage.className = 'errorFile';
            messageImage.innerHTML = 'Не корректный формат файла!';
            photoBlock.appendChild(messageImage);
            e.style.display = 'inline';
            document.getElementById('delete_'+id).style.display = 'none';
        }
}

function changeInput(input) {
    input.style.background = '#fff';
    input.placeholder = '';
    resetError(input.parentNode)
}

function resetError(container) {
    if (container.lastChild.className == "errorText" || container.lastChild.className == "errorPressure") {
        container.removeChild(container.lastChild);

    }
}

function validateForm() {
    var form = document.getElementById('form');
    //стереть все ошибки
    var resetErrors = document.getElementsByClassName('errorTextFile');
    for(var i =0;i<resetErrors.length;i++) {
        resetErrors[i].remove();
    };
    var elements = form.elements;
    // var decimals = document.getElementsByClassName('decimals');
    var errors=[];
     for(element in elements){
        if(elements[element].value == '' && elements[element].required == true){
            if(elements[element].type == 'file'){
                var hiddenImage = document.getElementById('hidden_'+elements[element].id);
                if(hiddenImage.value == '') {
                    var errorText = document.createElement('h4');
                    errorText.innerHTML = 'Выберете фото';
                    errorText.className = 'errorTextFile';
                    elements[element].parentNode.appendChild(errorText);
                    errors.push(elements[element]);
                }
            }else{
            elements[element].style.background = 'pink';
            elements[element].placeholder = 'Заполните это поле!';
                errors.push(elements[element]);
            }
        }
         if(elements[element].type == 'file' && elements[element].files.length>0){
             if(!elements[element].files[0].type.match(/image/)) {
                 errors.push(elements[element]);
             }

             if(elements[element].files[0].size > 2000000){
                 errors.push(elements[element].parentNode);
             }
         }
    }
    // decimals.forEach(function (element) {
    //     if(element.value!='' && !element.value.match(/^([0-9]{1,3})+([,.][0-9]{1,2})?$/)){
    //         element.style.background = 'pink';
    //         var messageDecimal = document.createElement('span');
    //         if(element == elements.pressure1 || element == elements.pressure2){
    //             messageDecimal.className = 'errorPressure';
    //         }
    //         else{
    //             messageDecimal.className = 'errorText';
    //         }
    //
    //         messageDecimal.innerHTML = 'Данные не корректны!';
    //         element.parentNode.appendChild(messageDecimal);
    //         errors.push(element);
    //     }
    // });


    if(errors.length<1){
        var input = document.createElement('input');
        input.type ='hidden';
        input.name = 'submitForm';
        form.appendChild(input);
        form.submit();
    }
    else{
        errors[0].focus();
    }
}