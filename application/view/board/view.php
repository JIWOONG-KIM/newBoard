<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Read</title>
    <link rel="stylesheet" href="../../../public/common/css/board.css">
</head>
<body>-->
<div class="header">
    글읽기
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
        <input class="update_btn" type="button" value="수정">
        <input class="delete_btn" type="button" value="삭제">
    </div>
</div>
<!--</body>
</html>-->