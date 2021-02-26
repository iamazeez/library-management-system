<?php 
$access = 1;
include_once('header.php');
if(!isset($_SESSION['admin'])){
    header("location: login.php");
  } ?>
<div class="container w-full md:w-10/12 xl:w-10/12 mt-12 mb-8  mx-auto px-2">
			<!--Card-->
			 <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
				
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					
					<thead>
					
						<tr>
						    <th data-priority="1">Student Name</th>
							<th data-priority="2">Course</th>
							<th data-priority="3">Semester</th>
							<th data-priority="4">Rollno</th>
							<th data-priority="5">Book Name</th>
							<th data-priority="6">ISBN</th>
							<th data-priority="11">Issue Date</th>
							<th data-priority="7">Return Date</th>
							<th data-priority="8">Status</th>
							<th data-priority="9">Edit</th>
							<th data-priority="10">Delete</th>
						</tr>
					</thead>
					<tbody>
<?php 

$admin = new Admin($con);
$data = $admin->getAllIssueBookRecords();
foreach($data as $row){
?>                       

<tr>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?php echo $row['student_name']; ?></td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?php echo $row['student_course']; ?></td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?php echo $row['student_sem']; ?></td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?php echo $row['student_roll_no']; ?></td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?php echo $row['book_name']; ?></td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?php echo $row['book_isbn']; ?></td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?php echo $row['issue_date']; ?></td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?php echo $row['return_date']; ?></td>


<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

<?php 

if($row['status'] == '0'){
?>

<span
class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
<span
aria-hidden
class="absolute inset-0 bg-red-400 opacity-50 rounded-full"
></span>
<span class="relative">Issued</span>
</span>
<?php }else if($row['status'] == '1'){ ?>
	<span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
   <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
    <span class="relative">Returned</span> </span>
<?php } ?>
</td>

<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><a class='px-3 inset-0 py-1 bg-blue-400 text-gray-100 font-semibold rounded-full' href='edit.php?id=<?php echo $row['id']; ?>'> Edit</a></td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><a class='px-3 inset-0 py-1 bg-red-400 font-semibold rounded-full' href='delete.php?id=<?php echo $row['id']; ?>'> Delete</a></td>
</tr>

 <?php } ?>

						
						
						<!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
						
					
					</tbody>
					
				</table>
				
				
			</div>
			<!--/Card-->


      </div>
      <!--/container-->
<?php include_once('footer.php'); ?>