app.controller('MainCtrl',loginControllerFn);
function loginControllerFn ($scope,$http,$location,$window,$timeout,$rootScope,$mdToast){
	$scope.getresponse = false;
	$scope.board_show = false;	
	$scope.story_log = true;
	$scope.story_conv = true;
	$scope.story_note = true;
	$scope.story_email = true;

	$scope.userlogin = function() { 
		var formData = $('#loginuser').serialize();
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.username1 = response.data.main.username;
			$scope.login_id = response.data.main.id;
			$scope.img = response.data.main.profile_img;
			$scope.user_role = response.data.main.user_role;
			$scope.last_log = response.data.main.update_date;
			$rootScope.board_sort = response.data.board_sort;
			if(response.data.main != 0){
				$location.path('/Boards');
				if($rootScope.board_sort == 'cal'){
					$rootScope.board_set = JSON.parse(response.data.board_set.setting);
					$timeout(function () {
						$rootScope.header_select = 4;
	        			$rootScope.calender_view();
	    			}, 350);
				}else if($rootScope.board_sort == 'exp'){
					$rootScope.board_set = JSON.parse(response.data.board_set.setting);
					$timeout(function () {
						$rootScope.bucket_list_data();
	    			}, 350);
				}else{
					$timeout(function () {
						$rootScope.bucket_list_data();
	    			}, 350);
				}
			}
			else{
				$scope.msg1 = true;
				$scope.msg = response.data.fail;
				$timeout(function(){
					$scope.msg1 = false;}, 2000);
				$location.path('/login');
			}
		});
	}
	$scope.session_fun = function() {
		var InitData = $.param({action: "Initlogin"});
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: InitData,
			dataType :'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (data) {
			$scope.username1 = data.data.username;
			$scope.login_id = data.data.id;
			$scope.img = data.data.profile_img;
			$scope.user_role = data.data.user_role;
			$scope.last_log = data.data.update_date;
			if($scope.login_id == null ){
				$location.path('/login');
			}
			else{
			}

			var date = new Date();
			var hours = date.getHours();
			var minutes = date.getMinutes();
			var ampm = hours >= 12 ? 'pm' : 'am';
			hours = hours % 12;
			hours = hours ? hours : 12; // the hour '0' should be '12'
			minutes = minutes < 10 ? '0'+minutes : minutes;
			var strTime = hours + ':' + minutes + ' ' + ampm;
			$scope.time = strTime;

			date.setDate(date.getDate()+1);
			month = '' + (date.getMonth() + 1),
			day = '' + date.getDate(1),
			year = date.getFullYear();
			if (month.length < 2) month = '0' + month;
			if (day.length < 2) day = '0' + day;
			var tomorrow = [year, month, day].join('-');
			$scope.tomorrow = tomorrow;

			var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
			var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
			var d = new Date(firstDay),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(1),
			year = d.getFullYear();
			if (month.length < 2) month = '0' + month;
			if (day.length < 2) day = '0' + day;
			var t1 = [month, day, year].join('/');
			var d = new Date(lastDay),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(1),
			year = d.getFullYear();
			if (month.length < 2) month = '0' + month;
			if (day.length < 2) day = '0' + day;
			var t2 = [month, day, year].join('/');
			$rootScope.from_date = t1;
			$rootScope.to_date = t2;		
		}); 
	}
	$timeout( function(){
            $scope.last_hide = "hidden";
    }, 5000 );
	$scope.Logout = function() {
		var formData = 'action=logout_call';
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$window.location.reload();
			$location.path('/login');
		});
	}
	$scope.person_block_data1 = function() { 
		var formData = 'action=person_block_list';
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.archivedbucketdisplay1=response.data;
		});
	}
	$scope.tag_block_data1 = function() { 
		var formData = 'action=tag_block_list';
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.customerbucketdisplay1=response.data;
		});
	}
	$scope.user_list_data = function() {
		var formdata='action=user_list';
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.users=response.data;
		});
	}
	$scope.always_top= function(data){
		$scope.ids = data;
	}
	$scope.actived=true;
	$scope.actived_id=0;
	$scope.unactive = function() { 
		$scope.actived=false;
		$scope.actived_id=1;
	}
	$scope.active = function() { 
		$scope.actived=true;
		$scope.actived_id=0;
	}
	$rootScope.boards_show = function(){
		var formdata='action=boards_show';
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.boards=response.data;
		});	
	}
	$scope.board_session = function(data){
		var board_id = data.id;
		var board_name = data.name;
		var formdata='action=board_session'+'&board_id='+board_id+'&board_name='+board_name;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {	
			$rootScope.remove_calender_view();
			$rootScope.bucket_list_data();
			$rootScope.board_dis();
		});	
	}
	$scope.board_add = function(data){
		var add = data;
		var formdata='action=board_add'+'&board_name='+add;
		$http({
			method: "POST",
			url: './modal/modal.php',
			data: formdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		}).then(function (response) {
			$scope.message='Board created successfully';$scope.showSimpleToast();
			$rootScope.boards_show();
			$scope.board_data = '';			
		});	
	}
	var last = {bottom: true,top: false,left: false,right: true};
  	$scope.toastPosition = angular.extend({},last);

	$scope.getToastPosition = function() {
	sanitizePosition();
	return Object.keys($scope.toastPosition)
	  .filter(function(pos) { return $scope.toastPosition[pos]; })
	  .join(' ');
	};

	function sanitizePosition() {
	var current = $scope.toastPosition;
	if ( current.bottom && last.top ) current.top = false;
	if ( current.top && last.bottom ) current.bottom = false;
	if ( current.right && last.left ) current.left = false;
	if ( current.left && last.right ) current.right = false;
	last = angular.extend({},current);
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
}