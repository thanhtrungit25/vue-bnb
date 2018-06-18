<template>
  <div class="image-carousel">
    <img v-bind:src="image">
    <div class="controls">
      <carousel-control 
        dir="left"
        @change-image="changeImage"
      ></carousel-control>
      <carousel-control 
        dir="right"
        @change-image="changeImage"
      ></carousel-control>
    </div>
  </div>
</template>

<script>
export default {
  props: ['images'],
  data() {
    return {
      index: 0,
    };
  },
  computed: {
    image() {
      return this.images[this.index];
    },
  },
  methods: {
    changeImage(val) {
      let newVal = this.index + parseInt(val);
      if (newVal < 0) {
        this.index = this.images.length - 1; // last image
      } else if (newVal === this.images.length) {
        this.index = 0; // reset to first image
      } else {
        this.index = newVal; // assign index to new index
      }
    },
  },
  components: {
    'carousel-control': {
      template: `<i :class="classes" @click="clicked"></i>`,
      props: ['dir'],
      computed: {
        classes() {
          return 'carousel-control fa fa-2x fa-chevron-' + this.dir;
        },
      },
      methods: {
        clicked() {
          this.$emit('change-image', this.dir === 'left' ? -1 : 1);
        },
      },
    },
  },
};
</script>

<style>
.image-carousel {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  margin-top: -12vh;
  position: relative;
}

.image-carousel img {
  width: 100%;
}

.image-carousel .controls {
  position: absolute;
  width: 100%;
  display: flex;
  justify-content: space-between;
}
</style>
