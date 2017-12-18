<?php

namespace Base;

use \Commande as ChildCommande;
use \CommandeQuery as ChildCommandeQuery;
use \Exception;
use \PDO;
use Map\CommandeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'commande' table.
 *
 *
 *
 * @method     ChildCommandeQuery orderByIdCommande($order = Criteria::ASC) Order by the idCommande column
 * @method     ChildCommandeQuery orderByEtatCommande($order = Criteria::ASC) Order by the etatCommande column
 * @method     ChildCommandeQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCommandeQuery orderByMontant($order = Criteria::ASC) Order by the montant column
 * @method     ChildCommandeQuery orderByClient_id($order = Criteria::ASC) Order by the client_id column
 *
 * @method     ChildCommandeQuery groupByIdCommande() Group by the idCommande column
 * @method     ChildCommandeQuery groupByEtatCommande() Group by the etatCommande column
 * @method     ChildCommandeQuery groupByDate() Group by the date column
 * @method     ChildCommandeQuery groupByMontant() Group by the montant column
 * @method     ChildCommandeQuery groupByClient_id() Group by the client_id column
 *
 * @method     ChildCommandeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCommandeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCommandeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCommandeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCommandeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCommandeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCommandeQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method     ChildCommandeQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method     ChildCommandeQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method     ChildCommandeQuery joinWithClient($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Client relation
 *
 * @method     ChildCommandeQuery leftJoinWithClient() Adds a LEFT JOIN clause and with to the query using the Client relation
 * @method     ChildCommandeQuery rightJoinWithClient() Adds a RIGHT JOIN clause and with to the query using the Client relation
 * @method     ChildCommandeQuery innerJoinWithClient() Adds a INNER JOIN clause and with to the query using the Client relation
 *
 * @method     ChildCommandeQuery leftJoinPanier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Panier relation
 * @method     ChildCommandeQuery rightJoinPanier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Panier relation
 * @method     ChildCommandeQuery innerJoinPanier($relationAlias = null) Adds a INNER JOIN clause to the query using the Panier relation
 *
 * @method     ChildCommandeQuery joinWithPanier($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Panier relation
 *
 * @method     ChildCommandeQuery leftJoinWithPanier() Adds a LEFT JOIN clause and with to the query using the Panier relation
 * @method     ChildCommandeQuery rightJoinWithPanier() Adds a RIGHT JOIN clause and with to the query using the Panier relation
 * @method     ChildCommandeQuery innerJoinWithPanier() Adds a INNER JOIN clause and with to the query using the Panier relation
 *
 * @method     ChildCommandeQuery leftJoinFacture($relationAlias = null) Adds a LEFT JOIN clause to the query using the Facture relation
 * @method     ChildCommandeQuery rightJoinFacture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Facture relation
 * @method     ChildCommandeQuery innerJoinFacture($relationAlias = null) Adds a INNER JOIN clause to the query using the Facture relation
 *
 * @method     ChildCommandeQuery joinWithFacture($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Facture relation
 *
 * @method     ChildCommandeQuery leftJoinWithFacture() Adds a LEFT JOIN clause and with to the query using the Facture relation
 * @method     ChildCommandeQuery rightJoinWithFacture() Adds a RIGHT JOIN clause and with to the query using the Facture relation
 * @method     ChildCommandeQuery innerJoinWithFacture() Adds a INNER JOIN clause and with to the query using the Facture relation
 *
 * @method     \ClientQuery|\PanierQuery|\FactureQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCommande findOne(ConnectionInterface $con = null) Return the first ChildCommande matching the query
 * @method     ChildCommande findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCommande matching the query, or a new ChildCommande object populated from the query conditions when no match is found
 *
 * @method     ChildCommande findOneByIdCommande(int $idCommande) Return the first ChildCommande filtered by the idCommande column
 * @method     ChildCommande findOneByEtatCommande(boolean $etatCommande) Return the first ChildCommande filtered by the etatCommande column
 * @method     ChildCommande findOneByDate(string $date) Return the first ChildCommande filtered by the date column
 * @method     ChildCommande findOneByMontant(double $montant) Return the first ChildCommande filtered by the montant column
 * @method     ChildCommande findOneByClient_id(int $client_id) Return the first ChildCommande filtered by the client_id column *

 * @method     ChildCommande requirePk($key, ConnectionInterface $con = null) Return the ChildCommande by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommande requireOne(ConnectionInterface $con = null) Return the first ChildCommande matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommande requireOneByIdCommande(int $idCommande) Return the first ChildCommande filtered by the idCommande column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommande requireOneByEtatCommande(boolean $etatCommande) Return the first ChildCommande filtered by the etatCommande column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommande requireOneByDate(string $date) Return the first ChildCommande filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommande requireOneByMontant(double $montant) Return the first ChildCommande filtered by the montant column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommande requireOneByClient_id(int $client_id) Return the first ChildCommande filtered by the client_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommande[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCommande objects based on current ModelCriteria
 * @method     ChildCommande[]|ObjectCollection findByIdCommande(int $idCommande) Return ChildCommande objects filtered by the idCommande column
 * @method     ChildCommande[]|ObjectCollection findByEtatCommande(boolean $etatCommande) Return ChildCommande objects filtered by the etatCommande column
 * @method     ChildCommande[]|ObjectCollection findByDate(string $date) Return ChildCommande objects filtered by the date column
 * @method     ChildCommande[]|ObjectCollection findByMontant(double $montant) Return ChildCommande objects filtered by the montant column
 * @method     ChildCommande[]|ObjectCollection findByClient_id(int $client_id) Return ChildCommande objects filtered by the client_id column
 * @method     ChildCommande[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CommandeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CommandeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'unibiere', $modelName = '\\Commande', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCommandeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCommandeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCommandeQuery) {
            return $criteria;
        }
        $query = new ChildCommandeQuery();
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
     * @return ChildCommande|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CommandeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CommandeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCommande A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idCommande, etatCommande, date, montant, client_id FROM commande WHERE idCommande = :p0';
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
            /** @var ChildCommande $obj */
            $obj = new ChildCommande();
            $obj->hydrate($row);
            CommandeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCommande|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CommandeTableMap::COL_IDCOMMANDE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CommandeTableMap::COL_IDCOMMANDE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idCommande column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCommande(1234); // WHERE idCommande = 1234
     * $query->filterByIdCommande(array(12, 34)); // WHERE idCommande IN (12, 34)
     * $query->filterByIdCommande(array('min' => 12)); // WHERE idCommande > 12
     * </code>
     *
     * @param     mixed $idCommande The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByIdCommande($idCommande = null, $comparison = null)
    {
        if (is_array($idCommande)) {
            $useMinMax = false;
            if (isset($idCommande['min'])) {
                $this->addUsingAlias(CommandeTableMap::COL_IDCOMMANDE, $idCommande['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCommande['max'])) {
                $this->addUsingAlias(CommandeTableMap::COL_IDCOMMANDE, $idCommande['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommandeTableMap::COL_IDCOMMANDE, $idCommande, $comparison);
    }

    /**
     * Filter the query on the etatCommande column
     *
     * Example usage:
     * <code>
     * $query->filterByEtatCommande(true); // WHERE etatCommande = true
     * $query->filterByEtatCommande('yes'); // WHERE etatCommande = true
     * </code>
     *
     * @param     boolean|string $etatCommande The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByEtatCommande($etatCommande = null, $comparison = null)
    {
        if (is_string($etatCommande)) {
            $etatCommande = in_array(strtolower($etatCommande), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CommandeTableMap::COL_ETATCOMMANDE, $etatCommande, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(CommandeTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CommandeTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommandeTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the montant column
     *
     * Example usage:
     * <code>
     * $query->filterByMontant(1234); // WHERE montant = 1234
     * $query->filterByMontant(array(12, 34)); // WHERE montant IN (12, 34)
     * $query->filterByMontant(array('min' => 12)); // WHERE montant > 12
     * </code>
     *
     * @param     mixed $montant The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByMontant($montant = null, $comparison = null)
    {
        if (is_array($montant)) {
            $useMinMax = false;
            if (isset($montant['min'])) {
                $this->addUsingAlias(CommandeTableMap::COL_MONTANT, $montant['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($montant['max'])) {
                $this->addUsingAlias(CommandeTableMap::COL_MONTANT, $montant['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommandeTableMap::COL_MONTANT, $montant, $comparison);
    }

    /**
     * Filter the query on the client_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClient_id(1234); // WHERE client_id = 1234
     * $query->filterByClient_id(array(12, 34)); // WHERE client_id IN (12, 34)
     * $query->filterByClient_id(array('min' => 12)); // WHERE client_id > 12
     * </code>
     *
     * @see       filterByClient()
     *
     * @param     mixed $client_id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByClient_id($client_id = null, $comparison = null)
    {
        if (is_array($client_id)) {
            $useMinMax = false;
            if (isset($client_id['min'])) {
                $this->addUsingAlias(CommandeTableMap::COL_CLIENT_ID, $client_id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($client_id['max'])) {
                $this->addUsingAlias(CommandeTableMap::COL_CLIENT_ID, $client_id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommandeTableMap::COL_CLIENT_ID, $client_id, $comparison);
    }

    /**
     * Filter the query by a related \Client object
     *
     * @param \Client|ObjectCollection $client The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof \Client) {
            return $this
                ->addUsingAlias(CommandeTableMap::COL_CLIENT_ID, $client->getIdClient(), $comparison);
        } elseif ($client instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommandeTableMap::COL_CLIENT_ID, $client->toKeyValue('PrimaryKey', 'IdClient'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type \Client or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', '\ClientQuery');
    }

    /**
     * Filter the query by a related \Panier object
     *
     * @param \Panier|ObjectCollection $panier the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByPanier($panier, $comparison = null)
    {
        if ($panier instanceof \Panier) {
            return $this
                ->addUsingAlias(CommandeTableMap::COL_IDCOMMANDE, $panier->getCommande_id(), $comparison);
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
     * @return $this|ChildCommandeQuery The current query, for fluid interface
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
     * Filter the query by a related \Facture object
     *
     * @param \Facture|ObjectCollection $facture the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCommandeQuery The current query, for fluid interface
     */
    public function filterByFacture($facture, $comparison = null)
    {
        if ($facture instanceof \Facture) {
            return $this
                ->addUsingAlias(CommandeTableMap::COL_IDCOMMANDE, $facture->getCommande_id(), $comparison);
        } elseif ($facture instanceof ObjectCollection) {
            return $this
                ->useFactureQuery()
                ->filterByPrimaryKeys($facture->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFacture() only accepts arguments of type \Facture or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Facture relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function joinFacture($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Facture');

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
            $this->addJoinObject($join, 'Facture');
        }

        return $this;
    }

    /**
     * Use the Facture relation Facture object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FactureQuery A secondary query class using the current class as primary query
     */
    public function useFactureQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFacture($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Facture', '\FactureQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCommande $commande Object to remove from the list of results
     *
     * @return $this|ChildCommandeQuery The current query, for fluid interface
     */
    public function prune($commande = null)
    {
        if ($commande) {
            $this->addUsingAlias(CommandeTableMap::COL_IDCOMMANDE, $commande->getIdCommande(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the commande table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommandeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CommandeTableMap::clearInstancePool();
            CommandeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CommandeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CommandeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CommandeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CommandeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CommandeQuery
