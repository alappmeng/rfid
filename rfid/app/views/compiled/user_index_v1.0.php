<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<link href="<?php echo $this->scope["TPL"];?>/css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->scope["TPL"];?>/js/jquery-2.0.3.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["TPL"];?>/js/public.js"></script>
<body>
<div id="map">
	<span class='title'>用户分类列表</span>
</div>
<div id="content" style="text-align:center;">
	<a class="btn-small-f btn-mini btn-info" style="float:right;" href="/user/add">+</a>
	<table id="table" class='table table-striped table-bordered'>
		<thead>
			<tr>
				<th>用户名</th>				
				<th>角色</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<!-- 有信息的展示 没信息的增加一个 添加功能栏 -->
			<?php if ((isset($this->scope["data"]) ? $this->scope["data"] : null)) {
?>
				<?php 
$_fh0_data = (isset($this->scope["data"]) ? $this->scope["data"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['child'])
	{
/* -- foreach start output */
?>
					<tr>
						<td>
							<?php echo $this->scope["child"]["username"];?>

						</td>
						<td>
							<?php echo $this->scope["child"]["rname"];?>

						</td>
					<td>
					<a class='btn btn-small-f edit' href="/user/edit/sid/<?php echo $this->scope["child"]["sid"];?>">编辑</a>
					<a class='btn btn-small-f del'  href="/user/delete/sid/<?php echo $this->scope["child"]["sid"];?>">删除</a>
					</td>
					</tr>
				<?php 
/* -- foreach end output */
	}
}?>

			<?php 
}
else {
?>
			<h2>暂时没有任何管理员，请点击<a href="/user/add">添加管理员</a></h2>
			<?php 
}?>

		</tbody>
	</table>
</div>
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>