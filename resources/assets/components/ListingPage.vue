<template>
  <div>
    <header-image
      v-if="listing.images[0]"
      :image-url="listing.images[0]"
      @header-clicked="openModal"
      :id="listing.id"
    >
    </header-image>
    <div class="listing-container">
      <div class="heading">
        <h1>{{ listing.title }}</h1>
        <p>{{ listing.address }}</p>
        <hr>
        <div class="about">
          <h3>About this listing</h3>
          <expandable-text>{{ listing.about }}</expandable-text>
        </div>
        <div class="lists">
          <feature-list title="Amentities" :items="listing.amenities">
            <template slot-scope="amentity">
              <i class="fa fa-lg" v-bind:class="amentity.icon"></i>
              <span>{{ amentity.title }}</span>
            </template>
          </feature-list>
          <feature-list title="Prices" :items="listing.prices">
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
      <image-carousel :images="listing.images"></image-carousel>  
    </modal-window>
    <!--  -->
  </div>  
</template>

<script>
import { populateAmenitiesAndPrices } from '../js/helpers';

import ImageCarousel from '../components/ImageCarousel.vue';
import ModalWindow from '../components/ModalWindow.vue';
import HeaderImage from '../components/HeaderImage.vue';
import FeatureList from '../components/FeatureList.vue';
import ExpandableText from '../components/ExpandableText.vue';

export default {
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
  computed: {
    listing() {
      return populateAmenitiesAndPrices(
        this.$store.getters.getListing(this.$route.params.listing),
      );
    },
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
