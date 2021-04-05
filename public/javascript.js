let comment = document.getElementById('comment');
let updateComment_Btn = document.querySelectorAll('#update_Comment');
let updateCommentForm = document.querySelectorAll('#updateComment_form');

for ( let i = 0; i < updateCommentForm.length; i++) {
    updateCommentForm[i].style.display = 'none';
}

for ( let i = 0; i < updateComment_Btn.length; i++) {
    updateComment_Btn[i].onclick = function(){

        if (updateCommentForm[i].style.display == 'none') {
            updateCommentForm[i].style.display = 'block';
        } else {
            updateCommentForm[i].style.display = 'none';
        }
    }
}