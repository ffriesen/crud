customerCrud.config( function( $routeProvider ) {
$routeProvider. 
   when('/customers', {
    	templateUrl: 'partials/customer_list.html',
    	controller: 'customerListController'
   }).
   when('/customer/:customerID', {
    	templateUrl: 'partials/customer_details.html',
     controller: 'customerDetailController'
   }).
   when('/new_customer', {
   		templateUrl: 'partials/customer_form.html',
   		controller: 'newCustomerController'
   }).
   when('/customer/edit/:customerID', {
      templateUrl: 'partials/customer_form.html',
      controller:   'editCustomerController'
   }).
   otherwise({
    	redirectTo: '/customers'
   });
});