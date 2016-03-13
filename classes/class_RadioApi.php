<?

class RadioApi {

	/* Stations order dictated by JS */

	private $stationsURL = [
		'http://radiopleer.com/info/nashe20.txt',
		'http://radiopleer.com/info/ultra.txt',
		'http://p3.radiocdn.com/player.php?hash=655ef459247efa2faa37dcc291d7b28c89633c92&action=getCurrentData',
		'http://radcap.ru/stream39035.php',
		'', // Not parsed yet
		'', // Not parsed yet
		'', // Not parsed yet
		''
	];

	public function getText($current = 0) {
		$url = $this->stationsURL[$current];

		if (!$url) return false;

		$rawData = $this->getPage($url);
		$parsedData = $this->parsePage($rawData, $current);

		return $parsedData;
	}

	private function parsePage($rawData, $current) {

		$returnData = ['band' => '', 'song' => ''];

		switch ($current) {
			case 0:
			case 1:
				$returnData['band'] = json_decode($rawData, true)['artist'];
				$returnData['song'] = json_decode($rawData, true)['song'];
				break;
			case 2:
				$returnData['band'] = json_decode($rawData, true)['artist'];
				$returnData['song'] = json_decode($rawData, true)['track'];
				break;
			case 3:
				$tempBand = explode('sans-serif; ">', $rawData)[1];
				$tempSong = explode(' - ', $rawData)[1];
				$returnData['band'] = explode(' - ', $tempBand)[0];
				$returnData['song'] = explode('</body>', $tempSong)[0];
				break;
			case 4:
				$returnData['band'] = '';
				$returnData['song'] = '';
				break;
		}

		return json_encode($returnData);
	}

	private function getPage($url) {
		$text = '------Contact me if you have questions - alx69.com------';

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_USERAGENT, $text);
		curl_setopt($ch, CURLOPT_REFERER, $text);
		curl_setopt($ch, CURLOPT_COOKIE, 'beget=begetok'); // RadCap Fix

		return curl_exec($ch);
	}
}

?>