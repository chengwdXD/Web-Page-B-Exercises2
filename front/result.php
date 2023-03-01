<style>
    .line{
        width: 70%;     
        display: inline-block;
        background-color: #ccc;
        height: 20px;
        
    }
    .num{
        display: inline-block;
        max-width: 25%;
    }
</style>
<?php
$subject = $Que->find($_GET['id']);
$options = $Que->all(['parent' => $_GET['id']]);
?>
<fieldset>
    <legend>問卷調查:<?= $subject['text']; ?></legend>

    <h3><?= $subject['text']; ?></h3>
    <table>
        <?php
    foreach ($options as $k => $opt) {
        $tt = ($subject['count'] == 0) ? 1 : $subject['count'];
        $rate = round($opt['count'] / $tt, 2);
        ?>
        <tr>
            <td width="50%"><?=($k+1);?>.<?=$opt['text'];?></td>
            <td width="50%">
                <div class="line" style="width:<?($rate*70);?>%"> </div>
                
                <div class="num"><?=$opt['count'];?>票(<?=$rate*100;?>%)</div>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    <div class="ct">
        <button onclick="location.href='index.php?do=que'">返回</button>
    </div>

</fieldset>