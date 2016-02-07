<?
	if (!isset($_GET['station']) || !is_numeric($_GET['station']) || $_GET['station'] < 0 || $_GET['station'] > 4) {
		header('Location: http://alx69.com');
	}

	require_once(__DIR__ . '/classes/class_RadioApi.php');
	header('Content-Type: application/json');

	$radio = new RadioApi;
	echo $radio->getText($_GET['station']);
?>