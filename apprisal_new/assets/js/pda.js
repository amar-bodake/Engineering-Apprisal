/* ----------------------------------------------------------------------------------

	script : angular JS

   ---------------------------------------------------------------------------------- */
(function() {

   	// angular module initialization
   	var modPDAC = angular.module('modPDAC', []); 

	// ------------------------------------------ 
	// controller Ctrl_2_10
	// ------------------------------------------
	modPDAC.controller('Ctrl_2_10', function($scope){

		$scope.tempActivity = { title : '', score : '' };

		$scope.pdac = {
			score: 0,
			value: 0,
			children: [],

		};

		$scope.dynamic = [];

		$scope.updateChildren = function(){

			// empty the chidren array
			$scope.pdac.children = [];

			for ( var i = 0; i < $scope.pdac.value; i++ ) {
				
				$scope.pdac.children.push( $scope.tempActivity );

			} // end of for

			$scope.calculate();

		}; // end of updateChildren()

		$scope.calculate = function(){

			$scope.pdac.score = 0;
			$scope.para2101 = 0;

			for(var i = 0 ; i < $scope.pdac.value; i++ ){				
				$scope.pdac.score += math.eval($scope.dynamic.children[i].score);
			}

			$scope.para2101 = math.eval($scope.para2101 + $scope.pdac.score);

		}; // end of calculate()



	}); // end of controller : Ctrl_2_10

	// ------------------------------------------ 
	// controller Ctrl_2_7
	// ------------------------------------------
	modPDAC.controller('Ctrl_2_7', function($scope){
		
	$scope.tempProgram = { duration : '', position : '' };

	$scope.tp = {
			score: 0,
			value: 0,
			children: [],

	};

	$scope.matrix = {
		twoweek: { coordinator: 9, cocoordinator: 5, member: 2 },
		oneweek: { coordinator: 6, cocoordinator: 3, member: 1 },
		lessthanweek: { coordinator: 3, cocoordinator: 2, member: 1 }
	};

	$scope.dynamic = [];

	$scope.updateChildren = function(){

			// empty the chidren array
			$scope.tp.children = [];

			for ( var i = 0; i < $scope.tp.value; i++ ) {
				
				$scope.tp.children.push( $scope.tempProgram );

			} // end of for

			$scope.calculate();

	}; // end of updateChildren()

	$scope.calculate = function(){

			$scope.tp.score = 0;
			$scope.para271 = 0;

			for(var i = 0 ; i < $scope.tp.value; i++ ){

				/*$scope.tp.score += $scope
									.matrix[$scope.dynamic.children[i].duration]
									.[$scope.dynamic.children[i].duration];	*/

				$scope.tempDuration = $scope.dynamic.children[i].duration;
				$scope.tempPosition = $scope.dynamic.children[i].position;
				$scope.tempMatrixDuration = $scope.matrix[$scope.tempDuration];
				$scope.tempScaledScore = $scope.tempMatrixDuration[$scope.tempPosition];

				$scope.tp.score += $scope.tempScaledScore;
				
			}

			$scope.para271 = math.eval( $scope.para271 + $scope.tp.score );

		}; // end of calculate()



	}); // end of controller : Ctrl_2_7


	// ------------------------------------------ 
	// controller Ctrl_2_8
	// ------------------------------------------
	modPDAC.controller('Ctrl_2_8', function($scope){
		
		$scope.programCountTwoWeek  = 0;
		$scope.programCountOneWeek = 0;
		$scope.programCountLessOneWeek = 0;

		$scope.updateProgramScore = function(){

			$scope.para281 =  ( 10 * $scope.programCountTwoWeek )
							+ ( 5 * $scope.programCountOneWeek )
							+ ( 3 * $scope.programCountLessOneWeek );

		};

		$scope.resetProgramCount =  function( checkbox ) {
				
		if( checkbox == 'opt28a' ){
			$scope.programCountTwoWeek = 0;
		} // end of 'if'	

		if( checkbox == 'opt28b' ){
			$scope.programCountOneWeek = 0;
		} // end of 'if'

		if( checkbox == 'opt28c' ){
			$scope.programCountLessOneWeek = 0;
		} // end of 'if'

		// recalculate the score
		$scope.updateProgramScore();

		};



	}); // end of controller : Ctrl_2_8



})();