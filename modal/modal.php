<?php  
date_default_timezone_get();      
include('connection.php');
$action = $_POST['action'];
switch($action){
	case "registration":
	registration();
	break;	
	case "user_list":
	user_list();
	break;
	case "mainboardBucketcreate":
	mainboardBucketcreate();
	break;
	case "update_bucket":
	update_bucket();
	break;
	case "personBucketcreate":
	personBucketcreate();
	break;
	case "tagBucketcreate":
	tagBucketcreate();
	break;	
	case "tagBucketshow":
	tagBucketshow();
	break;
	case "tagBucketshow12345":
	tagBucketshow12345();
	break;
	case "main_bucket_list":
	main_bucket_list();
	break;	
	case "add_content_bucket":
	add_content_bucket();
	break;	
	case "Initlogin":
	Initlogin();
	break;
	case "userlogin":
	userlogin();
	break;
	case "logout_call":
	logoutshow();
	break;
	case "tag_block_list":
	tag_block_list();
	break;
	case "Tag_add_content_bucket":
	Tag_add_content_bucket();
	break;
	case "archived_add_content_bucket":
	archived_add_content_bucket();
	break;
	case "archived_block_list":
	archived_block_list();
	break;
	case "person_add_content_bucket":
	person_add_content_bucket();
	break;
	case "person_block_list":
	person_block_list();
	break;
	case "sort_clients":
	sort_clients();
	break;
	case "metaBucketshow":
	metaBucketshow();
	break;
	case "calender_list":
	calender_list();
	break;
	case "calender_list_person":
	calender_list_person();
	break;
	case "change_block_status":
	change_block_status();
	break;
	case "notification_bucket":
	notification_bucket();
	break;
	case "delete_block_fun":
	delete_block_fun();
	break;
	case "delete_Tagblock_fun":
	delete_Tagblock_fun();
	break;
	case "edit_main_block_action":
	edit_main_block_action();
	break;
	case "filter_data_by_tags":
	filter_data_by_tags();
	break;
	case "sort_people":
	sort_people();
	break;
	case "create_block_user":
	create_block_user();
	break;
	case "star_block_perosn":
	star_block_perosn();
	break;
	case "delete_perblock_fun":
	delete_perblock_fun();
	break;
	case "star_block_tag":
	star_block_tag();
	break;
	case "delete_block_person":
	delete_block_person();
	break;
	case "delete_block_person1":
	delete_block_person1();
	break;
	case "notification_bucket_person":
	notification_bucket_person();
	break;
	case "notification_bucket_person_date":
	notification_bucket_person_date();
	break;
	case "mark_as_done":
	mark_as_done();
	break;
	case "delete_blockTag_fun":
	delete_blockTag_fun();
	break;
	case "delete_blockarch_fun":
	delete_blockarch_fun();
	break;
	case "calender_list_mastertag":
	calender_list_mastertag();
	break;
	case "calender_list_arch":
	calender_list_arch();
	break;
	case "mark_as_done_person":
	mark_as_done_person();
	break;
	case "edit_person_block_action":
	edit_person_block_action();
	break;
	case "edit_arch_block_action":
	edit_arch_block_action();
	break;
	case "delete_bucket_fun":
	delete_bucket_fun();
	break;
	case "mark_all_done":
	mark_all_done();
	break;
	case "lock_unlock_bucket":
	lock_unlock_bucket();
	break;
	case "hide_show_bucket":
	hide_show_bucket();
	break;
	case "filter_data_by_dates":
	filter_data_by_dates();
	break;
	case "hide_notify":
	hide_notify();
	break;
	case "edit_master":
	edit_master();
	break;
	case "update_drag":
	update_drag();
	break;
	case "undo_block_data":
	undo_block_data();
	break;
	case "tagg_bucket_function":
	tagg_bucket_function();
	break;
	case "calender_list_time":
	calender_list_time();
	break;
	case "assign_user":
	assign_user();
	break;	
	case "archived_block_function":
	archived_block_function();
	break;	
	case "block_sort":
	block_sort();
	break;
	case "edit_files":
	edit_files();
	break;
	case "boards_show":
	boards_show();
	break;	
	case "board_add":
	board_add();
	break;	
	case "board_session":
	board_session();
	break;	
	case "board_dis":
	board_dis();
	break;	
	case "board_nadd":
	board_nadd();
	break;	
	case "str_con_not":
	str_con_not();
	break;	
	case "ath_link":
	ath_link();
	break;	
	case "str_convr":
	str_convr();
	break;	
	case "del_board":
	del_board();
	break;	
	case "board_save":
	board_save();
	break;	
	case "file_name_data":
	file_name_data();
	break;
}

function main_bucket_list(){
	global $con;	
	if(!empty($_SESSION['board_id'])){
	$board_id = $_SESSION['board_id'];
	$query="select * from fb_buckets where board_id= $board_id";
	$bucket_list = array();
	$bucket_data1 = array();
	$bucket_data12 = array();
	$bucket_data1231 = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query1)){
		$id = $rows['Id'];
		$rows['bucket_con'] = [];
		$query_b="select * from fb_blocks where bucket_id=$id && status=1 ORDER BY sort";
		$query_b1 = mysqli_query($con,$query_b);
		unset($bucket_data);
		while($rows1 = mysqli_fetch_array($query_b1)){
			$create_date=date("Y-m-d");
			$task_deadline_date = $rows1['task_deadline_date'];
			$datetime1 = date_create($create_date);
			$datetime2 = date_create($task_deadline_date);
			$interval = date_diff($datetime1, $datetime2);
			$date_df=$interval->format('%R%a days');

			if($date_df<=5){
				$rows1['date_diff']=1;

			}elseif ($date_df>5) {
				$rows1['date_diff']=2;
			}

			$colm = $rows1['master_tag_id'];
			if($colm != null){				
				$colm1 = (explode(",",$colm));
				if($colm1 != null){
					$q = "select color,title from fb_tag_blocks where id=$colm1[0]";
					$b1 = mysqli_query($con,$q);
					while($rows01 = mysqli_fetch_array($b1)){
						$rows1['color1'] = $rows01;
					}
				}
			}else{}

			$colmt = $rows1['meta_tag_id'];
			if($colmt != null){
				$colmt1 = (explode(",",$colmt));
				$rows1['meta'] = $colmt1 ;
				unset($bucket_data1);
				$i =0;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$rows1['colors']=$bucket_data1;
						$i++;
					}
				}
			}else{}

			unset($bucket_data123);
			$bucket_data123 = [];
			$id_r1 = $rows1['id'];
			if($id_r1 != null){
				$query_r1="select * from fb_block_files where block_id=$id_r1 AND board_id = '$board_id'";
				$query_r12 = mysqli_query($con,$query_r1);
				while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
				$rows1['file_data']=$bucket_data123;
			}else{}			

			unset($bucket_data12);
			$id21 = $rows1['user_id'];
			if($id21 != null){
				$query_u21="select id,username,profile_img,user_role from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$rows1['user_img']=$bucket_data12;
			}else{}	

			$id2 = $rows1['task_assign_user'];
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$rows1['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$rows1['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$rows1['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	

			$id23 = $rows1['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$rows1['not_user']=$bucket_data14;
				}
			}else{
				unset($bucket_data14);
				$id23 = 0;
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				$rows1['not_user']=$bucket_data14;
			}				
			$bucket_data[] = $rows1;
			$rows['bucket_con']=$bucket_data;
		}
		$bucket_list[] = $rows;
	}
	echo json_encode($bucket_list);
	}else{}
}

function user_list(){
	global $con;
	$query="select * from fb_user";
	$user_list = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_object($query1)){
		$user_list[] = $rows;
	}
	echo json_encode($user_list);
}
function registration(){
	global $con;
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$title = $_POST['title'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$telephone = $_POST['telephone'];
	$dob = $_POST['dob'];
	$user_role = $_POST['user_role'];
	$create_date=date("Y-m-d h:i:sa");
	$val12 = '';
	$img = $_FILES['file']['name'];
	$path = '../imgs/' . $img;  
    move_uploaded_file($_FILES['file']['tmp_name'], $path);

    $val = '';
    $val2 = '';
	$msg=array();
	$query_val = "SELECT username,email FROM fb_user WHERE email = '$email' OR username = '$username'";
	$res = mysqli_query($con, $query_val);

	$query_validations = "SELECT * FROM fb_per_blocks WHERE title = '$username' ";
	$validate = mysqli_query($con,$query_validations);
	while($rows = mysqli_fetch_array($validate)){ $val12 = $rows['title'];}

	while($rows = mysqli_fetch_array($res)){ $val = $rows['email']; $val2 = $rows['username'];}

	if($val == $email && $val2 == $username && $val12 == $username){
		$msg['done']='<div class="alert alert-danger"><strong>Error! </strong>Username and Email already exsist</div>';
	}else if($val == $email){
		$msg['done']='<div class="alert alert-danger"><strong>Error! </strong>Email already exsist</div>';
	}else if($val2 == $username){
		$msg['done']='<div class="alert alert-danger"><strong>Error! </strong>username already exsist</div>';
	}else if($val12 == $username){
		$msg['done']='<div class="alert alert-danger"><strong>Error! </strong>username already exsist</div>';
	}else {
		$query = "INSERT INTO fb_user(firstname,lastname,title,email,username,password,country,state,city,telephone,dob,create_date,profile_img,user_role) VALUES ('$firstname','$lastname','$title','$email','$username',MD5('".$password."'),'$country','$state','$city','$telephone','$dob','$create_date','$img ','$user_role')";
		if (mysqli_query($con, $query)) {
			$last_id=mysqli_insert_id($con);


			if($val != $username){
				$query1 = "INSERT INTO fb_per_blocks(title,description,bucket_id,user_id,create_date) VALUES ('$username','$title',5,'$last_id','$create_date')";	
			}
			else{
				$query1 = 'SELECT * FROM fb_per_blocks';
			}
			mysqli_query($con, $query1);	
			$last_id1=mysqli_insert_id($con);	
			$tagId=$last_id1.'@'.$username.'.Firebrick';
			$sql="UPDATE fb_per_blocks SET perId='$tagId'WHERE id=$last_id1";
			mysqli_query($con,$sql);
			$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
		} else {
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
		}
	}
	echo json_encode($msg);
}
function update_bucket(){
	global $con;
	$bucket = $_POST['mainboardbucketname'];
	$table= $_POST['table'];
	$id= $_POST['id'];
	$update_date=date("Y-m-d h:i:sa");
	$user_id = $_SESSION['login_user']['id'];
	$query = "UPDATE $table SET Name='$bucket',update_date='$update_date' WHERE id=$id";
		if (mysqli_query($con, $query)) {
			$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
		} else {
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
		}	
	echo json_encode($msg);	
}
function mainboardBucketcreate(){
	global $con;
	$bucket = $_POST['mainboardbucketname'];
	$table= $_POST['table'];
	$status = 1;
	$user_id = $_SESSION['login_user']['id'];
	$user_role = $_SESSION['login_user']['user_role'];
	$board_id = $_SESSION['board_id'];

	$Create_date = date("Y.m.d H:i:s");

	$val = '';
	$query_validations = "SELECT * FROM $table WHERE Name = '$bucket' AND board_id = '$board_id'";
	$validate = mysqli_query($con,$query_validations);
	while($rows = mysqli_fetch_array($validate)){ $val = $rows['Name'];}

	if($user_role != 1){
		$msg['done']='<div class="alert alert-danger"><strong>Sorry! </strong>You are not authorized for do this</div>';
	}else if($val != ''){
		$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data already Inserted</div>';
	}
	else{
		if($_SESSION['login_user']['id'] != null){
			$query = "INSERT INTO $table(Name,Status,Create_date,User_id,board_id) VALUES ('$bucket','$status','$Create_date','$user_id','$board_id')";
		}	
		if (mysqli_query($con, $query)) {
			$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
		} else {
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
		}	
	}
	echo json_encode($msg);	
}
function tagBucketcreate(){
	global $con;
	$bucket = $_POST['tagbucketname'];
	$bucket = trim($bucket,"#");
	$items = ['#641E16','#78281F','#512E5F','#4A235A','#154360','#1B4F72','#0E6251','#0B5345','#145A32','#186A3B','#7D6608','#7E5109','#784212','#6E2C00','#7B7D7D','#626567','#4D5656'];
	$status = 1;
	$Create_date = date("Y.m.d H:i:s");
	$user_id = $_SESSION['login_user']['id'];
	$client_name=$_SESSION['login_user']['username'];

	$query_validations = "SELECT * FROM fb_tag_bucket WHERE Name = '$bucket' ";
	$validate = mysqli_query($con,$query_validations);
	while($rows = mysqli_fetch_array($validate)){ $val = $rows['Name'];}

	if($val != ''){
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data already Inserted</div>';
	}
	else{
		$color =  $items[array_rand($items)];
		$query = "INSERT INTO fb_tag_bucket(Name,Status,Create_date, User_id,color) VALUES ('$bucket','$status','$Create_date', '$user_id','$color')";
		if (mysqli_query($con, $query)) {
			$last_id=mysqli_insert_id($con);
			$tagId=$last_id.'@'.$client_name.'.Firebrick';
			$sql="UPDATE fb_tag_bucket SET tagId='$tagId'WHERE Id=$last_id";
			mysqli_query($con,$sql);
			$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
		} else {
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
		}
	}
	echo json_encode($msg);	
}
function personBucketcreate(){
	global $con;
	$bucket = $_POST['personbucketname'];
	$status = 1;
	$Create_date = date("Y.m.d H:i:s");
	$user_id = $_SESSION['login_user']['id'];

	$query_validations = "SELECT * FROM fb_person_bucket WHERE Name = '$bucket' ";
	$validate = mysqli_query($con,$query_validations);
	while($rows = mysqli_fetch_array($validate)){ $val = $rows['Name'];}

	if($val != ''){
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data already Inserted</div>';
	}
	else{
		$bucket = trim($bucket,"@");
		$query = "INSERT INTO fb_person_bucket(Name,Status,Create_date, User_id) VALUES ('$bucket','$status','$Create_date','$user_id')";
		if (mysqli_query($con, $query)) {
			$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
		} else {
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
		}	
	}
	echo json_encode($msg);	
}
function tagBucketshow(){
	global $con;
	$show="select * from fb_tag_bucket ";
	$query = mysqli_query($con,$show);
	$buckets = array();
	while($rows = mysqli_fetch_assoc($query)){
		$rows['value'] = $rows['Id'];
		$rows['text'] = $rows['Name'];
		$buckets[] = $rows;
	}
	echo json_encode($buckets);
}
function tagBucketshow12345(){
	global $con;
	$show="select * from fb_tag_blocks ";
	$query = mysqli_query($con,$show);
	$buckets = array();
	while($rows = mysqli_fetch_assoc($query)){
		$rows['value'] = $rows['id'];
		$rows['text'] = '# '.$rows['title'];
		$buckets[] = $rows;
	}
	echo json_encode($buckets);
}
function add_content_bucket(){
	global $con;
	$title = $_POST['block_title'];
	$description = $_POST['block_des'];
	$master_tag_id = $_POST['master_tags_id'];
	$meta_tag_id = $_POST['meta_tags_id'];
	$task_assign_user = $_POST['task_users'];
	$bucket_id = $_POST['bucket_id'];
	$active_status = $_POST['actived_id'];
	$user_id =$_POST['login_id'];
	$task_status = 1;
	$create_date=date("Y-m-d h:i:sa");
	$task_deadline_date = $_POST['task_deadline'];
	$task_deadline_time = $_POST['task_deadline_time'];
	$due_date_status = $_POST['due_date_status'];
	$client_name=$_SESSION['login_user']['username'];
	$uid = uniqid();
	$msg=array();
	$msg1 =array();
	$board_id = $_SESSION['board_id'];
	$items = ['#E6B0AA','#F5B7B1','#D7BDE2','#D2B4DE','#A9CCE3','#AED6F1','#A3E4D7','#A2D9CE','#A9DFBF','#ABEBC6','#FAD7AO','#F5CBA7','#EDBB99','#F7F9F9','#E5E7E9','#D5DBDB','#CCD1D1','#AEB68F','#ABB2B9'];
	$i=array();
	$update_id =' ';
	$IDArray = explode(',', $meta_tag_id);
	$i=$id_dummy ='';

	foreach ($IDArray as $myA) {
		if (is_numeric($myA)) {
		} else {
			$ers = "SELECT Name FROM fb_metatag WHERE Name = '$myA'";
			$query_dummy = mysqli_query($con,$ers);
			while($rows_dummy = mysqli_fetch_array($query_dummy)){
			$id_dummy = $rows_dummy['Name'];
			}
			if($id_dummy =='' && $meta_tag_id != null){
				$color =  $items[array_rand($items)];
				$query = "INSERT INTO fb_metatag(Name,Status,Create_date,User_id,color) VALUES ('$myA','1','$create_date','$user_id ','$color')";
			mysqli_query($con, $query);
			$i .= mysqli_insert_id($con).',';
			}
			else{}
		}
	}	
	$meta_tag_id.=','.$i;
	$IDAr = explode(',', $meta_tag_id);
	$j='';
	foreach ($IDAr as $myA) {
		if (is_numeric($myA)) {
			$j .=$myA.',';
		}
	}
	$ttt=$j;
	$string = rtrim($ttt, ',');
	$title = str_replace(' ', '', $title);
	$val = $temp = '';
	if($title[0] == '@' || $title[1] == '@'){
		$title1 = trim($title,"@");
		$query_validations = "SELECT * FROM fb_per_blocks WHERE title = '$title1' ";
		$validate = mysqli_query($con,$query_validations);
		while($rows = mysqli_fetch_array($validate)){ $val = $rows['title'];}
		if($val != $title1){
			$query = "INSERT INTO fb_per_blocks(title,description,master_tag_id,meta_tag_id,task_deadline_date,task_deadline_time,due_date_status,task_assign_user,bucket_id,active_status,user_id,task_status,create_date) VALUES ('$title1','$description','$master_tag_id','$string','$task_deadline_date','$task_deadline_time','$due_date_status','$task_assign_user',4,'$active_status','$user_id','$task_status','$create_date')";
			$temp = 1;
		}
		else{
			$query = "SELECT * FROM fb_per_blocks ";
			$temp = 11;
		}
	}else if($title[0] == '#' || $title[1] == '#'){
		$title1 = trim($title,"#");
		$query_validations = "SELECT * FROM fb_tag_blocks WHERE title = '$title1' ";
		$validate = mysqli_query($con,$query_validations);
		while($rows = mysqli_fetch_array($validate)){ $val = $rows['title'];}
		if($val != $title1){
			$query = "INSERT INTO fb_tag_blocks(title,description,master_tag_id,meta_tag_id,task_deadline_date,task_deadline_time,due_date_status,task_assign_user,bucket_id,active_status,user_id,task_status,create_date) VALUES ('$title1','$description','$master_tag_id','$string','$task_deadline_date','$task_deadline_time','$due_date_status','$task_assign_user',1,'$active_status','$user_id','$task_status','$create_date')";
			$temp = 2;
		}
		else{
			$query = "SELECT * FROM fb_per_blocks ";
			$temp = 21;
		}
	}else{
		$board_id = $_SESSION['board_id'];	
		$query = "INSERT INTO fb_blocks(uid,title,description,master_tag_id,meta_tag_id,task_deadline_date,task_deadline_time,due_date_status,task_assign_user,bucket_id,active_status,user_id,task_status,create_date,board_id) VALUES ('$uid','$title','$description','$master_tag_id','$string','$task_deadline_date','$task_deadline_time','$due_date_status','$task_assign_user','$bucket_id','$active_status','$user_id','$task_status','$create_date','$board_id')";
			$temp = 3;		
	}
	if (mysqli_query($con, $query)) {
		$update_id = mysqli_insert_id($con);
		if($title[0] == '@' || $title[1] == '@'){
			$tagId=$update_id.'@'.$client_name.'.Firebrick';
			if($temp == 1){
				$sql="UPDATE fb_per_blocks SET perId='$tagId'WHERE id=$update_id";
				mysqli_query($con,$sql);
			}
		}else if($title[0] == '#' || $title[1] == '#'){
			$tagId=$update_id.'@'.$client_name.'.Firebrick';
			if($temp == 2){
				$sql="UPDATE fb_tag_blocks SET TagId='$tagId'WHERE id=$update_id";
				mysqli_query($con,$sql);
			}
		}else{
			$val = '';
			$query_validations = "SELECT * FROM fb_blocks WHERE id = '$update_id' ";
			$validate = mysqli_query($con,$query_validations);
			while($rows = mysqli_fetch_array($validate)){ $val = $rows['uid'];}
			
			$tagId=$val.'@'.$client_name.'.Firebrick';
			if($temp == 3){
				$sql="UPDATE fb_blocks SET BoardId='$tagId'WHERE id=$update_id";
				mysqli_query($con,$sql);
			}
		}
		$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
	} else {
		$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
	}


	$img = $_FILES['edit_file']['name'];
	$path = '../files/' . $img;  
    move_uploaded_file($_FILES['edit_file']['tmp_name'], $path);
    if( ! empty($img) && ($temp == 1||$temp == 2||$temp == 3)){
		$query1 = "INSERT INTO fb_block_files(name,block_id,create_date,user_id,board_id) VALUES ('$img','$update_id','$create_date','$user_id ','$board_id')";
   		mysqli_query($con, $query1);
	}

	$last_id=mysqli_insert_id($con);
	$info = 'Create Block';
	$icon = 'fa fa-table';
	$create_date=date("Y-m-d h:i:sa");
	if( $temp == 1||$temp == 2||$temp == 3){
		$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$update_id','$create_date','$user_id ','$board_id',1,'$icon')";
		mysqli_query($con,$query12);
	}
	if($temp == 1){
		$msg['done1']='Done1';
	}else if($temp == 11){
		$msg['done1']='Done11';
	}else if ($temp == 2) {
		$msg['done1']='Done2';
	}else if($temp == 21){
		$msg['done1']='Done21';
	}else if ($temp == 3) {
		$msg['done1']='Done3';
	}else {
		$msg['done1']='Done31';
	}
	echo json_encode($msg);
}
function userlogin(){
	global $con;
	$username=$_POST['username'];
	$password = $_POST['password'];
	$session_data = array();
	$login="select * from fb_user where password= MD5('".$password."') AND username='$username' limit 1";
	$query = mysqli_query($con,$login);	
	$rows = mysqli_num_rows($query);
	if ($rows == 1) {
		$result=mysqli_fetch_object($query);
		$_SESSION['login_user']['username']=$result->username; 
		$_SESSION['login_user']['fname']=$result->firstname; 
		$_SESSION['login_user']['lname']=$result->lastname; 
		$_SESSION['login_user']['id']=$result->id;
		$_SESSION['login_user']['profile_img']=$result->profile_img; 
		$_SESSION['login_user']['user_role']=$result->user_role; 
		$_SESSION['login_user']['update_date']=$result->update_date; 
		$_SESSION['login_check']=true;
		if(isset($_SESSION)){
			$create_date=date("Y-m-d h:i:sa");
			$data['main'] = array('fname'=>$_SESSION['login_user']['fname'],'id'=>$_SESSION['login_user']['id'],'username' =>$_SESSION['login_user']['username'],'profile_img'=>$_SESSION['login_user']['profile_img'],'user_role'=>$_SESSION['login_user']['user_role'],'update_date'=>$_SESSION['login_user']['update_date']);
			$time="UPDATE fb_user SET update_date = '$create_date' WHERE id =$result->id";
			mysqli_query($con,$time);

			$user_id = $_SESSION['login_user']['id'];
			$board="SELECT * FROM fb_boards WHERE user_id = '$user_id' ORDER BY id ASC LIMIT 1";
			$validate = mysqli_query($con,$board);
			while($rows = mysqli_fetch_array($validate)){ 
				$_SESSION['board_id'] = $rows['id'];
				$_SESSION['board_name'] = $rows['name'];
				$board_id = $_SESSION['board_id'];			
			}
			$board_data="SELECT * FROM fb_settings WHERE (user_id='$user_id' AND board_id='$board_id')  ORDER BY id DESC LIMIT 1";
			$validate = mysqli_query($con,$board_data);
			$some = [];
			while($rows = mysqli_fetch_array($validate)){
				$data['board_set'] = $rows;
				$some = $rows['sort'];
			}
			$data['board_sort'] = $some;
		}
	}else{
		$data['fail']='<div class="alert alert-danger"><strong>Error! </strong> user login unauthorized...</div>';
		$data['main'] = 0;
	}
	echo json_encode($data);
}
function Initlogin(){
	global $con;
	if(!empty($_SESSION['login_user'])){
		$data=array('session'=>'1','id' => $_SESSION['login_user']['id'],'username' =>$_SESSION['login_user']['username'],'profile_img' => $_SESSION['login_user']['profile_img'],'user_role'=>$_SESSION['login_user']['user_role'],'update_date'=>$_SESSION['login_user']['update_date']);
	}else{
		$data='';
	}
	echo json_encode($data);		
}
function logoutshow(){
	session_unset();
	session_destroy();
}
function Tag_add_content_bucket(){
	global $con;
	$update_id = $_POST['update_id'];
	$title = $_POST['block_title'];
	$description = $_POST['block_des'];
	$master_tag_id = $_POST['master_tags_id'];
	$meta_tag_id = $_POST['meta_tags_id'];
	$task_assign_user = $_POST['task_users'];
	$bucket_id = $_POST['bucket_id'];
	$active_status = $_POST['active_sta'];
	$user_id =$_POST['login_id'];
	$task_status =  $_POST['task_sta'];
	$board_id = 3;
	$create_date=date("Y-m-d h:i:sa");
	$task_deadline_date = $_POST['task_deadline'];
	$task_deadline_time = $_POST['task_deadline_time'];
	$due_date_status = $_POST['due_date_status'];
	$client_name=$_SESSION['login_user']['username'];
	$msg=array();
	$i=array();
	$IDArray = explode(',', $meta_tag_id);

	if($update_id){	
	
	$i='';
	$items = ['#E6B0AA','#F5B7B1','#D7BDE2','#D2B4DE','#A9CCE3','#AED6F1','#A3E4D7','#A2D9CE','#A9DFBF','#ABEBC6','#FAD7AO','#F5CBA7','#EDBB99','#F7F9F9','#E5E7E9','#D5DBDB','#CCD1D1','#AEB68F','#ABB2B9'];

	$img = $_FILES['edit_file']['name'];
	$path = '../files/' . $img;  
    move_uploaded_file($_FILES['edit_file']['tmp_name'], $path);
    if( ! empty($img)){
		$query1 = "INSERT INTO fb_block_files(name,block_id,create_date,user_id,board_id) VALUES ('$img','$update_id','$create_date','$user_id ','$board_id')";
	    mysqli_query($con, $query1);
	}

	foreach ($IDArray as $myA) {
		if (is_numeric($myA)) {
		} else {
			$ers = "SELECT Name FROM fb_metatag WHERE Name = '$myA'";
			$query_dummy = mysqli_query($con,$ers);
			while($rows_dummy = mysqli_fetch_array($query_dummy)){
			$id_dummy = $rows_dummy['Name'];
			}
			if($id_dummy=='' && $meta_tag_id != null){
				$color =  $items[array_rand($items)];
				$query = "INSERT INTO fb_metatag(Name,Status,Create_date,User_id,color) VALUES ('$myA','1','$create_date','$user_id ','$color')";
			mysqli_query($con, $query);
			$i .= mysqli_insert_id($con).',';
			}
			else{

			}
		}
	}	
	$meta_tag_id.=','.$i;
	$IDAr = explode(',', $meta_tag_id);
	$j='';
	foreach ($IDAr as $myA) {
		if (is_numeric($myA)) {
			$j .=$myA.',';
		}
	}
	$ttt=$j;
	$string = rtrim($ttt, ',');
	$query="UPDATE fb_tag_blocks SET title='$title',description='$description', master_tag_id='$master_tag_id', meta_tag_id='$string',task_assign_user='$task_assign_user', active_status='$active_status',user_id='$user_id',update_date='$update_date',task_deadline_date='$task_deadline_date',task_deadline_time='$task_deadline_time',task_status='$task_status',notify = 1  WHERE id=$update_id";
	if (mysqli_query($con, $query)) {
		$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
		$info = 'Update Block';
		$icon = 'fa fa-table';
		$create_date=date("Y-m-d h:i:sa");
		$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$update_id','$create_date','$user_id ',3,1,'$icon')";
		mysqli_query($con,$query12);
	} else {
		$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
	}


	}else{

	$items1 = ['#641E16','#78281F','#512E5F','#4A235A','#154360','#1B4F72','#0E6251','#0B5345','#145A32','#186A3B','#7D6608','#7E5109','#784212','#6E2C00','#7B7D7D','#626567','#4D5656'];
	$items = ['#E6B0AA','#F5B7B1','#D7BDE2','#D2B4DE','#A9CCE3','#AED6F1','#A3E4D7','#A2D9CE','#A9DFBF','#ABEBC6','#FAD7AO','#F5CBA7','#EDBB99','#F7F9F9','#E5E7E9','#D5DBDB','#CCD1D1','#AEB68F','#ABB2B9'];
	
	$i='';

	$val = '';
	$query_validations = "SELECT * FROM fb_tag_blocks WHERE title = '$title' ";
	$validate = mysqli_query($con,$query_validations);
	while($rows = mysqli_fetch_array($validate)){ $val = $rows['title'];}

	if($val != ''){
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data already Inserted</div>';
	}else{
		foreach ($IDArray as $myA) {
			if (is_numeric($myA)) {
			} else {
				$ers = "SELECT Name FROM fb_metatag WHERE Name = '$myA'";
				$query_dummy = mysqli_query($con,$ers);
				while($rows_dummy = mysqli_fetch_array($query_dummy)){
				$id_dummy = $rows_dummy['Name'];
				}
				if($id_dummy=='' && $meta_tag_id != null){
					$color =  $items[array_rand($items)];
					$query = "INSERT INTO fb_metatag(Name,Status,Create_date,User_id,color) VALUES ('$myA','1','$create_date','$user_id ','$color')";
				mysqli_query($con, $query);
				$i .= mysqli_insert_id($con).',';
				}
				else{

				}
			}
		}
		$meta_tag_id.=','.$i;
		$IDAr = explode(',', $meta_tag_id);
		$j='';
		foreach ($IDAr as $myA) {
			if (is_numeric($myA)) {
				$j .=$myA.',';
			}
		}
		$ttt=$j;
		$string = rtrim($ttt, ',');
		$color =  $items1[array_rand($items1)];
		$query = "INSERT INTO fb_tag_blocks(title,description,task_deadline_date,task_deadline_time,due_date_status,task_assign_user,bucket_id,active_status,user_id,task_status,create_date,color,meta_tag_id,	master_tag_id) VALUES ('$title','$description','$task_deadline_date','$task_deadline_time','$due_date_status','$task_assign_user','$bucket_id','$active_status','$user_id','$task_status','$create_date','$color','$string','$master_tag_id')";
		if (mysqli_query($con, $query)) {
			$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
		} else {
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
		}
		$last_id=mysqli_insert_id($con);
		$img = $_FILES['edit_file']['name'];
		$path = '../files/' . $img;  
	    move_uploaded_file($_FILES['edit_file']['tmp_name'], $path);

		$info = 'Create Block';
		$icon = 'fa fa-table';
		$create_date=date("Y-m-d h:i:sa");
		$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$last_id','$create_date','$user_id ',3,1,'$icon')";
		mysqli_query($con,$query12);

	    if( ! empty($img)){
		$query12 = "INSERT INTO fb_block_files(name,block_id,create_date,user_id,board_id) VALUES ('$img','$last_id','$create_date','$user_id ','$board_id')";
	    mysqli_query($con, $query12);
		}
		$tagId=$last_id.'@'.$client_name.'.Firebrick';
		$sql="UPDATE fb_tag_blocks SET TagId='$tagId'WHERE id=$last_id";
		mysqli_query($con,$sql);
	}


}
echo json_encode($msg);

}
function tag_block_list(){
	global $con;
	$query="select * from fb_tag_bucket";
	$bucket_list = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query1)){
		$id = $rows['Id'];
		$rows['bucket_con'] = [];
		$query_b="select * from fb_tag_blocks where bucket_id=$id ORDER BY sort";
		$query_b1 = mysqli_query($con,$query_b);
		unset($bucket_data);
		while($rows1 = mysqli_fetch_array($query_b1)){
			$create_date=date("Y-m-d");
			$task_deadline_date = $rows1['task_deadline_date'];
			$datetime1 = date_create($create_date);
			$datetime2 = date_create($task_deadline_date);
			$interval = date_diff($datetime1, $datetime2);
			$date_df=$interval->format('%R%a days');

			if($date_df<=5){
				$rows1['date_diff']=1;
			}elseif ($date_df>5) {
				$rows1['date_diff']=2;
			}
			$rows1['color'] =  $rows1['color'];

			$colmt = $rows1['meta_tag_id'];
			if($colmt != null){
				$colmt1 = (explode(",",$colmt));
				$rows1['meta'] = $colmt1 ;
				unset($bucket_data1);
				$i =0;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$rows1['colors']=$bucket_data1;
						$i++;
					}
				}
			}else{}

			$bucket_data123 = [];
			$id_r1 = $rows1['id'];
			if($id_r1 != null){
				$query_r1="select * from fb_block_files where block_id=$id_r1 AND board_id = 3";
				$query_r12 = mysqli_query($con,$query_r1);
				while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
				$rows1['file_data']=$bucket_data123;
			}else{}

			$bucket_data1231 = [];
			$id_r11 = $rows1['id'];
			if($id_r11 != null){
				$query_r11="select * from fb_block_files where block_id=$id_r11 AND board_id = 3 LIMIT 1";
				$query_r121 = mysqli_query($con,$query_r11);
				while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
				$rows1['file_data1']=$bucket_data1231;
			}else{}

			unset($bucket_data12);
			$id21 = $rows1['user_id'];
			if($id21 != null){			
				$query_u21="select username,profile_img from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$rows1['user_img']=$bucket_data12;
			}else{}

			$id2 = $rows1['task_assign_user'];
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$rows1['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$rows1['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$rows1['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	

			$id23 = $rows1['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$rows1['not_user']=$bucket_data14;
				}
			}else{}	

			$bucket_data[] = $rows1;
			$rows['bucket_con']=$bucket_data;
		}
		$bucket_list[] = $rows;
	}
	echo json_encode($bucket_list);
}
function archived_add_content_bucket(){
	global $con;
	$title = $_POST['block_title'];
	$description = $_POST['block_des'];
	$master_tag_id = $_POST['master_tags_id'];
	$meta_tag_id = $_POST['meta_tags_id'];
	$task_assign_user = $_POST['task_users'];
	$bucket_id = $_POST['bucket_id'];
	$active_status = $_POST['actived_id'];
	$user_id =$_POST['login_id'];
	$task_status = 1;
	$create_date=date("Y-m-d h:i:sa");
	$task_deadline_date = $_POST['task_deadline'];
	$task_deadline_time = $_POST['task_deadline_time'];
	$due_date_status = $_POST['due_date_status'];
	$client_name=$_SESSION['login_user']['username'];
	$msg=array();
	$i=array();
	$items = ['#E6B0AA','#F5B7B1','#D7BDE2','#D2B4DE','#A9CCE3','#AED6F1','#A3E4D7','#A2D9CE','#A9DFBF','#ABEBC6','#FAD7AO','#F5CBA7','#EDBB99','#F7F9F9','#E5E7E9','#D5DBDB','#CCD1D1','#AEB68F','#ABB2B9'];
	$IDArray = explode(',', $meta_tag_id);
	$i='';
	foreach ($IDArray as $myA) {
		if (is_numeric($myA)) {
		} else {
			$ers = "SELECT Name FROM fb_metatag WHERE Name = '$myA'";
			$query_dummy = mysqli_query($con,$ers);
			while($rows_dummy = mysqli_fetch_array($query_dummy)){
			$id_dummy = $rows_dummy['Name'];
			}
			if($id_dummy==''){
				$color =  $items[array_rand($items)];
				$query = "INSERT INTO fb_metatag(Name,Status,Create_date,User_id,color) VALUES ('$myA','1','$create_date','$user_id ','$color')";
			mysqli_query($con, $query);
			$i .= mysqli_insert_id($con).',';
			}
			else{

			}
		}
	}	
	$meta_tag_id.=','.$i;
	$IDAr = explode(',', $meta_tag_id);
	$j='';
	foreach ($IDAr as $myA) {
		if (is_numeric($myA)) {
			$j .=$myA.',';
		}
	}
	$ttt=$j;
	$string = rtrim($ttt, ',');
	$query = "INSERT INTO fb_arch_block_data(title,description,master_tag_id,meta_tag_id,task_deadline_date,task_deadline_time,due_date_status,task_assign_user,bucket_id,active_status,user_id,task_status,create_date) VALUES ('$title','$description','$master_tag_id','$string','$task_deadline_date','$task_deadline_time','$due_date_status','$task_assign_user','$bucket_id','$active_status','$user_id','$task_status','$create_date')";
	if (mysqli_query($con, $query)) {
		$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
	} else {
		$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
	}
	$last_id=mysqli_insert_id($con);
	$img = $_FILES['edit_file']['name'];
	$path = '../files/' . $img;  
    move_uploaded_file($_FILES['edit_file']['tmp_name'], $path);
    if( ! empty($img)){
	$query1 = "INSERT INTO fb_block_files(name,block_id,create_date,user_id) VALUES ('$img','$last_id','$create_date','$user_id ')";
    mysqli_query($con, $query1);
	}
	$tagId=$last_id.'@'.$client_name.'.Firebrick';
	$sql="UPDATE fb_arch_block_data SET BoardId='$tagId'WHERE id=$last_id";
	mysqli_query($con,$sql);
	echo json_encode($msg);
}
function archived_block_list(){
	global $con;
	$query="select * from fb_buckets ";
	$bucket_list = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query1)){
		$id = $rows['Id'];
		$rows['bucket_con'] = [];
		$query_b="select * from fb_blocks where bucket_id=$id && status=2";
		$query_b1 = mysqli_query($con,$query_b);
		unset($bucket_data);
		while($rows1 = mysqli_fetch_array($query_b1)){
			$create_date=date("Y-m-d");
			$task_deadline_date = $rows1['task_deadline_date'];
			$datetime1 = date_create($create_date);
			$datetime2 = date_create($task_deadline_date);
			$interval = date_diff($datetime1, $datetime2);
			$date_df=$interval->format('%R%a days');

			if($date_df<=5){
				$rows1['date_diff']=1;
			}elseif ($date_df>5) {
				$rows1['date_diff']=2;
			}

			$colm = $rows1['master_tag_id'];
			if($colm != null){	
				$colm1 = (explode(",",$colm));
				$q = "select color from fb_tag_blocks where id=$colm1[0]";
				$b1 = mysqli_query($con,$q);
				while($rows01 = mysqli_fetch_array($b1)){
					$rows1['color1'] = $rows01;
				}
			}else{}

			$colmt = $rows1['meta_tag_id'];
			if($colmt != null){	
				$colmt1 = (explode(",",$colmt));
				$rows1['meta'] = $colmt1 ;
				unset($bucket_data1);
				$i =0;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$rows1['colors']=$bucket_data1;
						$i++;
					}
				}
			}else{}

			$bucket_data123 = [];
			$id_r1 = $rows1['id'];
			if($id_r1 != null){	
				$query_r1="select * from fb_block_files where block_id=$id_r1 And board_id = 1";
				$query_r12 = mysqli_query($con,$query_r1);
				while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
				$rows1['file_data']=$bucket_data123;
			}else{}

			unset($bucket_data12);
			$id21 = $rows1['user_id'];
			if($id21 != null){	
				$query_u21="select id,username,profile_img,user_role from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$rows1['user_img']=$bucket_data12;
			}else{}

			$id2 = $rows1['task_assign_user'];
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$rows1['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$rows1['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$rows1['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	

			$id23 = $rows1['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$rows1['not_user']=$bucket_data14;
				}
			}else{
				unset($bucket_data14);
				$id23 = 0;
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				$rows1['not_user']=$bucket_data14;
			}	
		
		$bucket_data[] = $rows1;		
		$rows['bucket_con']=$bucket_data;
		}
		$bucket_list[] = $rows;
	}
	echo json_encode($bucket_list);
}
function person_add_content_bucket(){
	global $con;
	$update_id = $_POST['update_id'];
	$title = $_POST['block_title'];
	$description = $_POST['block_des'];
	$master_tag_id = $_POST['master_tags_id'];
	$meta_tag_id = $_POST['meta_tags_id'];
	$task_assign_user = $_POST['task_users'];
	$bucket_id = $_POST['bucket_id'];
	$active_status = $_POST['active_sta'];
	$user_id =$_POST['login_id'];
	$task_status = 0;
	$board_id = 2;
	$create_date=date("Y-m-d h:i:sa");
	$task_deadline_date = $_POST['task_deadline'];
	$task_deadline_time = $_POST['task_deadline_time'];
	$client_name=$_SESSION['login_user']['username'];

	if($update_id){
	$update_id = $_POST['update_id'];
	$block_title = $_POST['block_title'];
	$block_des = $_POST['block_des'];
	$master_tag_id = $_POST['master_tags_id'];
	$meta_tag_id = $_POST['meta_tags_id'];
	$active_status = $_POST['active_sta'];
	$user_id =$_SESSION['login_user']['id'];
	$task_assign_user = $_POST['task_users'];
	$task_status = $_POST['task_sta'];
	$update_date=date("Y-m-d h:i:sa");
	$task_deadline_date = $_POST['task_deadline'];
	$task_deadline_time = $_POST['task_deadline_time'];
	$client_name=$_SESSION['login_user']['username'];
	$msg=array();
	$i=array();

	$IDArray = explode(',', $meta_tag_id);
	$i='';
	$items = ['#E6B0AA','#F5B7B1','#D7BDE2','#D2B4DE','#A9CCE3','#AED6F1','#A3E4D7','#A2D9CE','#A9DFBF','#ABEBC6','#FAD7AO','#F5CBA7','#EDBB99','#F7F9F9','#E5E7E9','#D5DBDB','#CCD1D1','#AEB68F','#ABB2B9'];


	$img = $_FILES['edit_file']['name'];
	$path = '../files/' . $img;  
    move_uploaded_file($_FILES['edit_file']['tmp_name'], $path);
    if( ! empty($img)){
	$query1 = "INSERT INTO fb_block_files(name,block_id,create_date,user_id,board_id) VALUES ('$img','$update_id','$create_date','$user_id ','$board_id')";
    mysqli_query($con, $query1);
	}

	foreach ($IDArray as $myA) {
		if (is_numeric($myA)) {
		} else {
			$ers = "SELECT Name FROM fb_metatag WHERE Name = '$myA'";
			$query_dummy = mysqli_query($con,$ers);
			while($rows_dummy = mysqli_fetch_array($query_dummy)){
			$id_dummy = $rows_dummy['Name'];
			}
			if($id_dummy=='' && $meta_tag_id != null){
				$color =  $items[array_rand($items)];
				$query = "INSERT INTO fb_metatag(Name,Status,Create_date,User_id,'$color') VALUES ('$myA','1','$create_date','$user_id ','$color')";
			mysqli_query($con, $query);
			$i .= mysqli_insert_id($con).',';
			}
			else{

			}
		}
	}	
	$meta_tag_id.=','.$i;
	$IDAr = explode(',', $meta_tag_id);
	$j='';
	foreach ($IDAr as $myA) {
		if (is_numeric($myA)) {
			$j .=$myA.',';
		}
	}
	$ttt=$j;
	$string = rtrim($ttt, ',');
	$query="UPDATE fb_per_blocks SET title='$block_title',description='$block_des', master_tag_id='$master_tag_id', meta_tag_id='$string',active_status='$active_status',user_id='$user_id',update_date='$update_date',task_deadline_date='$task_deadline_date',task_deadline_time='$task_deadline_time',task_assign_user='$task_assign_user',notify = 1, task_status = '$task_status' WHERE id=$update_id";
	if (mysqli_query($con, $query)) {
		$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
		$info = 'Update Block';
		$icon = 'fa fa-table';
		$user_id=$_SESSION['login_user']['id'];
		$create_date=date("Y-m-d h:i:sa");			
		$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$update_id','$create_date','$user_id ',2,1,'$icon')";
		mysqli_query($con,$query12);
	} else {
		$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
	}
	}else{
	$msg=array();
	$i=array();
	$items1 = ['#641E16','#78281F','#512E5F','#4A235A','#154360','#1B4F72','#0E6251','#0B5345','#145A32','#186A3B','#7D6608','#7E5109','#784212','#6E2C00','#7B7D7D','#626567','#4D5656'];
	$items = ['#E6B0AA','#F5B7B1','#D7BDE2','#D2B4DE','#A9CCE3','#AED6F1','#A3E4D7','#A2D9CE','#A9DFBF','#ABEBC6','#FAD7AO','#F5CBA7','#EDBB99','#F7F9F9','#E5E7E9','#D5DBDB','#CCD1D1','#AEB68F','#ABB2B9'];
	$IDArray = explode(',', $meta_tag_id);
	$i='';

	$val = '';
	$query_validations = "SELECT * FROM fb_per_blocks WHERE title = '$title' ";
	$validate = mysqli_query($con,$query_validations);
	while($rows = mysqli_fetch_array($validate)){ $val = $rows['title'];}

	if($val != ''){
			$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data already Inserted</div>';
	}else{
		foreach ($IDArray as $myA) {
			$id_dummy='';
			if (is_numeric($myA)) {
			}else {
				$ers = "SELECT Name FROM fb_metatag WHERE Name = '$myA'";
				$query_dummy = mysqli_query($con,$ers);
				while($rows_dummy = mysqli_fetch_array($query_dummy)){
				$id_dummy = $rows_dummy['Name'];
				}
				if($id_dummy==''  && $meta_tag_id != null){
					$color =  $items[array_rand($items)];
					$query = "INSERT INTO fb_metatag(Name,Status,Create_date,User_id,color) VALUES ('$myA','1','$create_date','$user_id ','$color')";
				mysqli_query($con, $query);
				$i .= mysqli_insert_id($con).',';
				}
				else{}
			}
		}
		$meta_tag_id.=','.$i;
		$IDAr = explode(',', $meta_tag_id);
		$j='';
		foreach ($IDAr as $myA) {
			if (is_numeric($myA)) {
				$j .=$myA.',';
			}
		}
		$ttt=$j;
		$string = rtrim($ttt, ',');

		$title1 = trim($title,"@");
	$query = "INSERT INTO fb_per_blocks(title,description,task_deadline_date,task_deadline_time,task_assign_user,bucket_id,active_status,user_id,task_status,create_date,master_tag_id,meta_tag_id) VALUES ('$title1','$description','$task_deadline_date','$task_deadline_time','$task_assign_user','$bucket_id','$active_status','$user_id','$task_status','$create_date','$master_tag_id','$string')";
	if (mysqli_query($con, $query)) {
		$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
	} else {
		$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
	}

	$last_id=mysqli_insert_id($con);
	$img = $_FILES['edit_file']['name'];
	$path = '../files/' . $img;  
    move_uploaded_file($_FILES['edit_file']['tmp_name'], $path);
    if( ! empty($img)){
	$query1 = "INSERT INTO fb_block_files(name,block_id,create_date,user_id,board_id) VALUES ('$img','$last_id','$create_date','$user_id ','$board_id')";
    mysqli_query($con, $query1);
	}

	$last_id=mysqli_insert_id($con);
	$info = 'Create Block';
	$icon = 'fa fa-table';
	$create_date=date("Y-m-d h:i:sa");
	$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$last_id','$create_date','$user_id ',2,1,'$icon')";
	mysqli_query($con,$query12);

	$tagId=$last_id.'@'.$client_name.'.Firebrick';
	$sql="UPDATE fb_per_blocks SET perId='$tagId'WHERE id=$last_id";
	mysqli_query($con,$sql);
	}	
	}
	echo json_encode($msg);
}
function person_block_list(){
	global $con;
	$query="SELECT * FROM fb_person_bucket ORDER BY special_id DESC";
	$bucket_list = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query1)){
		$id = $rows['Id'];
		$rows['bucket_con'] = [];
		$query_b="select * from fb_per_blocks where bucket_id=$id ORDER BY sort";
		$query_b1 = mysqli_query($con,$query_b);
		unset($bucket_data);
		while($rows1 = mysqli_fetch_array($query_b1)){
			$create_date=date("Y-m-d");
			$task_deadline_date = $rows1['task_deadline_date'];
			$datetime1 = date_create($create_date);
			$datetime2 = date_create($task_deadline_date);
			$interval = date_diff($datetime1, $datetime2);
			$date_df=$interval->format('%R%a days');

			if($date_df<=5){
				$rows1['date_diff']=1;
			}elseif ($date_df>5) {
				$rows1['date_diff']=2;
			}

			$colm = $rows1['master_tag_id'];
			if($colm != null){
				$colm1 = (explode(",",$colm));
				$q = "select color from fb_tag_blocks where Id=$colm1[0]";
				$b1 = mysqli_query($con,$q);
				while($rows01 = mysqli_fetch_array($b1)){
					$rows1['color1'] = $rows01;
				}
			}else{}

			$colmt = $rows1['meta_tag_id'];
			$colmt1 = (explode(",",$colmt));
			$rows1['meta'] = $colmt1 ;
			unset($bucket_data1);
			$i =0;
			if($colmt != null){
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$rows1['colors']=$bucket_data1;
						$i++;
					}
				}
			}else{}

			$bucket_data123 = [];
			$id_r1 = $rows1['id'];
			if($id_r1 != null){			
				$query_r1="select * from fb_block_files where block_id=$id_r1 AND board_id=2";
				$query_r12 = mysqli_query($con,$query_r1);
				while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
				$rows1['file_data']=$bucket_data123;
			}else{}

			$bucket_data1231 = [];
			$id_r11 = $rows1['id'];
			if($id_r11 != null){	
				$query_r11="select * from fb_block_files where block_id=$id_r11  AND board_id=2 LIMIT 1";
				$query_r121 = mysqli_query($con,$query_r11);
				while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
				$rows1['file_data1']=$bucket_data1231;
			}else{}

			unset($bucket_data12);
			$id21 = $rows1['user_id'];
			if($id21 != null){				
				$query_u21="select username,profile_img from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$rows1['user_img']=$bucket_data12;
			}else{}

			$id2 = $rows1['task_assign_user'];
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$rows1['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$rows1['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$rows1['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	

			$id23 = $rows1['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$rows1['not_user']=$bucket_data14;
				}
			}else{}	
			$bucket_data[] = $rows1;
			$rows['bucket_con']=$bucket_data;
		}
		$bucket_list[] = $rows;
	}
	echo json_encode($bucket_list);
}
function sort_clients(){
	global $con;
	$rows1_ro123 = '';
	$id = $_POST['bucket_id'];
	$query="select Id,Name from fb_tag_bucket where Id='$id'";
	$bucket_list = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query1)){
		$id1 = $rows['Id'];
		$query_b="select * from fb_tag_blocks where bucket_id=$id1";
		$query_b1 = mysqli_query($con,$query_b);
		unset($bucket_data);
		while($rows1 = mysqli_fetch_array($query_b1)){
			$colm = $rows1['id'];
			if($colm != null){
				$colm1 = (explode(",",$colm));
				$q = "select color from fb_tag_blocks where id=$colm1[0]";
				$b1 = mysqli_query($con,$q);
				while($rows01 = mysqli_fetch_array($b1)){
					$rows1['color'] = $rows01;
				}
			}
			$colmt = $rows1['meta_tag_id'];
			if($colmt != null){			
				$colmt1 = (explode(",",$colmt));
				unset($bucket_data1);
				$i =0;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$rows1['colors']=$bucket_data1;
						$i++;
					}
				}
			}
			//$rows1['color'] = $rows1['color'];

			unset($bucket_data12);
			$id21 = $rows1['user_id'];
			if($id21 != null){
				$query_u21="select id,username,profile_img,user_role from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$rows1['user_img']=$bucket_data12;
			}else{}	


			$id2 = $rows1['task_assign_user'];
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$rows1['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$rows1['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$rows1['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	

			$id23 = $rows1['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$rows1['not_user']=$bucket_data14;
				}
			}else{
				unset($bucket_data14);
				$id23 = 0;
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				$rows1['not_user']=$bucket_data14;
			}	

			$bucket_data[] = $rows1;
			$rows['bucket_con']=$bucket_data;
		}

		$query_b_nw="select id from fb_tag_blocks where bucket_id=$id1";
		$query_b1_nw = mysqli_query($con,$query_b_nw);
		unset($bucket_data_nw);
		while($rows1_nw = mysqli_fetch_array($query_b1_nw)){
			$bucket_data_nw[]=$rows1_nw;
		}
		$bucket_list[] = $rows;
	}

	//main board
	$board_id = $_SESSION['board_id'];
	$query_ro="select * from fb_buckets WHERE board_id = $board_id;";
	$bucket_list_ro = array();
	$bucket_data1_ro = array();
	$query1_ro = mysqli_query($con,$query_ro);
	while($rows_ro = mysqli_fetch_array($query1_ro)){
		$id_ro = $rows_ro['Id'];
		$rows_ro['bucket_con'] = [];

		$data_query = array();
		unset($bucket_data_ro);

		$rows_ro['mast_id11']=$bucket_data_nw;		
		foreach($bucket_data_nw as $key){ 
			$mast_id=$key['id'];	

			$query_b_ro="select * from fb_blocks where bucket_id=$id_ro && status=1 && master_tag_id =$mast_id";
			$data_query[]=$query_b_ro;
			$query_b1_ro = mysqli_query($con,$query_b_ro);
			$i=1;
			while($rows1_ro = mysqli_fetch_array($query_b1_ro)){			
				$rows1_ro['tampp'] = '';
				if($rows1_ro['master_tag_id'] != null){				
					if($rows1_ro['master_tag_id']==$mast_id ){				
						$rows1_ro123['mas_id'] = $rows1_ro['master_tag_id'];
						$rows1_ro123['height'] = "height:".$i*(80)."px";
						$rows1_ro123['e_value'] = $i;
						$i++;
					}
				}

				$create_date_ro=date("Y-m-d");
				$task_deadline_date_ro = $rows1_ro['task_deadline_date'];

				$datetime1_ro = date_create($create_date_ro);
				$datetime2_ro = date_create($task_deadline_date_ro);
				$interval_ro = date_diff($datetime1_ro, $datetime2_ro);
				$date_df_ro=$interval_ro->format('%R%a days');

				if($date_df_ro<=5){
					$rows1_ro['date_diff']=1;
				}elseif ($date_df_ro>5) {
					$rows1_ro['date_diff']=2;
				}

				$colm_ro = $rows1_ro['master_tag_id'];
				$colm1_ro = (explode(",",$colm_ro));
				if($colm_ro != null){
					$rows1_ro['tampp'] = $rows1_ro['master_tag_id'];
					$q_ro = "select color,title from fb_tag_blocks where id=$colm1_ro[0]";
					$b1_ro = mysqli_query($con,$q_ro);
					while($rows01_ro = mysqli_fetch_array($b1_ro)){
						$rows1_ro['color1'] = $rows01_ro;
					}
				}
				$colmt_ro = $rows1_ro['meta_tag_id'];
				if($colmt_ro != null){	
					$colmt1_ro = (explode(",",$colmt_ro));
					$rows1_ro['meta'] = $colmt1_ro ;			
					unset($bucket_data1_ro);
					$i_ro =0;
					foreach ($colmt1_ro as $myA_ro) {
						if($i_ro <= 2){
							$query_u_ro="select color from fb_metatag where Id=$myA_ro";
							$query_u1_ro = mysqli_query($con,$query_u_ro);
							while($rows2_ro = mysqli_fetch_array($query_u1_ro)){
								$bucket_data1_ro[]=$rows2_ro;
							}
							$rows1_ro['colors']=$bucket_data1_ro;
							$i_ro++;
						}
					}
				}

				unset($bucket_data123_ro);
				$bucket_data123_ro = [];
				$id_r1_ro = $rows1_ro['id'];
				if($id_r1_ro != null){
					$query_r1_ro="select * from fb_block_files where block_id=$id_r1_ro and board_id = 3";
					$query_r12_ro = mysqli_query($con,$query_r1_ro);
					while($rows_r1_ro = mysqli_fetch_array($query_r12_ro)){
							$bucket_data123_ro[]=$rows_r1_ro;
						}
					$rows1_ro['file_data']=$bucket_data123_ro;
				}

				unset($bucket_data12_ro);
				$id21_ro = $rows1_ro['user_id'];
				if($id21_ro != null){
					$query_u21_ro="select username,profile_img from fb_user where id=$id21_ro";
					$query_u12_ro = mysqli_query($con,$query_u21_ro);
					while($rows2_ro = mysqli_fetch_array($query_u12_ro)){
							$bucket_data12_ro[]=$rows2_ro;
						}
					$rows1_ro['user_img']=$bucket_data12_ro;
				}

				$id2 = $rows1_ro['task_assign_user'];
				if($id2 != null){
					$IDArray = explode(',', $id2);
					$rows1_ro['task_usr']=$IDArray;
					unset($bucket_data1);
					$bucket_data1231 = [];
					foreach ($IDArray as $myA) {
						$query_u="select id,title from fb_per_blocks where id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						if(!empty($bucket_data1)){
							$rows1_ro['tasked_user']=$bucket_data1;
						}
						
						$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
						$query_r121 = mysqli_query($con,$query_r11);
						while($rows_r11 = mysqli_fetch_array($query_r121)){
							$bucket_data1231[]=$rows_r11;
						}
						if(!empty($bucket_data1231)){
							$rows1_ro['tasked_img']=$bucket_data1231;
						}
					}
				}else{}	

				$id23 = $rows1_ro['task_assign_user'];
				if($id23 != null){
					unset($bucket_data14);
					$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
					$query_u21 = mysqli_query($con,$query_u2);
					while($rows24 = mysqli_fetch_array($query_u21)){
						$bucket_data14[]=$rows24;
					}
					if(!empty($bucket_data14)){
					 	$rows1_ro['not_user']=$bucket_data14;
					}
				}else{
					unset($bucket_data14);
					$id23 = 0;
					$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
					$query_u21 = mysqli_query($con,$query_u2);
					while($rows24 = mysqli_fetch_array($query_u21)){
						$bucket_data14[]=$rows24;
					}
					$rows1['not_user']=$bucket_data14;
				}	
				$bucket_data_ro[] = $rows1_ro;
				$rows_ro['bucket_con']=$bucket_data_ro;
			}
			$rows1_ro12312[] = $rows1_ro123;			
			
		}	
		$bucket_list_ro[] = $rows_ro;
	}


	$_data = array();
	foreach (array_filter($rows1_ro12312) as $v) {
		$t = $v['mas_id'];
		$tv =  $v['e_value'];
		$a = array("mas_id"=>$t, "e_value"=>$tv);
		if (isset($_data[$v['mas_id']])) {
			$last_names = array_column($_data, 'mas_id');
			$key = array_search($v['mas_id'], $last_names);
			$data1 = array_values($_data);
			$new = $data1[$key];
			if($t == $new['mas_id'] &&  $tv >= $new['e_value']){
			  array_replace($_data[$v['mas_id']],$a);
			   $_data[$v['mas_id']] = $v;
			}
			continue;
		}
		$_data[$v['mas_id']] = $v;
	}
	$data1 = array_values($_data);

	$data['query']=$data1;
	$data['block'] = $bucket_list_ro;
	$data['sort'] = $bucket_list;
	
	echo json_encode($data);
}
function sort_people(){
	global $con;
	$id = $_POST['bucket_id'];
	$query="select * from fb_person_bucket where Id='$id' and special_id = 0";
	$bucket_list = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query1)){
		$id1 = $rows['Id'];
		$query_b="select * from fb_per_blocks where bucket_id=$id1";
		$query_b1 = mysqli_query($con,$query_b);
		unset($bucket_data);
		while($rows1 = mysqli_fetch_array($query_b1)){
			$colm = $rows1['master_tag_id'];
			if($colm != null){	
				$colm1 = (explode(",",$colm));
				$q = "select color from fb_tag_blocks where id=$colm1[0]";
				$b1 = mysqli_query($con,$q);
				while($rows01 = mysqli_fetch_array($b1)){
					$rows1['color'] = $rows01;
				}
			}

			$colmt = $rows1['meta_tag_id'];
			if($colmt != null){			
				$colmt1 = (explode(",",$colmt));
				unset($bucket_data1);
				$i =0;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$rows1['colors']=$bucket_data1;
						$i++;
					}
				}
			}

			unset($bucket_data12);
			$id21 = $rows1['user_id'];
			if($id21 != null){
				$query_u21="select id,username,profile_img,user_role from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$rows1['user_img']=$bucket_data12;
			}else{}	

			$id2 = $rows1['task_assign_user'];
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$rows1['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$rows1['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$rows1['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	

			$id23 = $rows1['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$rows1['not_user']=$bucket_data14;
				}
			}else{
				unset($bucket_data14);
				$id23 = 0;
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				$rows1['not_user']=$bucket_data14;
			}	
			$bucket_data[] = $rows1;
			$rows['bucket_con']=$bucket_data;
		}

		$query_b_nw="select id from fb_per_blocks where bucket_id=$id1";
		$query_b1_nw = mysqli_query($con,$query_b_nw);
		unset($bucket_data_nw);
		while($rows1_nw = mysqli_fetch_array($query_b1_nw)){
			$bucket_data_nw[]=$rows1_nw;
		}
		$bucket_list[] = $rows;
	}

	//main board
	$board_id = $_SESSION['board_id'];	
	$query_ro="select * from fb_buckets where board_id = '$board_id'";
	$bucket_list_ro = array();
	$bucket_data1_ro = array();
	$rows1_ro123 = array();
	$query1_ro = mysqli_query($con,$query_ro);
	while($rows_ro = mysqli_fetch_array($query1_ro)){
		$id_ro = $rows_ro['Id'];
		$rows_ro['bucket_con'] = [];

		$data_query = array();
		unset($bucket_data_ro);

		$rows_ro['mast_id11']=$bucket_data_nw;		
		foreach($bucket_data_nw as $key){ 
			$mast_id=$key['id'];	

			$query_b_ro="select * from fb_blocks where bucket_id=$id_ro && status=1 && task_assign_user LIKE ('%$mast_id%')";
			$data_query[]=$query_b_ro;
			$query_b1_ro = mysqli_query($con,$query_b_ro);
			$i=1;
			while($rows1_ro = mysqli_fetch_array($query_b1_ro)){
				$tempp = '';
				$colm_ro1 = $rows1_ro['task_assign_user'];
				$colm1_ro1 = (explode(",",$colm_ro1)); 
				foreach ($colm1_ro1 as $key1) {
					if($mast_id == $key1){
						$tempp = $key1;
					}
				}
				$rows1_ro['tampp'] = $tempp;
				if($tempp != null){				
					if($tempp==$mast_id ){				
						$rows1_ro123['mas_id'] = $tempp;
						$rows1_ro123['height'] = "height:".$i*(80)."px";
						$rows1_ro123['e_value'] = $i;
						$i++;
					}
				}

				$create_date_ro=date("Y-m-d");
				$task_deadline_date_ro = $rows1_ro['task_deadline_date'];

				$datetime1_ro = date_create($create_date_ro);
				$datetime2_ro = date_create($task_deadline_date_ro);
				$interval_ro = date_diff($datetime1_ro, $datetime2_ro);
				$date_df_ro=$interval_ro->format('%R%a days');

				if($date_df_ro<=5){
					$rows1_ro['date_diff']=1;
				}elseif ($date_df_ro>5) {
					$rows1_ro['date_diff']=2;
				}

				$colm_ro = $rows1_ro['master_tag_id'];
				$colm1_ro = (explode(",",$colm_ro));
				if($colm_ro != null){
					$q_ro = "select color,title from fb_tag_blocks where id=$colm1_ro[0]";
					$b1_ro = mysqli_query($con,$q_ro);
					while($rows01_ro = mysqli_fetch_array($b1_ro)){
						$rows1_ro['color1'] = $rows01_ro;
					}
				}
				$colmt_ro = $rows1_ro['meta_tag_id'];
				if($colmt_ro != null){	
					$colmt1_ro = (explode(",",$colmt_ro));
					$rows1_ro['meta'] = $colmt1_ro ;			
					unset($bucket_data1_ro);
					$i_ro =0;
					foreach ($colmt1_ro as $myA_ro) {
						if($i_ro <= 2){
							$query_u_ro="select color from fb_metatag where Id=$myA_ro";
							$query_u1_ro = mysqli_query($con,$query_u_ro);
							while($rows2_ro = mysqli_fetch_array($query_u1_ro)){
								$bucket_data1_ro[]=$rows2_ro;
							}
							$rows1_ro['colors']=$bucket_data1_ro;
							$i_ro++;
						}
					}
				}

				unset($bucket_data123_ro);
				$bucket_data123_ro = [];
				$id_r1_ro = $rows1_ro['id'];
				if($id_r1_ro != null){
					$query_r1_ro="select * from fb_block_files where block_id=$id_r1_ro and board_id = 3";
					$query_r12_ro = mysqli_query($con,$query_r1_ro);
					while($rows_r1_ro = mysqli_fetch_array($query_r12_ro)){
							$bucket_data123_ro[]=$rows_r1_ro;
						}
					$rows1_ro['file_data']=$bucket_data123_ro;
				}

				unset($bucket_data12_ro);
				$id21_ro = $rows1_ro['user_id'];
				if($id21_ro != null){
					$query_u21_ro="select username,profile_img from fb_user where id=$id21_ro";
					$query_u12_ro = mysqli_query($con,$query_u21_ro);
					while($rows2_ro = mysqli_fetch_array($query_u12_ro)){
							$bucket_data12_ro[]=$rows2_ro;
						}
					$rows1_ro['user_img']=$bucket_data12_ro;
				}

				$id2 = $rows1_ro['task_assign_user'];
				if($id2 != null){
					$IDArray = explode(',', $id2);
					$rows1_ro['task_usr']=$IDArray;
					unset($bucket_data1);
					$bucket_data1231 = [];
					foreach ($IDArray as $myA) {
						$query_u="select id,title from fb_per_blocks where id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						if(!empty($bucket_data1)){
							$rows1_ro['tasked_user']=$bucket_data1;
						}
						
						$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
						$query_r121 = mysqli_query($con,$query_r11);
						while($rows_r11 = mysqli_fetch_array($query_r121)){
							$bucket_data1231[]=$rows_r11;
						}
						if(!empty($bucket_data1231)){
							$rows1_ro['tasked_img']=$bucket_data1231;
						}
					}
				}else{}	

				$id23 = $rows1_ro['task_assign_user'];
				if($id23 != null){
					unset($bucket_data14);
					$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
					$query_u21 = mysqli_query($con,$query_u2);
					while($rows24 = mysqli_fetch_array($query_u21)){
						$bucket_data14[]=$rows24;
					}
					if(!empty($bucket_data14)){
					 	$rows1_ro['not_user']=$bucket_data14;
					}
				}else{
					unset($bucket_data14);
					$id23 = 0;
					$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
					$query_u21 = mysqli_query($con,$query_u2);
					while($rows24 = mysqli_fetch_array($query_u21)){
						$bucket_data14[]=$rows24;
					}
					$rows1['not_user']=$bucket_data14;
				}	
				$bucket_data_ro[] = $rows1_ro;
				$rows_ro['bucket_con']=$bucket_data_ro;
			}
			$rows1_ro12312[] = $rows1_ro123;			
			
		}	
		$bucket_list_ro[] = $rows_ro;
	}


	$_data = array();
	foreach (array_filter($rows1_ro12312) as $v) {
		$t = $v['mas_id'];
		$tv =  $v['e_value'];
		$a = array("mas_id"=>$t, "e_value"=>$tv);
		if (isset($_data[$v['mas_id']])) {
			$last_names = array_column($_data, 'mas_id');
			$key = array_search($v['mas_id'], $last_names);
			$data1 = array_values($_data);
			$new = $data1[$key];
			if($t == $new['mas_id'] &&  $tv >= $new['e_value']){
			  array_replace($_data[$v['mas_id']],$a);
			   $_data[$v['mas_id']] = $v;
			}
			continue;
		}
		$_data[$v['mas_id']] = $v;
	}
	$data1 = array_values($_data);

	$data['query']=$data1;
	$data['block'] = $bucket_list_ro;
	$data['sort'] = $bucket_list;
	
	echo json_encode($data);
}
function metaBucketshow(){
	global $con;
	$show="select * from fb_metatag ";
	$query = mysqli_query($con,$show);
	$buckets = array();
	while($rows = mysqli_fetch_assoc($query)){
		$rows['value'] = $rows['Id'];
		$rows['text'] = $rows['Name'];
		$buckets[] = $rows;
	}
	echo json_encode($buckets);
}
function calender_list(){
	global $con;
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$task_status = $_POST['task_status'];
	$bucket_value = $_POST['bucket_value'];
	$date1=date_create($from_date);
	$startDate=date_format($date1,"Y-m-d");
	$date2=date_create($to_date);
	$endDate=date_format($date2,"Y-m-d");
	$begin = new DateTime($startDate);
	$end = new DateTime($endDate);
	$interval = new DateInterval('P1D'); 
	$dateRange = new DatePeriod($begin, $interval, $end);
	$range = [];
	$buckets = array();
	$board_id = $_SESSION['board_id'];
	foreach ($dateRange as $date) {
		$d=$date->format('Y-m-d');
		if($bucket_value == 3 || $bucket_value == 1){
			$show="SELECT * FROM fb_blocks WHERE task_deadline_date='$d' AND task_status='$task_status' AND due_date_status=1 AND status = 1 AND board_id = '$board_id'";
		}
		else if($bucket_value == 4){
			$show="SELECT * FROM fb_blocks WHERE task_deadline_date='$d' AND status = 1 AND board_id = '$board_id'";
		}
		$query = mysqli_query($con,$show);
		$buckets = array();
		while($data = mysqli_fetch_array($query)){
			$create_date=date("Y-m-d");
			$task_deadline_date = $data['task_deadline_date'];
			$datetime1 = date_create($create_date);
			$datetime2 = date_create($task_deadline_date);
			$interval = date_diff($datetime1, $datetime2);
			$date_df=$interval->format('%R%a days');

			if($date_df<=5){
				$data['date_diff']=1;
			}elseif ($date_df>5) {
				$data['date_diff']=2;
			}

			$colm = $data['master_tag_id'];
			if($colm != null){
				$colm1 = (explode(",",$colm));
				$q = "select color,title from fb_tag_blocks where id=$colm1[0]";
				$b1 = mysqli_query($con,$q);
				while($rows01 = mysqli_fetch_array($b1)){
					$data['color1'] = $rows01;
				}
			}else{}

			$bucket_data123 = [];
			$id_r1 = $data['id'];
			if($id_r1 != null){
				$query_r1="select * from fb_block_files where block_id=$id_r1 AND board_id = '$board_id'";
				$query_r12 = mysqli_query($con,$query_r1);
				while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
				$data['file_data']=$bucket_data123;
			}else{}

			unset($bucket_data12);
			$id21 = $data['user_id'];
			if($id21 != null){			
				$query_u21="select username,profile_img from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$data['user_img']=$bucket_data12;
			}else{}

			$id2 = $data['task_assign_user'];
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$data['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$data['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$data['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	

			$id23 = $data['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$data['not_user']=$bucket_data14;
				}
			}else{
				unset($bucket_data14);
				$id23 = 0;
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				$data['not_user']=$bucket_data14;
			}	


			$colmt = $data['meta_tag_id'];
			if($colmt != null){		
				$colmt1 = (explode(",",$colmt));
				$data['meta'] = $colmt1 ;
				unset($bucket_data1);
				$i =0;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$data['colors']=$bucket_data1;
						$i++;
					}
				}
			}
			$buckets['con'][] = $data;
		}
		$range2[]=$buckets;
		$range[]= $date->format('Y-m-d');
		$data = array();
		$data['date'] = $range;
		$data['content'] = $range2;
	}
	echo json_encode($data);
}
function calender_list_person(){
	global $con;
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$task_status = $_POST['task_status'];
	$date1=date_create($from_date);
	$bucket_value = $_POST['bucket_value'];
	$startDate=date_format($date1,"Y-m-d");
	$date2=date_create($to_date);
	$endDate=date_format($date2,"Y-m-d");
	$begin = new DateTime($startDate);
	$end = new DateTime($endDate);
	$interval = new DateInterval('P1D'); 
	$dateRange = new DatePeriod($begin, $interval, $end);
	$range = [];
	$buckets = array();
	foreach ($dateRange as $date) {
		$d=$date->format('Y-m-d');
			if($bucket_value == 3){
				$show="select * from fb_per_blocks where task_deadline_date='$d' AND task_status='$task_status'";
			}
			else if($bucket_value == 4){
				$show="select * from fb_per_blocks where task_deadline_date='$d'";
			}
		$query = mysqli_query($con,$show);
		$buckets = array();
		while($data = mysqli_fetch_array($query)){
			$colm = $data['master_tag_id'];
			$colm1 = (explode(",",$colm));
			$q = "select color from fb_tag_bucket where Id=$colm1[0]";
			$b1 = mysqli_query($con,$q);
			while($rows01 = mysqli_fetch_array($b1)){
				$data['color1'] = $rows01;
			}

			$colmt = $data['meta_tag_id'];
			$colmt1 = (explode(",",$colmt));
			$data['meta'] = $colmt1 ;
			unset($bucket_data12);
			$id21 = $data['user_id'];
			$query_u21="select username,profile_img from fb_user where id=$id21";
			$query_u12 = mysqli_query($con,$query_u21);
			while($rows2 = mysqli_fetch_array($query_u12)){
					$bucket_data12[]=$rows2;
				}
			$data['user_img']=$bucket_data12;

			$id2 = $data['task_assign_user'];
			$IDArray = explode(',', $id2);
			unset($bucket_data1);
			foreach ($IDArray as $myA) {
				$query_u="select id,title from fb_per_blocks where id=$myA";
				$query_u1 = mysqli_query($con,$query_u);
				while($rows2 = mysqli_fetch_array($query_u1)){
					$bucket_data1[]=$rows2;
				}
				$data['tasked_user']=$bucket_data1;
			}

			$colmt = $data['meta_tag_id'];
			$colmt1 = (explode(",",$colmt));
			$data['meta'] = $colmt1 ;
			unset($bucket_data1);
			$i =0;
			foreach ($colmt1 as $myA) {
				if($i <= 2){
					$query_u="select color from fb_metatag where Id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					$data['colors']=$bucket_data1;
					$i++;
				}
			}
			$buckets['con'][] = $data;
		}
		$range2[]=$buckets;
		$range[]= $date->format('Y-m-d');
		$data = array();
		$data['date'] = $range;
		$data['content'] = $range2;
	}
	echo json_encode($data);
}
function change_block_status(){
	global $con;
	$bucket_id = $_POST['bucket_id'];
	$block_id = $_POST['block_id'];
	$table = $_POST['table'];
	$sql="UPDATE $table SET bucket_id='$bucket_id'WHERE id=$block_id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
}
function notification_bucket(){
	global $con;
	$id = $_POST['id'];
	$table = $_POST['table'];
	$update_date=date("Y-m-d h:i:sa");
	$active_status = $_POST['active_status'];
	$sql="UPDATE $table SET active_status='$active_status', update_date = '$update_date' WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($query_u);

	$bucket_id = '';
	if($table == 'fb_blocks'){
		$bucket_id = 1;
	}else if($table == 'fb_per_blocks'){
		$bucket_id = 2;
	}else if($table == 'fb_tag_blocks'){
		$bucket_id = 3;
	}else{
		$bucket_id = 0;
	}
	
	$info = ($active_status == 1)?'Starred Block':'Unstarred Block';
	$icon = 'fa fa-table';
	$user_id=$_SESSION['login_user']['id'];
	$create_date=date("Y-m-d h:i:sa");	
	$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$id','$create_date','$user_id ','$bucket_id',1,'$icon')";
	mysqli_query($con,$query12);

}

function notification_bucket_person_date(){
	global $con;
	$id = $_POST['id'];
	$active_status = $_POST['active_status'];
	$sql="UPDATE fb_per_blocks SET active_status='$active_status'WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
}
function delete_block_fun(){
	global $con;
	$id = $_POST['id'];
	$undo = $_POST['undo'];
	if($undo == 1){
	$sql="UPDATE fb_blocks SET status=$undo WHERE id=$id";
	}else{
		$sql="UPDATE fb_blocks SET status='2' WHERE id=$id";
	}
	$query_u = mysqli_query($con, $sql);
	echo json_encode($sql);

	if($undo == 1){
		$info = 'Restore Block';
	}else{
		$info = 'Archived Block';
	}
	$icon = 'fa fa-table';
	$user_id=$_SESSION['login_user']['id'];
	$create_date=date("Y-m-d h:i:sa");	
	$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$id','$create_date','$user_id ',1,1,'$icon')";
	mysqli_query($con,$query12);
	
	//$sql2 = "DELETE FROM fb_block_files WHERE block_id=$id AND board_id = 1";
	mysqli_query($con, $sql2);
}
function delete_Tagblock_fun(){
	global $con;
	$id = $_POST['id'];
	$sql="DELETE FROM fb_tag_blocks WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
}
function edit_main_block_action(){
	global $con;
	$update_id = $_POST['update_id'];
	$block_title = $_POST['block_title'];
	$block_des = $_POST['block_des'];
	$master_tag_id = $_POST['master_tags_id'];
	$meta_tag_id = $_POST['meta_tags_id'];
	$active_status = $_POST['active_sta'];
	$due_date_status = $_POST['due_date_status'];
	$user_id =$_SESSION['login_user']['id'];
	$task_status = $_POST['task_sta'];
	$g_drive = json_decode($_POST['g_drive']);
	   // $write2 = fopen(dirname(__FILE__) . '/vaibhav', "a") or die("Unable to open file!");
	   // fwrite($write2, print_r($g_drive, true));
	   // fclose($write2);
	$create_date=date("Y-m-d h:i:sa");
	$update_date=date("Y-m-d h:i:sa");
	$task_deadline_date = $_POST['task_deadline1'];
	$task_deadline_time = $_POST['task_deadline_time1'];
	$client_name=$_SESSION['login_user']['username'];
	$task_assign_user = $_POST['task_users'];
	$bucket_id = $_POST['block_status'];
	$board_id = $_SESSION['board_id'];
	$items = ['#E6B0AA','#F5B7B1','#D7BDE2','#D2B4DE','#A9CCE3','#AED6F1','#A3E4D7','#A2D9CE','#A9DFBF','#ABEBC6','#FAD7AO','#F5CBA7','#EDBB99','#F7F9F9','#E5E7E9','#D5DBDB','#CCD1D1','#AEB68F','#ABB2B9'];
	
	$img = $_FILES['edit_file']['name'];
	$ext = pathinfo($img, PATHINFO_EXTENSION);
	$ext = '.'.$ext;
	$path = '../files/' . $img;  
    move_uploaded_file($_FILES['edit_file']['tmp_name'], $path);
    if( ! empty($img)){
		$query1 = "INSERT INTO fb_block_files(name,ext,block_id,create_date,user_id,board_id) VALUES ('$img','$ext','$update_id','$create_date','$user_id ','$board_id')";
	    mysqli_query($con, $query1);
	} 

	if( ! empty($g_drive)){
		foreach($g_drive as $data){	 	   
			$query1 = "INSERT INTO fb_block_files(name,ext,block_id,create_date,user_id,board_id,url) VALUES ('$data->name','g_drive','$update_id','$create_date','$user_id ','$board_id','$data->url')";
		    mysqli_query($con, $query1);
		   //  $write2 = fopen(dirname(__FILE__) . '/vaibhav', "a") or die("Unable to open file!");
		   // fwrite($write2, print_r($query1, true));
		   // fclose($write2);
		}
	}
    
	$msg=array();
	$i=array();
	$IDArray = explode(',', $meta_tag_id);
	$i='';
	foreach ($IDArray as $myA) {
		if (is_numeric($myA)) {
		} else {
			$ers = "SELECT Name FROM fb_metatag WHERE Name = '$myA'";
			$query_dummy = mysqli_query($con,$ers);
			while($rows_dummy = mysqli_fetch_array($query_dummy)){
			$id_dummy = $rows_dummy['Name'];
			}
			if($id_dummy=='' && $meta_tag_id != null){
				$color =  $items[array_rand($items)];
				$query = "INSERT INTO fb_metatag(Name,Status,Create_date,User_id,color) VALUES ('$myA','1','$create_date','$user_id ','$color')";
			mysqli_query($con, $query);
			$i .= mysqli_insert_id($con).',';
			}
			else{

			}
		}
	}	
	$meta_tag_id.=','.$i;
	$IDAr = explode(',', $meta_tag_id);
	$j='';
	foreach ($IDAr as $myA) {
		if (is_numeric($myA)) {
			$j .=$myA.',';
		}
	}
	$ttt=$j;
	$string = rtrim($ttt, ',');
	$query="UPDATE fb_blocks SET title='$block_title',description='$block_des', master_tag_id='$master_tag_id', meta_tag_id='$string',active_status='$active_status',user_id='$user_id',update_date='$update_date',task_deadline_date='$task_deadline_date',task_deadline_time='$task_deadline_time',task_assign_user='$task_assign_user',task_status='$task_status',notify = 1,bucket_id ='$bucket_id',due_date_status='$due_date_status'  WHERE id=$update_id";
	if (mysqli_query($con, $query)) {
		$info = 'Update Block';
		$icon = 'fa fa-table';
		$user_id=$_SESSION['login_user']['id'];
		$create_date=date("Y-m-d h:i:sa");			
		$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$update_id','$create_date','$user_id ','$board_id',1,'$icon')";
		mysqli_query($con,$query12);
		$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
	} else {
		$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
	}
	echo json_encode($msg);
}
function filter_data_by_tags(){
	global $con;
	$master_tags_id = $_POST['master_tags_id'];
	$meta_tags_id = $_POST['meta_tags_id'];
	$person_tags_id = $_POST['person_tags_id'];
	$table = $_POST['table'];
	$table1 = $_POST['table1'];
	$table2 = (isset($_POST['table2'])) ? $_POST['table2'] : '';

	$bucket_data1 = [];
	if($table == 'fb_person_bucket'){
		$query="select * from $table where special_id = 0";
	}else{
		$query="select * from $table";
	}
	$bucket_list = array();
	$bucket_data1 = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query1)){
		$id = $rows['Id'];
		$rows['bucket_con'] = [];
		if($table2 == 'fb_archived_boards'){
			$query_b="select * from $table1 where bucket_id=$id && status=2";
		}else{
			$query_b="select * from $table1 where bucket_id=$id && status=1";			
		}
		if($meta_tags_id){
			$query_b.="&& meta_tag_id Like ('%$meta_tags_id%')";
		}
		if($master_tags_id){
			if($table == 'fb_tag_bucket'){
				$query_b.="&& id IN ($master_tags_id)";
			}else{
				$query_b.="&& master_tag_id IN ($master_tags_id)";
			}
		}
		if($person_tags_id){
			if($table == 'fb_person_bucket'){
				$query_b.="&& id LIKE ('%$person_tags_id%')";
			}else{
				$query_b.="&& task_assign_user LIKE ('%$person_tags_id%')";
			}
		}
		$query_b1 = mysqli_query($con,$query_b);
		unset($bucket_data);
		while($rows1 = mysqli_fetch_array($query_b1)){
			$colm = $rows1['master_tag_id'];
			if($colm != null){
				$colm1 = (explode(",",$colm));
				$q = "select color,title from fb_tag_blocks where id=$colm1[0]";
				$b1 = mysqli_query($con,$q);
				while($rows01 = mysqli_fetch_array($b1)){
					$rows1['color1'] = $rows01;
				}
			}else{}

			$colmt = $rows1['meta_tag_id'];
			unset($bucket_data1);
			$create_date=date("Y-m-d");
			$task_deadline_date = $rows1['task_deadline_date'];
			$datetime1 = date_create($create_date);
			$datetime2 = date_create($task_deadline_date);
			$interval = date_diff($datetime1, $datetime2);
			$date_df=$interval->format('%R%a days');

			if($date_df<=5){
				$rows1['date_diff']=1;

			}elseif ($date_df>5) {
				$rows1['date_diff']=2;
			}

			$i =0;
			if($colmt != null){
				$colmt1 = (explode(",",$colmt));
				$rows1['meta'] = $colmt1 ;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$rows1['colors']=$bucket_data1;
						$i++;
					}
				}
			}else{}

			unset($bucket_data12);
			$id21 = $rows1['user_id'];
			if($id21 != null){
				$query_u21="select username,profile_img from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$rows1['user_img']=$bucket_data12;
			}else{}

			$id2 = $rows1['task_assign_user'];			
			unset($bucket_data1);
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$rows1['task_usr']=$IDArray;
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
				 		$rows1['tasked_user']=$bucket_data1;
					}

					$bucket_data1231 = [];
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$rows1['tasked_img']=$bucket_data1231;
					}
				}
			}else{}

			$id23 = $rows1['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$rows1['not_user']=$bucket_data14;
				}
			}else{
				unset($bucket_data14);
				$id23 = 0;
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				$rows1['not_user']=$bucket_data14;
			}	

			$bucket_data[] = $rows1;
			$rows['bucket_con']=$bucket_data;
			$rows['query']=$query_b;
		}
		$bucket_list[] = $rows;
	}
	echo json_encode($bucket_list);
}
function filter_data_by_dates(){
	global $con;
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$task_status = $_POST['task_status'];
	$bucket_value = $_POST['bucket_value'];
	$master_tags_id = $_POST['master_tags_id'];
	$person_tags_id = $_POST['person_tags_id'];
	$meta_tags_id = $_POST['meta_tags_id'];
	$date1=date_create($from_date);
	$startDate=date_format($date1,"Y-m-d");
	$date2=date_create($to_date);
	$endDate=date_format($date2,"Y-m-d");
	$begin = new DateTime($startDate);
	$end = new DateTime($endDate);
	$interval = new DateInterval('P1D'); 
	$dateRange = new DatePeriod($begin, $interval, $end);
	$table= $_POST['table'];
	$range = [];
	$buckets = array();
	foreach ($dateRange as $date) {
		$d=$date->format('Y-m-d');
		if($bucket_value == 3){
			$show="select * from $table where (task_deadline_date='$d' AND task_status='$task_status' AND status = 1)";
			if($meta_tags_id){
				$show.="And meta_tag_id Like ('%$meta_tags_id%')";
			}
			if($master_tags_id){
				$show.="And master_tag_id IN ($master_tags_id)";
			}
			if($person_tags_id){
				$show.="&& task_assign_user LIKE ('%$person_tags_id%')";
			}
		}
		else if($bucket_value == 4){
			$show="select * from $table where (task_deadline_date='$d' AND status = 1)";
			if($meta_tags_id){
				$show.="&& meta_tag_id Like ('%$meta_tags_id%')";
			}
			if($master_tags_id){
				$show.="&& master_tag_id IN ($master_tags_id)";
			}
			if($person_tags_id){
				$show.="&& task_assign_user LIKE ('%$person_tags_id%')";
			}
		}
		$query = mysqli_query($con,$show);
		$buckets = array();
		while($data = mysqli_fetch_array($query)){
			$create_date=date("Y-m-d");
			$task_deadline_date = $data['task_deadline_date'];
			$datetime1 = date_create($create_date);
			$datetime2 = date_create($task_deadline_date);
			$interval = date_diff($datetime1, $datetime2);
			$date_df=$interval->format('%R%a days');

			if($date_df<=5){
				$data['date_diff']=1;
			}elseif ($date_df>5) {
				$data['date_diff']=2;
			}

			$colm = $data['master_tag_id'];
			if($colm != null){
				$colm1 = (explode(",",$colm));
				$q = "select color,title from fb_tag_blocks where id=$colm1[0]";
				$b1 = mysqli_query($con,$q);
				while($rows01 = mysqli_fetch_array($b1)){
					$data['color1'] = $rows01;
				}
			}else{}

			$bucket_data123 = [];
			$id_r1 = $data['id'];
			if($id_r1 != null){
				$query_r1="select * from fb_block_files where block_id=$id_r1 AND board_id = 1";
				$query_r12 = mysqli_query($con,$query_r1);
				while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
				$data['file_data']=$bucket_data123;
			}else{}

			unset($bucket_data12);
			$id21 = $data['user_id'];
			if($id21 != null){			
				$query_u21="select username,profile_img from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$data['user_img']=$bucket_data12;
			}else{}

			$id2 = $data['task_assign_user'];
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$data['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$data['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$data['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	

			$id23 = $data['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$data['not_user']=$bucket_data14;
				}
			}else{
				unset($bucket_data14);
				$id23 = 0;
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				$rows1['not_user']=$bucket_data14;
			}	


			$colmt = $data['meta_tag_id'];			
			if($colmt != null){	
			$colmt1 = (explode(",",$colmt));
			$data['meta'] = $colmt1 ;	
				unset($bucket_data1);
				$i =0;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$data['colors']=$bucket_data1;
						$i++;
					}
				}
			}
			$buckets['con'][] = $data;
		}
		$range2[]=$buckets;
		$range[]= $date->format('Y-m-d');
		$data = array();
		$data['date'] = $range;
		$data['content'] = $range2;
	}
	echo json_encode($data);
}
function create_block_user(){
	global $con;
	$user_id =$_SESSION['login_user']['id'];
	$show="select id,title from fb_per_blocks where user_id=$user_id";
	$query = mysqli_query($con,$show);
	$buckets = array();
	while($rows = mysqli_fetch_assoc($query)){
		$rows['value'] = $rows['id'];
		$rows['text'] = $rows['title'];
		$buckets[] = $rows;
	}
	echo json_encode($buckets);
}
function star_block_perosn(){
	global $con;
	$id = $_POST['id'];
	$active_status = $_POST['active_status'];
	$sql="UPDATE fb_per_blocks SET active_status='$active_status'WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
}
function delete_perblock_fun(){
	global $con;
	$id = $_POST['id'];
	$sql="DELETE FROM fb_per_blocks WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
}
function star_block_tag(){
	global $con;
	$id = $_POST['id'];
	$active_status = $_POST['active_status'];
	$sql="UPDATE fb_tag_blocks SET active_status='$active_status'WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
}
function delete_block_person(){
	global $con;
	$id = $_POST['id'];
	$sql="DELETE FROM fb_per_blocks WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
	$sql2 = "DELETE FROM fb_block_files WHERE block_id=$id AND board_id = 2";
	mysqli_query($con, $sql2);
}
function delete_block_person1(){
	global $con;
	$id = $_POST['id'];
	$sql="DELETE FROM fb_per_blocks WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
	$sql2 = "DELETE FROM fb_block_files WHERE block_id=$id AND board_id = 2";
	mysqli_query($con, $sql2);
}
function mark_as_done(){
	global $con;
	$id = $_POST['id'];
	$task_status = $_POST['task_status'];
	$table = $_POST['table'];
	$sql="UPDATE $table SET task_status='$task_status'WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
}
function delete_blockTag_fun(){ 
	global $con;
	$id = $_POST['id'];
	$sql="DELETE FROM fb_tag_blocks WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
	$sql2 = "DELETE FROM fb_block_files WHERE block_id=$id AND board_id = 3";
	mysqli_query($con, $sql2);
}
function delete_blockarch_fun(){
	global $con;
	$id = $_POST['id'];
	$board_id = $_SESSION['board_id'];
	$sql="DELETE FROM fb_blocks WHERE id=$id";
	$query_u = mysqli_query($con,$sql);

	$sql_2="DELETE FROM fb_block_stories WHERE block_id=$id AND board_id = '$board_id'";
	$query_u = mysqli_query($con,$sql_2);

	$sql_3="DELETE FROM fb_block_files WHERE block_id=$id AND board_id = '$board_id'";
	$query_u = mysqli_query($con,$sql_3);	
	echo json_encode($sql);	
}
function calender_list_mastertag(){
	global $con;
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$task_status = $_POST['task_status'];
	$bucket_value = $_POST['bucket_value'];
	$date1=date_create($from_date);
	$startDate=date_format($date1,"Y-m-d");
	$date2=date_create($to_date);
	$endDate=date_format($date2,"Y-m-d");
	$begin = new DateTime($startDate);
	$end = new DateTime($endDate);
	$interval = new DateInterval('P1D'); 
	$dateRange = new DatePeriod($begin, $interval, $end);
	$range = [];
	$buckets = array();
	foreach ($dateRange as $date) {
		$d=$date->format('Y-m-d');
			if($bucket_value == 3){
				$show="select * from fb_tag_blocks where task_deadline_date='$d' AND task_status='$task_status'";
			}
			else if($bucket_value == 4){
				$show="select * from fb_tag_blocks where task_deadline_date='$d'";
			}
		$query = mysqli_query($con,$show);
		$buckets = array();
		while($data = mysqli_fetch_array($query)){


		$create_date=date("Y-m-d");

		$task_deadline_date = $data['task_deadline_date'];

		$datetime1 = date_create($create_date);
		$datetime2 = date_create($task_deadline_date);
		$interval = date_diff($datetime1, $datetime2);
		$date_df=$interval->format('%R%a days');

		if($date_df<=5){
		$data['date_diff']=1;

		}elseif ($date_df>5) {
		$data['date_diff']=2;
		}

		$bucket_data123 = [];
			$id_r1 = $data['id'];
			$query_r1="select * from fb_block_files where block_id=$id_r1";
			$query_r12 = mysqli_query($con,$query_r1);
			while($rows_r1 = mysqli_fetch_array($query_r12)){
					$bucket_data123[]=$rows_r1;
				}
			$data['file_data']=$bucket_data123;

			unset($bucket_data12);
			$id21 = $data['user_id'];
			$query_u21="select username,profile_img from fb_user where id=$id21";
			$query_u12 = mysqli_query($con,$query_u21);
			while($rows2 = mysqli_fetch_array($query_u12)){
					$bucket_data12[]=$rows2;
				}
			$data['user_img']=$bucket_data12;

			$id2 = $data['task_assign_user'];
			$IDArray = explode(',', $id2);
			$data['task_usr']=$IDArray;
			unset($bucket_data1);
			foreach ($IDArray as $myA) {
				$query_u="select id,title from fb_per_blocks where id=$myA";
				$query_u1 = mysqli_query($con,$query_u);
				while($rows2 = mysqli_fetch_array($query_u1)){
					$bucket_data1[]=$rows2;
				}
				$data['tasked_user']=$bucket_data1;
			}

			$colm = $data['master_tag_id'];
			$colm1 = (explode(",",$colm));
			$q = "select color from fb_tag_bucket where Id=$colm1[0]";
			$b1 = mysqli_query($con,$q);
			while($rows01 = mysqli_fetch_array($b1)){
				$data['color1'] = $rows01;
			}
			$colmt = $data['meta_tag_id'];
			$colmt1 = (explode(",",$colmt));
			$data['meta'] = $colmt1 ;
			unset($bucket_data1);
			$i =0;
			foreach ($colmt1 as $myA) {
				if($i <= 2){
					$query_u="select color from fb_metatag where Id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					$data['colors']=$bucket_data1;
					$i++;
				}
			}
			$buckets['con'][] = $data;
		}
		$range2[]=$buckets;
		$range[]= $date->format('Y-m-d');
		$data = array();
		$data['date'] = $range;
		$data['content'] = $range2;
	}
	echo json_encode($data);
}
function calender_list_arch(){
	global $con;
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$task_status = $_POST['task_status'];
	$bucket_value = $_POST['bucket_value'];
	$date1=date_create($from_date);
	$startDate=date_format($date1,"Y-m-d");
	$date2=date_create($to_date);
	$endDate=date_format($date2,"Y-m-d");
	$begin = new DateTime($startDate);
	$end = new DateTime($endDate);
	$interval = new DateInterval('P1D'); 
	$dateRange = new DatePeriod($begin, $interval, $end);
	$range = [];
	$buckets = array();
	foreach ($dateRange as $date) {
		$d=$date->format('Y-m-d');
			if($bucket_value == 3){
				$show="select * from fb_arch_block_data where task_deadline_date='$d' AND task_status='$task_status'";
			}
			else if($bucket_value == 4){
				$show="select * from fb_arch_block_data where task_deadline_date='$d'";
			}
		$query = mysqli_query($con,$show);
		$buckets = array();
		while($data = mysqli_fetch_array($query)){


		$create_date=date("Y-m-d");

		$task_deadline_date = $data['task_deadline_date'];

		$datetime1 = date_create($create_date);
		$datetime2 = date_create($task_deadline_date);
		$interval = date_diff($datetime1, $datetime2);
		$date_df=$interval->format('%R%a days');

		if($date_df<=5){
		$data['date_diff']=1;

		}elseif ($date_df>5) {
		$data['date_diff']=2;
		}

		$bucket_data123 = [];
			$id_r1 = $data['id'];
			$query_r1="select * from fb_block_files where block_id=$id_r1";
			$query_r12 = mysqli_query($con,$query_r1);
			while($rows_r1 = mysqli_fetch_array($query_r12)){
					$bucket_data123[]=$rows_r1;
				}
			$data['file_data']=$bucket_data123;

			unset($bucket_data12);
			$id21 = $data['user_id'];
			$query_u21="select username,profile_img from fb_user where id=$id21";
			$query_u12 = mysqli_query($con,$query_u21);
			while($rows2 = mysqli_fetch_array($query_u12)){
					$bucket_data12[]=$rows2;
				}
			$data['user_img']=$bucket_data12;

			$id2 = $data['task_assign_user'];
			$IDArray = explode(',', $id2);
			$data['task_usr']=$IDArray;
			unset($bucket_data1);
			foreach ($IDArray as $myA) {
				$query_u="select id,title from fb_per_blocks where id=$myA";
				$query_u1 = mysqli_query($con,$query_u);
				while($rows2 = mysqli_fetch_array($query_u1)){
					$bucket_data1[]=$rows2;
				}
				$data['tasked_user']=$bucket_data1;
			}

			$colm = $data['master_tag_id'];
			$colm1 = (explode(",",$colm));
			$q = "select color from fb_tag_bucket where Id=$colm1[0]";
			$b1 = mysqli_query($con,$q);
			while($rows01 = mysqli_fetch_array($b1)){
				$data['color1'] = $rows01;
			}
			$colmt = $data['meta_tag_id'];
			$colmt1 = (explode(",",$colmt));
			$data['meta'] = $colmt1 ;
			
			unset($bucket_data1);
			$i =0;
			foreach ($colmt1 as $myA) {
				if($i <= 2){
					$query_u="select color from fb_metatag where Id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					$data['colors']=$bucket_data1;
					$i++;
				}
			}
			$buckets['con'][] = $data;
		}
		$range2[]=$buckets;
		$range[]= $date->format('Y-m-d');
		$data = array();
		$data['date'] = $range;
		$data['content'] = $range2;
	}
	echo json_encode($data);
}
function mark_as_done_person(){
	global $con;
	$id = $_POST['id'];
	$task_status = $_POST['task_status'];
	$sql="UPDATE fb_per_blocks SET task_status='$task_status'WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
}
function edit_person_block_action(){
	global $con;
	$update_id = $_POST['update_id'];
	$block_title = $_POST['block_title'];
	$block_des = $_POST['block_des'];
	$master_tag_id = $_POST['master_tags_id'];
	$meta_tag_id = $_POST['meta_tags_id'];
	$active_status = $_POST['active_sta'];
	$user_id =$_SESSION['login_user']['id'];
	$task_status = $_POST['task_sta'];
	$update_date=date("Y-m-d h:i:sa");
	$task_deadline_date = $_POST['task_deadline1'];
	$task_deadline_time = $_POST['task_deadline_time1'];
	$client_name=$_SESSION['login_user']['username'];
	$msg=array();
	$i=array();
	$IDArray = explode(',', $meta_tag_id);
	$i='';
	$items = ['#E6B0AA','#F5B7B1','#D7BDE2','#D2B4DE','#A9CCE3','#AED6F1','#A3E4D7','#A2D9CE','#A9DFBF','#ABEBC6','#FAD7AO','#F5CBA7','#EDBB99','#F7F9F9','#E5E7E9','#D5DBDB','#CCD1D1','#AEB68F','#ABB2B9'];


	$img = $_FILES['edit_file']['name'];
	$path = '../files/' . $img;  
    move_uploaded_file($_FILES['edit_file']['tmp_name'], $path);
    if( ! empty($img)){
	$query1 = "INSERT INTO fb_block_files(name,block_id,create_date,user_id,board_id) VALUES ('$img','$update_id','$create_date','$user_id ',2)";
    mysqli_query($con, $query1);
	}

	foreach ($IDArray as $myA) {
		if (is_numeric($myA)) {
		} else {
			$ers = "SELECT Name FROM fb_metatag WHERE Name = '$myA'";
			$query_dummy = mysqli_query($con,$ers);
			while($rows_dummy = mysqli_fetch_array($query_dummy)){
			$id_dummy = $rows_dummy['Name'];
			}
			if($id_dummy==''){
				$color =  $items[array_rand($items)];
				$query = "INSERT INTO fb_metatag(Name,Status,Create_date,User_id,'$color') VALUES ('$myA','1','$create_date','$user_id ','$color')";
			mysqli_query($con, $query);
			$i .= mysqli_insert_id($con).',';
			}
			else{

			}
		}
	}	
	$meta_tag_id.=','.$i;
	$IDAr = explode(',', $meta_tag_id);
	$j='';
	foreach ($IDAr as $myA) {
		if (is_numeric($myA)) {
			$j .=$myA.',';
		}
	}
	$ttt=$j;
	$string = rtrim($ttt, ',');
	$query="UPDATE fb_per_blocks SET title='$block_title',description='$block_des', master_tag_id='$master_tag_id', meta_tag_id='$string',active_status='$active_status',user_id='$user_id',update_date='$update_date',task_deadline_date='$task_deadline_date',task_deadline_time='$task_deadline_time',task_status='$task_status',notify = 1  WHERE id=$update_id";
	if (mysqli_query($con, $query)) {
		$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
		$info = 'Update Block';
		$icon = 'fa fa-table';
		$user_id=$_SESSION['login_user']['id'];
		$create_date=date("Y-m-d h:i:sa");			
		$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$update_id','$create_date','$user_id ',2,1,'$icon')";
		mysqli_query($con,$query12);
	} else {
		$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
	}
	echo json_encode($msg);
}
function edit_arch_block_action(){
	global $con;
	$update_id = $_POST['update_id'];
	$block_title = $_POST['block_title'];
	$block_des = $_POST['block_des'];
	$master_tag_id = $_POST['master_tags_id'];
	$meta_tag_id = $_POST['meta_tags_id'];
	$active_status = $_POST['active_sta'];
	$user_id =$_SESSION['login_user']['id'];
	$task_status = $_POST['task_sta'];
	$update_date=date("Y-m-d h:i:sa");
	$task_deadline_date = $_POST['task_deadline1'];
	$task_deadline_time = $_POST['task_deadline_time1'];
	$client_name=$_SESSION['login_user']['username'];
	$msg=array();
	$i=array();
	$IDArray = explode(',', $meta_tag_id);
	$i='';
	$items = ['#E6B0AA','#F5B7B1','#D7BDE2','#D2B4DE','#A9CCE3','#AED6F1','#A3E4D7','#A2D9CE','#A9DFBF','#ABEBC6','#FAD7AO','#F5CBA7','#EDBB99','#F7F9F9','#E5E7E9','#D5DBDB','#CCD1D1','#AEB68F','#ABB2B9'];

	$img = $_FILES['edit_file']['name'];
	$path = '../files/' . $img;  
    move_uploaded_file($_FILES['edit_file']['tmp_name'], $path);
    if( ! empty($img)){
	$query1 = "INSERT INTO fb_block_files(name,block_id,create_date,user_id) VALUES ('$img','$update_id','$create_date','$user_id ')";
    mysqli_query($con, $query1);
    }

	foreach ($IDArray as $myA) {
		if (is_numeric($myA)) {
		} else {
			$ers = "SELECT Name FROM fb_metatag WHERE Name = '$myA'";
			$query_dummy = mysqli_query($con,$ers);
			while($rows_dummy = mysqli_fetch_array($query_dummy)){
			$id_dummy = $rows_dummy['Name'];
			}
			if($id_dummy==''){
				$color =  $items[array_rand($items)];
				$query = "INSERT INTO fb_metatag(Name,Status,Create_date,User_id,color) VALUES ('$myA','1','$create_date','$user_id ','$color')";
			mysqli_query($con, $query);
			$i .= mysqli_insert_id($con).',';
			}
			else{

			}
		}
	}	
	$meta_tag_id.=','.$i;
	$IDAr = explode(',', $meta_tag_id);
	$j='';
	foreach ($IDAr as $myA) {
		if (is_numeric($myA)) {
			$j .=$myA.',';
		}
	}
	$ttt=$j;
	$string = rtrim($ttt, ',');
	$query="UPDATE fb_arch_block_data SET title='$block_title',description='$block_des', master_tag_id='$master_tag_id', meta_tag_id='$string',active_status='$active_status',user_id='$user_id',update_date='$update_date',task_deadline_date='$task_deadline_date',task_deadline_time='$task_deadline_time',task_status='$task_status',notify = 1  WHERE id=$update_id";
	if (mysqli_query($con, $query)) {
		$msg['done']='<div class="alert alert-success"><strong>Success! </strong> Data Inserted Successfully...</div>';
	} else {
		$msg['done']='<div class="alert alert-warning"><strong>Error! </strong> Data not Inserted</div>';
	}
	echo json_encode($msg);
}
function delete_bucket_fun(){
	global $con;
	$id = $_POST['id'];
	$table1 = $_POST['table1'];
	$table2 = $_POST['table2'];
	$sql="DELETE FROM $table1 WHERE Id=$id";
	$query= mysqli_query($con,$sql);

	$sql_0="SELECT * FROM $table2 WHERE bucket_id=$id";
	$query_u1 = mysqli_query($con,$sql_0);

	$sql1="DELETE FROM $table2 WHERE bucket_id=$id";
	$query_u = mysqli_query($con,$sql1);

	$board_id = 0;
	if($table2 == 'fb_blocks'){
		$board_id = 1;
	}else if($table2 == 'fb_per_blocks'){
		$board_id = 2;
	}else if($table2 == 'fb_tag_blocks'){
		$board_id = 3;
	}else{
		$board_id = 0;
	}

	while($rows1 = mysqli_fetch_array($query_u1)){
		$id = $rows1['id'];
		$sql_2="DELETE FROM fb_block_stories WHERE block_id=$id AND board_id=$board_id";
		$query_u = mysqli_query($con,$sql_2);

		$sql_3="DELETE FROM fb_block_files WHERE block_id=$id AND board_id=$board_id";
		$query_u = mysqli_query($con,$sql_3);	
	}
	echo json_encode($sql_3);
}
function mark_all_done(){
	global $con;
	$id = $_POST['id'];
	$user_id=$_SESSION['login_user']['id'];
	$table = $_POST['table'];
	$task_status = 1;
	$sql="UPDATE $table SET task_status='$task_status'WHERE bucket_id=$id";
	mysqli_query($con,$sql);
	echo json_encode($sql);
}
function lock_unlock_bucket(){
	global $con;
	$id = $_POST['id'];
	$update_date=date("Y-m-d H:i:s");
	$table = $_POST['table'];
	$lock_status =$_POST['lock_status'];
	$sql="UPDATE $table SET lock_status='$lock_status',Update_date='$update_date' WHERE Id=$id";
	mysqli_query($con,$sql);
	echo json_encode($sql);
}
function hide_show_bucket(){
	global $con;
	$id = $_POST['id'];
	$update_date=date("Y-m-d H:i:s");
	$table = $_POST['table'];
	$is_hide =$_POST['is_hide'];
	$sql="UPDATE $table SET is_hide='$is_hide',Update_date='$update_date' WHERE Id=$id";
	mysqli_query($con,$sql);
	echo json_encode($sql);
}
function filter_data_by_arch(){
	global $con;
	$master_tags_id = $_POST['master_tags_id'];
	$meta_tags_id = $_POST['meta_tags_id'];
	$query="select * from fb_archived_board_bucket";
	$bucket_list = array();
	$bucket_data1 = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query1)){
		$id = $rows['Id'];
		$rows['bucket_con'] = [];
		$query_b="select * from fb_arch_block_data where bucket_id=$id ";
		if($meta_tags_id){
			$query_b.="&& meta_tag_id Like ('%$meta_tags_id%')";
		}
		if($master_tags_id){
			$query_b.="&& master_tag_id IN ($master_tags_id)";
		}
		$query_b1 = mysqli_query($con,$query_b);
		unset($bucket_data);
		while($rows1 = mysqli_fetch_array($query_b1)){
			$colm = $rows1['master_tag_id'];
			$colm1 = (explode(",",$colm));
			$q = "select color from fb_tag_bucket where Id=$colm1[0]";
			$b1 = mysqli_query($con,$q);
			while($rows01 = mysqli_fetch_array($b1)){
				$rows1['color1'] = $rows01;
			}
			$colmt = $rows1['meta_tag_id'];
			$colmt1 = (explode(",",$colmt));
			$rows1['meta'] = $colmt1 ;
			unset($bucket_data1);
			$i =0;
			foreach ($colmt1 as $myA) {
				if($i <= 2){
					$query_u="select color from fb_metatag where Id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					$rows1['colors']=$bucket_data1;
					$i++;
				}
			}

			unset($bucket_data12);
			$id21 = $rows1['user_id'];
			$query_u21="select username,profile_img from fb_user where id=$id21";
			$query_u12 = mysqli_query($con,$query_u21);
			while($rows2 = mysqli_fetch_array($query_u12)){
					$bucket_data12[]=$rows2;
				}
			$rows1['user_img']=$bucket_data12;

			$id2 = $rows1['task_assign_user'];
			$IDArray = explode(',', $id2);
			unset($bucket_data1);
			foreach ($IDArray as $myA) {
				$query_u="select id,title from fb_per_blocks where id=$myA";
				$query_u1 = mysqli_query($con,$query_u);
				while($rows2 = mysqli_fetch_array($query_u1)){
					$bucket_data1[]=$rows2;
				}
				$rows1['tasked_user']=$bucket_data1;
			}
			$bucket_data[] = $rows1;
			$rows['bucket_con']=$bucket_data;
			$rows['query']=$query_b;
		}
		$bucket_list[] = $rows;
	}
	echo json_encode($bucket_list);
}
function hide_notify(){
	global $con;
	$id = $_POST['id'];
	$update_date=date("Y-m-d H:i:s");
	$table = $_POST['table'];
	$notify =$_POST['notify'];
	$sql="UPDATE $table SET notify='$notify',update_date='$update_date' WHERE id=$id";
	mysqli_query($con,$sql);
}
function edit_master(){
	global $con;
	$bucket_data = $main_data = $bucket_data1 = array();
	$id = $_POST['id'];	
	$id2 = $_POST['id2'];	
	$update_id = $_POST['update_id'];	
	$board_id = $_SESSION['board_id'];	
	$table = $_POST['table'];
	$table2 = $_POST['table2'];
	if($id != null){
		$sql="SELECT * FROM $table WHERE master_tag_id=$id  AND board_id=$board_id";
		$statement	= mysqli_query($con,$sql);
		while($rows = mysqli_fetch_array($statement)){
			$create_date=date("Y-m-d");

			unset($bucket_data123);
			$bucket_data123 = [];
			$id_r1 = $rows['id'];
			if($id_r1 != null){
				$query_r1="select * from fb_block_files where block_id=$id_r1 AND board_id = '$board_id'";
				$query_r12 = mysqli_query($con,$query_r1);
				while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
				$rows['file_data']=$bucket_data123;
			}else{}	

			$id21 = $rows['task_assign_user'];
			if($id21 != null){
				$IDArray = explode(',', $id21);
				// $rows['task_usr']=$IDArray;
				unset($bucket_data12);
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data12[]=$rows2;
					}
					if(!empty($bucket_data12)){
						$rows['tasked_user']=$bucket_data12;
					}
				}
			}else{}

			if($rows['task_status']==0){
				$task_deadline_date = $rows['task_deadline_date'];
				$datetime1 = date_create($create_date);
				$datetime2 = date_create($task_deadline_date);
				$interval = date_diff($datetime1, $datetime2);
				$date_df=$interval->format('%R%a days');

				if($date_df<=5){
					$rows['date_diff']=1;
				}elseif ($date_df>5) {
					$rows['date_diff']=2;
				}
			}
			$bucket_data[]=$rows;

			$block_id = $rows['id'];		
			$sql1="SELECT * FROM fb_block_files WHERE block_id='$block_id' AND board_id=$board_id AND NOT block_id = $update_id";
			$statement1	= mysqli_query($con,$sql1);
			while($rows1 = mysqli_fetch_array($statement1)){
				$bucket_data1[]=$rows1;
			}
		}
		$main_data['master'] = $bucket_data;
		$main_data['file_master'] = $bucket_data1;
	}
	if($id2 != null && $board_id != null){
		$sql5="SELECT * FROM $table2 WHERE block_id=$id2 AND board_id=$board_id ORDER BY create_date DESC";
		$statement5	= mysqli_query($con,$sql5);	
		$bucket_data4= [];	
		while($rows4 = mysqli_fetch_array($statement5)){
			$id = $rows4['user_id'];
			$sql25="SELECT username FROM fb_user WHERE id = $id";
			$statement25 = mysqli_query($con,$sql25);	
			while($rows_u = mysqli_fetch_array($statement25)){
				$rows4['user'] = $rows_u['username'];
			}
			$bucket_data4[]=$rows4;
		}
		$main_data['story_all'] = $bucket_data4;
	}
	echo json_encode($main_data);	

}
function update_drag(){
	global $con;
	$id = $_POST['id'];
	$update_date=date("Y-m-d H:i:s");
	$table = $_POST['table'];
	$index = $_POST['index'];
	$str = $_POST['str'];
	$bucket_id =$_POST['bucket_id'];
	if($id != null && $bucket_id != null && $index != null){
		$sql="UPDATE $table SET bucket_id='$bucket_id',update_date='$update_date',sort=$index WHERE id=$id";
	}
	mysqli_query($con,$sql);

	$bucket_id = '';
	if($table == 'fb_blocks'){
		$bucket_id = $_SESSION['board_id'];
	}else if($table == 'fb_per_blocks'){
		$bucket_id = 2;
	}else if($table == 'fb_tag_blocks'){
		$bucket_id = 3;
	}else{
		$bucket_id = 0;
	}

	$info = 'Drag Block';
	$icon = 'fa fa-table';
	$create_date=date("Y-m-d h:i:sa");		
	$user_id=$_SESSION['login_user']['id'];
	if($str == 1){
		$query12 = "INSERT INTO fb_block_stories(info,block_id,create_date,user_id,board_id,sort,icon) VALUES ('$info','$id','$create_date','$user_id ','$bucket_id',1,'$icon')";
		mysqli_query($con,$query12);
	}

	echo json_encode($query12);	
}
function undo_block_data(){
	global $con;
	$id = $_POST['id'];
	$task_status = $_POST['task_status'];
	$table = $_POST['table'];
	$sql="UPDATE $table SET status='$task_status'WHERE id=$id";
	$query_u = mysqli_query($con,$sql);
	echo json_encode($sql);
}
function tagg_bucket_function(){
	global $con;
 	$query = array();
 	$bucket_list = array();
	$sorting_tag = $_POST['sorting_tag'];

	if($sorting_tag=='master_tag'){
		$id = $_POST['blocks_tags'];
		$IDArray = explode(',', $id);

		foreach ($IDArray as $arr) {
			$query[]="select * from fb_tag_blocks where bucket_id=$arr";
		}
	}else if($sorting_tag=='person_tag'){
		$id = $_POST['blocks_people'];
		$IDArray = explode(',', $id);

		foreach ($IDArray as $arr) {
		$query[]="select * from fb_per_blocks where bucket_id=$arr";
		}
	}	

	foreach ($query as $temp) {
		$query1 = mysqli_query($con,$temp);
		while($rows = mysqli_fetch_array($query1)){
			$id = $rows['id'];
			$rows['bucket_con'] = [];
			$board_id = $_SESSION['board_id'];

			if($sorting_tag=='master_tag'){
				$query_b="select * from fb_blocks where master_tag_id=$id AND status = 1 AND board_id = '$board_id'";
			}else if($sorting_tag=='person_tag'){
				$query_b="select * from fb_blocks where task_assign_user=$id AND status = 1 AND board_id = '$board_id'";
			}

			$query_b1 = mysqli_query($con,$query_b);
			unset($bucket_data);

			while($rows1 = mysqli_fetch_array($query_b1)){
				$create_date=date("Y-m-d");
				$task_deadline_date = $rows1['task_deadline_date'];
				$datetime1 = date_create($create_date);
				$datetime2 = date_create($task_deadline_date);
				$interval = date_diff($datetime1, $datetime2);
				$date_df=$interval->format('%R%a days');

				if($date_df<=5){
					$rows1['date_diff']=1;
				}elseif ($date_df>5) {
					$rows1['date_diff']=2;
				}

				$colm = $rows1['master_tag_id'];
				$colm1 = (explode(",",$colm));
				if($colm != null){
					$q = "select color from fb_tag_blocks where id=$colm1[0]";
					$b1 = mysqli_query($con,$q);
					while($rows01 = mysqli_fetch_array($b1)){
					$rows1['color1'] = $rows01;
					}
				}

				$colmt = $rows1['meta_tag_id'];
				if($colmt != null){
					$colmt1 = (explode(",",$colmt));
					$rows1['meta'] = $colmt1 ;								
					unset($bucket_data1);
					$i =0;
					foreach ($colmt1 as $myA) {
						if($i <= 2){
							$query_u="select color from fb_metatag where Id=$myA";
							$query_u1 = mysqli_query($con,$query_u);
							while($rows2 = mysqli_fetch_array($query_u1)){
								$bucket_data1[]=$rows2;
							}
							$rows1['colors']=$bucket_data1;
							$i++;
						}
					}
				}

				$bucket_data123 = [];
				$id_r1 = $rows1['id'];
				if($id_r1 != null){								
					$query_r1="select * from fb_block_files where block_id=$id_r1";
					$query_r12 = mysqli_query($con,$query_r1);
					while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
					$rows1['file_data']=$bucket_data123;
				}

				unset($bucket_data12);
				$id21 = $rows1['user_id'];
				if($id21 != null){								
					$query_u21="select id,username,profile_img,user_role from fb_user where id=$id21";
					$query_u12 = mysqli_query($con,$query_u21);
					while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
					$rows1['user_img']=$bucket_data12;
				}

				$id2 = $rows1['task_assign_user'];
				if($id2 != null){
					$IDArray = explode(',', $id2);
					$rows1['task_usr']=$IDArray;
					unset($bucket_data1);
					$bucket_data1231 = [];
					foreach ($IDArray as $myA) {
						$query_u="select id,title from fb_per_blocks where id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						if(!empty($bucket_data1)){
							$rows1['tasked_user']=$bucket_data1;
						}
						
						$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
						$query_r121 = mysqli_query($con,$query_r11);
						while($rows_r11 = mysqli_fetch_array($query_r121)){
							$bucket_data1231[]=$rows_r11;
						}
						if(!empty($bucket_data1231)){
							$rows1['tasked_img']=$bucket_data1231;
						}
					}
				}else{}	

				$id23 = $rows1['task_assign_user'];
				if($id23 != null){
					unset($bucket_data14);
					$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
					$query_u21 = mysqli_query($con,$query_u2);
					while($rows24 = mysqli_fetch_array($query_u21)){
						$bucket_data14[]=$rows24;
					}
					if(!empty($bucket_data14)){
					 	$rows1['not_user']=$bucket_data14;
					}
				}else{
					unset($bucket_data14);
					$id23 = 0;
					$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
					$query_u21 = mysqli_query($con,$query_u2);
					while($rows24 = mysqli_fetch_array($query_u21)){
						$bucket_data14[]=$rows24;
					}
					$rows1['not_user']=$bucket_data14;
				}	
				$bucket_data[] = $rows1;
				$rows['query_b']=$query_b;
				$rows['bucket_con']=$bucket_data;
			}
			$bucket_list[] = $rows;
		}
	}
	echo json_encode($bucket_list);
}

function calender_list_time(){
	global $con;
	
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$task_status = $_POST['task_status'];
	$bucket_value = $_POST['bucket_value'];
	$date1=date_create($from_date);
	$startDate=date_format($date1,"Y-m-d");
	$date2=date_create($to_date);
	$endDate=date_format($date2,"Y-m-d");
	$begin = new DateTime($startDate);
	$task_time = $_POST['task_time'];
	$end = new DateTime($endDate);
	$interval = new DateInterval('P1D'); 
	$dateRange = new DatePeriod($begin, $interval, $end);

	$time=date("H:i", strtotime($task_time));		
		$ttt=0;
		for ($x = 0; $x <= 24; $x++) {
    		$timestamp = strtotime($time) + 60*60;
			$time = date('H:i:s', $timestamp);
    		$new_array[]= $time;   		
		}

	$range = [];
	$buckets = array();
				foreach ($new_array as $time1) {

				$Strat_time=$time1;
				$end_time1= strtotime($time1) + 60*60;
				$end_time = date('H:i:s', $end_time1);

		if($bucket_value == 3 || $bucket_value == 1){
				$show="select * from fb_blocks where status='1' && task_status='$task_status' && due_date_status=1 && task_deadline_time BETWEEN '$Strat_time' AND '$end_time' ORDER BY task_deadline_time ASC";
			}
			else if($bucket_value == 4){
				$show="select * from fb_blocks where status='1' && task_deadline_time BETWEEN '$Strat_time' AND '$end_time' ORDER BY task_deadline_time ASC";

				
			}
		$query = mysqli_query($con,$show);
		$buckets = array();
		while($data = mysqli_fetch_array($query)){
			$create_date=date("Y-m-d");
			$task_deadline_date = $data['task_deadline_date'];
			$deadline_time = $data['task_deadline_time'];
			$arr_time = explode(":", $deadline_time);
			$data['time']=$arr_time[0];

			$datetime1 = date_create($create_date);
			$datetime2 = date_create($task_deadline_date);
			$interval = date_diff($datetime1, $datetime2);
			$date_df=$interval->format('%R%a days');

			if($date_df<=5){
				$data['date_diff']=1;
			}elseif ($date_df>5) {
				$data['date_diff']=2;
			}

			$colm = $data['master_tag_id'];
			if($colm != null){	
				$colm1 = (explode(",",$colm));
				$q = "select color from fb_tag_bucket where Id=$colm1[0]";
				$b1 = mysqli_query($con,$q);
				while($rows01 = mysqli_fetch_array($b1)){
					$data['color1'] = $rows01;
				}
			}

			$bucket_data123 = [];
			$id_r1 = $data['id'];
			if($id_r1 != null){	
				$query_r1="select * from fb_block_files where block_id=$id_r1";
				$query_r12 = mysqli_query($con,$query_r1);
				while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
				$data['file_data']=$bucket_data123;
			}

			unset($bucket_data12);
			$id21 = $data['user_id'];
			if($id21 != null){	
				$query_u21="select username,profile_img from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$data['user_img']=$bucket_data12;
			}

			
			$colmt1 = $data['task_assign_user'];
			if($colmt1 != null){
				$IDArray = explode(',', $colmt1);
				$data['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$data['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$data['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	


			$colmt = $data['meta_tag_id'];
			if($colmt != null){			
				$colmt1 = (explode(",",$colmt));
				$data['meta'] = $colmt1;
				unset($bucket_data1);
				$i =0;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$data['colors']=$bucket_data1;
						$i++;
					}
				}
			}
			$buckets['con'][] = $data;
		}
		$range2[]=$buckets;
		$data = array();
		$data['query']=$show;
		$data['content'] = $range2;
		$data['time'] = $new_array;
	}
	 echo json_encode($data);
}
function assign_user(){
	global $con;
	$id = $_POST['id'];
	$user = $_POST['user'];
	$table = $_POST['table'];
	$boolean = $_POST['boolean'];

	$query="SELECT task_assign_user FROM $table WHERE id=$id";
	$query_r = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query_r)){
		$bucket_data=$rows['task_assign_user'];
		$col = (explode(",",$bucket_data));

		foreach ($col as $ext) {
			if(in_array($user, $col)){
				$items = $col;
				$bucket_data_add=$bucket_data;

				foreach($items as $k => $d){
					if($user==$d){
						unset($items[$k]);
					}
					$bucket_data_add =$items;
				}
				$bucket_data_add = (implode(",",$bucket_data_add));


			}
			else{
				if($bucket_data){
					$comma=',';
				}
				else{
					$comma='';
				}
				$bucket_data_add = $bucket_data.$comma.$user;	

			}	
		}	
		$query1="UPDATE $table SET task_assign_user='$bucket_data_add'WHERE id=$id";
		$query_r1 = mysqli_query($con,$query1);
	}
	$data = $bucket_data;
	echo json_encode($bucket_data_add);
}
function deleteElement($element, $array){
	$index = array_search($element, $array);
	if($index !== false){
		unset($array[$index]);
	}
}
function archived_block_function(){
	global $con;
	$bucket_id = $_POST['bucket_id'];
	$table = $_POST['table'];
	$query="UPDATE $table SET status='2' WHERE bucket_id=$bucket_id";
	$query_r= mysqli_query($con,$query);
}
function block_sort(){
	global $con;
	$sort = $_POST['id'];
	$low_sort = $_POST['low_sort'];

	if($low_sort == 'true'){$low_sort = 'ASC';}else{$low_sort = 'DESC';}
	if($sort == 1){$sort = 'due_date_status '.$low_sort;}

	$query="select * from fb_buckets";
	$bucket_list = array();
	$bucket_data1 = array();
	$bucket_data12 = array();
	$bucket_data1231 = array();
	$query1 = mysqli_query($con,$query);
	while($rows = mysqli_fetch_array($query1)){
		$id = $rows['Id'];
		$rows['bucket_con'] = [];
		$query_b="select * from fb_blocks where bucket_id=$id && status=1 ORDER BY $sort";
		$query_b1 = mysqli_query($con,$query_b);
		unset($bucket_data);
		while($rows1 = mysqli_fetch_array($query_b1)){
			$create_date=date("Y-m-d");
			$task_deadline_date = $rows1['task_deadline_date'];
			$datetime1 = date_create($create_date);
			$datetime2 = date_create($task_deadline_date);
			$interval = date_diff($datetime1, $datetime2);
			$date_df=$interval->format('%R%a days');

			if($date_df<=5){
				$rows1['date_diff']=1;

			}elseif ($date_df>5) {
				$rows1['date_diff']=2;
			}

			$colm = $rows1['master_tag_id'];
			if($colm != null){				
				$colm1 = (explode(",",$colm));
				if($colm1 != null){
					$q = "select color,title from fb_tag_blocks where id=$colm1[0]";
					$b1 = mysqli_query($con,$q);
					while($rows01 = mysqli_fetch_array($b1)){
						$rows1['color1'] = $rows01;
					}
				}
			}else{}

			$colmt = $rows1['meta_tag_id'];
			if($colmt != null){
				$colmt1 = (explode(",",$colmt));
				$rows1['meta'] = $colmt1 ;
				unset($bucket_data1);
				$i =0;
				foreach ($colmt1 as $myA) {
					if($i <= 2){
						$query_u="select color from fb_metatag where Id=$myA";
						$query_u1 = mysqli_query($con,$query_u);
						while($rows2 = mysqli_fetch_array($query_u1)){
							$bucket_data1[]=$rows2;
						}
						$rows1['colors']=$bucket_data1;
						$i++;
					}
				}
			}else{}

			unset($bucket_data123);
			$bucket_data123 = [];
			$id_r1 = $rows1['id'];
			if($id_r1 != null){
				$query_r1="select * from fb_block_files where block_id=$id_r1 AND board_id = 1";
				$query_r12 = mysqli_query($con,$query_r1);
				while($rows_r1 = mysqli_fetch_array($query_r12)){
						$bucket_data123[]=$rows_r1;
					}
				$rows1['file_data']=$bucket_data123;
			}else{}			

			unset($bucket_data12);
			$id21 = $rows1['user_id'];
			if($id21 != null){
				$query_u21="select id,username,profile_img,user_role from fb_user where id=$id21";
				$query_u12 = mysqli_query($con,$query_u21);
				while($rows2 = mysqli_fetch_array($query_u12)){
						$bucket_data12[]=$rows2;
					}
				$rows1['user_img']=$bucket_data12;
			}else{}	

			$id2 = $rows1['task_assign_user'];
			if($id2 != null){
				$IDArray = explode(',', $id2);
				$rows1['task_usr']=$IDArray;
				unset($bucket_data1);
				$bucket_data1231 = [];
				foreach ($IDArray as $myA) {
					$query_u="select id,title from fb_per_blocks where id=$myA";
					$query_u1 = mysqli_query($con,$query_u);
					while($rows2 = mysqli_fetch_array($query_u1)){
						$bucket_data1[]=$rows2;
					}
					if(!empty($bucket_data1)){
						$rows1['tasked_user']=$bucket_data1;
					}
					
					$query_r11="select * from fb_block_files where block_id=$myA  AND board_id=2 LIMIT 1";
					$query_r121 = mysqli_query($con,$query_r11);
					while($rows_r11 = mysqli_fetch_array($query_r121)){
						$bucket_data1231[]=$rows_r11;
					}
					if(!empty($bucket_data1231)){
						$rows1['tasked_img']=$bucket_data1231;
					}
				}
			}else{}	

			$id23 = $rows1['task_assign_user'];
			if($id23 != null){
				unset($bucket_data14);
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				if(!empty($bucket_data14)){
				 	$rows1['not_user']=$bucket_data14;
				}
			}else{
				unset($bucket_data14);
				$id23 = 0;
				$query_u2="select id,title from fb_per_blocks where id NOT IN ($id23)";
				$query_u21 = mysqli_query($con,$query_u2);
				while($rows24 = mysqli_fetch_array($query_u21)){
					$bucket_data14[]=$rows24;
				}
				$rows1['not_user']=$bucket_data14;
			}				
			$bucket_data[] = $rows1;
			$rows['bucket_con']=$bucket_data;
		}
		$bucket_list[] = $rows;
	}
	echo json_encode($bucket_list);
}
function edit_files(){
	global $con;
	$bucket_data = array();
	$block_id = $_POST['block_id'];	
	$board_id = $_POST['board_id'];	
	$table = $_POST['table'];
	if($board_id != null && $block_id != null){
		$sql="SELECT * FROM $table WHERE block_id=$block_id AND board_id = $board_id";
		$statement	= mysqli_query($con,$sql);
		while($rows = mysqli_fetch_array($statement)){
			$bucket_data[]=$rows;
		}
		echo json_encode($bucket_data);
	}else{}	
}
function boards_show(){
	global $con;
	$sql="SELECT * FROM fb_boards";
	$statement	= mysqli_query($con,$sql);
	while($rows = mysqli_fetch_array($statement)){
		$bucket_data[]=$rows;
	}
	echo json_encode($bucket_data);
}
function board_add(){
	global $con;
	$create_date=date("Y-m-d h:i:sa");
	$board_name = $_POST['board_name'];	
	$user_id = $_SESSION['login_user']['id'];
	$msg = $val = "";
	$uid = uniqid();
	if($board_name != "undefined" || $board_name != ""){
		$query_validations = "SELECT * FROM fb_boards WHERE name = '$board_name'";
		$validate = mysqli_query($con,$query_validations);
		while($rows = mysqli_fetch_array($validate)){ $val = $rows['name'];}
		if($val != $board_name){
			$sql="INSERT INTO fb_boards (uid,name,create_date,user_id) VALUES ('$uid','$board_name','$create_date',$user_id)";
			$statement	= mysqli_query($con,$sql);
			$board_id=mysqli_insert_id($con);
			$board_name = "New Bucket";
			$sql1="INSERT INTO fb_buckets (Name,create_date,user_id,status,board_id) VALUES ('$board_name','$create_date',$user_id,1,$board_id)";
			$statement	= mysqli_query($con,$sql1);
		}else{
			$msg = '<div class="alert alert-warning"><strong>Error! </strong>Data Already Inserted</div>';			
		}
	}else{
		$msg = '<div class="alert alert-danger"><strong>Error! </strong>Blank Data not Inserted</div>';
	}
	echo json_encode($msg);
}
function board_session(){
	$board_id = $_POST['board_id'];
	$board_name = $_POST['board_name'];
	$_SESSION['board_id']=$board_id;
	$_SESSION['board_name']=$board_name;
}
function board_dis(){
	$data=array('board_name' => $_SESSION['board_name']);
	echo json_encode($data);	
}
function board_nadd(){
	global $con;	
	$update_date=date("Y-m-d h:i:sa");	
	$board_name = $_POST['board_name'];
	$user_id = $_SESSION['login_user']['id'];
	$board_id = $_SESSION['board_id'];	
	$msg = [];

	if($board_name != ''){
		$sql="UPDATE fb_boards SET name ='$board_name',update_date='$update_date',user_id =$user_id WHERE id=$board_id";
		if(mysqli_query($con,$sql)){
			$_SESSION['board_name'] = $board_name;
		}else{
		}
	}else{
		$msg=array('error' => 'Error : Board name blank');
	}
	echo json_encode($msg);
}
function str_con_not(){
	global $con;	
	$create_date=date("Y-m-d h:i:sa");	
	$block_id = $_POST['block_id'];
	$info = $_POST['info'];
	$user_id = $_SESSION['login_user']['id'];
	$board_id = $_SESSION['board_id'];
	$icon = 'fa fa-sticky-note';	
	if($info != '' AND $block_id!=''&& $block_id!='undefined' ){
		$sql="INSERT INTO fb_block_stories (info,create_date,user_id,board_id,icon,block_id,sort) VALUES ('$info','$create_date',$user_id,'$board_id','$icon','$block_id',3)";
		$statement	= mysqli_query($con,$sql);
		echo json_encode($sql);
	}	
}
function ath_link(){
	global $con;	
	$create_date=date("Y-m-d h:i:sa");	
	$block_id = $_POST['block_id'];
	if(!empty($_POST['name'])){
		$name = $_POST['name'];
	}
	$url = $_POST['url'];
	$user_id = $_SESSION['login_user']['id'];
	$board_id = $_SESSION['board_id'];
	$ext = 'link';	
	if($block_id!=''&& $block_id!='undefined'){
		if(!empty($_POST['name'])){
			$sql="INSERT INTO fb_block_files (name,create_date,user_id,board_id,block_id,ext,url) VALUES ('$name','$create_date',$user_id,'$board_id','$block_id','$ext','$url')";	
		}else{
			$name = 'link';	
			$sql="INSERT INTO fb_block_files (name,create_date,user_id,board_id,block_id,ext,url) VALUES ('$name','$create_date',$user_id,'$board_id','$block_id','$ext','$url')";	
		}
		$statement	= mysqli_query($con,$sql);
		echo json_encode($sql);
	}
}
function str_convr(){
	global $con;	
	$create_date=date("Y-m-d h:i:sa");	
	$block_id = $_POST['block_id'];
	$info = $_POST['info'];
	$user_id = $_SESSION['login_user']['id'];
	$board_id = $_SESSION['board_id'];
	$arr = explode("@", $info);
	$count=count($arr);
	if($count>=2){
		$sort=2;
		$icon = 'fa fa-comment';
	}else{
		$sort=3;
		$icon = 'fa fa-sticky-note';
	}
	if($info != '' AND $block_id!=''&& $block_id!='undefined' ){
		$sql="INSERT INTO fb_block_stories (info,create_date,user_id,board_id,icon,block_id,sort) VALUES ('$info','$create_date',$user_id,'$board_id','$icon','$block_id','$sort')";
		$statement	= mysqli_query($con,$sql);
		echo json_encode($sql);
	}	
}
function del_board(){
	global $con;	
	$board_id = $_SESSION['board_id'];
	$user_id = $_SESSION['login_user']['id'];
	$sql="DELETE FROM fb_boards WHERE id=$board_id";
	$statement	= mysqli_query($con,$sql);
	$sql2="DELETE FROM fb_buckets WHERE board_id=$board_id";
	$statement	= mysqli_query($con,$sql2);
	$sql3="DELETE FROM fb_blocks WHERE board_id=$board_id";
	$statement	= mysqli_query($con,$sql3);	
	$sql4="DELETE FROM fb_block_files WHERE board_id=$board_id";
	$statement	= mysqli_query($con,$sql4);	
	$sql5="DELETE FROM fb_block_stories WHERE board_id=$board_id";
	$statement	= mysqli_query($con,$sql5);
	$sql6="DELETE FROM fb_settings WHERE board_id=$board_id";
	$statement	= mysqli_query($con,$sql6);
	$_SESSION['board_id']='';
	$_SESSION['board_name']='';
}
function board_save(){
	global $con;	
	$setting = $_POST['setting'];
	$create_date=date("Y-m-d h:i:sa");	
	$user_id = $_SESSION['login_user']['id'];
	$board_id = $_SESSION['board_id'];
	$sort = $_POST['sort'];
	$val = '';
	$sql1="SELECT * FROM fb_settings WHERE board_id = '$board_id'";
	$statement	= mysqli_query($con,$sql1);
	while($rows = mysqli_fetch_array($statement)){ $val = $rows['board_id'];}

	if(empty($val)){
		$sql="INSERT INTO fb_settings (setting,create_date,user_id,board_id,sort) VALUES ('$setting','$create_date',$user_id,'$board_id','$sort')";		
	}else{
		$sql="UPDATE fb_settings SET setting = '$setting',update_date = '$create_date', sort = '$sort' WHERE board_id = '$board_id'";
	}
	$statement	= mysqli_query($con,$sql);
	echo json_encode($sql);	
}
function file_name_data(){
	global $con;	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$update_date=date("Y-m-d h:i:sa");	
	$user_id = $_SESSION['login_user']['id'];
	$sql="UPDATE fb_block_files SET name = '$name',update_date = '$update_date', user_id = '$user_id' WHERE id = '$id'";
	$statement	= mysqli_query($con,$sql);
	echo json_encode($sql);	
}
?>