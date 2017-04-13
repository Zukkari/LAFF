/**
 * Created by stanislav on 6.04.17.
 */

function upvote(id) {
    var element = document.getElementById(id);
    if (upvoted.includes(id)) {
        var index = upvoted.indexOf(id);
        upvoted.splice(index, 1);

        element.textContent = parseInt(element.textContent)-1;
    } else {
        if (downvoted.includes(id)) {
            var index = downvoted.indexOf(id);
            downvoted.splice(index, 1);
            upvoted.push(id);

            element.textContent = parseInt(element.textContent)+2;
        } else {
            upvoted.push(id);

            element.textContent = parseInt(element.textContent)+1;
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

        element.textContent = parseInt(element.textContent)+1;
    } else {
        if (upvoted.includes(id)) {
            var index = downvoted.indexOf(id);
            upvoted.splice(index, 1);
            downvoted.push(id);

            element.textContent = parseInt(element.textContent)-2;
        } else {
            downvoted.push(id);

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