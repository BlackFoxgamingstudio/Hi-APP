<html>
  <head>

    <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="Scripts/jtable/themes/lightcolor/Green/jtable.css" rel="stylesheet" type="text/css" />
	
	<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
<style type="text/css">
	#mydiv {
    position:fixed;
    top: 50%;
    left: 50%;
    width:30em;
    height:18em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em; /*set to a negative number 1/2 of your width*/
    border: 1px solid #ccc;
    background-color: #f3f3f3;
}
</style>
  </head>
  <body>
	<div id="PeopleTableContainer" style="width: 1250px;"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#PeopleTableContainer').jtable({
				title: 'BlackFox Studio Presents - The HI App :)',
				actions: {
					listAction: 'PersonActions.php?action=list',
					createAction: 'PersonActions.php?action=create',
					updateAction: 'PersonActions.php?action=update',
					deleteAction: 'PersonActions.php?action=delete'
				},
				fields: {
					PersonId: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					HomeLocationName: {
						title: 'Home Location',
						width: '15%'
					},
					
					Name: {
						title: 'Author Name',
						width: '15%'
					},
					Age: {
						title: 'Age',
						width: '10%'
					},
					HomeItem: {
						title: 'Item Name',
						width: '15%'
					},
					ItemDescription: {
						title: 'Item Description',
						width: '15%'
					},
					ItemRoom: {
						title: 'Room',
						width: '10%'
					},
					DrawerNum: {
						title: 'Room Drawer Number',
						width: '20%'
					},

					RecordDate: {
						title: 'Record date',
						width: '15%',
						type: 'date',
						create: false,
						edit: false
					}
				}
			});

			//Load person list from server
			$('#PeopleTableContainer').jtable('load');

		});

	</script>
 <div id="mydiv" style="width: 1250px;">
 <?php include "jTableSimplePagedSorted.php"; ?>
 </div>

  </body>
</html>
