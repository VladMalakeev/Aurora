function viewQuestions(formName) {
    $.ajax({
        type: "POST",
        url: "/account/pages/form/form_handler.php",
        data:{
            view_questions:true,
            form_name: formName
        },
        success: function (result) {
            var json = JSON.parse(result);
            var form = document.getElementById('form');
            json.forEach(function (element) {
                var inputText = document.createElement('textarea');
                inputText.innerHTML = element['question'];
                inputText.placeholder = 'Ваш вопрос';
                inputText.name = 'update';
                inputText.id = element['id_form'];
                inputText.maxlength = '150';
                inputText.onchange = function () {this.style.border = '1px solid black'};

                var radioText = document.createElement('input');
                radioText.type = 'radio';
                radioText.name = 'type_update_'+element['id_form'];
                radioText.value = 'text';
                radioText.className = 'type_update_text';

                var radioSrc = document.createElement('input');
                radioSrc.type = 'radio';
                radioSrc.name = 'type_update_'+element['id_form'];
                radioSrc.value = 'file';
                radioSrc.className = 'type_update_src';

                switch (element['question_type']) {
                    case 'text': radioText.checked = 'true'; break;
                    case 'file': radioSrc.checked = 'true'; break;
                }

                var box = document.createElement('input');
                box.type = 'checkbox';
                box.name = 'filled_update';

                if(element['filled']==1){
                    box.checked = true;
                }

                var inputDelete = document.createElement('input');
                inputDelete.type = 'button';
                inputDelete.onclick = function(){deleteQuestion(formName,element['id_form'])};
                inputDelete.name = 'deleteExist';
                inputDelete.value = 'Удалить';
                inputDelete.className = 'button_delete';

                var tdText = document.createElement('td');
                tdText.appendChild(inputText);

                var tdTextType = document.createElement('td');
                tdTextType.appendChild(radioText);
                var tdFileType = document.createElement('td');
                tdFileType.appendChild(radioSrc);

                var tdField = document.createElement('td');
                tdField.appendChild(box);

                var tdDelete = document.createElement('td');
                tdDelete.appendChild(inputDelete);

                var tr = document.createElement('tr');
                tr.appendChild(tdText);
                tr.appendChild(tdTextType);
                tr.appendChild(tdFileType);
                tr.appendChild(tdField);
                tr.appendChild(tdDelete);
                form.appendChild(tr);
            });

            if(json.length>0){
                showButtons('block');
            }else showButtons('none');
        }
    });
}

function showButtons(state) {
    var btnSave = document.getElementById('btnSave').style.display = state;
    var btnClear = document.getElementById('btnClear').style.display = state;
}

function checkButtons(block) {
    console.log(block.childElementCount);
    if(block.childElementCount>1){
        showButtons('block');
    }else showButtons('none');
}
function updateForm(formName) {
    var form = document.getElementById('form');
    form.innerHTML = '<tr>' +
        '<th id="long">Вопрос</th>' +
        '<th>Текст</th>' +
        '<th>Файл</th>' +
        '<th>Обязательное</th>' +
        '<th>Действие</th></tr>';
    viewQuestions(formName);
}

function createField(formName){
    var form = document.getElementById('form');
    var rand = Math.random();
    var inputText = document.createElement('textarea');
    inputText.placeholder = 'Ваш вопрос';
    inputText.name = 'insert';
    inputText.maxlength = '150';
    inputText.onchange = function () {this.style.border = '1px solid black'};

    var deleteBtn = document.createElement('button');
    deleteBtn.innerHTML = 'удалить';
    deleteBtn.className = 'button_delete';
    deleteBtn.onclick  = function(){
        this.parentNode.parentNode.remove();
        checkButtons(form)};

    var radioText = document.createElement('input');
    radioText.type = 'radio';
    radioText.name = 'type_insert_'+rand;
    radioText.value = 'text';
    radioText.checked = true;
    radioText.className = 'type_insert_text';

    var radioSrc = document.createElement('input');
    radioSrc.type = 'radio';
    radioSrc.name = 'type_insert_'+rand;
    radioSrc.value = 'file';
    radioSrc.className = 'type_insert_src';

    var box = document.createElement('input');
    box.type = 'checkbox';
    box.name = 'filled_insert';

    var tdText = document.createElement('td');
    tdText.appendChild(inputText);

    var tdTextType = document.createElement('td');
    tdTextType.appendChild(radioText);
    var tdFileType = document.createElement('td');
    tdFileType.appendChild(radioSrc);

    var tdField = document.createElement('td');
    tdField.appendChild(box);

    var tdDelete = document.createElement('td');
    tdDelete.appendChild(deleteBtn);

    var tr = document.createElement('tr');
    tr.appendChild(tdText);
    tr.appendChild(tdTextType);
    tr.appendChild(tdFileType);
    tr.appendChild(tdField);
    tr.appendChild(tdDelete);
    form.appendChild(tr);
    checkButtons(form);
}

function deleteQuestion(formName,id) {
    console.log('click');
    $.ajax({
        type: "POST",
        url: "/account/pages/form/form_handler.php",
        data:{
            delete_question:true,
            form_name: formName,
            id: id
        },
        success: function (result) {
            console.log(result);
            updateForm(formName);
        }
    });

}

function saveForm(formName){
    var insertArray = document.getElementsByName('insert');
    var updateArray = document.getElementsByName('update');
    var filledUpdate = document.getElementsByName('filled_update');
    var filledInsert = document.getElementsByName('filled_insert');
    var typeInsertText = document.getElementsByClassName('type_insert_text');
    var typeUpdateText = document.getElementsByClassName('type_update_text');
    var typeInsertSrc = document.getElementsByClassName('type_insert_src');
    var typeUpdateSrc = document.getElementsByClassName('type_update_src');
    var insert = [];
    var update = [];
    var empty = 0;
    for(var i = 0; i<insertArray.length;i++){
        if(insertArray[i].value==''){
            insertArray[i].style.border = '2px solid red';
            empty++;
        }else{
            var obj = {};
            obj.value = insertArray[i].value;
            filledInsert[i].checked ? obj.filled = 1 : obj.filled = 0 ;
            if(typeInsertText[i].checked)obj.type = typeInsertText[i].value;
            else if(typeInsertSrc[i].checked)obj.type = typeInsertSrc[i].value;
            insert.push(obj);
        }
    }
     for(var i = 0;i<updateArray.length;i++){
        if(updateArray[i].value==''){
            updateArray[i].style.border = '2px solid red';
            empty++;
        }else {
            var obj = {};
            obj.value = updateArray[i].value;
            filledUpdate[i].checked ? obj.filled = 1 : obj.filled = 0 ;
            if(typeUpdateText[i].checked)obj.type = typeUpdateText[i].value;
            else if(typeUpdateSrc[i].checked)obj.type = typeUpdateSrc[i].value;
            obj.id = updateArray[i].id;
            update.push(obj);
        }
    }

    if(empty==0) {
        $.ajax({
            type: "POST",
            url: "/account/pages/form/form_handler.php",
            data: {
                save_form: true,
                form_name: formName,
                insert: insert,
                update: update
            },
            success: function (result) {
                console.log(result);
                updateForm(formName);
            }
        });
    }else {
        viewMassage();
    }

}

function clearForm(formName) {
    $.ajax({
        type: "POST",
        url: "/account/pages/form/form_handler.php",
        data: {
            clear_form: true,
            form_name: formName
        },
        success: function (result) {
            console.log(result);
            updateForm(formName);
        }
    });
}
function viewMassage() {

}