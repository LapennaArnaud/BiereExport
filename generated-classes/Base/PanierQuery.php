<?php

namespace Base;

use \Panier as ChildPanier;
use \PanierQuery as ChildPanierQuery;
use \Exception;
use \PDO;
use Map\PanierTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'panier' table.
 *
 *
 *
 * @method     ChildPanierQuery orderByNumPanier($order = Criteria::ASC) Order by the numPanier column
 * @method     ChildPanierQuery orderByQuantite($order = Criteria::ASC) Order by the quantite column
 * @method     ChildPanierQuery orderByCommande_id($order = Criteria::ASC) Order by the commande_id column
 * @method     ChildPanierQuery orderByArticle_id($order = Criteria::ASC) Order by the article_id column
 *
 * @method     ChildPanierQuery groupByNumPanier() Group by the numPanier column
 * @method     ChildPanierQuery groupByQuantite() Group by the quantite column
 * @method     ChildPanierQuery groupByCommande_id() Group by the commande_id column
 * @method     ChildPanierQuery groupByArticle_id() Group by the article_id column
 *
 * @method     ChildPanierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPanierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPanierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPanierQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPanierQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPanierQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPanierQuery leftJoinCommande($relationAlias = null) Adds a LEFT JOIN clause to the query using the Commande relation
 * @method     ChildPanierQuery rightJoinCommande($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Commande relation
 * @method     ChildPanierQuery innerJoinCommande($relationAlias = null) Adds a INNER JOIN clause to the query using the Commande relation
 *
 * @method     ChildPanierQuery joinWithCommande($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Commande relation
 *
 * @method     ChildPanierQuery leftJoinWithCommande() Adds a LEFT JOIN clause and with to the query using the Commande relation
 * @method     ChildPanierQuery rightJoinWithCommande() Adds a RIGHT JOIN clause and with to the query using the Commande relation
 * @method     ChildPanierQuery innerJoinWithCommande() Adds a INNER JOIN clause and with to the query using the Commande relation
 *
 * @method     ChildPanierQuery leftJoinArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Article relation
 * @method     ChildPanierQuery rightJoinArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Article relation
 * @method     ChildPanierQuery innerJoinArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the Article relation
 *
 * @method     ChildPanierQuery joinWithArticle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Article relation
 *
 * @method     ChildPanierQuery leftJoinWithArticle() Adds a LEFT JOIN clause and with to the query using the Article relation
 * @method     ChildPanierQuery rightJoinWithArticle() Adds a RIGHT JOIN clause and with to the query using the Article relation
 * @method     ChildPanierQuery innerJoinWithArticle() Adds a INNER JOIN clause and with to the query using the Article relation
 *
 * @method     \CommandeQuery|\ArticleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPanier findOne(ConnectionInterface $con = null) Return the first ChildPanier matching the query
 * @method     ChildPanier findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPanier matching the query, or a new ChildPanier object populated from the query conditions when no match is found
 *
 * @method     ChildPanier findOneByNumPanier(int $numPanier) Return the first ChildPanier filtered by the numPanier column
 * @method     ChildPanier findOneByQuantite(int $quantite) Return the first ChildPanier filtered by the quantite column
 * @method     ChildPanier findOneByCommande_id(int $commande_id) Return the first ChildPanier filtered by the commande_id column
 * @method     ChildPanier findOneByArticle_id(int $article_id) Return the first ChildPanier filtered by the article_id column *

 * @method     ChildPanier requirePk($key, ConnectionInterface $con = null) Return the ChildPanier by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPanier requireOne(ConnectionInterface $con = null) Return the first ChildPanier matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPanier requireOneByNumPanier(int $numPanier) Return the first ChildPanier filtered by the numPanier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPanier requireOneByQuantite(int $quantite) Return the first ChildPanier filtered by the quantite column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPanier requireOneByCommande_id(int $commande_id) Return the first ChildPanier filtered by the commande_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPanier requireOneByArticle_id(int $article_id) Return the first ChildPanier filtered by the article_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPanier[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPanier objects based on current ModelCriteria
 * @method     ChildPanier[]|ObjectCollection findByNumPanier(int $numPanier) Return ChildPanier objects filtered by the numPanier column
 * @method     ChildPanier[]|ObjectCollection findByQuantite(int $quantite) Return ChildPanier objects filtered by the quantite column
 * @method     ChildPanier[]|ObjectCollection findByCommande_id(int $commande_id) Return ChildPanier objects filtered by the commande_id column
 * @method     ChildPanier[]|ObjectCollection findByArticle_id(int $article_id) Return ChildPanier objects filtered by the article_id column
 * @method     ChildPanier[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PanierQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PanierQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'unibiere', $modelName = '\\Panier', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPanierQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPanierQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPanierQuery) {
            return $criteria;
        }
        $query = new ChildPanierQuery();
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
     * @return ChildPanier|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PanierTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PanierTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPanier A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT numPanier, quantite, commande_id, article_id FROM panier WHERE numPanier = :p0';
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
            /** @var ChildPanier $obj */
            $obj = new ChildPanier();
            $obj->hydrate($row);
            PanierTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPanier|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPanierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PanierTableMap::COL_NUMPANIER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPanierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PanierTableMap::COL_NUMPANIER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the numPanier column
     *
     * Example usage:
     * <code>
     * $query->filterByNumPanier(1234); // WHERE numPanier = 1234
     * $query->filterByNumPanier(array(12, 34)); // WHERE numPanier IN (12, 34)
     * $query->filterByNumPanier(array('min' => 12)); // WHERE numPanier > 12
     * </code>
     *
     * @param     mixed $numPanier The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPanierQuery The current query, for fluid interface
     */
    public function filterByNumPanier($numPanier = null, $comparison = null)
    {
        if (is_array($numPanier)) {
            $useMinMax = false;
            if (isset($numPanier['min'])) {
                $this->addUsingAlias(PanierTableMap::COL_NUMPANIER, $numPanier['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numPanier['max'])) {
                $this->addUsingAlias(PanierTableMap::COL_NUMPANIER, $numPanier['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierTableMap::COL_NUMPANIER, $numPanier, $comparison);
    }

    /**
     * Filter the query on the quantite column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantite(1234); // WHERE quantite = 1234
     * $query->filterByQuantite(array(12, 34)); // WHERE quantite IN (12, 34)
     * $query->filterByQuantite(array('min' => 12)); // WHERE quantite > 12
     * </code>
     *
     * @param     mixed $quantite The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPanierQuery The current query, for fluid interface
     */
    public function filterByQuantite($quantite = null, $comparison = null)
    {
        if (is_array($quantite)) {
            $useMinMax = false;
            if (isset($quantite['min'])) {
                $this->addUsingAlias(PanierTableMap::COL_QUANTITE, $quantite['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantite['max'])) {
                $this->addUsingAlias(PanierTableMap::COL_QUANTITE, $quantite['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierTableMap::COL_QUANTITE, $quantite, $comparison);
    }

    /**
     * Filter the query on the commande_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCommande_id(1234); // WHERE commande_id = 1234
     * $query->filterByCommande_id(array(12, 34)); // WHERE commande_id IN (12, 34)
     * $query->filterByCommande_id(array('min' => 12)); // WHERE commande_id > 12
     * </code>
     *
     * @see       filterByCommande()
     *
     * @param     mixed $commande_id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPanierQuery The current query, for fluid interface
     */
    public function filterByCommande_id($commande_id = null, $comparison = null)
    {
        if (is_array($commande_id)) {
            $useMinMax = false;
            if (isset($commande_id['min'])) {
                $this->addUsingAlias(PanierTableMap::COL_COMMANDE_ID, $commande_id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($commande_id['max'])) {
                $this->addUsingAlias(PanierTableMap::COL_COMMANDE_ID, $commande_id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierTableMap::COL_COMMANDE_ID, $commande_id, $comparison);
    }

    /**
     * Filter the query on the article_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArticle_id(1234); // WHERE article_id = 1234
     * $query->filterByArticle_id(array(12, 34)); // WHERE article_id IN (12, 34)
     * $query->filterByArticle_id(array('min' => 12)); // WHERE article_id > 12
     * </code>
     *
     * @see       filterByArticle()
     *
     * @param     mixed $article_id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPanierQuery The current query, for fluid interface
     */
    public function filterByArticle_id($article_id = null, $comparison = null)
    {
        if (is_array($article_id)) {
            $useMinMax = false;
            if (isset($article_id['min'])) {
                $this->addUsingAlias(PanierTableMap::COL_ARTICLE_ID, $article_id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($article_id['max'])) {
                $this->addUsingAlias(PanierTableMap::COL_ARTICLE_ID, $article_id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierTableMap::COL_ARTICLE_ID, $article_id, $comparison);
    }

    /**
     * Filter the query by a related \Commande object
     *
     * @param \Commande|ObjectCollection $commande The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPanierQuery The current query, for fluid interface
     */
    public function filterByCommande($commande, $comparison = null)
    {
        if ($commande instanceof \Commande) {
            return $this
                ->addUsingAlias(PanierTableMap::COL_COMMANDE_ID, $commande->getIdCommande(), $comparison);
        } elseif ($commande instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PanierTableMap::COL_COMMANDE_ID, $commande->toKeyValue('PrimaryKey', 'IdCommande'), $comparison);
        } else {
            throw new PropelException('filterByCommande() only accepts arguments of type \Commande or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Commande relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPanierQuery The current query, for fluid interface
     */
    public function joinCommande($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Commande');

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
            $this->addJoinObject($join, 'Commande');
        }

        return $this;
    }

    /**
     * Use the Commande relation Commande object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CommandeQuery A secondary query class using the current class as primary query
     */
    public function useCommandeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCommande($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Commande', '\CommandeQuery');
    }

    /**
     * Filter the query by a related \Article object
     *
     * @param \Article|ObjectCollection $article The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPanierQuery The current query, for fluid interface
     */
    public function filterByArticle($article, $comparison = null)
    {
        if ($article instanceof \Article) {
            return $this
                ->addUsingAlias(PanierTableMap::COL_ARTICLE_ID, $article->getIdArticle(), $comparison);
        } elseif ($article instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PanierTableMap::COL_ARTICLE_ID, $article->toKeyValue('PrimaryKey', 'IdArticle'), $comparison);
        } else {
            throw new PropelException('filterByArticle() only accepts arguments of type \Article or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Article relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPanierQuery The current query, for fluid interface
     */
    public function joinArticle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Article');

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
            $this->addJoinObject($join, 'Article');
        }

        return $this;
    }

    /**
     * Use the Article relation Article object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ArticleQuery A secondary query class using the current class as primary query
     */
    public function useArticleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArticle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Article', '\ArticleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPanier $panier Object to remove from the list of results
     *
     * @return $this|ChildPanierQuery The current query, for fluid interface
     */
    public function prune($panier = null)
    {
        if ($panier) {
            $this->addUsingAlias(PanierTableMap::COL_NUMPANIER, $panier->getNumPanier(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the panier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PanierTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PanierTableMap::clearInstancePool();
            PanierTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PanierTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PanierTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PanierTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PanierTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PanierQuery
