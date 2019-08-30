app.controller('RegisterController',RegisterControllerFn); 
function RegisterControllerFn ($scope,$http,$timeout){
	$scope.phoneNumbr = /^\d{10}$/;
	$scope.Registration=function(eee){
		var formData = new FormData($('#reg_form')[0]);
		$http({
			method: "POST",
			url: 'modal/modal.php',
			data: formData,
			headers: {'Content-Type': undefined,'Process-Data': false}
		}).then(function (response) {
			$scope.msg1 = true;
			$scope.msg=response.data.done;
			$timeout(function(){
				$scope.msg1 = false;}, 2000);
			$scope.reset_form();
		});
	}
	$scope.reset_form = function() {
		$scope.reg_form = {};
	}
}