jQuery.fn.selector = function (options) {
    options = options || {};
    return this.each(function () {
        var node = this.nodeName.toLowerCase(), self = this;
        jQuery(this).click(function() {
            alert('you got it');
        });
    });
}