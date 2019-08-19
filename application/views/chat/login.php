<ul class="nav justify-content-center bg-dark text-light">
    <li class="nav-item">
        <a class="nav-link text-white h4" href="<?php echo base_url();?>login">Group Chat :)</a>
    </li>
</ul>
<div id="app">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <transition
                enter-active-class="animated fadeInLeft"
                leave-active-class="animated fadeOutRight">
                <div class="notification is-success text-center px-5 top-middle" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
            </transition>
            <div class="col-md-6">

                <h3 slot="head" >Login</h3>
                <div slot="body" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" :class="{'is-invalid': formValidate.userame}" name="firstname" v-model="newUser.username">

                            <div class="has-text-danger" v-html="formValidate.username"> </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" :class="{'is-invalid': formValidate.password}" name="lastname" v-model="newUser.password">

                            <div class="has-text-danger" v-html="formValidate.password"> </div>
                        </div>


                    </div>

                </div>
                <div slot="foot">
                    <button class="btn btn-dark" @click="addUser">Login</button>
                </div>

            </div>

        </div>

    </div>

    <?php //include 'modal.php';?>



</div>

