/*
 * Parameters:
 *  img: Array containing the URLs of the images
 *
 * Return:
 *  Element to be added to the DOM or null
 */
function createSlider(img, interval) {

    if (!img || !img.length)
        return null;

    function newSlider(context, interval) {
        var current = 0;
        var images = $(".slider-image", context);
        var last = images.length - 1;
        var intervalId;

        function setCurrent(idx) {
            if (!document.body.contains(context[0]) && intervalId)
                clearInterval(intervalId);
            if (idx == current || idx < 0 || idx > last)
                return;
            $(images.get(current)).hide();
            $(images.get(idx)).fadeIn();
            current = idx;
        };

        function right() {
            setCurrent((current == last) ? 0 : current + 1);
        }

        if (interval)
            intervalId = window.setInterval(right, interval);

        $(images.get(current)).fadeIn();

        return {
            left: function() {
                setCurrent((current == 0) ? last : current - 1);
            },
            right: function() {
                right();
            },
        }
    };

    var html = '<ul class="list-unstyled" id="slider-images">' +
               '    <li id="slider-left-arrow" class="arrows">&lt;</li>' +
               '    <li id="slider-right-arrow" class="arrows">&gt;</li>';
    for (var i in img) {
        html += '   <li class="slider-image"><img src="' + img[i] + '" alt="Slider image ' + i + '"></li>';
    }
    html += '</ul>';

    var context = $(html);
    var slider = newSlider(context, interval);
    $("#slider-left-arrow", context).click(slider.left);
    $("#slider-right-arrow", context).click(slider.right);

    /* Fullscreen on click */
    $(".slider-image img", context).click(function() {
        var src = this.src;
        $("#slider-images").append('<div id="slider-popup"></div>');
        $("#slider-popup").append('<img src="' + src + '">').hide().fadeIn();

        /* Exit fullscreen on click */
        $("#slider-popup").click(function() {
            $(this).fadeOut("fast", function() {
                $(this).remove()
            });
        });
    });

    return context;
}
