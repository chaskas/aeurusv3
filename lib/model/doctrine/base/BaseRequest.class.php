<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Request', 'doctrine');

/**
 * BaseRequest
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $description
 * @property Doctrine_Collection $RequestTheme
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getDescription()  Returns the current record's "description" value
 * @method Doctrine_Collection getRequestTheme() Returns the current record's "RequestTheme" collection
 * @method Request             setId()           Sets the current record's "id" value
 * @method Request             setDescription()  Sets the current record's "description" value
 * @method Request             setRequestTheme() Sets the current record's "RequestTheme" collection
 * 
 * @package    aeurus
 * @subpackage model
 * @author     Rodrigo Campos H. rodrigo <at> webdevel <dot> cl
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRequest extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('request');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('description', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('RequestTheme', array(
             'local' => 'id',
             'foreign' => 'request_id'));
    }
}