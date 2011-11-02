<?php

require_once dirname(__FILE__).'/../lib/vendors/symfony/lib/autoload/sfCoreAutoload.class.php';;
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
  }

public function configureDoctrine(Doctrine_Manager $manager)
	{
		$manager->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, true);
		$manager->setAttribute(Doctrine_Core::ATTR_USE_NATIVE_ENUM, true);
//		$cacheConn = Doctrine_Manager::connection(new PDO('sqlite::memory:'));
//		$cacheDriver = new Doctrine_Cache_Db(array('connection' => $cacheConn, 'tableName' =>'cache'));
//		$cacheDriver->createTable();
//        $cacheDriver = new Doctrine_Cache_Memcache();
//        $cacheDriver = new Doctrine_Cache_Apc();
//        $cacheDriver = new Doctrine_Cache_Array();
//        $manager->setAttribute(Doctrine_Core::ATTR_RESULT_CACHE, $cacheDriver);
//        $manager->setAttribute(Doctrine_Core::ATTR_QUERY_CACHE, $cacheDriver);
//        $manager->setAttribute(Doctrine_Core::ATTR_QUERY_LIMIT, Doctrine_Core::LIMIT_RECORDS);
        $manager->setAttribute(Doctrine_Core::ATTR_PORTABILITY, Doctrine_Core::PORTABILITY_EMPTY_TO_NULL);
//		$options = array('baseClassName' => 'BaseDoctrineRecord');
//		sfConfig::set('doctrine_model_builder_options', $options);

	}
}
