<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/del_acc.php" method="post">
    <table class="ct">
        <?php
        $rows=$User->all();
        foreach($rows as $row){
        ?>
        <tr>
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>
        <tr>
            <td><?=$row['acc'];?></td>
            <td><?=str_repeat("*",strlen($row['pw']));?></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
        </tr>
        <?php
        };
        ?>
    </table>
    <div>
        <input type="submit" value="確認清除">
        <input type="reset" value="清空選取">
    </div>
    </form>

    <div>
        *請設定你要註冊的帳號及密碼(最長12字元)
    </div>
    <table>
        <tr>
            <td>step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td><button onclick="reg()">註冊</button>
            <button onclick="reset()">清除</button>
        </td>
        </tr>
    </table>
</fieldset>


<script>
    function reset(){
        $("#acc,#pw,#pw2,#email").val('')
    }
    
    function reg(){
        let user={
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            pw2:$("#pw2").val(),
            email:$("#email").val()
        }
        if(user.acc==='' || user.pw==='' || user.pw2==='' || user.email===''){
alert('不可以有空白')
        }else{
            if(user.pw==user.pw2){
                $.post('./api/chk_acc.php',user,(result)=>{
                    if(parseInt(result)===1){
                        alert('帳號重複')
                    }else{
                        $.post('./api/reg.php',user,()=>{
                          location.reload()
                        })
                    }
                })
            }else{
                alert('密碼錯誤')

            }
        }
        }

    
</script>