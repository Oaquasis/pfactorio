
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

try {
    require('bootstrap');
} catch (e) {}

window.Vue = require('vue');
const fontawesome = require('@fortawesome/fontawesome');
const faPowerOff = require('@fortawesome/fontawesome-pro-light/faPowerOff');

//const fontawesome = require('@fortawesome/fontawesome');
//const lightIcons = require('@fortawesome/fontawesome-pro-light')
//const faPowerOff = require('@fortawesome/fontawesome-pro-light/faPowerOff');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

fontawesome.library.add(faPowerOff);

Vue.component('font-awesome-icon', FontAwesomeIcon); // Use the icon component anywhere in the app

new Vue({
    el: '#app',
    template: '<div><my-component></my-component></div>',
    render: h => h(App)
});
