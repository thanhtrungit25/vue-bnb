<template>
  <div>
    <header-image
      :image-url="images[0]"
      @header-clicked="openModal"
    >
    </header-image>
    <div class="container">
      <div class="heading">
        <h1>{{ title }}</h1>
        <p>{{ address }}</p>
        <hr>
        <div class="about">
          <h3>About this listing</h3>
          <expandable-text>{{ about }}</expandable-text>
        </div>
        <div class="lists">
          <feature-list title="Amentities" :items="amenities">
            <template slot-scope="amentity">
              <i class="fa fa-lg" v-bind:class="amentity.icon"></i>
              <span>{{ amentity.title }}</span>
            </template>
          </feature-list>
          <feature-list title="Prices" :items="prices">
            <template slot-scope="price">
              {{ price.title }}:
              <strong>{{ price.value }}</strong>
            </template>
          </feature-list>
        </div>
      </div>
    </div>
    <!--  -->
    <modal-window ref="imagemodal">
      <image-carousel :images="images"></image-carousel>  
    </modal-window>
    <!--  -->
  </div>  
</template>

<script>
import { populateAmenitiesAndPrices } from '../js/helpers';

let model = JSON.parse(window.vuebnb_listing_model);
model = populateAmenitiesAndPrices(model);

import ImageCarousel from '../components/ImageCarousel.vue';
import ModalWindow from '../components/ModalWindow.vue';
import HeaderImage from '../components/HeaderImage.vue';
import FeatureList from '../components/FeatureList.vue';
import ExpandableText from '../components/ExpandableText.vue';

export default {
  data() {
    return Object.assign(model, {});
  },
  methods: {
    openModal() {
      this.$refs.imagemodal.modalOpen = true;
    },
  },
  components: {
    ImageCarousel,
    ModalWindow,
    HeaderImage,
    FeatureList,
    ExpandableText,
  },
};
</script>

<style>
.about {
  margin-top: 2em;
}

.about h3 {
  font-size: 22px;
}
</style>
