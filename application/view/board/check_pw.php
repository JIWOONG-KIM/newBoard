<div>
    <div><span>비밀번호를 입력하세요</span></div>
    <input type="password"><br>
    <a class="btn blue" href="
    <?php
    if ($this->param->num) {
        echo "{$this->param->get_page}/check_pw/2";
    }
    ?>
    ">확인</a>
</div>