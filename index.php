<?php

/**
 * Ultra Fast API - The Project Based on RESTful API Architecture
 * 
 * @author Gokhan Korul <me@gokhankorul.dev>
 * @version v1.0
 */

require_once 'autoload.php';


// App initialization
\UpiCore\Ceremony\Utils\App\Preparation::app(__DIR__);

/**
 * Router Initialization
 *
 * This section outlines the steps to initialize and configure the Router class.
 */

// Initialize the Router class
$router = new UpiCore\Router\Router();

/**
 * Set Content Type
 * 
 * This function sets the content type for API responses. The options available are JSON and XML.
 * In this example, the content type is set to JSON with the default charset defined in the configuration.
 */
$router->contentType(JSON, \UpiCore\Config\Config::get('Localization')->DEFAULT_LOCALE->CHARSET);

/**
 * Set Allowed Origins
 * 
 * This function defines which origins are allowed to access the API. When set to ALL_ORIGINS,
 * it adds an 'Access-Control-Allow-Origin' header with the value '*', allowing access from any origin.
 */
$router->allowedOrigin(ALL_ORIGINS);

/**
 * Set Allowed Methods
 * 
 * This function specifies which HTTP methods are allowed for the API. It not only adds the allowed methods
 * to the headers but also handles errors internally for methods that are not permitted.
 * In this example, GET, POST, PATCH, DELETE, and PUT methods are allowed. Additional methods like HEAD,
 * CONNECT, OPTIONS, and TRACE can also be allowed.
 */
$router->allowedMethods(GET, POST, PATCH, DELETE, PUT);

/**
 * Set Headers
 * 
 * This function sets various headers for the API responses. These headers are handled internally
 * according to PSR-7 standards. The headers listed here are examples and can be modified as per user preference.
 * The included headers are typical for a RESTful API.
 * 
 * - Access-Control-Allow-Headers: Specifies which headers can be used during the actual request.
 * - Access-Control-Max-Age: Specifies how long the results of a preflight request can be cached (in seconds).
 * - Cache-Control: Controls caching mechanisms for the response.
 * - Expires: Sets the expiration date and time for the response.
 * - Accept-Ranges: Indicates that the server accepts range requests for a resource.
 * - Pragma: Used for backward compatibility with HTTP/1.0 caches where the Cache-Control header is not yet present.
 * - X-Content-Type-Options: Prevents browsers from MIME-sniffing a response away from the declared content-type.
 * - X-Frame-Options: Provides clickjacking protection by not allowing the page to be displayed in a frame.
 * - Referrer-Policy: Controls how much referrer information should be included with requests.
 * - Strict-Transport-Security: Enforces secure (HTTP over SSL/TLS) connections to the server.
 */
$router->setHeaders([
    'Access-Control-Allow-Headers'      =>  ['Authorization', 'Content-Type', 'X-Requested-With'],
    'Access-Control-Max-Age'            =>  '3600',
    'Cache-Control'                     =>  ['no-cache', 'no-store', 'must-revalidate'],
    'Expires'                           =>  '0',
    'Accept-Ranges'                     =>  'bytes',
    'Pragma'                            =>  'no-cache',
    'X-Content-Type-Options'            =>  'nosniff',
    'X-Frame-Options'                   =>  'DENY',
    'Referrer-Policy'                   =>  'no-referrer',

    'Strict-Transport-Security: max-age=31536000; includeSubDomains',
]);

/**
 * Router Initialization with Custom Controller
 *
 * This code snippet demonstrates how to initialize the router and specify a custom controller using a callback.
 * It provides flexibility to use different controllers that implement the \UpiCore\Controller\Interfaces\ControllerInterface.
 *
 * @param callable $initializer A callback function that initializes and returns an instance of a custom controller.
 *                              The function takes parameters \UpiCore\Router\Http\Client and \UpiCore\Router\RouterContext.
 *                              
 * @return \UpiCore\Controller\Interfaces\ControllerInterface
 */
$router->_init(function (\UpiCore\Router\Http\Client $client, \UpiCore\Router\RouterContext $routerContext, /*, Router $router */) {
    return new \UpiCore\Controller\MethodController($client, $routerContext);
});

/**
 * Sets an access control function for the router.
 * 
 * The _access() method will throw an exception if the provided callback returns false.
 * This allows you to handle the authentication process using any conditions, 
 * such as checking for a "Bearer Token" in the API request.
 * 
 * Example: To get the access token from the request headers:
 * $client->getHeader('HTTP_AUTHORIZATION');
 * 
 * @param callable $callback A callback function that takes a \UpiCore\Router\Http\Client 
 * instance and returns a boolean indicating whether access is granted.
 * 
 * @throws \UpiCore\Exception\UpiException if the callback returns false.
 * 
 * @return bool
 */
$router->_access(function (\UpiCore\Router\Http\Client $client) {
    return true;
});

/**
 * Router Output Configuration
 *
 * This code snippet configures the router to return a PSR-7 compliant Response object using a callback function.
 * The function takes a \UpiCore\Router\RouterContext parameter and optionally a Router parameter.
 * It is required to return an instance of \UpiCore\Router\RouterContext which encapsulates a PSR-7 compliant Response object.
 *
 * @param callable $outputCallback A callback function that processes the router context and optionally the router itself.
 * 
 * @return \UpiCore\Router\RouterContext
 */
$router->_out(function (\UpiCore\Router\RouterContext $routerContext, /*, Router $router */) {
    return $routerContext;
});

/**
 * Emit Router Configuration
 *
 * This code snippet executes the configuration changes made using the `_init`, `_access` and `_out` methods.
 * It finalizes the router setup by processing the initialization and output configuration.
 *
 * @return void
 */
$router->_emit();
