<template>
  <div class="listing-summary">
    <router-link :to="{ name: 'listing', params: { listing: listing.id } }">
      <div class="wrapper">
        <div class="thumnail" :style="backgroundImageStyle"></div>
        <div class="info title">
          <span>{{ listing.price_per_night }}</span>
          <span>{{ listing.title }}</span>
        </div>
        <div class="info address">{{ listing.address }}</div>
      </div>
    </router-link>
    <listing-save :id="listing.id"></listing-save>
  </div>
</template>
<script>
import ListingSave from './ListingSave.vue';
export default {
  props: ['listing'],
  computed: {
    backgroundImageStyle() {
      return {
        'background-image': `url("${this.listing.thumb}")`,
      };
    },
  },
  components: {
    ListingSave,
  },
};
</script>
<style>
.listing-summary {
  flex: 0 0 auto;
  position: relative;
}
.listing-summary a {
  text-decoration: none;
}
.wrapper {
  max-width: 350px;
  display: block;
}
.listing-summary .thumnail {
  width: 350px;
  height: 250px;
  background-size: cover;
  background-position: center;
}
.listing-summary .info {
  color: #484848;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  letter-spacing: 0.2px;
  word-wrap: break-word;
}
.listing-summary .info.title {
  padding-top: 5px;
  padding-top: 5px;
  font-weight: 700;
  font-size: 16px;
  line-height: 24px;
}
.listing-summary .info.address {
  font-size: 14px;
  line-height: 18px;
}
</style>
