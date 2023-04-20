function showAjaxModal(url) {
    $('html, body').animate({
        scrollTop: 0
    }, 300);
    jQuery('#modal_ajax .modal-body').html(`<div class="row h-100 align-items-center justify-content-center">
        <div style="color: #009688;" class="col-auto la-square-jelly-box la-dark la-2x">
            <div></div><div></div>
        </div>
    </div>`);
    jQuery('#modal_ajax').modal('show', {
        backdrop: 'true'
    });
    $.ajax({
        url: url,
        success: function (response) {
            jQuery('#modal_ajax .modal-body').html(response)
        }
    });
}

function confirm_modal(delete_url) {
    $('#preloader-delete').html('');
    jQuery('#modal_delete').modal('show', {
        backdrop: 'static'
    });
    document.getElementById('form_delete').setAttribute("action", delete_url);
}