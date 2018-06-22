<template>
  <div>
    <header-image
      v-if="images[0]"
      :image-url="images[0]"
      @header-clicked="openModal"
      :id="id"
    >
    </header-image>
    <div class="listing-container">
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
import routeMixin from '../js/route-mixin';

import ImageCarousel from '../components/ImageCarousel.vue';
import ModalWindow from '../components/ModalWindow.vue';
import HeaderImage from '../components/HeaderImage.vue';
import FeatureList from '../components/FeatureList.vue';
import ExpandableText from '../components/ExpandableText.vue';

export default {
  mixins: [routeMixin],
  data() {
    return {
      title: null,
      about: null,
      address: null,
      amenities: [],
      prices: [],
      images: [],
      id: null,
    };
  },
  methods: {
    assignData({ listing }) {
      Object.assign(this.$data, populateAmenitiesAndPrices(listing));
    },
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
