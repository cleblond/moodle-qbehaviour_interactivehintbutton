
M.qbehaviour_interactivehintbutton = {};


M.qbehaviour_interactivehintbutton.expand_div = function (Y){
    var handleSuccess = function(o) {

    };
    var handleFailure = function(o) {
        /*failure handler code*/
    };
    var callback = {
        success:handleSuccess,
        failure:handleFailure
    };
    

    //var feedbackNode = Y.one('.outcome');
        //feedbackNode.set('class', 'outcome accesshide');
        Y.one('.outcome').addClass('accesshide');


    var refreshBut = Y.one("#hintbutton");
    refreshBut.on("click", function () {
        console.log('here');
	//node = Y.one('#hinteo');
//	Y.one('#hinteo').setStyle("display", "block");
//	 Y.one('#hinteo').show();
        var feedBackDiv = Y.one('.outcome');
        if(feedBackDiv.hasClass('accesshide')) {
		Y.one('.outcome').removeClass('accesshide');

        } else {
		Y.one('.outcome').addClass('accesshide');
        }
        //Y.one('.outcome').addClass('accesshide');
//	Y.one('#hintbutton').setStyle("display", "none");	
    });

};


