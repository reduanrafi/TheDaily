<?php include('connect.php')?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="stylesheet" href="css/menustyles.css">
	<link rel="stylesheet" type="text/css" href="style1.css" media="all" />
	
</head>
<body>


			<div id="header">
				<div id='cssmenu'>
					<ul>
					   <li class='active'><a href='index.php'>Home</a></li>
					   <li><a href='note.php'>Notes</a></li>
					   <li><a href='budget.php'>Budget</a></li>
					   <li><a href='item.php'>Item</a></li>
					   
					</ul>
				</div>
			</div>


				<div id="section">
					<form action="item.php"method="POST">
					<input type="hidden" name="id" value="<?php if(isset($_GET['id']));?> " />
						<input type="text" name="itemname" placeholder="Item Name" required />
						<input type="submit" name="submit" value="Save Item" />
					</form>
									
					<?php 
						//$id=isset($_POST['inumber']) ? $_POST['id']:'';
						$iname=isset($_POST['itemname']) ?$_POST['itemname']:'';
						
							if(isset($_POST['submit'])){
								mysql_query("INSERT INTO item (id,iname)
								VALUES(NULL,'$iname')") or die(mysql_error());
								header('Location:item.php');
							}
								$query="SELECT * FROM item ";
								$result=mysql_query($query);
								
								while($items=mysql_fetch_array($result))
								{
									
									$it=$items['iname'];
									echo" <a href='' class='btn'> $it </a>";
									echo" <a  class='myButton' href=\"ditem.php?id=".$items['id']."\"> X</a>"."<br>";
									
								}

						
					?>
</div>
					


		<div id="footer">
		copyright@ReduanRafi
		</div>


</body>
</html>
