<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
?>
<div class = "content">
<table>
<form action="createEventsController.php" method="get">
	<tr>
		<td>
			Event Name
		</td>
		<td>
			<input type="text" name="name">
		</td>
	</tr>
	<tr>
		<td>
			Event Date
		</td>
		<td>
			<input type="text" name="day" size=1 maxlength=2>/
			<input type="text" name="month" size=1 maxlength=2>/
			<input type="text" name="year" size=1 maxlength=2> (dd/mm/yy)

		</td>
	</tr>
	<tr>
		<td>
			Event Time
		</td>
		<td>
			<input type="time" name="time">
		</td>
	</tr>
	<tr>
		<td>
			Location
		</td>
		<td>
			<input type="text" name="location">
		</td>
	</tr>
	<tr>
		<td>
			Description
		</td>
		<td>
			<textarea name="description">
			</textarea>
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" value="Add Event">
		</td>
	</tr>
</form>
</table>
</div>
		
