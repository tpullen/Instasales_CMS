	<table class='table shipping_tbl table-striped table-bordered dataTable no-footer' style="width:100%;">
		<thead>
			<tr role="row">
				<th>ID</th>
				<th>Shipping Type</th>
				<th>Shipping Cost</th>
				<th>Action</th>
			</tr>	
		</thead>
		<?php 
			$num_rows = $query->num_rows();
			if($num_rows>0){
				echo "<h2>Current Options</h2>";
				echo"<tbody>";
				foreach ($query->result() as $row) {
					echo "
					<tr role='role'>
					<td data-label='ID'>";
					echo $row->id. "";
					echo"</td>";
					echo"<td data-label='Shipping Type'>";
					echo $row->shipping_type. "";
					echo"</td>";
					echo"<td data-label='Shipping Cost'>";
					echo '£'.$row->cost. "";
					echo"</td>";
					echo"<td data-label=''>";
					echo"<button class='btn btn-danger btn-md stack'>" . anchor ('Shipping/remove/'.$row->id,' Remove ')."<i class='fa fa-times'></i></button>";
					echo"</td>
						 </tr>";
				}
				echo "</tbody>";
				echo "</li>";
			}
		?>
	</table>
