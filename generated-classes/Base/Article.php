<?php

namespace Base;

use \Article as ChildArticle;
use \ArticleQuery as ChildArticleQuery;
use \Categorie as ChildCategorie;
use \CategorieQuery as ChildCategorieQuery;
use \Panier as ChildPanier;
use \PanierQuery as ChildPanierQuery;
use \TauxTVA as ChildTauxTVA;
use \TauxTVAQuery as ChildTauxTVAQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ArticleTableMap;
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
 * Base class that represents a row from the 'article' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Article implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ArticleTableMap';


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
     * The value for the idarticle field.
     *
     * @var        int
     */
    protected $idarticle;

    /**
     * The value for the reference field.
     *
     * @var        string
     */
    protected $reference;

    /**
     * The value for the libelle field.
     *
     * @var        string
     */
    protected $libelle;

    /**
     * The value for the description field.
     *
     * @var        string
     */
    protected $description;

    /**
     * The value for the prixht field.
     *
     * @var        double
     */
    protected $prixht;

    /**
     * The value for the quantitestock field.
     *
     * @var        int
     */
    protected $quantitestock;

    /**
     * The value for the dateajout field.
     *
     * @var        DateTime
     */
    protected $dateajout;

    /**
     * The value for the categorie_id field.
     *
     * @var        int
     */
    protected $categorie_id;

    /**
     * The value for the image field.
     *
     * @var        string
     */
    protected $image;

    /**
     * The value for the tauxtva_id field.
     *
     * @var        int
     */
    protected $tauxtva_id;

    /**
     * @var        ChildCategorie
     */
    protected $aCategorie;

    /**
     * @var        ChildTauxTVA
     */
    protected $aTauxTVA;

    /**
     * @var        ObjectCollection|ChildPanier[] Collection to store aggregation of ChildPanier objects.
     */
    protected $collPaniers;
    protected $collPaniersPartial;

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
     * Initializes internal state of Base\Article object.
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
     * Compares this with another <code>Article</code> instance.  If
     * <code>obj</code> is an instance of <code>Article</code>, delegates to
     * <code>equals(Article)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Article The current object, for fluid interface
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
     * Get the [idarticle] column value.
     *
     * @return int
     */
    public function getIdArticle()
    {
        return $this->idarticle;
    }

    /**
     * Get the [reference] column value.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Get the [libelle] column value.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [prixht] column value.
     *
     * @return double
     */
    public function getPrixHT()
    {
        return $this->prixht;
    }

    /**
     * Get the [quantitestock] column value.
     *
     * @return int
     */
    public function getQuantiteStock()
    {
        return $this->quantitestock;
    }

    /**
     * Get the [optionally formatted] temporal [dateajout] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateAjout($format = NULL)
    {
        if ($format === null) {
            return $this->dateajout;
        } else {
            return $this->dateajout instanceof \DateTimeInterface ? $this->dateajout->format($format) : null;
        }
    }

    /**
     * Get the [categorie_id] column value.
     *
     * @return int
     */
    public function getCategorie_id()
    {
        return $this->categorie_id;
    }

    /**
     * Get the [image] column value.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the [tauxtva_id] column value.
     *
     * @return int
     */
    public function getTauxTVA_id()
    {
        return $this->tauxtva_id;
    }

    /**
     * Set the value of [idarticle] column.
     *
     * @param int $v new value
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setIdArticle($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idarticle !== $v) {
            $this->idarticle = $v;
            $this->modifiedColumns[ArticleTableMap::COL_IDARTICLE] = true;
        }

        return $this;
    } // setIdArticle()

    /**
     * Set the value of [reference] column.
     *
     * @param string $v new value
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setReference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reference !== $v) {
            $this->reference = $v;
            $this->modifiedColumns[ArticleTableMap::COL_REFERENCE] = true;
        }

        return $this;
    } // setReference()

    /**
     * Set the value of [libelle] column.
     *
     * @param string $v new value
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setLibelle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->libelle !== $v) {
            $this->libelle = $v;
            $this->modifiedColumns[ArticleTableMap::COL_LIBELLE] = true;
        }

        return $this;
    } // setLibelle()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[ArticleTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [prixht] column.
     *
     * @param double $v new value
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setPrixHT($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->prixht !== $v) {
            $this->prixht = $v;
            $this->modifiedColumns[ArticleTableMap::COL_PRIXHT] = true;
        }

        return $this;
    } // setPrixHT()

    /**
     * Set the value of [quantitestock] column.
     *
     * @param int $v new value
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setQuantiteStock($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->quantitestock !== $v) {
            $this->quantitestock = $v;
            $this->modifiedColumns[ArticleTableMap::COL_QUANTITESTOCK] = true;
        }

        return $this;
    } // setQuantiteStock()

    /**
     * Sets the value of [dateajout] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setDateAjout($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dateajout !== null || $dt !== null) {
            if ($this->dateajout === null || $dt === null || $dt->format("Y-m-d") !== $this->dateajout->format("Y-m-d")) {
                $this->dateajout = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ArticleTableMap::COL_DATEAJOUT] = true;
            }
        } // if either are not null

        return $this;
    } // setDateAjout()

    /**
     * Set the value of [categorie_id] column.
     *
     * @param int $v new value
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setCategorie_id($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->categorie_id !== $v) {
            $this->categorie_id = $v;
            $this->modifiedColumns[ArticleTableMap::COL_CATEGORIE_ID] = true;
        }

        if ($this->aCategorie !== null && $this->aCategorie->getIdCategorie() !== $v) {
            $this->aCategorie = null;
        }

        return $this;
    } // setCategorie_id()

    /**
     * Set the value of [image] column.
     *
     * @param string $v new value
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->image !== $v) {
            $this->image = $v;
            $this->modifiedColumns[ArticleTableMap::COL_IMAGE] = true;
        }

        return $this;
    } // setImage()

    /**
     * Set the value of [tauxtva_id] column.
     *
     * @param int $v new value
     * @return $this|\Article The current object (for fluent API support)
     */
    public function setTauxTVA_id($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tauxtva_id !== $v) {
            $this->tauxtva_id = $v;
            $this->modifiedColumns[ArticleTableMap::COL_TAUXTVA_ID] = true;
        }

        if ($this->aTauxTVA !== null && $this->aTauxTVA->getIdTaux() !== $v) {
            $this->aTauxTVA = null;
        }

        return $this;
    } // setTauxTVA_id()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ArticleTableMap::translateFieldName('IdArticle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idarticle = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ArticleTableMap::translateFieldName('Reference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reference = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ArticleTableMap::translateFieldName('Libelle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->libelle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ArticleTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ArticleTableMap::translateFieldName('PrixHT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->prixht = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ArticleTableMap::translateFieldName('QuantiteStock', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quantitestock = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ArticleTableMap::translateFieldName('DateAjout', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->dateajout = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ArticleTableMap::translateFieldName('Categorie_id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->categorie_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ArticleTableMap::translateFieldName('Image', TableMap::TYPE_PHPNAME, $indexType)];
            $this->image = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ArticleTableMap::translateFieldName('TauxTVA_id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tauxtva_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = ArticleTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Article'), 0, $e);
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
        if ($this->aCategorie !== null && $this->categorie_id !== $this->aCategorie->getIdCategorie()) {
            $this->aCategorie = null;
        }
        if ($this->aTauxTVA !== null && $this->tauxtva_id !== $this->aTauxTVA->getIdTaux()) {
            $this->aTauxTVA = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(ArticleTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildArticleQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCategorie = null;
            $this->aTauxTVA = null;
            $this->collPaniers = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Article::setDeleted()
     * @see Article::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArticleTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildArticleQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ArticleTableMap::DATABASE_NAME);
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
                ArticleTableMap::addInstanceToPool($this);
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

            if ($this->aCategorie !== null) {
                if ($this->aCategorie->isModified() || $this->aCategorie->isNew()) {
                    $affectedRows += $this->aCategorie->save($con);
                }
                $this->setCategorie($this->aCategorie);
            }

            if ($this->aTauxTVA !== null) {
                if ($this->aTauxTVA->isModified() || $this->aTauxTVA->isNew()) {
                    $affectedRows += $this->aTauxTVA->save($con);
                }
                $this->setTauxTVA($this->aTauxTVA);
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

        $this->modifiedColumns[ArticleTableMap::COL_IDARTICLE] = true;
        if (null !== $this->idarticle) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ArticleTableMap::COL_IDARTICLE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ArticleTableMap::COL_IDARTICLE)) {
            $modifiedColumns[':p' . $index++]  = 'idArticle';
        }
        if ($this->isColumnModified(ArticleTableMap::COL_REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'reference';
        }
        if ($this->isColumnModified(ArticleTableMap::COL_LIBELLE)) {
            $modifiedColumns[':p' . $index++]  = 'libelle';
        }
        if ($this->isColumnModified(ArticleTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(ArticleTableMap::COL_PRIXHT)) {
            $modifiedColumns[':p' . $index++]  = 'prixHT';
        }
        if ($this->isColumnModified(ArticleTableMap::COL_QUANTITESTOCK)) {
            $modifiedColumns[':p' . $index++]  = 'quantiteStock';
        }
        if ($this->isColumnModified(ArticleTableMap::COL_DATEAJOUT)) {
            $modifiedColumns[':p' . $index++]  = 'dateAjout';
        }
        if ($this->isColumnModified(ArticleTableMap::COL_CATEGORIE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'categorie_id';
        }
        if ($this->isColumnModified(ArticleTableMap::COL_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = 'image';
        }
        if ($this->isColumnModified(ArticleTableMap::COL_TAUXTVA_ID)) {
            $modifiedColumns[':p' . $index++]  = 'tauxTVA_id';
        }

        $sql = sprintf(
            'INSERT INTO article (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idArticle':
                        $stmt->bindValue($identifier, $this->idarticle, PDO::PARAM_INT);
                        break;
                    case 'reference':
                        $stmt->bindValue($identifier, $this->reference, PDO::PARAM_STR);
                        break;
                    case 'libelle':
                        $stmt->bindValue($identifier, $this->libelle, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'prixHT':
                        $stmt->bindValue($identifier, $this->prixht, PDO::PARAM_STR);
                        break;
                    case 'quantiteStock':
                        $stmt->bindValue($identifier, $this->quantitestock, PDO::PARAM_INT);
                        break;
                    case 'dateAjout':
                        $stmt->bindValue($identifier, $this->dateajout ? $this->dateajout->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'categorie_id':
                        $stmt->bindValue($identifier, $this->categorie_id, PDO::PARAM_INT);
                        break;
                    case 'image':
                        $stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
                        break;
                    case 'tauxTVA_id':
                        $stmt->bindValue($identifier, $this->tauxtva_id, PDO::PARAM_INT);
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
        $this->setIdArticle($pk);

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
        $pos = ArticleTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdArticle();
                break;
            case 1:
                return $this->getReference();
                break;
            case 2:
                return $this->getLibelle();
                break;
            case 3:
                return $this->getDescription();
                break;
            case 4:
                return $this->getPrixHT();
                break;
            case 5:
                return $this->getQuantiteStock();
                break;
            case 6:
                return $this->getDateAjout();
                break;
            case 7:
                return $this->getCategorie_id();
                break;
            case 8:
                return $this->getImage();
                break;
            case 9:
                return $this->getTauxTVA_id();
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

        if (isset($alreadyDumpedObjects['Article'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Article'][$this->hashCode()] = true;
        $keys = ArticleTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdArticle(),
            $keys[1] => $this->getReference(),
            $keys[2] => $this->getLibelle(),
            $keys[3] => $this->getDescription(),
            $keys[4] => $this->getPrixHT(),
            $keys[5] => $this->getQuantiteStock(),
            $keys[6] => $this->getDateAjout(),
            $keys[7] => $this->getCategorie_id(),
            $keys[8] => $this->getImage(),
            $keys[9] => $this->getTauxTVA_id(),
        );
        if ($result[$keys[6]] instanceof \DateTimeInterface) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCategorie) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'categorie';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'categorie';
                        break;
                    default:
                        $key = 'Categorie';
                }

                $result[$key] = $this->aCategorie->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTauxTVA) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tauxTVA';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tauxTVA';
                        break;
                    default:
                        $key = 'TauxTVA';
                }

                $result[$key] = $this->aTauxTVA->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Article
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ArticleTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Article
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdArticle($value);
                break;
            case 1:
                $this->setReference($value);
                break;
            case 2:
                $this->setLibelle($value);
                break;
            case 3:
                $this->setDescription($value);
                break;
            case 4:
                $this->setPrixHT($value);
                break;
            case 5:
                $this->setQuantiteStock($value);
                break;
            case 6:
                $this->setDateAjout($value);
                break;
            case 7:
                $this->setCategorie_id($value);
                break;
            case 8:
                $this->setImage($value);
                break;
            case 9:
                $this->setTauxTVA_id($value);
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
        $keys = ArticleTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdArticle($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setReference($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setLibelle($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescription($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPrixHT($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setQuantiteStock($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDateAjout($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCategorie_id($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setImage($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTauxTVA_id($arr[$keys[9]]);
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
     * @return $this|\Article The current object, for fluid interface
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
        $criteria = new Criteria(ArticleTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ArticleTableMap::COL_IDARTICLE)) {
            $criteria->add(ArticleTableMap::COL_IDARTICLE, $this->idarticle);
        }
        if ($this->isColumnModified(ArticleTableMap::COL_REFERENCE)) {
            $criteria->add(ArticleTableMap::COL_REFERENCE, $this->reference);
        }
        if ($this->isColumnModified(ArticleTableMap::COL_LIBELLE)) {
            $criteria->add(ArticleTableMap::COL_LIBELLE, $this->libelle);
        }
        if ($this->isColumnModified(ArticleTableMap::COL_DESCRIPTION)) {
            $criteria->add(ArticleTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(ArticleTableMap::COL_PRIXHT)) {
            $criteria->add(ArticleTableMap::COL_PRIXHT, $this->prixht);
        }
        if ($this->isColumnModified(ArticleTableMap::COL_QUANTITESTOCK)) {
            $criteria->add(ArticleTableMap::COL_QUANTITESTOCK, $this->quantitestock);
        }
        if ($this->isColumnModified(ArticleTableMap::COL_DATEAJOUT)) {
            $criteria->add(ArticleTableMap::COL_DATEAJOUT, $this->dateajout);
        }
        if ($this->isColumnModified(ArticleTableMap::COL_CATEGORIE_ID)) {
            $criteria->add(ArticleTableMap::COL_CATEGORIE_ID, $this->categorie_id);
        }
        if ($this->isColumnModified(ArticleTableMap::COL_IMAGE)) {
            $criteria->add(ArticleTableMap::COL_IMAGE, $this->image);
        }
        if ($this->isColumnModified(ArticleTableMap::COL_TAUXTVA_ID)) {
            $criteria->add(ArticleTableMap::COL_TAUXTVA_ID, $this->tauxtva_id);
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
        $criteria = ChildArticleQuery::create();
        $criteria->add(ArticleTableMap::COL_IDARTICLE, $this->idarticle);

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
        $validPk = null !== $this->getIdArticle();

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
        return $this->getIdArticle();
    }

    /**
     * Generic method to set the primary key (idarticle column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdArticle($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdArticle();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Article (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setReference($this->getReference());
        $copyObj->setLibelle($this->getLibelle());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setPrixHT($this->getPrixHT());
        $copyObj->setQuantiteStock($this->getQuantiteStock());
        $copyObj->setDateAjout($this->getDateAjout());
        $copyObj->setCategorie_id($this->getCategorie_id());
        $copyObj->setImage($this->getImage());
        $copyObj->setTauxTVA_id($this->getTauxTVA_id());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getPaniers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPanier($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdArticle(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Article Clone of current object.
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
     * Declares an association between this object and a ChildCategorie object.
     *
     * @param  ChildCategorie $v
     * @return $this|\Article The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategorie(ChildCategorie $v = null)
    {
        if ($v === null) {
            $this->setCategorie_id(NULL);
        } else {
            $this->setCategorie_id($v->getIdCategorie());
        }

        $this->aCategorie = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCategorie object, it will not be re-added.
        if ($v !== null) {
            $v->addArticle($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCategorie object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCategorie The associated ChildCategorie object.
     * @throws PropelException
     */
    public function getCategorie(ConnectionInterface $con = null)
    {
        if ($this->aCategorie === null && ($this->categorie_id != 0)) {
            $this->aCategorie = ChildCategorieQuery::create()->findPk($this->categorie_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategorie->addArticles($this);
             */
        }

        return $this->aCategorie;
    }

    /**
     * Declares an association between this object and a ChildTauxTVA object.
     *
     * @param  ChildTauxTVA $v
     * @return $this|\Article The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTauxTVA(ChildTauxTVA $v = null)
    {
        if ($v === null) {
            $this->setTauxTVA_id(NULL);
        } else {
            $this->setTauxTVA_id($v->getIdTaux());
        }

        $this->aTauxTVA = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTauxTVA object, it will not be re-added.
        if ($v !== null) {
            $v->addArticle($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTauxTVA object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTauxTVA The associated ChildTauxTVA object.
     * @throws PropelException
     */
    public function getTauxTVA(ConnectionInterface $con = null)
    {
        if ($this->aTauxTVA === null && ($this->tauxtva_id != 0)) {
            $this->aTauxTVA = ChildTauxTVAQuery::create()->findPk($this->tauxtva_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTauxTVA->addArticles($this);
             */
        }

        return $this->aTauxTVA;
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
     * If this ChildArticle is new, it will return
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
                    ->filterByArticle($this)
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
     * @return $this|ChildArticle The current object (for fluent API support)
     */
    public function setPaniers(Collection $paniers, ConnectionInterface $con = null)
    {
        /** @var ChildPanier[] $paniersToDelete */
        $paniersToDelete = $this->getPaniers(new Criteria(), $con)->diff($paniers);


        $this->paniersScheduledForDeletion = $paniersToDelete;

        foreach ($paniersToDelete as $panierRemoved) {
            $panierRemoved->setArticle(null);
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
                ->filterByArticle($this)
                ->count($con);
        }

        return count($this->collPaniers);
    }

    /**
     * Method called to associate a ChildPanier object to this object
     * through the ChildPanier foreign key attribute.
     *
     * @param  ChildPanier $l ChildPanier
     * @return $this|\Article The current object (for fluent API support)
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
        $panier->setArticle($this);
    }

    /**
     * @param  ChildPanier $panier The ChildPanier object to remove.
     * @return $this|ChildArticle The current object (for fluent API support)
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
            $panier->setArticle(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Article is new, it will return
     * an empty collection; or if this Article has previously
     * been saved, it will retrieve related Paniers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Article.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPanier[] List of ChildPanier objects
     */
    public function getPaniersJoinCommande(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPanierQuery::create(null, $criteria);
        $query->joinWith('Commande', $joinBehavior);

        return $this->getPaniers($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCategorie) {
            $this->aCategorie->removeArticle($this);
        }
        if (null !== $this->aTauxTVA) {
            $this->aTauxTVA->removeArticle($this);
        }
        $this->idarticle = null;
        $this->reference = null;
        $this->libelle = null;
        $this->description = null;
        $this->prixht = null;
        $this->quantitestock = null;
        $this->dateajout = null;
        $this->categorie_id = null;
        $this->image = null;
        $this->tauxtva_id = null;
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
        } // if ($deep)

        $this->collPaniers = null;
        $this->aCategorie = null;
        $this->aTauxTVA = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ArticleTableMap::DEFAULT_STRING_FORMAT);
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
