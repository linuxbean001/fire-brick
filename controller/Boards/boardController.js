app.controller('boardController',boardControllerFn); 
function boardControllerFn ($scope,$http,$timeout,$rootScope,$window,$mdToast,$location){  
	var g_drive =  new Array();
	$scope.letterLimit = 1;
	$scope.sort_dis = false;
	$scope.temp = '';
	$scope.att_link = '';
	$scope.att_name = '';

 	$scope.drag=function(data){
 		$scope.temp = data.id;
 	}
 	$scope.drop=function(data,data2){
 		var id = '';
 		var update = data2;
 		var bucket_id = '';
 		var index = 0;
 		var temp = '';
 		for (i = 0; i < data.length; i++) { 
 			var some = data[i].bucket_con
 			for (j = 0; j <  some.length; j++) { 
 				id = some[j].id;
		    	index = j; 				
		    	if($scope.temp === some[j].id && j>0){
		    		some[j].bucket_id = data[i].Id;
		    		bucket_id = some[j].bucket_id;	
		    		temp = 	bucket_id; 	
		    		var formdata ='action=update_drag'+'&table='+'fb_blocks'+'&id='+id+'&bucket_id='+bucket_id+'&index='+index+'&str='+1;
		    	}else if($scope.temp === some[j].id && j==0){
		    		some[j].bucket_id = data[i].Id;
		    		bucket_id = some[j].bucket_id;
		    		temp = 	bucket_id;
		    		var formdata ='action=update_drag'+'&table='+'fb_blocks'+'&id='+id+'&bucket_id='+bucket_id+'&index='+index+'&str='+1;
		    	}else{
		    		bucket_id = some[j].bucket_id;
		    		var formdata ='action=update_drag'+'&table='+'fb_blocks'+'&id='+id+'&bucket_id='+bucket_id+'&index='+index;
		    	}
		    	if(temp === bucket_id || update === bucket_id){
			    	$http({
						method: "POST",
						url: './modal/modal.php',
						data: formdata,
						headers: {'Content-Type': 'application/x-www-form-urlencoded'},
					}).then(function (response) {
					});
				}
			}
		}
		$scope.content.splice(0,$scope.content.length);
    }
    var content = [];
	$scope.disp = function(data) { 
		content.push(data);
	}
	$scope.disp_hide = function(data) { 
		var index = content.indexOf(data);
		if (index > -1) {
			content.splice(index, 1);
		}
	}
	$scope.content = content;

	$rootScope.bucket_list_data = function() { 
		var formData = 'action=main_bucket_list';
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {		
			if($rootScope.board_sort == 'exp'){
				var temp = $rootScope.board_set;
				$scope.exp = temp[0].view; 
				$scope.expanded_view();
			}else if($rootScope.board_sort == ''){
				
			}
			$scope.mainbucketdisplay=response.data;
			$scope.getresponse = false;
		});
	}
	$scope.calender_view_n = true;
	$scope.calender_view_y = false;
	$scope.off_date = "off_date";
	$scope.green_done = "green_done";
	$scope.green_done1 = "green_done";
	$scope.red_line = "red_line";
	$scope.overlay_block = "overlay_block";
	$scope.hide_bucket_cls = "hide_bucket_cls";
	$scope.selection=[];
	$scope.idsMaster = [];
	$scope.idsMasterName = [];
	$scope.idsMastercolor = [];
	$scope.IfCheckMaster = function(response,check) {
		if (check) {
			$scope.idsMaster.push(response.id);
			$scope.idsMasterName.push(response.title);
			$scope.idsMastercolor.push(response.color);
		} else {
			var index = $scope.idsMaster.indexOf(response.id);
			$scope.idsMaster.splice(index, 1);
			var indexMaster = $scope.idsMasterName.indexOf(response.title);
			$scope.idsMasterName.splice(indexMaster, 1);
			var indexMastercolor = $scope.idsMastercolor.indexOf(response.color);
			$scope.idsMastercolor.splice(indexMastercolor, 1);
		}
		$scope.filter_block_fun();
	};
	$scope.idsPeople = [];
	$scope.idsPeopleName = [];
	$scope.IfCheckPeople = function(id, name,check) {
		if (check) {
			$scope.idsPeople.push(id);
			$scope.idsPeopleName.push(name);
		} else {
			var index = $scope.idsPeople.indexOf(id);
			$scope.idsPeople.splice(index, 1);
			var indexName = $scope.idsPeopleName.indexOf(name);
			$scope.idsPeopleName.splice(indexName, 1);
		}
		$scope.filter_block_fun();
	};
	$scope.idsMeta = [];
	$scope.idsMetaName = [];
	$scope.idsMetacolor = [];
	$scope.IfCheck = function(response, check) {
		if (check) {
			$scope.idsMeta.push(response.Id);
			$scope.idsMetaName.push(response.Name);
			$scope.idsMetacolor.push(response.color);
		} else {
			var index = $scope.idsMeta.indexOf(response.Id);
			$scope.idsMeta.splice(index, 1);
			var indexmeta = $scope.idsMetaName.indexOf(response.Name);
			$scope.idsMetaName.splice(indexmeta, 1);
			var indexmetacolor = $scope.idsMetacolor.indexOf(response.color);
			$scope.idsMetacolor.splice(indexmetacolor, 1);
		}
		$scope.filter_block_fun();
	};
	$scope.repeatData = [];
	$scope.selection = [];
	$scope.filter_block_fun=function(){
		var multipleArrays = [$scope.idsMasterName, $scope.idsPeopleName, $scope.idsMetaName];
		var multipleArrays1 = [$scope.idsMastercolor,$scope.idsMetacolor];
		var flatArray = [].concat.apply([], multipleArrays);
		var flatArray1 = [].concat.apply([], multipleArrays1);
		$scope.selection=flatArray;
		$scope.repeatData = flatArray.map(function(value, index) {
		    return {
		        data: value,
		        value: flatArray1[index]
		    }
		});
		$scope.table = 'fb_buckets'; 
		$scope.table1 = 'fb_blocks';
		if($scope.calender_view_n == true){
			var formdata ='action=filter_data_by_tags'+'&person_tags_id='+$scope.idsPeople+'&master_tags_id='+$scope.idsMaster+'&meta_tags_id='+$scope.idsMeta+'&table1='+$scope.table1+'&table='+$scope.table;
			$scope.getresponse = true;
			$http({
				method: "POST",
				url: './modal/modal.php',
				data: formdata,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				$timeout(function(){
			        if(response){
			        	 $scope.getresponse = false;
			        	$scope.mainbucketdisplay=response.data;
						$scope.content.splice(0,$scope.content.length);
			        }
		      	}, 800);
			});
		}
		else{
			var formdata ='action=filter_data_by_dates'+'&person_tags_id='+$scope.idsPeople+'&master_tags_id='+$scope.idsMaster+'&meta_tags_id='+$scope.idsMeta+'&from_date='+$scope.from_date+'&to_date='+$scope.to_date+'&task_status='+1+'&bucket_value='+$scope.bucket_value+'&table='+$scope.table1;
			$scope.getresponse = true;
			$http({
				method: "POST",
				url: './modal/modal.php',
				data: formdata,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {			
				$timeout(function(){
			        if(response){
						$scope.getresponse = false;
							$scope.dates=response.data.date;
							$scope.dates1=response.data.content;
						$scope.content.splice(0,$scope.content.length);
			        }
		      	}, 800);
			});
		}
	}
	$scope.exp = !$scope.exp;
	$scope.rmv_cal = !$scope.rmv_cal;
	$scope.cal = !$scope.cal;
	$scope.contract_view=function(){
		$scope.class = "contract";
		$scope.class_hide_show = "class_show";
		$scope.all_content = false;
		$scope.exp = true;
		$scope.contra = false;
		$scope.rmv_cal = true;
		if($scope.calender_view_n == true){
			$scope.cal = true;
		}else{
			$scope.cal = false;
		}
	}
	$scope.expanded_view=function(){
		$scope.class = "expanded";
		$scope.class_hide_show = "class_hide";
		$scope.all_content = true;
		$scope.exp = false;
		$scope.contra = true;
		$scope.rmv_cal = true;
		if($scope.calender_view_n == true){
			$scope.cal = true;
		}else{
			$scope.cal = false;
		}
	}
	$scope.statusBlock = function(Bucket_id,block_id,table) {
		var formdata ='action=change_block_status'+'&bucket_id='+Bucket_id+'&block_id='+block_id+'&table='+table;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.content.splice(0,$scope.content.length);
			if($scope.calender_view_n == true){
					$scope.bucket_list_data();
				}else{
					$rootScope.calender_view();
				}
		});
	};
	$rootScope.remove_calender_view=function(){
		$scope.calender_view_y = false;
		$scope.calender_view_n = true;
		$scope.rmv_cal = false;
		$scope.cal = true;
	}
	$rootScope.calender_view=function(){
		var temp = $rootScope.board_set;
		if($rootScope.board_sort == 'cal'){
			$scope.from_date = temp[0].from_date; 
			$scope.to_date = temp[0].to_date;
			$scope.task_status = temp[0].task_status;
			$scope.bucket_value = temp[0].bucket_value;
			$scope.temp = temp[0].view;
			if($scope.temp == false){
				$scope.expanded_view();
			}
			$scope.usable = true;
		}
		$scope.rmv_cal = true;
		$scope.cal = false;
		$scope.calender_view_y = true;
		$scope.calender_view_n = false;
		if($scope.bucket_value == 3 || $scope.bucket_value == 1){
			$scope.task_status = 1;
			var formdata = 'action=calender_list'+'&from_date='+$scope.from_date+'&to_date='+$scope.to_date+'&task_status='+1+'&bucket_value='+$scope.bucket_value;
		}
		else if($scope.bucket_value == 4){
			$scope.task_status = 0;
			var formdata = 'action=calender_list'+'&from_date='+$scope.from_date+'&to_date='+$scope.to_date+'&bucket_value='+$scope.bucket_value+'&task_status='+0;
		}
			$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.dates=response.data.date;
			$scope.dates1=response.data.content;
		});
		$scope.content.splice(0,$scope.content.length);
	}
	$scope.filter = !$scope.filter;
	$scope.bucket_option=function(){
		if($scope.countSelector.value==0){
			$scope.blocks_tag=true;
			$scope.blocks_board=false;
			$scope.sorting_tag='master_tag';
			$scope.sorting_tag1='master_tag';
			$scope.icon="#";
			$scope.icon1="#";
		}else{
			$scope.blocks_tag=false;
			$scope.blocks_board=true;
			$scope.sorting_tag='person_tag';
			$scope.sorting_tag1='person_tag';
			$scope.icon="@";
			$scope.icon1="@";
		}
	}
	$scope.options = [
	{ id: 0, label: 'Master Tag blocks board', value: 0 },
	{ id: 1, label: 'Person Tag blocks board', value: 1 },
	];
	$scope.by_people=function(){
		$scope.countSelector = $scope.options[1];
		$scope.blocks_tag=false;
		$scope.blocks_board=true;
		$scope.sorting_tag='person_tag';
		$scope.icon="@";
	}
	$scope.by_master_tag=function(){
		$scope.countSelector = $scope.options[0];
		$scope.blocks_tag=true;
		$scope.blocks_board=false;
		$scope.sorting_tag='master_tag';
		$scope.icon="#";	
	}
	$scope.by_people_sort=function(){
		$scope.countSelector = $scope.options[1];
		$scope.blocks_tag=false;
		$scope.blocks_board=true;
		$scope.sorting_tag1='person_tag';
		$scope.icon1="@";
	}
	$scope.by_master_tag_sort=function(){
		$scope.countSelector = $scope.options[0];
		$scope.blocks_tag=true;
		$scope.blocks_board=false;
		$scope.sorting_tag1='master_tag';
		$scope.icon1="#";
	}
	$scope.blocks_result =[];

	$scope.apply_tags=function(){
		var bucket_id=$scope.blocks_tags;
		var formdata ='action=sort_clients'+'&bucket_id='+bucket_id;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.query=response.data.query;			
			$scope.sort_master=response.data.sort;
			$scope.mainbucketdisplay=response.data.block;
			$scope.sort_dis = true;
			$scope.content.splice(0,$scope.content.length);			
		});
	}
	$scope.apply_people=function(){
		var bucket_id=$scope.blocks_people;
		var formdata ='action=sort_people'+'&bucket_id='+bucket_id;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.query=response.data.query;
			$scope.sort_master=response.data.sort;
			$scope.mainbucketdisplay=response.data.block;
			$scope.sort_dis = true;			
			$scope.content.splice(0,$scope.content.length);	
		});
	}
	$scope.myVar = false;
	$scope.togglePerson = function() {
		$scope.myVar = true;
	};
	$scope.edit_untask = function() { 
		$scope.task_sta=0;
	}
	$scope.edit_task = function() { 
		$scope.task_sta=1;
	}
	$scope.edit_unstar = function() { 
		$scope.active_sta=1;
	}
	$scope.edit_star = function() { 
		$scope.active_sta=0;			
	}
	$scope.create_board = function() { 
		var formData = $('#create_board_form').serialize();
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.msg1 = true;
			$scope.msg=response.data.done;
			$timeout(function(){
			$scope.msg1 = false;}, 2000);
			if($scope.calender_view_n == true){
					$scope.bucket_list_data();$scope.message='Board Created.';$scope.showSimpleToast();
				}else{
					$rootScope.calender_view();
			}
			$scope.reset();
		});
	}
	$scope.update_bucket = function(name,id) { 
		if($scope.user_role == 1){
			$scope.show_none=1
			var tbl ='fb_buckets';
			var formData = 'action=update_bucket'+'&table='+tbl+'&mainboardbucketname='+name+'&id='+id;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				$scope.content.splice(0,$scope.content.length);
				$scope.msg1 = true;
				$scope.msg=response.data.done;
				$timeout(function(){
				$scope.msg1 = false;}, 2000);
				if($scope.calender_view_n == true){
						$scope.bucket_list_data();
					}else{
						$rootScope.calender_view();
				}
				$scope.reset();
			});
		}
	}
	$scope.reset = function() {
		$scope.main_board = {};
		$scope.create_board_form.$setPristine();
	}
	$scope.buckets_id = function(id) { 
		$scope.bucket_id=id;
	}
	
	$scope.active_qw = function(id,tbl,status) { 		
		if($scope.user_role <= 2){
			var formData = 'action=notification_bucket'+'&id='+id+'&active_status='+status+'&table='+tbl;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {				
				$scope.content.splice(0,$scope.content.length);				
			});
		}
	}
	$scope.del_block = function(id,undo) { 
		var formData = 'action=delete_block_fun'+'&id='+id+'&undo='+undo;
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.last_id = id;
			angular.element('#auto_close').triggerHandler('click');
			$scope.content.splice(0,$scope.content.length);
			if($scope.calender_view_n == true){
					$scope.bucket_list_data();
					if(undo == 1){$scope.message='Action undone.';$scope.showSimpleToast();}else{$scope.message='Block Archived.';$scope.showActionToast();}
				}else{
					$rootScope.calender_view();
			}
		});
	}
	$scope.add_block = function() { 
		if($scope.due_date1==true){
			var due_date_status=1;
		}else{
			var due_date_status=0;
		}
		var master_id = $('#master_tags_id').val();
		var meta_id = $('#meta_tags_id').val();
		var task_users = $('#task_users').val();
		var formData = new FormData($('#Bucket_content_form')[0]);
		formData.append("master_tags_id", master_id);
		formData.append("meta_tags_id", meta_id);
		formData.append("task_users", task_users);
		formData.append("due_date_status", due_date_status);
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': undefined,'Process-Data': false},
			 transformRequest: angular.identity
		}).then(function (response) {
			$scope.msg1 = true;
			$scope.msg=response.data.done;
			$timeout(function(){
			$scope.msg1 = false;}, 2000);
			$scope.content.splice(0,$scope.content.length);
			if($scope.calender_view_n == true){
					$scope.bucket_list_data();
					if(response.data.done1 == 'Done1'){$scope.message='Block Created in person board sucessfully.';}
					if(response.data.done1 == 'Done11'){$scope.message='Block Already exsist.';}
					if(response.data.done1 == 'Done2'){$scope.message='Block Created in master tag sucessfully.';}
					if(response.data.done1 == 'Done21'){$scope.message='Block Already exsist.';}
					if(response.data.done1 == 'Done3'){$scope.message='Block Created in sucessfully.';}
					if(response.data.done1 == 'Done31'){$scope.message='Block Error.';}
					$scope.showSimpleToast();
				}else{
					$rootScope.calender_view();
				}
			$scope.reset1();
		});
	}
	$scope.reset1 = function() {
		$scope.block = {};
		$scope.Bucket_content_form.$setPristine();
	}
	$scope.bucketdisplaytag = function() { 
		var formData = 'action=tagBucketshow12345';
		$scope.getresponse = true;
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.tagbucketdisplay=response.data;
			$scope.content.splice(0,$scope.content.length);
		});
	}
	 $scope.bucketdisplaytag12345 = function() { 
		var formData = 'action=tagBucketshow';
		$scope.getresponse = true;
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {			
			$scope.tagbucketdisplay1=response.data;
			$scope.content.splice(0,$scope.content.length);
		});
	}

	$scope.metatag = function() { 
		var formData = 'action=metaBucketshow';
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.metabucketdisplay=response.data;
		});
	}
	$scope.custom_create = {
		create: true,
	}
	$scope.usable = true;
	$scope.usable = !$scope.usable;
	$scope.doOperation = function(e) {
		if ($scope.usable !== true) {
			e.preventDefault();
		} else{
			if(($scope.from_date != '') || ($scope.to_date != '')){
				$rootScope.calender_view();
			}
			else{
				alert('Please Select Dates');
			}
		}
	}
	$scope.bucket_filter=function(id){
		if(id!=2){
			$scope.usable = true;
		}
		else{
			$scope.usable = false;
		}		
	}
	$scope.edit_blk = function(data) {
		$scope.all_data = data;
		$scope.bucket_id = data.bucket_id;
		$scope.task_deadline1 = data.task_deadline_date;
		$scope.task_deadline12 = data.task_deadline_time;
		$scope.meta_tag_id = data.meta;
		$scope.mastertags = data.master_tag_id;
		$scope.update_id = data.id;
		$scope.active_status = data.active_status;
		$scope.block_title = data.title;
		$scope.task_block_email=data.BoardId;
		$scope.block_des = data.description;
		$scope.task_assign_user = data.task_usr;
		$scope.tasked_user = data.tasked_user;
		var due_date_status = data.due_date_status;
		if(due_date_status == 1){
			$scope.due_date_status = true;
		}else{
			$scope.due_date_status = false;			
		}
		$scope.task_sta = data.task_status;
		$scope.active_sta = data.active_status;
		$scope.file_data = data.file_data;

		var tbl1 = 'fb_blocks';
		var tbl2 = 'fb_block_stories';
		var formData = 'action=edit_master'+'&id='+data.master_tag_id+'&update_id='+data.id+'&id2='+data.id+'&table='+tbl1+'&table2='+tbl2;
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.related = response.data.master;
			$scope.stry_all = response.data.story_all;
			$scope.file_master = response.data.file_master;
		});
	}
	$scope.edit_file = function() { 
		var master_id = $('.mastertags').val();
		var meta_id = $('.meta_tags_id').val();
		var task_users = $('.task_users').val();
		if($scope.due_date_status == true){
			var due_date_status = 1;
		}else{
			var due_date_status = 0;			
		}
		var formData = new FormData($('#edit_main_block')[0]);
		formData.append("master_tags_id", master_id);
		formData.append("meta_tags_id", meta_id);
		formData.append("due_date_status", due_date_status);
		formData.append("task_users", task_users);
		formData.append("g_drive", JSON.stringify(g_drive));
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			 headers: {'Content-Type': undefined,'Process-Data': false},
			 transformRequest: angular.identity
		}).then(function (response) {
			$scope.message = 'Block updated sucessfully.';$scope.showSimpleToast();
			$scope.msg1 = true;
			$scope.msg=response.data.done;
			$scope.content.splice(0,$scope.content.length);
			if($scope.calender_view_n == true){
					$scope.bucket_list_data();
				}else{
					$rootScope.calender_view();
				}
			$scope.reset1();
			$timeout(function(){
				$scope.msg1 = false;}, 2000);
		});
	}
	$scope.related_edit = function(data) { 
		var meta = data.meta_tag_id.split(",");
		var task_usr = data.task_assign_user.split(",");

		$scope.bucket_id = data.bucket_id;
		$scope.task_deadline1 = data.task_deadline_date;
		$scope.task_deadline12 = data.task_deadline_time;
		$scope.meta_tag_id = meta;
		$scope.mastertags = data.master_tag_id;
		$scope.update_id = data.id;
		$scope.active_status = data.active_status;
		$scope.block_title = data.title;
		$scope.task_block_email=data.BoardId;
		$scope.block_des = data.description;
		$scope.task_assign_user = task_usr;
		$scope.tasked_user = data.tasked_user;
		var due_date_status = data.due_date_status;
		if(due_date_status == 1){
			$scope.due_date_status = true;
		}else{
			$scope.due_date_status = false;			
		}
		$scope.task_sta = data.task_status;
		$scope.active_sta = data.active_status;
		$scope.file_data = data.file_data;

		var tbl1 = 'fb_blocks';
		var tbl2 = 'fb_block_stories';
		var formData = 'action=edit_master'+'&id='+data.master_tag_id+'&update_id='+data.id+'&id2='+data.id+'&table='+tbl1+'&table2='+tbl2;
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.related = response.data.master;
			$scope.stry_all = response.data.story_all;
			$scope.file_master = response.data.file_master;
		});
	}
	$scope.del_Tagblock = function(id) { 
		var formData = 'action=delete_Tagblock_fun'+'&id='+id;
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.apply_tags();
			$scope.content.splice(0,$scope.content.length);
		});
	}
	$scope.unact_str_tag = function(id) { 
		if($scope.user_role == 1){
			var formData = 'action=star_block_tag'+'&id='+id+'&active_status='+1;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				$scope.apply_tags();
				$scope.content.splice(0,$scope.content.length);
			});
		}
	}
	$scope.act_str_tag = function(id) { 
		if($scope.user_role == 1){
			var formData = 'action=star_block_tag'+'&id='+id+'&active_status='+0;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				$scope.apply_tags();
				$scope.content.splice(0,$scope.content.length);
			});
		}
	}
	$scope.del_per_block = function(id) { 
		var formData = 'action=delete_perblock_fun'+'&id='+id;
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.apply_people();
			$scope.content.splice(0,$scope.content.length);
		});
	}
	$scope.unact_str_person = function(id) { 
		if($scope.user_role == 1){
			var formData = 'action=star_block_perosn'+'&id='+id+'&active_status='+1;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				$scope.apply_people();
				$scope.content.splice(0,$scope.content.length);
			});
		}
	}
	$scope.act_str_person = function(id) { 
		if($scope.user_role == 1){
			var formData = 'action=star_block_perosn'+'&id='+id+'&active_status='+0;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				$scope.apply_people();
				$scope.content.splice(0,$scope.content.length);
			});
		}
	}
	$scope.block_user = function() { 
		var formData = 'action=create_block_user';
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.add_user=response.data;
		});
	}
	$scope.done_block = function(id,status,tbl,tag) { 
		var formData = 'action=mark_as_done'+'&id='+id+'&task_status='+status+'&table='+tbl;
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			if($scope.calender_view_n == true){
				if(tag == 1){
					$scope.apply_people();
				}else if(tag == 2){
					$scope.apply_tags();
				}else{
					$scope.bucket_list_data();
				}
			}else{
				$rootScope.calender_view();
			}
			$scope.content.splice(0,$scope.content.length);
		});
	}
	$scope.delete_bucket_fun= function(id,tbl1,tbl2){
		if($scope.user_role == 1){
			var formData = 'action=delete_bucket_fun'+'&id='+id+'&table1='+tbl1+'&table2='+tbl2;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				if($scope.calender_view_n == true){
						$scope.bucket_list_data();$scope.message='Bucket Deleted.';$scope.showSimpleToast();
					}else{
						$rootScope.calender_view();
					}
				$scope.content.splice(0,$scope.content.length);
			});
		}
	}
	$scope.mark_bucket_done= function(id,tbl){
		if($scope.user_role == 1){
			var formData = 'action=mark_all_done'+'&id='+id+'&table='+tbl;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				if($scope.calender_view_n == true){
						$scope.bucket_list_data();
					}else{
						$rootScope.calender_view();
					}
				$scope.content.splice(0,$scope.content.length);
			});
		}
	}
	$scope.lock_unlock_bucket= function(id,tbl,status){
		if($scope.user_role == 1){
			var formData = 'action=lock_unlock_bucket'+'&id='+id+'&table='+tbl+'&lock_status='+status;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				if($scope.calender_view_n == true){
						//$scope.bucket_list_data();
					}else{
						$rootScope.calender_view();
					}
				$scope.content.splice(0,$scope.content.length);
			});
		}
	}
	$scope.show_bucket_con= function(id,tbl,status){
		if($scope.user_role == 1){
			var formData = 'action=hide_show_bucket'+'&id='+id+'&table='+tbl+'&is_hide='+status;
			$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function (response) {
				if($scope.calender_view_n == true){
						//$scope.bucket_list_data();
					}else{
						$rootScope.calender_view();
					}
				$scope.content.splice(0,$scope.content.length);
			});
		}
	}
	$scope.hide_notify = function(id,tbl,status) { 
		if($scope.user_role == 1){
			var formData = 'action=hide_notify'+'&id='+id+'&table='+tbl+'&notify='+status;
				$http({
				method: "POST",
				url: 'modal/modal.php',
				data: formData,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function () {		
			});
		}
	}

	$scope.IfCheckMaster1 = function(response,check) {
		if (check) {
			$scope.idsMaster.push(response.Id);
			$scope.idsMasterName.push(response.Name);
		} else {
			var index = $scope.idsMaster.indexOf(response.Id);
			$scope.idsMaster.splice(index, 1);
			var indexMaster = $scope.idsMasterName.indexOf(response.Name);
			$scope.idsMasterName.splice(indexMaster, 1);
		}
	};
	$scope.IfCheckPeople1 = function(Id, Name,check) {
		if (check) {
			$scope.idsPeople.push(Id);
			$scope.idsPeopleName.push(Name);
		} else {
			var index = $scope.idsPeople.indexOf(Id);
			$scope.idsPeople.splice(index, 1);
			var indexName = $scope.idsPeopleName.indexOf(Name);
			$scope.idsPeopleName.splice(indexName, 1);
		}
	};

	$scope.apply_tags_shorting=function(sorting_tag){
		var formData = 'action=tagg_bucket_function'+'&blocks_tags='+$scope.idsMaster+'&sorting_tag='+sorting_tag+'&blocks_people='+$scope.idsPeople;
			$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			if($scope.check == true){
				var te = $scope.mainbucketdisplay;
				for (i = 0; i < te.length; i++) { 
					te[i].is_hide = 1;
				}
			}
			$scope.customerbucketdisplay=response.data;
			$scope.content.splice(0,$scope.content.length);
		});	
	}

	$scope.showSimpleToast = function() {
		var pinTo = $scope.getToastPosition();
		$mdToast.show(
		  $mdToast.simple()
		    .textContent($scope.message)
		    .position(pinTo )
		    .hideDelay(3000)
		);
	};
	$scope.showActionToast = function() {
	var pinTo = $scope.getToastPosition();
	var toast = $mdToast.simple()
	  .textContent($scope.message)
	  .action('UNDO')
	  .highlightAction(true) 
	  .highlightClass('md-accent')
	  .position(pinTo)
	  .hideDelay(5000);
	$mdToast.show(toast).then(function(response) {
	  if ( response == 'ok' ) {
	  	$scope.last_id;$scope.undo = 1;
	    $scope.del_block($scope.last_id,$scope.undo);
	  }
	});
	};

  	$scope.apply_dates=function(hr){
  		$scope.rmv_cal = true;
		$scope.cal = false;
		$scope.calender_view_y = true;
		$scope.calender_view_n = false;		
		if($scope.bucket_value == 3 || $scope.bucket_value == 1){
			var formdata = 'action=calender_list_time'+'&from_date='+$scope.from_date+'&to_date='+$scope.to_date+'&task_status='+1+'&bucket_value='+$scope.bucket_value+'&task_time='+hr;
		}
		else if($scope.bucket_value == 4){
			var formdata = 'action=calender_list_time'+'&from_date='+$scope.from_date+'&to_date='+$scope.to_date+'&bucket_value='+$scope.bucket_value+'&task_status='+0+'&task_time='+hr;
		}
			$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {			
			$scope.dates1=response.data.content;
			$scope.sort_date_name = ['Hours'];
			$scope.sort_date_time1 =response.data.time;
		});
		$scope.content.splice(0,$scope.content.length);
  	}
	$scope.assign_user = function(user,id,boolean) {		
		var table = "fb_blocks";
		var formdata = 'action=assign_user'+'&user='+user.id+'&id='+id+'&table='+table+'&boolean='+boolean;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
		});
	};
	$scope.archived_block_fn = function(id,tbl) {
		var formdata = 'action=archived_block_function'+'&bucket_id='+id+'&table='+tbl;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			if($scope.calender_view_n == true){
				$scope.bucket_list_data();
			}else{
				$rootScope.calender_view();
			}
			$scope.content.splice(0,$scope.content.length);
		});
	}
	$scope.low_sort = true;
	$scope.block_sort = function(boolean, low_sort, id) {
		var formdata = 'action=block_sort'+'&id='+id+'&low_sort='+low_sort;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.mainbucketdisplay = response.data;
		});
	}
	$rootScope.board_dis = function(){
		var formdata = 'action=board_dis';
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function(response){
			$scope.board_name = response.data.board_name;
		});
	}
	$rootScope.board_submit = function(data){
		var formdata = 'action=board_nadd'+'&board_name='+data;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function(response){
			if(response.data.error){
				$scope.message=response.data.error;$scope.showSimpleToast();
			}
			$rootScope.board_dis();
			$rootScope.boards_show();
		});
	}



	 // The Browser API key obtained from the Google API Console.
    // Replace with your own Browser API key, or your own key.
    var developerKey = 'AIzaSyDcJ-sDQMMy6XfxPlV2baVV-ODgHs9matw';

    // The Client ID obtained from the Google API Console. Replace with your own Client ID.
    var clientId = "766701981763-dubhjl5u6gbs3ie93mjdipjrqb37g1s2.apps.googleusercontent.com"

    // Replace with your own project number from console.developers.google.com.
    // See "Project number" under "IAM & Admin" > "Settings"
    var appId = "766701981763";

    // Scope to use to access user's Drive items.
    var scope = ['https://www.googleapis.com/auth/drive'];

    var pickerApiLoaded = false;
    var oauthToken;

    // Use the Google API Loader script to load the google.picker script.
    $scope.loadPicker = function(){
      gapi.load('auth', {'callback': onAuthApiLoad});
      gapi.load('picker', {'callback': onPickerApiLoad});
    }

    function onAuthApiLoad() {
      window.gapi.auth.authorize(
          {
            'client_id': clientId,
            'scope': scope,
            'immediate': false
          },
          handleAuthResult);
    }

    function onPickerApiLoad() {
      pickerApiLoaded = true;
      createPicker();
    }

    function handleAuthResult(authResult) {
      if (authResult && !authResult.error) {
        oauthToken = authResult.access_token;
        createPicker();
      }
    }

    // Create and render a Picker object for searching images.
    function createPicker() {
      if (pickerApiLoaded && oauthToken) {
        var view = new google.picker.View(google.picker.ViewId.DOCS);
        view.setMimeTypes("image/png,image/jpeg,image/jpg,application/vnd.google-apps.folder,text/plain,text/html,application/zip,text/plain,application/rtf,application/vnd.oasis.opendocument.text,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/epub+zip,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/x-vnd.oasis.opendocument.spreadsheet,application/pdf,text/csv,text/tab-separated-values,application/zip,image/svg+xml,application/pdf,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.openxmlformats-officedocument.presentationml.presentation,text/plain,text/plain");
        var picker = new google.picker.PickerBuilder()
            .enableFeature(google.picker.Feature.NAV_HIDDEN)
            .enableFeature(google.picker.Feature.MULTISELECT_ENABLED)
            .setAppId(appId)
            .setOAuthToken(oauthToken)
            .addView(google.picker.ViewId.DOCS)
            .addView(new google.picker.DocsUploadView())
            .setDeveloperKey(developerKey)
            .setCallback(pickerCallback)
            .build();
         picker.setVisible(true);
      }
    }

    // A simple callback implementation.
    function pickerCallback(data) {    	
      if (data.action == google.picker.Action.PICKED) {
        var temp = data.docs;
        for(var i= 0 ; i< temp.length; i++){
        	g_drive.push({
	            url: temp[i].url, 
	            name:  temp[i].name
        	});
        	
        } 		
      }
    }

	$scope.str_con_not = function(data,id,all_data){
		var formdata = 'action=str_con_not'+'&block_id='+id+'&info='+data;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function(response){
			$scope.edit_blk(all_data);
		});
    }
    $scope.file_name_data = function(data) {
    	var name = data.name;
		var formdata = 'action=file_name_data'+'&id='+data.id+'&name='+data.name;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function(response){
		});
	}
	$scope.ath_link = function(link,name,all_data){
		var temp = link;
		var temp2 = name;
		var formdata;
		if(temp.length >=1){
			formdata = 'action=ath_link'+'&url='+link+'&block_id='+all_data.id;
			if(temp2.length >=1){
				formdata += '&name='+name; 
			}
			$http({
				method: "POST",
				url: './modal/modal.php',
				data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function(response){
				$scope.edit_blk(all_data);
			});
		}else{
			alert('link can not be empty');
		}
    }
    $scope.str_convr = function(data,id,all_data){
		var formdata = 'action=str_convr'+'&block_id='+id+'&info='+data;
		$http({
		method: "POST",
		url: './modal/modal.php',
		data: formdata,
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function(response){
			$scope.edit_blk(all_data);
		});
	}
    $scope.del_board = function(){
    	if (confirm('Are you sure you want to delete this board?')) {
    		var formdata = 'action=del_board';
			$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).then(function(response){
				$rootScope.board_dis();
				$rootScope.boards_show();
				$rootScope.bucket_list_data();
				$scope.message='Board Deleted Success.';$scope.showSimpleToast();
			});
		} else {
		    
		}
	}

    $rootScope.board_save = function(){
    	if($scope.calender_view_y == true){
    		board_data = [];
    		board_data.push({
    			'from_date': $rootScope.from_date,
    			'to_date':  $rootScope.to_date,
    			'task_status': $scope.task_status,
    			'bucket_value': $scope.bucket_value,
    			'view': $scope.exp			
    		});
    		var formdata = 'action=board_save'+'&setting='+JSON.stringify(board_data)+'&sort='+'cal';
			
    	}else if($scope.exp == false){
    		board_data = [];
    		board_data.push({
    			'view': $scope.exp	
    		});
	    	var formdata = 'action=board_save'+'&setting='+JSON.stringify(board_data)+'&sort='+'exp';	    	
		}else{
	    	var formdata = 'action=board_save'+'&setting='+' '+'&sort='+' ';	   	

		}
		$http({
		method: "POST",
		url: './modal/modal.php',
		data: formdata,
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function(response){
			$scope.message='Board setting save.';$scope.showSimpleToast();				
		});
    }
}