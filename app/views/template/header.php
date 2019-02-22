
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<title>PHP MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=PLUGINS_DIR?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?=PLUGINS_DIR?>typeahead/jquery.typeahead.css">
    <link rel="stylesheet" href="<?=ASSETS_DIR?>css/custom.css">
    <link rel="stylesheet" href="<?=PLUGINS_DIR?>croppie/css/croppie.css">
 


</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light px-5" >
<a class="navbar-brand" href="<?=BASEURL ?>">
    <span style="color:#2196f3;">
<i class="material-icons md-48">
home
</i> 
    </span>
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASEURL ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASEURL ?>registration">Registration</a>
                </li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						About
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?=BASEURL ?>about">About</a>
						<a class="dropdown-item" href="<?=BASEURL ?>about/contact">Contact Us</a>

					</div>
				</li>
            
            </ul>
  </div>
</nav>

<div class="container">
<!-- Body -->
<div class="loader center-screen" id="loading-indicator" style="display:none">
	<img class="load" src="<?= BASEURL?>img/loader.gif"   />
	</div>
	
	<!-- Modal -->
<div id="alertModal" class="modal custom_alert" role="dialog" >
	<div class="alert alert-success alert-dismissable center-alert " id="myAlert2">
 		<span id="alertMssg"></span>
		<div>
		<button id="closeAlrt" class="btn btn-sm btn-outline-success my-2 my-sm-0"  data-dismiss="modal" aria-hidden="true">OK</button>
		</div>
	</div>
</div>
