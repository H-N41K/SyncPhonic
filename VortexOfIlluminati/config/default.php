<?php 
include ("../../includes/config.php");
include("../../includes/classes/Song.php");
include("../../includes/classes/Artist.php");
if(isset($_POST['id'])) {
	$songId = $_POST['id'];
	$albumSong = new Song($con, $songId);
}?>
{

	"config": {

		"name": "default",

		"fxFileName": "fx.json",

		"useMidi": false,

		"useMic": false,
		"autoPlayAudio": false,
		"useAudioElement":true,
		"audioURL": "../<?php echo $albumSong->getPath(); ?>",
		"mute": false,

		"doLoop":false,
		"loopStart":23,
		"loopEnd": 35,

		"BPM": 120,

		"fullSize": true,
		"displayWidth": 1286,
		"displayHeight": 726,
		"displayAlign": "top",

		"showControls": false,

		"showIntro": true,

		"useSequence": false

	}

}

