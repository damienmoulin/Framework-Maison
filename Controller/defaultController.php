<?php
/**
 * Created by PhpStorm.
 * User: damien.moulin
 * Date: 18/07/2019
 * Time: 10:56
 */

namespace Controller;


class defaultController extends Controller
{
    public function __construct($db)
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $response = ["message" => "GET"];
        return $this->render('default/index', $response);
    }

    public function addAction()
    {
        $response = ["message" => "POST"];
        return $this->render('default/index', $response);
    }

    public function editAction()
    {
        $response = ["message" => "PUT"];
        return $this->render('default/index', $response);
    }

    public function deleteAction()
    {
        $response = ["message" => "DELETE"];
        return $this->render('default/index', $response);
    }

}