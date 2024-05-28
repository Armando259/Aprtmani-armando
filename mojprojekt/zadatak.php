<?php

$url = "https://b2b.elektroprofi.hr/api/eracuni_get.php";
function sxe($url)
{   
    $xml = file_get_contents($url);
    foreach ($http_response_header as $header)
    {   
        if (preg_match('#^Content-Type: text/xml; charset=(.*)#i', $header, $m))
        {   
            switch (strtolower($m[1]))
            {   
                case 'utf-8':
                    // do nothing
                    break;

                case 'iso-8859-1':
                    $xml = utf8_encode($xml);
                    break;

                default:
                    $xml = iconv($m[1], 'utf-8', $xml);
            }
            break;
        }
    }

    return simplexml_load_string($xml);
}

if ($xml === false) {
    echo "Failed to load XML: ";
    foreach (libxml_get_errors() as $error) {
        echo "<br>", htmlspecialchars($error->message);
    }
    libxml_clear_errors();
    exit;
}

// Output headers for XML
header('Content-Type: text/html; charset=utf-8');

// Function to recursively print XML data in a human-readable format
function print_xml($xml, $level = 0) {
    foreach ($xml->children() as $child) {
        $indent = str_repeat(' ', $level * 4); // Create indentation for better readability
        $name = $child->getName();
        $value = htmlspecialchars((string) $child);
        if (trim($value) == '') {
            echo "{$indent}{$name}:\n";
            print_xml($child, $level + 1);
        } else {
            echo "{$indent}{$name}: {$value}\n";
        }
    }
}

// Use the function to print XML details
echo "<pre>";
print_xml($xml);
echo "</pre>";

?>
