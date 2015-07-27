customerCrud.controller('customerListController', function ($scope, customerService){

	customerService.list(function(list){
		$scope.customerList = list;
	});
	$scope.sortField="customer_name";
	$scope.reverse = false;

});

customerCrud.controller('customerDetailController', function ($scope, customerService, $routeParams){

	customerService.find($routeParams.customerID, function(customer){
		$scope.customer = customer;
	});
});

customerCrud.controller('newCustomerController', function($scope, countryService, customerService){
	$scope.message = "To add new customer, you seek!";
	$scope.formType = "New";
	countryService.list(function(list){
		$scope.countries = list;
	});

	$scope.saveCustomer = function(){
		console.log($scope.customer);
		customerService.insert($scope.customer, function(){
			$scope.customer = {};
		});
	};
});

customerCrud.controller('editCustomerController', function($scope, $routeParams, customerService, countryService){
	$scope.message = "To update a customer, you seek!";
	$scope.formType = "Edit";

	countryService.list(function(list){
		$scope.countries = list;
	});

	customerService.find($routeParams.customerID, function(customer){
		$scope.customer = customer;
	});

	$scope.saveCustomer = function(){
		console.log($routeParams.customerID);
		$scope.customer.updated_at = "now()";
		$scope.customer.updated_by = 2;
		customerService.update($scope.customer,{"customer_id":$routeParams.customerID});
	};
	$scope.deleteCustomer = function(){
		var data = {"customer_id":$routeParams.customerID};
		var send = {"data":data, "table":"customers"};
		customerService.remove(send);
	};
});