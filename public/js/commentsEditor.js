
function editComment(id) {
    if (!editing.includes(id)) {
        editing.push(id);
        var textArea = document.createElement("TEXTAREA");
        textArea.id = id;
        textArea.className = 'textArea';

        var list = document.getElementsByClassName("commentText");

        var oldText;

        for (i = 0; i < list.length; i++) {
            if (list[i].id == id) {
                oldText = list[i].textContent;
            }
        }

        var submitButton = document.createElement("BUTTON");
        submitButton.appendChild(document.createTextNode("Submit your edit"));
        submitButton.id = id;
        submitButton.className = 'submitButton';
        submitButton.onclick = function() {updateComment(id)};

        var commentText = document.createTextNode(oldText);
        textArea.appendChild(commentText);

        document.getElementById(id).appendChild(textArea);
        document.getElementById(id).appendChild(submitButton);
    }
}

function updateComment(id) {

    var text;

    var list = document.getElementsByClassName('textArea');

    for (i = 0; i < list.length; i++) {
        if (list[i].id == id) {
            text = list[i].value;
        }
    }

    $.ajax({
        type: 'POST',
        url: '/edit',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            type: 'updateComment',
            commentId:id,
            commentText: text},
        datatype: 'json'
    });

    document.getElementById(id).getElementsByClassName("commentText")[0].textContent = text;

    document.getElementById(id).getElementsByClassName("submitButton")[0].remove();
    document.getElementById(id).getElementsByClassName("textArea")[0].remove();

    var index = editing.indexOf(id);
    editing.splice(index, 1);
}