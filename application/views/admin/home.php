<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->website ?>{title}</title>
</head>
<body>
<h1>{text}</h1>

<?php if($age>18){ ?>

<h3>Hello Mr {user} you are welcome to our Website!</h3>

<?php }else{ ?>

<h3>Hello Mr {user} your age is not enouth!</h3>

<?php } ?>
</body>
</html>