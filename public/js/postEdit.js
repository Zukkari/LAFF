function editPost(id, title, payload) {
    if (!editing.includes(id)) {
        editing.push(id);

        var target;

        var elems = document.getElementsByClassName("edit");

        for (i = 0; i < elems.length; i++) {
            if (elems[i].id == id) {
                target = elems[i];
            }
        }

        var editDiv = document.createElement("DIV");
        editDiv.appendChild(document.createElement("BR"));

        var titleDiv = document.createElement("DIV");
        var titleText = document.createElement("TEXTAREA");
        titleText.id = id;
        titleText.className = 'titleEdit';
        titleText.appendChild(document.createTextNode(title));

        titleText.rows = 1;
        titleText.cols = 60;

        titleDiv.appendChild(titleText);
        editDiv.appendChild(titleDiv);

        target.appendChild(editDiv);
        editDiv.appendChild(document.createElement("BR"));
        editDiv.className = 'editDiv';
<<<<<<< HEAD
        editDiv.id = 'editDiv';
=======
        editDiv.id = id;
>>>>>>> 979481d24681382b668cfbdf57481b63c4df170e

        var textDiv = document.createElement("DIV");
        var textText = document.createElement("TEXTAREA");
        textText.id = id;
        textText.className = 'textEdit';
        textText.appendChild(document.createTextNode(payload));

        textText.rows = 20;
        textText.cols = 60;

        textDiv.appendChild(textText);
        editDiv.appendChild(textDiv);

        editDiv.appendChild(document.createElement("BR"));
        var submit = document.createElement("BUTTON");
<<<<<<< HEAD
        submit.appendChild(document.createTextNode("Update your post"));
=======
        submit.appendChild(document.createTextNode("Update your comment"));
>>>>>>> 979481d24681382b668cfbdf57481b63c4df170e
        submit.onclick = function () {
            var title = titleText.value;
            var payload = textText.value;
            updatePost(id, title, payload);

            var elems = document.getElementsByTagName("h2");

            for (i = 0; i < elems.length; i++) {
                if (elems[i].id == id) {
                    elems[i].textContent = title;
                }
            }

            elems = document.getElementsByTagName("p");

            for (i = 0; i < elems.length; i++) {
                if (elems[i].id == id) {
                    elems[i].textContent = payload;
                }
            }

<<<<<<< HEAD
            $("#editDiv").remove();
=======
            elems = document.getElementsByClassName("editDiv");

            for (i = 0; i < elems.length; i++) {
                if (elems[i].id == id) {
                    target.removeChild(elems[i]);

                    while (elems[i].firstChild) {
                        elems[i].removeChild(elems[i].firstChild);
                    }
                }
            }

            var index = editing.indexOf(id);
            editing.splice(index, 1);
>>>>>>> 979481d24681382b668cfbdf57481b63c4df170e
        };

        editDiv.appendChild(submit);
        editDiv.appendChild(document.createElement("BR"));
        editDiv.appendChild(document.createElement("BR"));
    }
}

function updatePost(id, title, payload) {
    $.ajax({
        type: 'POST',
        url: '/updatePost',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            id:id,
            title:title,
            payload:payload
        },
        datatype: 'json'
    });
}