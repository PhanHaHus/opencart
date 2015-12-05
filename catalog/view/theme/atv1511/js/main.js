/*scroll to top*/
this.imagePreview = function () {
    /* CONFIG */
    xOffset = 10;
    yOffset = 30;
    // these 2 variable determine popup's distance from the cursor
    // you might want to adjust to get the right result
    /* END CONFIG */
    $("img.preview").hover(function (e) {
        console.log($(this).attr('src'));
        this.t = this.title;
        this.title = "";
        var c = (this.t != "") ? "<br/>" + this.t : "";
        $("body").append("<p id='preview'><img src='" + $(this).attr('src') + "' alt='Image preview' />" + c + "</p>");
        $("#preview")
                .css("top", (e.pageY - xOffset) + "px")
                .css("left", (e.pageX + yOffset) + "px")
                .fadeIn("fast");
    },function () {
        this.title = this.t;
        $("#preview").remove();
    });
    $("img.preview").mousemove(function (e) {
        $("#preview")
        .css("top", (e.pageY - xOffset) + "px")
        .css("left", (e.pageX + yOffset) + "px");
    });
};
$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
    imagePreview();
});
