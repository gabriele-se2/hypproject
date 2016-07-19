var loadingAnimation = (function() {
    /*
     * Don't show loader immediately. In this way, we see it only if
     * it's taking too much to load the new data.
     */
    var showDelay = 300;

    var loaderTimeout;

    return {
        hide: function() {
            window.clearTimeout(loaderTimeout);
            $("#loader-container").hide();
        },
        show: function() {
            window.clearTimeout(loaderTimeout);
            loaderTimeout = window.setTimeout(function() {
                    $("#loader-container").show();
                }, showDelay);
        }
    };
})();

$(document).ready(function() {
    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });

    /* Make sure the collapsible navbar menu fits in the body */
    var minHeight = $("#navbar").height() + $("#navbar-header").height() + 20;
    $("body").css("min-height", minHeight)
});

function getUrlGetParams(url) {
    if (url == null)
        url = location.href;
    var toRemove = location.host + location.pathname;
    if (url.indexOf(toRemove) != -1)
        return url.substring(url.indexOf(toRemove) + toRemove.length);
    else
        return url;
}

function getAjaxUrl(url) {
    return URL_AJAX + getUrlGetParams(url);
}

function changePageUrl(newUrl) {
    var newRelativeUrl = getUrlGetParams(newUrl);
    var url = getUrlGetParams(location.href);
    history.pushState({ url: url }, '', newRelativeUrl);
}

function updateMainContent(html) {
    $("#main-container").html(html).hide().fadeIn();
}

/* The back button is a special entry of the breadcrumb */
function hideBackButton() {
    $("#go-back-history").attr("href", "?");
    $("#breadcrumb-back").hide();
    $("#breadcrumb-back").removeClass("breadcrumb-back"); /* CSS rules */
}

function showBackButton(url) {
    $("#go-back-history").attr("href", url);
    $("#breadcrumb-back").addClass("breadcrumb-back"); /* CSS rules */
    $("#breadcrumb-back").show();
}

function addBackButton() {
    if (!history.state) {
        hideBackButton();
    } else {
        showBackButton(history.state.url);
        $("#breadcrumb-head").show();
    }
}

function updateBreadcrumb(breadcrumb) {
    hideBackButton();
    $(".breadcrumb-path").remove();
    if (!breadcrumb) {
        $("#breadcrumb-head").hide();
    } else {
        $("#breadcrumb-head").append(breadcrumb);
        $("#breadcrumb-head").show();
    }
}
