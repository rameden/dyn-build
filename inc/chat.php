<?php
//$live_chat_open = get_field('chat_open_time','option');
//$live_chat_close = get_field('chat_close_time','option');
?>
<div data-uk-sticky="{top:61}" class="chat-wrap">
	<div id="__8x8-chat-button-container-script_193511668256324496843d87.16812381" class="chatty"></div>
	<script type="text/javascript">
	    var __8x8Chat = {
	        uuid: "script_193511668256324496843d87.16812381",
	        tenant: "ZHluY29ycDAx",
	        channel: "Customer Support",
	        domain: "https://vcc-na7.8x8.com",
	        path: "/.",
	        buttonContainerId: "__8x8-chat-button-container-script_193511668256324496843d87.16812381",
	        align: "right"
	    };

	    (function() {
	        var se = document.createElement("script");
	        se.type = "text/javascript";
	        se.async = true;
	        se.src = __8x8Chat.domain + __8x8Chat.path + "/CHAT/common/js/chat.js";

	        var os = document.getElementsByTagName("script")[0];
	        os.parentNode.insertBefore(se, os);
	    })();
	</script>
	<!-- End 8x8 chat module -->

<script>
/*jQuery(document).ready(function($){
  var d = new Date();
    var dayOfWeek = d.getUTCDay();
    var hour = d.getUTCHours();
  if (dayOfWeek !== 6 && dayOfWeek !== 0 && hour >= <?php if($live_chat_open){echo $live_chat_open;}else{echo '14';} ?> && hour < <?php if($live_chat_close){echo $live_chat_close;}else{echo '20';} ?>) {
    $("#live-chat").show();
  }
});/*
</script>
</div>
