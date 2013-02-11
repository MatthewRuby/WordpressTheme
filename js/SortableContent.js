function SortableContent(container){

	this.container = container;
   this.containerOffset = {};
	this.containerOffset.x = 0;
       this.containerOffset.y = 0;
   
   var parents = container.parents();
       for(var i = 0; i < parents.length - 2; i++){ // -2 parents to avoid <html> and <body>
           var p = $(parents[i]);
                this.containerOffset.x += p.offset().left;
                this.containerOffset.y += p.offset().top;
       }
       
       this.items = container.children();
       this.ogPosList = [];
            this.setup();
}
SortableContent.prototype = {
   
	setup : function(){
       
		console.log('setup');
       
		this.length = this.items.length;
		for(var i = 0; i < this.length; i++){
			var pos = {};
			pos.x = $(this.items[i]).offset().left - this.containerOffset.x;
			pos.y = $(this.items[i]).offset().top - this.containerOffset.y;
			this.ogPosList[i] = pos;
		}


		$(this.container).css('height', $(this.container).height());
             
   },
   
   sort : function(key){
       
       console.log('sort');

                var newOrder = [];
                for(var i = 0; i < this.length; i++) {
                    newOrder[i] = {};                    
                    newOrder[i].key = $(this.items[i]).attr(key);
                    newOrder[i].contents = this.items[i];
                    newOrder[i].currentX = $(this.items[i]).offset().left - this.containerOffset.x;
                    newOrder[i].currentY = $(this.items[i]).offset().top - this.containerOffset.y;
                }

                newOrder.sort(function(a, b) {
                    var x = a['key'].toLowerCase(); var y = b['key'].toLowerCase();
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                });

                for(var i = 0; i < this.length; i++){
                    $(newOrder[i].contents).css({
                        
                        'top' : newOrder[i].currentY,
                        'left' : newOrder[i].currentX,
                        'position' : 'absolute',
                        'margin' : '0'
                    });    
         }
         
         var _this = this;
         setTimeout(function(){
             
             for(var i = 0; i < _this.length; i++){
	             $(newOrder[i].contents).css({
	                 'top' : _this.ogPosList[i].y,
	                 'left' : _this.ogPosList[i].x,
	                 'position' : 'absolute',
	                 'margin' : '0',
	                 'transition' : 'top 0.5s, left 0.5s',
	                 '-moz-transition' : 'top 0.5s, left 0.5s',
	                 '-webkit-transition' : 'top 0.5s, left 0.5s',
	                 '-o-transition' : 'top 0.5s, left 0.5s',
	             });    
             }

			setTimeout(function(){

				for(var i = 0; i < _this.length; i++){
					
					if(i < 1) {
						_this.container.prepend( newOrder[i].contents );
					} else {
						$(newOrder[i - 1].contents).after( newOrder[i].contents );
					}
					

				}
			},1000);
             
         }, 10);

   }
   
};