/**
 * Created by stanislav on 6.04.17.
 */

function upvote(id) {
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            id:id,
            vote:1},
        datatype: 'json'
    }).done(getRating(id))
}

function downvote(id) {
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            id: id,
            vote: -1
        },
        datatype: 'json'
    }).done(getRating(id));
}

function getRating(id) {
    $.get('getVotes', {postitusID: id},function (data) {
        document.getElementById(id).textContent = data;
    });
}