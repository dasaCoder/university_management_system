<div class="container">
    <div class="row pt-3">
        <div class="chat-main">
            <div class="col-md-12 chat-header rounded-top bg-primary text-white">
                <div class="row">
                    <div class="col-md-6 username pl-2">
                        <i class="fa fa-circle text-success" aria-hidden="true"></i>
                        <h6 class="m-0">Bot Helper</h6>
                    </div>
                    <div class="col-md-6 options text-right pr-2">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>
                        <i class="fa fa-video-camera" aria-hidden="true"></i>
                        <i class="fa fa-circle text-success live-video mr-1" aria-hidden="true"></i>
                        <i class="fa fa-phone mr-2" aria-hidden="true"></i>
                        <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                        <i class="fa fa-times hide-chat-box" aria-hidden="true"></i>
                      </div>
                </div>
            </div>
            <div class="chat-content">
                <div class="col-md-12 chats border">
                    <ul class="p-0">
                        <li class="pl-2 pr-2 bg-primary rounded text-white text-center send-msg mb-1">
                            hiii
                        </li>
                        <li class="p-1 rounded mb-1">
                            <div class="receive-msg">
                                <img src="http://nicesnippets.com/demo/image1.jpg">
                                <div class="receive-msg-desc  text-center mt-1 ml-1 pl-2 pr-2">
                                    <p class="pl-2 pr-2 rounded">hello</p>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-md-12 message-box border pl-2 pr-2 border-top-0">
                    <input type="text" class="pl-0 pr-0 w-100" placeholder="Type a message..." />
                    <div class="tools">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <i class="fa fa-telegram" aria-hidden="true"></i>
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <i class="fa fa-meh-o" aria-hidden="true"></i>
                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                        <i class="fa fa-gamepad" aria-hidden="true"></i>
                        <i class="fa fa-camera" aria-hidden="true"></i>
                        <i class="fa fa-folder" aria-hidden="true"></i>
                        <i class="fa fa-thumbs-o-up m-0" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .chat-main{
	position: fixed;
	width: 270px;
	bottom: 0;
	right: 200px;
    z-index: 1;
    right: 0;
    background: white;
    margin-right: 20px;
}
.chat-header{
	background: #4267B2;
	padding-top: 1px;
	padding-bottom: 1px;
}
.username i{
	font-size: 9px;
}
.username h6{
	display: inline-block;
	font-size: 12px;
	font-weight: 600;
}
.options i{
	font-size: 14px;
    font-weight: normal;
    opacity: 0.7;
}
.options .live-video{
	font-size: 6px;
}
.chats{
	height: 260px;
	overflow-x: scroll;
	overflow-x: hidden;
}
.chats ul li{
	list-style: none;
	clear: both;
	font-size: 13px;
}
.chats .send-msg{
	float: right;
}
.receive-msg img{
	border-radius: 100%;
	height: 30px;
	width: 12%;
}
.receive-msg-img{
	display: inline;
}
.receive-msg .receive-msg-desc{
	display: inline-block;
}
.receive-msg .receive-msg-desc p{
	background: #c1c1c1;
}
.message-box input{
	border: none;
	font-size: 13px;
	opacity: 0.7;
}
.message-box input:focus{
	outline: none;
}
.tools i{
	color: #a1a1a1;
	cursor: pointer;
	font-size: 20px;
	margin-right: 6px;
}
</style>

<script>
    $('.hide-chat-box').click(function(){
            $('.chat-content').slideToggle();
    });
</script>