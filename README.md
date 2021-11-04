# Microsoft teams connector for PHP

Warning: This package has moved to an other repository: https://github.com/skrepr/teams-connector

A very simple PHP package for sending messages to [Microsoft Teams](https://teams.microsoft.com)
with [incoming webhooks](https://docs.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/add-incoming-webhook),
focused on ease-of-use and elegant syntax.


* Symfony integration: [Teams bundle](https://github.com/EJTJ3/teams-bundle)

## Requirements

* PHP 7.2+

## Installation

You can install the package using the [Composer](https://getcomposer.org/) package manager. You can install it by running this command in your project root:

```sh
composer require ejtj3/teams
```

Then [create an incoming webhook](incoming webhooks) on your Microsoft teams channel for the package to use.

## Basic Usage

### Create a simple card

```php
<?php

declare(strict_types=1);

use EJTJ3\Teams\Card;
use EJTJ3\Teams\Client;

$client = new Client('https://...');

$card = (new Card('Larry Bryant created a new task'))
    ->setText('Yes, he did')
    ->setThemeColor(Card::STATUS_DEFAULT)
    ->setTitle('Adding Title to the card');

$client->send($card);
```

### Adding a section

```php
<?php

declare(strict_types=1);

use EJTJ3\Teams\Card;
use EJTJ3\Teams\Section;

$card = new Card('Larry Bryant created a new task');

$section = (new Section('![TestImage](https://47a92947.ngrok.io/Content/Images/default.png)Larry Bryant created a new task'))
    ->setActivitySubtitle('On Project Tango')
    ->setActivityImage('https://teamsnodesample.azurewebsites.net/static/img/image5.png')
    ->addFact('Assigned to', 'Unassigned')
    ->addFact('Due date', 'Mon May 01 2017 17:07:18 GMT-0700 (Pacific Daylight Time)');

$card->addSection($section);
```

### Adding actions & inputs to the card

```php
<?php

declare(strict_types=1);

use EJTJ3\Teams\Card;
use EJTJ3\Teams\Actions\ActionCard;
use EJTJ3\Teams\Actions\HttpPostAction;
use EJTJ3\Teams\Inputs\TextInput;

$card = new Card('Larry Bryant created a new task');

$actionCard = (new ActionCard('Add a comment'))
    ->addInput(new TextInput('comment', 'Add a comment here for this task'))
    ->addAction(new HttpPostAction('Add comment', 'http://...'));

$card->addPotentialAction($actionCard);
```
