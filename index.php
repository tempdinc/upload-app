<?php
	$inspection_id = $_GET["id"];
	$inspection_type = $_GET["type"];
	$slack_inspection_type = ($inspection_type == 'finalinspection') ? 'Final-inspection' : 'Pre-Inspection';
	$upload_type = $_GET["upload"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="keywords" content="upload form" />
	<meta name="description" content="TEMPD Welcome Home, Anywhere!" />
	<title>TEMPD Welcome Home, Anywhere!</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-32x32-1.png" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
	<script src="https://use.fontawesome.com/df0d0c0c49.js"></script>
	<script src="../upload/assets/js/form-script.js"></script>
	<style>
		body {
			font-family: 'Montserrat', sans-serif;
			font-family: 'Roboto', sans-serif;
			background: #172B41;
			color: #ffffff;
		}

		.yellow_text {
			color: #FED925;
		}

		.black_text {
			color: #000000;
		}

		#warning {
			opacity: 0;
			display: none !important;
			color: #eee;
		}

		.wrapper {
			margin: auto;
			max-width: 640px;
			padding-top: 60px;
			text-align: center;
		}

		.height-50-vh {
			height: 50vh;
		}

		.m-height-50-vh {
			max-height: 50vh;
		}

		.height-40-vh {
			height: 40vh;
		}

		.m-height-40-vh {
			max-height: 40vh;
		}

		.height-30-vh {
			height: 30vh;
		}

		.m-height-30-vh {
			max-height: 30vh;
		}

		.container {
			padding: 0 16px;
		}

		.z-999 {
			z-index: 999;
		}

		.relative {
			position: relative;
		}

		.overflow-x-hidden {
			overflow-x: hidden;
		}

		.m-0 {
			margin: 0;
		}

		.mt-20 {
			margin-top: 20px;
		}

		.mb-20 {
			margin-bottom: 20px;
		}

		.mt-50 {
			margin-top: 50px;
		}

		.mb-50 {
			margin-bottom: 50px;
		}

		.mt-80 {
			margin-top: 80px;
		}

		.mb-80 {
			margin-bottom: 80px;
		}

		.mt-100 {
			margin-top: 100px;
		}

		.mb-100 {
			margin-bottom: 100px;
		}

		.px-28 {
			padding-left: 28px;
			padding-right: 28px;
		}

		.py-35 {
			padding-top: 35px;
			padding-bottom: 35px;
		}

		.py-37 {
			padding-top: 37px;
			padding-bottom: 37px;
		}


		.px-37 {
			padding-left: 37px;
			padding-right: 37px;
		}

		.py-48 {
			padding-top: 48px;
			padding-bottom: 48px;
		}

		.fs-16 {
			font-size: 16px;
		}

		.fw-600 {
			font-weight: 600;
		}

		.br-20 {
			border-radius: 20px;
		}

		.light-white {
			background: #F1F1F1;
		}

		.light-white-05 {
			background: rgba(241, 241, 241, 0.5);
		}

		.opacity-05 {
			opacity: 0.5;
		}

		.btn-block {
			width: 100%;
		}

		.btn {
			color: #000000;
			border-radius: 10px;
			padding: 27px 11px;
		}

		.btn-yellow {
			background-color: #FED925;
		}

		.btn-white {
			background-color: #FFFFFF;
		}

		.upload-container {
			color: #707070;
		}

		h1 {
			color: #130f40;
			letter-spacing: -.5px;
			font-weight: 700;
			padding-bottom: 10px;
		}

		h4 {
			font-size: 16px;
			font-weight: 600;
			color: #172B41;
			;
		}



		#file-browser {
			text-decoration: none;
			color: rgb(22, 42, 255);
			border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
		}

		#file-browser:hover {
			color: rgb(0, 0, 255);
			border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
		}

		.icons {
			color: #95afc0;
			opacity: 0.55;
		}
	</style>

	<!-- production -->
	<script type="text/javascript" src="../upload/assets/js/plupload.full.min.js"></script>
	<!--
	<script type="text/javascript" src="../upload/assets/js/moxie.js"></script>
	<script type="text/javascript" src="../upload/assets/js/plupload.dev.js"></script>
	-->
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col"></div>
			<div class="col-12 col-lg-6">
				<div class="mb-50 mt-80 text-center">
					<svg width="176" height="50" viewBox="0 0 176 50" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_3_24)">
							<path d="M50.1393 0H0V50H50.1393V0Z" fill="#FED925" />
							<path
								d="M19.7909 32.6953C20.0806 32.6967 20.3655 32.6215 20.6166 32.4773V38.7856H18.97V32.4821C19.2206 32.6226 19.5034 32.696 19.7909 32.6953Z"
								fill="#172B41" />
							<path
								d="M38.9729 10.2987V21.6607H31.134V30.9894H29.4855V20.0187H37.3291V11.9408H12.7731V20.0187H20.6167V29.4959C20.3655 29.352 20.0806 29.2771 19.791 29.2788C19.5034 29.2776 19.2205 29.3511 18.9701 29.4921V21.6607H11.1255V10.2987H38.9729Z"
								fill="#172B41" />
							<path
								d="M20.6805 30.9885C20.6813 31.1011 20.6596 31.2128 20.6165 31.3169C20.5507 31.481 20.437 31.6216 20.2903 31.7207C20.1436 31.8197 19.9704 31.8727 19.7932 31.8727C19.616 31.8727 19.4428 31.8197 19.2961 31.7207C19.1494 31.6216 19.0357 31.481 18.9699 31.3169C18.9235 31.2137 18.9001 31.1016 18.9012 30.9885C18.9016 30.8743 18.925 30.7613 18.9699 30.6563C19.0353 30.4924 19.1485 30.3519 19.2948 30.253C19.4412 30.1541 19.614 30.1012 19.7908 30.1013C19.9681 30.1018 20.1412 30.1548 20.2883 30.2536C20.4353 30.3524 20.5495 30.4926 20.6165 30.6563C20.6599 30.7616 20.6817 30.8746 20.6805 30.9885Z"
								fill="#172B41" />
							<path d="M77.5428 12.4471V14.8774H70.8399V37.9669H68.4029V14.8774H61.7009V12.4471H77.5428Z"
								fill="#FED925" />
							<path
								d="M84.4348 14.8774V23.9919H94.1837V26.4221H84.4348V35.5367H96.0117V37.9669H81.9978V12.4471H96.0117V14.8774H84.4348Z"
								fill="#FED925" />
							<path
								d="M105.619 19.814L102.725 37.9669H100.212L104.553 11.8398L114.53 33.2578L124.507 11.8398L128.848 37.9669H126.335L123.441 19.814L114.53 38.5742L105.619 19.814Z"
								fill="#FED925" />
							<path
								d="M148.765 14.5737C150.389 15.9921 151.202 17.9539 151.202 20.4594C151.202 22.0548 150.865 23.4918 150.193 24.7706C149.529 26.04 148.501 27.0841 147.241 27.77C145.947 28.4916 144.423 28.8524 142.672 28.8524H136.579V37.9669H134.142V12.4471H141.455C144.701 12.4471 147.137 13.156 148.765 14.5737ZM147.07 25.0361C148.2 24.1122 148.765 22.6627 148.765 20.6878C148.765 18.7129 148.168 17.2508 146.975 16.3014C145.782 15.3495 144.284 14.8736 142.482 14.8736H136.579V26.4221H142.672C144.474 26.4221 145.94 25.9601 147.07 25.0361Z"
								fill="#FED925" />
							<path
								d="M170.041 14.1368C172.008 15.2638 173.493 16.7891 174.497 18.7126C175.5 20.6361 176.001 22.8011 176 25.2075C176 27.5873 175.486 29.7449 174.458 31.6805C173.431 33.616 171.926 35.1476 169.945 36.2753C167.965 37.4024 165.629 37.9659 162.939 37.9659H155.893V12.4471H162.939C165.705 12.4471 168.072 13.0104 170.041 14.1368ZM168.689 34.2068C170.224 33.3598 171.481 32.0872 172.306 30.5429C173.144 28.9856 173.563 27.2071 173.563 25.2075C173.563 23.2078 173.144 21.429 172.306 19.8711C171.48 18.327 170.224 17.0542 168.689 16.2062C167.114 15.3178 165.273 14.8736 163.167 14.8736H158.33V35.53H163.167C165.273 35.5344 167.114 35.0934 168.689 34.2068Z"
								fill="#FED925" />
						</g>
						<defs>
							<clipPath id="clip0_3_24">
								<rect width="176" height="50" fill="white" />
							</clipPath>
						</defs>
					</svg>
					<p class="text-center mt-20 fw-600">Welcome Home, <span class="yellow_text">Anywhere!</span></p>
				</div>
				<div id="list_wrapper" class="br-20 px-37 py-37 light-white-05">
					<div id="rules" class="upload-container px-28 py-35 br-20 light-white">
						<div class="text-center">
							<h4 class="fw-600">Two important rules</h4>
							<div class="icons fa-3x m-0">
								<svg width="31" height="30" viewBox="0 0 31 30" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M7.23183 0.118498C6.80525 0.268103 6.50114 0.485856 6.15776 0.887704C5.82094 1.28187 5.62037 1.73568 5.53266 2.30211C5.48752 2.59364 5.47339 5.24391 5.48529 11.1645L5.50229 19.611L5.63075 19.9821C5.88619 20.7197 6.44334 21.3492 7.0944 21.6358L7.43703 21.7866L17.7849 21.8056C25.35 21.8195 28.227 21.805 28.4827 21.7517C29.4495 21.5501 30.2638 20.6624 30.4463 19.611C30.4946 19.3329 30.5082 16.8632 30.4955 10.6526L30.478 2.07815L30.3503 1.73811C30.1593 1.22959 29.781 0.724917 29.3775 0.440232C28.702 -0.0362907 29.5963 -0.00186477 17.9941 0.00197454C8.17821 0.00517397 7.535 0.0121487 7.23183 0.118498ZM28.5678 1.51166C28.9527 1.72096 29.1946 2.10221 29.2459 2.58065C29.2654 2.7618 29.2735 5.67072 29.264 9.0449L29.2468 15.1797L26.4763 11.6526C24.9525 9.71262 23.5955 8.03817 23.4607 7.93156C22.8368 7.4384 21.9313 7.44589 21.2817 7.94973C21.1504 8.05147 19.3547 10.3743 16.1034 14.6481C16.0916 14.6635 15.6271 14.1825 15.071 13.5792C13.8862 12.2937 13.7381 12.1942 13.0067 12.1928C12.1527 12.1912 12.1979 12.1533 9.29971 15.3086L6.7628 18.0706V10.2158C6.7628 2.61226 6.76638 2.35342 6.87466 2.12358C6.93622 1.99304 7.06157 1.80856 7.15315 1.71373C7.53224 1.32135 6.76385 1.34753 17.9933 1.34477L28.2564 1.34228L28.5678 1.51166ZM10.984 4.21012C10.5542 4.36574 10.2511 4.58381 9.90997 4.98297C9.00012 6.04767 9.03723 7.67106 9.9954 8.71913C11.433 10.2917 13.8567 9.42966 14.2093 7.22033C14.3481 6.34951 14.0572 5.46071 13.4204 4.81052C12.9333 4.31327 12.5526 4.14651 11.8342 4.11592C11.4368 4.09897 11.2268 4.12226 10.984 4.21012ZM12.2451 5.55688C13.1702 6.01562 13.2237 7.45549 12.3354 7.99139C11.7868 8.3224 11.0954 8.13876 10.7255 7.56382C10.4902 7.198 10.4437 6.60777 10.6207 6.23215C10.9434 5.54709 11.6407 5.25722 12.2451 5.55688ZM22.7562 9.07177C22.8301 9.13179 24.3266 11.0093 26.0817 13.2441L29.2729 17.3074L29.2745 18.2229C29.2754 18.7264 29.2451 19.2728 29.2072 19.4369C29.1127 19.8469 28.7007 20.2964 28.3251 20.3997C27.9667 20.4982 8.0178 20.508 7.69394 20.4098C7.57733 20.3744 7.39511 20.281 7.28905 20.2023C6.87226 19.8924 6.70306 20.1246 9.83892 16.7016C11.7281 14.6393 12.7617 13.5557 12.8625 13.5315C12.9467 13.5114 13.0928 13.5262 13.1871 13.5645C13.2813 13.6029 13.8993 14.2218 14.5604 14.9398C15.2214 15.6579 15.8386 16.2765 15.9319 16.3144C16.3267 16.4749 16.3074 16.4962 19.2567 12.6345C21.0701 10.26 22.0635 9.00836 22.1688 8.96542C22.3624 8.88659 22.5756 8.92517 22.7562 9.07177ZM3.29423 10.5903C3.20077 10.6457 3.10069 10.7922 3.04476 10.9557C2.82526 11.5966 0.536639 21.0492 0.507384 21.4357C0.426183 22.5071 1.02243 23.6268 1.9147 24.0786C2.08214 24.1633 3.72292 24.6712 5.56092 25.2072C7.39892 25.7431 11.8048 27.0316 15.3519 28.0705C18.8989 29.1093 21.9628 29.9742 22.1606 29.9924C23.0832 30.0772 24.1099 29.4455 24.5255 28.5374C24.7139 28.1256 25.6998 24.1918 25.6998 23.8517C25.6998 23.5682 25.477 23.2534 25.2353 23.1954C25.0229 23.1445 24.6765 23.2974 24.5861 23.4819C24.5321 23.5919 23.4719 27.7704 23.4719 27.8731C23.4719 27.8881 23.3627 28.0297 23.2292 28.1877C23.0482 28.4021 22.9065 28.5004 22.6713 28.575C22.3044 28.6915 22.3541 28.7003 20.8043 28.2462C20.1594 28.0572 15.7799 26.7781 11.072 25.4036C1.82066 22.7027 2.18685 22.8267 1.91705 22.3018C1.64712 21.7766 1.61693 21.9443 2.98015 16.3947C3.67408 13.5699 4.24178 11.1842 4.24178 11.0932C4.24178 10.9903 4.16638 10.8455 4.04244 10.7102C3.81995 10.4674 3.56937 10.4272 3.29423 10.5903Z"
										fill="#004494" />
								</svg>
							</div>
							<p class="m-0">Only upload 10 images at a time</p>
							<div class="icons fa-3x m-0">
								<svg width="31" height="30" viewBox="0 0 31 30" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M14.0855 0.0225949C13.9674 0.0366943 13.581 0.0914368 13.2268 0.144218C7.64196 0.976513 2.92901 4.98645 1.18154 10.3927C0.643337 12.0577 0.5 13.0274 0.5 15.0036C0.5 16.2337 0.523982 16.7105 0.612486 17.2411C1.1583 20.5125 2.50826 23.205 4.75719 25.5075C7.03329 27.8379 9.91635 29.3206 13.2574 29.8791C14.2212 30.0402 16.77 30.0403 17.7348 29.8793C20.9948 29.3352 23.6773 27.9958 25.9758 25.7643C28.345 23.4642 29.8256 20.5995 30.3808 17.2411C30.5397 16.2794 30.5397 13.7278 30.3808 12.7661C29.8256 9.40778 28.3457 6.54431 25.9758 4.24261C25.1347 3.42571 24.631 3.02062 23.7086 2.41931C21.868 1.21951 20.0477 0.519017 17.7655 0.132386C17.2053 0.0374912 14.6086 -0.0399943 14.0855 0.0225949ZM17.6735 1.45081C20.6295 1.94428 23.0795 3.20422 25.188 5.31533C27.3422 7.47218 28.5942 9.94093 29.0912 13.0113C29.2439 13.9553 29.2435 16.0565 29.0903 16.9959C28.588 20.0767 27.3408 22.5364 25.188 24.6919C23.0485 26.8339 20.5623 28.0934 17.4895 28.5918C16.4783 28.7559 14.3831 28.742 13.3494 28.5645C10.3337 28.0465 7.88521 26.7857 5.77428 24.6637C3.67176 22.5502 2.44306 20.15 1.92736 17.1492C1.81929 16.5203 1.79568 16.1355 1.79568 15.0036C1.79568 13.8717 1.81929 13.4869 1.92736 12.858C2.44293 9.85805 3.67697 7.44655 5.77281 5.34353C7.92244 3.18657 10.4979 1.87796 13.4721 1.4315C14.4144 1.29007 14.5574 1.28241 15.8028 1.30619C16.5586 1.32072 17.1833 1.36897 17.6735 1.45081ZM12.3681 8.31771C11.8335 8.48084 11.3018 8.95121 11.0593 9.47565L10.9268 9.76229V15.0036V20.2449L11.0962 20.5897C11.5372 21.4873 12.5186 21.9322 13.4485 21.6562C13.8184 21.5464 21.2098 16.7995 21.6319 16.4007C22.0595 15.9967 22.2092 15.6344 22.2092 15.0036C22.2092 14.3728 22.0595 14.0105 21.6319 13.6065C21.2098 13.2077 13.8184 8.46079 13.4485 8.351C13.1255 8.25513 12.6239 8.23968 12.3681 8.31771ZM13.1635 9.63871C13.5013 9.81323 20.5575 14.3965 20.7201 14.5469C21.076 14.8762 20.9773 15.3305 20.4793 15.6557C18.4407 16.9868 13.2972 20.2994 13.1543 20.3733C12.8959 20.5068 12.5995 20.4414 12.4025 20.2075L12.2454 20.021V15.0072V9.9934L12.3766 9.82678C12.5948 9.54951 12.8656 9.48478 13.1635 9.63871Z"
										fill="#004494" />
								</svg>
							</div>
							<p class="m-0">Only one video at a time</p>
						</div>
					</div>
					<div id="filelist" class="overflow-x-hidden m-height-40-vh">Your browser doesn't have Flash,
						Silverlight or HTML5
						support.</div>
				</div>
				<div id="container" class="qd-none">
					<div class="mb-0 mt-20 z-999">
						<a href="javascript:;" id="pickfiles" class="btn btn-block btn-yellow fw-600 fs-16">Select
							photos/video</a>
					</div>
					<div class="mb-0 mt-20 z-999 relative">
						<a href="javascript:;" id="uploadfiles"
							class="btn btn-block btn-yellow fw-600 fs-16 d-none">Upload<span
								id="upload_quantity"></span></a>
					</div>
					<div class="mb-0 mt-20 z-999 relative">
						<a href="javascript:window.location.href=window.location.href;" id="uploadcancel"
							class="btn btn-block btn-white fw-600 fs-16 d-none">Cancel</a>
					</div>
				</div>
				<div id="done_container" class="d-none">
					<div class="text-center">
						<img src="../upload/assets/img/upload-done.png" alt="done" />
					</div>
					<div class="mb-0 mt-20 z-999 relative text-center">
						<p>You Have Successfully Uploaded Files</p>
					</div>
					<div class="mb-0 mt-20 z-999 relative">
						<a href="javascript:window.location.href=window.location.href;" id="uploadmore"
							class="btn btn-block btn-yellow fw-600 fs-16">Upload more photos/video</a>
					</div>
					<div class="mb-0 mt-20 z-999 relative text-center">
						<p>To go Back to Submitting Report, close current tab.</p>
					</div>
					<div class="mb-0 mt-20 z-999 relative d-none">
						<a href="javascript:open(location, '_self').close();" id="back"
							class="btn btn-block btn-white fw-600 fs-16">Back
							to Submitting Report</a>
					</div>
				</div>
				<br />
				<pre id="console"></pre>
			</div>
			<div class="col"></div>
		</div>
	</div>

	<script type="text/javascript">

		// Slack Data
		const slackUrl = 'https://hooks.slack.com/services/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';

		// Custom example logic
		var uploader = new plupload.Uploader({
			runtimes: 'html5,flash,silverlight,html4',
			browse_button: 'pickfiles', // you can pass an id...
			container: document.getElementById('container'), // ... or DOM Element itself
			url: 'upload.php<?php echo '?id=' . $inspection_id . '&type=' . $inspection_type . '&upload=' . $upload_type; ?>',
			flash_swf_url: '../upload/assets/js/Moxie.swf',
			silverlight_xap_url: '../upload/assets/js/Moxie.xap',

			filters: {
				max_file_size: '64mb',
				mime_types: [
					{ title: "Image files", extensions: "jpg,gif,png" },
					{ title: "Video files", extensions: "mp4" }
				]
			},

			init: {
				PostInit: function () {
					console.log('PostInit!');
					document.getElementById('filelist').innerHTML = '';
					document.getElementById('uploadfiles').classList.add('disabled');
					// document.getElementById('uploadfiles').classList.add('d-none');
					document.getElementById('uploadfiles').onclick = function () {
						uploader.start();
						return false;
					};
				},

				FilesAdded: function (up, files) {
					console.log('FilesAdded!');
					document.getElementById('rules').classList.add('d-none');
					document.getElementById('pickfiles').classList.add('disabled');
					document.getElementById('pickfiles').classList.add('d-none');
					document.getElementById('list_wrapper').classList.remove('light-white-05');
					document.getElementById('list_wrapper').classList.add('light-white');
					document.getElementById('list_wrapper').classList.remove('px-37');
					document.getElementById('list_wrapper').classList.add('px-28');
					document.getElementById('list_wrapper').classList.add('black_text');
					let counter = 0;
					plupload.each(files, function (file) {
						counter++;
						document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + counter + '. ' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
					});
					document.getElementById('upload_quantity').innerHTML += ' (' + counter + ')';
					document.getElementById('uploadfiles').classList.remove('disabled');
					document.getElementById('uploadfiles').classList.remove('d-none');
					document.getElementById('uploadcancel').classList.remove('disabled');
					document.getElementById('uploadcancel').classList.remove('d-none');
				},

				BeforeUpload: function (up, file) {
					var reader = new window.FileReader();
					console.log(file.getSource().getSource());
					reader.readAsDataURL(file.getSource().getSource());
					reader.onload = async function () {
						var base64data = reader.result;
							base64data = base64data.substring(base64data.indexOf(",") + 1);

						// console.log('base64data' + base64data);

						var formdata = new FormData();
							formdata.append("record_id", '<?php echo $inspection_id ?>');
							formdata.append("inspection_type", '<?php echo $inspection_type ?>');
							formdata.append("upload_type", '<?php echo $upload_type ?>');
							formdata.append("file", base64data);
							formdata.append("filename", file.name);
							formdata.append("mimeType", file.type);

						var requestOptions = {
								method: 'POST',
								mode: 'no-cors',
								body: formdata,
								redirect: 'follow'
							};

						await fetch("https://script.google.com/macros/s/AKfycbzzZSv_IlDCq8SDZ7zvLNy_jiYKNlpWe_Mm3dQs_2HtGrTf8qyDjP9ee1436cd22BzPJQ/exec", requestOptions)
							.then(response => response.text())
							.then(result => console.log(result))
							.catch(error => console.log('error', error));						
					}

				},

				UploadProgress: function (up, file) {
					document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
					if (file.percent == 100) {
						document.getElementById(file.id).classList.add('text-success');
					}
					/*
					const fr = new FileReader();
					fr.readAsText(file);
					fr.onload = f => {
						const url = "https://script.google.com/macros/s/AKfycbzzZSv_IlDCq8SDZ7zvLNy_jiYKNlpWe_Mm3dQs_2HtGrTf8qyDjP9ee1436cd22BzPJQ/exec";  // <--- Please set the URL of Web Apps.
						const qs = new URLSearchParams({filename: form.filename.value || file.name, mimeType: file.type});
						fetch(`${url}?${qs}`, {method: "POST", body: JSON.stringify([...new Int8Array(f.target.result)])})
						.then(res => res.json())
						.then(e => console.log(e))  // <--- You can retrieve the returned value here.
						.catch(err => console.log(err));
					}
					*/
				},

				UploadComplete: function () {
					console.log('UploadComplete!');
					document.getElementById('container').classList.add('d-none');
					document.getElementById('list_wrapper').classList.add('d-none');
					document.getElementById('done_container').classList.remove('d-none');
					sendDataToSlack();
				},

				Error: function (up, err) {
					console.log('Error!');
					document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
				}
			}
		});

		function sendDataToSlack() {
			
			const slackAlert = '<?php echo $slack_inspection_type; ?> - Photos uploading started!';
			
			let newData = {
				"blocks": [
					{
						"type": "section",
						"text": {
							"type": "mrkdwn",
							"text": ":camera: * !!! *"
						}
					}
				]
			}
			console.log(JSON.stringify(newData));
			let options = {
				muteHttpExceptions: true,
				method: 'POST',
				contentType: 'application/json',
				body: JSON.stringify(newData)
			}
			console.log(newData);
			fetch(slackUrl, options)
				.then(response => response.text())
				.then(result => console.log(result))
				.catch(error => console.log('error', error));	

			// return result;  
		}

		$(window).load(function () {
			console.log('window loaded!');
			uploader.init();
		});	

	</script>

</body>

</html>