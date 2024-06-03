<?php

return [

    /*
    |--------------------------------------------------------------------------
    | QR Code Backend
    |--------------------------------------------------------------------------
    |
    | Here you may specify the backend to use for generating QR codes. By default,
    | the SimpleSoftwareIO\QrCode\Generator class is used. However, you can
    | change this to any class that implements the
    | SimpleSoftwareIO\QrCode\Contracts\QrCodeInterface interface.
    |
    */

    'backend' => 'imagick',

];