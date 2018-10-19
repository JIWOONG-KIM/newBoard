<div class="container header">
    <h3>게시판</h3>
</div>
<div class="container auto-center">
    <table width="100%" class="table table-hover">
        <colgroup>
            <col width="10%">
            <col width="60%">
            <col width="10%">
            <col width="15%">
        </colgroup>
        <thead>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $key => $data): ?>
            <tr>
                <td><?php echo $data->num ?></td>
                <td class="al_l"><a href="<?php echo "{$this->param->get_page}/view/{$data->num}"?>"><?php echo $data->title?></a></td>
                <td><?php echo $data->writer?></td>
                <td><?php echo $data->reg_date?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="footer">
        <a class="btn btn-primary" type="button" href="<?php echo "{$this->param->get_page}/write"?>">글쓰기</a>
    </div>
</div>

