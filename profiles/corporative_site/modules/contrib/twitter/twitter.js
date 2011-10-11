
/**
 * Attach handlers to count the number of words in a given textfield, in its
 * description.
 */
$(document).ready(function() {
  $("#twitter-textfield").keyup(function() {
    var charsLeft = (140 - $(this).val().length);
    var descDiv = $(this).parent().parent().parent().children(".description");
    $(descDiv).html("<strong>" + charsLeft + "</strong> characters remaining");
    if (charsLeft < 0) {
      $(descDiv).addClass("negative");
      $("#twitter-post-button").attr('disabled', 'true');
    } else {
      $(descDiv).removeClass("negative");
      $("#twitter-post-button").removeAttr('disabled');
    }
  });

  if (!$("#twitter-toggle").attr("checked")) {
    $("#twitter-textfield-wrapper").hide();
    $("#twitter-account-wrapper").hide();
  }

  $("#twitter-toggle").bind("click", function() {
    if ($("#twitter-toggle").attr("checked")) {
      $("#twitter-textfield-wrapper").show();
      $("#twitter-account-wrapper").show();
    }
    else {
      $("#twitter-textfield-wrapper").hide();
      $("#twitter-account-wrapper").hide();
    }
  });
});
