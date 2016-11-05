<?php

try
{
	//Open database connection
	$con = mysql_connect("localhost:8889","root","root");
	mysql_select_db("jtabletestdb", $con);

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		$result = mysql_query("SELECT * FROM people;");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysql_query("INSERT INTO people(HomeLocationName, Name, Age, HomeItem, ItemDescription, ItemRoom, DrawerNum, RecordDate) VALUES('" . $_POST["HomeLocationName"] . "', '" . $_POST["Name"] . "', '" . $_POST["Age"] . "', '" . $_POST["HomeItem"] . "', '" . $_POST["ItemDescription"] . "', '" . $_POST["ItemRoom"] . "', '" . $_POST["DrawerNum"] . "' ,now());");	
				//template $result = mysql_query("INSERT INTO people(Name, Age, RecordDate) VALUES('" . $_POST["Name"] . "', " . $_POST["Age"] . ",now());");
	//dev branch 1 $result = mysql_query("INSERT INTO people(HomeLocationName, Name, Age, HomeItem, ItemDescription, ItemRoom, DrawerNum, RecordDate) VALUES('" . $_POST["HomeLocationName"] . "', '" . $_POST["Name"] . "', '" . $_POST["Age"] . "', '" . $_POST["HomeItem"] . "', '" . $_POST["ItemDescription"] . "', '" . $_POST["ItemRoom"] . "', '" . $_POST["DrawerNum"] . "' ,now());");
	//
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM people WHERE PersonId = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE people SET HomeLocationName = '" . $_POST["HomeLocationName"] . "',  Name = '" . $_POST["Name"] . "', Age = '" . $_POST["Age"] . "', HomeItem = '" . $_POST["HomeItem"] . "', ItemDescription = '" . $_POST["ItemDescription"] . "', ItemRoom = '" . $_POST["ItemRoom"] . "', DrawerNum = '" . $_POST["DrawerNum"] ."' WHERE PersonId = '" . $_POST["PersonId"] . "';");
// 
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM people WHERE PersonId = " . $_POST["PersonId"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>