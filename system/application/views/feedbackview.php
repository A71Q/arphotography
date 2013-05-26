<?php include_once('header.php')?>
<script type="text/javascript">
    function validateForm(data) {
        $("input", "form").css("background-color", "white");
        $("textarea", "form").css("background-color", "white");
        var valid = true;
        if (data['mail'] == "") {
            $("input#mail", "form").css("background-color", "#ffc1c1").focus();
            valid = false;
        }
        if (data['subject'] == "") {
            $("input#subject", "form").css("background-color", "#ffc1c1").focus();
            valid = false;
        }
        if (data['message'] == "") {
            $("textarea#message", "form").css("background-color", "#ffc1c1").focus();
            valid = false;
        }
        return valid;
    }
</script>
        <style type="text/css">
            .feedbackTable {
                margin: 2px;
                border-collapse:separate;
            }
            .feedbackTable tr td {
                color:#FFF;
            }
            .feedbackTable tr {
                margin-bottom: 20px;
            }
        </style>
    <div id="content">

    <form name="feedbackForm" action="feedback_controller/send" method="post">
            <table class="feedbackTable" cellpadding="0" cellspacing="1">
                <tr>
                    <td valign="top">Your Name:</td>
                    <td><input type="text" id="name" name="name" style="width:400px;"/></td>
                </tr>
                <tr>
                    <td valign="top">Your Mail Address:</td>
                    <td><input type="text" id="mail" name="mail" style="width:400px;"/></td>
                </tr>
                <tr>
                    <td valign="top">Mail Subject:</td>
                    <td><input type="text" id="subject" name="subject" style="width:400px;"/></td>
                </tr>
                <tr>
                    <td valign="top">Mail Body:</td>
                    <td><textarea id="message" name="message" style="width:400px;height:100px;"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="right"><button type="reset" name="resetButton" value="Reset">Reset</button><input type="submit" name="sendButton" value="Send" ></td>
                </tr>
            </table>
    </form>
        </div>
<?php include_once('footer.php')?>