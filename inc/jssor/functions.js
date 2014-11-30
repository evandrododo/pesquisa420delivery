jQuery(document).ready(function ($) {
  var options = {
    $AutoPlay: false, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
    $PlayOrientation: 2, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
    $DragOrientation: 2, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

    $ArrowNavigatorOptions: {
      $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
      $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
      $AutoCenter: 1, //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
      $Steps: 1 //[Optional] Steps to go for each navigation request, default value is 1
    }
  };

  var jssor_slider1 = new $JssorSlider$("slider_sedas_container", options);
});
