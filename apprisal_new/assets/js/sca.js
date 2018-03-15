/* ----------------------------------------------------------------------------------

	script : angular JS

   ---------------------------------------------------------------------------------- */
(function() {

   	// angular module initialization
   	var modSCA = angular.module('modSCA', []); 

	// ------------------------------------------ 
	// controller Ctrl_1_2_1
	// ------------------------------------------
	modSCA.controller('Ctrl_1_2_1', function($scope){

		$scope.tempActivity = { title : '', score : '' };

		$scope.sca = {
			score: 0,
			value: 0,
			children: [],

		};
        
		$scope.dynamic = [];

		$scope.updateChildrenCount = function(){
			if(!$scope.checked1){
				
				// empty the chidren array
				$scope.sca.children = [];
				// set to '0'
				$scope.sca.value = 0;
				// update total score				
				$scope.para121 = math.eval($scope.para121 - $scope.sca.score);
				// reset to 0
				$scope.sca.score = 0;
				// re-calculate children
				$scope.updateChildren();				
				
			}
		}; // end of updateChildrenCount();


		$scope.updateChildren = function(){

			// empty the chidren array
			$scope.sca.children = [];

			for ( var i = 0; i < $scope.sca.value; i++ ) {
				
				$scope.sca.children.push( $scope.tempActivity );

			} // end of for

			$scope.calculate();

		}; // end of updateChildren()

		$scope.calculate = function(){

			$scope.sca.score = 0;
			//$scope.para121 = 0;

			for(var i = 0 ; i < $scope.sca.value; i++ ){				
				$scope.sca.score += math.eval($scope.dynamic.children[i].score);
			}

			//$scope.para121 = math.eval($scope.para121 + $scope.sca.score);

		}; // end of calculate()



	}); // end of controller : Ctrl_1_2_1



	// ------------------------------------------ 
	// controller Ctrl_1_2_2
	// ------------------------------------------
	modSCA.controller('Ctrl_1_2_2', function($scope){

		//$scope.model = '';

		$scope.tempActivity = { title : '', score : '' };		

		$scope.sca = {
			score: 0,
			value: 0,
			children: [],
		};

		$scope.dynamic = [];

		$scope.updateChildrenCount122 = function(){
			if(!$scope.checked2){
				
				// empty the chidren array
				$scope.sca.children = [];
				// set to '0'
				$scope.sca.value = 0;
				// update total score				
				$scope.para122 = math.eval($scope.para122 - $scope.sca.score);
				// reset to 0
				$scope.sca.score = 0;
				// re-calculate children
				$scope.updateChildren();				
				
			}
		}; // end of updateChildrenCount();

		$scope.updateChildren = function(){			

			// empty the chidren array
			$scope.sca.children = [];

			for ( var i = 0; i < $scope.sca.value; i++ ) {
				
				$scope.sca.children.push( $scope.tempActivity );

			} // end of for

			$scope.calculate();

		}; // end of updateChildren()

		$scope.calculate = function(){

			$scope.sca.score = 0;
			//$scope.para122 = 0;

			for(var i = 0 ; i < $scope.sca.value; i++ ){			    
				$scope.sca.score += math.eval($scope.dynamic.children[i].score);
			}

			//$scope.para122 = math.eval($scope.para122 + $scope.sca.score);

		}; // end of calculate()

		$scope.resetSelect = function( accessCtrl, accessPos, accessModel ){			

			var posCtrl = jQuery('#' + accessPos);
			var accessCtrl = jQuery('#' + accessCtrl);

			if( !accessCtrl.is(':checked') ){

				$scope[accessModel] = '';

			} //  end of if

		} // end of reserSelect()


	}); // end of controller : Ctrl_1_2_2

})();