<div class="row row-offcanvas row-offcanvas-left">
    <div id="list-filter" class="col-xs-6 col-sm-6 col-md-3 sidebar-offcanvas">

<?php
print_filter_column();
?>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-9" id="device-generic-list">
        <div id="filter-button-container" class="pull-left hidden-md hidden-lg">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Filter</button>
        </div>

        <div id="device-list"></div>
<?php
    $max_page_num = get_page_count();
    $curpage = isset($_GET['pagenum']) ? intval($_GET['pagenum']) : 1;
    $query_string['page'] = $_GET['page'];
    if (isset($_GET['filter']))
        $query_string['filter'] = $_GET['filter'];
    $relative_url = "?" . http_build_query($query_string, '', '&amp;');

    $nextpage_url = $relative_url . '&amp;pagenum=' . ($curpage + 1);
    $prevpage_url = $relative_url . '&amp;pagenum=' . ($curpage - 1);

    $prevpage_enabled = $curpage > 1;
    $nextpage_enabled = $curpage < $max_page_num;
?>

        <div style="height: 40px"></div>
        <div id="page-selector" style="position: absolute; left: 50%; bottom: -10px">
            <ul class="pagination" style="position: relative; left: -50%; margin-bottom: 10px">
                <li id="prev-page" class="page-item pagination-link-arrow <?= $prevpage_enabled ? '' : 'disabled' ?>">
                    <a class="page-link" href="<?= $prevpage_url ?>" data-link-ajaxify="0" data-pagination-enabled="<?= $prevpage_enabled ? '1' : '0' ?>">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="active">
                    <span class="page-link">
                        <span aria-hidden="true" id="cur-page"><?= $curpage ?></span>
                    </span>
                </li>
                <li id="next-page" class="page-item pagination-link-arrow <?= $nextpage_enabled ? '' : 'disabled' ?>">
                    <a class="page-link" href="<?= $nextpage_url ?>" data-link-ajaxify="0" data-pagination-enabled="<?= $nextpage_enabled ? '1' : '0' ?>">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>


<script type="text/javascript">
function adjustHeightList() {
    /* If heights changes, we might lose the scroll position, so save it */
    var scroll = $(window).scrollTop();
    /* Reset height to get the actual height */
    $("#device-generic-list").height("auto");
    var listHeight = $("#device-generic-list").height();
    var filterHeight = $("#list-filter").height();
    $("#device-generic-list").height(Math.max(listHeight, filterHeight));
    $(window).scrollTop(scroll);
}

$(window).resize(adjustHeightList);

$("#list-filter li").click(function(event) {
    var checkbox = $("input[type=checkbox]", event.target);
    if (checkbox.length) {
        checkbox.prop("checked", !checkbox.prop('checked')).change();
    }
});

$("#list-filter input[type=checkbox]").change(updateFilters);

function changePage(event) {
    if (this.getAttribute("data-pagination-enabled") != 1)
        return;
    getData(updateListCallback, getAjaxUrl(this.href));
    changePageUrl(getUrlGetParams(this.href));
}

$("#next-page a").click(changePage);
$("#prev-page a").click(changePage);

function updateListCallback(data) {
    var html = '<div class="row">';
    for (var i in data.devices) {
        html += createDeviceItemBlock(data.devices[i]);
    }
    html += '</div>';
    $("#device-list").html(html);

    var urlNoPage = getUrlGetParams(location.href).replace(/&pagenum=[^&]+/g, '');
    if (data.pageInfo['cur'] > 1) {
        $("#prev-page a").attr("href", urlNoPage + '&pagenum=' + (data.pageInfo['cur'] - 1));
        $("#prev-page a").attr("data-pagination-enabled", "1");
        $("#prev-page").removeClass("disabled");
    } else {
        $("#prev-page a").attr("data-pagination-enabled", "0");
        $("#prev-page").addClass("disabled");
    }
    $("#cur-page").text(data.pageInfo['cur']);
    if (data.pageInfo['cur'] < data.pageInfo['max']) {
        $("#next-page a").attr("href", urlNoPage + '&pagenum=' + (data.pageInfo['cur'] + 1));
        $("#next-page a").attr("data-pagination-enabled", "1");
        $("#next-page").removeClass("disabled");
    } else {
        $("#next-page a").attr("data-pagination-enabled", "0");
        $("#next-page").addClass("disabled");
    }
    adjustHeightList();
}

function updateList() {
    getData(updateListCallback);
}

function addFilterToUrl(data) {
    /* Replace filter with current selection */
    var url = location.href.replace(/&filter[^&]+/g, '');
    var filter_param = $.param({"filter": data});
    if (filter_param.length > 0)
        url += '&' + filter_param;

    /* Remove page number when filters change */
    url = url.replace(/&pagenum=[^&]+/g, '');

    url = getUrlGetParams(url);
    var data = history.state;
    if (data)
        data.url = url;
    history.replaceState(data, '', url);
}

function updateFilters() {
    var data = {};
    $("#list-filter input").each(function() {
        var name = $(this).attr("data-filter-name");
        var value;
        if ($(this).attr('type') == "checkbox") {
            if ($(this).prop("checked"))
                value = $(this).attr("data-filter-value");
        } else {
            value = $(this).val();
        }

        if (!(name && value))
            return true;

        if (data[name] == undefined)
            data[name] = [];
        data[name].push(value);
    });

    /* Add get params to the URL and then request the data */
    addFilterToUrl(data);
    updateList();
}

function changePriceFilters() {
    /* Ensure that max < min and vice versa */
    if ($("#min-price-input").val() && $("#max-price-input").val()) {
        var min = parseInt($("#min-price-input").val());
        var max = parseInt($("#max-price-input").val());
        if ($(this).prop("id") == "min-price-input") {
            if (max < min) {
                $("#max-price-input").val("");
                $("#max-price-input").data('lastValue', '');
            }
        } else {
            if (min > max) {
                $("#min-price-input").val("");
                $("#min-price-input").data('lastValue', '');
            }
        }
    }

    updateFilters();
}

function checkPriceOnEnter(event) {
    if (event.which == 13)
        changePriceFilters();
}

function checkInputPrice() {
    if ($(this).data('lastValue') == this.value)
        return;

    $(this).data('lastValue', this.value);
    changePriceFilters();
}

if ($("#min-price-input").length) {
    $("#min-price-input").focusout(checkInputPrice);
    $("#min-price-input").keypress(checkPriceOnEnter);
    $("#min-price-input").data('lastValue', $("#min-price-input").val());
}

if ($("#max-price-input").length) {
    $("#max-price-input").focusout(checkInputPrice);
    $("#max-price-input").keypress(checkPriceOnEnter);
    $("#max-price-input").data('lastValue', $("#max-price-input").val());
}

$(document).ready(function() {
    updateList();
});

</script>
