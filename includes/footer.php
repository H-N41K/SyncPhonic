				</div>


			</div>

		</div>

		<?php include("includes/nowPlayingBar.php"); ?>

	</div>
<!-- The modal, wrapped in an overlay -->
<div class="lyrics-overlay">
  <div class="lyrics-modal" id="lyrics-modal">
    <!-- close trigger -->
    <div class="lyrics-close">
      <span>X</span>
    </div>
    <!-- modal content -->
    <div class="lyrics-modal-content">
     <h2>Searching For Lyrics....</h2>
    </div>
  </div>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
<script type="text/javascript">
	var $lyrics_modal = $('.lyrics-modal'),
    $lyrics_overlay = $('.lyrics-overlay'),
    $lyrics_showModal = $('.lyrics-show-modal'),
    $lyrics_close = $('.lyrics-close');
//show modal and set dimensions based on window
$lyrics_showModal.on('click', function(e){
  e.preventDefault();
  var id = $("#lyricsButton").attr("data-id");
  $.ajax({
    type: "POST",
    url: 'includes/handlers/ajax/scrapeLyrics.php',
    data: {id: id},
    success: function(data){
        $('.lyrics-modal-content').html(data);
    }
});
  var windowHeight = $(window).height(),
      windowWidth = $(window).width(),
      modalWidth = windowWidth/2; //50% of window
  
  $lyrics_overlay.show();
  $lyrics_modal.css({
    'width' : modalWidth,
    'margin-left' : -modalWidth/2
  });
});
//close on click of 'x'
$lyrics_close.on('click', function(){
  $lyrics_overlay.hide();
});
//close on click outside of modal
$lyrics_overlay.on('click', function(e) {
  if (e.target !== this) return;
  $lyrics_overlay.hide();
});
</script>

<script>
    var overlay = document.getElementById("overlay");

    window.addEventListener('load', function(){
      overlay.style.display ='none';
    });
  </script>
</body>

</html>