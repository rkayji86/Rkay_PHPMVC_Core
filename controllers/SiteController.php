<?php

namespace app\controllers;

use app\models\ContactForm;
use rkay\rkaymvc\Application;
use rkay\rkaymvc\Controller;
use rkay\rkaymvc\Request;
use rkay\rkaymvc\Response;

class SiteController extends Controller
{

    public function home()
    {
        $params = [
            'name' => 'Rkay Ji'
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                $response->redirect('/contact');
            }

        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }

}