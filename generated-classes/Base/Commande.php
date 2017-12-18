<?php

namespace Base;

use \Client as ChildClient;
use \ClientQuery as ChildClientQuery;
use \Commande as ChildCommande;
use \CommandeQuery as ChildCommandeQuery;
use \Facture as ChildFacture;
use \FactureQuery as ChildFactureQuery;
use \Panier as ChildPanier;
use \PanierQuery as ChildPanierQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\CommandeTableMap;
use Map\FactureTableMap;
use Map\PanierTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'commande' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Commande implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CommandeTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the idcommande field.
     *
     * @var        int
     */
    protected $idcommande;

    /**
     * The value for the etatcommande field.
     *
     * @var        boolean
     */
    protected $etatcommande;

    /**
     * The value for the date field.
     *
     * @var        DateTime
     */
    protected $date;

    /**
     * The value for the montant field.
     *
     * @var        double
     */
    protected $montant;

    /**
     * The value for the client_id field.
     *
     * @var        int
     */
    protected $client_id;

    /**
     * @var        ChildClient
     */
    protected $aClient;

    /**
     * @var        ObjectCollection|ChildPanier[] Collection to store aggregation of ChildPanier objects.
     */
    protected $collPaniers;
    protected $collPaniersPartial;

    /**
     * @var        ObjectCollection|ChildFacture[] Collection to store aggregation of ChildFacture objects.
     */
    protected $collFactures;
    protected $collFacturesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPanier[]
     */
    protected $paniersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFacture[]
     */
    protected $facturesScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Commande object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Commande</code> instance.  If
     * <code>obj</code> is an instance of <code>Commande</code>, delegates to
     * <code>equals(Commande)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Commande The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [idcommande] column value.
     *
     * @return int
     */
    public function getIdCommande()
    {
        return $this->idcommande;
    }

    /**
     * Get the [etatcommande] column value.
     *
     * @return boolean
     */
    public function getEtatCommande()
    {
        return $this->etatcommande;
    }

    /**
     * Get the [etatcommande] column value.
     *
     * @return boolean
     */
    public function isEtatCommande()
    {
        return $this->getEtatCommande();
    }

    /**
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = NULL)
    {
        if ($format === null) {
            return $this->date;
        } else {
            return $this->date instanceof \DateTimeInterface ? $this->date->format($format) : null;
        }
    }

    /**
     * Get the [montant] column value.
     *
     * @return double
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Get the [client_id] column value.
     *
     * @return int
     */
    public function getClient_id()
    {
        return $this->client_id;
    }

    /**
     * Set the value of [idcommande] column.
     *
     * @param int $v new value
     * @return $this|\Commande The current object (for fluent API support)
     */
    public function setIdCommande($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idcommande !== $v) {
            $this->idcommande = $v;
            $this->modifiedColumns[CommandeTableMap::COL_IDCOMMANDE] = true;
        }

        return $this;
    } // setIdCommande()

    /**
     * Sets the value of the [etatcommande] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Commande The current object (for fluent API support)
     */
    public function setEtatCommande($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->etatcommande !== $v) {
            $this->etatcommande = $v;
            $this->modifiedColumns[CommandeTableMap::COL_ETATCOMMANDE] = true;
        }

        return $this;
    } // setEtatCommande()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Commande The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            if ($this->date === null || $dt === null || $dt->format("Y-m-d") !== $this->date->format("Y-m-d")) {
                $this->date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CommandeTableMap::COL_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setDate()

    /**
     * Set the value of [montant] column.
     *
     * @param double $v new value
     * @return $this|\Commande The current object (for fluent API support)
     */
    public function setMontant($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->montant !== $v) {
            $this->montant = $v;
            $this->modifiedColumns[CommandeTableMap::COL_MONTANT] = true;
        }

        return $this;
    } // setMontant()

    /**
     * Set the value of [client_id] column.
     *
     * @param int $v new value
     * @return $this|\Commande The current object (for fluent API support)
     */
    public function setClient_id($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->client_id !== $v) {
            $this->client_id = $v;
            $this->modifiedColumns[CommandeTableMap::COL_CLIENT_ID] = true;
        }

        if ($this->aClient !== null && $this->aClient->getIdClient() !== $v) {
            $this->aClient = null;
        }

        return $this;
    } // setClient_id()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CommandeTableMap::translateFieldName('IdCommande', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idcommande = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CommandeTableMap::translateFieldName('EtatCommande', TableMap::TYPE_PHPNAME, $indexType)];
            $this->etatcommande = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CommandeTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CommandeTableMap::translateFieldName('Montant', TableMap::TYPE_PHPNAME, $indexType)];
            $this->montant = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CommandeTableMap::translateFieldName('Client_id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->client_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = CommandeTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Commande'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aClient !== null && $this->client_id !== $this->aClient->getIdClient()) {
            $this->aClient = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CommandeTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCommandeQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClient = null;
            $this->collPaniers = null;

            $this->collFactures = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Commande::setDeleted()
     * @see Commande::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommandeTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCommandeQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommandeTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CommandeTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aClient !== null) {
                if ($this->aClient->isModified() || $this->aClient->isNew()) {
                    $affectedRows += $this->aClient->save($con);
                }
                $this->setClient($this->aClient);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->paniersScheduledForDeletion !== null) {
                if (!$this->paniersScheduledForDeletion->isEmpty()) {
                    \PanierQuery::create()
                        ->filterByPrimaryKeys($this->paniersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->paniersScheduledForDeletion = null;
                }
            }

            if ($this->collPaniers !== null) {
                foreach ($this->collPaniers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->facturesScheduledForDeletion !== null) {
                if (!$this->facturesScheduledForDeletion->isEmpty()) {
                    \FactureQuery::create()
                        ->filterByPrimaryKeys($this->facturesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->facturesScheduledForDeletion = null;
                }
            }

            if ($this->collFactures !== null) {
                foreach ($this->collFactures as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[CommandeTableMap::COL_IDCOMMANDE] = true;
        if (null !== $this->idcommande) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CommandeTableMap::COL_IDCOMMANDE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CommandeTableMap::COL_IDCOMMANDE)) {
            $modifiedColumns[':p' . $index++]  = 'idCommande';
        }
        if ($this->isColumnModified(CommandeTableMap::COL_ETATCOMMANDE)) {
            $modifiedColumns[':p' . $index++]  = 'etatCommande';
        }
        if ($this->isColumnModified(CommandeTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(CommandeTableMap::COL_MONTANT)) {
            $modifiedColumns[':p' . $index++]  = 'montant';
        }
        if ($this->isColumnModified(CommandeTableMap::COL_CLIENT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'client_id';
        }

        $sql = sprintf(
            'INSERT INTO commande (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idCommande':
                        $stmt->bindValue($identifier, $this->idcommande, PDO::PARAM_INT);
                        break;
                    case 'etatCommande':
                        $stmt->bindValue($identifier, (int) $this->etatcommande, PDO::PARAM_INT);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date ? $this->date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'montant':
                        $stmt->bindValue($identifier, $this->montant, PDO::PARAM_STR);
                        break;
                    case 'client_id':
                        $stmt->bindValue($identifier, $this->client_id, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdCommande($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CommandeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdCommande();
                break;
            case 1:
                return $this->getEtatCommande();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getMontant();
                break;
            case 4:
                return $this->getClient_id();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Commande'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Commande'][$this->hashCode()] = true;
        $keys = CommandeTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCommande(),
            $keys[1] => $this->getEtatCommande(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getMontant(),
            $keys[4] => $this->getClient_id(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aClient) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'client';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'client';
                        break;
                    default:
                        $key = 'Client';
                }

                $result[$key] = $this->aClient->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPaniers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'paniers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'paniers';
                        break;
                    default:
                        $key = 'Paniers';
                }

                $result[$key] = $this->collPaniers->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFactures) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'factures';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'factures';
                        break;
                    default:
                        $key = 'Factures';
                }

                $result[$key] = $this->collFactures->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Commande
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CommandeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Commande
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdCommande($value);
                break;
            case 1:
                $this->setEtatCommande($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setMontant($value);
                break;
            case 4:
                $this->setClient_id($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = CommandeTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdCommande($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setEtatCommande($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setMontant($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setClient_id($arr[$keys[4]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Commande The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CommandeTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CommandeTableMap::COL_IDCOMMANDE)) {
            $criteria->add(CommandeTableMap::COL_IDCOMMANDE, $this->idcommande);
        }
        if ($this->isColumnModified(CommandeTableMap::COL_ETATCOMMANDE)) {
            $criteria->add(CommandeTableMap::COL_ETATCOMMANDE, $this->etatcommande);
        }
        if ($this->isColumnModified(CommandeTableMap::COL_DATE)) {
            $criteria->add(CommandeTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(CommandeTableMap::COL_MONTANT)) {
            $criteria->add(CommandeTableMap::COL_MONTANT, $this->montant);
        }
        if ($this->isColumnModified(CommandeTableMap::COL_CLIENT_ID)) {
            $criteria->add(CommandeTableMap::COL_CLIENT_ID, $this->client_id);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildCommandeQuery::create();
        $criteria->add(CommandeTableMap::COL_IDCOMMANDE, $this->idcommande);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdCommande();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCommande();
    }

    /**
     * Generic method to set the primary key (idcommande column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCommande($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdCommande();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Commande (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEtatCommande($this->getEtatCommande());
        $copyObj->setDate($this->getDate());
        $copyObj->setMontant($this->getMontant());
        $copyObj->setClient_id($this->getClient_id());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getPaniers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPanier($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFactures() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFacture($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCommande(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Commande Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildClient object.
     *
     * @param  ChildClient $v
     * @return $this|\Commande The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClient(ChildClient $v = null)
    {
        if ($v === null) {
            $this->setClient_id(NULL);
        } else {
            $this->setClient_id($v->getIdClient());
        }

        $this->aClient = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildClient object, it will not be re-added.
        if ($v !== null) {
            $v->addCommande($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildClient object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildClient The associated ChildClient object.
     * @throws PropelException
     */
    public function getClient(ConnectionInterface $con = null)
    {
        if ($this->aClient === null && ($this->client_id != 0)) {
            $this->aClient = ChildClientQuery::create()->findPk($this->client_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClient->addCommandes($this);
             */
        }

        return $this->aClient;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Panier' == $relationName) {
            $this->initPaniers();
            return;
        }
        if ('Facture' == $relationName) {
            $this->initFactures();
            return;
        }
    }

    /**
     * Clears out the collPaniers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPaniers()
     */
    public function clearPaniers()
    {
        $this->collPaniers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPaniers collection loaded partially.
     */
    public function resetPartialPaniers($v = true)
    {
        $this->collPaniersPartial = $v;
    }

    /**
     * Initializes the collPaniers collection.
     *
     * By default this just sets the collPaniers collection to an empty array (like clearcollPaniers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPaniers($overrideExisting = true)
    {
        if (null !== $this->collPaniers && !$overrideExisting) {
            return;
        }

        $collectionClassName = PanierTableMap::getTableMap()->getCollectionClassName();

        $this->collPaniers = new $collectionClassName;
        $this->collPaniers->setModel('\Panier');
    }

    /**
     * Gets an array of ChildPanier objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCommande is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPanier[] List of ChildPanier objects
     * @throws PropelException
     */
    public function getPaniers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPaniersPartial && !$this->isNew();
        if (null === $this->collPaniers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPaniers) {
                // return empty collection
                $this->initPaniers();
            } else {
                $collPaniers = ChildPanierQuery::create(null, $criteria)
                    ->filterByCommande($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPaniersPartial && count($collPaniers)) {
                        $this->initPaniers(false);

                        foreach ($collPaniers as $obj) {
                            if (false == $this->collPaniers->contains($obj)) {
                                $this->collPaniers->append($obj);
                            }
                        }

                        $this->collPaniersPartial = true;
                    }

                    return $collPaniers;
                }

                if ($partial && $this->collPaniers) {
                    foreach ($this->collPaniers as $obj) {
                        if ($obj->isNew()) {
                            $collPaniers[] = $obj;
                        }
                    }
                }

                $this->collPaniers = $collPaniers;
                $this->collPaniersPartial = false;
            }
        }

        return $this->collPaniers;
    }

    /**
     * Sets a collection of ChildPanier objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $paniers A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCommande The current object (for fluent API support)
     */
    public function setPaniers(Collection $paniers, ConnectionInterface $con = null)
    {
        /** @var ChildPanier[] $paniersToDelete */
        $paniersToDelete = $this->getPaniers(new Criteria(), $con)->diff($paniers);


        $this->paniersScheduledForDeletion = $paniersToDelete;

        foreach ($paniersToDelete as $panierRemoved) {
            $panierRemoved->setCommande(null);
        }

        $this->collPaniers = null;
        foreach ($paniers as $panier) {
            $this->addPanier($panier);
        }

        $this->collPaniers = $paniers;
        $this->collPaniersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Panier objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Panier objects.
     * @throws PropelException
     */
    public function countPaniers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPaniersPartial && !$this->isNew();
        if (null === $this->collPaniers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPaniers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPaniers());
            }

            $query = ChildPanierQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCommande($this)
                ->count($con);
        }

        return count($this->collPaniers);
    }

    /**
     * Method called to associate a ChildPanier object to this object
     * through the ChildPanier foreign key attribute.
     *
     * @param  ChildPanier $l ChildPanier
     * @return $this|\Commande The current object (for fluent API support)
     */
    public function addPanier(ChildPanier $l)
    {
        if ($this->collPaniers === null) {
            $this->initPaniers();
            $this->collPaniersPartial = true;
        }

        if (!$this->collPaniers->contains($l)) {
            $this->doAddPanier($l);

            if ($this->paniersScheduledForDeletion and $this->paniersScheduledForDeletion->contains($l)) {
                $this->paniersScheduledForDeletion->remove($this->paniersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPanier $panier The ChildPanier object to add.
     */
    protected function doAddPanier(ChildPanier $panier)
    {
        $this->collPaniers[]= $panier;
        $panier->setCommande($this);
    }

    /**
     * @param  ChildPanier $panier The ChildPanier object to remove.
     * @return $this|ChildCommande The current object (for fluent API support)
     */
    public function removePanier(ChildPanier $panier)
    {
        if ($this->getPaniers()->contains($panier)) {
            $pos = $this->collPaniers->search($panier);
            $this->collPaniers->remove($pos);
            if (null === $this->paniersScheduledForDeletion) {
                $this->paniersScheduledForDeletion = clone $this->collPaniers;
                $this->paniersScheduledForDeletion->clear();
            }
            $this->paniersScheduledForDeletion[]= clone $panier;
            $panier->setCommande(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Commande is new, it will return
     * an empty collection; or if this Commande has previously
     * been saved, it will retrieve related Paniers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Commande.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPanier[] List of ChildPanier objects
     */
    public function getPaniersJoinArticle(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPanierQuery::create(null, $criteria);
        $query->joinWith('Article', $joinBehavior);

        return $this->getPaniers($query, $con);
    }

    /**
     * Clears out the collFactures collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFactures()
     */
    public function clearFactures()
    {
        $this->collFactures = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collFactures collection loaded partially.
     */
    public function resetPartialFactures($v = true)
    {
        $this->collFacturesPartial = $v;
    }

    /**
     * Initializes the collFactures collection.
     *
     * By default this just sets the collFactures collection to an empty array (like clearcollFactures());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFactures($overrideExisting = true)
    {
        if (null !== $this->collFactures && !$overrideExisting) {
            return;
        }

        $collectionClassName = FactureTableMap::getTableMap()->getCollectionClassName();

        $this->collFactures = new $collectionClassName;
        $this->collFactures->setModel('\Facture');
    }

    /**
     * Gets an array of ChildFacture objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCommande is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildFacture[] List of ChildFacture objects
     * @throws PropelException
     */
    public function getFactures(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFacturesPartial && !$this->isNew();
        if (null === $this->collFactures || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFactures) {
                // return empty collection
                $this->initFactures();
            } else {
                $collFactures = ChildFactureQuery::create(null, $criteria)
                    ->filterByCommande($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collFacturesPartial && count($collFactures)) {
                        $this->initFactures(false);

                        foreach ($collFactures as $obj) {
                            if (false == $this->collFactures->contains($obj)) {
                                $this->collFactures->append($obj);
                            }
                        }

                        $this->collFacturesPartial = true;
                    }

                    return $collFactures;
                }

                if ($partial && $this->collFactures) {
                    foreach ($this->collFactures as $obj) {
                        if ($obj->isNew()) {
                            $collFactures[] = $obj;
                        }
                    }
                }

                $this->collFactures = $collFactures;
                $this->collFacturesPartial = false;
            }
        }

        return $this->collFactures;
    }

    /**
     * Sets a collection of ChildFacture objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $factures A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCommande The current object (for fluent API support)
     */
    public function setFactures(Collection $factures, ConnectionInterface $con = null)
    {
        /** @var ChildFacture[] $facturesToDelete */
        $facturesToDelete = $this->getFactures(new Criteria(), $con)->diff($factures);


        $this->facturesScheduledForDeletion = $facturesToDelete;

        foreach ($facturesToDelete as $factureRemoved) {
            $factureRemoved->setCommande(null);
        }

        $this->collFactures = null;
        foreach ($factures as $facture) {
            $this->addFacture($facture);
        }

        $this->collFactures = $factures;
        $this->collFacturesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Facture objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Facture objects.
     * @throws PropelException
     */
    public function countFactures(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFacturesPartial && !$this->isNew();
        if (null === $this->collFactures || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFactures) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getFactures());
            }

            $query = ChildFactureQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCommande($this)
                ->count($con);
        }

        return count($this->collFactures);
    }

    /**
     * Method called to associate a ChildFacture object to this object
     * through the ChildFacture foreign key attribute.
     *
     * @param  ChildFacture $l ChildFacture
     * @return $this|\Commande The current object (for fluent API support)
     */
    public function addFacture(ChildFacture $l)
    {
        if ($this->collFactures === null) {
            $this->initFactures();
            $this->collFacturesPartial = true;
        }

        if (!$this->collFactures->contains($l)) {
            $this->doAddFacture($l);

            if ($this->facturesScheduledForDeletion and $this->facturesScheduledForDeletion->contains($l)) {
                $this->facturesScheduledForDeletion->remove($this->facturesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildFacture $facture The ChildFacture object to add.
     */
    protected function doAddFacture(ChildFacture $facture)
    {
        $this->collFactures[]= $facture;
        $facture->setCommande($this);
    }

    /**
     * @param  ChildFacture $facture The ChildFacture object to remove.
     * @return $this|ChildCommande The current object (for fluent API support)
     */
    public function removeFacture(ChildFacture $facture)
    {
        if ($this->getFactures()->contains($facture)) {
            $pos = $this->collFactures->search($facture);
            $this->collFactures->remove($pos);
            if (null === $this->facturesScheduledForDeletion) {
                $this->facturesScheduledForDeletion = clone $this->collFactures;
                $this->facturesScheduledForDeletion->clear();
            }
            $this->facturesScheduledForDeletion[]= clone $facture;
            $facture->setCommande(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aClient) {
            $this->aClient->removeCommande($this);
        }
        $this->idcommande = null;
        $this->etatcommande = null;
        $this->date = null;
        $this->montant = null;
        $this->client_id = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collPaniers) {
                foreach ($this->collPaniers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFactures) {
                foreach ($this->collFactures as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collPaniers = null;
        $this->collFactures = null;
        $this->aClient = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CommandeTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
