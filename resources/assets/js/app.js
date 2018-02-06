require('./bootstrap');

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
// Vue.component('passport-clients', require('./components/passport/Clients.vue'));
// Vue.component('passport-authorized-clients',require('./components/passport/AuthorizedClients.vue'));
// Vue.component('passport-personal-access-tokens',require('./components/passport/PersonalAccessTokens.vue'));

Vue.component('notification', require('./components/FloatingNotification.vue'));
Vue.component('modpack', require('./components/Modpack.vue'));
//Vue.component('modpacks');

const app = new Vue({
    el: "#container"
});