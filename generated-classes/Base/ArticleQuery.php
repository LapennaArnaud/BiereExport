<?php

namespace Base;

use \Article as ChildArticle;
use \ArticleQuery as ChildArticleQuery;
use \Exception;
use \PDO;
use Map\ArticleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'article' table.
 *
 *
 *
 * @method     ChildArticleQuery orderByIdArticle($order = Criteria::ASC) Order by the idArticle column
 * @method     ChildArticleQuery orderByReference($order = Criteria::ASC) Order by the reference column
 * @method     ChildArticleQuery orderByLibelle($order = Criteria::ASC) Order by the libelle column
 * @method     ChildArticleQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildArticleQuery orderByPrixHT($order = Criteria::ASC) Order by the prixHT column
 * @method     ChildArticleQuery orderByQuantiteStock($order = Criteria::ASC) Order by the quantiteStock column
 * @method     ChildArticleQuery orderByDateAjout($order = Criteria::ASC) Order by the dateAjout column
 * @method     ChildArticleQuery orderByCategorie_id($order = Criteria::ASC) Order by the categorie_id column
 * @method     ChildArticleQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildArticleQuery orderByTauxTVA_id($order = Criteria::ASC) Order by the tauxTVA_id column
 *
 * @method     ChildArticleQuery groupByIdArticle() Group by the idArticle column
 * @method     ChildArticleQuery groupByReference() Group by the reference column
 * @method     ChildArticleQuery groupByLibelle() Group by the libelle column
 * @method     ChildArticleQuery groupByDescription() Group by the description column
 * @method     ChildArticleQuery groupByPrixHT() Group by the prixHT column
 * @method     ChildArticleQuery groupByQuantiteStock() Group by the quantiteStock column
 * @method     ChildArticleQuery groupByDateAjout() Group by the dateAjout column
 * @method     ChildArticleQuery groupByCategorie_id() Group by the categorie_id column
 * @method     ChildArticleQuery groupByImage() Group by the image column
 * @method     ChildArticleQuery groupByTauxTVA_id() Group by the tauxTVA_id column
 *
 * @method     ChildArticleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildArticleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildArticleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildArticleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildArticleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildArticleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildArticleQuery leftJoinCategorie($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categorie relation
 * @method     ChildArticleQuery rightJoinCategorie($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categorie relation
 * @method     ChildArticleQuery innerJoinCategorie($relationAlias = null) Adds a INNER JOIN clause to the query using the Categorie relation
 *
 * @method     ChildArticleQuery joinWithCategorie($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Categorie relation
 *
 * @method     ChildArticleQuery leftJoinWithCategorie() Adds a LEFT JOIN clause and with to the query using the Categorie relation
 * @method     ChildArticleQuery rightJoinWithCategorie() Adds a RIGHT JOIN clause and with to the query using the Categorie relation
 * @method     ChildArticleQuery innerJoinWithCategorie() Adds a INNER JOIN clause and with to the query using the Categorie relation
 *
 * @method     ChildArticleQuery leftJoinTauxTVA($relationAlias = null) Adds a LEFT JOIN clause to the query using the TauxTVA relation
 * @method     ChildArticleQuery rightJoinTauxTVA($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TauxTVA relation
 * @method     ChildArticleQuery innerJoinTauxTVA($relationAlias = null) Adds a INNER JOIN clause to the query using the TauxTVA relation
 *
 * @method     ChildArticleQuery joinWithTauxTVA($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TauxTVA relation
 *
 * @method     ChildArticleQuery leftJoinWithTauxTVA() Adds a LEFT JOIN clause and with to the query using the TauxTVA relation
 * @method     ChildArticleQuery rightJoinWithTauxTVA() Adds a RIGHT JOIN clause and with to the query using the TauxTVA relation
 * @method     ChildArticleQuery innerJoinWithTauxTVA() Adds a INNER JOIN clause and with to the query using the TauxTVA relation
 *
 * @method     ChildArticleQuery leftJoinPanier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Panier relation
 * @method     ChildArticleQuery rightJoinPanier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Panier relation
 * @method     ChildArticleQuery innerJoinPanier($relationAlias = null) Adds a INNER JOIN clause to the query using the Panier relation
 *
 * @method     ChildArticleQuery joinWithPanier($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Panier relation
 *
 * @method     ChildArticleQuery leftJoinWithPanier() Adds a LEFT JOIN clause and with to the query using the Panier relation
 * @method     ChildArticleQuery rightJoinWithPanier() Adds a RIGHT JOIN clause and with to the query using the Panier relation
 * @method     ChildArticleQuery innerJoinWithPanier() Adds a INNER JOIN clause and with to the query using the Panier relation
 *
 * @method     \CategorieQuery|\TauxTVAQuery|\PanierQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildArticle findOne(ConnectionInterface $con = null) Return the first ChildArticle matching the query
 * @method     ChildArticle findOneOrCreate(ConnectionInterface $con = null) Return the first ChildArticle matching the query, or a new ChildArticle object populated from the query conditions when no match is found
 *
 * @method     ChildArticle findOneByIdArticle(int $idArticle) Return the first ChildArticle filtered by the idArticle column
 * @method     ChildArticle findOneByReference(string $reference) Return the first ChildArticle filtered by the reference column
 * @method     ChildArticle findOneByLibelle(string $libelle) Return the first ChildArticle filtered by the libelle column
 * @method     ChildArticle findOneByDescription(string $description) Return the first ChildArticle filtered by the description column
 * @method     ChildArticle findOneByPrixHT(double $prixHT) Return the first ChildArticle filtered by the prixHT column
 * @method     ChildArticle findOneByQuantiteStock(int $quantiteStock) Return the first ChildArticle filtered by the quantiteStock column
 * @method     ChildArticle findOneByDateAjout(string $dateAjout) Return the first ChildArticle filtered by the dateAjout column
 * @method     ChildArticle findOneByCategorie_id(int $categorie_id) Return the first ChildArticle filtered by the categorie_id column
 * @method     ChildArticle findOneByImage(string $image) Return the first ChildArticle filtered by the image column
 * @method     ChildArticle findOneByTauxTVA_id(int $tauxTVA_id) Return the first ChildArticle filtered by the tauxTVA_id column *

 * @method     ChildArticle requirePk($key, ConnectionInterface $con = null) Return the ChildArticle by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOne(ConnectionInterface $con = null) Return the first ChildArticle matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArticle requireOneByIdArticle(int $idArticle) Return the first ChildArticle filtered by the idArticle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOneByReference(string $reference) Return the first ChildArticle filtered by the reference column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOneByLibelle(string $libelle) Return the first ChildArticle filtered by the libelle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOneByDescription(string $description) Return the first ChildArticle filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOneByPrixHT(double $prixHT) Return the first ChildArticle filtered by the prixHT column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOneByQuantiteStock(int $quantiteStock) Return the first ChildArticle filtered by the quantiteStock column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOneByDateAjout(string $dateAjout) Return the first ChildArticle filtered by the dateAjout column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOneByCategorie_id(int $categorie_id) Return the first ChildArticle filtered by the categorie_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOneByImage(string $image) Return the first ChildArticle filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArticle requireOneByTauxTVA_id(int $tauxTVA_id) Return the first ChildArticle filtered by the tauxTVA_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArticle[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildArticle objects based on current ModelCriteria
 * @method     ChildArticle[]|ObjectCollection findByIdArticle(int $idArticle) Return ChildArticle objects filtered by the idArticle column
 * @method     ChildArticle[]|ObjectCollection findByReference(string $reference) Return ChildArticle objects filtered by the reference column
 * @method     ChildArticle[]|ObjectCollection findByLibelle(string $libelle) Return ChildArticle objects filtered by the libelle column
 * @method     ChildArticle[]|ObjectCollection findByDescription(string $description) Return ChildArticle objects filtered by the description column
 * @method     ChildArticle[]|ObjectCollection findByPrixHT(double $prixHT) Return ChildArticle objects filtered by the prixHT column
 * @method     ChildArticle[]|ObjectCollection findByQuantiteStock(int $quantiteStock) Return ChildArticle objects filtered by the quantiteStock column
 * @method     ChildArticle[]|ObjectCollection findByDateAjout(string $dateAjout) Return ChildArticle objects filtered by the dateAjout column
 * @method     ChildArticle[]|ObjectCollection findByCategorie_id(int $categorie_id) Return ChildArticle objects filtered by the categorie_id column
 * @method     ChildArticle[]|ObjectCollection findByImage(string $image) Return ChildArticle objects filtered by the image column
 * @method     ChildArticle[]|ObjectCollection findByTauxTVA_id(int $tauxTVA_id) Return ChildArticle objects filtered by the tauxTVA_id column
 * @method     ChildArticle[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ArticleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ArticleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'unibiere', $modelName = '\\Article', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildArticleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildArticleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildArticleQuery) {
            return $criteria;
        }
        $query = new ChildArticleQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildArticle|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ArticleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ArticleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildArticle A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idArticle, reference, libelle, description, prixHT, quantiteStock, dateAjout, categorie_id, image, tauxTVA_id FROM article WHERE idArticle = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildArticle $obj */
            $obj = new ChildArticle();
            $obj->hydrate($row);
            ArticleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildArticle|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ArticleTableMap::COL_IDARTICLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ArticleTableMap::COL_IDARTICLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idArticle column
     *
     * Example usage:
     * <code>
     * $query->filterByIdArticle(1234); // WHERE idArticle = 1234
     * $query->filterByIdArticle(array(12, 34)); // WHERE idArticle IN (12, 34)
     * $query->filterByIdArticle(array('min' => 12)); // WHERE idArticle > 12
     * </code>
     *
     * @param     mixed $idArticle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByIdArticle($idArticle = null, $comparison = null)
    {
        if (is_array($idArticle)) {
            $useMinMax = false;
            if (isset($idArticle['min'])) {
                $this->addUsingAlias(ArticleTableMap::COL_IDARTICLE, $idArticle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idArticle['max'])) {
                $this->addUsingAlias(ArticleTableMap::COL_IDARTICLE, $idArticle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_IDARTICLE, $idArticle, $comparison);
    }

    /**
     * Filter the query on the reference column
     *
     * Example usage:
     * <code>
     * $query->filterByReference('fooValue');   // WHERE reference = 'fooValue'
     * $query->filterByReference('%fooValue%', Criteria::LIKE); // WHERE reference LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reference The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByReference($reference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reference)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query on the libelle column
     *
     * Example usage:
     * <code>
     * $query->filterByLibelle('fooValue');   // WHERE libelle = 'fooValue'
     * $query->filterByLibelle('%fooValue%', Criteria::LIKE); // WHERE libelle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $libelle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByLibelle($libelle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($libelle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_LIBELLE, $libelle, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the prixHT column
     *
     * Example usage:
     * <code>
     * $query->filterByPrixHT(1234); // WHERE prixHT = 1234
     * $query->filterByPrixHT(array(12, 34)); // WHERE prixHT IN (12, 34)
     * $query->filterByPrixHT(array('min' => 12)); // WHERE prixHT > 12
     * </code>
     *
     * @param     mixed $prixHT The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByPrixHT($prixHT = null, $comparison = null)
    {
        if (is_array($prixHT)) {
            $useMinMax = false;
            if (isset($prixHT['min'])) {
                $this->addUsingAlias(ArticleTableMap::COL_PRIXHT, $prixHT['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prixHT['max'])) {
                $this->addUsingAlias(ArticleTableMap::COL_PRIXHT, $prixHT['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_PRIXHT, $prixHT, $comparison);
    }

    /**
     * Filter the query on the quantiteStock column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantiteStock(1234); // WHERE quantiteStock = 1234
     * $query->filterByQuantiteStock(array(12, 34)); // WHERE quantiteStock IN (12, 34)
     * $query->filterByQuantiteStock(array('min' => 12)); // WHERE quantiteStock > 12
     * </code>
     *
     * @param     mixed $quantiteStock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByQuantiteStock($quantiteStock = null, $comparison = null)
    {
        if (is_array($quantiteStock)) {
            $useMinMax = false;
            if (isset($quantiteStock['min'])) {
                $this->addUsingAlias(ArticleTableMap::COL_QUANTITESTOCK, $quantiteStock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantiteStock['max'])) {
                $this->addUsingAlias(ArticleTableMap::COL_QUANTITESTOCK, $quantiteStock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_QUANTITESTOCK, $quantiteStock, $comparison);
    }

    /**
     * Filter the query on the dateAjout column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAjout('2011-03-14'); // WHERE dateAjout = '2011-03-14'
     * $query->filterByDateAjout('now'); // WHERE dateAjout = '2011-03-14'
     * $query->filterByDateAjout(array('max' => 'yesterday')); // WHERE dateAjout > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAjout The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByDateAjout($dateAjout = null, $comparison = null)
    {
        if (is_array($dateAjout)) {
            $useMinMax = false;
            if (isset($dateAjout['min'])) {
                $this->addUsingAlias(ArticleTableMap::COL_DATEAJOUT, $dateAjout['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAjout['max'])) {
                $this->addUsingAlias(ArticleTableMap::COL_DATEAJOUT, $dateAjout['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_DATEAJOUT, $dateAjout, $comparison);
    }

    /**
     * Filter the query on the categorie_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategorie_id(1234); // WHERE categorie_id = 1234
     * $query->filterByCategorie_id(array(12, 34)); // WHERE categorie_id IN (12, 34)
     * $query->filterByCategorie_id(array('min' => 12)); // WHERE categorie_id > 12
     * </code>
     *
     * @see       filterByCategorie()
     *
     * @param     mixed $categorie_id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByCategorie_id($categorie_id = null, $comparison = null)
    {
        if (is_array($categorie_id)) {
            $useMinMax = false;
            if (isset($categorie_id['min'])) {
                $this->addUsingAlias(ArticleTableMap::COL_CATEGORIE_ID, $categorie_id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categorie_id['max'])) {
                $this->addUsingAlias(ArticleTableMap::COL_CATEGORIE_ID, $categorie_id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_CATEGORIE_ID, $categorie_id, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the tauxTVA_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTauxTVA_id(1234); // WHERE tauxTVA_id = 1234
     * $query->filterByTauxTVA_id(array(12, 34)); // WHERE tauxTVA_id IN (12, 34)
     * $query->filterByTauxTVA_id(array('min' => 12)); // WHERE tauxTVA_id > 12
     * </code>
     *
     * @see       filterByTauxTVA()
     *
     * @param     mixed $tauxTVA_id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function filterByTauxTVA_id($tauxTVA_id = null, $comparison = null)
    {
        if (is_array($tauxTVA_id)) {
            $useMinMax = false;
            if (isset($tauxTVA_id['min'])) {
                $this->addUsingAlias(ArticleTableMap::COL_TAUXTVA_ID, $tauxTVA_id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tauxTVA_id['max'])) {
                $this->addUsingAlias(ArticleTableMap::COL_TAUXTVA_ID, $tauxTVA_id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticleTableMap::COL_TAUXTVA_ID, $tauxTVA_id, $comparison);
    }

    /**
     * Filter the query by a related \Categorie object
     *
     * @param \Categorie|ObjectCollection $categorie The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildArticleQuery The current query, for fluid interface
     */
    public function filterByCategorie($categorie, $comparison = null)
    {
        if ($categorie instanceof \Categorie) {
            return $this
                ->addUsingAlias(ArticleTableMap::COL_CATEGORIE_ID, $categorie->getIdCategorie(), $comparison);
        } elseif ($categorie instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArticleTableMap::COL_CATEGORIE_ID, $categorie->toKeyValue('PrimaryKey', 'IdCategorie'), $comparison);
        } else {
            throw new PropelException('filterByCategorie() only accepts arguments of type \Categorie or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Categorie relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function joinCategorie($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Categorie');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Categorie');
        }

        return $this;
    }

    /**
     * Use the Categorie relation Categorie object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CategorieQuery A secondary query class using the current class as primary query
     */
    public function useCategorieQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategorie($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Categorie', '\CategorieQuery');
    }

    /**
     * Filter the query by a related \TauxTVA object
     *
     * @param \TauxTVA|ObjectCollection $tauxTVA The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildArticleQuery The current query, for fluid interface
     */
    public function filterByTauxTVA($tauxTVA, $comparison = null)
    {
        if ($tauxTVA instanceof \TauxTVA) {
            return $this
                ->addUsingAlias(ArticleTableMap::COL_TAUXTVA_ID, $tauxTVA->getIdTaux(), $comparison);
        } elseif ($tauxTVA instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArticleTableMap::COL_TAUXTVA_ID, $tauxTVA->toKeyValue('PrimaryKey', 'IdTaux'), $comparison);
        } else {
            throw new PropelException('filterByTauxTVA() only accepts arguments of type \TauxTVA or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TauxTVA relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function joinTauxTVA($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TauxTVA');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'TauxTVA');
        }

        return $this;
    }

    /**
     * Use the TauxTVA relation TauxTVA object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TauxTVAQuery A secondary query class using the current class as primary query
     */
    public function useTauxTVAQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTauxTVA($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TauxTVA', '\TauxTVAQuery');
    }

    /**
     * Filter the query by a related \Panier object
     *
     * @param \Panier|ObjectCollection $panier the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildArticleQuery The current query, for fluid interface
     */
    public function filterByPanier($panier, $comparison = null)
    {
        if ($panier instanceof \Panier) {
            return $this
                ->addUsingAlias(ArticleTableMap::COL_IDARTICLE, $panier->getArticle_id(), $comparison);
        } elseif ($panier instanceof ObjectCollection) {
            return $this
                ->usePanierQuery()
                ->filterByPrimaryKeys($panier->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPanier() only accepts arguments of type \Panier or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Panier relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function joinPanier($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Panier');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Panier');
        }

        return $this;
    }

    /**
     * Use the Panier relation Panier object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PanierQuery A secondary query class using the current class as primary query
     */
    public function usePanierQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPanier($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Panier', '\PanierQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildArticle $article Object to remove from the list of results
     *
     * @return $this|ChildArticleQuery The current query, for fluid interface
     */
    public function prune($article = null)
    {
        if ($article) {
            $this->addUsingAlias(ArticleTableMap::COL_IDARTICLE, $article->getIdArticle(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the article table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArticleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ArticleTableMap::clearInstancePool();
            ArticleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArticleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ArticleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ArticleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ArticleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ArticleQuery
