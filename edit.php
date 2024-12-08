<?php 

    //Inlude diri ang server.php para maka gamit tas function 
include './server.php';
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];


    $query = "SELECT * FROM student WHERE student_id = '$student_id'";

    $result = mysqli_query($connection, $query);
    $student = mysqli_fetch_assoc($result);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
     <?php 
    //Include the navbar here for dynamic 
    //Note nikuha rakos online for designing kay dili ko designer HAHAHAHHA
    include "./components/navbar.php";
    ?>
    


<div>
  <form class="p-2" method="POST">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold text-gray-900">Edit Student</h2>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="idnum" class="block text-sm font-medium text-gray-900">ID Number</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="idnum" id="idnum" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" placeholder="Enter ID Number" value="<?php echo $student['student_id'] ?>" readonly>
              </div>
            </div>

            <label for="name" class="block text-sm font-medium text-gray-900 mt-5">Full Name</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="name" id="name" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" placeholder="Enter fullname" value="<?php echo $student['student_name'] ?>" required>
              </div>
            </div>

              <label for="course" class="block text-sm font-medium text-gray-900 mt-5">Course</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <select name="course" id="course" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm">
    <option value="" disabled <?php echo empty($student['course']) ? 'selected' : ''; ?>>Select Course</option>
    <option value="BSIT" <?php echo $student['student_course'] == 'BSIT' ? 'selected' : ''; ?>>BSIT</option>
    <option value="BSCS" <?php echo $student['student_course'] == 'BSCS' ? 'selected' : ''; ?>>BSCS</option>
    <option value="BSCE" <?php echo $student['student_course'] == 'BSCE' ? 'selected' : ''; ?>>BSCE</option>
    <option value="BSEE" <?php echo $student['student_course'] == 'BSEE' ? 'selected' : ''; ?>>BSEE</option>
</select>

              </div>
            </div>

              <label for="year" class="block text-sm font-medium text-gray-900 mt-5">Year</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
               
               <select name="year" id="year" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" value="<?php echo $student['year']; ?>">
    <option value="" disabled <?php echo empty($student['year']) ? 'selected' : ''; ?>>Select Year</option>
    <option value="1" <?php echo $student['student_year'] == 1 ? 'selected' : ''; ?>>1</option>
    <option value="2" <?php echo $student['student_year'] == 2 ? 'selected' : ''; ?>>2</option>
    <option value="3" <?php echo $student['student_year'] == 3 ? 'selected' : ''; ?>>3</option>
    <option value="4" <?php echo $student['student_year'] == 4 ? 'selected' : ''; ?>>4</option>
</select>


              </div>
            </div>
            
            <div class="mt-6 ">
                <a href="students.php"  class="bg-red-800 p-2 rounded-md text-sm hover:bg-red-600 text-white" type="button">Cancel</a>
                <button name="submitEdit" class="bg-gray-800 p-2 rounded-md text-sm hover:bg-gray-600 text-white" type="submit">Save</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>







      <?php
    //include footer
    include "./components/footer.php";
    ?>
</body>
</html>