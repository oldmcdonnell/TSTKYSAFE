// config/cors.php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['https://your-vercel-app.vercel.app'],
    'allowed_headers' => ['*'],
    'supports_credentials' => true,
];
