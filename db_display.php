<html>
	<head>
		<title>Display</title>
		<title>Insert data to database</title>
		<style type = "text/css">
		table {
			margin: 0 auto;            
		}​
		p{
			color: #555;
			text-align: center;
			margin: 0 auto 20px;
			position: relative;
			line-height: 100px;
			color: #555;
		}
      </style>
	</head>
	<body>
		<?php
			# ardument: query results
			function display_table($query_obj)
			{
				$num_rows = pg_num_rows($query_obj);
				$num_fields = pg_num_fields($query_obj);
				echo ' <table align="center" border="1">
						<tr>';
				$field_list = array();
				# Display Header
				for ($i=0; $i<$num_fields; $i++)
				{
					$field_name = pg_field_name($query_obj, $i);
					$field_list[$i] = $field_name;
					echo "<th> $field_name </th>";		
				}		
				echo "</tr>";
				# display a rows function
				function display_row($row, $fieldlist)
				{
					echo "<tr>\n";
					foreach ($fieldlist as $fieldname)
					{
						echo "<td>", $row[$fieldname], "</td>";					
					}
					echo "</tr>";
				}
				# display all rows
				for ($row_index=0; $row_index<$num_rows; $row_index++)
				{
					$row = pg_fetch_array($query_obj, $row_index);
					# display a row	
						display_row($row, $field_list);					
				}
				echo "</table>";		
			}
		?>
	</body>

</html>
