/* ----------------------------------------------------------------------------------

	script : angular JS

   ---------------------------------------------------------------------------------- */
(function() {

   	// angular module initialization
   	var modResearchContribution = angular.module('moduleRC', []); 

	// ------------------------------------------ 
	// controller 3.1
	// ------------------------------------------
	modResearchContribution.controller('Ctrl_3_1', function(){

		this.articlesTemp = { totalAuthors: 0, authorPosition: 0 };
		this.articleCountOptions = [ '0', '1', '2', '3' ];
		this.articleOptions = [ '1', '2', '3', '4' ];

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
		this.articleOptions = [ '1', '2', '3', '4' ];

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
		this.articleOptions = [ '1', '2', '3', '4' ];

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
		this.articleOptions = [ '1', '2', '3', '4' ];

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
		this.articleOptions = [ '1', '2', '3', '4' ];

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

				scale : 4,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of publication

			chapters : {

				scale : 4,
				score : 0,
				count : 0,
				articles : [],

			}, //  end of chapters					

		};


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

})();