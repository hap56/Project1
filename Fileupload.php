<?php
class Fileupload extends page
{
	public function Get()
	{
		//uploading the html form using get method
		$form = '<form method="Post" enctype="multipart/form-data">';
		$form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
		$form .= '<input type="submit" value="Upload CSV File" name="submit">';
		$form .= '</form> ';
		$this->a .= '<h1>Upload File</h1>';
		$this->a .= $form;
	}
	public function Post()
	{
		// uploadind and saving the csv file using post method
		$csvfile_store = "upload/";
		$csv_file = $csvfile_store . basename($_FILES["fileToUpload"]["name"]);
		$FileType = pathinfo($csv_file,PATHINFO_EXTENSION);
			if($FileType!= "csv")	
			{
			  echo "Sorry, only CSV files are allowed.";
		    }
		else
		{
			$FileName = pathinfo($csv_file, PATHINFO_BASENAME);
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $csv_file);
			//header function to dynamically load the csv uploaded file and accessing it on the htmltable page
			header('Location: index.php?page=Htmltable&filename='.$csv_file);
		}
	}
}
?>