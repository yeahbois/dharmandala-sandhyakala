<?php

echo "========================================\n";
echo "   SERVER ENVIRONMENT DIAGNOSTICS   \n";
echo "========================================\n\n";

// Check PHP Version
echo "PHP Version: " . phpversion() . "\n\n";

// Check Loaded Extensions
echo "Loaded PHP Extensions:\n";
$extensions = get_loaded_extensions();
sort($extensions);
echo implode("\n", $extensions);
echo "\n\n========================================\n";

?>
