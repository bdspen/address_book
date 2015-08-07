<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();

//creates 'contact_info' array if SESSION is empty

    if (empty($_SESSION['contact_info'])) {
        $_SESSION['contact_info'] = array();
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

    $app->post("/contacts", function() use ($app) {
        $contact = new Car($POST['create_name'], $_POST['create_phone'],
        $_POST['create_address']);
        $contact->save();
        return $app['twig']->render('contacts.html.twig', array ('new_contact => $contact'));
    });
 ?>
