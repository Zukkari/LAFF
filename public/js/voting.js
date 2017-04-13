/**
 * Created by stanislav on 6.04.17.
 */

/*
    Green - #4CAF50
    Red - #f44336
 */

function upvote(id) {
    var element = document.getElementById(id);
    if (upvoted.includes(id)) {
        var index = upvoted.indexOf(id);
        upvoted.splice(index, 1);

        var upvoteButtons = document.getElementsByClassName('upvoteBtn');

        for (i = 0; i < upvoteButtons.length; i++) {
            if (upvoteButtons[i].id == id) {
                var button = upvoteButtons[i];

                button.style.backgroundColor = 'grey';
            }
        }

        element.textContent = parseInt(element.textContent)-1;
    } else {
        if (downvoted.includes(id)) {
            var index = downvoted.indexOf(id);
            downvoted.splice(index, 1);
            upvoted.push(id);

            element.textContent = parseInt(element.textContent)+2;

            var upvoteButtons = document.getElementsByClassName('upvoteBtn');

            for (i = 0; i < upvoteButtons.length; i++) {
                if (upvoteButtons[i].id == id) {
                    var button = upvoteButtons[i];

                    button.style.backgroundColor = '#4CAF50';
                }
            }

            var dvButtons = document.getElementsByClassName('downvoteBtn');

            for (i = 0; i < dvButtons.length; i++) {
                if (dvButtons[i].id == id) {
                    var button = dvButtons[i];

                    button.style.backgroundColor = 'grey';
                }
            }
        } else {
            upvoted.push(id);

            element.textContent = parseInt(element.textContent)+1;

            var upvoteButtons = document.getElementsByClassName('upvoteBtn');

            for (i = 0; i < upvoteButtons.length; i++) {
                if (upvoteButtons[i].id == id) {
                    var button = upvoteButtons[i];

                    button.style.backgroundColor = '#4CAF50';
                }
            }
        }
    }

    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            id:id,
            vote:1},
        datatype: 'json'
    })
}

function downvote(id) {
    var element = document.getElementById(id);
    if (downvoted.includes(id)) {
        var index = upvoted.indexOf(id);
        downvoted.splice(index, 1);

        var dvButtons = document.getElementsByClassName('downvoteBtn');

        for (i = 0; i < dvButtons.length; i++) {
            if (dvButtons[i].id == id) {
                var button = dvButtons[i];

                button.style.backgroundColor = 'grey';
            }
        }

        element.textContent = parseInt(element.textContent)+1;
    } else {
        if (upvoted.includes(id)) {
            var index = downvoted.indexOf(id);
            upvoted.splice(index, 1);
            downvoted.push(id);

            var dvButtons = document.getElementsByClassName('downvoteBtn');

            for (i = 0; i < dvButtons.length; i++) {
                if (dvButtons[i].id == id) {
                    var button = dvButtons[i];

                    button.style.backgroundColor = '#f44336';
                }
            }

            var upvoteButtons = document.getElementsByClassName('upvoteBtn');

            for (i = 0; i < upvoteButtons.length; i++) {
                if (upvoteButtons[i].id == id) {
                    var button = upvoteButtons[i];

                    button.style.backgroundColor = 'grey';
                }
            }

            element.textContent = parseInt(element.textContent)-2;
        } else {
            downvoted.push(id);

            var dvButtons = document.getElementsByClassName('downvoteBtn');

            for (i = 0; i < dvButtons.length; i++) {
                if (dvButtons[i].id == id) {
                    var button = dvButtons[i];

                    button.style.backgroundColor = '#f44336';
                }
            }
            element.textContent = parseInt(element.textContent)-1;
        }
    }


    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            id: id,
            vote: -1
        },
        datatype: 'json'
    })
}

function getRating(id) {
    $.get('getVotes', {postitusID: id},function (data) {
        document.getElementById(id).textContent = data;
    });
}

function getUpvoted(id) {
    $.get('getUpvoted', {userid: id}, function (data) {
        upvoted = data;
    })
}

function getDownvoted(id) {
    $.get('getDownvoted', {userid: id}, function (data) {
        downvoted = data;
    })
}

function initButtons() {
    var upvoteButtons = document.getElementsByClassName('upvoteBtn');
    var dvButtons = document.getElementsByClassName('downvoteBtn');

    console.log(upvoted);
    for (i = 0; i < upvoteButtons.length; i++) {
        console.log(upvoteButtons[i].id);
        if (upvoted.includes(parseInt(upvoteButtons[i].id))) {
            upvoteButtons[i].style.backgroundColor = '#4CAF50'
        }
    }

    for (i = 0; i < dvButtons.length; i++) {
        if (downvoted.includes(parseInt(dvButtons[i].id))) {
            console.log('here');
            dvButtons[i].style.backgroundColor = '#f44336';
        }
    }
}

