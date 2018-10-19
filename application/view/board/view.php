<div class="container header">
    <h3>글읽기</h3>
</div>
<div class="container">
    <div class="title">
    <span> 제목 : </span> <?php echo $data->title?>
    </div>
    <hr>
    <div class="writer" style="text-align: right;">
        <span> 작성자 : <?php echo $data->writer?>    </span>
        <span> 작성일 : <?php echo $data->reg_date?></span>
    </div>
    <hr>
    <div class="contents"><?php echo $data->contents?></div>
    <div class="footer">
        <a class="btn btn-primary" href="<?php echo "{$this->param->get_page}/write/{$data->num}"?>">수정</a>
<!--        <a class="btn btn-primary" href="--><?php //echo "{$this->param->get_page}/write/1"?><!--">수정</a>-->
        <a class="btn btn-primary" href="<?php echo "{$this->param->get_page}/check/{$data->num}"?>">삭제</a>
<!--        <a class="btn btn-primary" href="--><?php //echo "{$this->param->get_page}/deleteRow/{$data->num}"?><!--">삭제</a>-->
<!--        <input class="delete_btn" type="button" value="삭제">-->
    </div>
</div>
