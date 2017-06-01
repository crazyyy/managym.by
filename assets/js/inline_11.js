
  $(document).ready(function() {
    $('button.signup').click(function() {
      $("#schedule .today").hide();
      $("#schedule .apply").show();
    });
    $("header .signup").click(function() {
      $("#schedule .today").hide();
      $("#schedule .apply").show();
      ScrollTO('#form');
      return false;
    });
    $("#descr .text button").click(function() {
      $("#descr .text .hidden").slideToggle();
      $(this).toggleClass("open");
      if ($(this).find("span").text() == "А также")
        $(this).find("span").text('Свернуть');
      else
        $(this).find("span").text('А также');
    });
  });
  