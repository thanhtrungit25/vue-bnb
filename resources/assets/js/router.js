import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import store from './store';

import ListingPage from '../components/ListingPage.vue';
import HomePage from '../components/HomePage.vue';

Vue.use(VueRouter);

let router = new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', component: HomePage, name: 'home' },
    { path: '/listing/:listing', component: ListingPage, name: 'listing' },
  ],
  scrollBehavior(to, from, savedPosition) {
    return { x: 0, y: 0 };
  },
});

router.beforeEach((to, from, next) => {
  let serverData = JSON.parse(window.vuebnb_server_data);
  if (!serverData || to.path !== serverData.path) {
    axios.get(`/api${to.path}`).then(({ data }) => {
      store.commit('addData', { route: to.name, data });
    });
  } else {
    // load initial serverData
    store.commit('addData', { route: to.name, data: serverData });
  }
});

export default router;
