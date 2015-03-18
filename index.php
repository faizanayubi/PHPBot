<?php
/**
 * WebBot example
 */

// load WebBot library with bootstrap
require_once './lib/WebBot/bootstrap.php';

// URLs to fetch data from
$urls = [
    'search' => 'www.google.com',
    'chrome' => 'www.google.com/intl/en/chrome/browser/',
    'products' => 'www.google.com/intl/en/about/products/'
];

// document fields [document field ID => document field regex pattern, [...]]
$document_fields = [
    'title' => '<title.*>(.*)<\/title>',
    'h2' => '<h2[^>]*?>(.*)<\/h2>',
];

// set WebBot object
$webbot = new \WebBot\WebBot($urls, $document_fields);

// execute fetch data from URLs
$webbot->execute();

// display documents summary
echo $webbot->total_documents . ' total documents <br />';
echo $webbot->total_documents_success . ' total documents fetched successfully <br />';
echo $webbot->total_documents_failed . ' total documents failed to fetch <br /><br />';


// check if fetch(es) successful
if ($webbot->success) {
    // display each document
    foreach ($webbot->getDocuments() as /* \WebBot\Document */ $document) {
        $data = $document->find('<title>', '</title>'); // get       // '<title>[data]'
        if ($data) {
            print_r($data);
        } else {
            echo 'Data not found <br />';
        }
    }
} else { // not successful, display error
    echo 'Failed, error: ' . $webbot->error;
}

// see logs
echo '<hr>';
echo '<pre>', print_r($webbot->getLog()), '</pre>';