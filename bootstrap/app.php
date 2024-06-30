<?php

// Set Application Path
\UpiCore\Ceremony\Utils\Destination\PathResolver::setApplicationPath(\UPI_BASE_DIR);

// Call another preparations
\UpiCore\Ceremony\Utils\App\Preparation::init([
    'localization',
    'dotenv'
]);
