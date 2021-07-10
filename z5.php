<?php

// Don't Edit , any problems 
// ©  @Avishkatpatil [ TG ]
// Star This Repo


$url =$_GET['avi'];
if($url !=""){


$id = end(explode('/', $url));
$tlink ="https://gwapi.zee5.com/content/details/$id?translation=en&country=IN&version=2";
$tokenurl =file_get_contents("https://useraction.zee5.com/token/platform_tokens.php?platform_name=web_app");
$tok =json_decode($tokenurl, true);
$token =$tok['token'];

$vtok =file_get_contents("http://useraction.zee5.com/tokennd/");
$vtokn =json_decode($vtok, true);
$vtoken =$vtokn['video_token'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $tlink,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "x-access-token: $token",
    "Content-Type: application/json"
  ),
));
$response = curl_exec($curl);
curl_close($curl);

$z5 =json_decode($response, true);
$image =$z5['image_url'];
$title =$z5['title'];
$des =$z5['description'];
$vhls =$z5['hls'][0];
$sub =$z5['vtt_thumbnail_url'][0];
$error =$z5['error_code'];
$vidt = str_replace('drm', 'hls', $vhls);
$img = str_replace('270x152', '1170x658', $image); 

$hls = "https://zee5vodnd.akamaized.net".$vidt.$vtoken;

// © Avishkar Patil 

}
?>

<html>
<head>
  <title><?php echo $title; ?> | Satyam | Whatstar </title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="description" content="<?php echo $des; ?>">
  <meta name="keywords" content="zee5, zee5play, zeeplex, avishkar patil, zee5 api">
  <meta name="author" content="Avishkar Patil">
  <link rel="shortcut icon" type="image/x-icon" href="https://www.zee5.com/images/ZEE5_logo.svg">
  <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins|Quattrocento+Sans" rel="stylesheet"/>
  <script src="https://cdn.plyr.io/3.6.3/plyr.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/hls.js"></script>
</head>
<style>
html {
  font-family: Poppins;
  background: #000;
  margin: 0;
  padding: 0
}
.loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #000;
        z-index: 9999;
    }
    
    .loading-text {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        text-align: center;
        width: 100%;
        height: 100px;
        line-height: 100px;
    }
    
    .loading-text span {
        display: inline-block;
        margin: 0 5px;
        color: #00b3ff;
        font-family: 'Quattrocento Sans', sans-serif;
    }
    
    .loading-text span:nth-child(1) {
        filter: blur(0px);
        animation: blur-text 1.5s 0s infinite linear alternate;
    }
    
    .loading-text span:nth-child(2) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.2s infinite linear alternate;
    }
    
    .loading-text span:nth-child(3) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.4s infinite linear alternate;
    }
    
    .loading-text span:nth-child(4) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.6s infinite linear alternate;
    }
    
    .loading-text span:nth-child(5) {
        filter: blur(0px);
        animation: blur-text 1.5s 0.8s infinite linear alternate;
    }
    
    .loading-text span:nth-child(6) {
        filter: blur(0px);
        animation: blur-text 1.5s 1s infinite linear alternate;
    }
    
    .loading-text span:nth-child(7) {
        filter: blur(0px);
        animation: blur-text 1.5s 1.2s infinite linear alternate;
    }
    
    @keyframes blur-text {
        0% {
            filter: blur(0px);
        }
        100% {
            filter: blur(4px);
        }
    }
    .plyr__video-wrapper::before {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
        content: '';
        height: 125px;
        width: 125px;
        background: url('https://telegra.ph/file/c8a3e28c3826141573984.jpg') no-repeat;
        background-size: 125px auto, auto;
    }
    
        .plyr__video-wrapper::after {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 10;
        content: '';
        height: 35px;
        width: 35px;
        background: url('https://www.zee5.com/images/ZEE5_logo.svg') no-repeat;
        background-size: 35px auto, auto;
    }
</style>
<body>
  <div id="loading" class="loading">
<div class="loading-text">
    <span class="loading-text-words">W</span>
    <span class="loading-text-words">H</span>
    <span class="loading-text-words">A</span>
    <span class="loading-text-words">T</span>
    <span class="loading-text-words">S</span>
    <span class="loading-text-words">T</span>
    <span class="loading-text-words">A</span>
    <span class="loading-text-words">R</span>
</div>
</div>
  <video controls crossorigin poster="<?php echo $img; ?>" playsinline>
    <source type="application/x-mpegURL" src="<?php echo $hls; ?>"> 
    <track kind="captions" label="EN Sub." src="<?php echo $sub; ?>" srclang="en" default /> </video>
</body>
<script>
  setTimeout(videovisible, 4000)
function videovisible() {
    document.getElementById('loading').style.display = 'none'
}
document.addEventListener("DOMContentLoaded", () => {
  const e = document.querySelector("video"),
    n = e.getElementsByTagName("source")[0].src,
    o = {};
  if(Hls.isSupported()) {
    var config = {
      maxMaxBufferLength: 100,
    };
    const t = new Hls(config);
    t.loadSource(n), t.on(Hls.Events.MANIFEST_PARSED, function(n, l) {
      const s = t.levels.map(e => e.height);
      o.quality = {
        default: s[0],
        options: s,
        forced: !0,
        onChange: e => (function(e) {
          window.hls.levels.forEach((n, o) => {
            n.height === e && (window.hls.currentLevel = o)
          })
        })(e)
      };
      new Plyr(e, o)
    }), t.attachMedia(e), window.hls = t
  } else {
    new Plyr(e, o)
  }
});
</script>
</html>

<!-- © Satyam-->
