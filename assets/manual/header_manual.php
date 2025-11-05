<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manual do Website</title>
	<meta name="robots" content="noindex">

	<link rel="shortcut icon" type="image/png" href="https://via.placeholder.com/20.png">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/manual/css/main.css" />
	<script src="<?php echo get_template_directory_uri(); ?>/assets/manual/js/uikit.js"></script>


	<style>
		.uk-child-width-1-3\@m>* {
			width: calc(100% * 1 / 2.001) !important;
		}

		.uk-navbar-nav>li.uk-active>a {
			color: #4B40C5 !important;
		}

		.uk-navbar-nav>li:hover>a,
		.uk-navbar-nav>li>a:focus,
		.uk-navbar-nav>li>a.uk-open {
			color: #4B40C5 !important;
		}

		.link-primary a:not(.lightbox):not(.uk-inline):not(.uk-link-muted):not(.uk-slidenav),
		pre {
			color: #4B40C5 !important;
		}

		.uk-button-success {
			background-color: #5a4fca !important;
			transition: 0.4s;
			;
		}
	</style>
</head>

<body>

	<header>
		<div data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent; top: 200">
			<nav class="uk-navbar-container">
				<div class="uk-container">
					<div data-uk-navbar>
						<div class="uk-navbar-left">
							<ul class="uk-navbar-nav uk-visible@m">
								<li><a href="<?php echo site_url(); ?>/wp-admin">Painel de Gestão</a></li>
							</ul>
						</div>
						<div class="uk-navbar-center uk-hidden@m">
						</div>
						<div class="uk-navbar-right">

							<ul class="uk-navbar-nav uk-visible@m">
								<li>
									<div class="uk-navbar-item">
										<a class="uk-button uk-button-success" href="<?php echo site_url(); ?>" target="_blank">Seu site</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>

	</header>