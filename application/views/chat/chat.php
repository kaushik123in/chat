<ul class="nav justify-content-center bg-dark text-light">
    <li class="nav-item">
        <ul>
            <a class="nav-link text-white h4">Group Chat :)</a>
        </ul>
    </li>
</ul>

<div id="app">
    <div class="form-group container">
        <div class="row">
            <div class="col-md-12  chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">

                            <div class="user_info">
                                <span><?php echo $this->session->userdata('username');?></span>
                                <p>1767 Messages</p>
                            </div>

                        </div>

                    </div>
                    <div  class="card-body msg_card_body">

                        <div  v-for="user in users" class="d-flex justify-content-start mb-4">
                            <div class="user_info">
                                <p>{{user.username}}</p>
                            </div>
                            <div class="msg_cotainer">
                                {{user.message}}
                                <span class="msg_time">{{user.chat_date_time}}</span>

                            </div>

                        </div>


                    </div>

                    <pagination
                        :current_page="currentPage"
                        :row_count_page="rowCountPage"
                        @page-update="pageUpdate"
                        :total_users="totalUsers"
                        :page_range="pageRange"
                    >
                    </pagination>

                    <div class="card-footer">
                        <div class="input-group">
                            <textarea id="message" name="message" class="form-control type_msg" placeholder="Type your message..." v-model="chatMessage.message" @keyup.enter="sendMessage"></textarea>
                            <button class="btn btn-info fa fa-edit" @click="sendMessage"  ></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
