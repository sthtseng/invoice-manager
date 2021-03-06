
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});


// delete a payment or product row
function deleteBtnClickHandler(){
    $(this).closest('.form-row').remove();
}

$(document).ready(function() {
    $('.delete-row-btn').click(deleteBtnClickHandler);

    $("#add-product-btn").click(function(){
        $('#products-group').append($('.product-row-template').html());
        $('#products-group .form-row:last-child .delete-row-btn').click(deleteBtnClickHandler);
    });

    $("#add-payment-btn").click(function(){
        $('#payments-group').append($('.payment-row-template').html());
        $('#payments-group .form-row:last-child .delete-row-btn').click(deleteBtnClickHandler);
    });

    $(".delete-invoice-btn").click(function(){
        var invoiceId = $(this).data('id');
        // $.post( "invoices/delete", {id: invoiceId});
        $.ajax({
            type:'POST',
            url:'/invoices/delete',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {id: invoiceId},
            success:function(data){
               location.replace('/');
            }
         });
    });
});