<div class="container header">
    <h3><?php
    if (isset($this->param->num)) {
        echo "글수정";
    } else {
        echo "글쓰기";
    }
    ?></h3>
</div>
<div class="container">
    <form class="form-inline" name="board-form" action="" method="post">
        <div class="title">
            <span> 제목 : </span> <input class="form-control" type="text" name="title" placeholder="제목을 입력하세요"
                                       value="<?php if (isset($this->param->num)) {
                                           echo $this->data->title;
                                       } ?>" required>
        </div>
        <hr>
        <div class="writer" style="text-align: right; margin : 0px; padding: 0px;">
            <span>작성자 : </span><input class="form-control" type="text" name="writer" style="margin-right: 20px;"
                                      value="<?php if (isset($this->param->num)) {
                                          echo $this->data->writer;
                                      } ?>" required>
            <span>비밀번호 : </span><input class="form-control" type="password" name="pwd" required>
        </div>
        <hr>
        <div class="contents">
        <textarea class="form-control"name="contents" rows="10" style="width:100%;">
<?php if (isset($this->param->num)) {
                echo $this->data->contents;
            }
?></textarea>
            <?php if (isset($this->param->num)) {
                echo "<input type='hidden' name='num' value='{$this->param->num}' required>";
            } ?>
        </div>
        <div class="footer">
            <button class="btn btn" type="button" onclick="insert('<?php
            if (!isset($this->param->num)) {
                echo "{$this->param->get_page}/insert";
            } else {
                echo "{$this->param->get_page}/updateRow";
            }
            ?>')">
                <?php if (isset($this->param->num)) {
                    echo "수정";
                } else {
                    echo "등록";
                } ?>
            </button>
        </div>
    </form>
</div>
<script>
    var validation = function () {
        if ($.trim($("input[name='title']").val())=="") {
            alert("제목을 입력하세요");
            $("input[name='title']").focus();
            return false;
        } else if ($.trim($("input[name='writer']").val())=="") {
            alert("작성자를 입력하세요");
            $("input[name='writer']").focus();
            return false;
        } else if ($.trim($("input[name='pwd']").val())=="") {
            alert("비밀번호를 입력하세요");
            $("input[name='pwd']").focus();
            return false;
        } else if ($.trim($("textarea[name='contents']").val())=="") {
            alert("내용을 입력하세요");
            $("input[name='contents']").focus();
            return false;
        }
        return true;
    }

    var insert = function (url) {
        if(!validation())
            return false;

        $.ajax({
            url: url,
            type: "post",
            data: $("form").serialize(),
            success: function (data) {
                // alert('등록 성공');
                // alert(data);
                location.href = "/myBoard/board";
            },
            error: function () {
                // alert('등록 실패');
            }
        });
    }
</script>