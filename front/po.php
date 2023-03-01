<div>
    目前位置 <span id="type">健康新知</span>
</div>
<fieldset style="display: inline-block;vertical-align:top">
<legend>分類網誌</legend>
<?php
foreach($News->type as $key =>$type ){
?>
<a href="#" class="type" data-type="<?=$key;?>" style="display:block;">
    <?=$type;?>
</a>
<?php
}
?>
</fieldset>

<fieldset style="display: inline-block; width:75%">
<legend>文章列表</legend>
<div id="content"></div>
</fieldset>
<script>
    getlist(1);
    $(".type").on("click",function(){
$("#type").text($(this).text());
getlist($(this).data("type"));
    })

    function getlist(type){
        $.get("./api/get_list.php",{type},(list) => {
            // list=JSON.parse(list)
            $("#content").html(list);
            
        })
    }
    function getnews(id){
        $.get("./api/get_news.php",{id},(news)=>{
            $("#content").html(news);
        })
        
    }
</script>