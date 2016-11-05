<html>
  <head>

    <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="Scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	<style type="text/css">
	#PeopleTableContainer {
    position:fixed;
    top: 87%;
    left: 19%;
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
	<div id="PeopleTableContainer2" style="width: 1250px;"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#PeopleTableContainer').jtable({
				title: 'The HI App- House Tabs',
				paging: true,
				pageSize: 2,
				sorting: true,
				defaultSorting: 'Name ASC',
				openChildAsAccordion: true,
				actions: {
					listAction: 'PersonActionsPagedSorted.php?action=list',
					createAction: 'PersonActionsPagedSorted.php?action=create',
					updateAction: 'PersonActionsPagedSorted.php?action=update',
					deleteAction: 'PersonActionsPagedSorted.php?action=delete'
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
						width: '10%'
					},
					Age: {
						title: 'Age',
						width: '10%'
					},
					HomeItem: {
						title: 'Item Name',
						width: '20%'
					},
					ItemDescription: {
						title: 'Item Description',
						width: '20%'
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
						width: '20%',
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
 <script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#PeopleTableContainer2').jtable({
				title: 'BlackFox Studio Presents - The HI App :)',
				paging: true,
				
				sorting: true,
				defaultSorting: 'Name ASC',
				openChildAsAccordion: true,
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
					//CHILD TABLE DEFINITION FOR "PHONE NUMBERS"
                Phones: {
                    title: '',
                    width: '5%',
                    sorting: false,
                    edit: false,
                    create: false,
                    display: function (studentData) {
                        //Create an image that will be used to open child table
                        var $img = $('<img src="/Content/images/Misc/phone.png" title="Edit phone numbers" />');
                        //Open child table when user clicks the image
                        $img.click(function () {
                            $('#StudentTableContainer').jtable('openChildTable',
                                    $img.closest('tr'),
                                    {
                                        title: studentData.record.Name + ' - Phone numbers',
                                        actions: {
                                            listAction: '/Demo/PhoneList?StudentId=' + studentData.record.StudentId,
                                            deleteAction: '/Demo/DeletePhone',
                                            updateAction: '/Demo/UpdatePhone',
                                            createAction: '/Demo/CreatePhone'
                                        },
                                        fields: {
                                            StudentId: {
                                                type: 'hidden',
                                                defaultValue: studentData.record.StudentId
                                            },
                                            PhoneId: {
                                                key: true,
                                                create: false,
                                                edit: false,
                                                list: false
                                            },
                                            PhoneType: {
                                                title: 'Phone type',
                                                width: '30%',
                                                options: { '1': 'Home phone', '2': 'Office phone', '3': 'Cell phone' }
                                            },
                                            Number: {
                                                title: 'Phone Number',
                                                width: '30%'
                                            },
                                            RecordDate: {
                                                title: 'Record date',
                                                width: '20%',
                                                type: 'date',
                                                displayFormat: 'yy-mm-dd',
                                                create: false,
                                                edit: false
                                            }
                                        }
                                    }, function (data) { //opened handler
                                        data.childTable.jtable('load');
                                    });
                        });
                        //Return image to show on the person row
                        return $img;
                    }
                },
                //CHILD TABLE DEFINITION FOR "EXAMS"
                Exams: {
                    title: '',
                    width: '5%',
                    sorting: false,
                    edit: false,
                    create: false,
                    display: function (studentData) {
                        //Create an image that will be used to open child table
                        var $img = $('<img src="/Content/images/Misc/note.png" title="Edit exam results" />');
                        //Open child table when user clicks the image
                        $img.click(function () {
                            $('#StudentTableContainer').jtable('openChildTable',
                                    $img.closest('tr'), //Parent row
                                    {
                                    title: studentData.record.Name + ' - Exam Results',
                                    actions: {
                                        listAction: '/Demo/ExamList?StudentId=' + studentData.record.StudentId,
                                        deleteAction: '/Demo/DeleteExam',
                                        updateAction: '/Demo/UpdateExam',
                                        createAction: '/Demo/CreateExam'
                                    },
                                    fields: {
                                        StudentId: {
                                            type: 'hidden',
                                            defaultValue: studentData.record.StudentId
                                        },
                                        StudentExamId: {
                                            key: true,
                                            create: false,
                                            edit: false,
                                            list: false
                                        },
                                        CourseName: {
                                            title: 'Course name',
                                            width: '40%'
                                        },
                                        ExamDate: {
                                            title: 'Exam date',
                                            width: '30%',
                                            type: 'date',
                                            displayFormat: 'yy-mm-dd'
                                        },
                                        Degree: {
                                            title: 'Degree',
                                            width: '10%',
                                            options: ["AA", "BA", "BB", "CB", "CC", "DC", "DD", "FF"]
                                        }
                                    }
                                }, function (data) { //opened handler
                                    data.childTable.jtable('load');
                                });
                        });
                        //Return image to show on the person row
                        return $img;
                    }
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
			$('#PeopleTableContainer2').jtable('load');

		});

	</script>
  </body>
</html>
