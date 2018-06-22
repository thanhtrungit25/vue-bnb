import 'core-js/fn/object/assign';
import Vue from 'vue';

import App from '../components/App';
import ListingPage from '../components/ListingPage';
import router from './router';
import store from './store';

var app = new Vue({
  el: '#app',
  render: h => h(App),
  router,
  store,
});
