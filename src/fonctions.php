<?php

function connectToDatabase(): PDO
{
    // Connection a la base de donnees
    try {
        $dsn = "pgsql:host=localhost;port=5432;dbname=PHP;user=postgres;password=q";
        $pdo = new PDO($dsn);
    } catch (Exception $e) {
        throw new RuntimeException(sprintf('Problem is %s ', $e->getMessage()));
    }
    return $pdo;
}


// generic select query
function select($pdo, $query, $params = [])
{
    try {
        $stmt = $pdo->prepare($query);
        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val);
        }
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // gets the row
    } catch (PDOException $e) {
        sprintf('Query Error: %s' . $e->getMessage());
    }
}
/**
 * To direct  information to where it needs to go, to be able to work on multiple parts of the application at the same time
 * (refactoring will be done later to make a general model)
 * @param array POST most likely
 * The program will completely stop if someone inputs a form of unknown origin  
 */
function direct(array $formsubmission) : void {
    switch ($formsubmission['form_identifier']) {
        case 'form_for_trajet':
            echo json_encode(["Origin" => "direct function"]);
            break;
        
        case 'blah_blah':
            echo json_encode("Hello");
        
        default:
            echo json_encode("Entered into the default section of a switch statement");
    }
    
}