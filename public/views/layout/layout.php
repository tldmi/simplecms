<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		html {
			height: 100%;
		}
		body {
			margin: 0;
			padding:0;
			background:#f1f1f1;
			height: 1px;
			min-height: 100%;
		}
		.wrapper {
			margin: auto;
			outline: 1px solid #e2e2e2;		
			max-width:900px;
			background: #fff;
			color:#333;
			font-family: Tahoma;
			min-height: 100%;	
			overflow: hidden;
			padding: 20px 0px;
			box-sizing: border-box;
		}
		.post-list__item {
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;		

		}
		.post-list__left {
			flex: 1 1 70%;
			box-sizing: border-box;
			padding: 0px 25px;				

		}
		.post-list__right {
			flex: 1 1 30%;
			text-align: right;
			box-sizing: border-box;			
			padding: 0px 25px;				
	

		}
		.post-list__item-title {
			flex: 1 1 100%;
			text-align:center;
		}
		.post-list__moreinfo {
			flex: 1 1 100%;
			padding: 8px 20px;
			outline: 1px solid #e2e2e2;		
			text-align: right;	
		}
		.post {
			padding:0 20px;
		}
		.post__date {
			border-top: 1px solid #e2e2e2;		
			margin-top:20px;
			font-size: 13px;
		}
		.current-page-link {
			background: #ccc;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<?=$content;?>

	</div>
</body>
</html>