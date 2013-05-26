<?php include_once('header.php')?>
    <script type="text/javascript">
        function validateForm(data) {
            $("input", "form").css("background-color", "white");
            var valid = true;

            if (data['password'].value == "") {
                $("input#password", "form").css("background-color", "#ffa1a1").focus();
                valid = false;
            }

            if (data['login_name'].value == "") {
                $("input#login_name", "form").css("background-color", "#ffa1a1").focus();
                valid = false;
            }
            return valid;
        }
    </script>
    <div id="content">
        <?php if('ADMIN' == $this->session->userdata('login_type')):?>
            <div style="margin-top:30px;">
                <a href="<? echo site_url('admin/assign_image_to_gallery_controller');?>"><span>Assign Image to Gallery</span></a>
                <a href="<? echo site_url('admin/image_gallery_controller');?>"><span>New Gallery</span></a>
                <a href="<? echo site_url('admin/upload');?>"><span>Upload</span></a>
            </div>
        <?php endif; ?>
        <?php if('ADMIN' != $this->session->userdata('login_type')):?>
       <form id="command" name="frm" method="post" action="login_controller/doLogin" onSubmit="JavaScript:return validateForm(this)">
            <div style="margin: 10px auto;margin-top:80px;width: 464px;clear:both;">
                <div>
                    <div id="fields">
                        <div id="uname">
                        <label for="login_name" style="font-weight: bold">Username:&nbsp;&nbsp;</label><input id="login_name" name="login_name" type="text" value="" size="20" maxlength="30"/>
                        </div>
                        <div id="pass" style="margin-top: 10px;">
                        <label for="password" style="font-weight: bold">Password:&nbsp;&nbsp;</label><input id="password" name="password" type="password" value="" size="20" maxlength="30"/>
                        </div>
                    </div>
                </div>
                <div>
                    <div style="margin-left:50px; margin-top: 5px;float:left;width:200px">
                        <button type="submit" style="float:left;margin-left:100px">Login</button>
                    </div>
                    <div style="float:left;width:100%;text-align:center;color:#f00;font-weight:bold;font-size:14px;margin-top:20px;">
                        <?=(isset($errorMsg)) ? $errorMsg : ''?>
                    </div>
                </div>
            </div>
        </form>
        <?php endif; ?>
    </div>
<?php include_once('footer.php')?>