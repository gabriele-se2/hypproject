var DISABLE_BROWSER_CACHE = true;

function ajaxQuery(callback, url, method, data, callbackFailure) {

    /* Needed by is_ajax() (utils.php) */
    if (data == null)
        data = { "ajax": 1 };
    else if (typeof data == "string")
        data += "&ajax=1";
    else
        data["ajax"] = 1;

    /*
     * Add current timestamp to the request so that the browser
     * doesn't use cached responses.
     */
    if (DISABLE_BROWSER_CACHE) {
        if (typeof data == "string")
            data += "&timestamp=" + new Date().getTime();
        else
            data["timestamp"] = new Date().getTime();
    }

    if (url == null)
        url = URL_AJAX + getUrlGetParams(location.href);

    loadingAnimation.show();

    $.ajax({
        method: method,
        dataType: "json",
        url: url,
        data: data,
        success: callback,
        error: function(xhr, status, error) {
            /* Show back button in case of error */
            updateBreadcrumb();
            addBackButton();

            if (callbackFailure) {
                callbackFailure();
                return;
            }

            try {
                var response = JSON.parse(xhr.responseText);
                document.title = response.title;
                updateMainContent(response.html);
            } catch (e) {
                document.title = "TIM - Error";
                updateMainContent("Error: could not process request");
            }
        },
        complete: loadingAnimation.hide,
    });
}

function getData(callback, url, data, callbackFailure) {
    ajaxQuery(callback, url, "GET", data, callbackFailure);
}

function postData(callback, url, data, callbackFailure) {
    ajaxQuery(callback, url, "POST", data, callbackFailure);
}
