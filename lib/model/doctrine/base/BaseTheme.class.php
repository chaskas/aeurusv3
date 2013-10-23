<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Theme', 'doctrine');

/**
 * BaseTheme
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property Doctrine_Collection $RequestTheme
 * @property Doctrine_Collection $ThemeTag
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getName()         Returns the current record's "name" value
 * @method string              getDescription()  Returns the current record's "description" value
 * @method string              getImage()        Returns the current record's "image" value
 * @method Doctrine_Collection getRequestTheme() Returns the current record's "RequestTheme" collection
 * @method Doctrine_Collection getThemeTag()     Returns the current record's "ThemeTag" collection
 * @method Theme               setId()           Sets the current record's "id" value
 * @method Theme               setName()         Sets the current record's "name" value
 * @method Theme               setDescription()  Sets the current record's "description" value
 * @method Theme               setImage()        Sets the current record's "image" value
 * @method Theme               setRequestTheme() Sets the current record's "RequestTheme" collection
 * @method Theme               setThemeTag()     Sets the current record's "ThemeTag" collection
 * 
 * @package    aeurus
 * @subpackage model
 * @author     Rodrigo Campos H. rodrigo <at> webdevel <dot> cl
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTheme extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('theme');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
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
        $this->hasColumn('image', 'string', 45, array(
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
             'foreign' => 'theme_id'));

        $this->hasMany('ThemeTag', array(
             'local' => 'id',
             'foreign' => 'theme_id'));
    }
}