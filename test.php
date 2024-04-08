<?php
// Check if GD is installed
if (extension_loaded('gd') && function_exists('gd_info')) {
    echo "GD is installed on this server.<br>";
    
    // Print GD information
    echo "GD Version: " . gd_info()['GD Version'] . "<br>";
    echo "FreeType Support: " . (gd_info()['FreeType Support'] ? 'Yes' : 'No') . "<br>";
    echo "GIF Read Support: " . (gd_info()['GIF Read Support'] ? 'Yes' : 'No') . "<br>";
    echo "GIF Create Support: " . (gd_info()['GIF Create Support'] ? 'Yes' : 'No') . "<br>";
    echo "JPEG Support: " . (gd_info()['JPEG Support'] ? 'Yes' : 'No') . "<br>";
    echo "PNG Support: " . (gd_info()['PNG Support'] ? 'Yes' : 'No') . "<br>";
    echo "WBMP Support: " . (gd_info()['WBMP Support'] ? 'Yes' : 'No') . "<br>";
    echo "XPM Support: " . (gd_info()['XPM Support'] ? 'Yes' : 'No') . "<br>";
    echo "XBM Support: " . (gd_info()['XBM Support'] ? 'Yes' : 'No') . "<br>";
} else {
    echo "GD is not installed or not enabled on this server.";
}
?>
