$(function()
{
	var notice=$("#notice"),
		clickBtn=true;
	var ajaxPost={
		type:"POST",
		url:"/work/outCheck",
		success:function($data)
		{
			//将反馈信息显示页面、
			$data=JSON.parse($data);
			if($data.status=='success')
			{
				clickBtn=true;
				notice.removeClass().addClass('green');
				notice.text('钻具符合出井条件!');
				$("#operate").show();
			}else{
				clickBtn=true;
				notice.removeClass().addClass('error');
				notice.text($data.info);
				setTimeout(function()
					{
						$("#single").removeClass("geny").addClass("green");
						$("#epc").val("");
					},1000);
			}
		}
	};
	var ajaxOut={
		type:"POST",
		url:"/work/outAjaxUpdate",
		success:function($data)
		{
			var href=window.location.href;
			//成功刷新一次页面
			setTimeout(function()
			{
				window.location.href=href;
			},1500);
		}
	};
	var setting={
		type:"POST",
		url:"/dril/reader",
		data:"num=1",
		success:function($data)
		{
			var $data=JSON.parse($data);
			if($data.status=="error")
			{
				clickBtn=true;
				if($data.msg)
				{
					$("#epc").val($data.msg);
				}else{
					$("#epc").val("操作过于频繁,稍后再试!");
				}
				//$("#single").removeClass("geny").addClass("green");
				setTimeout(function()
					{
						$("#epc").val("");
						$("#single").removeClass("geny").addClass("green");
					},1000);
			}else if($data.status=="success")
			{
				var info=$data['epc'];
				$("#epc").val("");
				$("#epc").val(info);
				//发送ajax判断当前epc是否符合条件、
				ajaxPost['data']="epc="+info;
				$.ajax(ajaxPost);
			}else{
				$("#epc").val("设备连接超时,正重新连接...,请稍候..");
				setTimeout(function()
					{
						$("#notice").hide("slow");
					},3000);
		}
	}
}
	//点击扫描先进行判断、
	$("#single").click(function()
	{
		var epc=$("#epc").val();
		//判断此时 所有的钻具是否已经符合条件、或者隔一秒刷新 判断是否核对完成、
		if(epc)
		{
			ajaxPost['data']="epc="+epc;
			$.ajax(ajaxPost);
		}else{
			$("#epc").val("");
			clickBtn=false;
			$(this).removeClass("green").addClass("geny");
			$.ajax(setting);
		}
	})
	$("#ensure").click(function()
	{
		var epc=$("#epc").val();
		var sort=$("#operate").attr("sort");
		var len=$("#len").val();
		if(len=='' || typeof(len)=='undefined')
		{
			alert('请填写本次下井的下井深度!');
			return false;
		}
		if(!(/\d+/.test(len)))
		{
			alert('下井深度必须为数字!');
			return false;
		}
		notice.removeClass().addClass('green');
		notice.text("您已确认出井本钻具!");
		ajaxOut['data']="epc="+epc+"&len="+len;
		$.ajax(ajaxOut);
	})
	$("#error").click(function()
	{
		notice.removeClass().addClass('error');
		notice.text("您已放弃出井本钻具!");
		var href=window.location.href;
			//成功刷新一次页面
		setTimeout(function()
			{
				window.location.href=href;
			},1500);
	})
})