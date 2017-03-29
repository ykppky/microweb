    </div>
        <div class="copyright" style="padding: 0px;float:inherit;margin:25px">
        叶锟鹏毕设作品
    </div>
<div class="top_bar" style="-webkit-transform:translate3d(0,0,0)">
	<nav>
	<ul id="top_menu" class="top_menu" <?php if($authority){ echo "style='display:none'";} ?>>
		<li><a href="<?php echo base_url() ?>"><img src="common/application/images/plugmenu6.png"><label>首页</label></a></li>
		<li><a href="tel:<?php echo $baseinfos['phone'] ?>"><img src="common/application/images/plugmenu1.png"><label>一键拨号</label></a></li>
		<li><a href="javascript:void(0);" onclick="showmap('<?php echo $baseinfos['address'];?>','<?php echo $baseinfos['name'];?>','<?php echo $baseinfos['phone'];?>')"><img src="common/application/images/plugmenu3.png"><label>一键定位</label></a>
		</li>
	</ul>
	</nav>
</div>
<script>
	function showmap(address,name,phone) {
		layer.open({
            type: 2,
            title: '一键定位',
            shadeClose: true,
            shade: 0.3,
            area: ['100%', '88%'],
            content:"index.php/welcome/bdMap?address="+address+"&name="+name+"&phone="+phone //iframe的url
        });
	}
</script>
</body>
</html>