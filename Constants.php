<?php

if (!\defined('UPI_CONSTANTS')) {
    if (!\defined('_DS'))
        \define('_DS', \DIRECTORY_SEPARATOR);

    \define('UPI_BASE_DIR', realpath(__DIR__));
    \define('ERROR_DETAILS', true);
    \define('UPI_CONSTANTS', true);
}
