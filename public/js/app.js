$(document).ready(function () {
    var page = 1; // Current page
    loadMorePosts(page);
});

function loadMorePosts(page) {
    $('#load_more').click(function () {
        page++;
        $.ajax({
            type: 'POST',
            url: '/posts',
            data: {page: page},
            dataType: 'json',
            success: function (result) {
                for (var i = 0; i < result.length; i++) {
                    var date = $.format.date(result[i].created_at, "MMMM dd, yyyy");
                    $('.posts').append(
                        "<h2>" + result[i].title + "</h2>" +
                        "<p class='created-at'>" + date + "</p>" +
                        "<p>" + result[i].short_description + "</p>" +
                        "<p><a class='btn btn-default' href='post/" + result[i].id + "' role='button'>View more &raquo;</a></p>"
                    );
                }
            }
        });
        checkPageExist(page);
    });
}

//Check existence next page. If not exist - remove button "Load more".
function checkPageExist(page) {
    $.ajax({
        type: 'POST',
        url: '/posts',
        data: {page: page + 1},
        dataType: 'json',
        success: function (result) {
            if (result == '') {
                $('#load_more').remove();
                return;
            }
        }
    });
}