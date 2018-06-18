import 'core-js/fn/object/assign';
import Vue from 'vue';
import { populateAmenitiesAndPrices } from './helpers';

let model = JSON.parse(window.vuebnb_listing_model);
// console.log('model before', model);
model = populateAmenitiesAndPrices(model);
// console.log('model after', model);

import ImageCarousel from '../components/ImageCarousel.vue';
import ModalWindow from '../components/ModalWindow.vue';

var app = new Vue({
  el: '#app',
  data: Object.assign(model, {
    headerImageStyle: {
      'background-image': `url(${model.images[0]})`,
    },
    contracted: true,
  }),
  components: {
    ImageCarousel,
    ModalWindow,
  },
});

setTimeout(function() {
  app.message = 'Goodbye world!!!';
}, 2000);
