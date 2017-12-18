<?php

namespace Base;

use \Administrateur as ChildAdministrateur;
use \AdministrateurQuery as ChildAdministrateurQuery;
use \Exception;
use \PDO;
use Map\AdministrateurTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'administrateur' table.
 *
 *
 *
 * @method     ChildAdministrateurQuery orderByIdAdministrateur($order = Criteria::ASC) Order by the idAdministrateur column
 * @method     ChildAdministrateurQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method     ChildAdministrateurQuery orderByPrenom($order = Criteria::ASC) Order by the prenom column
 * @method     ChildAdministrateurQuery orderByAdresse($order = Criteria::ASC) Order by the adresse column
 * @method     ChildAdministrateurQuery orderByCodepostal($order = Criteria::ASC) Order by the codePostal column
 * @method     ChildAdministrateurQuery orderByVille($order = Criteria::ASC) Order by the ville column
 * @method     ChildAdministrateurQuery orderByPays($order = Criteria::ASC) Order by the pays column
 * @method     ChildAdministrateurQuery orderByLogin($order = Criteria::ASC) Order by the login column
 * @method     ChildAdministrateurQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildAdministrateurQuery orderByPass($order = Criteria::ASC) Order by the pass column
 * @method     ChildAdministrateurQuery orderByHasPower($order = Criteria::ASC) Order by the hasPower column
 * @method     ChildAdministrateurQuery orderByDateCreation($order = Criteria::ASC) Order by the dateCreation column
 *
 * @method     ChildAdministrateurQuery groupByIdAdministrateur() Group by the idAdministrateur column
 * @method     ChildAdministrateurQuery groupByNom() Group by the nom column
 * @method     ChildAdministrateurQuery groupByPrenom() Group by the prenom column
 * @method     ChildAdministrateurQuery groupByAdresse() Group by the adresse column
 * @method     ChildAdministrateurQuery groupByCodepostal() Group by the codePostal column
 * @method     ChildAdministrateurQuery groupByVille() Group by the ville column
 * @method     ChildAdministrateurQuery groupByPays() Group by the pays column
 * @method     ChildAdministrateurQuery groupByLogin() Group by the login column
 * @method     ChildAdministrateurQuery groupByEmail() Group by the email column
 * @method     ChildAdministrateurQuery groupByPass() Group by the pass column
 * @method     ChildAdministrateurQuery groupByHasPower() Group by the hasPower column
 * @method     ChildAdministrateurQuery groupByDateCreation() Group by the dateCreation column
 *
 * @method     ChildAdministrateurQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAdministrateurQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAdministrateurQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAdministrateurQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAdministrateurQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAdministrateurQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAdministrateur findOne(ConnectionInterface $con = null) Return the first ChildAdministrateur matching the query
 * @method     ChildAdministrateur findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAdministrateur matching the query, or a new ChildAdministrateur object populated from the query conditions when no match is found
 *
 * @method     ChildAdministrateur findOneByIdAdministrateur(int $idAdministrateur) Return the first ChildAdministrateur filtered by the idAdministrateur column
 * @method     ChildAdministrateur findOneByNom(string $nom) Return the first ChildAdministrateur filtered by the nom column
 * @method     ChildAdministrateur findOneByPrenom(string $prenom) Return the first ChildAdministrateur filtered by the prenom column
 * @method     ChildAdministrateur findOneByAdresse(string $adresse) Return the first ChildAdministrateur filtered by the adresse column
 * @method     ChildAdministrateur findOneByCodepostal(string $codePostal) Return the first ChildAdministrateur filtered by the codePostal column
 * @method     ChildAdministrateur findOneByVille(string $ville) Return the first ChildAdministrateur filtered by the ville column
 * @method     ChildAdministrateur findOneByPays(string $pays) Return the first ChildAdministrateur filtered by the pays column
 * @method     ChildAdministrateur findOneByLogin(string $login) Return the first ChildAdministrateur filtered by the login column
 * @method     ChildAdministrateur findOneByEmail(string $email) Return the first ChildAdministrateur filtered by the email column
 * @method     ChildAdministrateur findOneByPass(string $pass) Return the first ChildAdministrateur filtered by the pass column
 * @method     ChildAdministrateur findOneByHasPower(boolean $hasPower) Return the first ChildAdministrateur filtered by the hasPower column
 * @method     ChildAdministrateur findOneByDateCreation(int $dateCreation) Return the first ChildAdministrateur filtered by the dateCreation column *

 * @method     ChildAdministrateur requirePk($key, ConnectionInterface $con = null) Return the ChildAdministrateur by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOne(ConnectionInterface $con = null) Return the first ChildAdministrateur matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdministrateur requireOneByIdAdministrateur(int $idAdministrateur) Return the first ChildAdministrateur filtered by the idAdministrateur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByNom(string $nom) Return the first ChildAdministrateur filtered by the nom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByPrenom(string $prenom) Return the first ChildAdministrateur filtered by the prenom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByAdresse(string $adresse) Return the first ChildAdministrateur filtered by the adresse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByCodepostal(string $codePostal) Return the first ChildAdministrateur filtered by the codePostal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByVille(string $ville) Return the first ChildAdministrateur filtered by the ville column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByPays(string $pays) Return the first ChildAdministrateur filtered by the pays column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByLogin(string $login) Return the first ChildAdministrateur filtered by the login column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByEmail(string $email) Return the first ChildAdministrateur filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByPass(string $pass) Return the first ChildAdministrateur filtered by the pass column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByHasPower(boolean $hasPower) Return the first ChildAdministrateur filtered by the hasPower column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdministrateur requireOneByDateCreation(int $dateCreation) Return the first ChildAdministrateur filtered by the dateCreation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdministrateur[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAdministrateur objects based on current ModelCriteria
 * @method     ChildAdministrateur[]|ObjectCollection findByIdAdministrateur(int $idAdministrateur) Return ChildAdministrateur objects filtered by the idAdministrateur column
 * @method     ChildAdministrateur[]|ObjectCollection findByNom(string $nom) Return ChildAdministrateur objects filtered by the nom column
 * @method     ChildAdministrateur[]|ObjectCollection findByPrenom(string $prenom) Return ChildAdministrateur objects filtered by the prenom column
 * @method     ChildAdministrateur[]|ObjectCollection findByAdresse(string $adresse) Return ChildAdministrateur objects filtered by the adresse column
 * @method     ChildAdministrateur[]|ObjectCollection findByCodepostal(string $codePostal) Return ChildAdministrateur objects filtered by the codePostal column
 * @method     ChildAdministrateur[]|ObjectCollection findByVille(string $ville) Return ChildAdministrateur objects filtered by the ville column
 * @method     ChildAdministrateur[]|ObjectCollection findByPays(string $pays) Return ChildAdministrateur objects filtered by the pays column
 * @method     ChildAdministrateur[]|ObjectCollection findByLogin(string $login) Return ChildAdministrateur objects filtered by the login column
 * @method     ChildAdministrateur[]|ObjectCollection findByEmail(string $email) Return ChildAdministrateur objects filtered by the email column
 * @method     ChildAdministrateur[]|ObjectCollection findByPass(string $pass) Return ChildAdministrateur objects filtered by the pass column
 * @method     ChildAdministrateur[]|ObjectCollection findByHasPower(boolean $hasPower) Return ChildAdministrateur objects filtered by the hasPower column
 * @method     ChildAdministrateur[]|ObjectCollection findByDateCreation(int $dateCreation) Return ChildAdministrateur objects filtered by the dateCreation column
 * @method     ChildAdministrateur[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AdministrateurQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AdministrateurQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'unibiere', $modelName = '\\Administrateur', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAdministrateurQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAdministrateurQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAdministrateurQuery) {
            return $criteria;
        }
        $query = new ChildAdministrateurQuery();
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
     * @return ChildAdministrateur|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdministrateurTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AdministrateurTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAdministrateur A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idAdministrateur, nom, prenom, adresse, codePostal, ville, pays, login, email, pass, hasPower, dateCreation FROM administrateur WHERE idAdministrateur = :p0';
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
            /** @var ChildAdministrateur $obj */
            $obj = new ChildAdministrateur();
            $obj->hydrate($row);
            AdministrateurTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAdministrateur|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AdministrateurTableMap::COL_IDADMINISTRATEUR, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AdministrateurTableMap::COL_IDADMINISTRATEUR, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idAdministrateur column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAdministrateur(1234); // WHERE idAdministrateur = 1234
     * $query->filterByIdAdministrateur(array(12, 34)); // WHERE idAdministrateur IN (12, 34)
     * $query->filterByIdAdministrateur(array('min' => 12)); // WHERE idAdministrateur > 12
     * </code>
     *
     * @param     mixed $idAdministrateur The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByIdAdministrateur($idAdministrateur = null, $comparison = null)
    {
        if (is_array($idAdministrateur)) {
            $useMinMax = false;
            if (isset($idAdministrateur['min'])) {
                $this->addUsingAlias(AdministrateurTableMap::COL_IDADMINISTRATEUR, $idAdministrateur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAdministrateur['max'])) {
                $this->addUsingAlias(AdministrateurTableMap::COL_IDADMINISTRATEUR, $idAdministrateur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_IDADMINISTRATEUR, $idAdministrateur, $comparison);
    }

    /**
     * Filter the query on the nom column
     *
     * Example usage:
     * <code>
     * $query->filterByNom('fooValue');   // WHERE nom = 'fooValue'
     * $query->filterByNom('%fooValue%', Criteria::LIKE); // WHERE nom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByNom($nom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_NOM, $nom, $comparison);
    }

    /**
     * Filter the query on the prenom column
     *
     * Example usage:
     * <code>
     * $query->filterByPrenom('fooValue');   // WHERE prenom = 'fooValue'
     * $query->filterByPrenom('%fooValue%', Criteria::LIKE); // WHERE prenom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prenom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByPrenom($prenom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prenom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_PRENOM, $prenom, $comparison);
    }

    /**
     * Filter the query on the adresse column
     *
     * Example usage:
     * <code>
     * $query->filterByAdresse('fooValue');   // WHERE adresse = 'fooValue'
     * $query->filterByAdresse('%fooValue%', Criteria::LIKE); // WHERE adresse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $adresse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByAdresse($adresse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($adresse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_ADRESSE, $adresse, $comparison);
    }

    /**
     * Filter the query on the codePostal column
     *
     * Example usage:
     * <code>
     * $query->filterByCodepostal('fooValue');   // WHERE codePostal = 'fooValue'
     * $query->filterByCodepostal('%fooValue%', Criteria::LIKE); // WHERE codePostal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codepostal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByCodepostal($codepostal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codepostal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_CODEPOSTAL, $codepostal, $comparison);
    }

    /**
     * Filter the query on the ville column
     *
     * Example usage:
     * <code>
     * $query->filterByVille('fooValue');   // WHERE ville = 'fooValue'
     * $query->filterByVille('%fooValue%', Criteria::LIKE); // WHERE ville LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ville The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByVille($ville = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ville)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_VILLE, $ville, $comparison);
    }

    /**
     * Filter the query on the pays column
     *
     * Example usage:
     * <code>
     * $query->filterByPays('fooValue');   // WHERE pays = 'fooValue'
     * $query->filterByPays('%fooValue%', Criteria::LIKE); // WHERE pays LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pays The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByPays($pays = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pays)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_PAYS, $pays, $comparison);
    }

    /**
     * Filter the query on the login column
     *
     * Example usage:
     * <code>
     * $query->filterByLogin('fooValue');   // WHERE login = 'fooValue'
     * $query->filterByLogin('%fooValue%', Criteria::LIKE); // WHERE login LIKE '%fooValue%'
     * </code>
     *
     * @param     string $login The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByLogin($login = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($login)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_LOGIN, $login, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the pass column
     *
     * Example usage:
     * <code>
     * $query->filterByPass('fooValue');   // WHERE pass = 'fooValue'
     * $query->filterByPass('%fooValue%', Criteria::LIKE); // WHERE pass LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pass The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByPass($pass = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pass)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_PASS, $pass, $comparison);
    }

    /**
     * Filter the query on the hasPower column
     *
     * Example usage:
     * <code>
     * $query->filterByHasPower(true); // WHERE hasPower = true
     * $query->filterByHasPower('yes'); // WHERE hasPower = true
     * </code>
     *
     * @param     boolean|string $hasPower The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByHasPower($hasPower = null, $comparison = null)
    {
        if (is_string($hasPower)) {
            $hasPower = in_array(strtolower($hasPower), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_HASPOWER, $hasPower, $comparison);
    }

    /**
     * Filter the query on the dateCreation column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCreation(1234); // WHERE dateCreation = 1234
     * $query->filterByDateCreation(array(12, 34)); // WHERE dateCreation IN (12, 34)
     * $query->filterByDateCreation(array('min' => 12)); // WHERE dateCreation > 12
     * </code>
     *
     * @param     mixed $dateCreation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function filterByDateCreation($dateCreation = null, $comparison = null)
    {
        if (is_array($dateCreation)) {
            $useMinMax = false;
            if (isset($dateCreation['min'])) {
                $this->addUsingAlias(AdministrateurTableMap::COL_DATECREATION, $dateCreation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreation['max'])) {
                $this->addUsingAlias(AdministrateurTableMap::COL_DATECREATION, $dateCreation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdministrateurTableMap::COL_DATECREATION, $dateCreation, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAdministrateur $administrateur Object to remove from the list of results
     *
     * @return $this|ChildAdministrateurQuery The current query, for fluid interface
     */
    public function prune($administrateur = null)
    {
        if ($administrateur) {
            $this->addUsingAlias(AdministrateurTableMap::COL_IDADMINISTRATEUR, $administrateur->getIdAdministrateur(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the administrateur table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdministrateurTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AdministrateurTableMap::clearInstancePool();
            AdministrateurTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AdministrateurTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AdministrateurTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AdministrateurTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AdministrateurTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AdministrateurQuery
