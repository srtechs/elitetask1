<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html>
<html class=''>

<head>
  <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
  <script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
  <script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
  <meta charset='UTF-8'>
  <meta name="robots" content="noindex">
  <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
  <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
  <link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

  <script src="https://use.typekit.net/hoy3lrg.js"></script>
  <script>
    try {
      Typekit.load({
        async: true
      });
    } catch (e) {}
  </script>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
  <style class="cp-pen-styles">
    body {
      /*display: flex;*/
      /*align-items: center;*/
      /*justify-content: center;*/
      min-height: 100vh;
      /*background: #27ae60;*/
      font-family: "proxima-nova", "Source Sans Pro", sans-serif;
      font-size: 1em;
      letter-spacing: 0.1px;
      color: #32465a;
      text-rendering: optimizeLegibility;
      text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
      -webkit-font-smoothing: antialiased;
    }


    #frame {
      /*width: 95%;*/
      /*min-width: 360px;*/
      /*max-width: 1000px;*/
      height: 92vh;
      /*min-height: 300px;*/
      /*max-height: 720px;*/
      background: #E6EAEA;
    }

    @media screen and (max-width: 360px) {
      #frame {
        width: 100%;
        height: 100vh;
      }
    }

    #frame #sidepanel {
      float: left;
      min-width: 280px;
      max-width: 340px;
      width: 40%;
      height: 100%;
      background: #2c3e50;
      color: #f5f5f5;
      overflow: hidden;
      position: relative;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel {
        width: 58px;
        min-width: 58px;
      }
    }

    #frame #sidepanel #profile {
      width: 80%;
      margin: 25px auto;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile {
        width: 100%;
        margin: 0 auto;
        padding: 5px 0 0 0;
        background: #32465a;
      }
    }

    #frame #sidepanel #profile.expanded .wrap {
      height: 210px;
      line-height: initial;
    }

    #frame #sidepanel #profile.expanded .wrap p {
      margin-top: 20px;
    }

    #frame #sidepanel #profile.expanded .wrap i.expand-button {
      -moz-transform: scaleY(-1);
      -o-transform: scaleY(-1);
      -webkit-transform: scaleY(-1);
      transform: scaleY(-1);
      filter: FlipH;
      -ms-filter: "FlipH";
    }

    #frame #sidepanel #profile .wrap {
      height: 60px;
      line-height: 60px;
      overflow: hidden;
      -moz-transition: 0.3s height ease;
      -o-transition: 0.3s height ease;
      -webkit-transition: 0.3s height ease;
      transition: 0.3s height ease;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap {
        height: 55px;
      }
    }

    #frame #sidepanel #profile .wrap img {
      width: 50px;
      border-radius: 50%;
      padding: 3px;
      border: 2px solid #e74c3c;
      height: auto;
      float: left;
      cursor: pointer;
      -moz-transition: 0.3s border ease;
      -o-transition: 0.3s border ease;
      -webkit-transition: 0.3s border ease;
      transition: 0.3s border ease;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap img {
        width: 40px;
        margin-left: 4px;
      }
    }

    #frame #sidepanel #profile .wrap img.online {
      border: 2px solid #2ecc71;
    }

    #frame #sidepanel #profile .wrap img.away {
      border: 2px solid #f1c40f;
    }

    #frame #sidepanel #profile .wrap img.busy {
      border: 2px solid #e74c3c;
    }

    #frame #sidepanel #profile .wrap img.offline {
      border: 2px solid #95a5a6;
    }

    #frame #sidepanel #profile .wrap p {
      float: left;
      margin-left: 15px;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap p {
        display: none;
      }
    }

    #frame #sidepanel #profile .wrap i.expand-button {
      float: right;
      margin-top: 23px;
      font-size: 0.8em;
      cursor: pointer;
      color: #435f7a;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap i.expand-button {
        display: none;
      }
    }

    #frame #sidepanel #profile .wrap #status-options {
      position: absolute;
      opacity: 0;
      visibility: hidden;
      width: 150px;
      margin: 70px 0 0 0;
      border-radius: 6px;
      z-index: 99;
      line-height: initial;
      background: #435f7a;
      -moz-transition: 0.3s all ease;
      -o-transition: 0.3s all ease;
      -webkit-transition: 0.3s all ease;
      transition: 0.3s all ease;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options {
        width: 58px;
        margin-top: 57px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options.active {
      opacity: 1;
      visibility: visible;
      margin: 75px 0 0 0;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options.active {
        margin-top: 62px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options:before {
      content: '';
      position: absolute;
      width: 0;
      height: 0;
      border-left: 6px solid transparent;
      border-right: 6px solid transparent;
      border-bottom: 8px solid #435f7a;
      margin: -8px 0 0 24px;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options:before {
        margin-left: 23px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul {
      overflow: hidden;
      border-radius: 6px;
    }

    #frame #sidepanel #profile .wrap #status-options ul li {
      padding: 15px 0 30px 18px;
      display: block;
      cursor: pointer;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li {
        padding: 15px 0 35px 22px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul li:hover {
      background: #496886;
    }

    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
      position: absolute;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin: 5px 0 0 0;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
        width: 14px;
        height: 14px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
      content: '';
      position: absolute;
      width: 14px;
      height: 14px;
      margin: -3px 0 0 -3px;
      background: transparent;
      border-radius: 50%;
      z-index: 0;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
        height: 18px;
        width: 18px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul li p {
      padding-left: 12px;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li p {
        display: none;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
      background: #2ecc71;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
      border: 1px solid #2ecc71;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
      background: #f1c40f;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
      border: 1px solid #f1c40f;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
      background: #e74c3c;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
      border: 1px solid #e74c3c;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
      background: #95a5a6;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
      border: 1px solid #95a5a6;
    }

    #frame #sidepanel #profile .wrap #expanded {
      padding: 100px 0 0 0;
      display: block;
      line-height: initial !important;
    }

    #frame #sidepanel #profile .wrap #expanded label {
      float: left;
      clear: both;
      margin: 0 8px 5px 0;
      padding: 5px 0;
    }

    #frame #sidepanel #profile .wrap #expanded input {
      border: none;
      margin-bottom: 6px;
      background: #32465a;
      border-radius: 3px;
      color: #f5f5f5;
      padding: 7px;
      width: calc(100% - 43px);
    }

    #frame #sidepanel #profile .wrap #expanded input:focus {
      outline: none;
      background: #435f7a;
    }

    #frame #sidepanel #search {
      border-top: 1px solid #32465a;
      border-bottom: 1px solid #32465a;
      font-weight: 300;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #search {
        display: none;
      }
    }

    #frame #sidepanel #search label {
      position: absolute;
      margin: 10px 0 0 20px;
    }

    #frame #sidepanel #search input {
      font-family: "proxima-nova", "Source Sans Pro", sans-serif;
      padding: 10px 0 10px 46px;
      width: calc(100% - 25px);
      border: none;
      background: #32465a;
      color: #f5f5f5;
    }

    #frame #sidepanel #search input:focus {
      outline: none;
      background: #435f7a;
    }

    #frame #sidepanel #search input::-webkit-input-placeholder {
      color: #f5f5f5;
    }

    #frame #sidepanel #search input::-moz-placeholder {
      color: #f5f5f5;
    }

    #frame #sidepanel #search input:-ms-input-placeholder {
      color: #f5f5f5;
    }

    #frame #sidepanel #search input:-moz-placeholder {
      color: #f5f5f5;
    }

    #frame #sidepanel #contacts {
      height: calc(100% - 177px);
      overflow-y: scroll;
      overflow-x: hidden;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts {
        height: calc(100% - 149px);
        overflow-y: scroll;
        overflow-x: hidden;
      }

      #frame #sidepanel #contacts::-webkit-scrollbar {
        display: none;
      }
    }

    #frame #sidepanel #contacts.expanded {
      height: calc(100% - 334px);
    }

    #frame #sidepanel #contacts::-webkit-scrollbar {
      width: 8px;
      background: #2c3e50;
    }

    #frame #sidepanel #contacts::-webkit-scrollbar-thumb {
      background-color: #243140;
    }

    #frame #sidepanel #contacts ul li.contact {
      position: relative;
      padding: 10px 0 15px 0;
      font-size: 0.9em;
      cursor: pointer;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact {
        padding: 6px 0 46px 8px;
      }
    }

    #frame #sidepanel #contacts ul li.contact:hover {
      background: #32465a;
    }

    #frame #sidepanel #contacts ul li.contact.active {
      background: #32465a;
      border-right: 5px solid #435f7a;
    }

    #frame #sidepanel #contacts ul li.contact.active span.contact-status {
      border: 2px solid #32465a !important;
    }

    #frame #sidepanel #contacts ul li.contact .wrap {
      width: 88%;
      margin: 0 auto;
      position: relative;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact .wrap {
        width: 100%;
      }
    }

    #frame #sidepanel #contacts ul li.contact .wrap span {
      position: absolute;
      left: 0;
      margin: -2px 0 0 -2px;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      border: 2px solid #2c3e50;
      background: #95a5a6;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.online {
      background: #2ecc71;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.away {
      background: #f1c40f;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.busy {
      background: #e74c3c;
    }

    #frame #sidepanel #contacts ul li.contact .wrap img {
      width: 40px;
      border-radius: 50%;
      float: left;
      margin-right: 10px;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact .wrap img {
        margin-right: 0px;
      }
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta {
      padding: 5px 0 0 0;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact .wrap .meta {
        display: none;
      }
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
      font-weight: 600;
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
      margin: 5px 0 0 0;
      padding: 0 0 1px;
      font-weight: 400;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      -moz-transition: 1s all ease;
      -o-transition: 1s all ease;
      -webkit-transition: 1s all ease;
      transition: 1s all ease;
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
      position: initial;
      border-radius: initial;
      background: none;
      border: none;
      padding: 0 2px 0 0;
      margin: 0 0 0 1px;
      opacity: .5;
    }

    #frame #sidepanel #bottom-bar {
      position: absolute;
      width: 100%;
      bottom: 0;
    }

    #frame #sidepanel #bottom-bar button {
      float: left;
      border: none;
      width: 50%;
      padding: 10px 0;
      background: #32465a;
      color: #f5f5f5;
      cursor: pointer;
      font-size: 0.85em;
      font-family: "proxima-nova", "Source Sans Pro", sans-serif;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button {
        float: none;
        width: 100%;
        padding: 15px 0;
      }
    }

    #frame #sidepanel #bottom-bar button:focus {
      outline: none;
    }

    #frame #sidepanel #bottom-bar button:nth-child(1) {
      border-right: 1px solid #2c3e50;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button:nth-child(1) {
        border-right: none;
        border-bottom: 1px solid #2c3e50;
      }
    }

    #frame #sidepanel #bottom-bar button:hover {
      background: #435f7a;
    }

    #frame #sidepanel #bottom-bar button i {
      margin-right: 3px;
      font-size: 1em;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button i {
        font-size: 1.3em;
      }
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button span {
        display: none;
      }
    }

    #frame .contact .time {
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translate(0, -50%);
    }
  </style>

</head>

<body>
  <!-- 

A concept for a chat interface. 

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

  <div id="frame" class="d-flex">
    <div id="sidepanel" style="flex-grow:1; max-width:initial">

      <!-- <div id="search">
        <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
        <input type="text" placeholder="Search contacts..." />
      </div> -->
      <button class="btn btn-sm text-white rounded float-right" data-toggle="modal" data-target="#chatmodal"><i class="fa-solid fa-circle-plus fa-2x"></i></button>
      <div id="contacts">
        <ul>

          <?php foreach ($myrequest as $key => $value) {
            $userId = "";
            if ($value['lastMessage']['toID'] == $adminId) {
              $userId = $value['lastMessage']['fromID'];
            } else {
              $userId = $value['lastMessage']['toID'];
            }

          ?>


            <a href="<?php echo base_url() . 'chat/detailedchat/' . $key ?>" style="text-decoration: none !important;cursor: pointer;color: white;">
              <li class="contact">
                <div class="wrap">
                  <span class="contact-status online"></span>
                  <?php
                  $imagepath = ""; //getImage($userId);
                  if ($imagepath != "") {
                  ?>

                    <img src="<?php echo $imagepath; ?>" alt="" />
                  <?php } else { ?>
                    <img src="https://via.placeholder.com/100" alt="" />
                  <?php } ?>
                  <div class="meta">
                    <p class="name"><?php
                                    echo  getusername($userId)
                                    ?></p>
                    <p class="preview"><?php echo $value['lastMessage']['content']; ?></p>
                  </div>
                </div>
                <span class="time"><?php echo convertTime($value['lastMessage']['timestamp']); ?><i class="ml-2 fa-solid fa-trash-can"></i></span>
              </li>
            </a>
          <?php } ?>
        </ul>
      </div>
      <div id="bottom-bar" class="d-none">
        <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
        <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
      </div>
    </div>

  </div>




  <!--Modal: Name-->
  <div class="modal fade" id="chatmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Body-->
        <div class="modal-body">
          <div class="container-fluid d-flex flex-column justify-content-center">
            <!--Google map-->
            <div class="form-floating col-6">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option value="0" selected>John Player</option>
                <option value="1">User 1</option>
                <option value="2">User 2</option>
              </select>
              <label for="floatingSelect">Username</label>
            </div>
            <div class="form-floating my-2">
              <textarea class="form-control" placeholder="Type Message Here" id="floatingTextarea" style="height: 100px;"></textarea>
              <label for="floatingTextarea">Message</label>
            </div>
          </div>
        </div>
        <!--Footer-->
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-success btn-md">Send Message <i class="fa-solid fa-paper-plane"></i></button>
          <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Close <i class="fas fa-times ml-1"></i></button>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: Name-->






  <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script>
    $(".messages").animate({
      scrollTop: $(document).height()
    }, "fast");

    $("#profile-img").click(function() {
      $("#status-options").toggleClass("active");
    });

    $(".expand-button").click(function() {
      $("#profile").toggleClass("expanded");
      $("#contacts").toggleClass("expanded");
    });

    $("#status-options ul li").click(function() {
      $("#profile-img").removeClass();
      $("#status-online").removeClass("active");
      $("#status-away").removeClass("active");
      $("#status-busy").removeClass("active");
      $("#status-offline").removeClass("active");
      $(this).addClass("active");

      if ($("#status-online").hasClass("active")) {
        $("#profile-img").addClass("online");
      } else if ($("#status-away").hasClass("active")) {
        $("#profile-img").addClass("away");
      } else if ($("#status-busy").hasClass("active")) {
        $("#profile-img").addClass("busy");
      } else if ($("#status-offline").hasClass("active")) {
        $("#profile-img").addClass("offline");
      } else {
        $("#profile-img").removeClass();
      };

      $("#status-options").removeClass("active");
    });

    function newMessage() {
      message = $(".message-input input").val();
      if ($.trim(message) == '') {
        return false;
      }
      $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
      $('.message-input input').val(null);
      $('.contact.active .preview').html('<span>You: </span>' + message);
      $(".messages").animate({
        scrollTop: $(document).height()
      }, "fast");
    };

    $('.submit').click(function() {
      newMessage();
    });

    $(window).on('keydown', function(e) {
      if (e.which == 13) {
        newMessage();
        return false;
      }
    });
    //# sourceURL=pen.js
  </script>
</body>

</html>