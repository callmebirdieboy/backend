return [

/*
|----------------------------------------------------------------------
| Cross-Origin Resource Sharing (CORS) Configuration
|----------------------------------------------------------------------
|
| Here you may configure your settings for cross-origin resource sharing
| or "CORS". This determines what cross-origin operations may execute
| in web browsers. You are free to adjust these settings as needed.
|
| To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
|
*/

'paths' => ['api/*', 'sanctum/csrf-cookie'],  // Ensure it applies to your API routes and Sanctum CSRF cookie

'allowed_methods' => ['*'],  // Allow all HTTP methods (GET, POST, etc.)

'allowed_origins' => [
    'https://angularfrontfinal-production.up.railway.app',  // Only allow your frontend URL
],

'allowed_origins_patterns' => [],  // You can leave this empty or add patterns if necessary

'allowed_headers' => ['*'],  // Allow all headers (You can specify specific headers if needed)

'exposed_headers' => [],  // Any headers you want to expose (leave empty if none)

'max_age' => 0,  // Cache the preflight request for 0 seconds (adjust if needed)

'supports_credentials' => false,  // Set to true if you want to allow cookies or other credentials

];
