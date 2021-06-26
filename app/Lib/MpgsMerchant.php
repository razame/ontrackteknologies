<?php

namespace App\Lib;

/*
 This class holds all the merchant related variables and proxy
 configuration settings
*/

class MpgsMerchant
{
  private $proxyServer = "";
  private $proxyAuth = "";
  private $proxyCurlOption = 0;
  private $proxyCurlValue = 0;

  private $certificatePath = "";
  private $certificateVerifyPeer = FALSE;
  private $certificateVerifyHost = 0;

  private $gatewayUrl = "";
  private $debug = FALSE;
  private $version = "";
  private $merchantId = "";
  private $password = "";
  private $apiUsername = "";

  /*
   The constructor takes a config array. The structure of this array is defined
   at the top of this page.
  */
  function __construct($configArray)
  {
    if (array_key_exists("proxyServer", $configArray))
      $this->proxyServer = $configArray["proxyServer"];

    if (array_key_exists("proxyAuth", $configArray))
      $this->proxyAuth = $configArray["proxyAuth"];

    if (array_key_exists("proxyCurlOption", $configArray))
      $this->proxyCurlOption = $configArray["proxyCurlOption"];

    if (array_key_exists("proxyCurlValue", $configArray))
      $this->proxyCurlValue = $configArray["proxyCurlValue"];

    if (array_key_exists("certificatePath", $configArray))
      $this->certificatePath = $configArray["certificatePath"];

    if (array_key_exists("certificateVerifyPeer", $configArray))
      $this->certificateVerifyPeer = $configArray["certificateVerifyPeer"];

    if (array_key_exists("certificateVerifyHost", $configArray))
      $this->certificateVerifyHost = $configArray["certificateVerifyHost"];

    if (array_key_exists("gatewayUrl", $configArray))
      $this->gatewayUrl = $configArray["gatewayUrl"];

    if (array_key_exists("debug", $configArray))
      $this->debug = $configArray["debug"];

    if (array_key_exists("version", $configArray))
      $this->version = $configArray["version"];

    if (array_key_exists("merchantId", $configArray))
      $this->merchantId = $configArray["merchantId"];

    if (array_key_exists("password", $configArray))
      $this->password = $configArray["password"];

    if (array_key_exists("apiUsername", $configArray))
      $this->apiUsername = $configArray["apiUsername"];
  }

  // Get methods to return a specific value
  public function GetProxyServer()
  {
    return $this->proxyServer;
  }

  public function SetProxyServer($newProxyServer)
  {
    $this->proxyServer = $newProxyServer;
  }

  public function GetProxyAuth()
  {
    return $this->proxyAuth;
  }

  public function SetProxyAuth($newProxyAuth)
  {
    $this->proxyAuth = $newProxyAuth;
  }

  public function GetProxyCurlOption()
  {
    return $this->proxyCurlOption;
  }

  public function SetProxyCurlOption($newCurlOption)
  {
    $this->proxyCurlOption = $newCurlOption;
  }

  public function GetProxyCurlValue()
  {
    return $this->proxyCurlValue;
  }

  public function SetProxyCurlValue($newCurlValue)
  {
    $this->proxyCurlValue = $newCurlValue;
  }

  public function GetCertificatePath()
  {
    return $this->certificatePath;
  }

  public function SetCertificatePath($newCertificatePath)
  {
    $this->certificatePath = $newCertificatePath;
  }

  public function GetCertificateVerifyPeer()
  {
    return $this->certificateVerifyPeer;
  }

  public function SetCertificateVerifyPeer($newVerifyHostPeer)
  {
    $this->certificateVerifyPeer = $newVerifyHostPeer;
  }

  public function GetCertificateVerifyHost()
  {
    return $this->certificateVerifyHost;
  }

  // Set methods to set a value

  public function SetCertificateVerifyHost($newVerifyHostValue)
  {
    $this->certificateVerifyHost = $newVerifyHostValue;
  }

  public function GetGatewayUrl()
  {
    return $this->gatewayUrl;
  }

  public function SetGatewayUrl($newGatewayUrl)
  {
    $this->gatewayUrl = $newGatewayUrl;
  }

  public function GetDebug()
  {
    return $this->debug;
  }

  public function SetDebug($debugBool)
  {
    $this->debug = $debugBool;
  }

  public function GetVersion()
  {
    return $this->version;
  }

  public function SetVersion($newVersion)
  {
    $this->version = $newVersion;
  }

  public function GetMerchantId()
  {
    return $this->merchantId;
  }

  public function SetMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }

  public function GetPassword()
  {
    return $this->password;
  }

  public function SetPassword($password)
  {
    $this->password = $password;
  }

  public function GetApiUsername()
  {
    return $this->apiUsername;
  }

  public function SetApiUsername($apiUsername)
  {
    $this->apiUsername = $apiUsername;
  }
}

?>
