<?php

/**
 * viewLOD, a simple application that emulates a Linked Data browser or a
 * human browser and returns the appropriate version of a LOD resource's
 * representation. Written in the Slim micro-framework, slimframework.com.
 * 
 * Distributed under the MIT License, http://opensource.org/licenses/MIT.
 */

// Slim setup.
require 'lib/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

/**
 * Route for GET /.
 *
 * @param object $app
 * The global $app object instantiated at the top of this file.
 */
$app->get('/', function () use ($app) {
  // Load the form template.
  $app->render('getLOD.htm');
});

/**
 * Route for POST /. Process the POST from the getLOD.htm template's form. Uses
 * CURL to get the appropriate representation for the resource and dispaly the
 * raw markup to the user.
 *
 * @param object $app
 * The global $app object instantiated at the top of this file.
 */
$app->post('/', function () use ($app) {
  $req = $app->request();
  $ch = curl_init();
  // If the user has chosen to emulate a Linked Open Data browser, ask the
  // web server to return the RDF representation of the resource.
  if ($req->post('browser_type') == 'lod') {
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/rdf+xml"));
  }
  curl_setopt($ch, CURLOPT_URL, trim($req->post('uri')));
  // Tell CURL to follow redirects.
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

  // Render the view template, and let SyntaxHighlighter do its thing.
  $app->render('viewLOD.htm', 
    array('output' => array('data' => htmlspecialchars($output, ENT_QUOTES)))
  );
});

$app->run();

