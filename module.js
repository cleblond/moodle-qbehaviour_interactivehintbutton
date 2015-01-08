M.qbehaviour_interactivehintbutton = {};
M.qbehaviour_interactivehintbutton.expand_div = function(Y, slot) {
    var handleSuccess = function(o) {};
    var handleFailure = function(o) {
        /*failure handler code*/
    };
    var callback = {
        success: handleSuccess,
        failure: handleFailure
    };
    var newqdiv = Y.one('#q' + slot).one('.content').one('.outcome');
    Y.on('domready', function() {
        newqdiv.addClass('accesshide');
        //Y.log('Dom Ready');
    });
    var refreshBut = Y.one("#hintbutton" + slot);
    refreshBut.on("click", function() {
        if (newqdiv.hasClass('accesshide')) {
            newqdiv.removeClass('accesshide');
        } else {
            newqdiv.addClass('accesshide');
        }
    });
};
