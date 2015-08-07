<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();

//creates 'list_of_contacts' array if SESSION is empty

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

//root or homepage route
    $app->get("/", function() use ($app) {
        return $app['twig']->render('contacts.html.twig',
        array('contacts' => Contact::getAll()));
    });

    $app->post("/create_contact", function() use ($app) {
        $contact = new Contact($_POST['create_name'], $_POST['create_phone'],
        $_POST['create_address']);
        $contact->save();
        return $app['twig']->render('create_contact.html.twig',
        array ('contacts' => Contact::getAll()));
    });

    $app->post('/delete_contacts', function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });

    return $app;
 ?>
