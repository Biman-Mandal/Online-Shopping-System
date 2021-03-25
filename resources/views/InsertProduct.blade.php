<center>
	<h2>Product Insert</h2>
<form method="post" enctype="multipart/form-data" action="{{route('ProductInsert')}}">
	@csrf
	<table border="1">
		<tr>
			<td>Name of the product</td>
			<td><input type="text" name="ProductName" required></td>
		</tr>
		<tr>
			<td>Brand Name</td>
			<td><input type="text" name="BrandName" required></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input type="number" name="Price" required></td>
		</tr>
		<tr>
			<td>Image1</td>
			<td><input type="file" name="Image1" required></td>
		</tr>
		<tr>
			<td>Image2</td>
			<td><input type="file" name="Image2"></td>
		</tr>
		<tr>
			<td>Image3</td>
			<td><input type="file" name="Image3"></td>
		</tr>
		<tr>
			<td>Image4</td>
			<td><input type="file" name="Image4"></td>
		</tr>
		<tr>
			<td>Image5</td>
			<td><input type="file" name="Image5"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input type="text" name="Description" required></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>	
</form>
</center>