<?php
if(!isset($_SESSION['admin'])){
    header("location: login.php");
  }
if(!isset($_GET['id']) && !isset($_POST['id'])){
      header('location:index.php');
}

$access = 1;
?>

<?php include_once('header.php'); ?>

<div class="container mx-auto p-8 flex">
    <div class="w-8/12 mx-auto">
        <h1 class="text-4xl text-center mb-12 font-thin">Issue Book</h1>

<div class="bg-white rounded-lg overflow-hidden shadow-2xl">
    <div class="p-8">
    <?php 

    //get data
    $id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
    $data = $admin->getSingleRecord($id);
    if($data == 0){
        echo "<script>alert('Could not find data please try again..');</script>";
        header('location:index.php');
    }

         
if(isset($_POST['id'])){
$student_name = $_POST['student_name'];
$course = $_POST['course'];
$semester = $_POST['semester'];
$s_roll_no = $_POST['s_roll_no'];
$book_name = $_POST['book_name'];
$book_isbn = $_POST['book_isbn'];
$issue_date = $_POST['issue_date'];
$return_date = $_POST['return_date'];
$status = $_POST['status'];

if($status == '1'){
   if($return_date == ''){
       $return_date = date('Y') . "-" . date('m') . "-" . date('d');
   }
}

$checkDataEditedOrNot = $admin->updateIssueBook($student_name,$course,$semester,$s_roll_no,$book_name,$book_isbn,$issue_date,$status,$return_date,$id);
if($checkDataEditedOrNot){
    echo "<script>alert('Record Updated..');</script>";
    echo "<div class='w-full shadow-2xl rounded p-3 mb-8 text-gray-100 bg-green-500'>Record Edited Successfully..</div>";
    Header("Location: edit.php?id=".$id);
}else{
    echo "<div class='w-full shadow-2xl rounded p-3 mb-8 text-gray-100 bg-red-500'>Please fill all the fields</div>";
}


}

?>
        <form method="POST" action="" autocomplete="on">
        <input value="<?php echo $data['id'] ?>" name='id' type="hidden" >
            <div class="mb-5">
                <label for="student_name" class="block mb-2 text-sm font-medium text-gray-600">Student Name</label>

                <input value="<?php echo $data['student_name']; ?>" required type="text" name="student_name" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5">
                <label for="course" class="block mb-2 text-sm font-medium text-gray-600">Course</label>

                <input value="<?php echo $data['student_course']; ?>" required type="text" name="course" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>
    
            <div class="mb-5">
                <label for="semester" class="block mb-2 text-sm font-medium text-gray-600">Semester</label>

                <input value="<?php echo $data['student_sem']; ?>" required type="text" name="semester" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5">
                <label for="s_roll_no" class="block mb-2 text-sm font-medium text-gray-600">Student Roll no</label>
                <input value="<?php echo $data['student_roll_no']; ?>" required type="text" name="s_roll_no" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5">
            <label for="book_name" class="block mb-2 text-sm font-medium text-gray-600">Book name</label>
                <input value="<?php echo $data['book_name']; ?>" required type="text" name="book_name" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5">
            <label for="book_isbn" class="block mb-2 text-sm font-medium text-gray-600">Book ISBN no</label>
            <input value="<?php echo $data['book_isbn']; ?>" required type="text" name="book_isbn" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>


            <div class="flex flex-row flex-wrap">

            <div class="mb-5 flex-grow">
            <label for="issue_date" class="block mb-2 text-sm font-medium text-gray-600">Book issue date</label>
            <input value="<?php echo $data['issue_date']; ?>" required type="date" name="issue_date" class="block p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5 flex-grow">
            <label for="return_date" class="block mb-2 text-sm font-medium text-gray-600">Book Return date</label>
            <input  <?php if($data['return_date'] != 0000-00-00){ ?> value="<?php echo $data['return_date'];  ?>" <?php }?> type="date" name="return_date" class="block p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
            </div>

            <div class="mb-5 flex-grow">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-600">Status</label>
            <select class="border-2 py-2 px-3 border-gray-700 rounded block mb-2 text-sm font-medium text-gray-600" name="status">
                <?php if($data['status'] == 0){ ?>
                <option value='0'>Issued</option>
                <option value='1'>Return</option>
                <?php }else{ ?>
                <option value='1'>Return</option>
                <option value='0'>Issued</option>
                <?php } ?>
            </select>
            </div>

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