<?php
session_start();
?>
<?php

include('database_connection.php');



if(!isset($_SESSION['malogin']))
{
	header("location:../../../index.php");
}

?>

<html>  
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Trò Chuyện Trực Tuyến</title>  
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="../../sailor/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../sailor/css/cubeportfolio.min.css" rel="stylesheet" />
		<link href="../../sailor/css/style.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    </head>  
    <body>  
    	<header >
			<div class="navbar-default" style="background-color: #88B77B">
				<div class="container">
					<div><h4 style="color: white">📞 <a href="tel:0123456789" style="color: white">0123456789</a> - <a href="tel:0123555589" style="color: white">0123555589</a> 
						📧 <a href="mailto:info@dhcn.com" style="color: white">info@dhcn.com</a></h4></div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">

						</ul>
					</div>
				</div>		
			</div>	
		</header>
        <div class="container">
			<br/>			
			<h3 align="center">Trò Chuyện Trực Tuyến</h3><br/>
			<br />
			<div class="row">
				<div class="col-md-8 col-sm-6">					
				</div>
				<div class="col-md-2 col-sm-3">
					<input type="hidden" id="is_active_group_chat_window" value="no" />
					<button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">Trò Chuyện Nhóm</button>
				</div>
				<div class="col-md-2 col-sm-3">
					<p align="right"><a href="javascript:history.go(-1)">Quay Về</a></p>
				</div>
			</div>
			<div class="table-responsive">				
				<div id="user_details"></div>
				<div id="user_model_details"></div>
			</div>
			<br />
			<br />			
		</div>
<style>
.chat_message_area
{
	position: relative;
	width: 100%;
	height: auto;
	background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#group_chat_message
{
	width: 100%;
	height: auto;
	min-height: 80px;
	overflow: auto;
	padding:6px 24px 6px 12px;
}

.image_upload
{
	position: absolute;
	top:3px;
	right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}

</style>  

<div id="group_chat_dialog" title="Trò Chuyện Nhóm">
	<div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

	</div>
	<div class="form-group">
		<!--<textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>!-->
		<div class="chat_message_area">
			<div id="group_chat_message" contenteditable class="form-control">
			</div>
			<div class="image_upload">
				<form id="uploadImage" method="post" action="upload.php">
					<label for="uploadFile"><img src="upload.png" /></label>
					<input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
				</form>
			</div>
		</div>
	</div>
	<div class="form-group" align="right">
		<button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Gửi</button>
	</div>
</div>


<script>  
$(document).ready(function()
{

	fetch_user();
	setInterval(function(){
		update_last_activity();
		fetch_user();
		update_chat_history_data();
		fetch_group_chat_history();
	}, 3000);
	

	function fetch_user()
	{
		$.ajax({
			url:"fetch_user.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}

	function update_last_activity()
	{
		$.ajax({
			url:"update_last_activity.php",
			success:function()
			{

			}
		})
	}

	function make_chat_dialog_box(to_user_id, to_user_name)
	{
		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="Bạn đang trò chuyện với '+to_user_name+'">';
		modal_content += '<div style="height:400px;border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Gửi</button></div></div>';
		$('#user_model_details').html(modal_content);
	}	
	$(document).on('click','.start_chat', function(){
		
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
		make_chat_dialog_box(to_user_id, to_user_name);
		$("#user_dialog_"+to_user_id).dialog({			
			autoOpen:false,
			width:400				
		});		
		$('#user_dialog_'+to_user_id).dialog('open');		
		$(".chat_history").animate({ scrollTop: $(document).height() + 9999 },1000);
		$(".user_dialog").keyup(function(event){
			if(event.keyCode =='13')
			{
				$(".send_chat").click();
			}
		});		
	});

	$(document).on('click', '.send_chat', function(){
		var to_user_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+to_user_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					$('#chat_message_'+to_user_id).val('');					
					$('#chat_history_'+to_user_id).html(data);
					$(".chat_history").animate({ scrollTop: $(document).height() + 9999 },1000);
				}
			})
		}
		else
		{
			alert('Hãy nhập gì đó ...');
		}
	});

	function fetch_user_chat_history(to_user_id)
	{
		$.ajax({
			url:"fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#chat_history_'+to_user_id).html(data);
			}
		})
	}

	function update_chat_history_data()
	{
		$('.chat_history').each(function(){
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history(to_user_id);			
		});
		$(".chat_history").animate({ scrollTop: $(document).height() + 9999 },1000);
	}

	$(document).on('click', '.ui-button-icon', function(){
		$('.user_dialog').dialog('destroy').remove();
		$('#is_active_group_chat_window').val('no');
	});

	$(document).on('focus', '.chat_message', function(){
		var is_type = 'yes';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{

			}
		})
	});

	$(document).on('blur', '.chat_message', function(){
		var is_type = 'no';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{
				
			}
		})
	});

	$('#group_chat_dialog').dialog({
		autoOpen:false,
		width:400
	});

	$('#group_chat').click(function(){
		$('#group_chat_dialog').dialog('open');
		$('#is_active_group_chat_window').val('yes');
		fetch_group_chat_history();
		$("#group_chat_history").animate({ scrollTop: $(document).height() + 9999 },1000);
	});
	$("#group_chat_dialog").keyup(function(event){
			if(event.keyCode =='13')
			{
				$("#send_group_chat").click();
			}
		});

	$('#send_group_chat').click(function(){
		var chat_message = $.trim($('#group_chat_message').html());
		var action = 'insert_data';

		if(chat_message != '')
		{
			$.ajax({
				url:"group_chat.php",
				method:"POST",
				data:{chat_message:chat_message, action:action},
				success:function(data){
					$('#group_chat_message').html('');
					$('#group_chat_history').html(data);
					$("#group_chat_history").animate({ scrollTop: $(document).height() + 9999 },1000);
				}
			})
		}
		else
		{
			alert('Hãy nhập gì đó ...');
		}
	});

	function fetch_group_chat_history()
	{
		var group_chat_dialog_active = $('#is_active_group_chat_window').val();
		var action = "fetch_data";
		if(group_chat_dialog_active == 'yes')
		{
			$.ajax({
				url:"group_chat.php",
				method:"POST",
				data:{action:action},
				success:function(data)
				{
					$('#group_chat_history').html(data);
				}
			})
		}
	}

	$('#uploadFile').on('change', function(){
		$('#uploadImage').ajaxSubmit({
			target: "#group_chat_message",
			resetForm: true
		});
	});

	$(document).on('click', '.remove_chat', function(){
		var chat_message_id = $(this).attr('id');
		if(confirm("Bạn có muốn gỡ bỏ tin nhắn này?"))
		{
			$.ajax({
				url:"remove_chat.php",
				method:"POST",
				data:{chat_message_id:chat_message_id},
				success:function(data)
				{
					update_chat_history_data();
				}
			})
		}
	});
	
});  
</script>
<footer style="background-color: #457347">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
						<h4 style="color: white">Thông tin liên hệ :</h4>
						<p >
	                    <h4 style="color: white">
	                    	🏢 12 Nguyễn Văn Bảo,Phường 4, Quận Gò Vấp, Tp.Hồ Chí Minh<br><br>
							📞 <a href="tel:0123456789" style="color: white">0123456789</a> - <a href="tel:0123555589" style="color: white">0123555589</a> <br><br>
							📧 <a href="mailto:info@dhcn.com" style="color: white">info@dhcn.com</a>
	                    </h4>                      
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div>
						<h4 style="color: white">Thời gian làm việc : </h4>
						<p >
	                    <h4 style="color: white"> 
	                    	📅 Thứ 2 – Thứ 6 :  8h00AM – 17h00PM<br><br>
							📅 Thứ 7 :  8h00AM – 14h00PM<br>						
	                    </h4>
						</p>
					</div>
				</div>
			</div>
		</div>
		</footer>
		<footer style="background-color: black;height: 135px" >
		<div class="container">			
			<div class="row">
				<h4 style="color: green; text-align: center;">Copyright © 2021 - Phát triển bởi Lê Lương Sơn - Mai Hữu Tường</h4>					
			</div>		
		</div>
		</footer>		
    </body>  
</html>