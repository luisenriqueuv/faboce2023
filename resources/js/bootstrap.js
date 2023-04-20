window._ = require('lodash');

try {

    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');


} catch (e) { }


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


$(function () {
    $("#formChangePassword").validate({
        'rules': {
            'password': "required",
            'password_confirm': "required",
            'password_confirm1': {
                'equalTo': "#password_confirm"
            }
        }
    });
});