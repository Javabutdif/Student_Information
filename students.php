<?php

include "./server.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

   
</head>
<body>
    <?php 
    // Include the navbar here
    include "./components/navbar.php";
    ?>

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-blue-600">Students</h1>

        <form method="POST">
        <div class="container flex flex-row my-2 gap-2">
            <label id="selectCourse" >Select Course: </label>
            <select id="selectCourse" name="selectedCourse" class="bg-gray-100">
            <option value="All">All</option>
             <option value="BSIT">BSIT</option>
              <option value="BSCS">BSCS</option>
               <option value="BSCE">BSCE</option>
                <option value="BSEE">BSEE</option>
        </select>
        <button type="submit" name="filterCourse" class="p-1 bg-blue-400 hover:bg-blue-600 text-white rounded-md">Filter</button>
        </div>
        </form>
       
        <table id="example" class="display table-auto w-full bg-white shadow-md rounded-md">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2">ID Number</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Course</th>
                    <th class="px-4 py-2">Year</th>
                    <th class="px-4 py-2">Action</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($filtered_course == "" ? get_all_students("All") : $filtered_course as $students):
                ?>
                <tr>
                    <td class="px-4 py-2"><?php echo $students['student_id'] ?></td>
                    <td class="px-4 py-2"><?php echo $students['student_name'] ?></td>
                    <td class="px-4 py-2"><?php echo $students['student_course'] ?></td>
                    <td class="px-4 py-2"><?php echo $students['student_year'] ?></td>
                    <td class="px-4 py-2">
                        <div class="flex flex-row gap-2">
                            <a href="edit.php?student_id=<?php echo $students['student_id']; ?>" class="p-2 bg-gray-700 hover:bg-gray-500 rounded-md text-white">Edit</a>
                            
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $students['student_id']; ?>"/>
                                <button type="submit" name="deleteStudent" class="p-2 bg-red-700 hover:bg-red-500 rounded-md text-white">Delete</button>
                            </form>
                           
                        </div>
                    </td>
                
                </tr>
               <?php 
                    endforeach;
               ?>
            </tbody>
        </table>
    </div>

   <script>
   $(document).ready(function () {
   
    if ($.fn.DataTable) {
        $('#example').DataTable();
    } else {
        console.error('DataTables plugin not found!');
    }
});
</script>

    <?php
    // Include footer
    include "./components/footer.php";
    ?>
</body>
</html>

  