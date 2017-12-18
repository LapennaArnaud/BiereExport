<?php

namespace Map;

use \Administrateur;
use \AdministrateurQuery;
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
 * This class defines the structure of the 'administrateur' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AdministrateurTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AdministrateurTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'unibiere';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'administrateur';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Administrateur';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Administrateur';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the idAdministrateur field
     */
    const COL_IDADMINISTRATEUR = 'administrateur.idAdministrateur';

    /**
     * the column name for the nom field
     */
    const COL_NOM = 'administrateur.nom';

    /**
     * the column name for the prenom field
     */
    const COL_PRENOM = 'administrateur.prenom';

    /**
     * the column name for the adresse field
     */
    const COL_ADRESSE = 'administrateur.adresse';

    /**
     * the column name for the codePostal field
     */
    const COL_CODEPOSTAL = 'administrateur.codePostal';

    /**
     * the column name for the ville field
     */
    const COL_VILLE = 'administrateur.ville';

    /**
     * the column name for the pays field
     */
    const COL_PAYS = 'administrateur.pays';

    /**
     * the column name for the login field
     */
    const COL_LOGIN = 'administrateur.login';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'administrateur.email';

    /**
     * the column name for the pass field
     */
    const COL_PASS = 'administrateur.pass';

    /**
     * the column name for the hasPower field
     */
    const COL_HASPOWER = 'administrateur.hasPower';

    /**
     * the column name for the dateCreation field
     */
    const COL_DATECREATION = 'administrateur.dateCreation';

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
        self::TYPE_PHPNAME       => array('IdAdministrateur', 'Nom', 'Prenom', 'Adresse', 'Codepostal', 'Ville', 'Pays', 'Login', 'Email', 'Pass', 'HasPower', 'DateCreation', ),
        self::TYPE_CAMELNAME     => array('idAdministrateur', 'nom', 'prenom', 'adresse', 'codepostal', 'ville', 'pays', 'login', 'email', 'pass', 'hasPower', 'dateCreation', ),
        self::TYPE_COLNAME       => array(AdministrateurTableMap::COL_IDADMINISTRATEUR, AdministrateurTableMap::COL_NOM, AdministrateurTableMap::COL_PRENOM, AdministrateurTableMap::COL_ADRESSE, AdministrateurTableMap::COL_CODEPOSTAL, AdministrateurTableMap::COL_VILLE, AdministrateurTableMap::COL_PAYS, AdministrateurTableMap::COL_LOGIN, AdministrateurTableMap::COL_EMAIL, AdministrateurTableMap::COL_PASS, AdministrateurTableMap::COL_HASPOWER, AdministrateurTableMap::COL_DATECREATION, ),
        self::TYPE_FIELDNAME     => array('idAdministrateur', 'nom', 'prenom', 'adresse', 'codePostal', 'ville', 'pays', 'login', 'email', 'pass', 'hasPower', 'dateCreation', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdAdministrateur' => 0, 'Nom' => 1, 'Prenom' => 2, 'Adresse' => 3, 'Codepostal' => 4, 'Ville' => 5, 'Pays' => 6, 'Login' => 7, 'Email' => 8, 'Pass' => 9, 'HasPower' => 10, 'DateCreation' => 11, ),
        self::TYPE_CAMELNAME     => array('idAdministrateur' => 0, 'nom' => 1, 'prenom' => 2, 'adresse' => 3, 'codepostal' => 4, 'ville' => 5, 'pays' => 6, 'login' => 7, 'email' => 8, 'pass' => 9, 'hasPower' => 10, 'dateCreation' => 11, ),
        self::TYPE_COLNAME       => array(AdministrateurTableMap::COL_IDADMINISTRATEUR => 0, AdministrateurTableMap::COL_NOM => 1, AdministrateurTableMap::COL_PRENOM => 2, AdministrateurTableMap::COL_ADRESSE => 3, AdministrateurTableMap::COL_CODEPOSTAL => 4, AdministrateurTableMap::COL_VILLE => 5, AdministrateurTableMap::COL_PAYS => 6, AdministrateurTableMap::COL_LOGIN => 7, AdministrateurTableMap::COL_EMAIL => 8, AdministrateurTableMap::COL_PASS => 9, AdministrateurTableMap::COL_HASPOWER => 10, AdministrateurTableMap::COL_DATECREATION => 11, ),
        self::TYPE_FIELDNAME     => array('idAdministrateur' => 0, 'nom' => 1, 'prenom' => 2, 'adresse' => 3, 'codePostal' => 4, 'ville' => 5, 'pays' => 6, 'login' => 7, 'email' => 8, 'pass' => 9, 'hasPower' => 10, 'dateCreation' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('administrateur');
        $this->setPhpName('Administrateur');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Administrateur');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idAdministrateur', 'IdAdministrateur', 'INTEGER', true, null, null);
        $this->addColumn('nom', 'Nom', 'VARCHAR', true, 255, null);
        $this->addColumn('prenom', 'Prenom', 'VARCHAR', true, 255, null);
        $this->addColumn('adresse', 'Adresse', 'VARCHAR', false, 1024, null);
        $this->addColumn('codePostal', 'Codepostal', 'VARCHAR', false, 5, null);
        $this->addColumn('ville', 'Ville', 'VARCHAR', false, 50, null);
        $this->addColumn('pays', 'Pays', 'VARCHAR', false, 50, null);
        $this->addColumn('login', 'Login', 'VARCHAR', true, 25, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 1024, null);
        $this->addColumn('pass', 'Pass', 'VARCHAR', true, 25, null);
        $this->addColumn('hasPower', 'HasPower', 'BOOLEAN', true, 1, null);
        $this->addColumn('dateCreation', 'DateCreation', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAdministrateur', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAdministrateur', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAdministrateur', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAdministrateur', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAdministrateur', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAdministrateur', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdAdministrateur', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AdministrateurTableMap::CLASS_DEFAULT : AdministrateurTableMap::OM_CLASS;
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
     * @return array           (Administrateur object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AdministrateurTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AdministrateurTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AdministrateurTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AdministrateurTableMap::OM_CLASS;
            /** @var Administrateur $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AdministrateurTableMap::addInstanceToPool($obj, $key);
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
            $key = AdministrateurTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AdministrateurTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Administrateur $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AdministrateurTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AdministrateurTableMap::COL_IDADMINISTRATEUR);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_NOM);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_PRENOM);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_ADRESSE);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_CODEPOSTAL);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_VILLE);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_PAYS);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_LOGIN);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_EMAIL);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_PASS);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_HASPOWER);
            $criteria->addSelectColumn(AdministrateurTableMap::COL_DATECREATION);
        } else {
            $criteria->addSelectColumn($alias . '.idAdministrateur');
            $criteria->addSelectColumn($alias . '.nom');
            $criteria->addSelectColumn($alias . '.prenom');
            $criteria->addSelectColumn($alias . '.adresse');
            $criteria->addSelectColumn($alias . '.codePostal');
            $criteria->addSelectColumn($alias . '.ville');
            $criteria->addSelectColumn($alias . '.pays');
            $criteria->addSelectColumn($alias . '.login');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.pass');
            $criteria->addSelectColumn($alias . '.hasPower');
            $criteria->addSelectColumn($alias . '.dateCreation');
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
        return Propel::getServiceContainer()->getDatabaseMap(AdministrateurTableMap::DATABASE_NAME)->getTable(AdministrateurTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AdministrateurTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AdministrateurTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AdministrateurTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Administrateur or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Administrateur object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AdministrateurTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Administrateur) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AdministrateurTableMap::DATABASE_NAME);
            $criteria->add(AdministrateurTableMap::COL_IDADMINISTRATEUR, (array) $values, Criteria::IN);
        }

        $query = AdministrateurQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AdministrateurTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AdministrateurTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the administrateur table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AdministrateurQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Administrateur or Criteria object.
     *
     * @param mixed               $criteria Criteria or Administrateur object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdministrateurTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Administrateur object
        }

        if ($criteria->containsKey(AdministrateurTableMap::COL_IDADMINISTRATEUR) && $criteria->keyContainsValue(AdministrateurTableMap::COL_IDADMINISTRATEUR) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AdministrateurTableMap::COL_IDADMINISTRATEUR.')');
        }


        // Set the correct dbName
        $query = AdministrateurQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AdministrateurTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AdministrateurTableMap::buildTableMap();
