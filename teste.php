<?
$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'pg', FILTER_DEFAULT)));
		$getUrl = (empty($getUrl) ? 'index' : $getUrl);
		$url = explode('/', $getUrl);

		echo $url;
?>
nesta página