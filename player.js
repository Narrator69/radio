function class_rp_engine() {
	var self = this;
	var current = 0;
	var stream = '';
	var stations = [
		['http://player.nashe.ru', 'Наше 2.0', 'http://nashe20.streamr.ru/nashe20-128.mp3'], ['http://player.radioultra.ru', 'Ultra', 'http://nashe2.hostingradio.ru/ultra-128.mp3'],
		['http://www.rock-online.ru', 'Рок-Онлайн', 'http://skycast.su:2007/rock-online'], ['http://realpunkradio.com', 'Real Punk', 'http://192.81.248.192:8080/;listen.mp3'],
		['http://www.radcap.ru/poppunk.html', 'RadCap', 'http://79.111.14.76:9035/;']
	];

	self.start = function() {
		// Events
		$('#play').on('click', function() {
			self.switcher(stream.paused);
		});

		$('#next').on('click', function() {
			current = (+current +1 > stations.length -1) ? 0 : +current +1;

			if (!stream.paused) {
				setTimeout(function() {self.switcher(true)}, 500)
			}

			self.switcher(false);
			stream = new Audio(stations[current][2]);
			$('#head h2').html(stations[current][1]);
			$('#origin').attr('data-origin', stations[current][0]);
			self.attributes();
		});

		$('#origin').on('click', function() {
			window.open(stations[current][0], '_blank');
		});

		// Start
		stream = new Audio(stations[current][2]);
		$('#head h2').html(stations[current][1]);
		$('#origin').attr('data-origin', stations[current][0]);
		self.attributes();
	}

	self.volumeSetter = function() {
		stream.volume = $('input[type="range"]').val()/100;
	}

	self.switcher = function(state) {
		self.volumeSetter();

		if (state) {
			stream.play();
			$('#play span').addClass('glyphicon-stop').removeClass('glyphicon-play');
			return;
		}

		stream.pause();
		$('#play span').addClass('glyphicon-play').removeClass('glyphicon-stop');
	}

	self.attributes = function() {
		$.get('player.php?station=' + current, null, function(response) {
			$('#head h1').html(response['band'] + ' — ' + response['song']);
			$('title').html(response['band'] + ' — ' + response['song']);
		});
	}
}

//

var rp_engine = new class_rp_engine();

$(document).ready(function() {
	rp_engine.start();
	setInterval(rp_engine.attributes, 60000);

	$('input[type="range"]').rangeslider({
    polyfill: false,
    onSlide: rp_engine.volumeSetter
	});
});