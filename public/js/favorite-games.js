$(document).ready(function () {
   $('#add-to-favorites').click(function () {
      let gameId = $(this).data('game-id');
      let user = $(this).data('username');

      $.ajax({
         url: '/',
         method: 'POST',
         data: {
            "game_id": gameId,
            "username": user,
            "controller": 'fetch_favorites'
         },
         success: function(response) {
            console.log(response);
            $('#add-to-favorites').addClass('d-none');
            $('#remove-from-favorites').removeClass('d-none');
         },
         error: function(xhr, status, error) {
            console.error(xhr);
         }
      });
   });

   $('#remove-from-favorites').click(function () {
      let gameId = $(this).data('game-id');
      let user = $(this).data('username');

      $.ajax({
         url: '/',
         method: 'POST',
         data: {
            "game_id": gameId,
            "username": user,
            "controller": 'fetch_favorites'
         },
         success: function(response) {
            console.log(response);
            $('#remove-from-favorites').addClass('d-none');
            $('#add-to-favorites').removeClass('d-none');
         },
         error: function(xhr, status, error) {
            console.error(xhr);
         }
      });
   });
});