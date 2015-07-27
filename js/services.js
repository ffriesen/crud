customerCrud.factory('customerService', function($http){
	return {
		list: function(callback){
			$http.get('requests/get-customers.php').success(callback);
		},
		find: function(id, callback) {
			$http.get('requests/get-customers.php').success(function(data){
				var customer = data.filter(function(entry){
					return entry.customer_id === id;
				})[0];
				callback(customer);
			});
		},
		insert: function(data, callback) {
			$http.post("requests/insert-customer.php", data).success(callback).error(function(){console.log("error inserting customer.");});
		},
		update: function(data, conditions){
			var send = {"data":data, "conditions":conditions,"table":'customers'};
			$http.post("requests/update-customer.php", send).success(function(){console.log("updated");}).error(function(){console.log("error inserting customer.");});
		},
		remove: function(data){
			$http.post("requests/remove-customer.php", data).success(function(){console.log("deleted");}).error(function(){console.log("error removing customer.");});
		}
	};
});

customerCrud.factory('countryService', function($http){
	return {
		list: function(callback){
			$http.get('requests/get-countries.php').success(callback);
		}
	};
});