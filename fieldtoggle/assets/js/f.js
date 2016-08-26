$(document).ready(function () {
  
  function fieldtoggle() {
    
    
    $(".input-with-fieldtoggle input").each(function () {
      
      var field = $(this).parent();
      
      if (field.data("off")) {
        var off = field.data("off").toLowerCase().split(" ");
      }
      else {
        var off = [];
      }
      
      if (field.data("on")) {
        var on = field.data("on").toLowerCase().split(" ");
      }
      else {
        var on = [];
      }
      
      if ($(this).is(':checked')) {
        $.each(off, function (key, value) {
          $(".field-name-" + value).hide();
        });
        $.each(on, function (key, value) {
          $(".field-name-" + value).show();
        });
      } else {
        $.each(off, function (key, value) {
          $(".field-name-" + value).show();
        });
        $.each(on, function (key, value) {
          $(".field-name-" + value).hide();
        });
      }
      
    });
    
  }
  
  fieldtoggle();
  
  $("body").on("change", ".input-with-fieldtoggle input", function () {
    fieldtoggle();
  });
  
  
  $(document).ajaxComplete(function () {
    fieldtoggle();
  });
  
});