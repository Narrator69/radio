<?
	require_once(__DIR__ . '/classes/class_RadioApi.php');

	$radioApi = new RadioApi;
	$currentText = $radioApi->getText($_GET['station']);

	if (!$currentText) {
		header('Location: http://alx69.com');
	}

	header('Content-Type: application/json');
	echo $currentText;
?>