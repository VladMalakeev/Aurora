function mailResponse(message, color) {
 var block = document.getElementById('mailResponse');
 block.style.display = 'block';
 block.style.color = color;
 block.innerHTML = message;
 setTimeout(hide, 3000, block);
 console.log(message);
}
function hide(block) {
    block.style.transition = '3s';
    block.style.display='none';
}
