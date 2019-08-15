<header>
	<div id="headingCalendar">
		<?php
			if($lang['runningLang'] == 'en'){
				echo getMonth_en();
			}else{
				echo getMonth();
			}
		?>
	</div>
	
	<div id="TD8">
		<table id="langues">
		<tr>
			<td><a href="?lang=fr" class="language"><img src="Images/fr.png" alt="French"></a></td>
		</tr>
		<tr>
			<td><a href="?lang=en" class="language"><img src="Images/en.png" alt="English"></a></td>
		</tr>
	</table>
	</div>
	
	<nav id="princ">
	<ul>
		<li><a href="../index.html"><?php echo $lang['HOME']?></a></li>
		<li><a href="../TD5/index.php"><?php echo $lang['TD5']?></a></li>
		<li><a href="../TD6/index.php"><?php echo $lang['TD6']?></a></li>
		<li><a href="../TD7/index.php"><?php echo $lang['TD7']?></a></li>
		<li id="encours"><a href="./index.php"><?php echo $lang['TD8']?></a></li>
		<li><a href="../TD9/index.php"><?php echo $lang['TD9']?></a></li>
		<li><a href="../TD10/index.php"><?php echo $lang['TD10']?></a></li>
		<li><a href="../TD11/index.php"><?php echo $lang['TD11']?></a></li>
		<li><a href="../TD12/index.php"><?php echo $lang['TD12']?></a></li>
		<li><a href="../contact.html" ><?php echo $lang['CONTACT']?></a></li>
	</ul>
	</nav>
	
</header>