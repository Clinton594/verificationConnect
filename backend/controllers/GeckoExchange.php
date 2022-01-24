<?php
// All currency codes must adhere to ISO_4217 currency codes.
// Visit https://en.wikipedia.org/wiki/ISO_4217#Active_codes to find out what this means
// Compiled by Clinton 27-02-2020
class GeckoExchange
{
  // https://currencyapi.net API Key
  static $API_KEY = null;
  static $generic = null;
  public $filename = "";

  public function __construct($base = "USD")
  {
    $this->base = $base;
    $generic = new Generic;
    $uri = $generic->getURIdata();
    $dir = absolute_filepath($uri->site) . "cache/";
    $file = "{$dir}rates.json";
    $this->filename = $file;
    $this::$generic = $generic;
  }


  public function coinGeckoRates($coins = [], $createOnly = false)
  {
    $today = time();
    $dir   = dirname($this->filename);
    $file  = "{$dir}/crypto.json";
    $response = [];
    if (!is_dir($dir)) {
      mkdir($dir, 0777, true);
    }

    if (file_exists($file)) {
      $rates = json_decode(_readFile($file));
      $crypto = array_column($rates, "id");
      if (array_diff($coins, $crypto)) {
        $createOnly = true;
      }
    }

    if (file_exists($file) && $createOnly !== true && (round(($today - filemtime($file)) / 60) < 15)) { //Less than 15 Minutes
      $rates = $rates;
    } else {

      $default_coins = ["bitcoin", "binancecoin", "bitcoin-cash", "cardano", "matic-network", "solana", "litecoin", "ripple", "dogecoin", "ethereum"];

      if (count($coins)) {
        $_coins = array_unique(array_merge($coins, array_diff($default_coins, $coins)));
        $_coins = "&ids=" . implode(",", array_map("strtoupper", $_coins));
      } else $_coins = "&ids=" . implode(",", array_map("strtoupper", $default_coins));

      $url = strtolower("https://api.coingecko.com/api/v3/coins/markets?vs_currency={$this->base}{$_coins}&order=market_cap_desc&per_page=100&page=1&sparkline=false");

      $rates = curl_get_content($url, $this::$generic);
      $rates = isJson($rates);
      $rates = array_map(function ($rate) {
        $rate->price = $rate->current_price;
        $rate->symbol = strtoupper($rate->symbol);
        return $rate;
      }, $rates);
      if (count($rates)) _writeFile($file, $rates);
    }
    if (count($coins)) {
      $rates = array_filter($rates, function ($rate) use ($coins) {
        return in_array($rate->id, $coins);
      });
    }
    return (array_values($rates));
  }

  public function coinGeckoList($coins = [], $createOnly = false)
  {
    $today = time();
    $dir   = dirname($this->filename);
    $file  = "{$dir}/coin-gecko-list.json";
    if (!is_dir($dir)) {
      mkdir($dir, 0777, true);
    }
    if (file_exists($file) && $createOnly !== true && (round(($today - filemtime($file)) / 60) < (3600 * 24))) { //Less than 1 day
      $rates = json_decode(_readFile($file));
    } else {
      $rates = curl_get_content("https://api.coingecko.com/api/v3/coins/list", $this::$generic);
      $rates = _writeFile($file, $rates, true);
      $rates = isJson($rates);
    }
    if (count($coins)) {
      $rates = array_filter($rates, function ($rate) use ($coins) {
        return in_array($rate->symbol, $coins);
      });
    }
    return (array_values($rates));
  }
}
