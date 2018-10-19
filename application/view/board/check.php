<div class="container" style="text-align: center;">
    <div><span>비밀번호를 입력하세요</span></div>
    <form class="form-inline" action="<?php echo "{$this->param->get_page}/deleteRow/{$this->param->num}";?>" method="post">
    <input class="form-control" type="password" name="pwd" style="margin-bottom: 10px;"><br>
    <input id="go" class="btn blue" type="submit" value="확인">
    </form>
</div>

<script>
    $("#go").click(function(){
        if ($.trim($("input[name='pwd']").val())=="") {
            alert("비밀번호를 입력하세요");
            $("input[name='pwd']").focus();
            return false;
        }
    });
</script>