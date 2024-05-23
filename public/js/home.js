var loading = false;
var page = 2;


// Function to fetch more game data from PHP script
function fetchMoreGames() {
  const loaderOverlay = document.getElementById('more-overlay');
  loaderOverlay.classList.remove('d-none');
  loading = true;
  $.ajax({
    url: '/',
    method: 'POST',
    data: { page: page, "controller": 'fetch_games' },
    success: function(response) {
      $('#gameContainer').append(response);
      loading = false;
      page++;
    },
    error: function(xhr, status, error) {
      console.error('Error fetching more games:', error);
      loading = false;
    },
    complete: function() {
      loaderOverlay.classList.add('d-none');
    }
  });
}

  // Event listener for scrolling
  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !loading) {
      fetchMoreGames();
    }
  });

  