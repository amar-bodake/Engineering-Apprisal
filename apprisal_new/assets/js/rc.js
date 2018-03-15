/* ----------------------------------------------------------------------------------

	script : angular JS

   ---------------------------------------------------------------------------------- */
(function() {

   	// angular module initialization
   	var modResearchContribution = angular.module('moduleRC', []); 

   	// prototype RC
   	var _rc = {};

   	if( typeof protoRC !== 'undefined' && Object.keys(protoRC).length ){

   		_rc = protoRC;

   		console.log( _rc );

   	}

	// ------------------------------------------ 
	// controller 3.1
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_1', function(){

		this.articlesTemp = { totalAuthors: 0, authorPosition: 0 };
		this.articleCountOptions = [ '0', '1', '2', '3' ];
		this.articleOptions = [ '2', '3', '4' ];
		this.positionOptions = [ '1', '2', '3', '4' ];

		// proportional score
	   	this.scoreProprtions ={
			  2 : { 1 : 70, 2 : 30 },
			  3 : { 1 : 50, 2 : 30, 3 : 20 },
			  4 : { 1 : 40, 2 : 30, 3 : 20, 4 : 10 }
		};

		this.dynamicArticles = {};		
		
		this.articles = {

			3.1: { scale: 12, score:0 },

			scopus : {

				scale : 5,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of scopus

			wos : {

				scale : 3,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of wos i.e. web of science

			gs : {

				scale : 2,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of gs i.e. google scholar

		};		

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){		 	

		 	// section score
	   		this.articles[3.1].score = math.eval( _rc['rc-threeOne'] );

	   		_rc['rc-threeOneH'] ? ( this.hodScore = math.eval( _rc['rc-threeOneH']) ) : ( this.hodScore = this.articles[3.1].score ) ;
			

	   		// scopus
		   		var scopusCnt = _rc['rc311-cnt'];
		   		// check if value is '?'
		   		if( scopusCnt == '?' ){
		   			scopusCnt = '0';
		   		}
		   		this.articles.scopus.count = math.eval( scopusCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.scopus.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc311-' + j + '-ap';
		   		var titleTA = 'rc311-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.scopus.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - scopus
	   		
	   		// wos
		   		var wosCnt = _rc['rc312-cnt'];
		   		// check if value is '?'
		   		if( wosCnt == '?' ){
		   			wosCnt = '0';
		   		}
		   		this.articles.wos.count = math.eval( wosCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.wos.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc312-' + j + '-ap';
		   		var titleTA = 'rc312-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.wos.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - wos

	   		// gs
		   		var gsCnt = _rc['rc313-cnt'];
		   		// check if value is '?'
		   		if( gsCnt == '?' ){
		   			gsCnt = '0';
		   		}
		   		this.articles.gs.count = math.eval( gsCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.gs.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc313-' + j + '-ap';
		   		var titleTA = 'rc313-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.gs.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - gs

		 }// end of if

		this.articleCount = function( article ){

			// empty the article array & object
			this.articles[article].articles = [];
			// re-evaluate the score to 0
			this.articles[article].score = 0

			if( this.dynamicArticles.hasOwnProperty(article) ){
				this.dynamicArticles[article] = {};			
			}

			for( var i = 0; i < this.articles[article].count; i++ ){

				this.articles[article].articles.push( this.articlesTemp );

			} // end of for

			// update 3.1 score
			this.updateSectionScore();
			
		}; //  end of articleCount()


		this.calculate = function ( article ){

			if( this.dynamicArticles.hasOwnProperty(article) ){

				// re-evaluate the score to 0
				this.articles[article].score = 0

				// assign the dynamically generated
				// artiles to the native object array
				this.articles[article].articles = this.dynamicArticles[article].articles;

				// iterate over the object of arrays
				// & update the scopus scores
				for( var loopingArticle in this.articles[article].articles ){

					var temp_totalAuthors = this.articles[article].articles[loopingArticle].totalAuthors;
					var temp_authorPosition = this.articles[article].articles[loopingArticle].authorPosition;

					this.articles[article].score = this.articles[article].score
													+ (( this.scoreProprtions[temp_totalAuthors][temp_authorPosition] / 100 )
														* this.articles[article].scale );
					
				} //  end of for-in

				// round up the scores
				this.articles[article].score = Math.round( this.articles[article].score );

				// update 3.1 score
				this.updateSectionScore();
					
			} // end of if

		}; //  end of calculate()


		this.updateSectionScore = function(){

			// re-evaluate to 0
			this.articles[3.1].score = 0;
			// final evaluation
			this.articles[3.1].score = this.articles.scopus.score + this.articles.wos.score	+ this.articles.gs.score;

		};

	
	}); // end of controller : 3.1


	// ------------------------------------------ 
	// controller 3.2
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_2', function(){

		this.articlesTemp = { totalAuthors: 0, authorPosition: 0 };
		this.articleCountOptions = [ '0', '1', '2', '3' ];
		this.articleOptions = [ '2', '3', '4' ];
		this.positionOptions = [ '1', '2', '3', '4' ];

		// proportional score
	   	this.scoreProprtions ={
			  2 : { 1 : 70, 2 : 30 },
			  3 : { 1 : 50, 2 : 30, 3 : 20 },
			  4 : { 1 : 40, 2 : 30, 3 : 20, 4 : 10 }
		};

		this.dynamicArticles = {};		
		
		this.articles = {

			3.2: { scale: 6, score:0 },

			issn : {

				scale : 3,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of issn			

		};

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){

		 	// section score
	   		this.articles[3.2].score = math.eval( _rc['rc-threeTwo'] );

	   		// hod score
			_rc['rc-threeTwoH'] ? ( this.hodScore = math.eval( _rc['rc-threeTwoH']) ) : ( this.hodScore = this.articles[3.2].score ) ;
		 	
		 	// issn
		   		var issnCnt = _rc['rc321-cnt'];		   		
		   		// check if value is '?'
		   		if( issnCnt == '?' ){
		   			issnCnt = '0';
		   		}
		   		
		   		this.articles.issn.count = math.eval( issnCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.issn.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc321-' + j + '-ap';
		   		var titleTA = 'rc321-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.issn.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - issn

		 } // end of if
		 
		this.articleCount = function( article ){

			// empty the article array & object
			this.articles[article].articles = [];
			// re-evaluate the score to 0
			this.articles[article].score = 0

			if( this.dynamicArticles.hasOwnProperty(article) ){
				this.dynamicArticles[article] = {};			
			}

			for( var i = 0; i < this.articles[article].count; i++ ){

				this.articles[article].articles.push( this.articlesTemp );

			} // end of for

			// update 3.1 score
			this.updateSectionScore();
			
		}; //  end of articleCount()


		this.calculate = function ( article ){

			if( this.dynamicArticles.hasOwnProperty(article) ){

				// re-evaluate the score to 0
				this.articles[article].score = 0

				// assign the dynamically generated
				// artiles to the native object array
				this.articles[article].articles = this.dynamicArticles[article].articles;

				// iterate over the object of arrays
				// & update the scopus scores
				for( var loopingArticle in this.articles[article].articles ){

					var temp_totalAuthors = this.articles[article].articles[loopingArticle].totalAuthors;
					var temp_authorPosition = this.articles[article].articles[loopingArticle].authorPosition;

					this.articles[article].score = this.articles[article].score
													+ (( this.scoreProprtions[temp_totalAuthors][temp_authorPosition] / 100 )
														* this.articles[article].scale );
					
				} //  end of for-in

				// round up the scores
				this.articles[article].score = Math.round( this.articles[article].score );

				// update 3.1 score
				this.updateSectionScore();
					
			} // end of if

		}; //  end of calculate()


		this.updateSectionScore = function(){

			// re-evaluate to 0
			this.articles[3.2].score = 0;
			// final evaluation
			this.articles[3.2].score = this.articles.issn.score;

		};

	
	}); // end of controller : 3.2

	

	// ------------------------------------------ 
	// controller 3.3
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_3', function(){

		this.articlesTemp = { totalAuthors: 0, authorPosition: 0 };
		this.articleCountOptions = [ '0', '1', '2', '3' ];
		this.articleOptions = [ '2', '3', '4' ];
		this.positionOptions = [ '1', '2', '3', '4' ];

		// proportional score
	   	this.scoreProprtions ={
			  2 : { 1 : 70, 2 : 30 },
			  3 : { 1 : 50, 2 : 30, 3 : 20 },
			  4 : { 1 : 40, 2 : 30, 3 : 20, 4 : 10 }
		};

		this.dynamicArticles = {};		
		
		this.articles = {

			3.3: { scale: 5, score:0 },

			international : {

				scale : 2,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of international

			national : {

				scale : 1,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of national			

		};

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){

		 	// section score
	   		this.articles[3.3].score = math.eval( _rc['rc-threeThree'] );

	   		// hod score 
			_rc['rc-threeThreeH'] ? ( this.hodScore = math.eval( _rc['rc-threeThreeH']) ) : ( this.hodScore = this.articles[3.3].score ) ;
		 	
		 	// international
		   		var internationalCnt = _rc['rc331-cnt'];		   		
		   		// check if value is '?'
		   		if( internationalCnt == '?' ){
		   			internationalCnt = '0';
		   		}
		   		
		   		this.articles.international.count = math.eval( internationalCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.international.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc331-' + j + '-ap';
		   		var titleTA = 'rc331-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.international.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - international

	   		// national
		   		var nationalCnt = _rc['rc332-cnt'];		   		
		   		// check if value is '?'
		   		if( nationalCnt == '?' ){
		   			nationalCnt = '0';
		   		}
		   		
		   		this.articles.national.count = math.eval( nationalCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.national.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc332-' + j + '-ap';
		   		var titleTA = 'rc332-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.national.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - national

		 } // end of if


		this.articleCount = function( article ){

			// empty the article array & object
			this.articles[article].articles = [];
			// re-evaluate the score to 0
			this.articles[article].score = 0

			if( this.dynamicArticles.hasOwnProperty(article) ){
				this.dynamicArticles[article] = {};			
			}

			for( var i = 0; i < this.articles[article].count; i++ ){

				this.articles[article].articles.push( this.articlesTemp );

			} // end of for

			// update 3.3 score
			this.updateSectionScore();
			
		}; //  end of articleCount()


		this.calculate = function ( article ){

			if( this.dynamicArticles.hasOwnProperty(article) ){

				// re-evaluate the score to 0
				this.articles[article].score = 0

				// assign the dynamically generated
				// artiles to the native object array
				this.articles[article].articles = this.dynamicArticles[article].articles;

				// iterate over the object of arrays
				// & update the scopus scores
				for( var loopingArticle in this.articles[article].articles ){

					var temp_totalAuthors = this.articles[article].articles[loopingArticle].totalAuthors;
					var temp_authorPosition = this.articles[article].articles[loopingArticle].authorPosition;

					this.articles[article].score = this.articles[article].score
													+ (( this.scoreProprtions[temp_totalAuthors][temp_authorPosition] / 100 )
														* this.articles[article].scale );
					
				} //  end of for-in

				// round up the scores
				this.articles[article].score = Math.round( this.articles[article].score );

				// update 3.1 score
				this.updateSectionScore();
					
			} // end of if

		}; //  end of calculate()


		this.updateSectionScore = function(){

			// re-evaluate to 0
			this.articles[3.3].score = 0;
			// final evaluation
			this.articles[3.3].score = this.articles.international.score + this.articles.national.score;

		};

	
	}); // end of controller : 3.3


	// ------------------------------------------ 
	// controller 3.4
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_4', function(){

		this.articlesTemp = { totalAuthors: 0, authorPosition: 0 };
		this.articleCountOptions = [ '0', '1', '2', '3' ];
		this.articleOptions = [ '2', '3', '4' ];
		this.positionOptions = [ '1', '2', '3', '4' ];

		// proportional score
	   	this.scoreProprtions ={
			  2 : { 1 : 70, 2 : 30 },
			  3 : { 1 : 50, 2 : 30, 3 : 20 },
			  4 : { 1 : 40, 2 : 30, 3 : 20, 4 : 10 }
		};

		this.dynamicArticles = {};		
		
		this.articles = {

			3.4: { scale: 6, score:0 },

			books : {

				scale : 3,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of books

			chapters : {

				scale : 3,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of chapters					

		};

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){

		 	// section score
	   		this.articles[3.4].score = math.eval( _rc['rc-threeFour'] );

	   		// hod score	   		
	   		_rc['rc-threeFourH'] ? ( this.hodScore = math.eval( _rc['rc-threeFourH']) ) : ( this.hodScore = this.articles[3.4].score ) ;
		 	
		 	// books
		   		var bookCnt = _rc['rc341-cnt'];		   		
		   		// check if value is '?'
		   		if( bookCnt == '?' ){
		   			bookCnt = '0';
		   		}
		   		
		   		this.articles.books.count = math.eval( bookCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.books.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc341-' + j + '-ap';
		   		var titleTA = 'rc341-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.books.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - international

	   		// chapters
		   		var chapterCnt = _rc['rc342-cnt'];		   		
		   		// check if value is '?'
		   		if( chapterCnt == '?' ){
		   			chapterCnt = '0';
		   		}
		   		
		   		this.articles.chapters.count = math.eval( chapterCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.chapters.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc342-' + j + '-ap';
		   		var titleTA = 'rc342-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.chapters.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - national

		 } // end of if


		this.articleCount = function( article ){

			// empty the article array & object
			this.articles[article].articles = [];
			// re-evaluate the score to 0
			this.articles[article].score = 0

			if( this.dynamicArticles.hasOwnProperty(article) ){
				this.dynamicArticles[article] = {};			
			}

			for( var i = 0; i < this.articles[article].count; i++ ){

				this.articles[article].articles.push( this.articlesTemp );

			} // end of for

			// update 3.3 score
			this.updateSectionScore();
			
		}; //  end of articleCount()


		this.calculate = function ( article ){

			if( this.dynamicArticles.hasOwnProperty(article) ){

				// re-evaluate the score to 0
				this.articles[article].score = 0

				// assign the dynamically generated
				// artiles to the native object array
				this.articles[article].articles = this.dynamicArticles[article].articles;

				// iterate over the object of arrays
				// & update the scopus scores
				for( var loopingArticle in this.articles[article].articles ){

					var temp_totalAuthors = this.articles[article].articles[loopingArticle].totalAuthors;
					var temp_authorPosition = this.articles[article].articles[loopingArticle].authorPosition;

					this.articles[article].score = this.articles[article].score
													+ (( this.scoreProprtions[temp_totalAuthors][temp_authorPosition] / 100 )
														* this.articles[article].scale );
					
				} //  end of for-in

				// round up the scores
				this.articles[article].score = Math.round( this.articles[article].score );

				// update 3.1 score
				this.updateSectionScore();
					
			} // end of if

		}; //  end of calculate()


		this.updateSectionScore = function(){

			// re-evaluate to 0
			this.articles[3.4].score = 0;
			// final evaluation
			this.articles[3.4].score = this.articles.books.score + this.articles.chapters.score;

		};

	
	}); // end of controller : 3.4

	// ------------------------------------------ 
	// controller 3.5
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_5', function(){

		this.articlesTemp = { totalAuthors: 0, authorPosition: 0 };
		this.articleCountOptions = [ '0', '1', '2', '3' ];
		this.articleOptions = [ '2', '3', '4' ];
		this.positionOptions = [ '1', '2', '3', '4' ];

		// proportional score
	   	this.scoreProprtions ={
			  2 : { 1 : 70, 2 : 30 },
			  3 : { 1 : 50, 2 : 30, 3 : 20 },
			  4 : { 1 : 40, 2 : 30, 3 : 20, 4 : 10 }
		};

		this.dynamicArticles = {};		
		
		this.articles = {

			3.5: { scale: 4, score:0 },

			publication : {

				scale : 2,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of publication

			chapters : {

				scale : 2,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of chapters					

		};


		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){

		 	// section score
	   		this.articles[3.5].score = math.eval( _rc['rc-threeFive'] );

	   		// hod score 
			_rc['rc-threeFiveH'] ? ( this.hodScore = math.eval( _rc['rc-threeFiveH']) ) : ( this.hodScore = this.articles[3.5].score ) ;
		 	
		 	// publication
		   		var publicationsCnt = _rc['rc351-cnt'];		   		
		   		// check if value is '?'
		   		if( publicationsCnt == '?' ){
		   			publicationsCnt = '0';
		   		}
		   		
		   		this.articles.publication.count = math.eval( publicationsCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.publication.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc351-' + j + '-ap';
		   		var titleTA = 'rc351-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.publication.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - publication

	   		// chapters
		   		var chapterCnt = _rc['rc352-cnt'];		   		
		   		// check if value is '?'
		   		if( chapterCnt == '?' ){
		   			chapterCnt = '0';
		   		}
		   		
		   		this.articles.chapters.count = math.eval( chapterCnt.split(":").pop() );

		   		for( var i=0; i < this.articles.chapters.count; i++ ){
		   		
		   		var j = i + 1;

		   		var titleAP = 'rc352-' + j + '-ap';
		   		var titleTA = 'rc352-' + j + '-ta';

		   		var _tempAP = _rc[titleAP].split(":").pop();
		   		var _tempTA = _rc[titleTA].split(":").pop();

		   		this.articles.chapters.articles.push( { totalAuthors: _tempTA, authorPosition: _tempAP } );
   		
	   		} // end of for - chapters

		 } // end of if


		this.articleCount = function( article ){

			// empty the article array & object
			this.articles[article].articles = [];
			// re-evaluate the score to 0
			this.articles[article].score = 0

			if( this.dynamicArticles.hasOwnProperty(article) ){
				this.dynamicArticles[article] = {};			
			}

			for( var i = 0; i < this.articles[article].count; i++ ){

				this.articles[article].articles.push( this.articlesTemp );

			} // end of for

			// update 3.3 score
			this.updateSectionScore();
			
		}; //  end of articleCount()


		this.calculate = function ( article ){

			if( this.dynamicArticles.hasOwnProperty(article) ){

				// re-evaluate the score to 0
				this.articles[article].score = 0

				// assign the dynamically generated
				// artiles to the native object array
				this.articles[article].articles = this.dynamicArticles[article].articles;

				// iterate over the object of arrays
				// & update the scopus scores
				for( var loopingArticle in this.articles[article].articles ){

					var temp_totalAuthors = this.articles[article].articles[loopingArticle].totalAuthors;
					var temp_authorPosition = this.articles[article].articles[loopingArticle].authorPosition;

					this.articles[article].score = this.articles[article].score
													+ (( this.scoreProprtions[temp_totalAuthors][temp_authorPosition] / 100 )
														* this.articles[article].scale );
					
				} //  end of for-in

				// round up the scores
				this.articles[article].score = Math.round( this.articles[article].score );

				// update 3.1 score
				this.updateSectionScore();
					
			} // end of if

		}; //  end of calculate()


		this.updateSectionScore = function(){

			// re-evaluate to 0
			this.articles[3.5].score = 0;
			// final evaluation
			this.articles[3.5].score = this.articles.publication.score + this.articles.chapters.score;

		};

	
	}); // end of controller : 3.5

	// ------------------------------------------ 
	// controller 3.6
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_6', function(){

		this.rcThreeSix = 0;
		this.rc36A = 'NA';
		this.rc36B = 'NA';				

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){
		 	// section score
	   		this.rcThreeSix = math.eval( _rc['rc-threeSix'] );
	   		//a
	   		this.rc36A = _rc['rc36-a'];
	   		//b
	   		this.rc36B = _rc['rc36-b'];
	   		// hod score
			_rc['rc-threeSixH'] ? ( this.hodScore = math.eval( _rc['rc-threeSixH']) ) : ( this.hodScore = this.rcThreeSix ) ;

		 } // end of if
	
	}); // end of controller : 3.6


	// ------------------------------------------ 
	// controller 3.7
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_7', function(){

		this.rcThreeSeven = 0;
		this.rc37A = 'NA';
		this.rc37B = 'NA';				

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){
		 	// section score
	   		this.rcThreeSeven = math.eval( _rc['rc-threeSeven'] );
	   		// a
	   		this.rc37A = _rc['rc37-a'];
	   		// b
	   		this.rc37B = _rc['rc37-b'];
	   		// hod score			
			_rc['rc-threeSevenH'] ? ( this.hodScore = math.eval( _rc['rc-threeSevenH']) ) : ( this.hodScore = this.rcThreeSeven ) ;

		 } // end of if
	
	}); // end of controller : 3.7


	// ------------------------------------------ 
	// controller 3.8
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_8', function(){

		this.confTemp = { position: '' };
		this.confCountOptions = [ '0', '1', '2', '3' ];
		this.confOptions = [ 'coordinator', 'cocoordinator', 'member' ];

		// proportional score
	   	this.scoreProprtions ={
			  coordinator : 60,
			  cocoordinator : 30,
			  member : 10
		};

		this.dynamicConf = {};		
		
		this.conf = {

			3.8: { scale: 10, score:0 },

			lvlInternational : {

				scale : 10,
				score : 0,
				count : 0,
				confs : [],

			}, //  end of lvlInternational

			lvlNational : {

				scale : 5,
				score : 0,
				count : 0,
				confs : [],

			}, //  end of lvlNational					

		};

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){

		 	// section score
	   		this.conf[3.8].score = math.eval( _rc['rc-threeEight'] );

	   		// hod score
			_rc['rc-threeEightH'] ? ( this.hodScore = math.eval( _rc['rc-threeEightH']) ) : ( this.hodScore = this.conf[3.8].score ) ;
		 	
		 	// international
		   		var internationalCnt = _rc['rc381-cnt'];		   		
		   		// check if value is '?'
		   		if( internationalCnt == '?' ){
		   			internationalCnt = '0';
		   		}
		   		
		   		this.conf.lvlInternational.count = math.eval( internationalCnt.split(":").pop() );

		   		for( var i=0; i < this.conf.lvlInternational.count; i++ ){
		   		
		   		var j = i + 1;

		   		var internationalPos = 'rc381-' + j;		   		

		   		var tempPos = _rc[internationalPos].split(":").pop();
		   		
		   		this.conf.lvlInternational.confs.push( { position: tempPos } );
   		
	   		} // end of for - international

	   		// national
		   		var nationalCnt = _rc['rc382-cnt'];		   		
		   		// check if value is '?'
		   		if( nationalCnt == '?' ){
		   			nationalCnt = '0';
		   		}
		   		
		   		this.conf.lvlNational.count = math.eval( nationalCnt.split(":").pop() );

		   		for( var i=0; i < this.conf.lvlNational.count; i++ ){
		   		
		   		var j = i + 1;

		   		var nationalPos = 'rc382-' + j;		   		

		   		var tempPos = _rc[nationalPos].split(":").pop();
		   		
		   		this.conf.lvlNational.confs.push( { position: tempPos } );
   		
	   		} // end of for - national


		 } // end of if

		this.confCount = function( conf ){

			// empty the article array & object
			this.conf[conf].confs = [];
			// re-evaluate the score to 0
			this.conf[conf].score = 0

			if( this.dynamicConf.hasOwnProperty(conf) ){
				this.dynamicConf[conf] = {};			
			}

			for( var i = 0; i < this.conf[conf].count; i++ ){

				this.conf[conf].confs.push( this.confTemp );

			} // end of for

			// update 3.3 score
			this.updateSectionScore();
			
		}; //  end of articleCount()


		this.calculate = function ( conf ){

			if( this.dynamicConf.hasOwnProperty(conf) ){

				// re-evaluate the score to 0
				this.conf[conf].score = 0

				// assign the dynamically generated
				// artiles to the native object array
				this.conf[conf].confs = this.dynamicConf[conf].confs;

				// iterate over the object of arrays
				// & update the scopus scores
				for( var loopingConf in this.conf[conf].confs ){

					var temp_position = this.conf[conf].confs[loopingConf].position;					

					this.conf[conf].score = this.conf[conf].score
													+ (( this.scoreProprtions[temp_position]/ 100 )
														* this.conf[conf].scale );
					
				} //  end of for-in

				// round up the scores
				this.conf[conf].score = Math.round( this.conf[conf].score );

				// update 3.1 score
				this.updateSectionScore();
					
			} // end of if

		}; //  end of calculate()


		this.updateSectionScore = function(){

			// re-evaluate to 0
			this.conf[3.8].score = 0;
			// final evaluation
			this.conf[3.8].score = this.conf.lvlInternational.score + this.conf.lvlNational.score;

		};

	
	}); // end of controller : 3.8

	// ------------------------------------------ 
	// controller 3.9
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_9', function(){

		this.proj = {

			3.9: { scale: 18, score:0 },

			a : {

				scale : 10,
				score : 0,			

			}, //  end of a

			b : {

				scale : 6,
				score : 0,

			}, //  end of b	

			c : {

				scale : 2,
				score : 0,

			}, //  end of c


		};

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){

		 	// a
		   	this.proj.a.score = math.eval( _rc['rc39a'] );
		   	// b
		   	this.proj.b.score = math.eval( _rc['rc39b'] );
		   	// c
		   	this.proj.c.score = math.eval( _rc['rc39c'] );

		   	// hod scores		   
		   	_rc['rc-threeNine_aH'] ? ( this.hodScoreA = math.eval( _rc['rc-threeNine_aH']) ) : ( this.hodScoreA = this.proj.a.score * this.proj.a.scale ) ;

		   	_rc['rc-threeNine_bH'] ? ( this.hodScoreB = math.eval( _rc['rc-threeNine_bH']) ) : ( this.hodScoreB = this.proj.b.score * this.proj.b.scale ) ;

		   	_rc['rc-threeNine_cH'] ? ( this.hodScoreC = math.eval( _rc['rc-threeNine_cH']) ) : ( this.hodScoreC = this.proj.c.score * this.proj.c.scale ) ;		   

		 } // end of if
	
	}); // end of controller : 3.9

	// ------------------------------------------ 
	// controller 3.10
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_10', function(){

		this.consultancy  = {

			3.10: { scale: 10, score:0 },

			amount : {

			  minimum : 10000,
				total : 0,
			  aPoint  : 3333.34,
			  points  : 0,		

			}, //  end of amount		

		};

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){

		 	// section score
	   		this.consultancy.amount.points = math.eval( _rc['rc-threeTen'] );
	   		// amount		 	
		 	this.consultancy.amount.total = math.eval( _rc['rc310'] );
		 	// hod		
			_rc['rc-threeTenH'] ? ( this.hodScore = math.eval( _rc['rc-threeTenH']) ) : ( this.hodScore = this.consultancy.amount.points ) ;

		 } // end of if

		this.calPoints = function(){
			
			if( this.consultancy.amount.total >= this.consultancy.amount.minimum ){
			this.consultancy.amount.points = Math.round(this.consultancy.amount.total / this.consultancy.amount.aPoint);
			}else{
			this.consultancy.amount.points = 0;	
			}

		}; //  end of calPoints()
	
	}); // end of controller : 3.10

	// ------------------------------------------ 
	// controller 3.11
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_11', function(){

		this.pc  = {

			3.11: { scale: 10, score:0 },

			patent : {

				score: 0,

			    international:{
			    	score: 0,
			    	filed: { scale: 8, count: 0 },
			    	awarded: { scale: 15, count: 0 },
			    },

			    national:{
			    	score: 0,
			    	filed: { scale: 3, count: 0 },
			    	awarded: { scale: 10, count: 0 },
			    },		

			}, //  end of patent

			copyright : {

				score: 0,

			    international:{
			    	score: 0,
			    	filed: { scale: 7, count: 0 },
			    	awarded: { scale: 11, count: 0 },
			    },

			    national:{
			    	score: 0,
			    	filed: { scale: 2, count: 0 },
			    	awarded: { scale: 6, count: 0 },
			    },		

			}, //  end of copyright		

		};

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){

		 	// section score
	   		this.pc[3.11].score = math.eval( _rc['rc-threeEleven'] );
	   		// a
	   		this.pc.patent.international.filed.count = math.eval( _rc['rc311a'] );
	   		// b
	   		this.pc.patent.international.awarded.count = math.eval( _rc['rc311b'] );
	   		// c
	   		this.pc.patent.national.filed.count = math.eval( _rc['rc311c'] );
	   		// d
	   		this.pc.patent.national.awarded.count = math.eval( _rc['rc311d'] );
	   		// e
	   		this.pc.copyright.international.filed.count = math.eval( _rc['rc311e'] );
	   		// f
	   		this.pc.copyright.international.awarded.count = math.eval( _rc['rc311f'] );
	   		// g
	   		this.pc.copyright.national.filed.count = math.eval( _rc['rc311g'] );
	   		// h
	   		this.pc.copyright.national.awarded.count = math.eval( _rc['rc311h'] );
	   		// hod
			_rc['rc-threeElevenH'] ? ( this.hodScore = math.eval( _rc['rc-threeElevenH']) ) : ( this.hodScore = this.pc[3.11].score ) ;	   		

		 } // end of if


		this.calPatent = function (){

			// evaluate
			this.pc.patent.international.score = ( this.pc.patent.international.filed.count *
											       this.pc.patent.international.filed.scale )
											   + ( this.pc.patent.international.awarded.count *
											       this.pc.patent.international.awarded.scale );

			// evaluate
			this.pc.patent.national.score = ( this.pc.patent.national.filed.count *
											this.pc.patent.national.filed.scale )
										  + ( this.pc.patent.national.awarded.count *
											this.pc.patent.national.awarded.scale );

			this.pc.patent.score = this.pc.patent.international.score + this.pc.patent.national.score;

			// update section score
			this.updateSectionScore();

		}; // end of calPatent()

		this.calCopyright = function (){

			// evaluate
			this.pc.copyright.international.score = ( this.pc.copyright.international.filed.count *
											       this.pc.copyright.international.filed.scale )
											   + ( this.pc.copyright.international.awarded.count *
											       this.pc.copyright.international.awarded.scale );

			// evaluate
			this.pc.copyright.national.score = ( this.pc.copyright.national.filed.count *
											this.pc.copyright.national.filed.scale )
										  + ( this.pc.copyright.national.awarded.count *
											this.pc.copyright.national.awarded.scale );

			this.pc.copyright.score = this.pc.copyright.international.score + this.pc.copyright.national.score;

			// update section score
			this.updateSectionScore();

		}; // end of calCopyright()

		this.updateSectionScore = function(){

			this.pc['3.11'].score = this.pc.patent.score + this.pc.copyright.score;

		}; // end of updateSectionScore()
		
	
	}); // end of controller : 3.11

	// ------------------------------------------ 
	// controller 3.12
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_12', function(){

		this.rg  = {

			3.12: { scale: 10, score:0 },

			degreeAwardedME: { count: 0, scale: 2},

			degreeAwardedBE: { count: 0, scale: 1},

			degreeAwardedPhD: { count: 0, scale: 8},

			degreeInProgressPhD: { count: 0, scale: 1},					

		};

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){

		 	// section score
	   		this.rg[3.12].score = math.eval( _rc['rc-threeTwelve'] );
	   		// a
	   		this.rg.degreeAwardedME.count = math.eval( _rc['rc312a'] ); 
	   		// b
	   		this.rg.degreeAwardedBE.count = math.eval( _rc['rc312b'] ); 
	   		// c
	   		this.rg.degreeAwardedPhD.count = math.eval( _rc['rc312c'] ); 
	   		// d
	   		this.rg.degreeInProgressPhD.count = math.eval( _rc['rc312d'] );	
	   		// hod			
			_rc['rc-threeTwelveH'] ? ( this.hodScore = math.eval( _rc['rc-threeTwelveH']) ) : ( this.hodScore = this.rg[3.12].score ) ;	 	

		 } // end of if

		this.calRG = function(){
		
			this.rg['3.12'].score = ( this.rg.degreeAwardedME.count * this.rg.degreeAwardedME.scale )
								  + ( this.rg.degreeAwardedBE.count * this.rg.degreeAwardedBE.scale )
								  + ( this.rg.degreeAwardedPhD.count * this.rg.degreeAwardedPhD.scale )
								  + ( this.rg.degreeInProgressPhD.count * this.rg.degreeInProgressPhD.scale );

		}; //  end of calPoints()
	
	}); // end of controller : 3.12

	// ------------------------------------------ 
	// controller 3.13
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_13', function(){

		this.rcThreeThirteen = 0;		

		/* ******************************************		
		
		 * Manage state if already data submitted		
		
		 * ****************************************** */
		 if( typeof _rc !== 'undefined' && Object.keys(_rc).length ){
		 	// section score
	   		this.rcThreeThirteen = math.eval( _rc['rc-threeThirteen'] );
	   		// hod
			_rc['rc-threeThirteenH'] ? ( this.hodScore = math.eval( _rc['rc-threeThirteenH']) ) : ( this.hodScore = this.rcThreeThirteen ) ;	

		 } // end of if
	
	}); // end of controller : 3.10

})();