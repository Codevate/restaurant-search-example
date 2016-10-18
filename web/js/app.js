jQuery(document).ready(function ($) {
  var $search = $('.search');

  $search.select2({
    theme: 'bootstrap',
    placeholder: 'Type to search',
    ajax: {
      url: Routing.generate('suggest_restaurants'),
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          q: params.term
        }
      },
      processResults: function (data, params) {
        return {
          results: data.suggestions
        }
      }
    },
    cache: true,
    minimumInputLength: 1
  });

  $search.on('select2:select', function (e) {
    window.location.href = Routing.generate('show_restaurant_redirect', {id: e.params.data.id});
  });
});
