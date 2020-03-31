<?php
 if (!empty($_FILES['fileimagem']))
    {
        $upload = move_uploaded_file($_FILES['fileimagem']['tmp_name'], '../img/upload/'.$_FILES['fileimagem']['name']);       
    	echo '../img/upload/'.$_FILES['fileimagem']['name'];
    }
    else
    {
        echo 'false';
    }
?>