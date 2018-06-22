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
  data() {
    return {
      listing_groups: [],
    };
  },
  components: {
    ListingSummaryGroup,
  },
};
</script>
<style>
</style>
