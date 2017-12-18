<?php

namespace Base;

use \Facture as ChildFacture;
use \FactureQuery as ChildFactureQuery;
use \Exception;
use \PDO;
use Map\FactureTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'facture' table.
 *
 *
 *
 * @method     ChildFactureQuery orderByIdFacture($order = Criteria::ASC) Order by the idFacture column
 * @method     ChildFactureQuery orderByMoyenPaiement($order = Criteria::ASC) Order by the moyenPaiement column
 * @method     ChildFactureQuery orderByCommande_id($order = Criteria::ASC) Order by the commande_id column
 *
 * @method     ChildFactureQuery groupByIdFacture() Group by the idFacture column
 * @method     ChildFactureQuery groupByMoyenPaiement() Group by the moyenPaiement column
 * @method     ChildFactureQuery groupByCommande_id() Group by the commande_id column
 *
 * @method     ChildFactureQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFactureQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFactureQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFactureQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFactureQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFactureQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFactureQuery leftJoinCommande($relationAlias = null) Adds a LEFT JOIN clause to the query using the Commande relation
 * @method     ChildFactureQuery rightJoinCommande($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Commande relation
 * @method     ChildFactureQuery innerJoinCommande($relationAlias = null) Adds a INNER JOIN clause to the query using the Commande relation
 *
 * @method     ChildFactureQuery joinWithCommande($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Commande relation
 *
 * @method     ChildFactureQuery leftJoinWithCommande() Adds a LEFT JOIN clause and with to the query using the Commande relation
 * @method     ChildFactureQuery rightJoinWithCommande() Adds a RIGHT JOIN clause and with to the query using the Commande relation
 * @method     ChildFactureQuery innerJoinWithCommande() Adds a INNER JOIN clause and with to the query using the Commande relation
 *
 * @method     \CommandeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFacture findOne(ConnectionInterface $con = null) Return the first ChildFacture matching the query
 * @method     ChildFacture findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFacture matching the query, or a new ChildFacture object populated from the query conditions when no match is found
 *
 * @method     ChildFacture findOneByIdFacture(int $idFacture) Return the first ChildFacture filtered by the idFacture column
 * @method     ChildFacture findOneByMoyenPaiement(string $moyenPaiement) Return the first ChildFacture filtered by the moyenPaiement column
 * @method     ChildFacture findOneByCommande_id(int $commande_id) Return the first ChildFacture filtered by the commande_id column *

 * @method     ChildFacture requirePk($key, ConnectionInterface $con = null) Return the ChildFacture by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFacture requireOne(ConnectionInterface $con = null) Return the first ChildFacture matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFacture requireOneByIdFacture(int $idFacture) Return the first ChildFacture filtered by the idFacture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFacture requireOneByMoyenPaiement(string $moyenPaiement) Return the first ChildFacture filtered by the moyenPaiement column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFacture requireOneByCommande_id(int $commande_id) Return the first ChildFacture filtered by the commande_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFacture[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFacture objects based on current ModelCriteria
 * @method     ChildFacture[]|ObjectCollection findByIdFacture(int $idFacture) Return ChildFacture objects filtered by the idFacture column
 * @method     ChildFacture[]|ObjectCollection findByMoyenPaiement(string $moyenPaiement) Return ChildFacture objects filtered by the moyenPaiement column
 * @method     ChildFacture[]|ObjectCollection findByCommande_id(int $commande_id) Return ChildFacture objects filtered by the commande_id column
 * @method     ChildFacture[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FactureQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FactureQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'unibiere', $modelName = '\\Facture', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFactureQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFactureQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFactureQuery) {
            return $criteria;
        }
        $query = new ChildFactureQuery();
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
     * @return ChildFacture|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FactureTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FactureTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFacture A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idFacture, moyenPaiement, commande_id FROM facture WHERE idFacture = :p0';
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
            /** @var ChildFacture $obj */
            $obj = new ChildFacture();
            $obj->hydrate($row);
            FactureTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFacture|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFactureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FactureTableMap::COL_IDFACTURE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFactureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FactureTableMap::COL_IDFACTURE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idFacture column
     *
     * Example usage:
     * <code>
     * $query->filterByIdFacture(1234); // WHERE idFacture = 1234
     * $query->filterByIdFacture(array(12, 34)); // WHERE idFacture IN (12, 34)
     * $query->filterByIdFacture(array('min' => 12)); // WHERE idFacture > 12
     * </code>
     *
     * @param     mixed $idFacture The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFactureQuery The current query, for fluid interface
     */
    public function filterByIdFacture($idFacture = null, $comparison = null)
    {
        if (is_array($idFacture)) {
            $useMinMax = false;
            if (isset($idFacture['min'])) {
                $this->addUsingAlias(FactureTableMap::COL_IDFACTURE, $idFacture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFacture['max'])) {
                $this->addUsingAlias(FactureTableMap::COL_IDFACTURE, $idFacture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FactureTableMap::COL_IDFACTURE, $idFacture, $comparison);
    }

    /**
     * Filter the query on the moyenPaiement column
     *
     * Example usage:
     * <code>
     * $query->filterByMoyenPaiement('fooValue');   // WHERE moyenPaiement = 'fooValue'
     * $query->filterByMoyenPaiement('%fooValue%', Criteria::LIKE); // WHERE moyenPaiement LIKE '%fooValue%'
     * </code>
     *
     * @param     string $moyenPaiement The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFactureQuery The current query, for fluid interface
     */
    public function filterByMoyenPaiement($moyenPaiement = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($moyenPaiement)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FactureTableMap::COL_MOYENPAIEMENT, $moyenPaiement, $comparison);
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
     * @return $this|ChildFactureQuery The current query, for fluid interface
     */
    public function filterByCommande_id($commande_id = null, $comparison = null)
    {
        if (is_array($commande_id)) {
            $useMinMax = false;
            if (isset($commande_id['min'])) {
                $this->addUsingAlias(FactureTableMap::COL_COMMANDE_ID, $commande_id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($commande_id['max'])) {
                $this->addUsingAlias(FactureTableMap::COL_COMMANDE_ID, $commande_id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FactureTableMap::COL_COMMANDE_ID, $commande_id, $comparison);
    }

    /**
     * Filter the query by a related \Commande object
     *
     * @param \Commande|ObjectCollection $commande The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFactureQuery The current query, for fluid interface
     */
    public function filterByCommande($commande, $comparison = null)
    {
        if ($commande instanceof \Commande) {
            return $this
                ->addUsingAlias(FactureTableMap::COL_COMMANDE_ID, $commande->getIdCommande(), $comparison);
        } elseif ($commande instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FactureTableMap::COL_COMMANDE_ID, $commande->toKeyValue('PrimaryKey', 'IdCommande'), $comparison);
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
     * @return $this|ChildFactureQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildFacture $facture Object to remove from the list of results
     *
     * @return $this|ChildFactureQuery The current query, for fluid interface
     */
    public function prune($facture = null)
    {
        if ($facture) {
            $this->addUsingAlias(FactureTableMap::COL_IDFACTURE, $facture->getIdFacture(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the facture table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FactureTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FactureTableMap::clearInstancePool();
            FactureTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FactureTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FactureTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FactureTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FactureTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FactureQuery
