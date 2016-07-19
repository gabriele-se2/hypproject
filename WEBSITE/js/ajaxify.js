$(document).on('click', 'a', function(event) {
    if (this.getAttribute("data-link-ajaxify") == 0) {
        event.preventDefault();
        return;
    }

    if ($(this).attr("id") == "go-back-history") {
        event.preventDefault();
        history.back();
        return;
    }

    var relative_url = $(this).attr("href");
    if (relative_url.charAt(0) == '?') {
        event.preventDefault();
        newPage(URL_AJAX + relative_url);
        changePageUrl(relative_url);
    }
});

window.onpopstate = function(event) {
    if (event.state)
        newPage();
};

function newPage(url) {
    var data_ajax = { "ajax_new_page": 1 };

    updatePageCallback = function(data) {
        $(window).scrollTop(0);
        document.title = data.title;
        updateBreadcrumb(data.breadcrumb);
        updateMainContent(data.html);
    }

    getData(updatePageCallback, url, data_ajax);
}
