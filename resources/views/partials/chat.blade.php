@auth

<style>
    .chat-window {
        position: fixed;
        bottom: 0;
        right: 0;
        padding-bottom: 0;
        margin-bottom: -40px;
        z-index: 10;
    }

    .au-card-title {
        cursor: pointer;
    }

    .au-chat {
        display: none;
    }
</style>

<div class="col-lg-4 chat-window">
    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
        <div class="au-card-title" style="padding-bottom:25px;padding-top:25px;">
            <div class="bg-overlay bg-overlay--blue"></div>
            <h3>
                <i class="zmdi zmdi-pin-help"></i>Assistant</h3>
            <!-- <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button> -->
        </div>
        <div class="au-inbox-wrap js-inbox-wrap">

            <div class="au-chat">

                <div class="au-chat__content">

                    <div class="recei-mess-wrap">
                        <div class="recei-mess__inner">
                            <div class="recei-mess-list">
                                <div class="recei-mess">Hi!</div>
                                <div class="recei-mess">How can I help you?</div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="send-mess-wrap">
                                                    <div class="send-mess__inner">
                                                        <div class="send-mess-list">
                                                            <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                                        </div>
                                                    </div>
                                                </div> --}}

                </div>
                <div class="au-chat-textfield">
                    <form class="au-form-icon" id="chat-input">
                        <input id="chat-input" class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                        <button class="au-input-icon">
                            <i class="zmdi zmdi-camera"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
            function getParamMsg(param) {
                
                $(".au-chat__content").append('<div class="recei-mess-wrap">' +
                    '<div class="recei-mess__inner">' +
                    ' <div class="recei-mess-list">' +
                    '<div class="recei-mess">' +
                    "what is the " + param[1] + "?" +
                    '</div></div>' +
                    '</div>' +
                    '</div>');
                    
                $('.au-chat__content').animate({scrollTop: $('.au-chat__content').height()});

            }

            function showDidNotGetIt() {
                $(".au-chat__content").append('<div class="recei-mess-wrap">' +
                    '<div class="recei-mess__inner">' +
                    ' <div class="recei-mess-list">' +
                    '<div class="recei-mess">' +
                    "I didn't get it.." +
                    '</div></div>' +
                    '</div>' +
                    '</div>');
                
                $('.au-chat__content').animate({scrollTop: $('.au-chat__content').height()});
            }

            function showUserMsg(msgBody) {
                $(".au-chat__content").append(
                    '<div class="send-mess-wrap">' +
                    '<div class="send-mess__inner">' +
                    '<div class="send-mess-list">' +
                    '<div class="send-mess">' +
                    msgBody +
                    '</div></div>' +
                    '</div>' +
                    '</div>'
                );
                $('.au-chat__content').animate({scrollTop: $('.au-chat__content').height()});
            }

            function showResponse(reply) {
                
                $(".au-chat__content").append(
                    '<div class="recei-mess-wrap">' +
                    '<div class="recei-mess__inner">' +
                    ' <div class="recei-mess-list">' +
                    '<div class="recei-mess">' +
                    reply +
                    '</div></div>' +
                    '</div>' +
                    '</div>'
                );
                $('.au-chat__content').animate({scrollTop: $('.au-chat__content').height()});

            }

            
            function sendProcessedMsgToServer(reqObj) {
                
                $.ajax({
                    type: "post",
                    url: "{{ url ('/api/messages') }}",
                    data: reqObj,
                    dataType: "json",
                    success: function(data) {
                        
                        showResponse(data['result']);

                        if (data['result'] == "Enrolled Successfully!") {
                            is_intent_identified = false;
                            parameter_index = 0;
                        }
                    },
                    error: function(data) {
                        showResponse(data['result']);
                    }
                });

                is_intent_identified = false;
                is_intent_completed = false;
                parameter_index = 0;
                intent = "";
                reqObj = {};
            }

            function mapIntent(text) {
                $.ajax({
                    type: "post",
                    url: "http://127.0.0.1:5000/api/v1/predict",
                    data: JSON.stringify({
                        'text': text
                    }),
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function(result) {

                        if (result["result"] == "NOT_FOUND") {
                            is_intent_identified = false;
                            showDidNotGetIt();

                        } else {
                            is_intent_identified = true;
                            intent = result["result"];

                            reqObj['user_id'] = userId;
                            reqObj['intent'] = intent;

                            if(INTENT_LIST[intent].length > 0) {
                                getParamMsg(INTENT_LIST[intent][parameter_index]);
                            } else {
                                sendProcessedMsgToServer(reqObj);
                            }
                            parameter_index++;
                        }

                    },
                    complete: function() {
                        $(".au-input").val("");
                    },
                    error: function() {
                        alert("error occured");
                    }
                });0
            }


            const INTENT_LIST = {
                "ENROLL_COURSE": [
                    ['courseId', 'course id','student']
                ],
                "GET_RESULT": [
                    ['courseId', 'course id','student']
                ],
                "ARRANGE_LECTURE":[
                    ['courseId', 'course id','admin'],
                    ['acYear','academic year'],
                    ['date','date (YYYY-MM-DD)'],
                    ['startTime','starting time (HH:MM)'],
                    ['endTime','ending time (HH:MM)'],
                    ['lecHall', 'lec Hall']
                ],
                "TODAY_LECTURES": [],
                "UPDATE_PAYMENT_DETAIL":[
                    ['studentId','student id (SE/20XX/XX)','financer']
                ],
                "UNPAID_LIST":[
                    ['acYear','academic year','financer']
                ],
                "ADD_ASSIGNMENT":[
                    ['courseId', 'course id','lecturer'],
                    ['acYear','academic year']
                ]
            };


            var is_intent_identified = false;
            var is_intent_completed = false;
            var parameter_index = 0;
            var intent = "";
            var reqObj = {};

            var userId = "{{ Auth::user()->id}}";

            $("#chat-input").submit(function(e) {

                showUserMsg($(".au-input").val());

                e.preventDefault();
                
                if (is_intent_identified == false) {

                    mapIntent($(".au-input").val());

                } else {

                    reqObj[INTENT_LIST[intent][(parameter_index-1)][0]] = $(".au-input").val();

                    if (parameter_index == INTENT_LIST[intent].length) {
                        sendProcessedMsgToServer(reqObj);
                    } else {
                        getParamMsg(INTENT_LIST[intent][parameter_index]);
                        parameter_index++;
                    }
                    $(".au-input").val("");

                }
            });
        </script>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<script>
    $(document).ready(() => {

        let messages = [{
                "msg": "hi, how are you",
                "sender": "user"
            },
            {
                "msg": "i'm fine",
                "sender": "bot"
            },
            {

            }
        ];

        $('.au-card-title').on('click', () => {
            $('.au-chat').toggle();
        });

    })
</script>


@endauth