(function ($) {
  'use strict';

  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });

  $(function () {
    $('.back-to-top').affix({
      offset: {
        top: 10
      }
    });
  });

  $(function () {
    $('.tabs a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });
  });
}(jQuery));
