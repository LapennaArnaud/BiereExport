<?php

namespace Base;

use \Categorie as ChildCategorie;
use \CategorieQuery as ChildCategorieQuery;
use \Exception;
use \PDO;
use Map\CategorieTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'categorie' table.
 *
 *
 *
 * @method     ChildCategorieQuery orderByIdCategorie($order = Criteria::ASC) Order by the idCategorie column
 * @method     ChildCategorieQuery orderByLibelle($order = Criteria::ASC) Order by the libelle column
 *
 * @method     ChildCategorieQuery groupByIdCategorie() Group by the idCategorie column
 * @method     ChildCategorieQuery groupByLibelle() Group by the libelle column
 *
 * @method     ChildCategorieQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCategorieQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCategorieQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCategorieQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCategorieQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCategorieQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCategorieQuery leftJoinArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Article relation
 * @method     ChildCategorieQuery rightJoinArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Article relation
 * @method     ChildCategorieQuery innerJoinArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the Article relation
 *
 * @method     ChildCategorieQuery joinWithArticle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Article relation
 *
 * @method     ChildCategorieQuery leftJoinWithArticle() Adds a LEFT JOIN clause and with to the query using the Article relation
 * @method     ChildCategorieQuery rightJoinWithArticle() Adds a RIGHT JOIN clause and with to the query using the Article relation
 * @method     ChildCategorieQuery innerJoinWithArticle() Adds a INNER JOIN clause and with to the query using the Article relation
 *
 * @method     \ArticleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCategorie findOne(ConnectionInterface $con = null) Return the first ChildCategorie matching the query
 * @method     ChildCategorie findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCategorie matching the query, or a new ChildCategorie object populated from the query conditions when no match is found
 *
 * @method     ChildCategorie findOneByIdCategorie(int $idCategorie) Return the first ChildCategorie filtered by the idCategorie column
 * @method     ChildCategorie findOneByLibelle(string $libelle) Return the first ChildCategorie filtered by the libelle column *

 * @method     ChildCategorie requirePk($key, ConnectionInterface $con = null) Return the ChildCategorie by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategorie requireOne(ConnectionInterface $con = null) Return the first ChildCategorie matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategorie requireOneByIdCategorie(int $idCategorie) Return the first ChildCategorie filtered by the idCategorie column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategorie requireOneByLibelle(string $libelle) Return the first ChildCategorie filtered by the libelle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategorie[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCategorie objects based on current ModelCriteria
 * @method     ChildCategorie[]|ObjectCollection findByIdCategorie(int $idCategorie) Return ChildCategorie objects filtered by the idCategorie column
 * @method     ChildCategorie[]|ObjectCollection findByLibelle(string $libelle) Return ChildCategorie objects filtered by the libelle column
 * @method     ChildCategorie[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CategorieQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CategorieQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'unibiere', $modelName = '\\Categorie', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCategorieQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCategorieQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCategorieQuery) {
            return $criteria;
        }
        $query = new ChildCategorieQuery();
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
     * @return ChildCategorie|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CategorieTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CategorieTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCategorie A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idCategorie, libelle FROM categorie WHERE idCategorie = :p0';
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
            /** @var ChildCategorie $obj */
            $obj = new ChildCategorie();
            $obj->hydrate($row);
            CategorieTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCategorie|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCategorieQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategorieTableMap::COL_IDCATEGORIE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCategorieQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategorieTableMap::COL_IDCATEGORIE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idCategorie column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategorie(1234); // WHERE idCategorie = 1234
     * $query->filterByIdCategorie(array(12, 34)); // WHERE idCategorie IN (12, 34)
     * $query->filterByIdCategorie(array('min' => 12)); // WHERE idCategorie > 12
     * </code>
     *
     * @param     mixed $idCategorie The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategorieQuery The current query, for fluid interface
     */
    public function filterByIdCategorie($idCategorie = null, $comparison = null)
    {
        if (is_array($idCategorie)) {
            $useMinMax = false;
            if (isset($idCategorie['min'])) {
                $this->addUsingAlias(CategorieTableMap::COL_IDCATEGORIE, $idCategorie['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategorie['max'])) {
                $this->addUsingAlias(CategorieTableMap::COL_IDCATEGORIE, $idCategorie['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategorieTableMap::COL_IDCATEGORIE, $idCategorie, $comparison);
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
     * @return $this|ChildCategorieQuery The current query, for fluid interface
     */
    public function filterByLibelle($libelle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($libelle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategorieTableMap::COL_LIBELLE, $libelle, $comparison);
    }

    /**
     * Filter the query by a related \Article object
     *
     * @param \Article|ObjectCollection $article the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategorieQuery The current query, for fluid interface
     */
    public function filterByArticle($article, $comparison = null)
    {
        if ($article instanceof \Article) {
            return $this
                ->addUsingAlias(CategorieTableMap::COL_IDCATEGORIE, $article->getCategorie_id(), $comparison);
        } elseif ($article instanceof ObjectCollection) {
            return $this
                ->useArticleQuery()
                ->filterByPrimaryKeys($article->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildCategorieQuery The current query, for fluid interface
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
     * @param   ChildCategorie $categorie Object to remove from the list of results
     *
     * @return $this|ChildCategorieQuery The current query, for fluid interface
     */
    public function prune($categorie = null)
    {
        if ($categorie) {
            $this->addUsingAlias(CategorieTableMap::COL_IDCATEGORIE, $categorie->getIdCategorie(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the categorie table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategorieTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CategorieTableMap::clearInstancePool();
            CategorieTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CategorieTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CategorieTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CategorieTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CategorieTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CategorieQuery
