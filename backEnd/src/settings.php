<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 


return [
    'settings' => [
        'displayErrorDetails' => true, // set tot false in production
        'addContentLengthHeader' => false, //Allow web server to send the content-length header
        'upload_directory' => __DIR__ . '/../public/uploads', //upload directory

        //renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        //Database connection settings
        "db" => [
            "host" => "localhost",
            "dbname" => "lookyourjob",
            "user" => "root",
            "pass" => "",
        ]
    ],
];



?>