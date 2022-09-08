<script src="https://www.gstatic.com/firebasejs/5.3.0/firebase-app.js"></script>

    <script src="https://www.gstatic.com/firebasejs/5.3.0/firebase.js"></script>

    <!-- Add additional services that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.3.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.3.0/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.3.0/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.3.0/firebase-functions.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
      const firebaseConfig = {
        apiKey: "AIzaSyDYvXX3nMbE4JLh94Zy-mGDWqdHYFixD1A",
        authDomain: "travelclub-696dc.firebaseapp.com",
        databaseURL: "https://travelclub-696dc-default-rtdb.firebaseio.com",
        projectId: "travelclub-696dc",
        storageBucket: "travelclub-696dc.appspot.com",
        messagingSenderId: "961583509895",
        appId: "1:961583509895:web:a8986735bbf20920fce322",
        measurementId: "G-KH5PEG6LCF"
      };

      firebase.initializeApp(firebaseConfig);
      var db = firebase.firestore();
    </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script>
    
  var chatid = '<?php echo $chatId ?>';
  var myid='<?php echo $adminId; ?>';
  var imageUrl='<?php echo $userImage; ?>';


  function fetchMessages() {
    const vm = this;
    console.log(db);
    db.collection('AdminChats').doc(chatid).collection('conversations').orderBy('timestamp').onSnapshot((querySnapshot) => {
        console.log("hello");
        const allMessages = []
        querySnapshot.forEach((doc) => {
          if (doc) allMessages.push(doc.data())
        })
        vm.messages = allMessages
      })
    if (vm.messages != "undefined" && vm.messages != "" && vm.messages != null) {
      $('.messages-content').empty();
    vm.messages.forEach(function(message){
      if (message.fromID == myid) {
        $('<li class="replies"><img src="http://3.14.210.177/travelclub/assets/uploads/newlogo1.png" alt="" /><p>'+ message.content +'</p></li>').appendTo($('.messages-content'));
        $('.message-input').val(null);  
      } else {
        $('<li class="sent"><img src="'+ imageUrl +'" alt="" /><p>'+ message.content +'</p></li>').appendTo($('.messages-content'));
      }
    });
    }
    $('.messages').scrollTop($('.messages')[0].scrollHeight);

    
    setDate();
  }

  function sendMessage() {
    var messageText = document.getElementById("textmessage").value;
    if (messageText.trim()) {
      var msgId = Date.now();
      const message = {
        "content": messageText,
        "timestamp": msgId,
        "messageId": msgId.toString(),
        "fromID": myid,
        "toID": '<?php echo $userId; ?>',
        "isRead": false,
        "type": "text"
      }
      return new Promise((resolve, reject) => {
        db.collection('AdminChats')
          .doc(chatid)
          .collection('conversations')
          .doc(msgId.toString())
          .set(message)
          .then(function (docRef) {
            db.collection('AdminChats')
              .doc(chatid)
              .update({
                lastMessage:message
              })
            }).then(function (docd) {
              resolve(Promise);
              $('#textmessage').val("");
              $('.messages').scrollTop($('.messages')[0].scrollHeight);
            })
        })
        .catch(function (error) {
          reject(error)
        })
    }
    
  }

</script>

<script>
  var $messages = $('.messages-content'),
    d, h, m,
    i = 0;
      function setDate(){
  d = new Date()
  if (m != d.getMinutes()) {
    m = d.getMinutes();
    $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
  }
}

function insertMessage() {
  msg = $('#textmessage').val();
  if ($.trim(msg) == '') {
    return false;
  }

  sendMessage();
}

$('.message-submit').click(function() {
  insertMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    insertMessage();
    return false;
  }
});
         
    </script>
<div class="row" style="float: right;margin-right: 1%;">
  <a href="<?php echo base_url().'chat/deletechat/'.$chatId?>" class="btn btn-danger">Delete Chat</a>

</div>
<div class="content w-100">
    <div class="contact-profile">
      <img src="<?= $userImage ?>" alt="" />
      <p><?= $userName ?></p>
      <div class="social-media d-none">
        <i class="fa fa-facebook" aria-hidden="true"></i>
        <i class="fa fa-twitter" aria-hidden="true"></i>
         <i class="fa fa-instagram" aria-hidden="true"></i>
      </div>
    </div>
    <input type="hidden" value="<?= $userImage ?>" id="imageUrl">
    <input type="hidden" value="<?= $chatId ?>" id="chatid">
    <div class="messages w-100" style="margin-bottom:50px; max-height:calc(100vh - 220px)">
      <ul>
        <div class="messages-content"></div>
      </ul>
    </div>
    <div class="message-input" >
      <div class="wrap">
      <input type="text" name="message" id="textmessage" placeholder="Write your message..." />
      <!-- <i class="fa fa-paperclip attachment" aria-hidden="true"></i> -->
      <button class="submit" onclick="insertMessage()"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
      </div>
    </div>
  </div>


<style>
     .content {
  float: right;
  width: 60%;
  height: 100%;
  overflow: hidden;
  position: relative;
  min-height:calc(100vh - 60px);
  max-height:calc(100vh - 60px);

}
@media screen and (max-width: 735px) {
   .content {
    width: calc(100% - 58px);
    min-width: 300px !important;
  }
}
@media screen and (min-width: 900px) {
   .content {
    width: calc(100% - 340px);
  }
}
 .content .contact-profile {
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #f5f5f5;
}
 .content .contact-profile img {
  width: 40px;
  border-radius: 50%;
  float: left;
  margin: 9px 12px 0 9px;
}
 .content .contact-profile p {
  float: left;
}
 .content .contact-profile .social-media {
  float: right;
}
 .content .contact-profile .social-media i {
  margin-left: 14px;
  cursor: pointer;
}
 .content .contact-profile .social-media i:nth-last-child(1) {
  margin-right: 20px;
}
 .content .contact-profile .social-media i:hover {
  color: #435f7a;
}
 .content .messages {
  height: auto;
  min-height: calc(100% - 93px);
  max-height: calc(100% - 93px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
   .content .messages {
    max-height: calc(100% - 105px);
  }
}
 .content .messages::-webkit-scrollbar {
  width: 8px;
  background: transparent;
}
 .content .messages::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.3);
}
 .content .messages ul li {
  display: inline-block;
  clear: both;
  float: left;
  margin: 15px 15px 5px 15px;
  width: calc(100% - 25px);
  font-size: 0.9em;
}
 .content .messages ul li:nth-last-child(1) {
  margin-bottom: 20px;
}
 .content .messages ul li.sent img {
  margin: 6px 8px 0 0;
}
 .content .messages ul li.sent p {
  background: #435f7a;
  color: #f5f5f5;
}
 .content .messages ul li.replies img {
  float: right;
  margin: 6px 0 0 8px;
}
 .content .messages ul li.replies p {
  background: #f5f5f5;
  float: right;
}
 .content .messages ul li img {
  width: 22px;
  border-radius: 50%;
  float: left;
}
 .content .messages ul li p {
  display: inline-block;
  padding: 10px 15px;
  border-radius: 20px;
  max-width: 205px;
  line-height: 130%;
}
@media screen and (min-width: 735px) {
   .content .messages ul li p {
    max-width: 300px;
  }
}
 .content .message-input {
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: 99999999;
  background-color: #ffffff;
}
 .content .message-input .wrap {
  position: relative;
}
 .content .message-input .wrap input {
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
  float: left;
  border: none;
  width: calc(100% - 90px);
  padding: 11px 32px 10px 8px;
  font-size: 0.8em;
  color: #32465a;
}
@media screen and (max-width: 735px) {
 .content .message-input .wrap input {
    padding: 15px 32px 16px 8px;
  }
}
 .content .message-input .wrap input:focus {
  outline: none;
}
 .content .message-input .wrap .attachment {
  position: absolute;
  right: 60px;
  z-index: 4;
  margin-top: 10px;
  font-size: 1.1em;
  color: #435f7a;
  opacity: .5;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
   .content .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
 .content .message-input .wrap .attachment:hover {
  opacity: 1;
}
 .content .message-input .wrap button {
  float: right;
  border: none;
  width: 50px;
  padding: 12px 0;
  cursor: pointer;
  background: #32465a;
  color: #f5f5f5;
}
@media screen and (max-width: 735px) {
   .content .message-input .wrap button {
    padding: 16px 0;
  }
}
 .content .message-input .wrap button:hover {
  background: #435f7a;
}
 .content .message-input .wrap button:focus {
  outline: none;
}
</style>

<script>
  $(window).load(function() {
    setInterval(fetchMessages, 1000);
  })
</script>