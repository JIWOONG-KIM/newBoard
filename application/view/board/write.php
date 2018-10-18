<div class="header">
    글쓰기
</div>
<div class="container">
    <form name="write_form" action="" method="post">
    <div class="title">
    <span> 제목 : </span> <input type="text" name="title" placeholder="제목을 입력하세요">
    </div>
    <hr>
    <div class="writer" style="text-align: right;">
        <span>작성자 : </span><input type="text" name="writer" style="margin-right: 20px;">
        <span>비밀번호 : </span><input type="password" name="pwd">
    </div>
<hr>
<div class="contents">
        <textarea name="contents">
        </textarea>
</div>
<div class="footer">
    <button class="btn btn" type="button" onclick="insert('<?php echo "{$this->param->get_page}/insert"?>')">등록</button>
</div>
</form>
</div>

<script>
    var insert = function(url){
        console.log($("form").serialize());
        $.ajax({
            url : url,
            type : "post",
            data : $("form").serialize(),
            success : function(data) {
                alert(data);
            },
            error: function(){

            }
        });
    }
</script>