<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $fileName = filter_input(INPUT_GET, 'fileName');
        $file = new SplFileObject($fileName, "r");
        $fileSize = $file->getSize();
        $fileType = $file->getExtension();
        $dateCreated = date("l F j, Y, g:i a", $file->getMTime());
        $contents = $file->fread($file->getSize());
        $file = NULL;
        ?>
        
        <p>File Size: <?php echo $fileSize; ?> bytes</p>
        <p>File Type: <?php echo $fileType; ?></p>
        <p>Date Created: <?php echo $dateCreated; ?></p>
        <p>Download: <a href="<?php echo $fileName; ?>"><?php echo $fileName; ?></a></p>
        
        <?php switch($fileType):
            case 'jpg':?>
            <?php case 'png': ?>
            <?php case 'jpeg': ?>
                <img src="<?php echo $fileName; ?>">
            <?php break; ?>
        
            <?php case 'txt': ?>
                <textarea><?php echo $contents; ?></textarea>
            <?php break; ?>
        
            <?php case 'html': ?>
            <?php case 'pdf': ?>
                <iframe src="<?php echo $fileName; ?>"></iframe>
            <?php break; ?>
                
            <?php case 'doc': ?>
            <?php case 'docx': ?>
                
            <?php case 'doc': ?>
            <?php case 'docx': ?>
            
        <?php endswitch; ?>
    </body>
</html>
