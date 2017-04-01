	<table class='table colours_tbl table-striped table-bordered dataTable no-footer'>
		<thead>
			<tr role="row">
				<th>ID</th>
				<th>Colour</th>
				<th>Action</th>
			</tr>	
		</thead>
		<?php 
		$num_rows = $query->num_rows();
		if($num_rows>0){
			echo "<h2>Current Options</h2>";
			echo"<tbody>";
			foreach ($query->result() as $row) {
				echo"
				<tr role='role'>
				<td>";
				echo $row->id. "";
				echo"</td>";
				echo"<td>";
				echo $row->product_colour. "";
				echo"</td>";
				echo"<td>";
				echo "<button class='btn btn-danger btn-md stack'>" . anchor ('Product_colours/remove/'.$row->id.'/'.$product_id,' Remove ')."<i class='fa fa-times'></i></button>";
				echo"</td>
					</tr>";
			}
			echo "</tbody>";
			echo"</li>";
		}
		?>
	</table>