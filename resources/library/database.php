<?php

//Habilitar para debugar
ini_set('display_errors', 1);

class database
{

    private $pdo;

    function __construct()
    {
        try {
            $this->pdo = pg_connect("host=localhost port=5432 dbname=sofiafala user=sofiafalauser password=8Qu!kR2j")
                or die("Problema ao conectar no banco de dados --> " . pg_errormessage($this->pdo));
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    function query_login($query, $array_params)
    {
        $result = pg_prepare($this->pdo, "", $query);
        $result = pg_execute($this->pdo, "", $array_params);
        return $this->fetch_array($result);
    }

    function prepare($query)
    {
        return pg_prepare($this->pdo, "", $query);
    }

    function query($query)
    {
        $query = strip_tags($query);
        $result = pg_query($this->pdo, $query);
        return $result;
    }

    function query_with_params($query, $params)
    {
        $result = pg_prepare($this->pdo, "", $query);
        $result = pg_execute($this->pdo, "", $params);
        return $this->fetch_array($result);
    }

    function delete($table_name, $array_assoc)
    {
        $result = pg_delete($this->pdo, $table_name, $array_assoc);
        return $result;
    }

    function insert($query, $table_name)
    {
        $query = strip_tags($query);
        return pg_insert($this->pdo, $table_name, $query);
    }

    function num_rows($result)
    {
        return pg_num_rows($result);
    }

    function last_error()
    {
        return pg_last_error($this->pdo);
    }

    function result_error($result)
    {
        return pg_result_error($result);
    }

    function retornar_uma_linha($result, $linha = 0)
    {
        return pg_fetch_row($result, $linha);
    }

    function execsql($query)
    {
        $query = strip_tags($query);
        $result = pg_exec($this->pdo, $query);

        return $result;
    }

    function fetch_array_original($result, $i)
    {
        return pg_fetch_array($result, $i);
    }

    function fetch_array($result)
    {
        return pg_fetch_array($result);
    }

    function close()
    {
        pg_close($this->pdo);
    }
}
