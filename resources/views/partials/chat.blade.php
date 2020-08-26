        <style>
            .chat-window{
                position: fixed;
                bottom: 0;
                right: 0;
                padding-bottom: 0;
                margin-bottom: -40px;
                z-index: 10;
            }

            .au-card-title{
                cursor:pointer;
            }

            .au-chat{
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
                                                    {{-- <span class="mess-time">12 Min ago</span> --}}
                                                    <div class="recei-mess__inner">
                                                        <div class="avatar avatar--tiny">
                                                            <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                        </div>
                                                        <div class="recei-mess-list">
                                                            {{-- <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div> --}}
                                                            {{-- <div class="recei-mess">Donec tempor, sapien ac viverra</div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="send-mess-wrap">
                                                    <span class="mess-time">30 Sec ago</span>
                                                    <div class="send-mess__inner">
                                                        <div class="send-mess-list">
                                                            <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-chat-textfield">
                                                <form class="au-form-icon">
                                                    <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                                                    <button class="au-input-icon">
                                                        <i class="zmdi zmdi-camera"></i>
                                                    </button>
                                                </form>
                                            </div> --}}
                                        </div>
                                    </div>
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>


        <script>

                $(document).ready(()=>{

                    let messages = [
                        {
                            "msg":"hi, how are you",
                            "sender":"user"
                        },
                        {
                            "msg":"i'm fine",
                            "sender":"bot"
                        }, 
                        {
                            
                        }
                    ];
                    
                    $('.au-card-title').on('click',()=>{
                        $('.au-chat').toggle();
                    });

                })
        
        </script>