<?php

namespace Base;

use \TauxTVA as ChildTauxTVA;
use \TauxTVAQuery as ChildTauxTVAQuery;
use \Exception;
use \PDO;
use Map\TauxTVATableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tauxTVA' table.
 *
 *
 *
 * @method     ChildTauxTVAQuery orderByIdTaux($order = Criteria::ASC) Order by the idTaux column
 * @method     ChildTauxTVAQuery orderByTaux($order = Criteria::ASC) Order by the taux column
 *
 * @method     ChildTauxTVAQuery groupByIdTaux() Group by the idTaux column
 * @method     ChildTauxTVAQuery groupByTaux() Group by the taux column
 *
 * @method     ChildTauxTVAQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTauxTVAQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTauxTVAQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTauxTVAQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTauxTVAQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTauxTVAQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTauxTVAQuery leftJoinArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Article relation
 * @method     ChildTauxTVAQuery rightJoinArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Article relation
 * @method     ChildTauxTVAQuery innerJoinArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the Article relation
 *
 * @method     ChildTauxTVAQuery joinWithArticle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Article relation
 *
 * @method     ChildTauxTVAQuery leftJoinWithArticle() Adds a LEFT JOIN clause and with to the query using the Article relation
 * @method     ChildTauxTVAQuery rightJoinWithArticle() Adds a RIGHT JOIN clause and with to the query using the Article relation
 * @method     ChildTauxTVAQuery innerJoinWithArticle() Adds a INNER JOIN clause and with to the query using the Article relation
 *
 * @method     \ArticleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTauxTVA findOne(ConnectionInterface $con = null) Return the first ChildTauxTVA matching the query
 * @method     ChildTauxTVA findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTauxTVA matching the query, or a new ChildTauxTVA object populated from the query conditions when no match is found
 *
 * @method     ChildTauxTVA findOneByIdTaux(int $idTaux) Return the first ChildTauxTVA filtered by the idTaux column
 * @method     ChildTauxTVA findOneByTaux(double $taux) Return the first ChildTauxTVA filtered by the taux column *

 * @method     ChildTauxTVA requirePk($key, ConnectionInterface $con = null) Return the ChildTauxTVA by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTauxTVA requireOne(ConnectionInterface $con = null) Return the first ChildTauxTVA matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTauxTVA requireOneByIdTaux(int $idTaux) Return the first ChildTauxTVA filtered by the idTaux column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTauxTVA requireOneByTaux(double $taux) Return the first ChildTauxTVA filtered by the taux column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTauxTVA[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTauxTVA objects based on current ModelCriteria
 * @method     ChildTauxTVA[]|ObjectCollection findByIdTaux(int $idTaux) Return ChildTauxTVA objects filtered by the idTaux column
 * @method     ChildTauxTVA[]|ObjectCollection findByTaux(double $taux) Return ChildTauxTVA objects filtered by the taux column
 * @method     ChildTauxTVA[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TauxTVAQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TauxTVAQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'unibiere', $modelName = '\\TauxTVA', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTauxTVAQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTauxTVAQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTauxTVAQuery) {
            return $criteria;
        }
        $query = new ChildTauxTVAQuery();
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
     * @return ChildTauxTVA|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TauxTVATableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TauxTVATableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTauxTVA A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idTaux, taux FROM tauxTVA WHERE idTaux = :p0';
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
            /** @var ChildTauxTVA $obj */
            $obj = new ChildTauxTVA();
            $obj->hydrate($row);
            TauxTVATableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTauxTVA|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTauxTVAQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TauxTVATableMap::COL_IDTAUX, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTauxTVAQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TauxTVATableMap::COL_IDTAUX, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idTaux column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTaux(1234); // WHERE idTaux = 1234
     * $query->filterByIdTaux(array(12, 34)); // WHERE idTaux IN (12, 34)
     * $query->filterByIdTaux(array('min' => 12)); // WHERE idTaux > 12
     * </code>
     *
     * @param     mixed $idTaux The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTauxTVAQuery The current query, for fluid interface
     */
    public function filterByIdTaux($idTaux = null, $comparison = null)
    {
        if (is_array($idTaux)) {
            $useMinMax = false;
            if (isset($idTaux['min'])) {
                $this->addUsingAlias(TauxTVATableMap::COL_IDTAUX, $idTaux['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTaux['max'])) {
                $this->addUsingAlias(TauxTVATableMap::COL_IDTAUX, $idTaux['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TauxTVATableMap::COL_IDTAUX, $idTaux, $comparison);
    }

    /**
     * Filter the query on the taux column
     *
     * Example usage:
     * <code>
     * $query->filterByTaux(1234); // WHERE taux = 1234
     * $query->filterByTaux(array(12, 34)); // WHERE taux IN (12, 34)
     * $query->filterByTaux(array('min' => 12)); // WHERE taux > 12
     * </code>
     *
     * @param     mixed $taux The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTauxTVAQuery The current query, for fluid interface
     */
    public function filterByTaux($taux = null, $comparison = null)
    {
        if (is_array($taux)) {
            $useMinMax = false;
            if (isset($taux['min'])) {
                $this->addUsingAlias(TauxTVATableMap::COL_TAUX, $taux['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taux['max'])) {
                $this->addUsingAlias(TauxTVATableMap::COL_TAUX, $taux['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TauxTVATableMap::COL_TAUX, $taux, $comparison);
    }

    /**
     * Filter the query by a related \Article object
     *
     * @param \Article|ObjectCollection $article the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTauxTVAQuery The current query, for fluid interface
     */
    public function filterByArticle($article, $comparison = null)
    {
        if ($article instanceof \Article) {
            return $this
                ->addUsingAlias(TauxTVATableMap::COL_IDTAUX, $article->getTauxTVA_id(), $comparison);
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
     * @return $this|ChildTauxTVAQuery The current query, for fluid interface
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
     * @param   ChildTauxTVA $tauxTVA Object to remove from the list of results
     *
     * @return $this|ChildTauxTVAQuery The current query, for fluid interface
     */
    public function prune($tauxTVA = null)
    {
        if ($tauxTVA) {
            $this->addUsingAlias(TauxTVATableMap::COL_IDTAUX, $tauxTVA->getIdTaux(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tauxTVA table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TauxTVATableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TauxTVATableMap::clearInstancePool();
            TauxTVATableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TauxTVATableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TauxTVATableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TauxTVATableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TauxTVATableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TauxTVAQuery
