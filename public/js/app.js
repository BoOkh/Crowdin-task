$(document).ready(function () {
    var page = 1; // Current page

    loadMorePosts(page);

    downloadPostInJson();
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
function downloadPostInJson() {
    $('#download_post').click(function () {
        var postId = $('#post').attr('post-id');
        $.ajax({
            type: 'POST',
            url: '/post',
            data: {postId: postId},
            dataType: 'json',
            success: function (result) {
                var data = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(result));
                var element = document.getElementById('download_post');
                element.setAttribute("href", data);
                element.setAttribute("download", "post.json");
                element.click();
                element.remove();
                $('#download_btn').append( '<a class="btn btn-primary" id="downloads_post"><span class="glyphicon glyphicon-save">Download</span></a>' );
            }
        });
    });
}