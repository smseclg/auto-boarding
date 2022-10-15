<?php
	include("config/db.php");
	
	$db = $conn;
	$bid = $_POST['bid'];
	
	error_log("INFO Boarder ID is - ".$bid);
	
	function fetch_data($bid){
	 global $db;
	  $query="SELECT * from boarder WHERE boarderid =".$bid;
	  //$query="SELECT * from boarder";
	  error_log("INFO - User Logged : ".$query);
	  $exec=mysqli_query($db, $query);
	  if(mysqli_num_rows($exec)>0){
		$row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
		return $row;  
			
	  }else{
		return $row=[];
	  }
	}
	


$fetchData= fetch_data($bid);
show_data($fetchData);

function show_data($fetchData){
 echo '<table border="1">
        <tr>
            <th>boarderid</th>
            <th>boarderna</th>
            <th>boarderroomid</th>
			<th>boardersharingroom</th>
            <th>boarderstatus</th>
			<!--<th>Edit</th>-->
			<!--<th>Delete</th>-->
        </tr>';
 if(count($fetchData)>0){
      
      foreach($fetchData as $data){ 
  echo "<tr>
          <td>".$data['boarderid']."</td>
          <td>".$data['boarderna']."</td>
		  <td>".$data['boarderroomid']."</td>
          <td>".$data['boardersharingroom']."</td>
		  <td>".$data['boarderstatus']."</td>
          <!--<td><a href='crud-form.php?edit=".$data['id']."'>Edit</a></td>-->
          <!--<td><a href='crud-form.php?delete=".$data['id']."'>Delete</a></td>-->
   </tr>";
       

     }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
?>
