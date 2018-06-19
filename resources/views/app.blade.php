<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Vuebnb</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/vue-style.css') }}" type="text/css">
  <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">
  <script type="text/javascript">
    // console.log({{ $model['id'] }});
    window.vuebnb_listing_model = "{!! addslashes(json_encode($model)) !!}";
  </script>
</head>

<body>
  <div id="toolbar">
    <img class="icon" src="{{ asset('images/logo.png') }}">
    <h1>vuebnb</h1>
  </div>
  <div id="app">
    <div class="header">
      <div class="header-img" v-bind:style="headerImageStyle" @click="openModal">
        <button class="view-photos">View Photos</button>
      </div>
    </div>
    <div class="container">
      <div class="heading">
        <h1>@{{ title }}</h1>
        <p>@{{ address }}</p>
        <hr>
        <div class="about">
          <h3>About this listing</h3>
          <p v-bind:class="{ contracted: contracted }">@{{ about }}</p>
          <button v-if="contracted" class="more" v-on:click="contracted = false">+More</button>
        </div>
        <div class="lists">
          <hr>
          <div class="amentities list">
            <div class="title">
              <strong>Amentities</strong>
            </div>
            <div class="content">
              <div class="list-item" v-for="amentity in amenities">
                <i class="fa fa-lg" v-bind:class="amentity.icon"></i>
                <span>@{{ amentity.title }}</span>
              </div>
            </div>
          </div>
          <hr>
          <div class="prices list">
            <div class="title">
              <strong>Prices</strong>
            </div>
            <div class="content">
              <div class="list-item" v-for="price in prices">
                @{{ price.title }}:
                <strong>@{{ price.value }}</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  -->
    <modal-window ref="imagemodal">
      <image-carousel :images="images"></image-carousel>  
    </modal-window>
    <!--  -->
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>