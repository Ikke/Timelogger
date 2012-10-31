<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Assert\Assertion;

//require_once __DIR__ . "/../../LogTime.php";
//require_once __DIR__."/../../Repository/Gateway/Memory/Entries.php";


//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{

    public $date;

    public $useCase;

    public $repository;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     */
    public function __construct()
    {
        $this->repository = new Timelogger\Repository_Gateway_Memory_Entries();
        $this->useCase = new Timelogger\LogTime($this->repository);
    }


    /**
     * @Given /^I am a developer$/
     */
    public function iAmADeveloper()
    {

    }

    /**
     * @Given /^The date is (\d{4}-\d{2}-\d{2})$/
     */
    public function theDateIs($date)
    {
        $this->date = $date;
    }

    /**
     * @When /^I enter the following into my time log:$/
     */
    public function iEnterTheFollowingIntoMyTimeLog(PyStringNode $entry)
    {
        list($start, $stop, $description) = explode(" - ", $entry);

        $request_model = array(
            'time_start'    => $start,
            'time_stop'     => $stop,
            'description'   => $description,
            'date'          => $this->date
        );

        $this->useCase->execute($request_model);
    }

    /**
     * @Then /^A log entry should be created with:$/
     */
    public function aLogEntryShouldBeCreatedWith(TableNode $table)
    {
        $expected = $this->_parseTable($table);

        $entries = $this->repository->getAll();
        /** @var $entry Entry */
        $entry = $entries[0];

        Assertion::same($entry->description, $expected['description']);
    }

    public function _parseTable(TableNode $node)
    {
        $result = array();

        foreach($node->getNumeratedRows() as $row)
        {
            $result[$row[0]] = $row[1];
        }

        return $result;
    }


}
