<?php

namespace DBAL;

/**
 * class Type define all SQL types
 */
final class Type
{
    //* Number Types
    const INTEGER = "INT";
    const BIGINT = "BIGINT";
    const DECIMAL = "DECIMAL";
    const FLOAT = "FLOAT";
    const DOUBLE = "DOUBLE";

    //* String Types
    const CHAR = "CHAR";
    const VARCHAR = "VARCHAR";
    const TEXT = "TEXT";

    //* Date Types
    const DATE = "DATE";
    const DATETIME = "DATETIME";
    const TIME = "TIME";
    const TIMESTAMP = "TIMESTAMP";
    const YEAR = "YEAR";

    //* Other Types
    const BOOLEAN = "BOOLEAN";
    const BLOB = "BLOB";

    private function __construct()
    {
    }
}
