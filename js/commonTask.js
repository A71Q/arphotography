var clickRecord = new Array();
function isInvalidClick(methodName) {
    function setClickRecord() {
        clickRecord[methodName] = 1;
    }
    function resetClickRecord() {
        clickRecord[methodName] = 0;
    }
    if (clickRecord[methodName] == 1) {
        return true;
    }
    setClickRecord();
    setTimeout(resetClickRecord, 2000);
    return false;
}
function closePopup() {
    $("#popupDiv").dialog("close");
}
function search(searchFor) {
    var searchIn = $("select#searchFor option:selected").val();
    if (searchIn == ""){
       alert("Please select option from search for");
        return;
    }
    if (searchFor.length < 3 && searchIn == "Member"){
        alert("At least 3 character must enter to search.");
        return;
    }

    $.blockUI();
    $.get("../common/search", {"searchIn":searchIn, "searchFor":searchFor}, function(data) {
        if ("NOT_FOUND" == data) {
            alert("Nothing Found To Display!");
        } else {
            clearPage();
            $("#title-text").html("Search Result");
            $("#dynamicContent").append("<div id='searchResult' style='float:left;padding:0;margin:0;width:100%'></div>")
            $("#searchResult").html(data);
            function setupTableFilter() {
                $("#listTable").eq(0).tableFilter({imagePath:'../images/icons',
                    enableRowSelector:true,
                    selectEvent: 'mouseover',
                    selectedClass: 'selected'
                });
            }
            setTimeout(setupTableFilter, 0);
        }
        $.unblockUI();
    });
}
function processServerData(data) {
    var commands = data.split('|');
    var serverError = false;
    for (var i = 0; i < commands.length; i++) {
        var cmd = commands[i].split(':');
        if (cmd[0] == 'message') {
            alert(cmd[1]);
        } else if (cmd[0] == 'reload') {
            document.location.reload();
        } else if (cmd[0] == 'redirect') {
            document.location = cmd[1];
        } else if (cmd[0] == '') {
            // do nothing;
        } else {
            serverError = true;
        }
    }
    if (serverError) {
        function showError() {
            $("body").html(data);
        }
        setTimeout(showError, 200);
    }
}
function deleteForm() {
    function successCallBack (successData) {
        $.unblockUI();
        processServerData(successData);
    }
    if (confirm("Are you sure you want to delete?")) {
        $.blockUI();
        $("#action").val("delete");
        $("form").ajaxSubmit({success:successCallBack});
    }
}
var validateForm; // to be defined in form view pages
function submitForm() {
    function beforeSubmitCallBack (formData) {
        var data = new Array();
        for (var i = 0; i < formData.length; i++) {
            data[formData[i].name] = formData[i].value;
        }
        var valid = true;
        if (validateForm) {
            valid = validateForm(data);
        }
        if (valid) {
            $.blockUI();
        }
        return valid;
    }
    function successCallBack (successData) {
        $.unblockUI();
        processServerData(successData);
    }
    if ($("#action").val() == "delete") {
        $("#action").val("save");
    }
    $("form").ajaxSubmit({beforeSubmit:beforeSubmitCallBack, success:successCallBack});
}
