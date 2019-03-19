function showPhoto(e,id,hidden) {

    document.getElementById(hidden).value = '';
    var block = document.getElementById(id);
    var file = e.files[0];
    if (file.type.match('image.*')) {
            var fr = new FileReader();
            fr.onload = (function (theFile) {
                return function (e) {
                    block.style.backgroundImage = "url("+e.target.result+")";
                };
            })(file);
            fr.readAsDataURL(file);
    }
    else{
            var messageImage = document.createElement('span');
            messageImage.className = 'errorFile';
            messageImage.innerHTML = 'Не корректный формат файла!';
            block.appendChild(messageImage);
    }
}

function showPhotoTextReview(elem,id) {
  document.getElementById('hidden_'+id).value = '';
    var file = elem.files[0];
    if (file.type.match('image.*')) {
        var fr = new FileReader();
        fr.onload = (function (theFile) {
            return function (e) {
                document.getElementById('img_'+id).src = e.target.result;
            };
        })(file);
        fr.readAsDataURL(file);
    }
    else{
        var messageImage = document.createElement('span');
        messageImage.className = 'errorFile';
        messageImage.innerHTML = 'Не корректный формат файла!';
        elem.parentNode.appendChild(messageImage);
    }
}

function loadPhoto(id,photo) {
    if(photo!=''){
        var block = document.getElementById(id);
        block.style.backgroundImage = "url("+photo+")";
    }
}

function deleteCard(id) {
    $.ajax({
        type: "POST",
        url: "/account/pages/settings/settings_handler.php",
        data:{
            delete_card:true,
            id_card:id
        },
        success: function (result) {
            location.reload()
        }
    });
}

function deleteTextReview(id) {
    $.ajax({
        type: "POST",
        url: "/account/pages/settings/settings_handler.php",
        data:{
            delete_text_review:true,
            id_review:id
        },
        success: function (result) {
            location.reload();
        }
    });
}