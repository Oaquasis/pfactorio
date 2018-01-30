
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

try {
    require('bootstrap');
} catch (e) {}

window.Vue = require('vue');
//const fontawesome = ;
//const faPowerOff = require('@fortawesome/fontawesome-pro-light/faPowerOff');

//const fontawesome = require('@fortawesome/fontawesome');
//const lightIcons = require('@fortawesome/fontawesome-pro-light')
//const faPowerOff = require('@fortawesome/fontawesome-pro-light/faPowerOff');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//fontawesome.library.add(faPowerOff);

//Vue.component('font-awesome-icon', require('@fortawesome/fontawesome')); // Use the icon component anywhere in the app
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients',require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens',require('./components/passport/PersonalAccessTokens.vue'));

new Vue({
    el: 'body',
    template: '<div><my-component></my-component></div>',
    //render: h => h(App)
});
