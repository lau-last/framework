<?php

namespace App\Controller;

use Core\DCI\AutoWiring;
use Core\Form\Button;
use Core\Form\Form;
use Core\Form\Input;
use Core\Form\Label;
use Core\Form\Option;
use Core\Form\Select;
use Core\Query\Manager;

class HomeController
{


    public function showHome(): void
    {
        $from = (new Form(['method' => 'post', 'action' => '/']))
            ->addLabel(new Label('value', ['class' => 'form']))
            ->addField(new Input('value'))
            ->addField(
                (new Select('select'))
                    ->addOption(new Option('1', '1'))
                    ->addOption(new Option('2', '2'))
                    ->addOption(new Option('3', '3'))
            )
            ->addButton(new Button('envoyer'));
        echo $from;
    }




}
