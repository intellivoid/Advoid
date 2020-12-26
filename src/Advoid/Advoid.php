<?php


    namespace Advoid;

    use acm\acm;
    use mysqli;

    /**
     * Class Advoid
     * @package Advoid
     */
    class Advoid
    {
        /**
         * @var null
         */
        private $database;

        /**
         * @var mixed
         */
        private $DatabaseConfiguration;

        /**
         * @var acm
         */
        private acm $acm;

        /**
         * Advoid constructor.
         * @throws \Exception
         */
        public function __construct()
        {
            $this->acm = new acm(__DIR__, 'Advoid');
            $this->DatabaseConfiguration = $this->acm->getConfiguration('Database');

            $this->database = null;
        }

        /**
         * @return mysqli
         */
        public function getDatabase()
        {
            if($this->database == null)
            {
                $this->database = new mysqli(
                    $this->DatabaseConfiguration['Host'],
                    $this->DatabaseConfiguration['Username'],
                    $this->DatabaseConfiguration['Password'],
                    $this->DatabaseConfiguration['Name'],
                    $this->DatabaseConfiguration['Port']
                );
            }

            return $this->database;
        }
    }