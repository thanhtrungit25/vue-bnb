<template>
  <div class="home-container">
    <listing-summary-group
      v-for="(group, country) in listing_groups"
      :key="country"
      :country="country"
      :listings="group"
    >
    </listing-summary-group>
  </div>
</template>

<script>
import routeMixin from '../js/route-mixin';
import { groupByCountry } from '../js/helpers';
import ListingSummaryGroup from './ListingSummaryGroup.vue';

export default {
  mixins: [routeMixin],
  data() {
    return {
      listing_groups: [],
    };
  },
  components: {
    ListingSummaryGroup,
  },
  methods: {
    assignData({ listings }) {
      this.listing_groups = groupByCountry(listings);
    },
  },
};
</script>
<style>
</style>
