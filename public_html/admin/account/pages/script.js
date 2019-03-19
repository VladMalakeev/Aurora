function showNewPageWindow(state) {
    document.getElementById('newPageBlock').style.display = state;
}
function showDeleteBlock(state, name) {
   var block = document.getElementById('deleteBlock');
   block.style.display = state;
   document.getElementsByName('delete_name')[0].value = name;
}

function showEditBlock(state, name,isMain) {
    var block = document.getElementById('editBlock');
    block.style.display = state;
    document.getElementsByName('edit_name')[0].value = name;
    document.getElementsByName('new_name')[0].value = name;
    var check = document.getElementById('checkEdit');
    if(isMain == '1'){
      check.checked = true;
    }
    else check.checked = false;
}
