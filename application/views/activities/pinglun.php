

<div class="tchubox">
	<form action="pinglun" method="post" >
        <table>
            <tr><input name="id" id="id"  type="hidden" value="<?php echo $id?>"></tr>
            <tr>
            <td style="text-align: center;"><textarea placeholder="输入文本" name="comment" id="comment"  type="text" style="width: 280px;height: 50px;"></textarea></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
            <td><center><input class="submit" onclick="return sub()" type="submit" value="提交" style="height: 30px;width: 60px"></center></td>
            </tr>
        </table>	
	</form>
</div>
<script type="text/javascript">
    function sub(){
        if(document.getElementById("comment").value){
            if(document.getElementById("comment").value.length < 5){
                alert("评论少于5个字，请重填");
                return false;
            }
            return true;
        }else{
            alert("请填写评论");
            return false;
            }
    };
</script>