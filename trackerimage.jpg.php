<?php

  // Function to get the client IP address
  function get_client_ip() {
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
         $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';
      return $ipaddress;
  }

  // trackerimage.jpg.php

  // You are collecting some info about your users
  // in this case it's the email campaign they've opened...
  $campaignID = intval($_GET['campaignID']);
  // and the subscription ID - you saved that from your
  // double opt-in registration, right?
  $subscriptionID = intval($_GET['subscriptionID']);

  // Get more info:
  // Get Ip
  $ip = get_client_ip();
  // Get user Agent
  $userAgent = $_SERVER['HTTP_USER_AGENT'];

  // load the Database abstractor
  require_once('settings.php');
  require_once('classes/EmailTracker.class.php');

  // someone accessed this script by opening an email
  // and displaying images.  Let's store that knowledge
  $mysql_date_now = date("Y-m-d H:i:s");
  $EmailCampaign = new EmailTracker($campaignID, $settings['mysql']);
  $EmailCampaign->openedBy( $subscriptionID, $mysql_date_now, $ip, $userAgent  );

  // load the image
  $image = 'images/image.jpg';
  // getimagesize will return the mimetype for this image
  $imageinfo = getimagesize($image);
  $image_mimetype = $imageinfo['mime'];

  // tell the browser to expect an image
  header('Content-type: '.$image_mimetype);
  // send it an image
  echo file_get_contents($image);

?>
