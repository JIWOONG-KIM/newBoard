<div class="header">
    <?php
    if (isset($this->param->num)) {
        echo "글수정";
    } else {
        echo "글쓰기";
    }
    ?>
</div>
<div class="container">
    <form name="write_form" action="" method="post">
        <div class="title">
            <span> 제목 : </span> <input type="text" name="title" placeholder="제목을 입력하세요"
                                       value="<?php if (isset($this->param->num)) {
                                           echo $this->data->title;
                                       } ?>">
        </div>
        <hr>
        <div class="writer" style="text-align: right; margin : 0px; padding: 0px;">
            <span>작성자 : </span><input type="text" name="writer" style="margin-right: 20px;"
                                      value="<?php if (isset($this->param->num)) {
                                          echo $this->data->writer;
                                      } ?>">
            <span>비밀번호 : </span><input type="password" name="pwd">
        </div>
        <hr>
        <div class="contents">
        <textarea name="contents">
            <?php if (isset($this->param->num)) {
                echo $this->data->contents;
            } ?>
        </textarea>
            <?php if (isset($this->param->num)) {
                echo "<input type='hidden' name='num' value='{$this->param->num}'>";
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
    var insert = function (url) {
        $.ajax({
            url: url,
            type: "post",
            data: $("form").serialize(),
            success: function (data) {
                //alert('등록 성공');
                //location.href = "/myBoard/board";
            },
            error: function () {
                //alert('등록 실패');
            }
        });
    }
</script>