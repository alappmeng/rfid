<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<link href="<?php echo $this->scope["TPL"];?>/css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->scope["TPL"];?>/js/jquery-2.0.3.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["TPL"];?>/js/work_out.js"></script>
<body>
<div id="map">
	<span class='title'>下井作业</span>
</div>
<div>
			<h2 style='float:left;margin:10px 0 20px 0'>作业状态:
					<b style='color:red;'>起出作业</b>
			</h2>
			<p style='clear:both;float:left;margin-left:200px;'>
				<input type="text" name="epc" value="" id='epc' style='width:400px;height:35px;'/>
				<input type='button' id='single' value="扫描" class='green' style="height:35px;width:100px;"/>
				<span id='notice' class='notice'>(*点击扫描或者直接输入钻具编号实现核对操作)</span>
			</p>
			<p style='height:30px;float:left;margin-top:50px;margin-left:200px;display:none;' id='operate'>
			<span style='margin-right:20px;'>本次下井深度:<input type='text' id='len' style='width:160px;height:30px;'/>m</span>
				<input type='button' id='ensure' class='btn' value='确认出井'/>
				<input type='button' id='error' class='btn' value='取消出井'/>
			</p>
			<p style='height:30px;'></p>
</div>
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>