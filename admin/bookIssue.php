<?php 
$access = 1;
include_once('header.php'); 
if(!isset($_SESSION['admin'])){
    header("location: login.php");
  }
?>

<div class="container mx-auto p-8 flex">
    <div class="w-8/12 mx-auto">
        <h1 class="text-4xl text-center mb-12 font-thin">Issue Book</h1>

<div class="bg-white rounded-lg overflow-hidden shadow-2xl">
    <div class="p-8">
    <?php 
         
if(isset($_POST['student_name'])){
$student_name = $_POST['student_name'];
$course = $_POST['course'];
$semester = $_POST['semester'];
$s_roll_no = $_POST['s_roll_no'];
$book_name = $_POST['book_name'];
$book_isbn = $_POST['book_isbn'];
$issue_date = $_POST['issue_date'];
$status = 0;

$checkDataUploadedOrNot = $admin->issueBook($student_name,$course,$semester,$s_roll_no,$book_name,$book_isbn,$issue_date,$status);
if($checkDataUploadedOrNot){
    echo "<div class='w-full shadow-2xl rounded p-3 mb-8 text-gray-100 bg-green-500'>Record added Successfully..</div>";
}else{
    echo "<div class='w-full shadow-2xl rounded p-3 mb-8 text-gray-100 bg-red-500'>Please fill all the fields</div>";
}


}

?>
        <form method="POST" action="" autocomplete="on">
            <div class="mb-5">
                <label for="student_name" class="block mb-2 text-sm font-medium text-gray-600">Student Name</label>

                <input required type="text" name="student_name" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5">
                <label for="course" class="block mb-2 text-sm font-medium text-gray-600">Course</label>

                <input required type="text" name="course" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>
    
            <div class="mb-5">
                <label for="semester" class="block mb-2 text-sm font-medium text-gray-600">Semester</label>

                <input required type="text" name="semester" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5">
                <label for="s_roll_no" class="block mb-2 text-sm font-medium text-gray-600">Student Roll no</label>
                <input required type="text" name="s_roll_no" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5">
            <label for="book_name" class="block mb-2 text-sm font-medium text-gray-600">Book name</label>
                <input required type="text" name="book_name" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5">
            <label for="book_isbn" class="block mb-2 text-sm font-medium text-gray-600">Book ISBN no</label>
            <input required type="text" name="book_isbn" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5">
            <label for="issue_date" class="block mb-2 text-sm font-medium text-gray-600">Book issue date</label>
            <input required type="date" value="<?php echo date('Y') . "-" . date('m') . "-" . date('d');?>" name="issue_date" class="block w-4/12 p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

          

            

            <button class="w-full p-3 mt-4 bg-indigo-600 text-white rounded shadow">Add Book</button>
        </form>
    </div>
            
            <div class="flex justify-between p-8 text-sm border-t border-gray-300 bg-gray-100">
             
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>