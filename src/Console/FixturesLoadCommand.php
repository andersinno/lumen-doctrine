<?php namespace Nord\Lumen\Doctrine\ORM\Console;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Component\Console\Input\InputOption;

class FixturesLoadCommand extends DoctrineCommand
{

    /**
     * @var string
     */
    protected $name = 'doctrine:fixtures:load';

    /**
     * @var string
     */
    protected $description = 'Loads data fixtures into the database';


    /**
     * @inheritdoc
     */
    public function handle()
    {
        $loader = new Loader();

        $this->info('Loading fixtures ...');

        $loader->loadFromDirectory($this->option('path'));

        $fixtures = $loader->getFixtures();

        $purger   = new ORMPurger();
        $executor = new ORMExecutor($this->getEntityManager(), $purger);
        $executor->execute($fixtures, $this->option('append'));

        $this->info('Fixtures loaded!');
    }


    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['path', null, InputOption::VALUE_REQUIRED, 'Path to fixtures.'],
            ['append', true, InputOption::VALUE_OPTIONAL, 'Whether to append fixtures and preserve the database.'],
        ];
    }
}
