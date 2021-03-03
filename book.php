<?php
include_once('header.php');
include_once("conn.php");
?>
<div style="width:600px;margin-top:40px;margin-left:495px;" class="center-block">
    <div class="form-inline">
        <form method="get" action="book.php">
        <div class="form-group">
        <input type="text" id="input" name="search" class="form-control" placeholder="Please enter something..." style="width:230px;">
        <select name="keyword" class="form-control">
        <option value="1">Book ID</option>
        <option value="2">Book Name</option>
        </select>
        </div>
        <div class="form-group">
        <button type="submit" id="research" class="btn btn-primary">Searching</button>
        </div>
        </form>
    </div> 
</div>

<div class="content">
<div class="img_content">
    <ul>
        <?php
            $search = isset($_GET['search'])?$_GET['search']:'';
            $keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
            if(!empty($search)){
                if($keyword==1){
                    $select1 = $db->select("book_info","*", array("id"=>$search)); 
                }elseif($keyword==2){
                    $select1 = $db->select("book_info","*", array("name"=>$search));
                }
            }else{
                $select1 = $db->select("book_info","*");
            }

            $select2 = $db->select("borrow_list",array("book_id","back_date"));
            $arr = array();
            $arr2 = array();
            foreach ($select2 as $row){
                if(strtotime($row['back_date'])>time()){//仍在借出
                    array_push($arr,$row['book_id']);
                }else{                                  //逾期未归
                    array_push($arr2,$row['book_id']);
                }
            }
            $count = 0;
            foreach ($select1 as $row){
                echo "<li>";
                echo "<img src=\"images/".$row['id'].".jpg\" class=\"img_li\">";
                echo "<div class=\"info1\">";
                echo "<font style='font-size: 12px;color:black;'>Book ID：{$row['id']}</font><br>";
                echo "<font style='font-size: 12px;color:black;'>Book Name：{$row['name']}</font><br>";
                echo "<font style='font-size: 12px;color:black;'>Author：{$row['author']}</font><br>";
                if(in_array($row['id'],$arr)){
                    echo "<font style='color: #1E90FF'>借出&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";
                }else if (in_array($row['id'],$arr2)){
                    echo "<font style='color: #DC143C'>逾期未归&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";
                } else{
                    echo "<font style='color: #3CB371'>在馆&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";
                }
                $id = $row['id'];
                echo "<font><a href='detailInfo.php?book_id=$id'>详情</a></font>";
                echo "</div>";
                echo "</li>";
                if($count>12){
                    $count=0;
                }else{
                    $count++;
                }
            }
        ?>
    </ul>
</div>
<div class="page_nav">
<?php
$string = <<<EOT
<div class="layui-box layui-laypage layui-laypage-molv" id="layui-laypage-1">

            <a href="javascript:" class="layui-laypage-first" data-page="0">首页</a>
            <a href="javascript:" class="layui-laypage-pre" data-page="2">上一页</a>
            <a href="javascript:" class="layui-laypage-next" data-page="2">下一页</a>
            <a href="javascript:" class="layui-laypage-last" data-page="2">末页</a>
</div>
EOT;
echo $string;
?>
</div>
</div>



