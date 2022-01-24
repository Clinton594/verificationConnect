<?php
// All currency codes must adhere to ISO_4217 currency codes.
// Visit https://en.wikipedia.org/wiki/ISO_4217#Active_codes to find out what this means
// Compiled by Clinton 27-02-2020
class ForExchange
{
  // https://currencyapi.net API Key
  static $API_KEY = null;
  static $generic = null;
  public $url_key = 0;
  public $rates;
  public $base;
  public $filename = "";

  public function __construct($base = "USD")
  {
    $this->base = $base;
    $generic = new Generic;
    $uri = $generic->getURIdata();
    $dir = absolute_filepath($uri->site) . "cache/";
    $file = "{$dir}rates.json";
    $this->filename = $file;
    $this::$API_KEY = $generic::$exchange["API_KEY"];
    $this::$generic = $generic;
  }

  private function getUrls()
  {
    // This is where you store Urls/APIs that deliver exchange rates, =
    // The getRate() method searches the results from these APIs until it finds and exchange rate for a particular currency given
    //For currencyapi.net API, 'base' parameter is fixed to USD because it's a free account (1250 requests), next affordable plan is $ 99.99 for (12500 Monthly requests)
    $urls = [
      "",
      "https://api.exchangerate-api.com/v4/latest/{$this->base}",
      "https://currencyapi.net/api/v1/rates?key={$this::$API_KEY}&base=USD"
    ];
    return $urls;
  }

  // Get current currency rates
  public function rates($index = 0, $internal_call = false)
  {
    if ($index === 0) {
      $this->url_key++;
      $url_key = $this->url_key;
    } else {
      $url_key = $index;
    }
    //see("$index $url_key, ", false);
    if (empty($this->rates) || $index > 0 || $internal_call) {
      $response = new stdClass;
      $urls = $this->getUrls();
      if (!empty($urls[$url_key])) {
        $response = file_get_contents($urls[$url_key]);
        $isjson = isJson($response);
        if ($isjson != false) {
          $this->rates = json_decode($response)->rates;
        } else return new stdClass;
      } else return new stdClass;
    }

    _writeFile($this->filename, $this->rates);
    return $this->rates;
  }

  public function cryptoRates($coins = [], $createOnly = false)
  {
    $today = time();
    $dir   = dirname($this->filename);
    $file  = "{$dir}/crypto.json";
    $response = [];
    if (!is_dir($dir)) {
      mkdir($dir, 0777, true);
    }
    if (file_exists($file) && $createOnly !== true && (round(($today - filemtime($file)) / 60) < 60)) { //Less than 60 Minutes
      $rates = json_decode(_readFile($file));
    } else {
      $key = $this::$generic::$coinlib["API_KEY"];

      $default_coins = ["BTC", "ETH", "BCH", "ADA", "MATIC", "SOL", "LTC", "XRP", "BNB", "DOGE"];
      if (count($coins)) {
        $coins = array_range(array_unique(array_merge($coins, array_diff($default_coins, $coins))), 10);
        $_coins = "&symbol=" . implode(",", array_map("strtoupper", $coins));
      } else $_coins = "&symblol=" . implode(",", array_map("strtoupper", $default_coins));

      $url = "https://coinlib.io/api/v1/coin?key={$key}&pref=USDT{$_coins}";

      $rates = curl_get_content($url, $this::$generic);
      $rates = isJson($rates);
      $rates = $rates->coins;
      _writeFile($file, $rates);
    }
    if (count($coins)) {
      $response = array_filter($rates, function ($rate) use ($coins) {
        return in_array($rate->symbol, $coins);
      });
    } else $response  = $rates;
    return (array_values($response));
  }

  public function currencyGraph($coins = [], $createOnly = false)
  {
    $today = time();
    $dir   = dirname($this->filename);
    $file  = "{$dir}/currencyGraph.json";
    if (!is_dir($dir)) {
      mkdir($dir, 0777, true);
    }
    if (file_exists($file) && $createOnly !== true && (round(($today - filemtime($file)) / 60) < (3600 * 24))) { //Less than 1 day
      $rates = json_decode(_readFile($file));
    } else {
      $rates = curl_get_content("https://coinlib.io/searchable_items_json?v=109987&json", $this::$generic);
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
  //
  public function toBTC($currency_amount = 1)
  {
    $response = 0;
    $url = [
      "url" => "https://blockchain.info/tobtc?currency={$this->base}&value={$currency_amount}"
    ];
    $response = curl_post($url);
    return floatval($response);
  }

  // Get Rate of a particular currency
  public function getRate($currency)
  {
    $response = 0;
    $base  = $this->base;
    if ($base == $currency)
      $rate = 1;
    else {
      if ($this->url_key == 0) {
        $rates = $this->getFromCache();
        // see($rates);
      } else {
        $rates = $this->rates(0, true);
      }
      // If currency is not in the rates move to the next one
      if (empty($rates->{$currency})) {
        if ($this->url_key <= (count($this->getUrls()) - 2)) {
          $rate = $this->getRate($currency);
        } else {
          $rate = 0;
        }
      } else {
        $rate = round($rates->{$currency}, 2);
      }
    }

    return $rate;
  }

  public function getFromCache($createOnly = false)
  {
    // Get from Cache
    $today = time();
    $dir = dirname($this->filename);
    if (!is_dir($dir)) {
      mkdir($dir, 0777, true);
    }
    if (file_exists($this->filename) && $createOnly !== true && (round(($today - filemtime($this->filename)) / (3600 * 24)) < 3)) {
      $rates = json_decode(_readFile($this->filename));
    } else {
      $rates = $this->rates(0, true);
    }
    return $rates;
  }
}
