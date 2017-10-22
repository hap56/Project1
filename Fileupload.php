<?php
class Fileupload extends page
{
	public function get()
	{
		$form = '<form method="Post" enctype="multipart/form-data">';
		$form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
		$form .= '<input type="submit value="Upload CSV File" name="submit">';
		$form .= '</form>';
		$this->a .= '<h1>Upload File</h1>';
		$this->a .= $form;
	}
}
?>