app.controller('archivedController',archivedControllerFn);  
function archivedControllerFn ($scope,$http,$timeout,$mdToast){
  $scope.letterLimit = 1;

  $scope.droppedObjects1 = [];
  $scope.drag=[];
  $scope.temp = [];
  $scope.onDragSuccess1=function(data,evt,bucket,id){
    $scope.drag = id;
        $scope.droppedObjects1 = bucket;
        var index = $scope.droppedObjects1.indexOf(data);
        if (index > -1) {
            $scope.droppedObjects1.splice(index, 1);
        }
    }
  $scope.onDropComplete1=function(data,evt,bucket,id){
    if(bucket === undefined){ 
      bucket = $scope.temp;   
    };
    $scope.droppedObjects1 = bucket;
        var index = $scope.droppedObjects1.indexOf(data);
        if (index == -1){
          $scope.droppedObjects1.push(data);
        }
        var temp = $scope.droppedObjects1;
        if(temp[temp.length-1] == null){
    }else{
        var formdata ='action=update_drag'+'&block_id='+$scope.drag+'&bucket_id='+id+'&table='+'fb_arch_block_data';
    $http({
      method: "POST",
      url: './modal/modal.php',
      data: formdata,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      var index = content.indexOf($scope.drag);
      if (index > -1) {
        content.splice(index, 1);
        }
        $scope.content = content; 
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
      }
    });
    }
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
  
  $scope.archBucketcreate = function() { 
     var formData = $('#arch_Bucket_create_form').serialize();
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
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
      $scope.reset();
     });
  }
  $scope.reset = function() {
    $scope.main_board = {};
    $scope.arch_Bucket_create_form.$setPristine();
  }
  $scope.bucketdisplaytag = function() { 
    var formData = 'action=tagBucketshow';
    $scope.getresponse = true;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
     }).then(function (response) {
      $timeout(function(){
        if(response){
        $scope.tagbucketdisplay=response.data;
          $scope.getresponse = false;
        }
      }, 800);
     });
  }
  $scope.blocks_result =[];
  $scope.options = [
  { id: 0, label: 'Master Tag blocks board', value: 0 },
  { id: 1, label: 'Person Tag blocks board', value: 1 },
  ];
  $scope.by_people=function(){
    $scope.countSelector = $scope.options[1];
    $scope.blocks_tag=false;
    $scope.blocks_board=true;
  }
  $scope.by_master_tag=function(){
    $scope.countSelector = $scope.options[0];
    $scope.blocks_tag=true;
    $scope.blocks_board=false;
  }
  $scope.by_people_sort=function(){
    $scope.countSelector = $scope.options[1];
    $scope.blocks_tag=false;
    $scope.blocks_board=true;
  }
  $scope.by_master_tag_sort=function(){
    $scope.countSelector = $scope.options[0];
    $scope.blocks_tag=true;
    $scope.blocks_board=false;
  }
  $scope.selection=[];
    $scope.toggleSelection = function toggleSelection(employeeName) {
    var idx = $scope.selection.indexOf(employeeName);
    if (idx > -1) {
      $scope.selection.splice(idx, 1);
    }
    else {
      $scope.selection.push(employeeName);
    }
  };
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
    $scope.cal = true;
  }
  $scope.expanded_view=function(){
    $scope.class = "expanded";
    $scope.class_hide_show = "class_hide";
    $scope.all_content = true;
    $scope.exp = false;
    $scope.contra = true;
    $scope.rmv_cal = true;
    $scope.cal = true;
  }
  $scope.remove_calender_view=function(){
    $scope.calender_view_y = false;
    $scope.calender_view_n = true;
    $scope.rmv_cal = false;
    $scope.contra = true;
    $scope.exp = true;
    $scope.cal = true;
  }
  $scope.dates;
  $scope.calender_view_n = true;
  $scope.calender_view_y = false;
  $scope.calender_view=function(){
    $scope.rmv_cal = true;
    $scope.contra = true;
    $scope.exp = true;
    $scope.cal = false;
    $scope.calender_view_y = true;
    $scope.calender_view_n = false;
    if($scope.bucket_value == 3){
      var formdata = 'action=calender_list_arch'+'&from_date='+$scope.from_date+'&to_date='+$scope.to_date+'&bucket_value='+$scope.bucket_value+'&task_status='+1;
    }
    else if($scope.bucket_value == 4){
      var formdata = 'action=calender_list_arch'+'&from_date='+$scope.from_date+'&to_date='+$scope.to_date+'&bucket_value='+$scope.bucket_value+'&task_status='+0;
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
  }
 $scope.bucket_filter=function(id){
    if(id!=2){
      $scope.usable = true;
    }
    else{
      $scope.usable = false;
    }   
  }
  $scope.usable = true;
  $scope.usable = !$scope.usable;
  $scope.doOperation = function(e) {
    if ($scope.usable !== true) {
      e.preventDefault();
    } else{
      if(($scope.from_date != '') || ($scope.to_date != '')){
      $scope.calender_view();
      }
      else{
        alert('Please Select Dates');
      }
    }
  }
  $scope.filter = !$scope.filter;
  $scope.bucket_option=function(){
    if($scope.countSelector.value==0){
      $scope.blocks_tag=true;
      $scope.blocks_board=false;
    }else{
      $scope.blocks_tag=false;
      $scope.blocks_board=true;
    }
  }
  $scope.myVar = false;
  $scope.changeName = function() {
    $scope.myVar = false;
    $scope.togglePerson = function() {
      $scope.myVar = true;
    };
  }
  $scope.custom_create = {
    create: true,
  }
  $scope.buckets_id = function(id) { 
    $scope.bucket_id=id;
  }
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
  $scope.add_cus_block = function() { 
   if($scope.due_date1==true){
      var due_date_status=1;
    }else{
      var due_date_status=0;
    }
    var master_id = $('#master_tags_id').val();
    var meta_id = $('#meta_tags_id').val();
    var task_users = $('#task_users').val();
    var formData = new FormData($('#Tag_Bucket_content_form')[0]);
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
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
      $scope.apply_tags();
      $scope.reset1();
    });
  }
  $scope.reset1 = function() {
    $scope.block = {};
    $scope.Tag_Bucket_content_form.$setPristine();
  }
  $scope.arch_block_data = function() { 
    var formData = 'action=archived_block_list';
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      $scope.archbucketdisplay=response.data;
       $scope.getresponse = false;
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
  $scope.del_block = function(id) { 
    var formData = 'action=delete_blockarch_fun'+'&id='+id;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      if($scope.calender_view_n == true){
          $scope.arch_block_data();$scope.message='Block deleted.';$scope.showSimpleToast();
        }else{
          $scope.calender_view();$scope.message='Block deleted.';$scope.showSimpleToast();
        }
      $scope.content.splice(0,$scope.content.length);
    });
  }
   $scope.del_block_cal = function(id) { 
    var formData = 'action=delete_blockarch_fun'+'&id='+id;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      $scope.calender_view();
    });
  }
  $scope.undo_block = function(id,status,tbl,tag) { 
    var formData = 'action=undo_block_data'+'&id='+id+'&task_status='+status+'&table='+tbl;
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
            $scope.arch_block_data();$scope.message='Block restore.';$scope.showSimpleToast();
          }
        }else{
          $scope.calender_view();
        }
      $scope.content.splice(0,$scope.content.length);
    });
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
  $scope.apply_tags=function(){
    var bucket_id=$scope.blocks_tags;
    var formdata ='action=sort_clients'+'&bucket_id='+bucket_id;
    $http({
      method: "POST",
      url: './modal/modal.php',
      data: formdata,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      $scope.sort_master = response.data;
      $scope.content.splice(0,$scope.content.length);
    });
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
    $scope.apply_people=function(){
    var bucket_id=$scope.blocks_people;
    var formdata ='action=sort_people'+'&bucket_id='+bucket_id;
    $http({
      method: "POST",
      url: './modal/modal.php',
      data: formdata,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      $scope.sort_people_data = response.data;
    });
  }
    $scope.unact_str_tag = function(id) { 
    var formData = 'action=star_block_tag'+'&id='+id+'&active_status='+1;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      $scope.apply_tags();
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
    });
  }
  $scope.act_str_tag = function(id) { 
    var formData = 'action=star_block_tag'+'&id='+id+'&active_status='+0;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      $scope.apply_tags();
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
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
      $scope.table2 = 'fb_archived_boards';
    if($scope.calender_view_n == true){
      var formdata ='action=filter_data_by_tags'+'&master_tags_id='+$scope.idsMaster+'&person_tags_id='+$scope.idsPeople+'&meta_tags_id='+$scope.idsMeta+'&table1='+$scope.table1+'&table='+$scope.table+'&table2='+$scope.table2;
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
                $scope.archbucketdisplay=response.data;
            $scope.content.splice(0,$scope.content.length);
              }
            }, 800);
      });
    }
    else{
      var formdata ='action=filter_data_by_dates'+'&master_tags_id='+$scope.idsMaster+'&meta_tags_id='+$scope.idsMeta+'&from_date='+$scope.from_date+'&to_date='+$scope.to_date+'&task_status='+1+'&bucket_value='+$scope.bucket_value+'&table='+$scope.table1;
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
  $scope.unactive_qw = function(id,tbl) { 
      if($scope.user_role <= 2){
      var formData = 'action=notification_bucket'+'&id='+id+'&active_status='+1+'&table='+tbl;
      $http({
        method: "POST",
        url: 'modal/modal.php',
        data: formData,
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      }).then(function (response) {
       if($scope.calender_view_n == true){
            $scope.arch_block_data();
          }else{
            $scope.calender_view();
          }
       $scope.content.splice(0,$scope.content.length);
      });
    }
  }
  $scope.active_qw = function(id,tbl) {
    if($scope.user_role <= 2){ 
      var formData = 'action=notification_bucket'+'&id='+id+'&active_status='+0+'&table='+tbl;;
      $http({
        method: "POST",
        url: 'modal/modal.php',
        data: formData,
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      }).then(function (response) {
       if($scope.calender_view_n == true){
            $scope.arch_block_data();
          }else{
            $scope.calender_view();
          }
       $scope.content.splice(0,$scope.content.length);
      });
    }
  }
  $scope.edit_blk = function(data) { 
    var tbl1 = 'fb_main_blocks';
    var formData = 'action=edit_master'+'&id='+data.master_tag_id+'&table='+tbl1;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      $scope.related = response.data;
    });
    $scope.task_deadline1 = data.task_deadline_date;
    $scope.task_deadline12 = data.task_deadline_time;
    $scope.meta_tag_id = data.meta;
    $scope.mastertags = data.master_tag_id;
    $scope.update_id = data.id;
    $scope.active_status = data.active_status;
    $scope.block_title = data.title;
    $scope.block_des = data.description;
    $scope.task_assign_user = data.task_usr;
    $scope.task_sta = data.task_status;
    $scope.active_sta = data.active_status;
    $scope.file_data = data.file_data;
  }
  $scope.edit_person_block = function() { 
    var master_id = $('.mastertags').val();
    var meta_id = $('.meta_tags_id').val();
    var formData = $('#edit_main_block').serialize();
    var formData = new FormData($('#edit_main_block')[0]);
    formData.append("master_tags_id", master_id);
    formData.append("meta_tags_id", meta_id);
    formData.append("task_users", task_users);
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': undefined,'Process-Data': false},
    }).then(function (response) {
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
      $scope.content.splice(0,$scope.content.length);
      $scope.msg1 = true;
      $scope.msg=response.data.done;
      $timeout(function(){
        $scope.msg1 = false;}, 2000);
      });
  }
  $scope.unact_str_person = function(id) { 
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
  $scope.act_str_person = function(id) { 
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
  $scope.statusBlock = function(Bucket_id,block_id,table) {
    var formdata ='action=change_block_status'+'&bucket_id='+Bucket_id+'&block_id='+block_id+'&table='+table;
    $http({
      method: "POST",
      url: './modal/modal.php',
      data: formdata,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
    });
  }
  $scope.delete_bucket_fun= function(id,tbl1,tbl2){
    var formData = 'action=delete_bucket_fun'+'&id='+id+'&table1='+tbl1+'&table2='+tbl2;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
    });
  }
  $scope.mark_bucket_done= function(id,tbl){
    var formData = 'action=mark_all_done'+'&id='+id+'&table='+tbl;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
  });
  }
  $scope.show_bucket_con= function(id,tbl,status){
    var formData = 'action=hide_show_bucket'+'&id='+id+'&table='+tbl+'&is_hide='+status;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
    });
  }
  $scope.lock_unlock_bucket= function(id,tbl,status){
    var formData = 'action=lock_unlock_bucket'+'&id='+id+'&table='+tbl+'&lock_status='+status;
    $http({
      method: "POST",
      url: 'modal/modal.php',
      data: formData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    }).then(function (response) {
      if($scope.calender_view_n == true){
          $scope.arch_block_data();
        }else{
          $scope.calender_view();
        }
    });
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
      $scope.del_block1($scope.last_id,$scope.undo);
    }
  });
  };
}