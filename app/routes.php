<?php
// Routes


use App\Action\Home;


// Return widget config
$app->get('/widget', 'App\Action\Privacy:getWidgetTerm');

// Return all terms
$app->get('/term', 'App\Action\Terms:getAllTerms');
