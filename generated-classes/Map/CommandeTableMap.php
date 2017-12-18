<?php

namespace Map;

use \Commande;
use \CommandeQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'commande' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CommandeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CommandeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'unibiere';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'commande';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Commande';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Commande';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the idCommande field
     */
    const COL_IDCOMMANDE = 'commande.idCommande';

    /**
     * the column name for the etatCommande field
     */
    const COL_ETATCOMMANDE = 'commande.etatCommande';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'commande.date';

    /**
     * the column name for the montant field
     */
    const COL_MONTANT = 'commande.montant';

    /**
     * the column name for the client_id field
     */
    const COL_CLIENT_ID = 'commande.client_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdCommande', 'EtatCommande', 'Date', 'Montant', 'Client_id', ),
        self::TYPE_CAMELNAME     => array('idCommande', 'etatCommande', 'date', 'montant', 'client_id', ),
        self::TYPE_COLNAME       => array(CommandeTableMap::COL_IDCOMMANDE, CommandeTableMap::COL_ETATCOMMANDE, CommandeTableMap::COL_DATE, CommandeTableMap::COL_MONTANT, CommandeTableMap::COL_CLIENT_ID, ),
        self::TYPE_FIELDNAME     => array('idCommande', 'etatCommande', 'date', 'montant', 'client_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdCommande' => 0, 'EtatCommande' => 1, 'Date' => 2, 'Montant' => 3, 'Client_id' => 4, ),
        self::TYPE_CAMELNAME     => array('idCommande' => 0, 'etatCommande' => 1, 'date' => 2, 'montant' => 3, 'client_id' => 4, ),
        self::TYPE_COLNAME       => array(CommandeTableMap::COL_IDCOMMANDE => 0, CommandeTableMap::COL_ETATCOMMANDE => 1, CommandeTableMap::COL_DATE => 2, CommandeTableMap::COL_MONTANT => 3, CommandeTableMap::COL_CLIENT_ID => 4, ),
        self::TYPE_FIELDNAME     => array('idCommande' => 0, 'etatCommande' => 1, 'date' => 2, 'montant' => 3, 'client_id' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('commande');
        $this->setPhpName('Commande');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Commande');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idCommande', 'IdCommande', 'INTEGER', true, null, null);
        $this->addColumn('etatCommande', 'EtatCommande', 'BOOLEAN', true, 1, null);
        $this->addColumn('date', 'Date', 'DATE', false, null, null);
        $this->addColumn('montant', 'Montant', 'FLOAT', true, null, null);
        $this->addForeignKey('client_id', 'Client_id', 'INTEGER', 'client', 'idClient', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', '\\Client', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':idClient',
  ),
), 'CASCADE', 'RESTRICT', null, false);
        $this->addRelation('Panier', '\\Panier', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':commande_id',
    1 => ':idCommande',
  ),
), 'CASCADE', 'RESTRICT', 'Paniers', false);
        $this->addRelation('Facture', '\\Facture', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':commande_id',
    1 => ':idCommande',
  ),
), 'CASCADE', 'RESTRICT', 'Factures', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to commande     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        PanierTableMap::clearInstancePool();
        FactureTableMap::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCommande', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCommande', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCommande', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCommande', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCommande', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCommande', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdCommande', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CommandeTableMap::CLASS_DEFAULT : CommandeTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Commande object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CommandeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CommandeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CommandeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CommandeTableMap::OM_CLASS;
            /** @var Commande $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CommandeTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CommandeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CommandeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Commande $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CommandeTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CommandeTableMap::COL_IDCOMMANDE);
            $criteria->addSelectColumn(CommandeTableMap::COL_ETATCOMMANDE);
            $criteria->addSelectColumn(CommandeTableMap::COL_DATE);
            $criteria->addSelectColumn(CommandeTableMap::COL_MONTANT);
            $criteria->addSelectColumn(CommandeTableMap::COL_CLIENT_ID);
        } else {
            $criteria->addSelectColumn($alias . '.idCommande');
            $criteria->addSelectColumn($alias . '.etatCommande');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.montant');
            $criteria->addSelectColumn($alias . '.client_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CommandeTableMap::DATABASE_NAME)->getTable(CommandeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CommandeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CommandeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CommandeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Commande or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Commande object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommandeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Commande) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CommandeTableMap::DATABASE_NAME);
            $criteria->add(CommandeTableMap::COL_IDCOMMANDE, (array) $values, Criteria::IN);
        }

        $query = CommandeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CommandeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CommandeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the commande table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CommandeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Commande or Criteria object.
     *
     * @param mixed               $criteria Criteria or Commande object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommandeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Commande object
        }

        if ($criteria->containsKey(CommandeTableMap::COL_IDCOMMANDE) && $criteria->keyContainsValue(CommandeTableMap::COL_IDCOMMANDE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CommandeTableMap::COL_IDCOMMANDE.')');
        }


        // Set the correct dbName
        $query = CommandeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CommandeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CommandeTableMap::buildTableMap();
