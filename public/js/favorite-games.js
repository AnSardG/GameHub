$(document).ready(function () {
   $('#add-to-favorites').click(function () {
      var gameId = $(this).data('game-id');

      $.ajax({
         url: './app/views/game_details/fetch_favorites.php',
         type: 'POST',
         data: {
            game_id: gameId
         },
         success: function(response) {
            alert('success');
         },
         error: function(xhr, status, error) {
            console.error(xhr);
         }
      });
   });
});