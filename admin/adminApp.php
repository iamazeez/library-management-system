<?php 


class Admin{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }
    
    public function sanitizeData($data){
        $data = htmlspecialchars($data);
        $data = rtrim($data);
        return $data;
    }

    public function getSingleRecord($id){
      $id = $this->sanitizeData($id);
      $query = $this->con->prepare("SELECT * FROM book_issue WHERE id = :id");
      $query->bindParam(":id",$id);
      $query->execute();
      if($query->rowCount() > 0){
         return $query->fetch();
      }else{
         return 0;
      }
    }

    public function deleteIssueBookRecord($id){
        $id = $this->sanitizeData($id);
        $delQuery = $this->con->prepare("DELETE FROM `book_issue` WHERE id=:id");
        $delQuery->bindParam(":id",$id);
        $delQuery->execute();
    }

    public function checkUserExists($email){
        $email = $this->sanitizeData($email);
        $selquery = $this->con->prepare("SELECT * FROM admin WHERE email =:email");
        $selquery->bindParam(":email",$email);
        $selquery->execute();
        $resultres = $selquery->fetchAll(PDO::FETCH_ASSOC);
        if(count($resultres) > 0){
           return true;
        }else{
           return false;
        }
     }

     public function getAllIssueBookRecords(){
         $data = $this->con->prepare("SELECT * FROM book_issue ORDER BY id DESC");
         $data->execute();
         return $data->fetchAll(PDO::FETCH_ASSOC);
     }

     public function issueBook($studentName,$course,$semester,$rollno,$bookName,$isbn,$issueDate,$status){
        //Check if any field is empty . If any field is empty so return false and take further action
        if($studentName == '' || $course == '' || $semester == '' || $rollno == '' || $bookName == '' || $isbn == '' || $issueDate == ''){
            return false;
        }
        //Sanitize data for extra protection for any attack
        $studentName = $this->sanitizeData($studentName);
        $course = $this->sanitizeData($course);
        $semester = $this->sanitizeData($semester);
        $rollno = $this->sanitizeData($rollno);
        $bookName = $this->sanitizeData($bookName);
        $isbn = $this->sanitizeData($isbn);
        $issueDate = $this->sanitizeData($issueDate);
        
        $uploadQuery = $this->con->prepare("INSERT INTO `book_issue`(`student_name`, `student_course`, `student_sem`, `student_roll_no`, `book_name`, `book_isbn`, `issue_date`, `status`) VALUES (:sname,:course,:sem,:rollno,:bookName,:isbn,:issueDate,:status)");
        $uploadQuery->bindParam(":sname",$studentName);
        $uploadQuery->bindParam(":course",$course);
        $uploadQuery->bindParam(":sem",$semester);
        $uploadQuery->bindParam(":rollno",$rollno);
        $uploadQuery->bindParam(":bookName",$bookName);
        $uploadQuery->bindParam(":isbn",$isbn);
        $uploadQuery->bindParam(":issueDate",$issueDate);  
        $uploadQuery->bindParam(":status",$status);                                           
        $uploadQuery->execute();
        return true;
     }

     public function updateIssueBook($studentName,$course,$semester,$rollno,$bookName,$isbn,$issueDate,$status,$return_date,$id){
        //Check if any field is empty . If any field is empty so return false and take further action
        if($studentName == '' || $course == '' || $semester == '' || $rollno == '' || $bookName == '' || $isbn == '' || $issueDate == ''){
            return false;
        }
        //Sanitize data for extra protection for any attack
        $id = $this->sanitizeData($id);
        $studentName = $this->sanitizeData($studentName);
        $course = $this->sanitizeData($course);
        $semester = $this->sanitizeData($semester);
        $rollno = $this->sanitizeData($rollno);
        $bookName = $this->sanitizeData($bookName);
        $isbn = $this->sanitizeData($isbn);
        $issueDate = $this->sanitizeData($issueDate);
        $return_date = $this->sanitizeData($return_date);
        
        $updateQuery = $this->con->prepare("UPDATE `book_issue` SET `student_name`=:sname,`student_course`=:course,`student_sem`=:sem,`student_roll_no`=:rollno,`book_name`=:bookName,`book_isbn`=:isbn,`issue_date`=:issueDate,`return_date`=:return_date,`status`=:status WHERE id=:id");
        $updateQuery->bindParam(":sname",$studentName);
        $updateQuery->bindParam(":course",$course);
        $updateQuery->bindParam(":sem",$semester);
        $updateQuery->bindParam(":rollno",$rollno);
        $updateQuery->bindParam(":bookName",$bookName);
        $updateQuery->bindParam(":isbn",$isbn);
        $updateQuery->bindParam(":issueDate",$issueDate);  
        $updateQuery->bindParam(":return_date",$return_date);
        $updateQuery->bindParam(":status",$status);    
        $updateQuery->bindParam(":id",$id);                                       
        $updateQuery->execute();
        return true;
     }

     public function listBook($title,$imageUrl,$category,$status,$author,$descreption){
        $title = $this->sanitizeData($title);
        $imageUrl = $this->sanitizeData($imageUrl);
        $category = $this->sanitizeData($category);
        $status = $this->sanitizeData($status);
        $author = $this->sanitizeData($author);
        $descreption = $this->sanitizeData($descreption);
        
        $listBookQuery = $this->con->prepare("INSERT INTO books(title, image_url, category, status, author, descreption) VALUES (:title,:url,:cat,:sta,:author,:desc)");
        $listBookQuery->bindParam(":title",$title);
        $listBookQuery->bindParam(":url",$imageUrl);
        $listBookQuery->bindParam(":cat",$category);
        $listBookQuery->bindParam(":sta",$status);
        $listBookQuery->bindParam(":author",$author);
        $listBookQuery->bindParam(":desc",$descreption);
        $listBookQuery->execute();
     }

     public function registerUser($email,$password){
        //Will be code
    $email = $this->sanitizeData($email);
    $password = $this->sanitizeData($password);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $register = $this->con->prepare("INSERT INTO admin (email, password) VALUES (:email,:password)");
    $register->bindParam(":email",$email);
    $register->bindParam(":password",$password);
    $register->execute();
    }

    public function loginAdmin($email,$password){
        $email = $this->sanitizeData($email);
        $password = $this->sanitizeData($password);
        $selquery = $this->con->prepare("SELECT password FROM admin WHERE email =:email");
        $selquery->bindParam(":email",$email);
        $selquery->execute();
        $passwordDb = $selquery->fetchColumn();
        if(password_verify($password,$passwordDb)){
            return true;
        }else{
            return false;
        }
    }


}