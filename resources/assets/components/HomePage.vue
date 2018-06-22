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
import { groupByCountry } from '../js/helpers';
import ListingSummaryGroup from './ListingSummaryGroup.vue';

export default {
  components: {
    ListingSummaryGroup,
  },
  computed: {
    listing_groups() {
      return groupByCountry(this.$store.state.listing_summaries);
    },
  },
};
</script>
<style>
</style>
