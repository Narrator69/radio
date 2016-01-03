<?

/* Radio Class */

class Radio {
	private $stations = [
		'http://radiopleer.com/info/nashe20.txt',
		'http://radiopleer.com/info/ultra.txt',
		'http://rock-online.ru/retest/retest13.php',
		'http://p3.radiocdn.com/player.php?hash=655ef459247efa2faa37dcc291d7b28c89633c92&action=getCurrentData',
		'http://www.radcap.ru/stream39035.php'
	];

	private function get($url) {
		$text = '------Contact me if you are annoying - alexander69.ru------';

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_USERAGENT, $text);
		curl_setopt($ch, CURLOPT_REFERER, $text);
		curl_setopt($ch, CURLOPT_COOKIE, 'beget=begetok'); // RadCap Fix

		return curl_exec($ch);
	}

	private function parse($data, $current) {
		$band = '';
		$song = '';

		switch($current) {
			case 0:
			case 1:
				$band = json_decode($data, true)['artist'];
				$song = json_decode($data, true)['song'];
				break;
			case 2:
				$band = 'Unknown';
				$song = 'Unknown';
				break;
			case 3:
				$band = json_decode($data, true)['artist'];
				$song = json_decode($data, true)['track'];
				break;
			case 4:
				$band = explode('sans-serif; ">', $data)[1];
				$band = explode(' - ', $band)[0];
				$song = explode(' - ', $data)[1];
				$song = explode('</body>', $song)[0];
				break;
		}

		return json_encode(['band'=>$band, 'song'=>$song]);
	}

	public function getText($current = 0) {
		$url = $this->stations[$current];
		$data = $this->get($url);

		return $this->parse($data, $current);
	}
}

/* Intialization */

if (!isset($_GET['station']) || !is_numeric($_GET['station']) || $_GET['station'] < 0 || $_GET['station'] > 4) {
	header('Location: http://alexander69.ru/');
}

header('Content-Type: application/json');

$radio = new Radio;
echo $radio->getText($_GET['station']);

?>